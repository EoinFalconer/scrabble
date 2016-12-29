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

		// Create the broker and run the test data
		LocalBrokerService broker = new LocalBrokerService();
		for (ClientInfo info : clients) {
			System.out.println("Name: " +info.getName());
			for(Quotation quotation : broker.getQuotations(info)) {
				System.out.println("Reference: " + quotation.getReference() + " / Price: " + quotation.getPrice());
			}
		}
	}

	/**
	 * Test client data
	 */
	public static final ClientInfo[] clients = {
			new ClientInfo() {
				@Override
				public String getName() {
					return "Niki Collier";
				}

				@Override
				public char getSex() {
					return ClientInfo.MALE;
				}

				@Override
				public int getAge() {
					return 41;
				}

				@Override
				public int getPoints() {
					return 0;
				}

				@Override
				public int getNoClaims() {
					return 7;
				}
				
				@Override 
				public String getLicenceNumber() {
					return "PQR254/1";
				}
			},
			new ClientInfo() {
				@Override
				public String getName() {
					return "Old Geeza";
				}

				@Override
				public char getSex() {
					return ClientInfo.MALE;
				}

				@Override
				public int getAge() {
					return 65;
				}

				@Override
				public int getPoints() {
					return 0;
				}

				@Override
				public int getNoClaims() {
					return 2;
				}
				
				@Override 
				public String getLicenceNumber() {
					return "ABC123/4";
				}
			},			
			new ClientInfo() {
				@Override
				public String getName() {
					return "Donald Duck";
				}

				@Override
				public char getSex() {
					return ClientInfo.MALE;
				}

				@Override
				public int getAge() {
					return 35;
				}

				@Override
				public int getPoints() {
					return 5;
				}

				@Override
				public int getNoClaims() {
					return 2;
				}

				@Override 
				public String getLicenceNumber() {
					return "XYZ567/9";
				}
			}			
		};
}
