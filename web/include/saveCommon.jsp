<%--
    Document   : save.jsp
    Created on : Jan 7, 2011
    Author     : Ali

    Modified by : Ali
    Date	: Mar 20, 2011
--%>
<%@page import="com.bitzermobile.mvl.sf.SalesforceComponentDML"%>
<%
SalesforceComponentDML componentDML = (SalesforceComponentDML) request.getAttribute("saveComponent");
componentDML.save();

String errorRows = componentDML.getErrorRows();
System.out.println("errors = " + errorRows);

//if (actionType.equalsIgnoreCase("update") && (expenseItemID == null || expenseItemID.trim().length() == 0) )
//    errorXML = "<tr><td data-bitzer-message-type=\"ERROR\" data-bitzer-field=\"expenseItemID\">Expense item ID is missing for update</td></tr>";

//if (actionType.equalsIgnoreCase("delete") && (expenseItemID == null || expenseItemID.trim().length() == 0) )
 //   errorXML = "<tr><td data-bitzer-message-type=\"ERROR\" data-bitzer-field=\"expenseItemID\">Expense item ID is missing for delete</td></tr>";


%>


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Saved</title>
    </head>
    <body>

                <%if (errorRows == null || errorRows.trim().length() == 0) {%>

                    <table data-bitzer-result="SUCCESS" data-bitzer-pk-name="<%=componentDML.getPrimaryKeyField().getName() %>" data-bitzer-pk-value="<%=componentDML.getPrimaryKeyField().toString() %>">
                        <tr><td><%=componentDML.getPrimaryKeyField().toString()%></td></tr>
                    </table>

                <%} else { %>
                    <table data-bitzer-result="MESSAGE" data-bitzer-pk-name="<%=componentDML.getPrimaryKeyField().getName()%>" data-bitzer-pk-value="<%=componentDML.getPrimaryKeyField().toString()%>">
                        <tr><th>Errors</th></tr>
                        <%
                            out.println(errorRows);
                        %>
                    </table>
                <% } %>

    </body>
</html>