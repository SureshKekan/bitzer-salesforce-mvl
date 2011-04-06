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
        <table id="accounts-view"
               data-bitzer-view-name="accounts-view"
               data-bitzer-title="Accounts"
               data-bitzer-desc="Accounts"
               data-bitzer-component="accounts"
               data-bitzer-default-view="true"
               data-bitzer-view-style="FOUR_CELLS"
               data-bitzer-sort-fields="Name"
               data-bitzer-title-color="#236FBD"
               >
            <tr>
                <th data-bitzer-field="Name" />
                <th></th>
                <th data-bitzer-field="Industry" data-bitzer-show-label="true" />
                <th data-bitzer-field="Type" data-bitzer-show-label="true" ></th>
            </tr>
        </table>
    </body>
</html>
