package com.androidbegin.sidemenututorial;

import java.util.ArrayList;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.util.Log;
 
public class Common{
	public static ArrayList<Users> users;
	public static int activRst = 0;
	public static int activPlt = 0;
	public static int totalPlt = 7;
	public static int totalRst = 0;
	public static String currWebsite = "a";
	public static String currLocation = "a";
	public static boolean infoLoaded = false;
	public static String email0 = "-";
	public static String email1 = "-";
	public static String phone0 = "-";
	public static String phone1 = "-";
	public static String currResumee = "Sem Informações...";
	
}