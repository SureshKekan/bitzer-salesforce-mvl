/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package com.bitzermobile.mvl;

import java.util.ArrayList;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpSession;

/**
 *
 * @author ali
 */
public class Component {

    protected HttpSession session = null;
    protected HttpServletRequest request = null;

    protected String name;
    protected Field primaryKeyField;
    protected ArrayList fields;
    protected String errorRows;

    public Component () {
        
    }

    public Component (String name) {

        this.name = name;
        primaryKeyField = null;
        fields = new ArrayList();
        errorRows = "";
    }
    
    
    public void setPrimaryKeyField(Field field) {

        primaryKeyField = field;
    }

    public void addField(Field field) {

        fields.add(field);
    }

    public ArrayList getFields() {
        return fields;
    }


    public Field getPrimaryKeyField() {
        return primaryKeyField;
    }



    public String errorRow(String messageType, String fieldname, String message) {

        if (fieldname == null)
            fieldname = "";
        return "<tr><td data-bitzer-message-type=\"" + messageType + "\" data-bitzer-field=\"" + fieldname + "\">" + message + "</td></tr>";
    }

    public void addError(String fieldname, String message) {
        errorRows = errorRows + errorRow("ERROR", fieldname, message);
    }

    public void addWarning(String fieldname, String message) {
        errorRows = errorRows + errorRow("WARNING", fieldname, message);
    }

    public void addInfo(String fieldname, String message) {
        errorRows = errorRows + errorRow("INFO", fieldname, message);
    }


    public String getErrorRows() {
        return errorRows;
    }

    public String getName() {
        return name;
    }


    
    
}
