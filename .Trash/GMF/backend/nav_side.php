<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu" href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>

                     <li>
                        <a href="#"><i class="fa fa-sitemap"></i>Categories<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="all_categories.php">View Categories</a>
                            </li>
                            <li>
                                <a href="add_category.php">Add Category</a>
                            </li>
                            <li>
                                <a href="add_sub_cat.php">Add Sub-Category</a>
                            </li>
                            <li>
                                <a href="all_sub_cats.php">All Sub-Categories</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i>Products<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="all_products.php">View Products</a>
                            </li>
                            <li>
                                <a href="add_product.php">Add Product</a>
                            </li>
                        </ul>
                    </li>

                     <li>
                        <a href="#"><i class="fa fa-sitemap"></i>Projects<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                          
                            <li>
                                <a href="add_project.php">Add Project</a>
                            </li>
                            <li>
                                <a href="all_projects.php">All Projects</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i>Tags<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="add_tag.php">Add Tag</a>
                            </li>
                            <li>
                                <a href="add_product_to_tag.php">Add Product to Tag</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i>Newsletter<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="add_customer.php">Add Customer</a>
                            </li>
                            <li>
                                <a href="all_customers.php">All Customers</a>
                            </li>
                            <li>
                                <a href="send_email.php">Send Email</a>
                            </li>
                        </ul>
                    </li>


                     <li>
                        <a href="#"><i class="fa fa-sitemap"></i>Special Offers<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="all_special_offers.php">View Special Offers</a>
                            </li>
                            <li>
                                <a href="add_special_offer.php">Add Special Offers</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i>Tests<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="test_related.php">Related Products Tests</a>
                            </li>
                        </ul>
                    </li>
                
                
                    <?php 

                    if($row['superuser'] != 0) {

                    ?>
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Admin Users<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="all_admin.php">View Admin Users</a>
                            </li>
                            <li>
                                <a href="add_admin.php">Add Admin Users</a>
                            </li>
                            <li>
                                <a href="remove_admin.php">Remove Admin Users</span></a>
                            </li>
                        </ul>
                    </li>
                    <?php }  ?>
                </ul>

            </div>

        </nav>

<?php include('function.php'); ?>