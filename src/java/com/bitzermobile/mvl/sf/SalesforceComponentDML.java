/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package com.bitzermobile.mvl.sf;

import com.bitzermobile.mvl.Component;
import com.bitzermobile.mvl.Field;
import com.sforce.soap.partner.PartnerConnection;
import com.sforce.soap.partner.SaveResult;
import com.sforce.soap.partner.UpsertResult;
import com.sforce.soap.partner.sobject.SObject;
import com.sforce.ws.ConnectionException;
import java.util.Date;
import java.util.Enumeration;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.http.HttpServletRequest;
import org.apache.axis.message.MessageElement;
import org.w3c.dom.Element;

/**
 *
 * @author ali
 */
public class SalesforceComponentDML extends Component {

    private PartnerConnection connection = null;

    protected String sObjectName;
    String errorRows;
    
    public SalesforceComponentDML (String componentName, HttpServletRequest request) {

        super(componentName);
        this.name = componentName;
        this.request = request;
        this.session = request.getSession();
        this.connection = (PartnerConnection) this.session.getAttribute("connection");
        this.errorRows = "";
        
        
    }

    private MessageElement newMessageElement(String name, Object value)
			throws Exception {

		MessageElement me = new MessageElement("", name); // , value);
		me.setObjectValue(value);
		Element e = me.getAsDOM();
		e.removeAttribute("xsi:type");
		e.removeAttribute("xmlns:ns1");
		e.removeAttribute("xmlns:xsd");
		e.removeAttribute("xmlns:xsi");

		me = new MessageElement(e);
		return me;
	}


    public boolean save() {

        String actionType = request.getParameter("actionType");

        

        
System.out.println("Attributes");
Enumeration en = request.getParameterNames();
        while (en.hasMoreElements()) {
            
            String name = (String) en.nextElement();
            System.out.println(name + " = " + request.getParameter(name));
        }

        primaryKeyField.setValue(request.getParameter(primaryKeyField.getName()));
        for (int i=0; i < fields.size(); i++) {
            Field field = (Field) fields.get(i);
            if (!field.getName().equalsIgnoreCase("Id")) {
                field.setValue(request.getParameter(field.getName()));
                fields.set(i, field);
            }
        }

        if (actionType == null || actionType.length() == 0 || actionType.equalsIgnoreCase("UPDATE")) {

            try {           
                SObject sObject = new SObject();
                sObject.setType(sObjectName);
                sObject.setId(primaryKeyField.stringValue());
                MessageElement[] ufields = new MessageElement[fields.size()+1];
                for (int i = 0; i < fields.size(); i++) {
                    Field field = (Field) fields.get(i);
                    if (field.getName().equalsIgnoreCase("Registration_Status__c") || field.getName().equalsIgnoreCase("Registration_Status__c"))
                        sObject.addField(field.getName(), field.getValue());
                }
                
                SaveResult[] saveResults = connection.update(new SObject[] {sObject});
                for (SaveResult saveResult : saveResults) {
                     if (saveResult.isSuccess()) {
                        System.out.println("\nUpsert succeeded.");
                        System.out.println("Account ID: " + saveResult.getId());
                        primaryKeyField.setValue(saveResult.getId());
                    } else {
                        addError(null, saveResult.getErrors()[0].getMessage());
                        System.out.println("The Upsert failed because: " +
                        saveResult.getErrors()[0].getMessage());
                        System.out.println(getErrorRows());
                        return false;
                    }

                }
                return true;
            } catch (ConnectionException ex) {
                addError(null, ex.getMessage());
                System.out.println("exception!!");
                Logger.getLogger(SalesforceComponentDML.class.getName()).log(Level.SEVERE, null, ex);
                ex.printStackTrace();


            } catch (Exception ex) {
                addError(null, ex.getMessage());
                Logger.getLogger(SalesforceComponentDML.class.getName()).log(Level.SEVERE, null, ex);
                ex.printStackTrace();
            }



        } else if (actionType.equalsIgnoreCase("DELETE") ) {
            try {
                connection.delete(new String[]{primaryKeyField.stringValue()});
                return true;
            } catch (ConnectionException ex) {
                Logger.getLogger(SalesforceComponentDML.class.getName()).log(Level.SEVERE, null, ex);
            }

        }

        return false;

    }

    public String getsObjectName() {
        return sObjectName;
    }

    public void setsObjectName(String sObjectName) {
        this.sObjectName = sObjectName;
    }





}
