package com.androidbegin.sidemenututorial;

import java.util.Iterator;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.actionbarsherlock.app.SherlockFragment;

public class FragmentView extends SherlockFragment{ 
	@Override
	public View onCreateView(LayoutInflater inflater, ViewGroup container,
			Bundle savedInstanceState) { 
		View rootView = inflater.inflate(R.layout.fragment, container, false);

		//GestureHandler detector = new GestureHandler(getActivity(),this);
		
		fillInformations(rootView);
		return rootView;
	}

	private void fillInformations(View v) {
		
		@SuppressWarnings("rawtypes")
		Iterator it = Common.users.iterator();
		Users p = null;
        TextView title_tv = (TextView)  v.findViewById(R.id.info_ttl);
        TextView resumee_tv = (TextView)  v.findViewById(R.id.resumee_txt);
        TextView website_tv = (TextView)  v.findViewById(R.id.website_txt);
        TextView location_tv = (TextView)  v.findViewById(R.id.location_txt);
        TextView phone_tv = (TextView)  v.findViewById(R.id.phone_txt);
        TextView email_tv = (TextView)  v.findViewById(R.id.email_txt);
        
        for (int i = 0; i <= Common.activRst; i++) 
	    {
            p = (Users) it.next();
        }
        	
	    if(p.getRestaurant().length() != 0)
	       	title_tv.setText("    " + p.getRestaurant() + "    ");
        if(p.getResumee().length() != 0)
        	resumee_tv.setText("    " + p.getResumee() + "    ");
	    else
	    {
	    	resumee_tv.setText("    Sem resumo de restaurante    ");
	    }
	    if(p.getWebsite().length() != 0)
	    {
	    	Common.currWebsite = p.getWebsite();
	      	website_tv.setText("    " + p.getWebsite() + "    ");
	    }
	    else
	    {
	    	website_tv.setText("    Sem informação    ");
	    }
	    if(p.getCountry().length() != 0 || p.getCity().length() != 0)
	    {
	    	Common.currLocation = p.getStreet() + ", " + p.getCity() + " - " + p.getCountry();
	       	location_tv.setText("    " + Common.currLocation + "    ");
	    }
	    else
	    {
	    	location_tv.setText("    Sem informação    ");
	    }
		
	}

	/*@Override
	public void onSwipe(final int direction) {
		
		Thread swipeFrag = new Thread() {     
			public void run() 
	   		{ 	
				FragmentTransaction ft = getChildFragmentManager().beginTransaction();
				FragmentView fragAux = new FragmentView();
				FragmentView fragAct = new FragmentView();
				FragmentView fragBack = new FragmentView();
			      
			    switch (direction) 
			    {
		      		case GestureHandler.SWIPE_LEFT: 	
			            if(Common.activRst > 0)
			            {
			        		Common.activRst ++;
			        		ft.replace(R.id.content_frame, fragBack);
			        		ft.commit();
					    }
			      		break;
		      		
		      		case GestureHandler.SWIPE_RIGHT:  
			            if(Common.activRst < Common.totalRst - 1)
			            {
			        		Common.activRst --;
			        		ft.replace(R.id.content_frame, fragBack);
			        		ft.commit();
					    }                     
		      			break;
			    } 
        		fragAux = fragBack;
        		fragBack = fragAct;
        		fragAct = fragAux;
	   		}
			};           
			swipeFrag.start();  
	     }


	@Override
	public void onDoubleTap() {
		// TODO Auto-generated method stub
		
	}
	*/
}
