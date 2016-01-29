<?php
    session_start();
    include("connection.php");
?>
<!DOCTYPE html>


<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GMF | Admin Panel</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" /
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">GMF</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="userprofile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->

        <?php

         // Login Processing
        if(!empty($_POST['username']) && !empty($_POST['password']))
        {
             $password = md5($_POST['password']);
                 $checklogin = mysqli_query($con, "SELECT * FROM admin_users WHERE email = '".$email."' AND password = '".$password."'");
                  $row = mysqli_fetch_array($checklogin);
                if((mysqli_num_rows($checklogin) == 1) && ($row['superuser'] != 0) )
                    {
                       
                        $email = $row['email'];
                        $firstname = $row['first_name'];
                        $surname = $row['surname'];
                        $role = $row['role'];
                        session_start();

                        $_SESSION['email'] = $email;
                        $_SESSION['LoggedIn'] = 1;
                        $_SESSION['first_name'] = $firstname;
                        $_SESSION['surname'] = $surname;
                        $_SESSION['role'] = $role;
                        $_SESSION['superuser'] = $superuser;

                    echo "<h1>success</h1>";

                    header("Location: index.php"); /* Redirect browser */
                    exit();
                }
            else
                {
                     echo "<h1>Error</h1>";
                }
        }

        else if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['email']))
        {
             ?>
            <!-- This is the area where you put the content that you want a logged in user to be able to access -->
    
         <?php
            $query = mysqli_query($con, "SELECT * FROM admin_users WHERE email = '".$_SESSION['email']."' AND first_name = '".$_SESSION['first_name']."'");
            $row = mysqli_fetch_array($query); 
        ?>
        <?php include('nav_side.php');?>
        <!-- /. NAV SIDE  -->
        



        <div id="page-wrapper">
            <div id="page-inner">
                


                        <div class="row">

                          <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                     <?php  
                                         $the_id = $_GET['id'] ;
                                         $action_url = "edit_special_offer.php?id=".$the_id;
                                         $query = mysqli_query($con, "SELECT * FROM Special_Offers where offer_id = $the_id");
                                         if($special_offer = mysqli_fetch_array($query)) { 

                                                    ?>
                    
                                                        Edit <?php echo $special_offer['offer_title'];?> 
                                                    </div>        

                                                                <div class="panel-body"> 
                                                                    <p> Please only enter information for the fields you'd like to edit, empty fields will
                                                                    mean that the special_offers information will remain the same.
                                                                    </p>

                                                                    <div class="alert alert-success">
                                                                        <form action=<?php echo "'". $action_url."'";?>  method="POST" enctype="multipart/form-data">
                                                                            <strong>Title: </strong> <?php echo $special_offer['offer_title'];?> 
                                                                             <input class="form-control" placeholder="Special Offer title" name="title">
                                             
                                                                            <strong>Description:</strong>
                                                                                <br />
                                                                                <?php echo $special_offer['offer_description']; ?>
                                                                               <textarea class="form-control" 
                                                                               placeholder="Description of Special offer" name="description" rows="3"></textarea>

        

                                                                            <strong>Product: </strong> <?php echo get_product_name($special_offer['offer_product']);?> 
                                                                            <select id="name" name="product" class="form-control" >
                                                                                <?php 
                                                                                $query = mysqli_query($con, "SELECT * FROM Products");
                                                                                echo "<option value='0'>Select Product: </option>";
                                                                                while($products = mysqli_fetch_array($query))  {
                                                                                    echo "<option value='".$products['product_id']."'>".$products['product_name']."</option>";
                                                                                }
                                                                                ?>
                                                                            </select>

                                                                            <strong>Category: </strong> <?php echo get_category_name($special_offer['offer_category']);?> 
                                                                            <select id="name" name="category" class="form-control" >
                                                                                <?php 
                                                                                $query = mysqli_query($con, "SELECT * FROM Sub_Categories");
                                                                                echo "<option value='0'>Select Category: </option>";
                                                                                while($cats = mysqli_fetch_array($query))  {
                                                                                    echo "<option value='".$cats['sub_cat_id']."'>".$cats['sub_name']."</option>";
                                                                                }
                                                                                ?>
                                                                            </select>

                                                                                   
                                                                              <strong> Valid From: </strong> <?php echo $special_offer['valid_from'];?> 
                                                                             <input type="date" id="test3" class="form-control" name="valid_from">

                                                                              <strong> Valid To: </strong> <?php echo $special_offer['valid_to'];?> 
                                                                             <input type="date"  id="test4" class="form-control" name="valid_to">


                                    
                                                                            
                                                                            <input type="submit" value="Edit Special Offer" name="edit_special_offers">
                                                                        </form>
                        
                            
                                                                        <?php
                                                                            
                                                                    if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){

                                                                        $title = $special_offer['offer_title'];
                                                                        $description = $special_offer['offer_description'];
                                                                        $product = $special_offer['offer_product'];
                                                                        $category = $special_offer['offer_category'];
                                                                        $valid_from = $special_offer['valid_from'];
                                                                        $valid_to = $special_offer['valid_to'];
                                                                        
                                                                        
                                                                        if ($_POST['title'] != "") {
                                                                            $title = $_POST['title'];
                                                                        }
                                                                       
                                                                       $newdescription = mysql_real_escape_string($con, htmlspecialchars($_POST['description']));
                                                                        if ($_POST['description'] != "") {
                                                                            $description = $newdescription;
                                                                        }
                                                                        
                                                                        if ($_POST['product'] != "0") {
                                                                            $product = $_POST['product'];
                                                                         }
                                                                        if ($_POST['category'] != "0") {
                                                                            $category = $_POST['category'];
                                                                        }

                                                                        if ($_POST['valid_from'] != "") {
                                                                            $valid_from = $_POST['valid_from'];
                                                                        }

                                                                        if ($_POST['valid_to'] != "") {
                                                                            $valid_to = $_POST['valid_to'];
                                                                        }
                                                                        

                                                                        $FLAG = True;

                                                                        if(($product != "0") && ($category != "0")) $FLAG = False;

                                                                        if(($product == "0") && ($category == "0")) $FLAG = False;

                                                                        if($FLAG == True) {

                                                                             $sql =  "UPDATE Special_Offers SET offer_title = '$title',offer_description = '$description', offer_product = '$product', offer_category = '$category',valid_from= '$valid_from', valid_to= '$valid_to' WHERE offer_id= '$the_id' ";
                                                                            if (mysqli_query($con, $sql)) {
                                                                                    echo "Offer item edited";
                                                                             }       
                                                                    } else echo "Error with your products/categories.";

                                                                } ?>
                                                                   </div>
                                                        
                                                                </div>
                                                             </div>
                                                     </div>  

                              
                         
                                        </div>
        
            
        
    </div>

    <?php } } 
        else
        {  // if not attempt at logging in has been made show log in details
            ?>


             <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Login <small></small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="login.php" method="POST" >
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input name ="email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input name ="password" type="password" class="form-control">
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-default">Submit Button</button>
                                        <button type="reset"  class="btn btn-default">Reset Button</button>
                                    </form>


            <!-- /. PAGE INNER  -->
                                 </div>
        <!-- /. PAGE WRAPPER  -->
                            </div>
                </div>






        <?php
        } 
        ?>




    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>

     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>



</body>

</html>