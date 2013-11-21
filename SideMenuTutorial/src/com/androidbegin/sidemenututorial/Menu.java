package com.androidbegin.sidemenututorial;

import java.util.Iterator;

import android.annotation.SuppressLint;
import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
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
	    ScrollView scroll = new ScrollView(this);
	    
	    RelativeLayout myLayout = new RelativeLayout(this); 
	    myLayout.setBackground(getResources().getDrawable(R.drawable.back_a));
	    Button bogus = null;
	    Button[] Buttons = new Button[10];
	    Buttons[0] = addButtonToLayout(0,"FirstButton", myLayout, bogus);
	    int i = 0;
	    for (Iterator it = Common.users.iterator(); it.hasNext();) 
	    {
	    	i++;
            Users p = (Users) it.next();
            System.out.println("P: "  + p.getRestaurant());
            Buttons[i] = addButtonToLayout(i, p.getRestaurant(), myLayout, Buttons[i-1]);
        }
	    Common.totalRst = i;
	    scroll.addView(myLayout);
	    setContentView(scroll);
	}	
	
	@SuppressLint("NewApi")
	public Button addButtonToLayout(final int id, String text, ViewGroup layout, Button previous)
	{
		Button myButton = new Button(this);
	    myButton.setId(id);
	    myButton.setText(text);
	    myButton.setTextColor(getResources().getColor(R.color.brown));
	    myButton.setTextSize(30);
		myButton.setBackground(getResources().getDrawable(R.drawable.center_clicked));
		myButton.setWidth(400);
		myButton.setHeight(150);
		//myButton.setShadowLayer(10,10,10,Color.GRAY);
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
            buttonParam.setMargins(0, 40, 0, 0);
        	layout.addView(myButton, buttonParam);
        }
        return myButton;
	}
	
}