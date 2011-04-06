/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package com.bitzermobile.mvl;

import com.sforce.soap.partner.QueryResult;
import java.text.DateFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;
import javax.servlet.http.HttpSession;

/**
 *
 * @author ali
 */
public class Utils {

    public static Object nvl(Object obj) {
        if (obj == null)
            return "";
        else
            return obj;
    }

    public static String dateToString(Date date) {

        if (date == null)
            return "";
        
        SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");
        return formatter.format(date);

    }

    public static QueryResult getQueryResultFromSession(HttpSession session) {

        try {

            return (QueryResult) session.getAttribute("queryResult");

        } catch (Exception e) {

        }

        return null;
    }

    public static Object format (Object obj, String fieldType) {

        if (obj == null)
            return "";
        else if(fieldType.equalsIgnoreCase("string"))
            return obj;

        else if(fieldType.equalsIgnoreCase("integer"))
            return obj;

        else if(fieldType.equalsIgnoreCase("double"))
            return obj;

        else if(fieldType.equalsIgnoreCase("boolean"))
            return obj;

        else if(fieldType.equalsIgnoreCase("datetime")) {

            DateFormat sfDateFormat = new SimpleDateFormat("yyyy-MM-dd'T'hh:mm:ss.S'Z'");
            DateFormat bitzerDateFormat = new SimpleDateFormat("yyyy-MM-dd hh:mm:ss");

            try {
                String sfDateString = (String) obj;
                Date sfDate = sfDateFormat.parse(sfDateString);
                return bitzerDateFormat.format(sfDate);
            } catch (ParseException e) {
                e.printStackTrace();
                return "";
            }

        } else
            return obj;
            
    }

}
