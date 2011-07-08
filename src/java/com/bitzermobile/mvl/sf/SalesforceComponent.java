/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package com.bitzermobile.mvl.sf;

import com.bitzermobile.mvl.Component;
import com.bitzermobile.mvl.Field;
import com.bitzermobile.mvl.Utils;
import com.sforce.soap.partner.PartnerConnection;
import com.sforce.soap.partner.QueryResult;
import com.sforce.soap.partner.sobject.SObject;
import com.sforce.ws.ConnectionException;
import java.util.ArrayList;
import java.util.regex.Matcher;
import java.util.regex.Pattern;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpSession;

/**
 *
 * @author ali
 */
public class SalesforceComponent extends Component {

    private PartnerConnection connection = null;

    boolean searching;
    String customFilter;

    String sObjectName;

    int startRow;
    int numberOfRows;
    int recordCount;


    boolean reset;
    String lastKeysString;
    String lastSearchString;
    int lastStartRow;

    int batchSize = 200;

    
    public SalesforceComponent (String name, HttpSession session, HttpServletRequest request ) {

        super(name);

        this.session = session;
        this.request = request;
        this.connection = (PartnerConnection) session.getAttribute("connection");

        if (connection != null)
            this.connection.setQueryOptions(250);

        searching = false;
        reset = false;

        lastKeysString = (String) session.getAttribute(name + "_savedKeysString");
        if (lastKeysString == null)
            lastKeysString = "";
        lastSearchString = (String) session.getAttribute(name + "_savedSearchString");
        if (lastSearchString == null)
            lastSearchString = "";

        String tmp = (String) session.getAttribute(name + "_lastStartRow");
        if (tmp != null)
            lastStartRow = Integer.parseInt(tmp);
        else
            lastStartRow = 1;

        tmp = (String) session.getAttribute(name + "_recordCount");
        if (tmp != null)
            recordCount = (new Integer(tmp)).intValue();
        else
            recordCount = -1;

        processPaginationParameters();

        
    }

    

    public String processKeyParameters() {

        String keyColumns[] = request.getParameterValues("keyColumn");
        String keyValues[] = request.getParameterValues("keyValue");

        if (keyValues == null || keyValues.length == 0) {
            return "";
        }

        String keys = "";
        String keyValue = "";
        for (int i = 0; i < keyValues.length; i++) {

            //operator = " = ";
            keyValue = keyValues[i];

            if (keys == "") {
                keys = " " + keyColumns[i] + " = '" + keyValue + "'";
            } else {
                keys = " AND " + keyColumns[i] + " = '" + keyValue + "'";
            }

        }

        return keys;
    }

    public String processSearchParameters() {

        String searchColumns[] = request.getParameterValues("searchColumn");
        String searchValues[] = request.getParameterValues("searchValue");

        if (searchValues == null || searchValues.length == 0) {
            return "";
        }

        String search = "";
        String operator = "";
        String value = "";
        for (int i = 0; i < searchValues.length; i++) {

            //operator = " = ";
            value = searchValues[i];
            if (value.indexOf("?") >= 0 || value.indexOf("*") >= 0) {

                value = value.replaceAll("\\?", "_");
                value = value.replaceAll("\\*", "%");

            } else {
                value = "%" + value + "%";
            }

            operator = " like ";

            if (search == "") {
                search = " " + searchColumns[i] + " " + operator + " '" + value + "' ";
            } else {
                search = search + " OR " + searchColumns[i] + " " + operator + " '" + value + "' ";
            }

        }

        if (search != "") {
            search = " ( " + search + " ) ";
        }

        return search;
    }

    public String processQueryParameters() {


        String query = "";
        String lastModifiedOn = request.getParameter("lastModifiedOn");
        if (lastModifiedOn != null && lastModifiedOn.trim().length() > 0) {

            //query = " lastModifiedDate >= '" + lastModifiedOn + "'";
            //query = query + " AND isDeleted IS NULL";
        }


        String keys = processKeyParameters();
        if (keys != lastKeysString) {
            reset = true;
            session.setAttribute(name + "_lastKeyString", keys);
        }

        if (keys != "") {
            if (query != "") {
                query = query + " AND " + keys;
            } else {
                query = keys;
            }
        }

        String search = processSearchParameters();
        if (search != lastSearchString) {
            reset = true;
            session.setAttribute(name + "_lastSearchString", keys);
        }

        if (search != "") {
            if (query != "") {
                query = query + " AND " + search;
            } else {
                query = search;
            }
        }

        if (query != "") {
            searching =  true;
            query = " WHERE " + query ;
            if (customFilter != null && customFilter.length() > 0)
                query = query + " AND ( " + customFilter + " )";
        } else {
            if (customFilter != null && customFilter.length() > 0)
                query = query + " WHERE ( " + customFilter + " )";
        }

        return query;
    }

    private String processSortParameters() {

        String sortSQL = "";
        String sortColumns[] = request.getParameterValues("sortByColumn");
        String sortOrders[] = request.getParameterValues("sortByOrder");

        if (sortColumns == null || sortColumns.length == 0) {
            return " ORDER BY lastModifiedDate DESC";
        }

        for (int i = 0; i < sortColumns.length; i++) {

            String sortColumnName = sortColumns[i];

            if (sortColumnName.equalsIgnoreCase("lastModifiedOn")) {
                sortColumnName = "lastModifiedDate";
            }

            if (sortSQL == "") {
                sortSQL = sortColumnName;
            } else {
                sortSQL = sortSQL + ", " + sortColumnName;
            }

            if (sortOrders != null && i + 1 <= sortOrders.length) {

                sortSQL = sortSQL + " " + sortOrders[i];
            }

        }


        if (sortSQL != "") {
            sortSQL = " ORDER BY " + sortSQL;
        }

        return sortSQL;
    }

    private void processPaginationParameters() {


        String startRowString = request.getParameter("startRow");

        if (startRowString == null || startRowString.trim().length() == 0) {
            startRow = 1;
            startRowString = "1";
        } else {
            startRow = (new Integer(startRowString)).intValue();
        }

        session.setAttribute(name + "_lastStartRow", startRowString);

        if (startRow == 1 || startRow <= lastStartRow)
            reset = true;
       
        String numberOfRowsString = request.getParameter("numberOfRows");
        if (numberOfRowsString == null) {
            numberOfRows = 200;
        } else {
            numberOfRows = (new Integer(numberOfRowsString)).intValue();
        }

    }

    public String generateSQL() {

        String sql = primaryKeyField.getName();

        for (int i = 0; i < fields.size(); i++) {

            if (sql == "")
                sql = ((Field) fields.get(i)).getName();
            else
                sql = sql + ", " + ((Field) fields.get(i)).getName();
        }

        sql = "SELECT " + sql + " FROM " + sObjectName;

        sql = sql + processQueryParameters();
        sql = sql + processSortParameters();

        return sql;
    }

    public ArrayList getRecords() {

        ArrayList arrayList = new ArrayList();

        if (connection == null)
            return arrayList;

        try {


            QueryResult queryResult = null;
            String sql = generateSQL();

            connection.setQueryOptions(batchSize);

            if (!searching)
                queryResult = Utils.getQueryResultFromSession(session);

            if (queryResult == null || reset) {

                queryResult = null;
                lastStartRow = startRow;
                startRow = 1;
                if (startRow < lastStartRow) {
                    
                    while (startRow <= lastStartRow) {


                        if (queryResult == null)
                            queryResult =  connection.query(sql);
                        else
                            queryResult = connection.queryMore(queryResult.getQueryLocator());
                        startRow = startRow + batchSize; 
                    }
                } else {
                    queryResult =  connection.query(sql);
                }

               System.out.println("sql = " + sql);
               

            }  else {
                queryResult = connection.queryMore(queryResult.getQueryLocator());
            }

            if (queryResult.getSize() > 0 ) {

                for (SObject s : queryResult.getRecords()) {
                    
                    arrayList.add(s);
                    
                }
            }

            session.setAttribute(name + "_queryResult", queryResult);

        } catch (ConnectionException e) {

            e.printStackTrace();

        }

        return arrayList;

    }


    public ArrayList getCustomSQL(String sql) {

        ArrayList arrayList = new ArrayList();

        if (connection == null)
            return arrayList;

        try {
            
            QueryResult queryResult = null;

            if (!searching)
                Utils.getQueryResultFromSession(session);
            
            if (queryResult == null) {

               sql = sql + processQueryParameters();
               sql = sql + processSortParameters();


               System.out.println(sql);
               queryResult =  connection.query(sql);
               
            }  else {
                queryResult = connection.queryMore(queryResult.getQueryLocator());
            }

            if (queryResult.getSize() > 0 ) {

                for (SObject s : queryResult.getRecords()) {
                    arrayList.add(s);
                }
            }

            if (queryResult.isDone())
                session.setAttribute(name + "_queryResult", null);
            else
                session.setAttribute(name + "_queryResult", queryResult);
 
        } catch (ConnectionException e) {

            e.printStackTrace();

        }

        return arrayList;

    }

    public void setCustomFilter (String customFilter) {

        this.customFilter = customFilter;
    }


    public int getRecordCount() {

        if (recordCount != -1)
            return recordCount;

        if (connection == null)
            return 0;

        try {

            String sql = "select count() from " + sObjectName;

            sql = sql + processQueryParameters();

            QueryResult queryResult =  connection.query(sql);

            int recordCount = queryResult.getSize();

            session.setAttribute(name + "_recordCount", (new Integer(recordCount)).toString());

            System.out.append("count");

            return recordCount;


        } catch (ConnectionException e) {

            e.printStackTrace();

        }

        return 0;

    }

    public String getsObjectName() {
        return sObjectName;
    }

    public void setsObjectName(String sObjectName) {
        this.sObjectName = sObjectName;
    }

   

}
