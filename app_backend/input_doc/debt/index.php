<?php
    include('../../../config/connect.php');
    include('../../../config/constant.php');
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
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo ROOT_PROJECT_FRONTEND; ?>/assets/images/favicon.png">
<?php include '../../include_title.php'; ?>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo ROOT_PROJECT_FRONTEND; ?>/assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo ROOT_PROJECT_FRONTEND; ?>/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo ROOT_PROJECT_FRONTEND; ?>/css/colors/default.css" id="theme" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    <link href="<?php echo ROOT_PROJECT_FRONTEND; ?>/css/google_fonts/fonts_prompt.css" rel="stylesheet" />
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
        <?php include '../../mamu/manu_admin.php'; ?>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">ตารางเอกสารล้างหนี้</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">ตารางเอกสารล้างหนี้</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <!-- column -->
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">ตารางเอกสารล้างหนี้</h4>
                                <div class="form-group">
                                    <div class="row col-md-12">
                                        <div class="col-md-6">
                                            <?php
                                                $strKeyword = null;
                                                if(isset($_POST["txtKeyword"])){
                                                    $strKeyword = $_POST["txtKeyword"];
                                                }
                                                if(isset($_GET["txtKeyword"])){
                                                    $strKeyword = $_GET["txtKeyword"];
                                                }
                                            ?>
                                            <form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-6 col-8">
                                                            <input class="form-control" type="text" placeholder="Search..." value="<?php echo $strKeyword;?>" name="txtKeyword" id="txtKeyword">
                                                        </div>
                                                        <button type="submit" class="btn btn-info" name="btnsearch">ค้นหา</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-2 text-right">

                                        </div>
                                        <div class="col-md-4 text-right">
                                            <div class="text-right">
                                                <a href="../debt/add.php"><button type="button" class="btn btn-primary">กรอกเอกสารเพิ่ม</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="table-responsive">
                                    <table class="table text-center table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center"><b>#</b></th>
                                                <th class="text-center"><b>รหัสเอกสาร</b></th>
                                                <th class="text-center"><b>ชื่อ-สกุล</b></th>
                                                <th class="text-center"><b>โครงการ</b></th>
                                                <th class="text-center"><b>รายละเอียดเอกสาร</b></th>
                                                <th class="text-center"><b>ลบ</b></th>
                                            </tr>
                                        </thead>
                                        <?php
                                            // $username= $_SESSION['username'];
                                            // $sql ="SELECT * FROM account_login WHERE username = '".$username."' ";
                                            // $query = mysqli_query($conn,$sql);
                                            // while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
                                            // {
                                            //     $person_id = $row['person_id'];
                                            // }
                                            $i=1;
                                            $i<="";

                                            $sql ="SELECT * FROM tb_debt";


                                            // $sql ="SELECT * FROM tb_debt GROUP BY doc_id";
                                            $query = mysqli_query($conn,$sql);
                                            while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
                                            {
                                            //     $id = $row['id'];
                                                 $doc_id = $row['doc_id'];
                                            //     $project_id = $row['project_id'];
                                            //     $person_id = $row['person_id'];
                                            //
                                            // //echo $project_id;
                                            // //echo $person_id;
                                            //
                                            // $sql1 ="SELECT * FROM tb_project WHERE project_id = '".$project_id."' ";
                                            // $query1 = mysqli_query($conn,$sql1);
                                            // while($row1 = mysqli_fetch_array($query1,MYSQLI_ASSOC))
                                            // {
                                            //     $project_name = $row1['project_name'];
                                            // }
                                            $sql ="SELECT * FROM tb_lend WHERE project LIKE '%".$strKeyword."%'";
                                            $query = mysqli_query($conn,$sql);
                                            while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
                                            {
                                                $project = $row['project'];
                                                $person_id = $row['person_id'];
                                           
                                            $sql2 ="SELECT * FROM tb_person WHERE person_id = '".$person_id."' ";
                                            $query2 = mysqli_query($conn,$sql2);
                                            while($row2 = mysqli_fetch_array($query2,MYSQLI_ASSOC))
                                            {
                                                $prefix = $row2['prefix'];
                                                $firtname = $row2['firtname'];
                                                $lastname = $row2['lastname'];
                                                //$prefix = $row2['prefix'];
                                            }
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row['doc_id'];?></td>
                                                <td><?php echo $prefix;?><?php echo $firtname;?> <?php echo $lastname;?></td>
                                                <td><?php echo $project;?></td>
                                                <td>
                                                    <a href="../debt/show.php?doc_id=<?php echo $doc_id;?>"><button type="button" class="btn btn-info">รายละเอียด</button></a>
                                                </td>
                                                <td><a href="JavaScript:if(confirm('ยืนยันการลบ ?') == true){window.location='../debt/delete.php?doc_id=<?php echo $doc_id;?>';}" class="btn btn-danger">ลบ</a></td>
                                            </tr>
                                            <?php
                                            $i++;
                                            }}
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                © 2018 Adminwrap by wrappixel.com
            </footer>
        </div>
    </div>
    <script src="<?php echo ROOT_PROJECT_FRONTEND; ?>/assets/node_modules/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo ROOT_PROJECT_FRONTEND; ?>/assets/node_modules/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo ROOT_PROJECT_FRONTEND; ?>/assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo ROOT_PROJECT_FRONTEND; ?>/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo ROOT_PROJECT_FRONTEND; ?>/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo ROOT_PROJECT_FRONTEND; ?>/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo ROOT_PROJECT_FRONTEND; ?>/js/custom.min.js"></script>
    <script src="<?php echo ROOT_PROJECT_FRONTEND; ?>/js/script.js"></script>
    <!-- jQuery peity -->
    <script src="../assets/node_modules/peity/jquery.peity.min.js"></script>
    <script src="../assets/node_modules/peity/jquery.peity.init.js"></script>
</body>

</html>
