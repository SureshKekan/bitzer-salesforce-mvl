<%--
    Document   : save.jsp
    Created on : Jan 7, 2011
    Author     : Ali

    Modified by : Ali
    Date	: Mar 20, 2011
--%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<%@ include file="../include/validatesession.jsp" %>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>SalesForce MVL</title>
    </head>
    <body>
        <table id="opportunities-view"
               data-bitzer-view-name="opportunities-view"
               data-bitzer-title="Opportunities"
               data-bitzer-desc="Opportunities"
               data-bitzer-component="opportunities"
               data-bitzer-default-view="true"
               data-bitzer-view-style="FOUR_CELLS"
               data-bitzer-sort-fields="Name"
               data-bitzer-title-color="#E0C31B"
               >
            <tr>
                <th data-bitzer-field="Name" />
                <th data-bitzer-field="Amount"></th>
                <th data-bitzer-field="StageName" data-bitzer-show-label="true" />
                <th data-bitzer-field="LeadSource" data-bitzer-show-label="true" />
            </tr>
        </table>
    </body>
</html>
