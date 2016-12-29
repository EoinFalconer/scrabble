package vetting;

import core.ClientInfo;
import javax.jws.WebService;
import javax.jws.WebMethod;

/**
 * Interface defining the expected behavour of a vetting service.
 * 
 * @author Rem
 *
 */
@WebService
public interface VettingService {
	@WebMethod public boolean vetClient(ClientInfo info);
}
