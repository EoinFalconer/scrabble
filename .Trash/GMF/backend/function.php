<?php 


 function get_category_name($category) {
      include("connection.php");
      $sql = "SELECT * FROM Categories WHERE category_id = '$category'";      
      $results = mysqli_query($con, $sql);
      if($result = mysqli_fetch_array($results)) {
        return $result['category_name'];
    }
}

function get_product_name($product) {
      include("connection.php");
      $sql = "SELECT * FROM Products WHERE product_id = '$product'";      
      $results = mysqli_query($con, $sql);
      if($result = mysqli_fetch_array($results)) {
        return $result['product_name'];
    }
}


function get_sub_category_name($subcategory) {
 	include("connection.php");
      $sql = "SELECT * FROM Sub_Categories WHERE sub_cat_id = '$subcategory'";      
      $results = mysqli_query($con, $sql);
      if($result = mysqli_fetch_array($results)) {
        return $result['sub_name'];
    }
}

function get_tag_name($tag_id) {

      include("connection.php");
      $sql = "SELECT * FROM Tags WHERE tag_id = '$tag_id'";      
      $results = mysqli_query($con, $sql);
      if($result = mysqli_fetch_array($results)) {
        return $result['tag_name'];
    }
}

function get_month_name($month) {

    switch($month) {
      case "01":
          $string = "Jan";
          break;
      case "02":
          $string = "Feb";
          break;
      case "03":
          $string = "Mar";
          break;
      case "04":
          $string = "Apr";
          break;
      case "05":
          $string = "May";
          break;
      case "06":
          $string = "Jun";
          break;
      case "07":
          $string = "Jul";
          break;
      case "08":
          $string = "Aug";
          break;
       case "09":
          $string = "Sept";
          break;
      case "10":
          $string = "Oct";
          break;
      case "11":
          $string = "Nov";
          break;
      case "12":
          $string = "Dec";
          break;
    }
    return $string;
}

?>

<script type="text/javascript">
                                                                          var datefield=document.createElement("input")
                                                                          datefield.setAttribute("type", "date")
                                                                          if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
                                                                             document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
                                                                            document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
                                                                            document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n')
                                                                          }
                                                                       </script>

                                                                     <script>
                                                                        if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
                                                                           jQuery(function($){ //on document.ready
                                                                               $('#test').datepicker({ dateFormat: 'yy-mm-dd' }).val();
                                                                           })
                                                                        }

                                                                        if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
                                                                           jQuery(function($){ //on document.ready
                                                                               $('#test2').datepicker({ dateFormat: 'yy-mm-dd' }).val();
                                                                           })
                                                                        }

                                                                        if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
                                                                           jQuery(function($){ //on document.ready
                                                                               $('#test3').datepicker({ dateFormat: 'yy-mm-dd' }).val();
                                                                           })
                                                                        }

                                                                        if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
                                                                           jQuery(function($){ //on document.ready
                                                                               $('#test4').datepicker({ dateFormat: 'yy-mm-dd' }).val();

                                                                           })
                                                                        }
                                                                </script>