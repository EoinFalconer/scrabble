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
                                        Add Category:
                                    </div>        
                                                  
                                                <div class="panel-body"> 
                                                    <div class="alert alert-success">
                                                       <form action="add_category.php" method="post" enctype="multipart/form-data">

                                                         <strong>Category Name:</stronge> 
                                                         <input class="form-control" placeholder="Primary" name="name">


                                                         <div class="form-group">
                                                            <strong>Category Image:</stronge> 
                                                            <br />
                                                            <input type="file" name="files[]" multiple="multiple" id="fileToUpload">
                                                        </div>
                                                    
                                                            
                                                            <input type="submit" value="Add Category" name="add_category">
                                                        </form>
            
                                                        <?php
                                                            
                                                        if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
                                                                

                                                                
                                                                $cat_name = $_POST['name'];
                                                                $admin_user = $_SESSION['first_name'] . " " . $_SESSION['surname'];
                                                                $image_url = "";

                                                                $valid_formats = array("jpg", "png", "gif", "zip", "bmp", "JPG", "PNG", "GIF");
                                                                $max_file_size = 1024*10000; //100 kb
                                                                $path = "category_images/" ; // Upload directory
                                                                $count = 0;
                                                            
                                                                
                                                                    // Loop $_FILES to exeicute all files
                                                                    foreach ($_FILES['files']['name'] as $f => $name) {     
                                                                            if($name != "") {

                                                                                if ($_FILES['files']['error'][$f] == 4) {
                                                                                    continue; // Skip file if any error found
                                                                                }          
                                                                                if ($_FILES['files']['error'][$f] == 0) {              
                                                                                    if ($_FILES['files']['size'][$f] > $max_file_size) {
                                                                                        echo "$name is too large!.";
                                                                                        continue; // Skip large files
                                                                                    }
                                                                                    elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
                                                                                        echo "$name is not a valid format";

                                                                                        continue; // Skip invalid file formats
                                                                                    }
                                                                                    else{ // No error found! Move uploaded files 
                                                                                        if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$name)) {
                                                                                        echo "added";
                                                                                        }

                                                                                        $image_url =  $path.$name;
                                                                                       
                                                                                        $sql =  "INSERT INTO Categories(category_name, category_image, admin_user) 
                                                                                        VALUES ('$cat_name', '$image_url','$admin_user')";
                                                                        
                                                                                            if (mysqli_query($con, $sql)) {
                                                                                                    echo "Category added";
                                                                                            } else {
                                                                                                echo "problem adding category";
                                                                                            }
                                                                                    }
                                                                               
                                                                                }
                                                                            }
                                                                            else {
                                                                                $image_url = "";
                                                                                $sql =  "INSERT INTO Categories(category_name, category_image, admin_user) 
                                                                                        VALUES ('$cat_name', '$image_url','$admin_user')";
                                                                        
                                                                                        if (mysqli_query($con, $sql)) {
                                                                                                echo "Category added";
                                                                                        } else {
                                                                                            echo "problem adding category";
                                                                                        }

                                                                            }  
                                                                }
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