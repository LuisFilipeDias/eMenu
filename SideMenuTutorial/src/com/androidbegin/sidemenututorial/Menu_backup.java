package com.androidbegin.sidemenututorial;

import android.app.ActionBar.LayoutParams;
import android.app.Activity;
import android.graphics.Color;
import android.os.Bundle;
import android.util.DisplayMetrics;
import android.util.TypedValue;
import android.widget.EditText;
import android.widget.LinearLayout;
import android.widget.RelativeLayout;
import android.widget.TextView;

public class Menu_backup extends Activity{
	
	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		// Get the view from drawer_main.xml
		 int mainBackgroundColor = Color.parseColor("#2E8B57");
		  int labelTextColor = Color.parseColor("#FF4500");
		  int messageBackgroundColor = Color.parseColor("#3300FF");
		  int messageTextColor = Color.parseColor("#FFFF00");

		  DisplayMetrics metrics = new DisplayMetrics();
		  getWindowManager().getDefaultDisplay().getMetrics(metrics);
		  float density = metrics.density;
		  int minMarginSize = Math.round(density * 8);
		  int paddingSize = minMarginSize * 2;
		  int maxMarginSize = minMarginSize * 4;

		  TextView label = new TextView(this);
		  /*
		   * The LayoutParams are instructions to the Layout that will contain the
		   * View for laying out the View, so you need to use the LayoutParams of
		   * the Layout that will contain the View.
		   */
		  LinearLayout.LayoutParams labelLayoutParams = new LinearLayout.LayoutParams(
		    LayoutParams.WRAP_CONTENT, LayoutParams.WRAP_CONTENT);
		  label.setLayoutParams(labelLayoutParams);
		  label.setTextSize(TypedValue.COMPLEX_UNIT_SP, 18);
		  label.setPadding(paddingSize, paddingSize, paddingSize, paddingSize);
		  label.setText("AA");
		  label.setTextColor(labelTextColor);

		  TextView message = new TextView(this);
		  RoundedRectangle.LayoutParams messageLayoutParams = new RoundedRectangle.LayoutParams(
		 LayoutParams.FILL_PARENT, LayoutParams.WRAP_CONTENT);
		  /*
		   * This is one of the calls must made to force a ViewGroup to call its
		   * draw method instead of just calling the draw method of its children.
		   * This tells the RoundedRectangle to put some extra space around the
		   * View.
		   */
		  messageLayoutParams.setMargins(minMarginSize, paddingSize,
		    minMarginSize, maxMarginSize);
		  message.setLayoutParams(messageLayoutParams);
		  message.setTextSize(TypedValue.COMPLEX_UNIT_SP, paddingSize);
		  message.setText("BB");
		  message.setTextColor(messageTextColor);
		  message.setBackgroundColor(messageBackgroundColor);

		  RoundedRectangle messageContainer = new RoundedRectangle(this);
		  LinearLayout.LayoutParams messageContainerLayoutParams = new LinearLayout.LayoutParams(
		    LayoutParams.FILL_PARENT, LayoutParams.WRAP_CONTENT);
		  messageContainerLayoutParams.setMargins(paddingSize, 0, paddingSize, 0);
		  messageContainer.setLayoutParams(messageContainerLayoutParams);
		  messageContainer.setOrientation(LinearLayout.VERTICAL);
		  /*
		   * This is one of the calls must made to force a ViewGroup to call its
		   * draw method instead of just calling the draw method of its children.
		   * This tells the RoundedRectangle to color the the exta space that was
		   * put around the View as well as the View. This is exterior color of
		   * the RoundedRectangle.
		   */
		  messageContainer.setBackgroundColor(mainBackgroundColor);
		  /*
		   * This is one of the calls must made to force a ViewGroup to call its
		   * draw method instead of just calling the draw method of its children.
		   * This is the interior color of the RoundedRectangle. It must be
		   * different than the exterior color of the RoundedRectangle or the
		   * RoundedRectangle will not call its draw method.
		   */
		  messageContainer.setInteriorColor(messageBackgroundColor);
		  // Add the message to the RoundedRectangle.
		  messageContainer.addView(message);

		  //
		  LinearLayout main = new LinearLayout(this);
		  LinearLayout.LayoutParams mainLayoutParams = new LinearLayout.LayoutParams(
		    LayoutParams.FILL_PARENT, LayoutParams.WRAP_CONTENT);
		  main.setLayoutParams(mainLayoutParams);
		  main.setOrientation(LinearLayout.VERTICAL);
		  main.setBackgroundColor(mainBackgroundColor);
		  main.addView(label);
		  main.addView(messageContainer);

		  setContentView(main);
		 }
		
	
}