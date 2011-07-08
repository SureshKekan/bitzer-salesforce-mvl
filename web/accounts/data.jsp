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

    SalesforceComponent component = new SalesforceComponent("accounts", session, request);

    component.setPrimaryKeyField(new Field("Id", "string"));
    component.addField(new Field("Name", "string"));
    component.addField(new Field("AccountNumber", "string"));
    component.addField(new Field("Site", "string"));
    component.addField(new Field("Type", "string"));
    component.addField(new Field("Industry", "string"));
    component.addField(new Field("Website", "string"));
    component.addField(new Field("Phone", "string"));
    component.addField(new Field("Fax", "string"));
    component.addField(new Field("AnnualRevenue", "number"));
    component.addField(new Field("Rating", "string"));
    component.addField(new Field("Ownership", "string"));
    component.addField(new Field("NumberOfEmployees", "integer"));
    component.addField(new Field("Sic", "string"));
    component.addField(new Field("SLA__c", "string"));
    component.addField(new Field("SLAExpirationDate__c", "date"));
    component.addField(new Field("SLASerialNumber__c", "string"));
    component.addField(new Field("NumberOfLocations__c", "integer"));
    component.addField(new Field("UpsellOpportunity__c", "string"));
    component.addField(new Field("Active__c", "string"));
    component.addField(new Field("CreatedDate", "date"));
    component.addField(new Field("LastModifiedDate", "datetime"));
    component.addField(new Field("IsDeleted", "booblean"));
    component.setsObjectName("Account");

    component.setCustomFilter("IsDeleted = false");

    request.setAttribute("component", component);

%>

    <%@ include file="../include/dataCommon.jsp" %>

<%
}
%>
    </body>
</html>