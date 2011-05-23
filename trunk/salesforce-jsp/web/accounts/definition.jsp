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
        <form   name="accounts"
                action="save.jsp"
                method="POST"

                data-bitzer-desc="Accounts"
                data-bitzer-type="COMPONENT"
                data-bitzer-title="Accounts"
                data-bitzer-data-url="/salesforce/accounts/data.jsp"
                data-bitzer-sync-scheme="WEBAPP_SOFT"
                data-bitzer-pagination="true"
                data-bitzer-read-only="true"
                data-bitzer-online-only="true"
                data-bitzer-detail-table-id="account-details"
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
                    data-bitzer-type="company"
                    data-bitzer-help-text="Account name"
                    data-bitzer-display-group-name="account-info"
                    data-bitzer-display-group-order="1"
                    data-bitzer-display-group-title="Account Info"
                    >
            <input  type="text"
                    name="AccountNumber"
                    readonly
                    data-bitzer-label="Account Number"
                    data-bitzer-short-label="Acct #"
                    data-bitzer-type="string"
                    data-bitzer-help-text="Account number for account"
                    data-bitzer-display-group-name="account-info"
                    >
            <input  type="text"
                    name="Site"
                    readonly
                    data-bitzer-label="Account Site"
                    data-bitzer-short-label="Site"
                    data-bitzer-type="string"
                    data-bitzer-help-text="Site of account"
                    data-bitzer-display-group-name="account-info"
                    >
            <input  type="text"
                    name="Type"
                    readonly
                    data-bitzer-label="Type"
                    data-bitzer-type="string"
                    data-bitzer-help-text="Account type"
                    data-bitzer-display-group-name="account-info"
                    >
            <input  type="text"
                    name="Industry"
                    data-bitzer-label="Industry"
                    data-bitzer-type="string"
                    data-bitzer-help-text="Title of contact"
                    data-bitzer-display-group-name="account-info"
                    >
            <input  type="text"
                    name="Website"
                    value=""
                    data-bitzer-label="Website"
                    data-bitzer-type="url"
                    data-bitzer-help-text="Company Website"
                    data-bitzer-display-group-name="account-info"
                    >
            <input  type="text"
                    name="Phone"
                    readonly
                    data-bitzer-label="Phone"
                    data-bitzer-short-label="Phone"
                    data-bitzer-type="tel"
                    data-bitzer-help-text="Phone number"
                    data-bitzer-display-group-name="contact-info"
                    data-bitzer-display-group-order="2"
                    data-bitzer-display-group-title="Contact Info"
                    >
            <input  type="text"
                    name="Fax"
                    readonly
                    data-bitzer-label="Fax"
                    data-bitzer-short-label="Fax"
                    data-bitzer-type="fax"
                    data-bitzer-help-text="Fax"
                    data-bitzer-display-group-name="contact-info"
                    >

            <input readonly
                   type="text"
                   name="last_modified_on"
                   value=""
                   data-bitzer-label="Modified On"
                   data-bitzer-help-text="The record was last modified on this date."
                   data-bitzer-type="datetime"
                   data-bitzer-read-only="true"
                   >


        </form>

        <table id="account-details" data-bitzer-detail-section-title="Related Information">
            <tr data-bitzer-component="contacts">
                <td data-bitzer-master-field="Id"
                    data-bitzer-detail-field="AccountId">
                </td>
            </tr>
            <tr data-bitzer-component="opportunities">
                <td data-bitzer-master-field="Id"
                    data-bitzer-detail-field="AccountId">
                </td>
            </tr>
        </table>
    </body>
</html>