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

                    header("Location: view_albums.php"); /* Redirect browser */
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
        <?php include('nav_side.php'); }?>
        <!-- /. NAV SIDE  -->
        



        <div id="page-wrapper">
            <div id="page-inner">
                <?php 
            
                    if ($row['superuser'] != 0) {
                 
                ?>
                        <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             View All Special Offers
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Item</th>
                                            <th>Valid to</th>
                                            <th>Valid From</th>
                                            <th>Show All</th>
                                            <th>Delete</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                     <tbody>


                                       <!--  echo  "<td>". $news['body']. "</td>";
                                                 echo  "<td>". "<img src='" .$news['image_url'] . "'' style='width:150px; height:150px;' alt=''></td>";
                                                echo  "<td class='center'>". $news['date']. "</td>";
                                                 echo  "<td class='center'>". $news['creation_date']. "</td>";
                                                echo  "<td class='center'>". $news['admin_user']. "</td>"; -->
 

                                        <?php
                                           $special_offers = mysqli_query($con, "SELECT * FROM Special_Offers ORDER BY valid_to asc");
                                           while ($special_offer = mysqli_fetch_array($special_offers)) { 
                                               
                                                if($special_offer['offer_product'] != "na"){
                                                    $item = get_product_name($special_offer['offer_product']);
                                                }else $item = get_category_name($special_offer['offer_category']);
                                                echo "<tr class='odd gradeX'>";
                                                echo  "<td>". $special_offer['offer_title']. "</td>";
                                                echo  "<td>". $special_offer['offer_description']. "</td>";
                                                echo  "<td>". $item. "</td>";
                                                echo  "<td>". $special_offer['valid_to']. "</td>";
                                                echo  "<td>". $special_offer['valid_from']. "</td>";
                                                echo  "<td><a href='view_special_offers_id.php?id=" . $special_offer['offer_id']. "' class='btn btn-info'>View All Item</a></td>";
                                                echo  
                                                "<td>
        
                                                    <form action='all_special_offers.php' method='post'>
                                                        <button name='remove_special_offer' class='btn btn-danger' value='" .$special_offer['offer_id'] . "'>Delete</button>
                                                    </form>
                                                </td>";
                                                echo  
                                                "<td>
                                                    <a href='edit_special_offer.php?id=" . $special_offer['offer_id']. "' class='btn btn-info'>Edit</a>
                                                </td>";
                                                echo  "</tr>";

                                                if ($row['superuser'] != 0) {
                                                    if(isset($_POST['remove_special_offer'])) {
                                                        if (mysqli_query($con, "DELETE FROM Special_Offers WHERE offer_id= '".$_POST['remove_special_offer']."'")) {
                                                                echo "special offer successfully deleted";
                                                                echo "<meta http-equiv='refresh' content='0'>";
                                                         } else {
                                                            echo "Error deleting record: " . $con->error;
                                                        }    
                                                    }
                                                }
                                                else {
                                                    echo "You have insufficint permissions to delete a special offer";
                                                }
                                            }


                                        ?>
                                    
                                    </tbody>
                                </table>
                            </div>
                                        
                        </div>
                    </div>
                    <!--End Advanced Tables -->
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