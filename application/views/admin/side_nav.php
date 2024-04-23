<body id="page-top">
<!-- https://fontawesome.com/v4/icons/ -->
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sideNav_menu" style="background-color:#224abe;">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" 
            href="<?= base_url('dashboard'); ?>">
                <div class="sidebar-brand-icon rotate-n-1">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                    <!-- <i class="far fa-paper-plane"></i> -->                    
                </div>
                <div class="sidebar-brand-text mx-3">FifthObject</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('dashboard'); ?>" >
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            
            <!-- Nav Item - categories -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('add-categories'); ?>">
                    <i class="fa fa-sitemap"></i>
                    <span>Add Custom Category</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('add-color'); ?>">
                    <i class="fa fa-paint-brush"></i>
                    <span>Add Custom Color</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('add-size'); ?>">
                    <i class="fa fa-tasks"></i>
                    <span>Add Custom Size</span>
                </a>
            </li>

            <!-- Nav Item - categories -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="<//?= base_url('add-products'); ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Add Products</span>
                </a>
            </li> -->

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa fa-newspaper"></i>
                    <span>Product Setup</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Product:</h6>
                        <a class="collapse-item" href="<?= base_url('add-products'); ?>">Add Products</a>
                        <a class="collapse-item" href="<?= base_url('product-list'); ?>">Product List</a>
                        <!-- <a class="collapse-item" href="<//?= base_url('add-variation'); ?>">Add Variation</a> -->
                        <!-- <a class="collapse-item" href="">Product Stocks</a> -->
                    </div>
                </div>
            </li>


            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Banner</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="</?php echo base_url('banner'); ?>">Add Banner</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li> -->
            
              <!-- Nav Item - Utilities Collapse Menu -->
              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities1"
                    aria-expanded="true" aria-controls="collapseUtilities1">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Inventory Setup</span>
                </a>
                <div id="collapseUtilities1" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Product:</h6>
                        <a class="collapse-item" href="<?= base_url('show-main-product'); ?>">Edit Main Product</a>
                        <a class="collapse-item" href="<?= base_url('show-stocks'); ?>">Edit Product Variant</a>
                        <!-- <a class="collapse-item" href="<//?= base_url('add-variation'); ?>">Add Variation</a> -->
                        <!-- <a class="collapse-item" href="">Product Stocks</a> -->
                    </div>
                </div>
            </li>            
            <!-- Shipping -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('show-shipping'); ?>">
                <i class="fas fa-regular fa-truck"></i>
                    <span>Order Shipping</span>
                </a>
            </li>
            <!-- Order Cancel -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('show-cancellation'); ?>">
                <i class="fa fa-times"></i>
                    <span>Order Cancelled</span>
                </a>
            </li>
            <!-- Order Cancel -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('show-shipping'); ?>">
                <i class="fa fa-retweet"></i>
                    <span>Order Return/Refund</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li> -->

            <!-- Divider
            <hr class="sidebar-divider">

            <!-- Heading 
            <div class="sidebar-heading">
                Addons
            </div>

            
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts 
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>
            -->
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

             
            <!-- Sidebar Message -->
        

        </ul>
        <!-- End of Sidebar -->
    </div>