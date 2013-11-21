package com.androidbegin.sidemenututorial;
 
public class Users 
{ 
    int id;
    String restaurant, username, country, city, street, website, resumee,
    menu_0, menu_1, menu_2, menu_3, menu_4, menu_5, menu_6, menu_7, menu_8, menu_9,
    entry_0, entry_1, entry_2, entry_3, entry_4, entry_5, entry_6, entry_7, entry_8, entry_9,
    drink_0, drink_1, drink_2, drink_3, drink_4, drink_5, drink_6, drink_7, drink_8, drink_9,
    meat_0, meat_1, meat_2, meat_3, meat_4, meat_5, meat_6, meat_7, meat_8, meat_9,
    fish_0, fish_1, fish_2, fish_3, fish_4, fish_5, fish_6, fish_7, fish_8, fish_9,
    other_0, other_1, other_2, other_3, other_4, other_5, other_6, other_7, other_8, other_9,
    desert_0, desert_1, desert_2, desert_3, desert_4, desert_5, desert_6, desert_7, desert_8, desert_9,
    p_menu_0, p_menu_1, p_menu_2, p_menu_3, p_menu_4, p_menu_5, p_menu_6, p_menu_7, p_menu_8, p_menu_9,
    p_entry_0, p_entry_1, p_entry_2, p_entry_3, p_entry_4, p_entry_5, p_entry_6, p_entry_7, p_entry_8, p_entry_9,
    p_drink_0, p_drink_1, p_drink_2, p_drink_3, p_drink_4, p_drink_5, p_drink_6, p_drink_7, p_drink_8, p_drink_9,
    p_meat_0, p_meat_1, p_meat_2, p_meat_3, p_meat_4, p_meat_5, p_meat_6, p_meat_7, p_meat_8, p_meat_9,
    p_fish_0, p_fish_1, p_fish_2, p_fish_3, p_fish_4, p_fish_5, p_fish_6, p_fish_7, p_fish_8, p_fish_9,
    p_other_0, p_other_1, p_other_2, p_other_3, p_other_4, p_other_5, p_other_6, p_other_7, p_other_8, p_other_9,
    p_desert_0, p_desert_1, p_desert_2, p_desert_3, p_desert_4, p_desert_5, p_desert_6, p_desert_7, p_desert_8, p_desert_9;
    String [] emails = new String[2];
    String [] phones = new String[2];
    
    public int getId() {
        return id;
    }
    public void setId(int id) {
        this.id = id;
    }
    public String getRestaurant() {
        return restaurant;
    }
    public String getUsername() {
        return username;
    }
    public String getCountry() {
        return country;
    }
    public String getCity() {
        return city;
    }
	public String getStreet() {
		return street;
	} 
	public String[] getPhones() {
		return phones;
	} 
	public String[] getEmails() {
		return emails;
	} 
    public String getWebsite() {
        return website;
    }
    public String getResumee() {
        return resumee;
    }
    public String getMenus() {
        String menu = "";
        if(menu_0.length() > 0)
        	menu = menu + "\u2022 " + menu_0 + "\n\n";
        if(menu_1.length() > 0)
        	menu = menu + "\u2022 " + menu_1 + "\n\n";
        if(menu_2.length() > 0)
        	menu = menu + "\u2022 " + menu_2 + "\n\n";
        if(menu_3.length() > 0)
        	menu = menu + "\u2022 " + menu_3 + "\n\n";
        if(menu_4.length() > 0)
        	menu = menu + "\u2022 " + menu_4 + "\n\n";
        if(menu_5.length() > 0)
        	menu = menu + "\u2022 " + menu_5 + "\n\n";
        if(menu_6.length() > 0)
        	menu = menu + "\u2022 " + menu_6 + "\n\n";
        if(menu_7.length() > 0)
        	menu = menu + "\u2022 " + menu_7 + "\n\n";
        if(menu_8.length() > 0)
        	menu = menu + "\u2022 " + menu_8 + "\n\n";
        if(menu_9.length() > 0)
        	menu = menu + "\u2022 " + menu_9 + "\n\n";
        return menu;
    }
    
    public String getDrinks() {
        String drink = "";
        if(drink_0.length() > 0)
        	drink = drink + "\u2022 " + drink_0 + "\n\n";
        if(drink_1.length() > 0)
        	drink = drink + "\u2022 " + drink_1 + "\n\n";
        if(drink_2.length() > 0)
        	drink = drink + "\u2022 " + drink_2 + "\n\n";
        if(drink_3.length() > 0)
        	drink = drink + "\u2022 " + drink_3 + "\n\n";
        if(drink_4.length() > 0)
        	drink = drink + "\u2022 " + drink_4 + "\n\n";
        if(drink_5.length() > 0)
        	drink = drink + "\u2022 " + drink_5 + "\n\n";
        if(drink_6.length() > 0)
        	drink = drink + "\u2022 " + drink_6 + "\n\n";
        if(drink_7.length() > 0)
        	drink = drink + "\u2022 " + drink_7 + "\n\n";
        if(drink_8.length() > 0)
        	drink = drink + "\u2022 " + drink_8 + "\n\n";
        if(drink_9.length() > 0)
        	drink = drink + "\u2022 " + drink_9 + "\n\n";
        return drink;
    }

    public String getEntrys() {
        String entry = "";
        if(entry_0.length() > 0)
        	entry = entry + "\u2022 " + entry_0 + "\n\n";
        if(entry_1.length() > 0)
        	entry = entry + "\u2022 " + entry_1 + "\n\n";
        if(entry_2.length() > 0)
        	entry = entry + "\u2022 " + entry_2 + "\n\n";
        if(entry_3.length() > 0)
        	entry = entry + "\u2022 " + entry_3 + "\n\n";
        if(entry_4.length() > 0)
        	entry = entry + "\u2022 " + entry_4 + "\n\n";
        if(entry_5.length() > 0)
        	entry = entry + "\u2022 " + entry_5 + "\n\n";
        if(entry_6.length() > 0)
        	entry = entry + "\u2022 " + entry_6 + "\n\n";
        if(entry_7.length() > 0)
        	entry = entry + "\u2022 " + entry_7 + "\n\n";
        if(entry_8.length() > 0)
        	entry = entry + "\u2022 " + entry_8 + "\n\n";
        if(entry_9.length() > 0)
        	entry = entry + "\u2022 " + entry_9 + "\n\n";
        return entry;
    }

    public String getMeats() {
        String meat = "";
        if(meat_0.length() > 0)
        	meat = meat + "\u2022 " + meat_0 + "\n\n";
        if(meat_1.length() > 0)
        	meat = meat + "\u2022 " + meat_1 + "\n\n";
        if(meat_2.length() > 0)
        	meat = meat + "\u2022 " + meat_2 + "\n\n";
        if(meat_3.length() > 0)
        	meat = meat + "\u2022 " + meat_3 + "\n\n";
        if(meat_4.length() > 0)
        	meat = meat + "\u2022 " + meat_4 + "\n\n";
        if(meat_5.length() > 0)
        	meat = meat + "\u2022 " + meat_5 + "\n\n";
        if(meat_6.length() > 0)
        	meat = meat + "\u2022 " + meat_6 + "\n\n";
        if(meat_7.length() > 0)
        	meat = meat + "\u2022 " + meat_7 + "\n\n";
        if(meat_8.length() > 0)
        	meat = meat + "\u2022 " + meat_8 + "\n\n";
        if(meat_9.length() > 0)
        	meat = meat + "\u2022 " + meat_9 + "\n\n";
        return meat;
    }

    public String getFishs() {
        String fish = "";
        if(fish_0.length() > 0)
        	fish = fish + "\u2022 " + fish_0 + "\n\n";
        if(fish_1.length() > 0)
        	fish = fish + "\u2022 " + fish_1 + "\n\n";
        if(fish_2.length() > 0)
        	fish = fish + "\u2022 " + fish_2 + "\n\n";
        if(fish_3.length() > 0)
        	fish = fish + "\u2022 " + fish_3 + "\n\n";
        if(fish_4.length() > 0)
        	fish = fish + "\u2022 " + fish_4 + "\n\n";
        if(fish_5.length() > 0)
        	fish = fish + "\u2022 " + fish_5 + "\n\n";
        if(fish_6.length() > 0)
        	fish = fish + "\u2022 " + fish_6 + "\n\n";
        if(fish_7.length() > 0)
        	fish = fish + "\u2022 " + fish_7 + "\n\n";
        if(fish_8.length() > 0)
        	fish = fish + "\u2022 " + fish_8 + "\n\n";
        if(fish_9.length() > 0)
        	fish = fish + "\u2022 " + fish_9 + "\n\n";
        return fish;
    }

    public String getOthers() {
        String other = "";
        if(other_0.length() > 0)
        	other = other + "\u2022 " + other_0 + "\n\n";
        if(other_1.length() > 0)
        	other = other + "\u2022 " + other_1 + "\n\n";
        if(other_2.length() > 0)
        	other = other + "\u2022 " + other_2 + "\n\n";
        if(other_3.length() > 0)
        	other = other + "\u2022 " + other_3 + "\n\n";
        if(other_4.length() > 0)
        	other = other + "\u2022 " + other_4 + "\n\n";
        if(other_5.length() > 0)
        	other = other + "\u2022 " + other_5 + "\n\n";
        if(other_6.length() > 0)
        	other = other + "\u2022 " + other_6 + "\n\n";
        if(other_7.length() > 0)
        	other = other + "\u2022 " + other_7 + "\n\n";
        if(other_8.length() > 0)
        	other = other + "\u2022 " + other_8 + "\n\n";
        if(other_9.length() > 0)
        	other = other + "\u2022 " + other_9 + "\n\n";
        return other;
    }

    public String getDeserts() {
        String desert = "";
        if(desert_0.length() > 0)
        	desert = desert + "\u2022 " + desert_0 + "\n\n";
        if(desert_1.length() > 0)
        	desert = desert + "\u2022 " + desert_1 + "\n\n";
        if(desert_2.length() > 0)
        	desert = desert + "\u2022 " + desert_2 + "\n\n";
        if(desert_3.length() > 0)
        	desert = desert + "\u2022 " + desert_3 + "\n\n";
        if(desert_4.length() > 0)
        	desert = desert + "\u2022 " + desert_4 + "\n\n";
        if(desert_5.length() > 0)
        	desert = desert + "\u2022 " + desert_5 + "\n\n";
        if(desert_6.length() > 0)
        	desert = desert + "\u2022 " + desert_6 + "\n\n";
        if(desert_7.length() > 0)
        	desert = desert + "\u2022 " + desert_7 + "\n\n";
        if(desert_8.length() > 0)
        	desert = desert + "\u2022 " + desert_8 + "\n\n";
        if(desert_9.length() > 0)
        	desert = desert + "\u2022 " + desert_9 + "\n\n";
        return desert;
    }
    public String getPriceMenus() {
        String p_menu = "";
        if(p_menu_0.length() > 0)
        	p_menu = p_menu + p_menu_0 + "€\n\n";
        if(p_menu_1.length() > 0)
        	p_menu = p_menu + p_menu_1 + "€\n\n";
        if(p_menu_2.length() > 0)
        	p_menu = p_menu + p_menu_2 + "€\n\n";
        if(p_menu_3.length() > 0)
        	p_menu = p_menu + p_menu_3 + "€\n\n";
        if(p_menu_4.length() > 0)
        	p_menu = p_menu + p_menu_4 + "€\n\n";
        if(p_menu_5.length() > 0)
        	p_menu = p_menu + p_menu_5 + "€\n\n";
        if(p_menu_6.length() > 0)
        	p_menu = p_menu + p_menu_6 + "€\n\n";
        if(p_menu_7.length() > 0)
        	p_menu = p_menu + p_menu_7 + "€\n\n";
        if(p_menu_8.length() > 0)
        	p_menu = p_menu + p_menu_8 + "€\n\n";
        if(p_menu_9.length() > 0)
        	p_menu = p_menu + p_menu_9 + "€\n\n";
        
        return p_menu;
    }
    
    public String getPriceDrinks() {
        String p_drink = "";
        if(p_drink_0.length() > 0)
        	p_drink = p_drink + p_drink_0 + "€\n\n";
        if(p_drink_1.length() > 0)
        	p_drink = p_drink + p_drink_1 + "€\n\n";
        if(p_drink_2.length() > 0)
        	p_drink = p_drink + p_drink_2 + "€\n\n";
        if(p_drink_3.length() > 0)
        	p_drink = p_drink + p_drink_3 + "€\n\n";
        if(p_drink_4.length() > 0)
        	p_drink = p_drink + p_drink_4 + "€\n\n";
        if(p_drink_5.length() > 0)
        	p_drink = p_drink + p_drink_5 + "€\n\n";
        if(p_drink_6.length() > 0)
        	p_drink = p_drink + p_drink_6 + "€\n\n";
        if(p_drink_7.length() > 0)
        	p_drink = p_drink + p_drink_7 + "€\n\n";
        if(p_drink_8.length() > 0)
        	p_drink = p_drink + p_drink_8 + "€\n\n";
        if(p_drink_9.length() > 0)
        	p_drink = p_drink + p_drink_9 + "€\n\n";
        return p_drink;
    }

    public String getPriceEntrys() {
        String p_entry = "";
        if(p_entry_0.length() > 0)
        	p_entry = p_entry + p_entry_0 + "€\n\n";
        if(p_entry_1.length() > 0)
        	p_entry = p_entry + p_entry_1 + "€\n\n";
        if(p_entry_2.length() > 0)
        	p_entry = p_entry + p_entry_2 + "€\n\n";
        if(p_entry_3.length() > 0)
        	p_entry = p_entry + p_entry_3 + "€\n\n";
        if(p_entry_4.length() > 0)
        	p_entry = p_entry + p_entry_4 + "€\n\n";
        if(p_entry_5.length() > 0)
        	p_entry = p_entry + p_entry_5 + "€\n\n";
        if(p_entry_6.length() > 0)
        	p_entry = p_entry + p_entry_6 + "€\n\n";
        if(p_entry_7.length() > 0)
        	p_entry = p_entry + p_entry_7 + "€\n\n";
        if(p_entry_8.length() > 0)
        	p_entry = p_entry + p_entry_8 + "€\n\n";
        if(p_entry_9.length() > 0)
        	p_entry = p_entry + p_entry_9 + "€\n\n";
        return p_entry;
    }

    public String getPriceMeats() {
        String p_meat = "";
        if(p_meat_0.length() > 0)
        	p_meat = p_meat + p_meat_0 + "€\n\n";
        if(p_meat_1.length() > 0)
        	p_meat = p_meat + p_meat_1 + "€\n\n";
        if(p_meat_2.length() > 0)
        	p_meat = p_meat + p_meat_2 + "€\n\n";
        if(p_meat_3.length() > 0)
        	p_meat = p_meat + p_meat_3 + "€\n\n";
        if(p_meat_4.length() > 0)
        	p_meat = p_meat + p_meat_4 + "€\n\n";
        if(p_meat_5.length() > 0)
        	p_meat = p_meat + p_meat_5 + "€\n\n";
        if(p_meat_6.length() > 0)
        	p_meat = p_meat + p_meat_6 + "€\n\n";
        if(p_meat_7.length() > 0)
        	p_meat = p_meat + p_meat_7 + "€\n\n";
        if(p_meat_8.length() > 0)
        	p_meat = p_meat + p_meat_8 + "€\n\n";
        if(p_meat_9.length() > 0)
        	p_meat = p_meat + p_meat_9 + "€\n\n";
        return p_meat;
    }

    public String getPriceFishs() {
        String p_fish = "";
        if(p_fish_0.length() > 0)
        	p_fish = p_fish + p_fish_0 + "€\n\n";
        if(p_fish_1.length() > 0)
        	p_fish = p_fish + p_fish_1 + "€\n\n";
        if(p_fish_2.length() > 0)
        	p_fish = p_fish + p_fish_2 + "€\n\n";
        if(p_fish_3.length() > 0)
        	p_fish = p_fish + p_fish_3 + "€\n\n";
        if(p_fish_4.length() > 0)
        	p_fish = p_fish + p_fish_4 + "€\n\n";
        if(p_fish_5.length() > 0)
        	p_fish = p_fish + p_fish_5 + "€\n\n";
        if(p_fish_6.length() > 0)
        	p_fish = p_fish + p_fish_6 + "€\n\n";
        if(p_fish_7.length() > 0)
        	p_fish = p_fish + p_fish_7 + "€\n\n";
        if(p_fish_8.length() > 0)
        	p_fish = p_fish + p_fish_8 + "€\n\n";
        if(p_fish_9.length() > 0)
        	p_fish = p_fish + p_fish_9 + "€\n\n";
        return p_fish;
    }

    public String getPriceOthers() {
        String p_other = "";
        if(p_other_0.length() > 0)
        	p_other = p_other + p_other_0 + "€\n\n";
        if(p_other_1.length() > 0)
        	p_other = p_other + p_other_1 + "€\n\n";
        if(p_other_2.length() > 0)
        	p_other = p_other + p_other_2 + "€\n\n";
        if(p_other_3.length() > 0)
        	p_other = p_other + p_other_3 + "€\n\n";
        if(p_other_4.length() > 0)
        	p_other = p_other + p_other_4 + "€\n\n";
        if(p_other_5.length() > 0)
        	p_other = p_other + p_other_5 + "€\n\n";
        if(p_other_6.length() > 0)
        	p_other = p_other + p_other_6 + "€\n\n";
        if(p_other_7.length() > 0)
        	p_other = p_other + p_other_7 + "€\n\n";
        if(p_other_8.length() > 0)
        	p_other = p_other + p_other_8 + "€\n\n";
        if(p_other_9.length() > 0)
        	p_other = p_other + p_other_9 + "€\n\n";
        return p_other;
    }

    public String getPriceDeserts() {
        String p_desert = "";
        if(p_desert_0.length() > 0)
        	p_desert = p_desert + p_desert_0 + "€\n\n";
        if(p_desert_1.length() > 0)
        	p_desert = p_desert + p_desert_1 + "€\n\n";
        if(p_desert_2.length() > 0)
        	p_desert = p_desert + p_desert_2 + "€\n\n";
        if(p_desert_3.length() > 0)
        	p_desert = p_desert + p_desert_3 + "€\n\n";
        if(p_desert_4.length() > 0)
        	p_desert = p_desert + p_desert_4 + "€\n\n";
        if(p_desert_5.length() > 0)
        	p_desert = p_desert + p_desert_5 + "€\n\n";
        if(p_desert_6.length() > 0)
        	p_desert = p_desert + p_desert_6 + "€\n\n";
        if(p_desert_7.length() > 0)
        	p_desert = p_desert + p_desert_7 + "€\n\n";
        if(p_desert_8.length() > 0)
        	p_desert = p_desert + p_desert_8 + "€\n\n";
        if(p_desert_9.length() > 0)
        	p_desert = p_desert + p_desert_9 + "€\n\n";
        return p_desert;
    }
    
    public void setRestaurant(String restaurant) {
        this.restaurant = restaurant;
    }
    public void setUsername(String username) {
        this.username = username;
    }
    public void setCountry(String country) {
        this.country = country;
    }
    public void setCity(String city) {
        this.city = city;
    }
    public void setStreet(String street) {
        this.street = street;
    }
    public void setWebsite(String website) {
        this.website = website;
    }
    public void setEmails(String email_0, String email_1) {
        this.emails[0] = email_0;
        this.emails[1] = email_1;
    }
    public void setPhones(String phone_0, String phone_1) {
        this.phones[0] = phone_0;
        this.phones[1] = phone_1;
    }
    public void setResumee(String resumee) {
        this.resumee = resumee;
    } 
    

    public void setMenus(	String menu_0, String menu_1, String menu_2, String menu_3, String menu_4, 
			String menu_5, String menu_6, String menu_7, String menu_8, String menu_9) 
	{
		this.menu_0 = menu_0;         this.menu_1 = menu_1;
		this.menu_2 = menu_2;         this.menu_3 = menu_3;
		this.menu_4 = menu_4;         this.menu_5 = menu_5;
		this.menu_6 = menu_6;         this.menu_7 = menu_7;
		this.menu_8 = menu_8;         this.menu_9 = menu_9;
	} 

    public void setDrinks(	String drink_0, String drink_1, String drink_2, String drink_3, String drink_4, 
			String drink_5, String drink_6, String drink_7, String drink_8, String drink_9) 
	{
		this.drink_0 = drink_0;         this.drink_1 = drink_1;
		this.drink_2 = drink_2;         this.drink_3 = drink_3;
		this.drink_4 = drink_4;         this.drink_5 = drink_5;
		this.drink_6 = drink_6;         this.drink_7 = drink_7;
		this.drink_8 = drink_8;         this.drink_9 = drink_9;
	} 
	
    public void setEntrys(	String entry_0, String entry_1, String entry_2, String entry_3, String entry_4, 
			String entry_5, String entry_6, String entry_7, String entry_8, String entry_9) 
	{
		this.entry_0 = entry_0;         this.entry_1 = entry_1;
		this.entry_2 = entry_2;         this.entry_3 = entry_3;
		this.entry_4 = entry_4;         this.entry_5 = entry_5;
		this.entry_6 = entry_6;         this.entry_7 = entry_7;
		this.entry_8 = entry_8;         this.entry_9 = entry_9;
	} 
    
    public void setMeats(	String meat_0, String meat_1, String meat_2, String meat_3, String meat_4, 
			String meat_5, String meat_6, String meat_7, String meat_8, String meat_9) 
	{
		this.meat_0 = meat_0;         this.meat_1 = meat_1;
		this.meat_2 = meat_2;         this.meat_3 = meat_3;
		this.meat_4 = meat_4;         this.meat_5 = meat_5;
		this.meat_6 = meat_6;         this.meat_7 = meat_7;
		this.meat_8 = meat_8;         this.meat_9 = meat_9;
	} 
	
    public void setFishs(	String fish_0, String fish_1, String fish_2, String fish_3, String fish_4, 
			String fish_5, String fish_6, String fish_7, String fish_8, String fish_9) 
	{
		this.fish_0 = fish_0;         this.fish_1 = fish_1;
		this.fish_2 = fish_2;         this.fish_3 = fish_3;
		this.fish_4 = fish_4;         this.fish_5 = fish_5;
		this.fish_6 = fish_6;         this.fish_7 = fish_7;
		this.fish_8 = fish_8;         this.fish_9 = fish_9;
	} 
	
    public void setOthers(	String other_0, String other_1, String other_2, String other_3, String other_4, 
			String other_5, String other_6, String other_7, String other_8, String other_9) 
	{
		this.other_0 = other_0;         this.other_1 = other_1;
		this.other_2 = other_2;         this.other_3 = other_3;
		this.other_4 = other_4;         this.other_5 = other_5;
		this.other_6 = other_6;         this.other_7 = other_7;
		this.other_8 = other_8;         this.other_9 = other_9;
	} 	
    
    
    public void setDeserts(	String desert_0, String desert_1, String desert_2, String desert_3, String desert_4, 
			String desert_5, String desert_6, String desert_7, String desert_8, String desert_9) 
	{
		this.desert_0 = desert_0;         this.desert_1 = desert_1;
		this.desert_2 = desert_2;         this.desert_3 = desert_3;
		this.desert_4 = desert_4;         this.desert_5 = desert_5;
		this.desert_6 = desert_6;         this.desert_7 = desert_7;
		this.desert_8 = desert_8;         this.desert_9 = desert_9;
	}

    public void setPriceMenus(	String p_menu_0, String p_menu_1, String p_menu_2, String p_menu_3, String p_menu_4, 
			String p_menu_5, String p_menu_6, String p_menu_7, String p_menu_8, String p_menu_9) 
	{
		this.p_menu_0 = p_menu_0;         this.p_menu_1 = p_menu_1;
		this.p_menu_2 = p_menu_2;         this.p_menu_3 = p_menu_3;
		this.p_menu_4 = p_menu_4;         this.p_menu_5 = p_menu_5;
		this.p_menu_6 = p_menu_6;         this.p_menu_7 = p_menu_7;
		this.p_menu_8 = p_menu_8;         this.p_menu_9 = p_menu_9;
	} 

    public void setPriceDrinks(	String p_drink_0, String p_drink_1, String p_drink_2, String p_drink_3, String p_drink_4, 
			String p_drink_5, String p_drink_6, String p_drink_7, String p_drink_8, String p_drink_9) 
	{
		this.p_drink_0 = p_drink_0;         this.p_drink_1 = p_drink_1;
		this.p_drink_2 = p_drink_2;         this.p_drink_3 = p_drink_3;
		this.p_drink_4 = p_drink_4;         this.p_drink_5 = p_drink_5;
		this.p_drink_6 = p_drink_6;         this.p_drink_7 = p_drink_7;
		this.p_drink_8 = p_drink_8;         this.p_drink_9 = p_drink_9;
	} 
	
    public void setPriceEntrys(	String p_entry_0, String p_entry_1, String p_entry_2, String p_entry_3, String p_entry_4, 
			String p_entry_5, String p_entry_6, String p_entry_7, String p_entry_8, String p_entry_9) 
	{
		this.p_entry_0 = p_entry_0;         this.p_entry_1 = p_entry_1;
		this.p_entry_2 = p_entry_2;         this.p_entry_3 = p_entry_3;
		this.p_entry_4 = p_entry_4;         this.p_entry_5 = p_entry_5;
		this.p_entry_6 = p_entry_6;         this.p_entry_7 = p_entry_7;
		this.p_entry_8 = p_entry_8;         this.p_entry_9 = p_entry_9;
	} 
    
    public void setPriceMeats(	String p_meat_0, String p_meat_1, String p_meat_2, String p_meat_3, String p_meat_4, 
			String p_meat_5, String p_meat_6, String p_meat_7, String p_meat_8, String p_meat_9) 
	{
		this.p_meat_0 = p_meat_0;         this.p_meat_1 = p_meat_1;
		this.p_meat_2 = p_meat_2;         this.p_meat_3 = p_meat_3;
		this.p_meat_4 = p_meat_4;         this.p_meat_5 = p_meat_5;
		this.p_meat_6 = p_meat_6;         this.p_meat_7 = p_meat_7;
		this.p_meat_8 = p_meat_8;         this.p_meat_9 = p_meat_9;
	} 
	
    public void setPriceFishs(	String p_fish_0, String p_fish_1, String p_fish_2, String p_fish_3, String p_fish_4, 
			String p_fish_5, String p_fish_6, String p_fish_7, String p_fish_8, String p_fish_9) 
	{
		this.p_fish_0 = p_fish_0;         this.p_fish_1 = p_fish_1;
		this.p_fish_2 = p_fish_2;         this.p_fish_3 = p_fish_3;
		this.p_fish_4 = p_fish_4;         this.p_fish_5 = p_fish_5;
		this.p_fish_6 = p_fish_6;         this.p_fish_7 = p_fish_7;
		this.p_fish_8 = p_fish_8;         this.p_fish_9 = p_fish_9;
	} 
	
    public void setPriceOthers(	String p_other_0, String p_other_1, String p_other_2, String p_other_3, String p_other_4, 
			String p_other_5, String p_other_6, String p_other_7, String p_other_8, String p_other_9) 
	{
		this.p_other_0 = p_other_0;         this.p_other_1 = p_other_1;
		this.p_other_2 = p_other_2;         this.p_other_3 = p_other_3;
		this.p_other_4 = p_other_4;         this.p_other_5 = p_other_5;
		this.p_other_6 = p_other_6;         this.p_other_7 = p_other_7;
		this.p_other_8 = p_other_8;         this.p_other_9 = p_other_9;
	} 	
    
    
    public void setPriceDeserts(	String p_desert_0, String p_desert_1, String p_desert_2, String p_desert_3, String p_desert_4, 
			String p_desert_5, String p_desert_6, String p_desert_7, String p_desert_8, String p_desert_9) 
	{
		this.p_desert_0 = p_desert_0;         this.p_desert_1 = p_desert_1;
		this.p_desert_2 = p_desert_2;         this.p_desert_3 = p_desert_3;
		this.p_desert_4 = p_desert_4;         this.p_desert_5 = p_desert_5;
		this.p_desert_6 = p_desert_6;         this.p_desert_7 = p_desert_7;
		this.p_desert_8 = p_desert_8;         this.p_desert_9 = p_desert_9;
	}
}