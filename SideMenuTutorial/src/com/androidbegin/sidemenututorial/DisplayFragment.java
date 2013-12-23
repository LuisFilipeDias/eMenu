package com.androidbegin.sidemenututorial;

import java.util.Iterator;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.actionbarsherlock.app.SherlockFragment;

public class DisplayFragment extends SherlockFragment { 
	@Override
	public View onCreateView(LayoutInflater inflater, ViewGroup container,
			Bundle savedInstanceState) { 
		
		View rootView = inflater.inflate(R.layout.display_fragment, container, false);
		 
		fillInformations(rootView);
		
		return rootView;
	}

@SuppressWarnings("rawtypes")
private void fillInformations(View v) {
		
		Iterator it = Common.users.iterator();
		Users p = null;
        TextView bogus_tv = (TextView)  v.findViewById(R.id.bogus_ttl);
        TextView bogus_txt = (TextView)  v.findViewById(R.id.bogus_txt);
        TextView bogus_price = (TextView)  v.findViewById(R.id.bogus_price);
        TextView btn_left = (TextView)  v.findViewById(R.id.left_button);
        TextView btn_right = (TextView)  v.findViewById(R.id.right_button);
        
        for (int i = 0; i <= Common.activRst; i++) 
	    {
            p = (Users) it.next();
        }
        
        switch(Common.activPlt)
        {
	        case 0:
	        	bogus_tv.setText("Menus");
	    	    if(p.getMenus().length() > 2)
	    	    	bogus_txt.setText(p.getMenus());  
	    	    System.out.println("B: " + p.getPriceMenus());
	    	    if(p.getPriceMenus().length() > 0)
	    	    	bogus_price.setText(p.getPriceMenus());  
		        btn_left.setText("Sobremesas");
		        btn_right.setText("Bebidas");
	        	break;
	        case 1:
	        	bogus_tv.setText("Bebidas");
	    	    if(p.getDrinks().length() > 2)
	    	    	bogus_txt.setText(p.getDrinks());
	    	    if(p.getPriceDrinks().length() > 1)
	    	    	bogus_price.setText(p.getPriceDrinks());  
		        btn_left.setText("Menus");
		        btn_right.setText("Entradas");
	        	break;
	        case 2:
	        	bogus_tv.setText("Entradas");
	    	    if(p.getEntrys().length() > 2)
	    	    	bogus_txt.setText(p.getEntrys());
	    	    if(p.getPriceEntrys().length() > 1)
	    	    	bogus_price.setText(p.getPriceEntrys());  
		        btn_left.setText("Bebidas");
		        btn_right.setText("Pratos de Carne");
	        	break;
	        case 3:
	        	bogus_tv.setText("Pratos de Carne");
	    	    if(p.getMeats().length() > 2)
	    	    	bogus_txt.setText(p.getMeats());
	    	    if(p.getPriceMeats().length() > 1)
	    	    	bogus_price.setText(p.getPriceMeats());  
		        btn_left.setText("Entradas");
		        btn_right.setText("Pratos de Peixe");
	        	break;
	        case 4:
	        	bogus_tv.setText("Pratos de Peixe");
	    	    if(p.getFishs().length() > 2)
	    	    	bogus_txt.setText(p.getFishs());
	    	    if(p.getPriceFishs().length() > 1)
	    	    	bogus_price.setText(p.getPriceFishs());  
		        btn_left.setText("Pratos de Carne");
		        btn_right.setText("Outros Pratos");
	        	break;
	        case 5:
	        	bogus_tv.setText("Outros Pratos");
	    	    if(p.getOthers().length() > 2)
	    	    	bogus_txt.setText(p.getOthers());
	    	    if(p.getPriceOthers().length() > 1)
	    	    	bogus_price.setText(p.getPriceOthers());  
		        btn_left.setText("Pratos de Peixe");
		        btn_right.setText("Sobremesas");
	        	break;
	        case 6:
	        	bogus_tv.setText("Sobremesas");
	    	    if(p.getDeserts().length() > 2)
	    	    	bogus_txt.setText(p.getDeserts());
	    	    if(p.getPriceDeserts().length() > 1)
	    	    	bogus_price.setText(p.getPriceDeserts());  
		        btn_left.setText("Outros Pratos");
		        btn_right.setText("Menus");
	        	break;
        	default:
	        	bogus_tv.setText("Error");
    	    	bogus_txt.setText("Not yet filled");
        		break;
        }
		
	
	}
}