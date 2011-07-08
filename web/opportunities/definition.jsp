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
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="last-modified" content="Thu, 18 Nov 2008 19:11:42 GMT" />
        <title>SalesForce MVL</title>
    </head>
    <body>
        <form   name="opportunities"
                action="save.jsp"
                method="POST"

                data-bitzer-desc="Opportunities"
                data-bitzer-type="COMPONENT"
                data-bitzer-title="Opportunities"
                data-bitzer-data-url="/salesforce/opportunities/data.jsp"
                data-bitzer-sync-scheme="WEBAPP_SOFT"
                data-bitzer-pagination="true"
                data-bitzer-read-only="false"
                data-bitzer-online-only="true"
                >
            <input type="hidden" name="Id" value=""
                   data-bitzer-primary-key="true"
                   data-bitzer-type="string">

            <!-- <input type="file"
                    name="photo"
                    data-bitzer-label="Photo"
                    data-bitzer-short-label="Pic"
                    data-bitzer-type="image"
                    data-bitzer-help-text="Photo of contact"
                    data-bitzer-display-group-name="Name"
                    data-bitzer-display-group-order="1"
                    data-bitzer-display-group-title="Name"
                    >-->
            <input  type="text"
                    name="Name"
                    readonly
                    data-bitzer-label="Name"
                    data-bitzer-type="string"
                    data-bitzer-help-text="Opportunity Name"
                    data-bitzer-display-group-name="opportunity-info"
                    data-bitzer-display-group-order="1"
                    data-bitzer-display-group-title="Opportunity Info"
                    >
            <input  type="text"
                    name="AccountId"
                    readonly
                    data-bitzer-label="Account"
                    data-bitzer-type="string"
                    data-bitzer-help-text="Account name"
                    data-bitzer-display-group-name="opportunity-info"
                    >
            <input  type="text"
                    name="Type"
                    readonly
                    data-bitzer-label="Type"
                    data-bitzer-short-label="Type"
                    data-bitzer-type="string"
                    data-bitzer-help-text="Opportunity type"
                    data-bitzer-display-group-name="opportunity-info"
                    >
            <input  type="text"
                    name="LeadSource"
                    data-bitzer-label="Lead Source"
                    data-bitzer-short-label="Source"
                    data-bitzer-type="string"
                    data-bitzer-help-text="Lead source"
                    data-bitzer-display-group-name="opportunity-info"
                    >
            <input  type="text"
                    name="Amount"
                    value=""
                    data-bitzer-label="Amount"
                    data-bitzer-type="currency"
                    data-bitzer-help-text="Amount"
                    data-bitzer-display-group-name="opportunity-info"
                    >

            <input  type="text"
                    name="CloseDate"
                    value=""
                    data-bitzer-label="Close Date"
                    data-bitzer-type="date"
                    data-bitzer-help-text="Close"
                    data-bitzer-display-group-name="opportunity-info"
                    >

            <input  type="text"
                    name="StageName"
                    value=""
                    data-bitzer-label="Stage Name"
                    data-bitzer-short-label="Stage"
                    data-bitzer-type="string"
                    data-bitzer-help-text="Stage"
                    data-bitzer-display-group-name="opportunity-info"
                    >

            <input readonly
                   type="text"
                   name="LastModifiedDate"
                   value=""
                   data-bitzer-label="Modified On"
                   data-bitzer-help-text="The record was last modified on this date."
                   data-bitzer-type="datetime"
                   data-bitzer-read-only="true"
                   >
        </form>

    </body>
</html>