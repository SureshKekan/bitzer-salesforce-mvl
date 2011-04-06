<%--
    Document   : save.jsp
    Created on : Jan 7, 2011
    Author     : Ali

    Modified by : Ali
    Date	: Mar 20, 2011
--%>
<%@page import="com.bitzermobile.mvl.Field"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<%@ include file="../include/validatesession.jsp" %>

<%

SalesforceComponentDML saveComponent = new SalesforceComponentDML("accounts", request);

saveComponent.setPrimaryKeyField(new Field("Id", "string"));
saveComponent.addField(new Field("Name", "string"));
saveComponent.addField(new Field("Type", "string"));
saveComponent.addField(new Field("Industry", "string"));
saveComponent.addField(new Field("Website", "string"));
saveComponent.addField(new Field("Phone", "string"));
saveComponent.addField(new Field("Fax", "string"));
saveComponent.addField(new Field("LastModifiedDate", "datetime"));
saveComponent.setsObjectName("Account");

request.setAttribute("saveComponent", saveComponent);

%>
<%@ include file="../include/saveCommon.jsp" %>