package servicepublisher_dessert;

public class DessertServicePublishImpl implements DessertServicePublish{

	@Override
	public int publishService(int type, int flavor) {
		int price = 0;
		
		if(type==1 && flavor==1) {
			price = 200;// Vanila Icecream
			
		}
		else if(type==1 && flavor==2) {
			price = 400;// Vanila puddin
			
		}
		else if(type==1 && flavor==3) {
			price = 300;// Vanila cake
			
		}
		else if(type==2 && flavor==1) {
			price = 300;// chocolate Icecream
			
		}
		else if(type==2 && flavor==2) {
			price = 500;// chocolate puddin
			
		}
		else if(type==2 && flavor==3) {
			price = 400;// chocolate cake
			
		}
		else if(type==3 && flavor==1) {
			price = 300;// strawberry Icecream
			
		}
		else if(type==3 && flavor==2) {
			price = 500;// strawberry puddin
			
		}
		else if(type==3 && flavor==3) {
			price = 400;// Strawberry cake
			
		}
		else {
			System.out.println("Dessert not found!");
		}
		
		int totalprice;
		return totalprice = type* flavor;
	}
	
	

}
