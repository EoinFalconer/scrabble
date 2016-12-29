import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.io.PrintWriter;
import java.io.Serializable;
import java.net.DatagramPacket;
import java.net.DatagramSocket;
import java.net.Socket;
import java.util.Random;

/**
 * A simple class that opens a socket, sends a message to the server, and
 * terminates.
 * @author Graeme Stevenson (graeme.stevenson@ucd.ie)
 */
public class TCPSocketClient implements Serializable {
	int AMOUNT_OF_DIVIDES = 100; //constant to define amount of divides to occur
   /**
	 * 
	 */
	private static final long serialVersionUID = 1L;

/**
	 * 
	 */

/**
    * The server host name.
    */
   public String my_serverHost = "localhost";

   /**
    * The server port.
    */
   public int my_serverPort = 80;

   /**
    * Sets the client up with the server details.
    * @param the_serverHost the server host name.
    * @param the_serverPort the server port.
    */
   public TCPSocketClient(String the_serverHost, int the_serverPort) {
      my_serverHost = the_serverHost;
      my_serverPort = the_serverPort;
   }
   public void sendToBeDivided(int firstNumber, int secondNumber){
	   try{
		  Socket server = new Socket(my_serverHost,my_serverPort);
		  ObjectOutputStream out = new ObjectOutputStream(server.getOutputStream());
	      ObjectInputStream in = new ObjectInputStream(server.getInputStream());
	      Random ran = new Random();
		  int[] numbers = {firstNumber, secondNumber};
		  for(int i=0;i<AMOUNT_OF_DIVIDES;i++){
			  System.out.println("client sending numbers to server: " + numbers[0] + " and " + numbers[1]);
		      out.writeObject(numbers);
			  //read the result from the server
		      double response = (double)in.readObject();
		      System.out.println("recevied a response from server: " + response);
		      int number1 = ran.nextInt(99) + 1;
		      int number2 = ran.nextInt(99) + 1;
		      int[] tempArray = {number1,number2};
		      numbers = tempArray;
		  }
		  System.out.println("finished looping" + AMOUNT_OF_DIVIDES + "times");
	        in.close();
	        out.close();
	        server.close();
	   }catch (IOException ioe) {
	         ioe.printStackTrace();
	   } catch (SecurityException se) {
	         se.printStackTrace();
	   } catch (ClassNotFoundException cnfe) {
		cnfe.printStackTrace();
	}
   }
   /**
    * Creates a connection to the server and sends a message.
    * @param a_message the message to send to the server.
    */
   public void sendMessage(String a_message) {
      try {
         // Create a connection to the server.
    	  System.out.println(my_serverHost + ", " + my_serverPort);
         Socket toServer = new Socket(my_serverHost, my_serverPort);

         // Wrap a PrintWriter round the socket output stream.
         // Read the javadoc to understand (1) the method arguments, and (2) why
         // we do this rather than writing to raw sockets.
         PrintWriter out = new PrintWriter(toServer.getOutputStream(), true);

         // Write the message to the socket.
         System.out.println("client sending " + a_message);
         out.println(a_message);
         
         System.out.println("client about to read response from server");
         BufferedReader in = new BufferedReader(new InputStreamReader(toServer
                 .getInputStream()));
         String response = in.readLine();
         System.out.println("cleint received response: " + response);
         
         // EXERCISE: Extend this code to
         // 1. Read the response from the server.
         // 2. Print the response out to the console.

         // tidy up
         in.close();
         out.close();
         toServer.close();
      } catch (IOException ioe) {
         ioe.printStackTrace();
      } catch (SecurityException se) {
         se.printStackTrace();
      }
   }

   /**
    * Parse the arguments to the program, create a socket, and send a message.
    * @param args the program arguments. Should take the form &lt;host&gt;
    *           &lt;port&gt; &lt;message&gt;
    */
   public static void main(String[] args) {
	   
      String host = null;
      int port = 0;
      //String message = null;
      // Check we have the right number of arguments and parse
      if (args.length == 4) {
         host = args[0];
         try {
            port = Integer.valueOf(args[1]);
         } catch (NumberFormatException nfe) {
            System.err.println("The value provided for the port is not an integer");
            nfe.printStackTrace();
         }
        // message = args[2];

         // Create the client
         TCPSocketClient client = new TCPSocketClient(host, port);
         // Send a message using the client
         
         //client.sendMessage(message); //commenting out from question 4 - need to change args
         client.sendToBeDivided(Integer.valueOf(args[2]), Integer.valueOf(args[3]));
      } else {
         System.out.println("Usage: java TCPSocketClient <host> <port> <message>");
      }

   }
} // end class

