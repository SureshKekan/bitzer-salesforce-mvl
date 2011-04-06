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
        <table id="contacts-view"
               data-bitzer-view-name="contacts-view"
               data-bitzer-title="Contacts"
               data-bitzer-desc="Contacts"
               data-bitzer-component="contacts"
               data-bitzer-default-view="true"
               data-bitzer-view-style="SIMPLE"
               data-bitzer-sort-fields="FirstName, LastName"
               data-bitzer-title-color="#57328E"
               >
            <tr>
                <th data-bitzer-field-1="Salutation"
                    data-bitzer-field-2="FirstName"
                    data-bitzer-field-3="LastName"/>
                <th></th>
            </tr>
        </table>
    </body>
</html>
