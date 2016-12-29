package quotation;

import javax.jws.WebService;
import javax.xml.ws.Endpoint;

@WebService(name="StockService")

public class Deploy {
	public static void main(String args[]) throws Exception {
        Endpoint.publish("http://localhost:9000/QuoteService/GetQuote", new GPQService());
        Endpoint.publish("http://localhost:9001/QuoteService/GetQuote", new AFQService());
        Endpoint.publish("http://localhost:9002/QuoteService/GetQuote", new DDQService());
    }

}
