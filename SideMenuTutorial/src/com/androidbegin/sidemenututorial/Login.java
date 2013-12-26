package com.androidbegin.sidemenututorial;

import java.io.FileNotFoundException;
import java.io.IOException;
import org.json.JSONArray;
import org.json.JSONException;
import android.app.Activity;
import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.SharedPreferences.Editor;
import android.os.Bundle;
import android.preference.PreferenceManager;
import android.view.View;
import android.widget.Toast;

public class Login extends Activity
{
	boolean finished = false;
	boolean success = false;
	ProgressDialog progDialog;
	String data = "";
	JSONArray jArray;
	SharedPreferences prefs;
	String myKey = "com.androidbegin.sidemenututorial.key";

	@Override
	public void onCreate(Bundle savedInstanceState) 
	{
		super.onCreate(savedInstanceState);
		// Get the view from drawer_main.xml
		setContentView(R.layout.login);
	}
	
	public void onLoginClicked(View v) throws FileNotFoundException, IOException, ClassNotFoundException, JSONException 
	{
		final FetchDatabase getdb = new FetchDatabase();
		progDialog = ProgressDialog.show(this, "Carregando Informa��o",
	            "Recolhendo os Menus, Pratos, Sobremesas, Bebidas...", true);
		//progDialog.setCancelable(true);
		
	    new Thread() {
	        public void run() {
            	success = false;
            	finished = false;
	            try 
	            {
	                data = getdb.getDataFromDB();
	    	        jArray = new JSONArray(data);
	                runOnUiThread(new Runnable() {
	                	@Override
	                    public void run() {
	                        Common.users = FetchDatabase.parseJSON(jArray);
	                    }
	                });	
	            } 
	            catch (Exception e) 
	            {
	    	    	runOnUiThread(new Runnable() {
	  	    		  public void run() {
	  	    			  Toast.makeText(Login.this, "Loading failed. Check internet connections", Toast.LENGTH_LONG).show();
	  	    		  }
		    		});
	            }
	            if(Common.infoLoaded)
	            {
		            finished = true;
	            	success = true;
	            	Intent intent = new Intent(Login.this, Menu.class);
	            	startActivity(intent);  
	            }
	            progDialog.dismiss();
	            finished = true;
	        }
	    }.start();
	    while( !finished );
	    if ( success )
	    {
	    	Toast.makeText(Login.this, "Success!", Toast.LENGTH_LONG).show();
	    	savePreferences("luis", data);
	    }
	    else
	    {
	    	Toast.makeText(Login.this, "Check-in falhou. \nVerifique liga��o � rede", Toast.LENGTH_LONG).show();
	        jArray = new JSONArray(loadSavedPreferences("luis"));
            Common.users = FetchDatabase.parseJSON(jArray);      
            createDialog(Login.this, "Sem liga��o � rede!", "Informa��o Offline?\n\n Esta informa��o pode estar desactualizada!");
	    }
	}
	private void savePreferences(String key, String value) 
	{ 
		SharedPreferences sharedPreferences = PreferenceManager 
	        .getDefaultSharedPreferences(this); 
	    Editor editor = sharedPreferences.edit(); 
	    editor.putString(key, value); 
	    editor.commit(); 
	} 
	 
	private String loadSavedPreferences(String key) 
	{
		SharedPreferences sharedPreferences = PreferenceManager
			.getDefaultSharedPreferences(this);
		String name = sharedPreferences.getString(key, "Failed to Load");
		return name;
	}
	 
	public void createDialog(final Activity context, String title, final String content)
	{
		AlertDialog.Builder alertDialogBuilder = new AlertDialog.Builder(context);
	   	alertDialogBuilder.setTitle(title);  	
	   	alertDialogBuilder
			.setMessage(content)
			.setCancelable(true)
			.setNegativeButton("OK", new DialogInterface.OnClickListener() {
				public void onClick(DialogInterface dialog,int id) {
		           	Intent intent = new Intent(Login.this, Menu.class);
		           	startActivity(intent);
					dialog.dismiss();
				}})
			.setPositiveButton("Cancel",new DialogInterface.OnClickListener() {
				public void onClick(DialogInterface dialog,int id) {
					dialog.dismiss();
				}});
			AlertDialog alertDialog = alertDialogBuilder.create();
			alertDialog.show();
	 	}
}