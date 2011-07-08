<%--
    Document   : save.jsp
    Created on : Jan 7, 2011
    Author     : Ali

    Modified by : Ali
    Date	: Mar 20, 2011
--%>
<%@page import="com.bitzermobile.mvl.Field"%>
<%@page import="java.util.ArrayList"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

<%@ include file="../include/validatesession.jsp" %>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="bitzer-component" content="data"/>
        <title>SalesForce MVL</title>
    </head>
    <body>
<%
if (connection != null) {

    SalesforceComponent component = new SalesforceComponent("contacts", session, request);

    component.setPrimaryKeyField(new Field("Id", "string"));
    component.addField(new Field("Salutation", "string"));
    component.addField(new Field("FirstName", "string"));
    component.addField(new Field("LastName", "string"));
    component.addField(new Field("Title", "string"));
    component.addField(new Field("AccountId", "string"));
    component.addField(new Field("LeadSource", "string"));
    component.addField(new Field("Phone", "string"));
    component.addField(new Field("Fax", "string"));
    component.addField(new Field("MobilePhone", "string"));
    component.addField(new Field("MailingStreet", "string"));
    component.addField(new Field("MailingCity", "string"));
    component.addField(new Field("MailingState", "string"));
    component.addField(new Field("MailingPostalCode", "string"));
    component.addField(new Field("MailingCountry", "string"));
    component.addField(new Field("LastModifiedDate", "datetime"));
    component.addField(new Field("IsDeleted", "booblean"));
    component.setsObjectName("Contact");

    request.setAttribute("component", component);


%>

<%@ include file="../include/dataCommon.jsp" %>

<%
}
%>
    </body>
</html>