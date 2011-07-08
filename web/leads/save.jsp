<%--
    Document   : save.jsp
    Created on : Jan 7, 2011
    Author     : Ali

    Modified by : Ali
    Date	: Mar 20, 2011
--%>
<%@page import="com.bitzermobile.mvl.Field"%>
<%@page import="com.bitzermobile.mvl.sf.SalesforceComponentDML"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<%@ include file="../include/validatesession.jsp" %>

<%

SalesforceComponentDML saveComponent = new SalesforceComponentDML("leads", request);

saveComponent.setPrimaryKeyField(new Field("Id", "string"));
saveComponent.addField(new Field("Salutation", "string"));
saveComponent.addField(new Field("FirstName", "string"));
saveComponent.addField(new Field("LastName", "string"));
saveComponent.addField(new Field("Title", "string"));
saveComponent.addField(new Field("Company", "string"));
saveComponent.addField(new Field("Phone", "string"));
saveComponent.addField(new Field("MobilePhone", "string"));
saveComponent.addField(new Field("Fax", "string"));
saveComponent.addField(new Field("Email", "string"));
saveComponent.addField(new Field("Website", "string"));
saveComponent.addField(new Field("Street", "string"));
saveComponent.addField(new Field("City", "string"));
saveComponent.addField(new Field("State", "string"));
saveComponent.addField(new Field("PostalCode", "string"));
saveComponent.addField(new Field("Country", "string"));
saveComponent.addField(new Field("LeadSource", "string"));
saveComponent.addField(new Field("Status", "string"));
saveComponent.addField(new Field("LastModifiedDate", "datetime"));
saveComponent.setsObjectName("Lead");

request.setAttribute("saveComponent", saveComponent);

%>
<%@ include file="../include/saveCommon.jsp" %>