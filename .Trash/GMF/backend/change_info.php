<?php
    session_start();
    include("connection.php");
?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

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
                
                if(mysqli_num_rows($checklogin) == 1)
                    {
                        $row = mysqli_fetch_array($checklogin);
                        $email = $row['email'];
                        $firstname = $row['first_name'];
                        $surname = $row['surname'];
                        $role = $row['role'];
                        session_start();

                        if($row['superuser'] = 0) {
                            $superuser = FALSE;
                        }
                        else {
                             $superuser = TRUE;
                        }

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
        <?php 
             $the_id = $_GET['id'] ;
             $action_url = "change_info.php?id=".$the_id;
             $result = mysqli_query($con, "SELECT * FROM admin_users where id = $the_id");
             while ($admin_user = mysqli_fetch_array($result)) { 

        ?>



        <div id="page-wrapper">
            <div id="page-inner">

                        <div class="row">

                          <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Change Password:
                                    </div>        
                                                  
                                                <div class="panel-body"> 

                                                    <p> Please only enter information for the fields you'd like to edit, empty fields will
                                                        mean that the administrators information will remain the same.
                                                    </p>

                                                    <p>
                                                        Please note you'll be required to log back in after changing your information. 
                                                    </p>



                                                     <form action=<?php echo "'". $action_url."'";?>  method="POST">
                                                            <strong>First Name: </strong> <?php echo $admin_user['first_name'];?> 
                                                             <input class="form-control" placeholder="Joe" name="first_name">
                                                             
                                                             <strong>Surname: </strong> <?php echo $admin_user['surname'];?> 
                                                             <input class="form-control" placeholder="Blogs" name="surname">
                                                             
                                                             <strong>Email: </strong>  <?php echo $admin_user['email'];?>
                                                             <input class="form-control" placeholder="Joe@Blogs.ie" name="email">
                                                             
                                                            <button type="submit" value="change_info" name="change_info" class="btn btn-default">Edit Admin</button>
                                                        </form>
                                                </div>
                               </div>
                         </div>  

                         <?php

                            if(isset($_POST['change_info'])) {
        
                                                                               
                                            $first_name = $admin_user['first_name'];
                                            if ($_POST['first_name'] != "") {
                                                $first_name = $_POST['first_name'];
                                                
                                            }

                                            $surname = $admin_user['surname'];
                                            if ($_POST['surname'] != "") {
                                                $surname = $_POST['surname'];
                                            
                                            }

                                            $email = $admin_user['email'];
                                            if ($_POST['email'] != "") {
                                                $email = $_POST['email'];
                                            }

                                            $role = $admin_user['role'];
                                            $superuser = $admin_user['superuser'];

                                
                                             
                                            echo $email . " " . $role . " " . $surname . " " . $first_name . " " . $superuser;

                                            $sql = "UPDATE admin_users SET first_name = '$first_name', surname = '$surname', email= '$email', role = '$role', superuser = '$superuser' WHERE id= '$the_id' ";

                                            if(mysqli_query($con, $sql)) {
                                                echo "Admin successfully Edited";
                                                $_SESSION =  session_destroy(); 
                                                echo "<meta http-equiv='refresh' content='0;index.php'>";
                                                
                                            } else {
                                                echo "Error Please Contact ben.reynolds@ucdconnect.ie";
                                            }    
                                    }

                                }
                               

                         ?>

              
         
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
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