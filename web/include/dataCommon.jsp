<%--
    Document   : save.jsp
    Created on : Jan 7, 2011
    Author     : Ali

    Modified by : Ali
    Date	: Mar 20, 2011
--%>
<%@page import="com.bitzermobile.mvl.Utils"%>
<%@page import="com.bitzermobile.mvl.Field"%>
<%@page import="com.sforce.soap.partner.sobject.SObject"%>
<%@page import="com.bitzermobile.mvl.sf.SalesforceComponent"%>
<%@page import="java.util.ArrayList"%>
<%

SalesforceComponent dataComponent = (SalesforceComponent) request.getAttribute("component");

String recordCountString = request.getParameter("recordCount");

if (recordCountString != null && recordCountString.length() > 0 && recordCountString.equalsIgnoreCase("y")) {

    int recordCount = dataComponent.getRecordCount();

 %>

 <table data-bitzer-data="true"
       data-bitzer-component="<%=dataComponent.getName()%>"
       data-bitzer-record-count="<%=recordCount%>">

     <tr><td></td></tr>

 </table>
 

 <%
 } else {

    ArrayList recordsList = dataComponent.getRecords();

    int startRow = 1;
    int numberOfRows = 200;
    int recordCount = dataComponent.getRecordCount();


%>


<table data-bitzer-data="true"
       data-bitzer-component="<%=dataComponent.getName()%>"
       data-bitzer-start-index="<%=startRow%>"
       data-bitzer-number-of-rows="<%=numberOfRows%>"
       data-bitzer-record-count="<%=recordCount%>"
       >
    <tr>
        <th data-bitzer-field="<%=dataComponent.getPrimaryKeyField().getName() %>" data-bitzer-key-order="1"><%=dataComponent.getPrimaryKeyField().getName() %></th>
        <%
        for (int i = 0; i < dataComponent.getFields().size(); i++) {
            Field field = (Field) dataComponent.getFields().get(i);

            if (field.getName().equalsIgnoreCase("isdeleted"))
                break;
            if (field.getName().equalsIgnoreCase("LastModifiedDate"))
                field.setName("last_modified_on");

        %>
        <th data-bitzer-field="<%=field.getName() %>" ><%=field.getName() %></th>
        <%
        }
        %>
    </tr>
    <% for (int i = 0; i < recordsList.size(); i++) {

        SObject sObject = (SObject) recordsList.get(i);
        String isDeleted = (String) sObject.getField("IsDeleted");

        if (isDeleted != null && isDeleted == "true") {
    %>
        <tr data-bitzer-deleted="true">
    <% } else { %>
        <tr>
    <%
    }
    %>
    <td><%=sObject.getField(dataComponent.getPrimaryKeyField().getName())%></td>
        <%
             for (int f = 0; f < dataComponent.getFields().size(); f++) {
                 Field field = (Field) dataComponent.getFields().get(f);
                 if (field.getName().equalsIgnoreCase("isdeleted"))
                    break;
                 if (field.getName().equalsIgnoreCase("last_modified_on"))
                    field.setName("LastModifiedDate");

        %>
        <td><%=Utils.format(sObject.getField(field.getName()), field.getType())%></td>
        <%
         }
        %>
    </tr>


    <%
    }
    %>

</table>

<%
}
%>