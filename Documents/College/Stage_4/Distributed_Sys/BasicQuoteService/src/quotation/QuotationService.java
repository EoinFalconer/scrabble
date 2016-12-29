package quotation;

import core.ClientInfo;
import core.Quotation;
import javax.jws.WebService;
import javax.jws.WebMethod;
/**
 * Interface to define the behaviour of a quotation service.
 * 
 * @author Rem
 *
 */
@WebService
public interface QuotationService {
	@WebMethod public Quotation generateQuotation(ClientInfo info);
	
}
