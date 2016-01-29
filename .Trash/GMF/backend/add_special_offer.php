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
    <script src="jquery-1.11.3.min.js"></script>
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

                    header("Location: add_admin.php"); /* Redirect browser */
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
                                        Add Special Offer:
                                    </div>      

                                                  
                                                <div class="panel-body"> 
                                                    <div class="alert alert-success">

                                                        <p><b>You can either special offer a <u>particular product or particular sub category</u>. 
                                                            If you are offering a product please leave the category section blank and vice versa.</b></p>
                                                       <form action="add_special_offer.php" method="post" enctype="multipart/form-data">


                                                            <strong>Offer Title:</stronge> 
                                                                <input class="form-control" placeholder="Offer Title" name="title">

                                                            <strong>Offer Description:</stronge> 
                                                                <textarea class="form-control" placeholder="Offer Description" name="description"></textarea>

                                                             <strong>Product:</strong> 
                                                                <select id="name" name="product" class="form-control" >
                                                                    <?php 
                                                                    $query = mysqli_query($con, "SELECT * FROM Products");
                                                                    echo "<option value='na'>Select Product: </option>";
                                                                    while($products = mysqli_fetch_array($query))  {
                                                                        echo "<option value='".$products['product_id']."'>".$products['product_name']."</option>";
                                                                    }
                                                                    ?>
                                                                </select>

                                                            <strong>Category:</strong> 
                                                                <select id="name" name="category" class="form-control" >
                                                                    <?php 
                                                                    $query2 = mysqli_query($con, "SELECT * FROM Sub_Categories");
                                                                    echo "<option value='na'>Select Categories: </option>";
                                                                    while($category = mysqli_fetch_array($query2))  {
                                                                        echo "<option value='".$category['sub_cat_id']."'>".$category['sub_name']."</option>";
                                                                    }
                                                                    ?>
                                                                </select>

                                                               

                                                            <strong> Valid From: </strong>
                                                                <input type="date" id="test" class="form-control" name="valid_from" />


                                                            <strong> Valid To: </strong>
                                                                <input type="date" id="test2" class="form-control" name="valid_to" />
                                                            
                                                            <input type="submit"  value="Add Category" name="add_category">
                                                        </form>
            
                                                        <?php
                                                            
                                                        if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
                                                                
                                                            $title = $_POST['title'];
                                                            $description = mysql_real_escape_string($con, htmlspecialchars($_POST['description']));
                                                            $product = $_POST['product'];
                                                            $category = $_POST['category'];
                                                            $valid_from = $_POST['valid_from'];
                                                            $valid_to = $_POST['valid_to'];
                                                            $FLAG = True;

                                                            echo $product . $category;

                                                            if(($product != "na") && ($category != "na") ) $FLAG = False;

                                                            if($FLAG == True) {

                                                                $sql = "INSERT INTO Special_Offers(offer_title, offer_description, offer_product, offer_category, valid_from, valid_to) 
                                                                        VALUES ('$title', '$description', '$product', '$category', '$valid_from', '$valid_to' )";
                                                                        
                                                                if (mysqli_query($con, $sql)) {
                                                                        echo "Special Offer added";
                                                                } else {
                                                                    echo "Problem adding Special Offer";
                                                                }

                                                            } else echo "Please only pick a product or a catgeory not both.";

                                                        } ?>
                                                   </div>
                                        
                                                </div>
                                             </div>
                                     </div>  

              
         
                        </div>
            
    </div>

    <?php }   
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


</body>

</html>