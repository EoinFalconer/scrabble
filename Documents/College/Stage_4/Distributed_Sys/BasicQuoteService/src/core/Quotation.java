package core;

/**
 * Interface to define the data to be stored in Quotation objects.
 * 
 * Transformed into a data bean
 * 
 * @author Rem
 *
 */
public class Quotation {
	
	private ClientInfo clientInfo;
	private String reference;
	private double price;
	
	public String getReference(){
		return reference;
	}
	public ClientInfo getClientInfo(){
		return clientInfo;
	}
	public double getPrice(){
		return price;
	}
	public void setReference(String newReference){
		this.reference = newReference;
	}
	public void setClientInfo(ClientInfo newClientInfo){
		this.clientInfo = newClientInfo;
	}
	public void setPrice(double newPrice){
		this.price = newPrice;
	}
}
