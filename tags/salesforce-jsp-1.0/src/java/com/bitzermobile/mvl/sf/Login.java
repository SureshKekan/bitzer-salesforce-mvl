/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package com.bitzermobile.mvl.sf;

import com.sforce.soap.partner.Connector;
import com.sforce.soap.partner.PartnerConnection;
import com.sforce.ws.ConnectorConfig;


/**
 *
 * @author ali
 */
public class Login {

    private PartnerConnection connection = null;

    public boolean doLogin(String  username, String password, String key) {


        if (username.length() == 0 || password.length() == 0)
            return false;
        else {

            ConnectorConfig config = new ConnectorConfig();
            config.setUsername(username);
            config.setPassword(password + key);
            
            try {
                connection = Connector.newConnection(config);

                System.out.println("Login was successfull.");

                return true;
            } catch (Exception e) {
                e.printStackTrace();
                return false;
            }
        }
        
    }

   /* public boolean doLoginx(String  username, String password, String key) {



        if (username.length() == 0 || password.length() == 0 || key.length() == 0)
            return false;
        else {
            try {

                binding = (SoapBindingStub) new SforceServiceLocator()
                        .getSoap();
            } catch (ServiceException ex1) {
                System.out.println(ex1.getMessage());
                return false;
            }
            try {
                lr = binding.login(username, password + key);
            } catch (UnexpectedErrorFault ex2) {
                System.out.println(ex2.getExceptionMessage() + "\n\n");
                return false;
            } catch (LoginFault ex2) {
                System.out.println(ex2.getExceptionMessage() + "\n\n");
                return false;
            } catch (RemoteException ex2) {
                System.out.println(ex2.getMessage() + "\n\n");
                return false;
            }
            System.out.println("Login was successfull.");
            System.out.print("The returned session id is: ");
            System.out.println(lr.getSessionId());
            System.out.print("Your logged in user id is: ");
            System.out.println(lr.getUserId() + " \n\n");

            // on a successful login, you should always set up your session id
            // and the url for subsequent calls

            // reset the url endpoint property, this will cause subsequent calls
            // to made to the serverURL from the login result
            binding._setProperty(SoapBindingStub.ENDPOINT_ADDRESS_PROPERTY, lr
                    .getServerUrl());

            // create a session head object
            SessionHeader sh = new SessionHeader();
            // set the sessionId property on the header object using
            // the value from the login result
            sh.setSessionId(lr.getSessionId());
            // add the header to the binding stub
            String sforceURI = new SforceServiceLocator().getServiceName()
                    .getNamespaceURI();
            binding.setHeader(sforceURI, "SessionHeader", sh);
            return true;
        }

    }*/

    /*public SoapBindingStub getBinding() {
        return binding;
    }

    public void setBinding(SoapBindingStub binding) {
        this.binding = binding;
    }

    public LoginResult getLr() {
        return lr;
    }

    public void setLr(LoginResult lr) {
        this.lr = lr;
    }*/

     public PartnerConnection getConnection() {
        return connection;
    }

    public void setConnection(PartnerConnection connection) {
        this.connection = connection;
    }

}
