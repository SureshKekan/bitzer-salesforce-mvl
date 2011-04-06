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

SalesforceComponentDML saveComponent = new SalesforceComponentDML("contacts", request);

saveComponent.setPrimaryKeyField(new Field("Id", "string"));
saveComponent.addField(new Field("Salutation", "string"));
saveComponent.addField(new Field("FirstName", "string"));
saveComponent.addField(new Field("LastName", "string"));
saveComponent.addField(new Field("Title", "string"));
saveComponent.addField(new Field("AccountId", "string"));
saveComponent.addField(new Field("LeadSource", "string"));
saveComponent.addField(new Field("Phone", "string"));
saveComponent.addField(new Field("Fax", "string"));
saveComponent.addField(new Field("MobilePhone", "string"));
saveComponent.addField(new Field("MailingStreet", "string"));
saveComponent.addField(new Field("MailingCity", "string"));
saveComponent.addField(new Field("MailingState", "string"));
saveComponent.addField(new Field("MailingPostalCode", "string"));
saveComponent.addField(new Field("MailingCountry", "string"));
saveComponent.addField(new Field("LastModifiedDate", "datetime"));
saveComponent.addField(new Field("IsDeleted", "booblean"));
saveComponent.setsObjectName("Contact");

request.setAttribute("saveComponent", saveComponent);

%>
<%@ include file="../include/saveCommon.jsp" %>