<?php
include('../../../../../config/connect.php');
include('../../../../../config/constant.php');
    $username= $_SESSION['username'];

    $sql ="SELECT * FROM account_login WHERE username = '".$username."' ";
    $query = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
    {
        $person_id = $row['person_id'];
    }

    $sql1 ="SELECT * FROM tb_person WHERE person_id = '".$person_id."' ";
    $query1 = mysqli_query($conn,$sql1);
    while($row1 = mysqli_fetch_array($query1,MYSQLI_ASSOC))
    {
        $prefix = $row1['prefix'];
        $firtname = $row1['firtname'];
        $lastname = $row1['lastname'];
        $person_id = $row1['person_id'];
        // $prefix = $row1['prefix'];
          // $prefix = $row1['prefix'];
    }
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
<?php include '../../../../include_title.php'; ?>
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
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Admin Wrap</p>
        </div>
    </div>
    <div id="main-wrapper">
        <?php include '../../../../menu/menu_admin.php'; ?>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">เอกสารบันทึกข้อความ/อนุมัติดำเนินการจ้างเหมา</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" action="../record1/add_action.php" method="post">
                                    <?php
                                            $sql = "Select Max(substr(doc_id,3)+1) as MaxID from tb_note_record1 ";
                                            $query = mysqli_query($conn,$sql);
                                            $table_id = mysqli_fetch_assoc($query);
                                            $testid = $table_id['MaxID'];
                                                    if($testid=='')
                                                    {
                                                        $id="NR1001";
                                                    }else
                                                    {
                                                        $id="NR".sprintf("%03d",$testid);
                                                    }
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <div class="form-group">
                                                <label><h4><b><u>แบบฟอร์มเอกสารอนุมัติดำเนินการจ้างเหมา</u></b></h4></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><b>รหัสเอกสาร</b></label>
                                                <input type="text" value="<?=$id?>" readonly class="form-control form-control-line">
                                                <input type="hidden" name="doc_id" value="<?=$id?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                               <label><b>ชื่อบุคลากร</b></label>
                                                <input type="text" value="<?php echo $prefix?><?php echo $firtname?>&nbsp;&nbsp;<?php echo $lastname?>" readonly class="form-control form-control-line">
                                                <input type="hidden" class="form-control" name="person_id" value="<?php echo $person_id?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                               <label><b>ชื่อโครงการ</b></label>&nbsp;<label class="text-danger"><b>*</b></label></label>
                                                <select name="project_id" id="project" class="form-control">
                                                    <option value="">เลือกโครงการ</option>
                                                    <?php
                                                        $sql = "SELECT * FROM tb_project";
                                                        $query = mysqli_query($conn, $sql);
                                                        while($result = mysqli_fetch_assoc($query)):
                                                    ?>
                                                    <option value="<?=$result['project_id']?>"><?=$result['project_name']?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                              <label><b>ชื่อกิจกรรม</b></label>&nbsp;<label class="text-danger"><b>*</b></label></label>
                                                <select name="activity_id" id="activity" class="form-control">
                                                    <option value="">ชื่อกิจกรรม</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                               <label><b>ส่วนราชการ</b></label>&nbsp;<label class="text-danger"><b>*</b></label></label>
                                                <input type="text" class="form-control form-control-line" name="government">
                                            </div>
                                        </div>
                                        <?php
                                            $sql = "Select Max(substr(at,7)+1) as MaxID from tb_note_record1 ";
                                            $query = mysqli_query($conn,$sql);
                                            $table_id = mysqli_fetch_assoc($query);
                                            $testid = $table_id['MaxID'];
                                                    if($testid=='')
                                                    {
                                                        $idd="อว.000001";
                                                    }else
                                                    {
                                                        $idd="อว.".sprintf("%06d",$testid);
                                                    }
                                        ?>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                               <label><b>ที่</b></label>
                                                <input type="text" value="<?=$idd?>" readonly class="form-control form-control-line">
                                                <input type="hidden" name="at" value="<?=$idd?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>วันที่</b></label>
                                                <input type="date" class="form-control form-control-line" name="date_current">
                                            </div>
                                        </div> -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                              <label><b>เรื่อง</b></label>&nbsp;<label class="text-danger"><b>*</b></label></label>
                                                <select name="title_id" class="form-control">
                                                    <option value="">เลือกชื่อเรื่อง</option>
                                                    <?php
                                                        $sql = "SELECT * FROM tb_title";
                                                        $query = mysqli_query($conn, $sql);
                                                        while($result = mysqli_fetch_assoc($query)):
                                                    ?>
                                                    <option value="<?=$result['title_id']?>"><?=$result['title']?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><b>ใช้งบประมาณ</b></label>&nbsp;<label class="text-danger"><b>*</b></label></label>
                                                <select name="budget_id" id="budget" class="form-control">
                                                    <option value="">เลือกงบประมาณ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                               <label><b>ปีงบประมาณ</b></label>&nbsp;<label class="text-danger"><b>*</b></label></label>
                                                <select class="form-control" name="budget_year" id="budget_year">
                                                    <?php
                                                        $xYear=date('Y'); // เก็บค่าปีปัจจุบันไว้ในตัวแปร
                                                                echo '<option value="'.$xYear.'">'.$xYear.'</option>'; // ปีปัจจุบัน
                                                        for($i=1;$i<=30;$i++){
                                                        echo '<option value="'.($xYear-$i).'">'.($xYear-$i).'</option>';
                                                            }
                                                    ?>
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                              <label><b>จำวนน/คน</b></label>&nbsp;<label class="text-danger"><b>*</b></label></label>
                                                <input type="text" class="form-control form-control-line" name="num_person">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                               <label><b>ระยะเวลาปฏิบัติงานกี่งวด</b></label>&nbsp;<label class="text-danger"><b>*</b></label></label>
                                                <input type="text" class="form-control form-control-line" name="num_period">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                               <label><b>งวดล่ะกี่บาท</b></label>&nbsp;<label class="text-danger"><b>*</b></label></label>
                                                <input type="text" class="form-control form-control-line" name="price_period">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                               <label><b>ผู้ตรวจรับพัสดุ</b></label>&nbsp;<label class="text-danger"><b>*</b></label></label>
                                                <select class="form-control" name="supplies_id">
                                                    <option value="">-- เลือกรายชื่อ --</option>
                                                    <?php
                                                        $sql_teacher = "select * from tb_teacher";
                                                        $query_teacher = mysqli_query($conn,$sql_teacher);
                                                        while($result_teacher=mysqli_fetch_array($query_teacher))
                                                        {
                                                        ?>
                                                    <option value='<?php echo $result_teacher['teacher_id'];?>'><?php echo $result_teacher['t_firstname'];?>&nbsp;&nbsp;<?php echo $result_teacher['t_lastname'];?></option>
                                                    <?php
                                                        }
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                             <label><b>ผู้ควบคุมการปฏิบัติงาน</b></label>&nbsp;<label class="text-danger"><b>*</b></label></label>
                                                <select class="form-control" name="control_id">
                                                    <option value="">-- เลือกรายชื่อ --</option>
                                                    <?php
                                                        $sql_teacher = "select * from tb_teacher";
                                                        $query_teacher = mysqli_query($conn,$sql_teacher);
                                                        while($result_teacher=mysqli_fetch_array($query_teacher))
                                                        {
                                                        ?>
                                                    <option value='<?php echo $result_teacher['teacher_id'];?>'><?php echo $result_teacher['t_firstname'];?>&nbsp;&nbsp;<?php echo $result_teacher['t_lastname'];?></option>
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
                                                <input type="submit" name="submit" value="บันทึก" class="btn btn-primary btn-block" />
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-danger btn-block" onClick="JavaScript:history.back();">ยกเลิก</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
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
    <script type="text/javascript">
    $(document).ready(function () {

        var rows = 1;
        $("#createRows").click(function () {


            var tr = "<tr>";
            tr = tr + "<td><div class='row'><div class='col-md-2'><div class='form-group'><label><b>วัน/เดือน/ปี</b></label></label><input type='date' class='form-control p_input' name='date_list[]" + rows + "'></div></div><div class='col-md-2'><div class='form-group'><label><b>การชำระ</b></label><select class='form-control' name='pay_type[]" + rows + "'><option>เงินสด</option><option>ใบสำคัญ</option></select></div></div><div class='col-md-2'><div class='form-group'><label><b>ราคา</b></label></label><input type='text' class='form-control p_input' onKeyUp='IsNumeric(this.value,this)' name='price_list[]" + rows + "'></div></div><div class='col-md-2'><div class='form-group'><label><b>ยอดคงค้าง</b></label><input type='text' class='form-control p_input' onKeyUp='IsNumeric(this.value,this)' name='balance[]" + rows + "'></div></div></div></td>";
            tr = tr + "</tr>";
            $('#myTable > tbody:last').append(tr);

            $('#hdnCount').val(rows);
            rows = rows + 1;
        });

        $("#deleteRows").click(function () {
            if ($("#myTable tr").length != 1) {
                $("#myTable tr:last").remove();
            }
        });

        $("#clearRows").click(function () {
            rows = 1;
            $('#hdnCount').val(rows);
            $('#myTable > tbody:last').empty(); // remove all
        });

    });
    </script>
    <!-- listbox 2 ชั้น -->
    <script src="jquery-1.11.1.min.js" type="text/javascript"></script>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('#project').change(function () {
                            $.ajax({
                                type: 'POST',
                                data: {
                                    project: $(this).val()
                                },
                                url: '../select_activity.php',
                                success: function (data) {
                                    $('#activity').html(data);
                                }
                            });
                            return false;
                        });
                    });
    </script>
    <!-- listbox 2 ชั้น -->
</body>

</html>
<script type="text/javascript">
    $(document).ready(function () {
        $('#project').change(function () {
            $.ajax({
                type: 'POST',
                data: {
                    project: $(this).val()
                },
                url: '../../../select_activity.php',
                success: function (data) {
                    $('#activity').html(data);
                }
            });
            return false;
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#project').change(function () {
            $.ajax({
                type: 'POST',
                data: {
                    project: $(this).val()
                },
                url: '../../../select_budget.php',
                success: function (data) {
                    $('#budget').html(data);
                }
            });
            return false;
        });
    });
</script>
