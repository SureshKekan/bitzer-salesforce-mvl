<%--
    Document   : save.jsp
    Created on : Jan 7, 2011
    Author     : Ali

    Modified by : Ali
    Date	: Mar 20, 2011

	Modified by : Uzair
    Date	: Apr 07, 2011
--%>
<%@page import="com.bitzermobile.mvl.sf.Login"%>
<HTML dir="ltr" lang="en-US">
    <HEAD>
        <meta name="bitzer-page-type" content="login">
        <title>Salesforce MVL</title>


    </HEAD>
    <%
                // Login with key

                /*String username = request.getParameter("username") == null ? "" : request.getParameter("username");
                String passwordKey = request.getParameter("password") == null ? "" : request.getParameter("password");
                String ErrorMsg = request.getParameter("ErrorMsg") == null ? "" : request.getParameter("ErrorMsg");
                String password = "";
		String key = "";

		if(passwordKey.length() > 25) {
                    password = passwordKey.substring(0, passwordKey.length() - 25);		//all characters excluding last 25 are password
                    key = passwordKey.substring(passwordKey.length() - 25, passwordKey.length());	//last 25 are key
		}*/

                // Login with pre-seeded key

                //String username = request.getParameter("username") == null ? "" : request.getParameter("username");
                String username = "ali@bitzermobile.com";
                String password = "bitmob123456";
                //String password = request.getParameter("password") == null ? "" : request.getParameter("password");
                String ErrorMsg = request.getParameter("ErrorMsg") == null ? "" : request.getParameter("ErrorMsg");
                String key = "CkwXbjwp9JswiIm0Pe8BqMV5";

		if (!ErrorMsg.equals("")) {
                    out.println("<center><font color='red'>" + ErrorMsg + "</font></center>");
                }

                if (username.equals("") || password.equals("")) {
                    out.println("<center><font color='red'>Enter a valid username and password!</font></center>");
                } else {

                    //-----------------------------------
                    // Perform login.
                    //-----------------------------------

                    Login login = new Login();
                    if (login.doLogin(username, password, key)) {

                        session.setAttribute("connection", login.getConnection());

                        response.sendRedirect("library.jsp");
                    }


                }

    %>
    <BODY>
        <form id="Form1"
              name="Form1"
              style="margin:0px"
              method="POST"
              action="login.jsp"
              data-bitzer-login-form="true"
              >
            <input type="hidden" name="blnSubmit" value="1">
            <table width="80%" align="center" summary="" border="0" cellspacing="0" cellpadding="0">
                <tr><td>
                        <table width="100%" align="center" summary="" border="0" cellspacing="0" cellpadding="4">
                            <tr><td width="10%" align="right" colspan="2">&nbsp;</td></tr>
                            <tr>
                                <td width="10%" align="right"><span class="x3x">&nbsp;&nbsp;Username:&nbsp;</span></td>
                                <td width="20%" align="left">
                                    <input name="username"
                                           value=""
                                           size="20"
                                           type="text"
                                           maxlength="20"
                                           data-bitzer-username="true">
                                </td>
                            </tr>
                            <tr>
                                <td width="10%" align="right"><span class="x3x">&nbsp;&nbsp;Password:&nbsp;</span></td>
                                <td width="20%" align="left">
                                    <input name="password"
                                           size="20"
                                           type="password"
                                           value=""
                                           maxlength="50"
                                           data-bitzer-password="true">
                                </td>
                            </tr>

                            <tr>
                                <td width="10%" align="right"><span class="x3x">&nbsp;</span></td>
                                <td width="20%" align="left"><input type="submit" value="Login" style="font-size: 10pt; color: black">
                                </td>
                            </tr>

                            <tr><td width="10%" align="right" colspan="2">&nbsp;</td></tr>
                            <tr><td width="10%" align="right" colspan="2">&nbsp;</td></tr>
                        </table>
                    </td></tr>
            </table>
        </form>
    </BODY>
</HTML>
