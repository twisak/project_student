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
                        <h3 class="text-themecolor">เพิ่มข้อมูลอาจารย์</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">เพิ่มข้อมูลอาจารย์</li>
                        </ol>
                    </div>
                </div>

                <script src="http://code.jquery.com/jquery-latest.js"></script>


                <?php

                            $teacher_id = $_GET['teacher_id'];
                            // echo $id;
                            $sql_teacher = "SELECT * FROM tb_teacher WHERE teacher_id = '".$teacher_id."' ";
                            $query_teacher = mysqli_query($conn,$sql_teacher);
                            $result_teacher = mysqli_fetch_array($query_teacher);

                            $teacher_id = $result_teacher['teacher_id'];
                            $prefix = $result_teacher['prefix'];
                            $t_firstname = $result_teacher['t_firstname'];
                            $t_lastname = $result_teacher['t_lastname'];

                ?>
                <script language="javascript">
                    function IsCharacter(sText, obj) {
                        var ValidChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ.abcdefghijklmnopqrstuvwxyz.กขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรลวศษสหฬอฮ. ื.์.่.๋.้.็.า.เ.ๆ.ำ.ะ.ั.ี.๊.ึ.ุ.ู.";
                        var IsCharacter = true;
                        var Char;
                        for (i = 0; i < sText.length && IsCharacter == true; i++) {
                            Char = sText.charAt(i);
                            if (ValidChars.indexOf(Char) == -1) {
                                IsCharacter = false;
                            }
                        }
                        if (IsCharacter == false) {
                            alert("(ภาษาไทย & อังกฤษ เท่านั้น)");
                            obj.value = sText.substr(0, sText.length - 1);
                        }
                    }
                </script>

                <div class="row">

                    <div class="col-lg-12 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-body">
                                <form class="form-horizontal form-material" action="edit_teacher.php" name="form_user" method="post">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <div class="form-group">
                                                    <label>
                                                        <h4><b><u>แก้ไขข้อมูลอาจารย์</u></b></h4>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label><b>รหัส</b></label>
                                                <input type="text" name="teacher_id" value="<?php echo $teacher_id; ?>" class="form-control form-control-line" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><b>คำนำหน้า</b></label></label>&nbsp;<label>(ภาษาไทย & อังกฤษ)</label>
                                                <input type="text" name="prefix" value="<?php echo $prefix; ?>" class="form-control form-control-line" onKeyUp="IsCharacter(this.value,this)">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><b>ชื่อ</b></label></label>&nbsp;<label>(ภาษาไทย & อังกฤษ)</label>
                                                <input type="text" name="t_firstname" value="<?php echo $t_firstname; ?>" class="form-control form-control-line" onKeyUp="IsCharacter(this.value,this)">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><b>นามสกุล</b></label></label>&nbsp;<label>(ภาษาไทย & อังกฤษ)</label>
                                                <input type="text" name="t_lastname" value="<?php echo $t_lastname; ?>" class="form-control form-control-line" onKeyUp="IsCharacter(this.value,this)">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><b>ตำแหน่ง</b></label></label>
                                                <select class="form-control" name="position_id" value="<?php echo $result_teacher['position_id']; ?>">
                                                    <?php
                                                        $sql_check_position = "SELECT * FROM tb_position";
                                                        $query_check_position = mysqli_query($conn,$sql_check_position);

                                                        $position_id = $result_teacher['position_id'];
                                                        while($result_check_position = mysqli_fetch_array($query_check_position))
                                                        {
                                                            if($position_id == $result_check_position["position_id"])
                                                            {
                                                            $selected_check_position = "selected";

                                                            }
                                                            else
                                                            {
                                                            $selected_check_position = "";
                                                            }
                                                        ?>
                                                    <option value="<?php echo $result_check_position["position_id"];?>" <?php echo $selected_check_position;?>><?php echo $result_check_position["position_name"]; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
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
                    <!-- Row -->
                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Container fluid  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <footer class="footer">
                    © 2018 Adminwrap by wrappixel.com
                </footer>
                <!-- ============================================================== -->
                <!-- End footer -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
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
