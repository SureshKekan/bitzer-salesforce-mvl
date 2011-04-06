<%--
    Document   : save.jsp
    Created on : Jan 7, 2011
    Author     : Ali

    Modified by : Ali
    Date	: Mar 20, 2011
--%>
<%@page import="com.sforce.soap.partner.PartnerConnection"%>
<%

PartnerConnection connection = (PartnerConnection) session.getAttribute("connection");

if (connection == null)
    response.sendRedirect("/salesforce/login.jsp");

%>