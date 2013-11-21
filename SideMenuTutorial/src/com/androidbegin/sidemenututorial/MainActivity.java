package com.androidbegin.sidemenututorial;

import java.util.Iterator;

import android.annotation.SuppressLint;
import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.res.Configuration;
import android.net.Uri;
import android.os.Bundle;
import android.support.v4.app.ActionBarDrawerToggle;
import android.support.v4.app.FragmentTransaction;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.PopupMenu;

import com.actionbarsherlock.app.SherlockFragmentActivity;
import com.actionbarsherlock.view.MenuItem;

public class MainActivity extends SherlockFragmentActivity {

	// Declare Variables
	DrawerLayout mDrawerLayout;
	ListView mDrawerList;
	ActionBarDrawerToggle mDrawerToggle;
	MenuListAdapter mMenuAdapter;
	String[] title = new String[Common.totalRst];
	String[] subtitle = new String[Common.totalRst];
	int[] icon = new int[Common.totalRst];
	FragmentView fragAct = new FragmentView();
	FragmentView fragBack = new FragmentView();
	private CharSequence mDrawerTitle;
	private CharSequence mTitle;

	
	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		// Get the view from drawer_main.xml
		setContentView(R.layout.drawer_main);

		fillDisplay();
		// Get the Title
		mTitle = mDrawerTitle = getTitle();
		
		// Locate DrawerLayout in drawer_main.xml
		mDrawerLayout = (DrawerLayout) findViewById(R.id.drawer_layout);

		// Locate ListView in drawer_main.xml
		mDrawerList = (ListView) findViewById(R.id.listview_drawer);

		// Set a custom shadow that overlays the main content when the drawer
		// opens
		mDrawerLayout.setDrawerShadow(R.drawable.drawer_shadow,
				GravityCompat.START);

		// Pass string arrays to MenuListAdapter
		mMenuAdapter = new MenuListAdapter(MainActivity.this, title, subtitle,
				icon);

		// Set the MenuListAdapter to the ListView
		mDrawerList.setAdapter(mMenuAdapter);

		// Capture listview menu item click
		mDrawerList.setOnItemClickListener(new DrawerItemClickListener());

		// Enable ActionBar app icon to behave as action to toggle nav drawer
		getSupportActionBar().setHomeButtonEnabled(true);
		getSupportActionBar().setDisplayHomeAsUpEnabled(true);

		// ActionBarDrawerToggle ties together the the proper interactions
		// between the sliding drawer and the action bar app icon
		mDrawerToggle = new ActionBarDrawerToggle(this, mDrawerLayout,
				R.drawable.ic_drawer, R.string.drawer_open,
				R.string.drawer_close) {

			public void onDrawerClosed(View view) {
				// TODO Auto-generated method stub
				super.onDrawerClosed(view);
			}

			public void onDrawerOpened(View drawerView) {
				// TODO Auto-generated method stub
				// Set the title on the action when drawer open
				getSupportActionBar().setTitle(mDrawerTitle);
				super.onDrawerOpened(drawerView);
			}
		};

		mDrawerLayout.setDrawerListener(mDrawerToggle);

		if (savedInstanceState == null) {
			selectItem(Common.activRst);
		}
		
	}
	
	@SuppressWarnings("rawtypes")
	private void fillDisplay() {
		
		int i = 0;
		for (Iterator it = Common.users.iterator(); it.hasNext();) 
	    {
            Users p = (Users) it.next();
            System.out.println("P: "  + p.getRestaurant());
            
         // Generate title
    		title[i] = p.getRestaurant();
    		subtitle[i] = p.getUsername();

    		// Generate icon
    		icon[i] = R.drawable.action_about;
    		i++;
        }
		
	}

	@Override
	public boolean onOptionsItemSelected(MenuItem item) {

		if (item.getItemId() == android.R.id.home) {

			if (mDrawerLayout.isDrawerOpen(mDrawerList)) {
				mDrawerLayout.closeDrawer(mDrawerList);
			} else {
				mDrawerLayout.openDrawer(mDrawerList);
			}
		}

		return super.onOptionsItemSelected(item);
	}

	// ListView click listener in the navigation drawer
	private class DrawerItemClickListener implements
			ListView.OnItemClickListener {
		@Override
		public void onItemClick(AdapterView<?> parent, View view, int position, long id) 
		{
			selectItem(position);
		}
	}

	private void selectItem(int position) {

		FragmentTransaction ft = getSupportFragmentManager().beginTransaction();
		FragmentView fragAux = new FragmentView();
		Common.activRst = position;
		
		ft.replace(R.id.content_frame, fragBack);
		ft.commit();

		fragAux = fragBack;
		fragBack = fragAct;
		fragAct = fragAux;
		
		mDrawerList.setItemChecked(position, true);

		// Get the title followed by the position
		setTitle(title[position]);
		// Close drawer
		mDrawerLayout.closeDrawer(mDrawerList);
	}

	@Override
	protected void onPostCreate(Bundle savedInstanceState) {
		super.onPostCreate(savedInstanceState);
		// Sync the toggle state after onRestoreInstanceState has occurred.
		mDrawerToggle.syncState();
	}

	@Override
	public void onConfigurationChanged(Configuration newConfig) {
		super.onConfigurationChanged(newConfig);
		// Pass any configuration change to the drawer toggles
		mDrawerToggle.onConfigurationChanged(newConfig);
	}

	@Override
	public void setTitle(CharSequence title) {
		mTitle = title;
		//getSupportActionBar().setTitle(mTitle);
	} 


	public void websiteClicked(View v){	
		createDialog(this, "Website", "Deseja abrir o site do restaurante?", 0);
	}
	public void locationClicked(View v){	
		createDialog(this, "Localização", "Deseja abrir a localização?", 1);
	}
	
	public void phoneClicked(View v){
		popupHandler("Contacts clicked", R.menu.popup_tele, v);
		
	}
	
	public void emailClicked(View v){
		popupHandler("Emails clicked", R.menu.popup_email, v);
		
	}

	@SuppressLint("NewApi")
	public void popupHandler(final String message, int placement, View v)
	{
		PopupMenu popup = new PopupMenu(this, v);
		popup.getMenuInflater().inflate(placement, popup.getMenu());
		 popup.setOnMenuItemClickListener(new PopupMenu.OnMenuItemClickListener() {
	           @Override
				public boolean onMenuItemClick(android.view.MenuItem item) {
					// TODO Auto-generated method stub
	                System.out.println(message);
					return false;
				}
	        });
		 popup.show();
	}
	
	public void menuClicked(View v){
		Common.activPlt = 0;
    	Intent intent = new Intent(MainActivity.this, DisplayActivity.class);
    	startActivity(intent);  	
	}

	public void drinksClicked(View v){
		Common.activPlt = 1;
    	Intent intent = new Intent(MainActivity.this, DisplayActivity.class);
    	startActivity(intent);  	
	}

	public void entryClicked(View v){
		Common.activPlt = 2;
    	Intent intent = new Intent(MainActivity.this, DisplayActivity.class);
    	startActivity(intent);  	
	}

	public void meatClicked(View v){
		Common.activPlt = 3;
    	Intent intent = new Intent(MainActivity.this, DisplayActivity.class);
    	startActivity(intent);  	
	}

	public void fishClicked(View v){
		Common.activPlt = 4;
    	Intent intent = new Intent(MainActivity.this, DisplayActivity.class);
    	startActivity(intent);  	
	}

	public void othersClicked(View v){
		Common.activPlt = 5;
    	Intent intent = new Intent(MainActivity.this, DisplayActivity.class);
    	startActivity(intent);  	
	}

	public void desertClicked(View v){
		Common.activPlt = 6;
    	Intent intent = new Intent(MainActivity.this, DisplayActivity.class);
    	startActivity(intent);  	
	}
	
	public void createDialog(final Activity context, String title, final String content, final int sel)
 	{
 		AlertDialog.Builder alertDialogBuilder = new AlertDialog.Builder(context);
      	alertDialogBuilder.setTitle(title);
      	
		alertDialogBuilder
			.setMessage(content)
			.setCancelable(false)
			.setPositiveButton("OK", new DialogInterface.OnClickListener() {
				public void onClick(DialogInterface dialog,int id) {
			      	Intent intent = null;
					if( sel == 0)
					{
						String url = "http:// " + Common.currWebsite;
						System.out.println(url);
				        intent = new Intent(Intent.ACTION_VIEW, Uri.parse(url));
				        startActivity(intent);
					}
					else if( sel == 1 )
					{
						String loc_map = "geo:0,0?q=" + Common.currLocation;
				        intent = new Intent(Intent.ACTION_VIEW, Uri.parse(loc_map));
				        intent.setFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
					}
			        startActivity(intent);
					dialog.dismiss();
				}
	  		})
			.setNegativeButton("Cancel",new DialogInterface.OnClickListener() {
				public void onClick(DialogInterface dialog,int id) {
					dialog.dismiss();
				}
		  });
		
		AlertDialog alertDialog = alertDialogBuilder.create();
		alertDialog.show();
 	}
	
}

