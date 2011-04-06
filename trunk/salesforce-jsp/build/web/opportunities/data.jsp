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

    SalesforceComponent component = new SalesforceComponent("opportunities", session, request);

    component.setPrimaryKeyField(new Field("Id", "string"));
    component.addField(new Field("Name", "string"));
    component.addField(new Field("AccountId", "string"));
    component.addField(new Field("Type", "string"));
    component.addField(new Field("LeadSource", "string"));
    component.addField(new Field("Amount", "string"));
    component.addField(new Field("CloseDate", "datetime"));
    component.addField(new Field("StageName", "string"));
    component.addField(new Field("LastModifiedDate", "datetime"));
    component.addField(new Field("IsDeleted", "booblean"));
    component.setsObjectName("Opportunity");

    request.setAttribute("component", component);

%>
<%@ include file="../include/dataCommon.jsp" %>

<%
}
%>
    </body>
</html>