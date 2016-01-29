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
                <?php 
            
                    if ($row['superuser'] != 0) {
                 
                ?>
                        <div class="row">

                          <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Add User:
                                    </div>        
                                                  
                                                <div class="panel-body"> 
                                                    <div class="alert alert-success">
                                                        <form action="add_admin.php" method="POST">
                                                            <strong>First Name:</stronge> 
                                                             <input class="form-control" placeholder="Joe" name="first_name">
                                                             <strong>Surname:</stronge> 
                                                             <input class="form-control" placeholder="Blogs" name="surname">
                                                             <strong>Email:</stronge> 
                                                             <input class="form-control" placeholder="Joe@Blogs.ie" name="email">
                                                             <strong>Password:</stronge> 
                                                             <input class="form-control" type="password" placeholder="can be changed later" name="password">
                                                            <strong>Select Role:</strong> 
                                                            <select id="name" name="role" class="form-control" >
                                                                <option value="na">Select Role: </option> 
                                                                <option value="Manager">Manager</option> 
                                                                <option value="Committee Member">Commitee Member </option> 
                                                                <option value="Board Member">Board Member</option> 
                                                            </select>
                                                            <p style="color:black; font-size:11px;">Being a superuser allows admin members to do special functions such as <u>add</u> or <u>remove</u> other admin members.</p>
                                                             <strong>Superuser:</strong>
                                                            <select id="name" name="superuser" class="form-control" >
                                                                <option value="na">Superuser:</option> 
                                                                <option value="1">Yes</option> 
                                                                <option value="0">No</option>
                                                            </select>
                                                                   
                                                                </div>
                                                            <button type="submit" value="add_admin" name="add_admin" class="btn btn-default">Add Admin</button>
                                                        </form>
        
            
                                                        <?php
                                                            
                                                        if(isset($_POST['add_admin'])) {
                                                                
                                                                $role = $_POST['role'];
                                                                $superuser = $_POST['superuser'];
                                                                $first_name = $_POST['first_name'];
                                                                $surname = $_POST['surname'];
                                                                $email = $_POST['email'];
                                                                $validation = filter_var($email, FILTER_VALIDATE_EMAIL);
                                                                if ( $validation )$RIGHT_EMAIL = True;
                                                                else $RIGHT_EMAIL = False;
                                                                $password = md5($_POST['password']);

                                                            $flag = TRUE;
                                                            $query = mysqli_query($con, "SELECT * FROM admin_users");
                                                            while ($row = mysqli_fetch_array($query)) {
                                                                if( ($row['email'] == $email)) {
                                                                    $flag = FALSE;
                                                                }
                                                            } 



                                                        if ($flag == TRUE) {
                                                            if($RIGHT_EMAIL) {
                                                                  $sql =  "INSERT INTO admin_users(first_name, surname, email, role, password, superuser) VALUES ('$first_name', '$surname', '$email', '$role', '$password', '$superuser')";
                                                                    
                                                                 if (mysqli_query($con, $sql)) {
                                                                    echo "Admin successfully Added";         
                                                                    // the message
                                                                    $msg = "Hi, ". $first_name . ",
                                                                            \n\nYou've just been added as an administrator to the GMF website.\n
                                                                            Log in using your email:". $email . ", Your password is: " . $_POST['password']. ".\n
                                                                            We recommend you change your password the first time you login.\n
                                                                            Regards,\n
                                                                            Site Administrator." ;

                                                                    // use wordwrap() if lines are longer than 70 characters
                                                                    $msg = wordwrap($msg,70);

                                                                    // send email
                                                                    if(mail($email,"GMF Admin",$msg))  {
                                                                        echo "mail sent";
                                                                    }
                                                                    else {
                                                                        echo "error sending email to the new administrator";
                                                                    }

                                                                    } else {
                                                                        echo "Error Please Contact ben.reynolds@ucdconnect.ie";
                                                                    }    
                                                            } else echo "The email you entered isn't valid.";
                                                        } 
                                                        else {
                                                            echo "User with email: ". $email . " already an administrator";
                                                        }
                                                              


                                                        } ?>
                                                   </div>
                                        
                                                </div>
                                             </div>
                                     </div>  

              
         
                        </div>
            
        <?php       }    else { ?>
                             <div class="row">
                                 <div class="col-md-12">
                                     <h1> You do not have sufficint priveleges to use this page"</h1>
                                </div>
                            </div>
                        <?php } ?>
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