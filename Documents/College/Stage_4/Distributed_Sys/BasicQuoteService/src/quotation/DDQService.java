package quotation;

import javax.jws.WebService;

import core.AbstractQuotationService;
import core.ClientInfo;
import core.Quotation;

/**
 * Implementation of Quotation Service for Dodgy Drivers Insurance Company
 *  
 * @author Rem
 *
 */
@WebService
public class DDQService extends AbstractQuotationService implements QuotationService {
	// All references are to be prefixed with an DD (e.g. DD001000)
	public static final String PREFIX = "DD";
	
	/**
	 * Quote generation:
	 * 5% discount per penalty point (3 points required for qualification)
	 * 50% penalty for <= 3 penalty points
	 * 10% discount per year no claims
	 */
	@Override
	public Quotation generateQuotation(ClientInfo info) {
		// Create an initial quotation between 800 and 1000
		double price = generatePrice(800, 200);
		
		// 5% discount per penalty point (3 points required for qualification)
		int discount = (info.getPoints() > 3) ? 5*info.getPoints():-50;
		
		// Add a no claims discount
		discount += getNoClaimsDiscount(info);
		
		// Generate the quotation and send it back
		Quotation quotation = new Quotation();
		
		// Use the reference generator to create a reference
		quotation.setReference(generateReference(PREFIX));
		quotation.setClientInfo(info);
		quotation.setPrice((price * (100-discount)) / 100);
		
		return quotation;
	}

	private int getNoClaimsDiscount(ClientInfo info) {
		return 10*info.getNoClaims();
	}

}
