<?php include('../../config/connect.php');
        include('../../config/constant.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo ROOT_PROJECT_BACKEND;?>/assets/images/favicon.png">
<?php include '../include_title.php'; ?>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo ROOT_PROJECT_BACKEND;?>/assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo ROOT_PROJECT_BACKEND;?>/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo ROOT_PROJECT_BACKEND;?>/css/colors/default.css" id="theme" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    <link href="<?php echo ROOT_PROJECT_BACKEND;?>/css/google_fonts/fonts_prompt.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header card-no-border fix-sidebar">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Admin Wrap</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <?php include '../mamu/manu_admin.php'; ?>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">แกไข้ยุทธศาสตร์</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">แกไข้ยุทธศาสตร์</li>
                        </ol>
                    </div>
                </div>

                <script src="http://code.jquery.com/jquery-latest.js"></script>


                <div class="row">

                    <div class="col-lg-12 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-body">
                                <form class="form-horizontal form-material" action="edit_strategic.php" name="form_user" method="post">
                                <?php
                                        include '../../administrator/connect.php';
                                        $strategic_id = $_GET['strategic_id'];
                                        $sql_strategic ="SELECT * FROM tb_strategic WHERE strategic_id = '".$strategic_id."'";
                                        $query_strategic = mysqli_query($conn,$sql_strategic);
                                        while($row_strategic = mysqli_fetch_array($query_strategic,MYSQLI_ASSOC))
                                        {

                                            $strategic = $row_strategic['strategic'];
                                            $mission_id = $row_strategic['mission_id'];
                                            $project_id = $row_strategic['project_id'];
                                        }
                                       $sql_mission = "SELECT * FROM tb_mission WHERE mission_id = '".$mission_id."' ";
                                       $query_mission = mysqli_query($conn,$sql_mission);
                                       $row_mission =mysqli_fetch_assoc($query_mission);
                                       $mission = $row_mission['mission'];

                                       $sql = "SELECT * FROM tb_project WHERE project_id = '".$project_id."' ";
                                        $query = mysqli_query($conn,$sql);
                                        $result = mysqli_fetch_array($query);

                                        $project_name = $result['project_name'];
                                        $project_id = $result['project_id'];


                                ?>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <div class="form-group">
                                                    <label>
                                                        <h4><b><u>แก้ไขยุทธศาสตร์</u></b></h4>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <input type="hidden" name="strategic_id" value="<?php echo $strategic_id; ?>">
                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label><b>ชื่อกิจกรรมโครงการ</b></label><br>
                                                <select class="form-control" required name="project_id">
                                                    <option value="<?php echo $project_id; ?>" ><?php echo $project_name; ?></option>
                                                    <?php
                                                        $sql ="SELECT * FROM tb_project ";
                                                        $query = mysqli_query($conn,$sql);
                                                        while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
                                                        {
                                                            $project_id = $row['project_id'];
                                                            $project_name = $row['project_name'];

                                                    ?>
                                                    <option value="<?php echo $project_id;?>"><?php echo $project_name;?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>

                                      <?php
                                          $sql_mission = "SELECT * FROM tb_mission";
                                          $query_mission = mysqli_query($conn,$sql_mission);
                                      ?>

                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label><b>พันธกิจ</b></label>
                                              <select class="form-control" name="mission_id">
                                                  <option value="<?php echo $mission_id;?>"><?php echo $mission;?></option>
                                                  <?php
                                                      while($result_mission=mysqli_fetch_array($query_mission))
                                                      {
                                                      ?>
                                                  <option value='<?php echo $result_mission['mission_id'];?>'><?php echo $result_mission['mission'];?></option>
                                                  <?php
                                                      }
                                                      ?>
                                              </select>
                                          </div>
                                      </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><b>ยุทธศาสตร์</b></label>
                                                <input type="text" name="strategic" value="<?php echo $strategic;?>" class="form-control form-control-line">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block">บันทึก</button>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-danger btn-block" onClick="JavaScript:history.back();">ยกเลิก</button>
                                            </div>
                                        </div>

                                    </div>

                            </div>
                        </div>
                        <!-- Column -->
                    </div>
                </div>
                <footer class="footer">
                    © 2018 Adminwrap by wrappixel.com
                </footer>
            </div>
        </div>
        <script src="<?php echo ROOT_PROJECT_BACKEND;?>/assets/node_modules/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo ROOT_PROJECT_BACKEND;?>/assets/node_modules/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo ROOT_PROJECT_BACKEND;?>/assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo ROOT_PROJECT_BACKEND;?>/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo ROOT_PROJECT_BACKEND;?>/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo ROOT_PROJECT_BACKEND;?>/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo ROOT_PROJECT_BACKEND;?>/js/custom.min.js"></script>
    <script src="<?php echo ROOT_PROJECT_BACKEND;?>/js/script.js"></script>

</body>

</html>
