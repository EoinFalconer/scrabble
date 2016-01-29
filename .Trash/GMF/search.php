<?php
//Check if search data was submitted
if ( isset( $_GET['s'] ) ) {
  // Include the search class
  
/**
 * Performs a search
 *
 * This class is used to perform search functions in a MySQL database
 *
 * @version 1.0
 * @author John Morris <support@johnmorrisonline.com>
 */
class search {
  /**
   * MySQLi connection
   * @access private
   * @var object
   */
  private $mysqli;
  
  /**
   * Constructor
   *
   * This sets up the class
   */
  public function __construct() {
    // Connect to our database and store in $mysqli property
    $this->connect();
  }
  /**
   * Database connection
   * 
   * This connects to our database
   */
  private function connect() {
    $this->mysqli = new mysqli('localhost', 'bitie_ben', 'ireland1234!', 'bitie_GMF_NEW' );
  }
  
  /**
   * Search routine
   * 
   * Performs a search
   * 
   * @param string $search_term The search term
   * 
   * @return array/boolen $search_results Array of search results or false
   */
  public function search($search_term) {
    // Sanitize the search term to prevent injection attacks
    $sanitized = $this->mysqli->real_escape_string($search_term);
    
    // Run the query
    $query = $this->mysqli->query("
      SELECT *
      FROM Products
      WHERE product_name LIKE '%{$sanitized}%'
      OR product_description LIKE '%{$sanitized}%'
    ");
    
    // Check results
    if ( ! $query->num_rows ) {
      return false;
    }
    
    // Loop and fetch objects
    while( $row = $query->fetch_object() ) {
      $rows[] = $row;
    }
    
    // Build our return result
    $search_results = array(
      'count' => $query->num_rows,
      'results' => $rows,
    );
    
    return $search_results;
  }
}
  
  // Instantiate a new instance of the search class
  $search = new search();
  
  // Store search term into a variable
  $search_term = htmlspecialchars($_GET['s'], ENT_QUOTES);
  
  // Send the search term to our search class and store the result
  $search_results = $search->search($search_term);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Search</title>
  </head>
  <body>
    <?php if ( $search_results ) : ?>
    <div class="results-count">
      <p><?php echo $search_results['count']; ?> results found</p>
    </div>
    <div class="results-table">
      <?php foreach ( $search_results['results'] as $search_result ) : ?>
      <div class="result">
        <p><?php echo $search_result->product_name; ?></p>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="search-raw">
      <pre><?php print_r($search_results); ?></pre>
    </div>
    <?php endif; ?>
  </body>
</html>