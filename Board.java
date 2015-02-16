
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


import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.Scanner;

public class Board {
	
	private final int HORIZONTAL_INDEX=15;
    private final int VERTICAL_INDEX=15;
    private Square boardArray[][];
    private Scanner in;
    
    private String[] arrayOfLines = new String[200];
    private String[] A = new String[500];
    private String[] B = new String[500];
    private String[] C = new String[500];
    private String[] D = new String[500];
    private String[] E = new String[500];
    private String[] F = new String[500];
    private String[] G = new String[500];
    private String[] H = new String[500];
    private String[] I = new String[500];
    private String[] J = new String[500];
    private String[] K = new String[500];
    private String[] L = new String[500];
    private String[] M = new String[500];
    private String[] N = new String[500];
    private String[] O = new String[500];

    
    public Board(){
        boardArray = new Square[HORIZONTAL_INDEX][VERTICAL_INDEX];
        for(int i=0;i<HORIZONTAL_INDEX;i++) { 
            for(int j=0;j<VERTICAL_INDEX;j++) { 
            boardArray[i][j] = new Square(); 
            } 
            }
    }
    
    
    public void populateBoard() throws NullPointerException {
    	 BufferedReader b1 = null;
    	 
    	 URL BoardURL = null;
				try 
				{
					BoardURL = new URL("http://breynolds.netsoc.com/boardtxt.txt");
				} 
				catch (MalformedURLException e1) 
				{
					e1.printStackTrace();
				}
		 try{
			 b1 = new BufferedReader(new InputStreamReader(BoardURL.openStream()));
			 
			 String line;
			 int i = 0;
			 
			 while (((line = b1.readLine() ) != null))  {
				 arrayOfLines[i] = line;
				 i++;
			 }
			 
			 
			 b1.close();
			 
			 
			
		 }catch (Exception e){
			  e.printStackTrace();
	      }
		 int i = 0;
		    A = arrayOfLines[0].split(" ");
				for(i=0; i < 15; i++) {
					
					boardArray[0][i].getSquareName(A[i]);
					
						 if((i == 0) || (i == 7) || (i == 14)) {
							 boardArray[0][i].getSquareScore("tword"); 
						}
						 
							if((i == 3) || (i == 11)){
								boardArray[0][i].getSquareScore("dletter");
							}
				}
			   
				String[] B = arrayOfLines[1].split(" ");
				for(i=0;i < 15;i++){
					boardArray[1][i].getSquareName(B[i]);
					
						if((i == 1) || (i == 13)){
							boardArray[1][i].getSquareScore("dword");
						}
							if((i == 5) || (i == 9)){
								boardArray[1][i].getSquareScore("tletter");
							}
				}
				
				 C = arrayOfLines[2].split(" ");
				for(i=0;i < 15;i++){
					boardArray[2][i].getSquareName(C[i]);
					if((i == 2) || (i == 12)){
						boardArray[2][i].getSquareScore("dword");
					}
					if((i == 6) || (i == 8)){
						boardArray[2][i].getSquareScore("dletter");
					}
				}
				
				D = arrayOfLines[3].split(" ");
				for(i=0;i < 15;i++){
					boardArray[3][i].getSquareName(D[i]);
					if((i ==0) || (i == 7) || (i == 14)){
						boardArray[3][i].getSquareScore("dletter");
					}
					if((i == 3) || (i == 11)){
						boardArray[3][i].getSquareScore("dword");
					}
				}
				
				E = arrayOfLines[4].split(" ");
				for(i=0;i < 15;i++){
					 boardArray[4][i].getSquareName(E[i]);
					if((i == 4) || (i == 10)){
						boardArray[4][i].getSquareScore("dword");
					}
				}
				
				F = arrayOfLines[5].split(" ");
				for(i=0;i < 15;i++){
					 boardArray[5][i].getSquareName(F[i]);
					if((i == 1) || (i == 5) || (i == 9) || (i == 13)){
						boardArray[5][i].getSquareScore("tletter");
					}
				}
				G = arrayOfLines[6].split(" ");
				for(i=0;i < 15;i++){
					boardArray[6][i].getSquareName(G[i]); //2 6 8 12
					if((i == 2) || (i == 6) || (i == 8)|| (i == 12)){
						boardArray[6][i].getSquareScore("dletter");
					}
				}
				 H = arrayOfLines[7].split(" ");
				for(i=0;i < 15;i++){
					boardArray[7][i].getSquareName(H[i]);
					if((i == 0) || (i == 14)){
						boardArray[7][i].getSquareScore("tword");
					}
					if((i == 3) || (i == 11)){
						boardArray[7][i].getSquareScore("dletter");
					}
				}
				 I = arrayOfLines[8].split(" ");
				for( i=0;i < 15;i++){
					boardArray[8][i].getSquareName(I[i]);
					if((i == 2) || (i == 6) || (i == 8)|| (i == 12)){
						boardArray[8][i].getSquareScore("dletter");
					}
				}
				 J = arrayOfLines[9].split(" ");
				for(i=0;i < 15;i++){
					boardArray[9][i].getSquareName(J[i]);
					if((i == 1) || (i == 5) || (i == 9) || (i == 13)){
						boardArray[9][i].getSquareScore("tletter");
					}
				}
				 K = arrayOfLines[10].split(" ");
				for(i=0;i < 15;i++){
					boardArray[10][i].getSquareName(K[i]);
					if((i == 4) || (i == 10)){
						boardArray[10][i].getSquareScore("dword");
					}
				}
				 L = arrayOfLines[11].split(" ");
				for(i=0;i < 15;i++){
					 boardArray[11][i].getSquareName(L[i]);
					if((i ==0) || (i == 7) || (i == 14)){
						boardArray[11][i].getSquareScore("dletter");
					}
					if((i == 3) || (i == 11)){
						boardArray[11][i].getSquareScore("dword");
					}
				}
				 M = arrayOfLines[12].split(" ");
				for(i=0;i < 15;i++){
					boardArray[12][i].getSquareName(M[i]);
					if((i == 2) || (i == 12)){
						boardArray[12][i].getSquareScore("dword");
					}
					if((i == 6) || (i == 8)){
						boardArray[12][i].getSquareScore("dletter");
					}
				}
				 N = arrayOfLines[13].split(" ");
				for(i=0;i < 15;i++){
					 boardArray[13][i].getSquareName(N[i]);
					if((i == 1) || (i == 13)){
						boardArray[13][i].getSquareScore("dword");
					}
					if((i == 5) || (i == 9)){
						boardArray[13][i].getSquareScore("tletter");
					}
				}
				 O = arrayOfLines[14].split(" ");
				for(i=0;i < 15;i++){
					 boardArray[14][i].getSquareName(O[i]);
					if((i == 0) || (i == 7) || (i == 14)){
						boardArray[14][i].getSquareScore("tword"); 
					}
					if((i == 3) || (i == 11)){
					boardArray[14][i].getSquareScore("dletter");
					}
				}
			
    }
    public boolean isPlacedInBoard(String s){
    	boolean flag = false;
    	for(int i=0;i<15;i++){
    		for(int j=0;j<15;j++){
    			if(boardArray[i][j].returnSquareName() == s){
    				flag = true;
    				break;
    			}
    			else{
    				flag = false;
    			}
    		}
    	}
    	if(flag = true){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    
    public void displayBoard() throws NullPointerException {
    	
    	
    	for(int i=0; i < 15;i++){
    		if(boardArray[0][i].tileInSquareScore != 0){
    			System.out.print("\t" + boardArray[0][i].tileInSquareValue +"\t|");
    		}
    		else{
			System.out.print("\t" + boardArray[0][i].returnSquareName() + boardArray[0][i].returnSquareScore()+"\t|");
    		}
		}
    	
    	System.out.println();
    	System.out.println("-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------");

    	for(int i=0; i < 15;i++){
    		if(boardArray[1][i].tileInSquareScore != 0){
    			System.out.print("\t" + boardArray[1][i].tileInSquareValue +"\t|");
    		}
    		else{
    		System.out.print("\t" + boardArray[1][i].returnSquareName()  + boardArray[1][i].returnSquareScore()+"\t|");
    		}
    		}
    	
    	System.out.println();
    	System.out.println("-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------");

    	for(int i=0; i < 15;i++){
    		if(boardArray[2][i].tileInSquareScore != 0){
    			System.out.print("\t" + boardArray[2][i].tileInSquareValue +"\t|");
    		}
    		else{
    		System.out.print("\t" + boardArray[2][i].returnSquareName() +  boardArray[2][i].returnSquareScore()+"\t|");
    		}
		}
    	
    	System.out.println();
    	System.out.println("-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------");

    	for(int i=0; i < 15;i++){
    		if(boardArray[3][i].tileInSquareScore != 0){
    			System.out.print("\t" + boardArray[3][i].tileInSquareValue +"\t|");
    		}
    		else{
			System.out.print("\t" + boardArray[3][i].returnSquareName() +  boardArray[3][i].returnSquareScore()+"\t|");
    		}
    		}
    	
    	System.out.println();
    	System.out.println("-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------");

    	for(int i=0; i < 15;i++){
    		if(boardArray[4][i].tileInSquareScore != 0){
    			System.out.print("\t" + boardArray[4][i].tileInSquareValue +"\t|");
    		}
    		else{
			System.out.print("\t" + boardArray[4][i].returnSquareName() +  boardArray[4][i].returnSquareScore() +"\t|");
    		}
    		}
    	
    	System.out.println();
    	System.out.println("-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------");

    	for(int i=0; i < 15;i++){
    		if(boardArray[5][i].tileInSquareScore != 0){
    			System.out.print("\t" + boardArray[5][i].tileInSquareValue +"\t|");
    		}
    		else{
			System.out.print("\t" + boardArray[5][i].returnSquareName() + boardArray[5][i].returnSquareScore() +"\t|");
    		}
    		}
    	
    	System.out.println();
    	System.out.println("-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------");

    	for(int i=0; i < 15;i++){
    		if(boardArray[6][i].tileInSquareScore != 0){
    			System.out.print("\t" + boardArray[6][i].tileInSquareValue +"\t|");
    		}
    		else{
			System.out.print("\t" + boardArray[6][i].returnSquareName() + boardArray[6][i].returnSquareScore() +"\t|");
    		}
    		}
    	
    	System.out.println();
    	System.out.println("-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------");

    	for(int i=0; i < 15;i++){
    		if(boardArray[7][i].tileInSquareScore != 0){
    			System.out.print("\t" + boardArray[7][i].tileInSquareValue +"\t|");
    		}
    		else{
			System.out.print("\t" + boardArray[7][i].returnSquareName() +  boardArray[7][i].returnSquareScore() +"\t|");
    		}
    		}
    	
    	System.out.println();
    	System.out.println("-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------");

    	for(int i=0; i < 15;i++){
    		if(boardArray[8][i].tileInSquareScore != 0){
    			System.out.print("\t" + boardArray[8][i].tileInSquareValue +"\t|");
    		}
    		else{
			System.out.print("\t" + boardArray[8][i].returnSquareName() +  boardArray[8][i].returnSquareScore() +"\t|");
    		}
    		}
    	
    	System.out.println();
    	System.out.println("-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------");

    	for(int i=0; i < 15;i++){
    		if(boardArray[9][i].tileInSquareScore != 0){
    			System.out.print("\t" + boardArray[9][i].tileInSquareValue +"\t|");
    		}
    		else{
			System.out.print("\t" + boardArray[9][i].returnSquareName() +  boardArray[9][i].returnSquareScore() +"\t|" );
    		}
    		}
    	
    	System.out.println();
    	System.out.println("-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------");

    	for(int i=0; i < 15;i++){
    		if(boardArray[10][i].tileInSquareScore != 0){
    			System.out.print("\t" + boardArray[10][i].tileInSquareValue +"\t|");
    		}
    		else{
			System.out.print("\t" + boardArray[10][i].returnSquareName() +  boardArray[10][i].returnSquareScore() +"\t|" );
    		}
    		}
    	
    	System.out.println();
    	System.out.println("-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------");

    	for(int i=0; i < 15;i++){
    		if(boardArray[11][i].tileInSquareScore != 0){
    			System.out.print("\t" + boardArray[11][i].tileInSquareValue +"\t|");
    		}
    		else{
			System.out.print("\t" + boardArray[11][i].returnSquareName() + boardArray[11][i].returnSquareScore() +"\t|" );
    		}
    		}
    	
    	System.out.println();
    	System.out.println("-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------");
    	for(int i=0; i < 15;i++){
    		if(boardArray[12][i].tileInSquareScore != 0){
    			System.out.print("\t" + boardArray[12][i].tileInSquareValue +"\t|");
    		}
    		else{
			System.out.print("\t" + boardArray[12][i].returnSquareName() +  boardArray[12][i].returnSquareScore() +"\t|" );
    		}
    		}
    	
    	System.out.println();
    	System.out.println("-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------");

    	for(int i=0; i < 15;i++){
    		if(boardArray[13][i].tileInSquareScore != 0){
    			System.out.print("\t" + boardArray[13][i].tileInSquareValue +"\t|");
    		}
    		else{
			System.out.print("\t" + boardArray[13][i].returnSquareName()  + boardArray[13][i].returnSquareScore() +"\t|");
    		}
    		}
    	
    	System.out.println();
    	System.out.println("-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------");

    	for(int i=0; i < 15;i++){
    		if(boardArray[14][i].tileInSquareScore != 0){
    			System.out.print("\t" + boardArray[14][i].tileInSquareValue +"\t|");
    		}
    		else{
			System.out.print("\t" + boardArray[14][i].returnSquareName()  + boardArray[14][i].returnSquareScore() +"\t|" );
    		}
    		}
    	
    	
    }
    public boolean firstWordInCentre(){
    	if(!boardArray[7][7].returnSquareName().equals(null)){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    	  public void insertOnBoard(char chooseLetter, String coordinate, Frame f) throws RankOutOfBoundsException{
    	        Tile e = null;
    	        int index = 0;
    	        char cUpper = Character.toUpperCase(chooseLetter);
    	        String sUpper = coordinate.toUpperCase();
    	             
    	                for(int i=0; i<7; i++){
    	                    if (cUpper == f.arrayOfTiles[i].getName()) {
    	                        index = i;   
    	                    }
    	                    e = f.getTileRank(index);
    	                for(i=0;i<15;i++){
    	                	for(int j=0;j<15;j++){
    	                		
    	                		if(boardArray[i][j].squareName.equals(sUpper)){
    	                			boardArray[i][j].tileToSquareValues(e);
    	                			break;
    	                		}
    	                	}
    	                }
    	                }
    	    }
    }
    