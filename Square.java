
/**
 * /*
 *  B’sWhyteFalcon
 *	Assignment  1
 *	Ben Reynolds – 13309656
 *	Conor Whyte -   13324911
 *	Eoin Falconer -   13331016
 *
 *  @author B'sWhyteFalcon
 */




public class Square implements SquareInterface {
    String squareScore = " "; // e.g. normal, double, triple
    String squareName = " "; //A1,A2,A3
    private boolean flag;
    int tileInSquareScore = 0;
    char tileInSquareValue;
    
    public Square(){
    	
    }
    public void tileToSquareValues(Tile e) throws NullPointerException 
    {
    	tileInSquareScore = e.score;
    	tileInSquareValue = e.tname;
    }
 

    public void getSquareName(String s) 
    {
        squareName = s;
    }
    
    
    public void getSquareScore(String s){
    	squareScore = s;
    }
    public String returnSquareName(){
    	return squareName;
    }
    
    public String returnSquareScore(){
    	return squareScore;
    }
    @Override
    public boolean isSquareEmpty() {
        if(flag == false){
        	return false;
        }
        else{
        	return true;
        }
    }
    public int calculateTileScore(Tile e){
    	int temp = 0;
    	if(squareScore == "tletter"){
    		temp = e.score * 3; 
    	}
    	return temp;
    }
     
 
}