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
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Admin Wrap</p>
        </div>
    </div>
    <div id="main-wrapper">
        <?php include '../../mamu/manu_admin.php'; ?>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">แก้ไขเอกสารสัญญายืม</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">แก้ไขเอกสารสัญญายืม</li>
                        </ol>
                    </div>
                </div>

                <?php
                    $doc_id =$_GET['doc_id'];
                    $sql ="SELECT * FROM tb_lend WHERE doc_id = '".$doc_id."'";
                    $query = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
                    {
                        $doc_id = $row['doc_id'];
                        $str_date = $row['str_date'];
                        $project = $row['project'];
                        $activity = $row['activity'];
                        $person_id = $row['person_id'];
                        $allowance = $row['allowance'];
                        $allowance_day = $row['allowance_day'];
                        $allowance_price = $row['allowance_price'];
                        $rest = $row['rest'];
                        $rest_price = $row['rest_price'];
                        $room = $row['room'];
                        $num_night = $row['num_night'];
                        $vehicle_num = $row['vehicle_num'];
                        $vehicle_price = $row['vehicle_price'];
                        $regis = $row['regis'];
                        $regis_num = $row['regis_num'];
                        $fication_day = $row['fication_day'];
                        $num_people = $row['num_people'];
                        $num_hour = $row['num_hour'];
                        $price_hour = $row['price_hour'];
                        $students_work = $row['students_work'];
                        $work_day = $row['work_day'];
                        $work_price = $row['work_price'];
                        $hand_food = $row['hand_food'];
                        $num_food = $row['num_food'];
                        $food_price = $row['food_price'];
                        $snack = $row['snack'];
                        $num_snack = $row['num_snack'];
                        $snack_price = $row['snack_price'];

                        $date_list = unserialize( $row["date_list"] );
                        $pay_type = unserialize( $row["pay_type"] );
                        $price_list = unserialize( $row["price_list"] );
                        $balance = unserialize( $row["balance"] );
                    }

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
                <div class="row">
                    <div class="col-lg-12 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-body">
                                <form class="form-horizontal form-material" action="../lend/edit_action.php" name="insertlend" method="post">
                                    <!-- <input type="hidden" name="id" value="<?php echo $id; ?>"> -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <div class="form-group">
                                                    <label>
                                                        <h4><b><u>แก้ไขเอกสารสัญญายืม</u></b></h4>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>รหัสเอกสารสัญญายืม</b></label>
                                                <input type="text" class="form-control form-control-line" name="doc_id" value="<?php echo $doc_id; ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>เริ่มต้นวันที่</b></label>
                                                <input type="date" class="form-control form-control-line" name="str_date" value="<?php echo $str_date; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <?php
                                            $sql_person = "select * from tb_person";
                                            $query_person = mysqli_query($conn,$sql_person);
                                        ?>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><b>ชื่อบุคลากร</b></label>
                                                <input type="text" value="<?php echo $prefix?><?php echo $firtname?>&nbsp;&nbsp;<?php echo $lastname?>" class="form-control form-control-line">
                                                <input type="hidden" class="form-control" name="person_id" value="<?php echo $person_id?>">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><b>ชื่ออาจารย์</b></label>
                                                <select class="form-control" name="teacher_id" value="<?php echo $row['teacher_id']; ?>">

                                                    <?php
                                                        $sql_check_teacher = "SELECT * FROM tb_teacher";
                                                        $query_check_teacher = mysqli_query($conn,$sql_check_teacher);

                                                        $teacher_id1 = $row['teacher_id'];
                                                        while($result_check_teacher = mysqli_fetch_array($query_check_teacher))
                                                        {
                                                        if($teacher_id1 == $result_check_teacher["teacher_id"])
                                                        {
                                                        $selected_check_teacher = "selected";

                                                        }
                                                        else
                                                        {
                                                        $selected_check_teacher = "";
                                                        }
                                                        ?>
                                                    <option value="<?php echo $result_check_teacher["teacher_id"];?>" <?php echo $selected_check_teacher;?>><?php echo $result_check_teacher["t_firstname"]; ?>&nbsp;&nbsp;<?php echo $result_check_teacher["t_lastname"]; ?></option>
                                                    <?php
                                                        }
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><b>โครงการ</b></label>
                                                <input type="text" class="form-control form-control-line" name="project" value="<?php echo $project; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="activity"><b>ชื่อกิจกรรม</b></label>
                                                <input type="text" class="form-control form-control-line" name="activity" value="<?php echo $activity; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <script language="javascript">
                                        function IsNumeric(sText, obj) {
                                            var ValidChars = "0123456789/-";
                                            var IsNumber = true;
                                            var Char;
                                            for (i = 0; i < sText.length && IsNumber == true; i++) {
                                                Char = sText.charAt(i);
                                                if (ValidChars.indexOf(Char) == -1) {
                                                    IsNumber = false;
                                                }
                                            }
                                            if (IsNumber == false) {
                                                alert("(ตัวเลข เท่านั้น)");
                                                obj.value = sText.substr(0, sText.length - 1);
                                            }
                                        }
                                    </script>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label><b>ค่าเบี้ยเลี้ยง</b></label>
                                                <input type="text" class="form-control form-control-line" name="allowance" value="<?php echo $allowance; ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>ราคา</b></label>
                                                <input type="text" class="form-control form-control-line" name="allowance_price" value="<?php echo $allowance_price; ?>" onKeyUp="IsNumeric(this.value,this)">
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>กี่วัน</b></label>
                                                <input type="text" class="form-control form-control-line" name="allowance_day" value="<?php echo $allowance_day; ?>" onKeyUp="IsNumeric(this.value,this)">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>ค่าที่พัก</b></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="">
                                            <div class="form-group">
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><b>ค่าเช่าที่พักประเภท</b></label>
                                                <input type="text" class="form-control form-control-line" name="rest" value="<?php echo $rest; ?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><b>จ่ายจริง คืนล่ะ/บาท</b></label>
                                                <input type="text" class="form-control form-control-line" name="rest_price" value="<?php echo $rest_price; ?>" onKeyUp="IsNumeric(this.value,this)">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><b>กี่ห้อง</b></label>
                                                <input type="number" class="form-control form-control-line" name="room" value="<?php echo $room; ?>" onKeyUp="IsNumeric(this.value,this)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="">
                                            <div class="form-group">
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><b>กี่คืน</b></label>
                                                <input type="number" class="form-control form-control-line" name="num_night" value="<?php echo $num_night; ?>" onKeyUp="IsNumeric(this.value,this)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>ค่าพาหนะ</b></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="">
                                            <div class="form-group">
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><b>ค่ารถรับจ้างคุณวิทยากรผู้ทรงคุณวุฒิ/กี่คัน</b></label>
                                                <input type="text" class="form-control form-control-line" name="vehicle_num" value="<?php echo $allowance_price; ?>" onKeyUp="IsNumeric(this.value,this)">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><b>คันล่ะ/บาท</b></label>
                                                <input type="text" class="form-control form-control-line" name="vehicle_price" onKeyUp="IsNumeric(this.value,this)" value="<?php echo $allowance_price; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>ค่าลงทะเบียน</b></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="">
                                            <div class="form-group">
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label><b>ค่าลงทะเบียนอบรม/บาท</b></label>
                                                <input type="text" class="form-control form-control-line" name="regis" value="<?php echo $regis; ?>" onKeyUp="IsNumeric(this.value,this)">
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>จำนวน/คน</b></label>
                                                <input type="text" class="form-control form-control-line" name="regis_num" value="<?php echo $regis_num; ?>" onKeyUp="IsNumeric(this.value,this)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><b>ค่าอื่นๆ</b></label>&nbsp;<label class="text-danger">( หมายเหตุ ถ้าไม่มีข้อมูล กรุณากรอกเครื่องหมาย - )</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="">
                                            <div class="form-group">
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><b>ค่าสมนาคุณวิทยากรผู้ทรงคุณวุฒิ/วัน</b></label>
                                                <input type="text" class="form-control form-control-line" name="fication_day" value="<?php echo $fication_day; ?>" onKeyUp="IsNumeric(this.value,this)"> 
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>กี่คน</b></label>
                                                <input type="text" class="form-control form-control-line" name="num_people" value="<?php echo $num_people; ?>" onKeyUp="IsNumeric(this.value,this)">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>กี่ชั่วโมง</b></label>
                                                <input type="text" class="form-control form-control-line" name="num_hour" value="<?php echo $num_hour; ?>" onKeyUp="IsNumeric(this.value,this)">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>ชั่วโมง/บาท</b></label>
                                                <input type="text" class="form-control form-control-line" name="price_hour" value="<?php echo $price_hour; ?>" onKeyUp="IsNumeric(this.value,this)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="">
                                            <div class="form-group">
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><b>ค่าตอบแทนนักศึกษาช่วยงาน/กี่คน</b></label>
                                                <input type="text" class="form-control form-control-line" name="students_work" value="<?php echo $students_work; ?>" onKeyUp="IsNumeric(this.value,this)">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>กี่วัน</b></label>
                                                <input type="text" class="form-control form-control-line" name="work_day" value="<?php echo $work_day; ?>" onKeyUp="IsNumeric(this.value,this)">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>วันล่ะ/บาท</b></label>
                                                <input type="text" class="form-control form-control-line" name="work_price" value="<?php echo $work_price; ?>" onKeyUp="IsNumeric(this.value,this)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="">
                                            <div class="form-group">
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><b>ค่าอาหารมือหลัก/จำนวนกี่คน</b></label>
                                                <input type="text" class="form-control form-control-line" name="hand_food" value="<?php echo $hand_food; ?>" onKeyUp="IsNumeric(this.value,this)">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>กี่มื่อ</b></label>
                                                <input type="text" class="form-control form-control-line" name="num_food" value="<?php echo $num_food; ?>" onKeyUp="IsNumeric(this.value,this)">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>มื่อล่ะ/บาท</b></label>
                                                <input type="text" class="form-control form-control-line" name="food_price" value="<?php echo $food_price; ?>" onKeyUp="IsNumeric(this.value,this)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="">
                                            <div class="form-group">
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><b>ค่าอาหารว่างและเครื่องดื่ม/จำนวนกี่คน</b></label>
                                                <input type="text" class="form-control form-control-line" name="snack" value="<?php echo $snack; ?>" onKeyUp="IsNumeric(this.value,this)">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>กี่มื่อ</b></label>
                                                <input type="text" class="form-control form-control-line" name="num_snack" value="<?php echo $num_snack; ?>" onKeyUp="IsNumeric(this.value,this)">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>มื่อล่ะ/บาท</b></label>
                                                <input type="text" class="form-control form-control-line" name="snack_price" value="<?php echo $snack_price; ?>" onKeyUp="IsNumeric(this.value,this)">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-info btn-sm" id="createRows" value="Add">เพิ่ม</button>
                                                &nbsp;&nbsp;<button type="button" class="btn btn-warning btn-sm" id="deleteRows" value="Del">ลบ</button>
                                                &nbsp;&nbsp;<button type="button" class="btn btn-danger btn-sm" id="clearRows" value="Clear">ลบทั้งหมด</button>
                                            </div>
                                        </div>

                                        <table width="100%" border="0" id="myTable">
                                            <thead>
                                                <div class='row'>
                                                    <div class='col-md-4'>
                                                        <div class='form-group'>
                                                            <?php
                                                                    $pay_type1 = array($pay_type);
                                                                    foreach ($pay_type1 as $pay_type1){
                                                                    $j=0;
                                                                    foreach ($pay_type1 as $pay_type1[$j]){
                                                                        $value1 = $pay_type1[$j];
                                                                        //echo "<tr><td>{$value}</td></tr>";
                                                                        $j++;
                                                                        }
                                                                    }
                                                                    $price_list1 = array($price_list);
                                                                    foreach ($price_list1 as $price_list1){
                                                                    $j=0;
                                                                    foreach ($price_list1 as $price_list1[$j]){
                                                                        $value2 = $price_list1[$j];
                                                                        //echo "<tr><td>{$value}</td></tr>";
                                                                        $j++;
                                                                        }
                                                                    }
                                                                    $balance1 = array($balance);
                                                                    foreach ($balance1 as $balance1){
                                                                    $j=0;
                                                                    foreach ($balance1 as $balance1[$j]){
                                                                        $value3 = $balance1[$j];
                                                                        //echo "<tr><td>{$value}</td></tr>";
                                                                        $j++;
                                                                        }
                                                                    }

                                                                    $date_list1 = array($date_list);

                                                                    foreach ($date_list1 as $date_list1){
                                                                        $j=0;

                                                                        foreach ($date_list1 as $date_list1[$j]){
                                                                            $value = $date_list1[$j];
                                                                            $value1 = $pay_type1[$j];
                                                                            $value2 = $price_list1[$j];
                                                                            $value3 = $balance1[$j];

                                                                            echo "<tr><td class='col-md-8'><div class='row'><div class='col-md-2'><div class='form-group'><label><b>วัน/เดือน/ปี</b></label><input type='date' class='form-control p_input' value='$value' name='date_list[]'></div></div><div class='col-md-2'><div class='form-group'><label><b>การชำระ</b></label><select class='form-control' name='pay_type[]'><option>$value1</option><option>เงินสด</option><option><b>ใบสำคัญ</b></option></select></div></div><div class='col-md-2'><div class='form-group'><label><b>ราคา</b></label></label><input type='text' class='form-control p_input' onKeyUp='IsNumeric(this.value,this)' value='$value2' name='price_list[]'></div></div><div class='col-md-2'><div class='form-group'><label><b>ยอดคงค้าง</b></label><input type='text' class='form-control p_input' onKeyUp='IsNumeric(this.value,this)' value='$value3' name='balance[]'></div></div></div></td></tr>";
                                                                            //echo "<li>{$value}</li>";
                                                                            $j++;
                                                                        }
                                                                    }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                        <br />
                                        <center>
                                            <br>
                                            <input type="hidden" id="hdnCount" name="hdnCount">
                                        </center>
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
                            tr = tr + "<td class='col-md-8'><div class='row'><div class='col-md-2'><div class='form-group'><label><b>วัน/เดือน/ปี</b></label></label><input type='date' class='form-control p_input'  name='date_list[]" + rows + "'></div></div><div class='col-md-2'><div class='form-group'><label><b>การชำระ</b></label><select class='form-control' name='pay_type[]" + rows + "'><option>เงินสด</option><option><b>ใบสำคัญ</b></option></select></div></div><div class='col-md-2'><div class='form-group'><label><b>ราคา</b></label></label><input type='text' class='form-control p_input' onKeyUp='IsNumeric(this.value,this)' name='price_list[]" + rows + "'></div></div><div class='col-md-2'><div class='form-group'><label><b>ยอดคงค้าง</b></label><input type='text' class='form-control p_input' onKeyUp='IsNumeric(this.value,this)' name='balance[]" + rows + "'></div></div></div></td>";
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
            <script src="jquery-1.11.1.min.js" type="text/javascript"></script>
            <script type="text/javascript">
                    $(document).ready(function() {
                        $('#project').change(function() {
                            $.ajax({
                                type: 'POST',
                                data: {project: $(this).val()},
                                url: '../select_activity.php',
                                success: function(data) {
                                    $('#activity').html(data);
                                }
                            });
                            return false;
                        });
                    });
                </script>
</body>

</html>
