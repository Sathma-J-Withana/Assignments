package servicesubscriber_dessert;

import java.util.Scanner;

import org.osgi.framework.BundleActivator;
import org.osgi.framework.BundleContext;
import org.osgi.framework.ServiceReference;
import servicepublisher_dessert.DessertServicePublish;

public class DessertServiceActivator implements BundleActivator {

	ServiceReference serviceReference;


	public void start(BundleContext context) throws Exception {
		System.out.println("Start Dessert Subscriber");
		serviceReference = context.getServiceReference(DessertServicePublish.class.getName());
		DessertServicePublish servicePublish = (
				DessertServicePublish)context.getService(serviceReference);
		
		
		Scanner sc = new Scanner(System.in);
		String x= "y";
		int type,price,flavor;
		int full_price = 0;
		
		System.out.println("--------------\nDessert Menu\n--------------");
		System.out.println("1.Ice cream");
		System.out.println("2.Puddin");
		System.out.println("3.Cake ");
		
		
		do {
			System.out.print("Enter your prefered Dessert: ");
			type = sc.nextInt();
			System.out.print("Type:\n Vanila - 1\n Chocolate - 2\n Strawberry - 3\n");
			System.out.print("Enter the flavor you want: ");
			flavor = sc.nextInt();
			
			
			System.out.print("Do you want to add more: (press Y/N)");
			x=sc.next();
			
			price = servicePublish.publishService(type, flavor);
			full_price += price; 
		}while(x.equalsIgnoreCase("y"));
		
		System.out.print("Total Price: " + full_price + "\n");
	}

	public void stop(BundleContext context) throws Exception {
		System.out.println("Stop Rice Subscriber");
		context.ungetService(serviceReference);
	}

}
