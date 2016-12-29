package impl;

import java.util.LinkedList;
import java.util.List;

import javax.jws.WebService;

import core.ClientInfo;
import core.Quotation;
import quotation.QuotationService;
import registry.ServiceRegistry;
import vetting.VettingService;

@WebService
public class WSBrokerService {
VettingService vettingService = (VettingService) ServiceRegistry.lookup("vs-VettingService");
	
	public List<Quotation> getQuotations(ClientInfo info) {
		List<Quotation> quotations = new LinkedList<Quotation>();
		
		if (vettingService.vetClient(info)) {
			for (String name : ServiceRegistry.list()) {
				if (name.startsWith("qs-")) {
					QuotationService service = (QuotationService) ServiceRegistry.lookup(name);
					quotations.add(service.generateQuotation(info));
				}
			}
		}
		return quotations;
	}
}
