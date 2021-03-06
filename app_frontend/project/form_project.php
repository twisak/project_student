<?php
include('../../config/connect.php');
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
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Admin Wrap</p>
        </div>
    </div>
    <div id="main-wrapper">
    <?php include '../menu/menu_admin.php'; ?>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">เพิ่มโครงการ</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">เพิ่มโครงการ</li>
                        </ol>
                    </div>
                </div>

                <script src="http://code.jquery.com/jquery-latest.js"></script>


                <div class="row">

                    <div class="col-lg-12 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-body">
                                <?php
                                        include '../../administrator/connect.php';
                                        $sql = "Select Max(substr(project_id,3)+1) as MaxID from tb_project ";
                                        $query = mysqli_query($conn,$sql);
                                        $table_id = mysqli_fetch_assoc($query);
                                        $testid = $table_id['MaxID'];
                                                if($testid=='')
                                                {
                                                    $id="P001";
                                                }else
                                                {
                                                    $id="P".sprintf("%03d",$testid);
                                                }

                            ?>
                                <form class="form-horizontal form-material" action="insert_project.php" name="form_user" method="post">
                                
                                <input type="hidden" name="recorder" value="<?php echo $person_id;?>" />
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <div class="form-group">
                                                    <label>
                                                        <h4><b><u>เพิ่มข้อมูลโครงการ</u></b></h4>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>รหัสโครงการ</b></label>
                                                <input type="text" name="project_id" value="<?=$id?>" readonly class="form-control form-control-line">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><b>ชื่อโครงการ</b></label>&nbsp;<label class="text-danger"><b>*</b></label>
                                                <input type="text" name="project_name" placeholder="" required class="form-control form-control-line">
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>ปีงบประมาณ</b></label>&nbsp;<label class="text-danger"><b>*</b></label>
                                                <select class="form-control" name="fiscal_year" id="fiscal_year">
                                                    <?php
                                                        $y=date('Y');
                                                        $xYear=$y + 543; // เก็บค่าปีปัจจุบันไว้ในตัวแปร
                                                                echo '<option value="'.$xYear.'">'.$xYear.'</option>'; // ปีปัจจุบัน
                                                        for($i=1;$i<=30;$i++){
                                                        echo '<option value="'.($xYear-$i).'">'.($xYear-$i).'</option>';
                                                            }
                                                    ?>
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="budget"><b>ประเภทงบประมาณ</b></label>&nbsp;<label class="text-danger"><b>*</b></label>
                                                <select class="form-control" id="budget" name="budget_id">
                                                    <option value="">-- เลือกประเภทงบประมาณ --</option>
                                                    <?php
                                                        $sql = "SELECT * FROM tb_budget";
                                                        $query = mysqli_query($conn, $sql);
                                                        while($result = mysqli_fetch_assoc($query)):
                                                    ?>
                                                            <option value="<?=$result['budget_id']?>"><?=$result['budget']?></option>
                                                        <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                                    <label for="product"><b>ผลผลิต</b></label>&nbsp;<label class="text-danger"><b>*</b></label>
                                                    <select name="product_id" id="product" class="form-control">
                                                        <option value="">เลือกผลผลิต</option>
                                                    </select>
                                                </div>


                                        <div class="col-md-3">
                                                    <label for="mission"><b>พันธกิจ</b></label>&nbsp;<label class="text-danger"><b>*</b></label>
                                                    <select name="mission_id" id="mission" class="form-control">
                                                        <option value="">เลือกพันธกิจ</option>
                                                    </select>
                                                </div>

                                        <div class="col-md-3">
                                                    <label for="strategic"><b>ยุทธศาสตร์</b></label>&nbsp;<label class="text-danger"><b>*</b></label>
                                                    <select name="strategic_id" id="strategic" class="form-control">
                                                        <option value="">เลือกยุทธศาสตร์</option>
                                                    </select>
                                                </div>
                                    </div> -->

                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>หลักการและเหตุ</b></label>&nbsp;<label class="text-danger"><b>*</b></label>
                                                <input type="text" name="principle" placeholder="" required class="form-control form-control-line">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><b>งบประมาณ</b></label>&nbsp;<label class="text-danger"><b>*</b></label>
                                                <input type="text" name="budget" placeholder="" required class="form-control form-control-line">
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
        <script src="../js/script1.js"></script>

</body>

</html>
<!-- <script type="text/javascript">
$(document).ready(function(){

    var rows = 1;
    $("#createRows_activity").click(function(){


        var tr = "<tr>";
tr = tr + "<td><div class='row'><div class='col-md-4'><div class='form-group'><label>หัวข้อกิจกรรม</label><input type='text' class='form-control p_input'  name='activity"+rows+"'></div></div></td>";
        tr = tr + "</tr>";
        $('#myTable_activity > tbody:last').append(tr);

        $('#hdnCount_activity').val(rows);
        rows = rows + 1;
    });

    $("#deleteRows_activity").click(function(){
        if ($("#myTable_activity tr").length != 1) {
            $("#myTable_activity tr:last").remove();
        }
    });

    $("#clearRows_activity").click(function(){
        rows = 1;
        $('#hdnCount_activity').val(rows);
        $('#myTable_activity > tbody:last').empty(); // remove all
    });

});
</script> -->
