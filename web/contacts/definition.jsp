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
        <form   name="contacts"
                action="save.jsp"
                method="POST"

                data-bitzer-desc="Contacts"
                data-bitzer-type="CONTACT"
                data-bitzer-title="Contacts"
                data-bitzer-data-url="/salesforce/contacts/data.jsp"
                data-bitzer-sync-scheme="WEBAPP_SOFT"
                data-bitzer-pagination="true"
                data-bitzer-read-only="true"
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
                    name="Salutation"
                    data-bitzer-label="Salutation"
                    data-bitzer-type="salutation"
                    data-bitzer-help-text="Salutation"
                    data-bitzer-display-group-name="person-info"
                    data-bitzer-display-group-order="1"
                    data-bitzer-display-group-title="Person Info"
                    data-bitzer-display-group-type="person-info"
                    >
            <input  type="text"
                    name="FirstName"
                    data-bitzer-label="First Name"
                    data-bitzer-type="firstName"
                    data-bitzer-help-text="First name"
                    data-bitzer-display-group-name="person-info"
                    >
            <input  type="text"
                    name="LastName"
                    readonly
                    data-bitzer-label="Last name"
                    data-bitzer-short-label="Last"
                    data-bitzer-type="lastName"
                    data-bitzer-help-text="Last name of contact"
                    data-bitzer-display-group-name="person-info"
                    >
            <input  type="text"
                    name="Title"
                    data-bitzer-label="Title"
                    data-bitzer-type="title"
                    data-bitzer-help-text="Title of contact"
                    data-bitzer-display-group-name="person-info"
                    >
            <input  type="text"
                    name="Phone"
                    data-bitzer-label="Phone"
                    data-bitzer-type="tel"
                    data-bitzer-help-text="Phone"
                    data-bitzer-display-group-name="contact-info"
                    data-bitzer-display-group-order="2"
                    data-bitzer-display-group-title="Contact Info"
                    >
            <input  type="text"
                    name="Fax"
                    data-bitzer-label="Fax"
                    data-bitzer-type="fax"
                    data-bitzer-help-text="Fax"
                    data-bitzer-display-group-name="contact-info"
                    >
            <input  type="text"
                    name="MobilePhone"
                    data-bitzer-label="Mobile Phone"
                    data-bitzer-type="cell"
                    data-bitzer-short-label="Cell"
                    data-bitzer-help-text="Mobile Phone"
                    >
            <input  type="text"
                    name="MailingStreet"
                    data-bitzer-label="Street"
                    data-bitzer-type="street"
                    data-bitzer-help-text="Mailing street"
                    data-bitzer-display-group-name="address-info"
                    data-bitzer-display-group-order="3"
                    data-bitzer-display-group-type="address"
                    data-bitzer-display-group-title="Mailing Address"
                    >
            <input  type="text"
                    name="MailingCity"
                    data-bitzer-label="City"
                    data-bitzer-type="city"
                    data-bitzer-help-text="Mailing city"
                    data-bitzer-display-group-name="address-info"
                    >
            <input  type="text"
                    name="MailingPostalCode"
                    data-bitzer-label="Postal Code"
                    data-bitzer-short-label="zip"
                    data-bitzer-type="postalcode"
                    data-bitzer-help-text="Mailing postal codet"
                    data-bitzer-display-group-name="address-info"
                    >
            <input  type="text"
                    name="MailingCountry"
                    data-bitzer-label="Country"
                    data-bitzer-type="country"
                    data-bitzer-help-text="Mailing country"
                    data-bitzer-display-group-name="address-info"
                    >
            <input  type="text"
                    name="AccountId"
                    data-bitzer-label="Account"
                    data-bitzer-type="string"
                    data-bitzer-help-text="Account"
                    data-bitzer-display-group-name="account-info"
                    data-bitzer-display-group-order="4"
                    data-bitzer-display-group-title="Account Info"
                    >
            <input  type="text"
                    name="LeadSource"
                    data-bitzer-label="Source"
                    data-bitzer-short-label="Src."
                    data-bitzer-type="string"
                    data-bitzer-help-text="Lead source"
                    data-bitzer-display-group-name="account-info"
                    >

            <input readonly
                   type="text"
                   name="last_modified_on"
                   data-bitzer-label="Modified On"
                   data-bitzer-help-text="The record was last modified on this date."
                   data-bitzer-type="datetime"
                   data-bitzer-read-only="true"
                   >
        </form>
    </body>
</html>