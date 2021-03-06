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
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
<?php include '../include_title.php'; ?>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="../css/colors/default.css" id="theme" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    <link href="../css/google_fonts/fonts_prompt.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header card-no-border fix-sidebar">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Admin Wrap</p>
        </div>
    </div>
    <div id="main-wrapper">
    <?php include '../mamu/manu_admin.php'; ?>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">ข้อมูลยุทธศาสตร์</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">ข้อมูลยุทธศาสตร์</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <!-- column -->
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">ข้อมูลยุทธศาสตร์</h4>
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
                                                <a href="../strategic/form_strategic.php"><button type="button" class="btn btn-primary">เพิ่มยุทธศาสตร์</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table text-center table-bordered">
                                        <thead>
                                        <tr>
                                                <th class="text-center"><b>ลำดับ</b></th>
                                                <th class="text-center"><b>ชื่อยุทธศาสตร์</b></th>
                                                <th class="text-center"><b>พันธกิจ</b></th>
                                                <th class="text-center"><b>แก้ไข</b></th>
                                                <th class="text-center"><b>ลบ</b></th>
                                            </tr>
                                        </thead>
                                        <?php
                                            $i=1;
                                            $i<="";

                                            include '../../administrator/connect.php';


                                            $sql_strategic ="SELECT tb_strategic.strategic_id, tb_strategic.strategic , tb_mission.mission   FROM tb_strategic
                                            INNER JOIN tb_mission ON tb_strategic.mission_id = tb_mission.mission_id
                                            WHERE (tb_strategic.strategic LIKE '%".$strKeyword."%' or tb_mission.mission LIKE '%".$strKeyword."%'  ) ";


                                            // $sql_strategic ="SELECT * FROM tb_strategic";
                                            $query_strategic = mysqli_query($conn,$sql_strategic);
                                            while($row_strategic = mysqli_fetch_array($query_strategic,MYSQLI_ASSOC))
                                            {
                                           //      $id = $row_strategic['id'];
                                           //      $strategic = $row_strategic['strategic'];
                                           //      $mission_id = $row_strategic['mission_id'];
                                           //
                                           // $sql_mission = "SELECT * FROM tb_mission WHERE mission_id = '".$mission_id."' ";
                                           // $query_mission = mysqli_query($conn,$sql_mission);
                                           // $row_mission =mysqli_fetch_assoc($query_mission);
                                           // $mission = $row_mission['mission'];


                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row_strategic['strategic'];?></td>
                                                <td><?php echo $row_strategic['mission'];?></td>
                                                <td><a href="edit_form_strategic.php?strategic_id=<?php echo $row_strategic['strategic_id'];?>" class="btn btn-warning">แก้ไข</a></td>
                                                <td><a href="JavaScript:if(confirm('ยืนยันการลบ ?') == true){window.location='delete_strategic.php?strategic_id=<?php echo $row_strategic["strategic_id"];?>';}" class="btn btn-danger">ลบ</a></td>
                                            </tr>
                                            <?php
                                                $i++;
                                        }
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
    <script src="../assets/node_modules/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/node_modules/bootstrap/js/popper.min.js"></script>
    <script src="../assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="../js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../js/custom.min.js"></script>
    <!-- jQuery peity -->
    <script src="../assets/node_modules/peity/jquery.peity.min.js"></script>
    <script src="../assets/node_modules/peity/jquery.peity.init.js"></script>
</body>

</html>
