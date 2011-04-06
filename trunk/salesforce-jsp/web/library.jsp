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
<%@ include file="include/validatesession.jsp" %>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Salesforce MVL</title>

    </head>
    <body>
        
        <UL data-bitzer-library-name="Salesforce"
            data-bitzer-library-desc="Salesforce"
            data-bitzer-library-timezone-offset="-7"
            data-bitzer-library-style="TABLE"
            data-bitzer-readonly="true"
            data-bitzer-library-image="images/sf.jpeg"
            data-bitzer-single-component="false">
            <LI data-bitzer-components="true">Components
                <UL>
                    .<LI data-bitzer-form-name="accounts"
                        data-bitzer-last-modified="2010-03-26 00:00:00 EST"
                        data-bitzer-image-url="images/accounts.png">
                        <A HREF="accounts/definition.jsp">Accounts</A>
                        <UL>
                            <LI data-bitzer-table-id="accounts-view"
                                data-bitzer-last-modified="2010-02-09 08:50:00 EST"
                                data-bitzer-image-url="images/accounts.png">
                                <A HREF="accounts/default_view.jsp">Accounts Default view</A>
                            </LI>
                        </UL>
                    </LI>
                    <LI data-bitzer-form-name="contacts"
                        data-bitzer-last-modified="2010-03-26 00:00:00 EST"
                        data-bitzer-image-url="images/contacts.png">
                        <A HREF="contacts/definition.jsp">Contacts</A>
                        <UL>
                            <LI data-bitzer-table-id="contacts-view"
                                data-bitzer-last-modified="2010-02-09 08:50:00 EST"
                                data-bitzer-image-url="images/contacts.png">
                                <A HREF="contacts/default_view.jsp">Contacts Default view</A>
                            </LI>
                        </UL>
                    </LI>
                    <LI data-bitzer-form-name="opportunities"
                        data-bitzer-last-modified="2010-03-26 00:00:00 EST"
                        data-bitzer-image-url="images/opportunities.png">
                        <A HREF="opportunities/definition.jsp">Opportunities</A>
                        <UL>
                            <LI data-bitzer-table-id="opportunities-view"
                                data-bitzer-last-modified="2010-02-09 08:50:00 EST"
                                data-bitzer-image-url="images/opportunities.png">
                                <A HREF="opportunities/default_view.jsp">Opportunities Default view</A>
                            </LI>
                        </UL>
                    </LI>
                    <LI data-bitzer-form-name="leads"
                        data-bitzer-last-modified="2010-03-26 00:00:00 EST"
                        data-bitzer-image-url="images/leads.png">
                        <A HREF="leads/definition.jsp">Leads</A>
                        <UL>
                            <LI data-bitzer-table-id="leads-view"
                                data-bitzer-last-modified="2010-02-09 08:50:00 EST"
                                data-bitzer-image-url="images/leads.png">
                                <A HREF="leads/default_view.jsp">Leads Default view</A>
                            </LI>
                        </UL>
                    </LI>
                </UL>
            </LI>
        </UL>

    </body>
</html>
