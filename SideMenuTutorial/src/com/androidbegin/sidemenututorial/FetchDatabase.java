package com.androidbegin.sidemenututorial;

import java.util.ArrayList;

import org.apache.http.client.HttpClient;
import org.apache.http.client.ResponseHandler;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.BasicResponseHandler;
import org.apache.http.impl.client.DefaultHttpClient;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.util.Log;

public class FetchDatabase{

	public String getDataFromDB() {
        try {
            HttpPost httppost;
            HttpClient httpclient; 
            httpclient = new DefaultHttpClient();
            httppost = new HttpPost(
                    "http://emenu-box.com/eMenu/GetData.php");
            ResponseHandler<String> responseHandler = new BasicResponseHandler();
            final String response = httpclient.execute(httppost,
                    responseHandler);
            
            Common.infoLoaded = true;
            return response.trim();
 
        } catch (Exception e) {
            Common.infoLoaded = false;
            System.out.println("ERROR : " + e.getMessage());
            return "error";
        }
    }
	public static ArrayList<Users> parseJSON(JSONArray jArray) 
	{
	    ArrayList<Users> users = new ArrayList<Users>();
	    try 
	    {   
	        for (int i = 0; i < jArray.length(); i++) 
	        {
	            JSONObject json_data = jArray.getJSONObject(i);
	            Users user = new Users();
	            user.setId(json_data.getInt("id"));
	            user.setRestaurant(json_data.getString("restaurant"));
	            user.setUsername(json_data.getString("username"));
	            user.setCountry(json_data.getString("country"));
	            user.setCity(json_data.getString("city"));
	            user.setStreet(json_data.getString("street"));
	            user.setStreet(json_data.getString("street"));
	            user.setEmails(	json_data.getString("mail_1"),
	            				json_data.getString("mail_2"));
	            user.setPhones(	json_data.getString("phone_1"),
        						json_data.getString("phone_2"));
	            user.setWebsite(json_data.getString("website"));
	            user.setResumee(json_data.getString("resumee"));
	            System.out.println("Resumee: " + json_data.getString("resumee"));
	            user.setMenus(	json_data.getString("menu_0"), 
	            				json_data.getString("menu_1"), 
	            				json_data.getString("menu_2"), 
	            				json_data.getString("menu_3"), 
	            				json_data.getString("menu_4"), 
	            				json_data.getString("menu_5"), 
	            				json_data.getString("menu_6"), 
	            				json_data.getString("menu_7"), 
	            				json_data.getString("menu_8"), 
	            				json_data.getString("menu_9"));
	            user.setDrinks(	json_data.getString("drink_0"), 
		        				json_data.getString("drink_1"), 
		        				json_data.getString("drink_2"), 
		        				json_data.getString("drink_3"), 
		        				json_data.getString("drink_4"), 
		        				json_data.getString("drink_5"), 
		        				json_data.getString("drink_6"), 
		        				json_data.getString("drink_7"), 
		        				json_data.getString("drink_8"), 
		        				json_data.getString("drink_9"));
	            user.setEntrys(	json_data.getString("entry_0"), 
		        				json_data.getString("entry_1"), 
		        				json_data.getString("entry_2"), 
		        				json_data.getString("entry_3"), 
		        				json_data.getString("entry_4"), 
		        				json_data.getString("entry_5"), 
		        				json_data.getString("entry_6"), 
		        				json_data.getString("entry_7"), 
		        				json_data.getString("entry_8"), 
		        				json_data.getString("entry_9"));
	            user.setMeats(	json_data.getString("meat_0"), 
		        				json_data.getString("meat_1"), 
		        				json_data.getString("meat_2"), 
		        				json_data.getString("meat_3"), 
		        				json_data.getString("meat_4"), 
		        				json_data.getString("meat_5"), 
		        				json_data.getString("meat_6"), 
		        				json_data.getString("meat_7"), 
		        				json_data.getString("meat_8"), 
		        				json_data.getString("meat_9"));
	            user.setFishs(	json_data.getString("fish_0"), 
		        				json_data.getString("fish_1"), 
		        				json_data.getString("fish_2"), 
		        				json_data.getString("fish_3"), 
		        				json_data.getString("fish_4"), 
		        				json_data.getString("fish_5"), 
		        				json_data.getString("fish_6"), 
		        				json_data.getString("fish_7"), 
		        				json_data.getString("fish_8"), 
		        				json_data.getString("fish_9"));
	            user.setOthers(	json_data.getString("other_0"), 
		        				json_data.getString("other_1"), 
		        				json_data.getString("other_2"), 
		        				json_data.getString("other_3"), 
		        				json_data.getString("other_4"), 
		        				json_data.getString("other_5"), 
		        				json_data.getString("other_6"), 
		        				json_data.getString("other_7"), 
		        				json_data.getString("other_8"), 
		        				json_data.getString("other_9"));
	            user.setDeserts(json_data.getString("desert_0"), 
		        				json_data.getString("desert_1"), 
		        				json_data.getString("desert_2"), 
		        				json_data.getString("desert_3"), 
		        				json_data.getString("desert_4"), 
		        				json_data.getString("desert_5"), 
		        				json_data.getString("desert_6"), 
		        				json_data.getString("desert_7"), 
		        				json_data.getString("desert_8"), 
		        				json_data.getString("desert_9"));
	            
	            user.setPriceMenus(	json_data.getString("p_menu_0"), 
		        				json_data.getString("p_menu_1"), 
		        				json_data.getString("p_menu_2"), 
		        				json_data.getString("p_menu_3"), 
		        				json_data.getString("p_menu_4"), 
		        				json_data.getString("p_menu_5"), 
		        				json_data.getString("p_menu_6"), 
		        				json_data.getString("p_menu_7"), 
		        				json_data.getString("p_menu_8"), 
		        				json_data.getString("p_menu_9"));
		        user.setPriceDrinks(	json_data.getString("p_drink_0"), 
		        				json_data.getString("p_drink_1"), 
		        				json_data.getString("p_drink_2"), 
		        				json_data.getString("p_drink_3"), 
		        				json_data.getString("p_drink_4"), 
		        				json_data.getString("p_drink_5"), 
		        				json_data.getString("p_drink_6"), 
		        				json_data.getString("p_drink_7"), 
		        				json_data.getString("p_drink_8"), 
		        				json_data.getString("p_drink_9"));
		        user.setPriceEntrys(	json_data.getString("p_entry_0"), 
		        				json_data.getString("p_entry_1"), 
		        				json_data.getString("p_entry_2"), 
		        				json_data.getString("p_entry_3"), 
		        				json_data.getString("p_entry_4"), 
		        				json_data.getString("p_entry_5"), 
		        				json_data.getString("p_entry_6"), 
		        				json_data.getString("p_entry_7"), 
		        				json_data.getString("p_entry_8"), 
		        				json_data.getString("p_entry_9"));
		        user.setPriceMeats(	json_data.getString("p_meat_0"), 
		        				json_data.getString("p_meat_1"), 
		        				json_data.getString("p_meat_2"), 
		        				json_data.getString("p_meat_3"), 
		        				json_data.getString("p_meat_4"), 
		        				json_data.getString("p_meat_5"), 
		        				json_data.getString("p_meat_6"), 
		        				json_data.getString("p_meat_7"), 
		        				json_data.getString("p_meat_8"), 
		        				json_data.getString("p_meat_9"));
		        user.setPriceFishs(	json_data.getString("p_fish_0"), 
		        				json_data.getString("p_fish_1"), 
		        				json_data.getString("p_fish_2"), 
		        				json_data.getString("p_fish_3"), 
		        				json_data.getString("p_fish_4"), 
		        				json_data.getString("p_fish_5"), 
		        				json_data.getString("p_fish_6"), 
		        				json_data.getString("p_fish_7"), 
		        				json_data.getString("p_fish_8"), 
		        				json_data.getString("p_fish_9"));
		        user.setPriceOthers(	json_data.getString("p_other_0"), 
		        				json_data.getString("p_other_1"), 
		        				json_data.getString("p_other_2"), 
		        				json_data.getString("p_other_3"), 
		        				json_data.getString("p_other_4"), 
		        				json_data.getString("p_other_5"), 
		        				json_data.getString("p_other_6"), 
		        				json_data.getString("p_other_7"), 
		        				json_data.getString("p_other_8"), 
		        				json_data.getString("p_other_9"));
		        user.setPriceDeserts(json_data.getString("p_desert_0"), 
		        				json_data.getString("p_desert_1"), 
		        				json_data.getString("p_desert_2"), 
		        				json_data.getString("p_desert_3"), 
		        				json_data.getString("p_desert_4"), 
		        				json_data.getString("p_desert_5"), 
		        				json_data.getString("p_desert_6"), 
		        				json_data.getString("p_desert_7"), 
		        				json_data.getString("p_desert_8"), 
		        				json_data.getString("p_desert_9"));
	            users.add(user);
	        }
	    } 
	    catch (JSONException e) 
	    {
	        Log.e("log_tag", "Error parsing data " + e.toString());  
	    }
	    return users; 
	}

}
