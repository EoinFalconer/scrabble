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
                                         $action_url = "edit_project.php?id=".$the_id;
                                         $result = mysqli_query($con, "SELECT * FROM Projects where project_id = $the_id");
                                         while ($project = mysqli_fetch_array($result)) { 


                                                    ?>
                    
                                                        Edit <?php echo $project['project_client'];?> 
                                                    </div>        

                                                                <div class="panel-body"> 
                                                                    <p> Please only enter information for the fields you'd like to edit, empty fields will
                                                                    mean that the project information will remain the same.
                                                                    </p>

                                                                    <div class="alert alert-success">
                                                                        <form action=<?php echo "'". $action_url."'";?>  method="POST" enctype="multipart/form-data">
                                                                            <strong>Project Client:</strong> <?php echo $project['project_client']; ?>
                                                                             <input class="form-control" placeholder="Client Name" name="client">


                                                                            <strong>Project Brief Description:</strong>  <?php echo $project['project_description']; ?>
                                                                            <textarea class="form-control" placeholder="project Brief Description" name="brief_description"></textarea>

                                                                        
                                                                            <strong>Category</strong>  <?php echo $project['project_category']; ?>
                                                                            <select id="name" name="category" class="form-control" >
                                                                                <option value="na">Select Section: </option> 
                                                                                <option value="1">Primary</option> 
                                                                                <option value="4">Secondary</option> 
                                                                                <option value="5">Further Education</option> 
                                                                            </select>

                                                                            <strong>Sub Category</strong>  <?php echo $project['project_sub_category']; ?>
                                                                            <select id="name" name="subcategory" class="form-control" >
                                                                                <option value="na">Select Section: </option> 
                                                                                <option value="1">Chairs</option> 
                                                                                <option value="3">Postura</option> 
                                                                                <option value="4">Tables/Desking</option> 
                                                                                <option value="5">Staffroom</option> 
                                                                                <option value="6">Boards</option> 
                                                                                <option value="7">Gym Equipment</option> 
                                                                                <option value="8">Miscellaneous</option> 
                                                                                <option value="9">Staging</option>
                                                                                <option value="10">Office Solutions</option> 
                                                                                <option value="11">Benches</option>
                                                                                <option value="12">Storage</option> 
                                                                                <option value="13">Steel Storage</option> 
                                                                                <option value="14">Science Storage</option>
                                                                                <option value="15">Tired Seating</option> 
                                                                                <option value="16">Laptop/iPad Storage</option>  
                                                                            </select>

                                                                            <strong>Project End User:</strong> <?php echo $project['project_end_user']; ?>
                                                                             <input class="form-control" placeholder="E.g. Students or Staff" name="user">
                                                                                
                                                                            <strong>Project Location:</strong> <?php echo $project['project_location']; ?>
                                                                             <input class="form-control" placeholder="Dublin, Ireland" name="location">

                                                                             <strong>Project Date:</strong> <?php echo $project['project_date']; ?>
                                                                             <input class="form-control" placeholder="Dec 2014" name="date">

                                                                             <strong>Project Clients Website:</strong> <?php echo $project['project_client_website']; ?>
                                                                             <input class="form-control" placeholder="www.3bit.ie" name="website">

                                                                             <strong>Project Brief:</strong> <?php echo $project['project_brief']; ?>
                                                                             <textarea class="form-control" placeholder="Brief about what was needed in project." name="full_brief"></textarea>

                                                                             <strong>Project Solution:</strong><br /> <?php echo $project['project_solution']; ?><br />
                                                                             <textarea class="form-control" placeholder="Summary of solution to brief." name="solution"></textarea>

                                                                             <strong>Project Testimonial from client:</strong><br /> <?php echo $project['project_testimonial']; ?><br />
                                                                             <input class="form-control" placeholder="Summary of solution to brief." name="testimonial">

                                                                             <strong>Individual Project Page or Just list</strong> 
                                                                             <p>Choose to have a whole page dedicated to this project or just list the project.<br />
                                                                             For Projects that are only being listed Client name is the only information needed.</p>

                                                                            <select id="name" name="display" class="form-control" > 
                                                                                <option value="na">Select Option: </option> 
                                                                                <option value="1">List Project</option> 
                                                                                <option value="2">Full Page for Project</option> 
                                                                            </select>

                                                                              <div class="form-group">

                                                                                <strong>project Image:</strong> <br />
                                                                                <?php echo "<img src='" .$project['image_url'] . "'' style='width:150px; height:150px;' alt=''>";?> 
                                                                                <br />
                                                                                <input type="file" name="files[]" multiple="multiple" id="fileToUpload">
                                                                            </div>

                                                                            <input type="submit" value="Add Project" name="add_project">
                                                                        </form>
                        
                            
                                                                        <?php
                                                                            
                                                                    if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){

                                                                        $project_client = $project['project_client'];
                                                                        $project_description = $project['project_description'];
                                                                        $project_category = $project['project_category'];
                                                                        $project_sub_category = $project['project_sub_category'];
                                                                        $end_user = $project['project_end_user'];
                                                                        $location = $project['project_location'];
                                                                        $date = $project['project_date'];
                                                                        $client_website = $project['project_client_website'];
                                                                        $brief = $project['project_brief'];
                                                                        $solution = $project['project_solution'];
                                                                        $testimonial = $project['project_testimonial'];
                                                                        $display = $project['project_display'];
                                                                        $image_url = "";

                                                                        if ($_POST['client'] != "") {
                                                                            $project_client= $_POST['client'];
                                                                        }
                                                                        if ($_POST['brief_description'] != "") {
                                                                            $project_description= mysql_real_escape_string($con, htmlspecialchars($_POST['brief_description']);
                                                                        }
                                                                        if ($_POST['category'] != "na") {
                                                                            $project_category = $_POST['category'];
                                                                        }
                                                                        if ($_POST['subcategory'] != "na") {
                                                                            $project_sub_category= $_POST['subcategory'];
                                                                        }

                                                                        if ($_POST['user'] != "") {
                                                                            $end_user= $_POST['user'];
                                                                        }
                                                                        if ($_POST['location'] != "") {
                                                                            $location = $_POST['location'];
                                                                        }
                                                                        if ($_POST['date'] != "") {
                                                                            $date = $_POST['date'];
                                                                        }
                                                                        if ($_POST['website'] != "") {
                                                                            $client_website= $_POST['website'];
                                                                        }

                                                                         if ($_POST['full_brief'] != "") {
                                                                            $brief= mysql_real_escape_string($con, htmlspecialchars($_POST['full_brief']));
                                                                        }
                                                                        if ($_POST['solution'] != "") {
                                                                            $solution = mysql_real_escape_string($con, htmlspecialchars($_POST['solution']));
                                                                        }
                                                                        if ($_POST['testimonial'] != "") {
                                                                            $testimonial = $_POST['testimonial'];
                                                                        }
                                                                        if ($_POST['display'] != "na") {
                                                                            $display= $_POST['display'];
                                                                        }
                                                                
                                                                        $valid_formats = array("jpg", "png", "gif", "zip", "bmp", "JPG", "PNG", "GIF");
                                                                        $max_file_size = 1024*10000; //100 kb
                                                                        $path = "project_images/"; // Upload directory
                                                                        $count = 0;
                                                                        
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
                                                                                            if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$name))
                                                                                            $count++;

                                                                                            $image_url =  $path.$name;
                                                                                           
                                                                                            $sql =  "UPDATE Projects SET project_client = '$project_client', image_url = '$image_url', project_category = '$project_category', project_sub_category = '$project_sub_category',
                                                                                             project_description = '$project_description', project_end_user = '$end_user', project_location = '$location', project_date = '$date', project_client_website = '$client_website',
                                                                                             project_brief = '$brief', project_solution = '$solution', project_testimonial = '$testimonial', project_display = '$display'  WHERE project_id= '$the_id' ";
                                                                                            if (mysqli_query($con, $sql)) {
                                                                                                    echo "projects item edited";
                                                                                             } 
                                                                                             else {
                                                                                                echo "problem";
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                                else {
                                                                              
                                                                                        $image_url = "";
                                                                                            $sql =  "UPDATE Projects SET project_client = '$project_client',  project_category = '$project_category', project_sub_category = '$project_sub_category',
                                                                                             project_description = '$project_description', project_end_user = '$end_user', project_location = '$location', project_date = '$date', project_client_website = '$client_website',
                                                                                             project_brief = '$brief', project_solution = '$solution', project_testimonial = '$testimonial', project_display = '$display'  WHERE project_id= '$the_id' ";                                                                                
                                                                                                if (mysqli_query($con, $sql)) {
                                                                                                        echo "projects item edited";
                                                                                                } else {
                                                                                                    echo "problem";
                                                                                                }
                                                                                     }
                                                                            }       
                                                                        } ?>
                                                                   </div>
                                                        
                                                                </div>
                                                             </div>
                                                     </div>  

                              
                         
                                        </div>
        
            
        <?php   }     ?>
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