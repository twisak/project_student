<?php

    $id = $_SESSION['username'];
    //echo $id;
$sql ="SELECT * FROM account_login WHERE username = '".$id."' ";
$query = mysqli_query($conn,$sql);
$result = mysqli_fetch_assoc($query);

    $person_id = $result['person_id'];
    $username = $result['username'];
    $password = $result['password'];
    $status = $result['status'];
?>
<header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-red">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header text-center">
                    <a class="navbar-brand" href="#">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            
                            <!-- Light Logo icon -->
                            <span class="hidden-md-down ">
                                <b>PST YRU</b>
                            </span>
                        </b>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                       <br>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/users/1.jpg" alt="user" class="" /> <span class="hidden-md-down">Mark Sanders &nbsp;</span> </a>
                        </li> -->
                        <li class="dropdown no-arrow">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="hidden-md-down">
                                <?php echo $username; ?>&nbsp;
                            </span>
                            <i class="fa fa-user-circle-o"></i>
                        </a>

                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?php echo ROOT_PROJECT;?>/administrator/login.php">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-900"></i>
                            ออกจากระบบ
                            </a>
                        </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="<?php echo ROOT_PROJECT_FRONTEND;?>/dashboard/index.php" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo ROOT_PROJECT_FRONTEND;?>/user/tb_user.php" aria-expanded="false"><i class="fa fa-address-card"></i><span class="hide-menu">ข้อมูลส่วนตัว</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo ROOT_PROJECT_FRONTEND;?>/project/tb_project.php" aria-expanded="false"><i class="fa fa-folder-open"></i><span class="hide-menu">จัดการข้อมูลโครงการ</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-dark collapsed" href="#" data-toggle="collapse" data-target="#collapseB" aria-expanded="false" aria-controls="collapseB">
                                <i class="fa fa-book"></i>
                                <span>ข้อมูลเอกสาร</span>
                            </a>
                            <div id="collapseB" class="collapse" aria-labelledby="headingB" data-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded col-lg-12">
                                    <a class="waves-effect waves-dark" href="<?php echo ROOT_PROJECT_FRONTEND;?>/input_doc/lend/index.php"><i class="fa fa-caret-right"></i> เอกสารสัญญาณยืม</a>
                                    <a class="waves-effect waves-dark" href="<?php echo ROOT_PROJECT_FRONTEND;?>/input_doc/salary/index.php"><i class="fa fa-caret-right"></i> เอกสารเงินเดือน</a>
                                    <a class="waves-effect waves-dark" href="<?php echo ROOT_PROJECT_FRONTEND;?>/input_doc/debt/index.php"><i class="fa fa-caret-right"></i> เอกสารล้างหนี้</a>
                                    <a class="waves-effect waves-dark" href="<?php echo ROOT_PROJECT_FRONTEND;?>/input_doc/contract/index.php"><i class="fa fa-caret-right"></i> เอกสารจ้างเหมาบริการ</a>
                                    <a class="waves-effect waves-dark" href="<?php echo ROOT_PROJECT_FRONTEND;?>/input_doc/note/command/index.php"><i class="fa fa-caret-right"></i> เอกสารบันทึกข้อความอื่นๆ</a>
                                </div>
                            </div>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo ROOT_PROJECT;?>/administrator/logout.php" aria-expanded="false"><i class="fa fa-power-off"></i><span class="hide-menu">Logout</span></a>
                        </li>
                        <!-- <li> <a class="waves-effect waves-dark" href="pages-blank.html" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu">Blank</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="pages-error-404.html" aria-expanded="false"><i class="fa fa-question-circle"></i><span class="hide-menu">404</span></a>
                        </li> -->
                    </ul>
                    <!-- <div class="text-center m-t-30">
                        <a href="https://wrappixel.com/templates/adminwrap/" class="btn waves-effect waves-light btn-info hidden-md-down"> Upgrade to Pro</a>
                    </div> -->
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
