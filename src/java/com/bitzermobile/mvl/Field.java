/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package com.bitzermobile.mvl;

import java.util.Date;

/**
 *
 * @author ali
 */
public class Field {

    private String name;
    private Object value;
    private String type;

    public Field (String name, String value, String type) {

        this.name = name;
        this.value = value;
        this.type = type.toLowerCase();
        if (type == null)
            type = "string";
    }

    public Field (String name, String type) {
        this (name, null, type);
        
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getType() {
        return type;
    }

    public void setType(String type) {
        this.type = type;
        if (this.type == null)
            this.type = "string";
    }

    public Object getValue() {
        return value;
    }

    public void setValue(Object value) {
        if (type == "string")
            this.value = value;
        else if (type == "integer") {
            if (value instanceof Integer)
                this.value = value;
            else if (value instanceof String) {
                try {
                    this.value = new Integer((String) value);
                } catch (Exception e) {
                    this.value = null;
                }
            }
        } else if (type == "double") {
            if (value instanceof Double)
                this.value = value;
            else if (value instanceof String) {
                try {
                    this.value = new Double((String) value);
                } catch (Exception e) {
                    this.value = null;
                }
            }
        } else if (type == "datetime") {
            if (value instanceof Date)
                this.value = value;
            else if (value instanceof String) {
                try {
                    this.value = new Double((String) value);
                } catch (Exception e) {
                    this.value = null;
                }
            }
        }
    }


    public String stringValue() {

        if (type == "string")
            return (String) value;
        if (type == "integer")
            return ((Integer) value).toString();
        if (type == "double")
            return ((Double) value).toString();
        if (type == "datetime") {
            return "";
        }

        return "";
    }

    

}
