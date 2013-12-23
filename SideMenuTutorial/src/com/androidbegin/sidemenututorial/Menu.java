package com.androidbegin.sidemenututorial;

import java.util.Iterator;

import android.annotation.SuppressLint;
import android.app.Activity;
import android.content.Intent;
import android.graphics.Point;
import android.os.Bundle;
import android.view.Display;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.RelativeLayout;
import android.widget.ScrollView;

public class Menu extends Activity
{
	@SuppressLint("NewApi")
	@SuppressWarnings("rawtypes")
	@Override
	 public void onCreate(Bundle savedInstanceState) 
	{
		super.onCreate(savedInstanceState);
		Display display = getWindowManager().getDefaultDisplay();
		Point size = new Point();
		display.getSize(size); 
		int width = size.x;
		int height = size.y;
	    ScrollView scroll = new ScrollView(this);
	    
	    RelativeLayout myLayout = new RelativeLayout(this); 
	    
        
        scroll.setBackground(getResources().getDrawable(R.drawable.back_a));
	    Button bogus = null;
	    Button[] Buttons = new Button[10];
	    Buttons[0] = addButtonToLayout(0,"FirstButton", myLayout, bogus, width, height);
	    int i = 0;
	    for (Iterator it = Common.users.iterator(); it.hasNext();) 
	    {
	    	i++;
            Users p = (Users) it.next();
            System.out.println("P: "  + p.getRestaurant());
            Buttons[i] = addButtonToLayout(i, p.getRestaurant(), myLayout, Buttons[i-1], width, height);
        }
	    Common.totalRst = i;
	    scroll.addView(myLayout);
	    setContentView(scroll);
	}	
	
	@SuppressLint("NewApi")
	public Button addButtonToLayout(final int id, String text, ViewGroup layout, Button previous, int width, int height)
	{
		
		Button myButton = new Button(this);
	    myButton.setId(id);
	    myButton.setText(text);
	    myButton.setTextColor(getResources().getColor(R.color.brown));
	    myButton.setTextSize(30);
		myButton.setBackground(getResources().getDrawable(R.drawable.center_clicked));
		myButton.setWidth(2*width/3);
		myButton.setHeight(height/7);
		myButton.setClickable(true);
		myButton.setOnClickListener(new Button.OnClickListener() 
		{
			@Override
			public void onClick(View arg0) 
			{
				Common.activRst = id - 1;
				System.out.println("Common.activRst: " + Common.activRst);
            	Intent intent = new Intent(Menu.this, MainActivity.class);
            	startActivity(intent);  	
			}
	    });
        RelativeLayout.LayoutParams buttonParam = 
                new RelativeLayout.LayoutParams(
                    RelativeLayout.LayoutParams.WRAP_CONTENT, 
                    RelativeLayout.LayoutParams.WRAP_CONTENT);
        if( id == 0)
        {
            buttonParam.addRule(RelativeLayout.CENTER_HORIZONTAL);
            buttonParam.addRule(RelativeLayout.CENTER_VERTICAL);
        }
        else
        {
            buttonParam.addRule(RelativeLayout.BELOW, previous.getId());
            buttonParam.addRule(RelativeLayout.CENTER_HORIZONTAL);
            if( id == 1)
            	buttonParam.setMargins(0, width/7, 0, width/14);
            else
            	buttonParam.setMargins(0, width/14, 0, width/14);
            	
        	layout.addView(myButton, buttonParam);
        }
        return myButton;
	}
	
}