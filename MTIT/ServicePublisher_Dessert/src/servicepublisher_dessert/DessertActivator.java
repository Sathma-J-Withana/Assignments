package servicepublisher_dessert;

import org.osgi.framework.BundleActivator;
import org.osgi.framework.BundleContext;
import org.osgi.framework.ServiceRegistration;

public class DessertActivator implements BundleActivator {

		ServiceRegistration publishServiceRegistration;
		
	

	public void start(BundleContext context) throws Exception {
		System.out.println("Dessert Publisher start");
		DessertServicePublish publisherService = new DessertServicePublishImpl();
		publishServiceRegistration = context.registerService(
				DessertServicePublish.class.getName(),publisherService,null);
				
				
	}

	public void stop(BundleContext context) throws Exception {
		System.out.println("Dessert Publisher stop");
		publishServiceRegistration.unregister();
	}

}
