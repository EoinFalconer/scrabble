package test;

import core.ClientInfo;
import core.Quotation;
import impl.LocalBrokerService;
import quotation.AFQService;
import quotation.DDQService;
import quotation.GPQService;
import registry.ServiceRegistry;
import vetting.LocalVettingService;

public class Main {
	public static void main(String[] args) {
		// Create the services and bind them to the registry.
		ServiceRegistry.bind("qs-GirlPowerService", new GPQService());
		ServiceRegistry.bind("qs-AuldFellasService", new AFQService());
		ServiceRegistry.bind("qs-DodgyDriversService", new DDQService());
		ServiceRegistry.bind("vs-VettingService", new LocalVettingService());

		// Create the broker and run the test data
		LocalBrokerService broker = new LocalBrokerService();
		for (ClientInfo info : clients) {
			System.out.println("Name: " +info.name);
			for(Quotation quotation : broker.getQuotations(info)) {
				System.out.println("Reference: " + quotation.reference + " / Price: " + quotation.price);
			}
		}
	}

	/**
	 * Test client data
	 */
	public static final ClientInfo[] clients = {
		new ClientInfo("Niki Collier", ClientInfo.MALE, 41, 0, 7, "PQR254/1"),
		new ClientInfo("Old Geeza", ClientInfo.MALE, 65, 0, 2, "ABC123/4"),
		new ClientInfo("Donald Duck", ClientInfo.MALE, 35, 5, 2, "XYZ567/9")		
	};
}
