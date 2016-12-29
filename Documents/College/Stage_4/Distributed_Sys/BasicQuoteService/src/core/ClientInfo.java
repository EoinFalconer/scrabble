package core;

/**
 * Interface to define the state to be stored in ClientInfo objects
 * 
 * 
 * Transformed into a data bean
 * 
 * @author Rem
 *
 */
public class ClientInfo {
	public static final char MALE				= 'M';
	public static final char FEMALE				= 'F';
	private String name;
	private char sex;
	private int age;
	private int points;
	private int noClaims;
	private String licenceNumber;
	
	public String getName(){
		return name;
	}
	public char getSex(){
		return sex;
	}
	public int getAge(){
		return age;
	}
	public int getPoints(){
		return points;
	}
	public int getNoClaims(){
		return noClaims;
	}
	public String getLicenceNumber(){
		return licenceNumber;
	}
	public void setName(String newName){
		this.name = newName;
	}
	public void setSex(char newSex){
		this.sex = newSex;
	}
	public void setAge(int newAge){
		this.age = newAge;
	}
	public void setPoints(int newPoints){
		this.points = newPoints;
	}
	public void setNoClaims(int newNoClaims){
		this.noClaims = newNoClaims;
	}
	public void setLicenceNumber(String newLicenceNumber){
		this.licenceNumber = newLicenceNumber;
	}
	
}
