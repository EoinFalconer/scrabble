import java.io.BufferedReader;
import java.io.EOFException;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.io.PrintWriter;
import java.net.ServerSocket;
import java.net.Socket;

/**
 * A simple class that opens a server socket, and prints each message received
 * to the console.
 * @author Graeme Stevenson (graeme.stevenson@ucd.ie)
 */
public class TCPSocketServer {

   /**
    * Accept this many connections.
    */
   private int my_backlog = 5;

   /**
    * The server socket.
    */
   private ServerSocket my_serverSocket;

   /**
    * Create the server socket.
    * @param a_port the port that the server socket should listen on.
    */
   public TCPSocketServer(int a_port) {
      try {
         my_serverSocket = new ServerSocket(a_port, my_backlog);
         System.out.println("TCP socket listening on port " + a_port);
      } catch (IOException ioe) {
         ioe.printStackTrace();
      } catch (SecurityException se) {
         se.printStackTrace();
      }
   }

   /**
    * Method that listens on the server socket forever and prints each incoming
    * message to the console.
    */
   public void listen() {
      while (true) {
         try {
            // Listens for a connection to be made to this socket.
            Socket socket = my_serverSocket.accept();

            // Wrap a buffered reader round the socket input stream.
            // Read the javadoc to understand why we do this rather than dealing
            // with reading from raw sockets.
            BufferedReader in = new BufferedReader(new InputStreamReader(socket
                  .getInputStream()));
            PrintWriter out = new PrintWriter(socket.getOutputStream(), true);
            // Read in the message
            String msg = in.readLine();

            // Print the message to the console
            System.out.println("Server Listening");
            System.out.println("Received message: " + msg);
            String newMessage = "Your message is: " + msg;
            out.println(newMessage);
            // EXERCISE: Instead of printing out client messages to the console:
            // 1. Construct a response in the form "Your message is: <message>".
            // 2. Send the response back to the client.
            
            // tidy up
            in.close();
            out.close();
            socket.close();
         } catch (IOException ioe) {
            ioe.printStackTrace();
         } catch (SecurityException se) {
            se.printStackTrace();
         }
      }
   }
   public void divideNumbers(){
	   //listen for the client to send stuff.
	   try {
		Socket socket = my_serverSocket.accept(); //create socket only once
		ObjectInputStream in = new ObjectInputStream(socket.getInputStream());
		ObjectOutputStream out = new ObjectOutputStream(socket.getOutputStream());
		while(true){
			try{
				int[] twoNumbers = (int[])in.readObject(); //read in the first one.
				System.out.println("About to divide: " + twoNumbers[0] + " and " + twoNumbers[1]);
				double answer = twoNumbers[0] / twoNumbers[1];
				out.writeObject(answer);
			}catch (EOFException ex1) {
                break; //EOF reached.
            }
	   }
		in.close();
		out.close();
		socket.close();
	} catch (IOException | ClassNotFoundException e) {
		// TODO Auto-generated catch block
		e.printStackTrace();
	}
	   
   }
   /**
    * Parse the arguments to the program and create the server socket.
    * @param args the program arguments. Should take the form &lt;port&gt;
    */
   public static void main(String[] args) {
      int port = 0;

      // Check we have the right number of arguments and parse
      if (args.length == 1) {
         try {
            port = Integer.valueOf(args[0]);
         } catch (NumberFormatException nfe) {
            System.err.println("The value provided for the port is not an integer");
            nfe.printStackTrace();
         }
         // Create the server
         TCPSocketServer server = new TCPSocketServer(port);
         // Listen on the server socket. This will run until the program is
         // killed.
        // server.listen();
         System.out.println("trying to call divideNumbers from main");
         server.divideNumbers();
      } else {
         System.out.println("Usage: java TCPSocketServer <port>");
      }

   }
} // end class

