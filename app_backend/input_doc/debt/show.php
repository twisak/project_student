<?php
    include('../../../config/connect.php');
    include('../../../config/constant.php');

    // $username= $_SESSION['username'];

    // $sql ="SELECT * FROM account_login WHERE username = '".$username."' ";
    // $query = mysqli_query($conn,$sql);
    // while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
    // {
    //     $person_id = $row['person_id'];
    // }

    // $sql1 ="SELECT * FROM tb_person WHERE person_id = '".$person_id."' ";
    // $query1 = mysqli_query($conn,$sql1);
    // while($row1 = mysqli_fetch_array($query1,MYSQLI_ASSOC))
    // {
    //     $prefix = $row1['prefix'];
    //     $firtname = $row1['firtname'];
    //     $lastname = $row1['lastname'];
    //     $person_id = $row1['person_id'];
    //     // $prefix = $row1['prefix'];
    // }
    //echo $sql1;
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
    <?php include '../../mamu/manu_admin.php'; ?>
    <div id="main-wrapper">
                                    <?php
                                        // $username= $_SESSION['username'];
                                        // $sql ="SELECT * FROM account_login WHERE username = '".$username."' ";
                                        // $query = mysqli_query($conn,$sql);
                                        // while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
                                        // {
                                        //     $person_id = $row['person_id'];
                                        // }

                                        $doc_id =$_GET['doc_id'];

                                        $sql_debt = "SELECT * FROM tb_debt WHERE doc_id = '".$doc_id."' ";
                                        $query_debt = mysqli_query($conn,$sql_debt);
                                        $result_debt = mysqli_fetch_assoc($query_debt);

                                        $id = $result_debt['id'];
                                        $doc_id = $result_debt['doc_id'];
                                        $name_train = $result_debt['name_train'];
                                        // $project_id = $result_debt['project_id'];
                                        // $activity_id = $result_debt['activity_id'];
                                        $person_id = $result_debt['person_id'];
                                        $teacher_id = $result_debt['teacher_id'];
                                        $money_from = $result_debt['money_from'];
                                        $money_from_id = $result_debt['money_from_id'];
                                        $lend_num = $result_debt['lend_num'];
                                        $note_that = $result_debt['note_that'];
                                        $date_note = $result_debt['date_note'];
                                        $under = $result_debt['under'];
                                        $along_with = $result_debt['along_with'];
                                        $go_practice = $result_debt['go_practice'];
                                        $depart_from = $result_debt['depart_from'];
                                        $date_depart = $result_debt['date_depart'];
                                        $time_depart = $result_debt['time_depart'];
                                        $back = $result_debt['back'];
                                        $date_back = $result_debt['date_back'];
                                        $time_back = $result_debt['time_back'];
                                        $open_money	= $result_debt['open_money'];
                                        $document_num = $result_debt['document_num'];

                                        $list = unserialize( $result_debt["list"] );
                                        $money_num = unserialize( $result_debt["money_num"] );

                                        $sql ="SELECT * FROM tb_lend WHERE doc_id = '".$lend_num."'";
                                        $query = mysqli_query($conn,$sql);
                                        while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
                                        {
                                            $project = $row['project'];
                                            $activity = $row['activity'];
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
                                        
                                        }

                                        // $sql1 ="SELECT * FROM tb_project WHERE project_id = '".$project_id."' ";
                                        // $query1 = mysqli_query($conn,$sql1);
                                        // while($row1 = mysqli_fetch_array($query1,MYSQLI_ASSOC))
                                        // {
                                        //     $project_name = $row1['project_name'];
                                        //     //$project_id = $row1['project_id'];
                                        // }
                                        

                                        // $sql3 ="SELECT * FROM tb_activity WHERE activity_id = '".$activity_id."' ";
                                        // $query3 = mysqli_query($conn,$sql3);
                                        // while($row3 = mysqli_fetch_array($query3,MYSQLI_ASSOC))
                                        // {
                                        //     $activity = $row3['activity'];
                                        // }

                                        $sql_person = "SELECT * FROM tb_person WHERE person_id = '".$person_id."' ";
                                        $query_person = mysqli_query($conn,$sql_person);
                                        $result_person = mysqli_fetch_assoc($query_person);
                                        $prefix = $result_person['prefix'];
                                        $firtname = $result_person['firtname'];
                                        $lastname = $result_person['lastname'];

                                        $sql_teacher = "SELECT * FROM tb_teacher WHERE teacher_id = '".$teacher_id."' ";
                                        $query_teacher = mysqli_query($conn,$sql_teacher);
                                        $result_teacher = mysqli_fetch_assoc($query_teacher);
                                        $t_firstname = $result_teacher['t_firstname'];
                                        $t_lastname = $result_teacher['t_lastname'];

                                        




                                    ?>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-4 align-self-center">
                        <h3 class="text-themecolor">เอกสารล้างหนี้</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">เอกสารล้างหนี้</li>
                        </ol>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <a href="../debt/report4.php?id=<?php echo $doc_id;?>" class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down">
                            <i class="fa-fw fa fa-print"></i>
                            หลักฐานการจ่ายเงิน
                        </a>
                    </div>
                    <div class="col-md-2 align-self-center">
                        <a href="../debt/report1.php?id=<?php echo $doc_id;?>" class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down">
                            <i class="fa-fw fa fa-print"></i>
                            ส่งออกแบบฟอร์ม
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-body">
                                <form class="form-horizontal form-material" action="INSERT_lend.php" name="insertlend" method="post">
                              <div class="row">
                                  <div class="col-md-12 text-center">
                                      <div class="form-group">
                                          <label><h4><b><u>รายละเอียดเอกสารล้างหนี้</u></b></h4></label>
                                      </div>
                                  </div>
                              </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><b>รหัสเอกสารล้างหนี้</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $doc_id;?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><b>ชื่อส่วนราชการผู้จัดฝึกอบรม</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $name_train;?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                        <label><b>โครงการ</b></label><br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $project?>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="activity"><b>ชื่อกิจกรรม</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $activity?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="activity"><b>ชื่อบุคลากร</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $prefix; ?><?php echo $firtname; ?>&nbsp;&nbsp;<?php echo $lastname; ?>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="activity"><b>ชื่ออาจารย์</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $t_firstname; ?>&nbsp;&nbsp;<?php echo $t_lastname; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="activity"><b>ได้รับเงินจาก</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $money_from?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php
                                                                $list1 = array($list);

                                                                  foreach ($list1 as $list1){
                                                                    $j=0;
                                                                    echo "<p><b>รายการ</b></p>";
                                                                    echo "<ul>";
                                                                    foreach ($list1 as $list1[$j]){
                                                                        $value = $list1[$j];
                                                                        //echo "<tr><td>{$value}</td></tr>";
                                                                        echo "<li>{$value}</li>";
                                                                        $j++;
                                                                    }
                                                                    echo "</ul>";
                                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php
                                                                $money_num1 = array($money_num);

                                                                  foreach ($money_num1 as $money_num1){
                                                                    $j=0;
                                                                    echo "<p><b>จำนวนเงิน</b></p>";
                                                                    echo "<ul>";
                                                                    foreach ($money_num1 as $money_num1[$j]){
                                                                        $value = $money_num1[$j];
                                                                        //echo "<tr><td>{$value}</td></tr>";
                                                                        echo "<li>{$value}</li>";
                                                                        $j++;
                                                                    }
                                                                    echo "</ul>";
                                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="activity"><b>สัญญายืมเลขที่</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $lend_num; ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="activity"><b>ตามคำสั่ง/บันทึกที่</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $note_that; ?>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="activity"><b>ลงวันที่</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $date_note; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="activity"><b>สังกัด</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $under; ?>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="activity"><b>พร้อมด้วย</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $along_with; ?>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="activity"><b>ไปปฏิบัติราชการ</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $go_practice; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="activity"><b>ออกเดือนทาง</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $depart_from; ?>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="activity"><b>ตั้งแต่วันที่</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $date_depart; ?>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="activity"><b>เวลา</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $time_depart; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="activity"><b>ถึงวันที่</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $back; ?>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="activity"><b>ถึงวันที่</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $date_back; ?>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="activity"><b>เวลา</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $time_back; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="activity"><b>เบิกค่าใช้จ่ายสำหรับ</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $open_money; ?>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="activity"><b>ค่าเบี้ยเลี้ยง</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $allowance; ?>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="activity"><b>จำนวน/วัน</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $allowance_day; ?>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="activity"><b>วันละ/บาท</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $allowance_price; ?>
                                            </div>
                                        </div>
                                        <?php 
                                                $allowance_sum = $allowance_day * $allowance_price;
                                        ?>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="activity"><b>รวมเป็น</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $allowance_sum; ?>
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
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>ค่าเช่าที่พักประเภท</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rest; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>จ่ายจริง คืนล่ะ/บาท</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rest_price; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>กี่ห้อง</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $room; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>กี่คืน</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $num_night; ?>
                                            </div>
                                        </div>
                                        <?php 
                                                if( $rest_price && $room && $num_night == "-") {
                                                        
                                                    //echo "-";
                                                    $rest_price = "0";
                                                    $room = "0";
                                                    $num_night = "0";
                                                
                                                }elseif($rest_price && $room && $num_night != "-"){
                                                
                                                    $rest_price;
                                                    $room;
                                                    $num_night;
                                                }
                                                $sum_room = $rest_price * $room * $num_night;
                                        ?>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>รวมทั้งหมด/บาม</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sum_room; ?>
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
                                                <label><b>ค่ารถรับจ้างคุณวิทยากรผู้ทรงคุณวุฒิ/กี่คัน</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $vehicle_num; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><b>คันล่ะ/บาท</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $vehicle_price; ?>
                                            </div>
                                        </div>
                                        <?php 
                                                if( $vehicle_num && $vehicle_price == "-") {
                                                        
                                                    //echo "-";
                                                    $vehicle_num = "0";
                                                    $vehicle_price = "0";
                                                
                                                }elseif($vehicle_num && $vehicle_price != "-"){
                                                
                                                    $vehicle_num;
                                                    $vehicle_price;
                                                }
                                                $sum_vehicle = $vehicle_num * $vehicle_price;
                                        ?>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>รวมทั้งหมด/บาม</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sum_vehicle; ?>
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
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><b>ค่าลงทะเบียนอบรม/บาท</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $regis; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><b>จำนวน/คน</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $regis_num; ?>
                                            </div>
                                        </div>
                                        <?php 
                                                if( $regis && $regis_num == "-") {
                                                        
                                                    //echo "-";
                                                    $regis = "0";
                                                    $regis_num = "0";
                                                
                                                }elseif($regis && $regis_num != "-"){
                                                
                                                    $regis;
                                                    $regis_num;
                                                }
                                                $sum_regis = $regis * $regis_num;
                                        ?>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>รวมทั้งหมด/บาม</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sum_regis; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>ค่าอื่นๆ</b></label>
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
                                                <label><b>ค่าสมนาคุณวิทยากรผู้ทรงคุณวุฒิ/วัน</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fication_day; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>กี่คน</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $num_people; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>กี่ชั่วโมง</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $num_hour; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>ชั่วโมง/บาท</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $price_hour; ?>
                                            </div>
                                        </div>
                                        <?php 

                                                if( $fication_day && $num_people && $num_hour && $price_hour == "-") {
                                                                                                        
                                                    //echo "-";
                                                    $fication_day = "0";
                                                    $num_people = "0";
                                                    $num_hour = "0";
                                                    $price_hour = "0";

                                                }elseif($fication_day && $num_people && $num_hour && $price_hour != "-"){

                                                    $fication_day;
                                                    $num_people;
                                                    $num_hour;
                                                    $price_hour;
                                                }

                                            $sum_fication = $fication_day * $num_people * $num_hour * $price_hour;
                                            
                                        ?>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>รวมทั้งหมด/บาม</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sum_fication; ?>
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
                                                <label><b>ค่าตอบแทนนักศึกษาช่วยงาน/กี่คน</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $students_work; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>กี่วัน</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $work_day; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>วันล่ะ/บาท</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $work_price; ?>
                                            </div>
                                        </div>
                                        <?php 

                                            if( $students_work && $work_day && $work_price == "-") {
                                                        
                                                //echo "-";
                                                $students_work = "0";
                                                $work_day = "0";
                                                $work_price = "0";
                                            
                                            }elseif($students_work && $work_day && $work_price != "-"){
                                            
                                                $students_work;
                                                $work_day;
                                                $work_price;
                                            }
                                            $sum_students = $students_work * $work_day * $work_price;
                                            
                                        ?>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>รวมทั้งหมด/บาม</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sum_students; ?>
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
                                                <label><b>ค่าอาหารมือหลัก/จำนวนกี่คน</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $hand_food; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>กี่มื่อ</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $num_food; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>มื่อล่ะ/บาท</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $food_price; ?>
                                            </div>
                                        </div>
                                        <?php 
                                            
                                            if( $hand_food && $num_food && $food_price == "-") {
                                                        
                                                //echo "-";
                                                $hand_food = "0";
                                                $num_food = "0";
                                                $food_price = "0";
                                            
                                            }elseif($hand_food && $num_food && $food_price != "-"){
                                            
                                                $hand_food;
                                                $num_food;
                                                $food_price;
                                            }
                                            $sum_food = $hand_food * $num_food * $food_price;
                                            
                                        ?>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>รวมทั้งหมด/บาม</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sum_food; ?>
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
                                                <label><b>ค่าอาหารว่างและเครื่องดื่ม/จำนวนกี่คน</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $snack; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>กี่มื่อ</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $num_snack; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>มื่อล่ะ/บาท</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $snack_price ; ?>
                                            </div>
                                        </div>
                                        <?php 
                                                    if( $snack && $num_snack && $snack_price == "-") {
                                                                
                                                        //echo "-";
                                                        $snack = "0";
                                                        $num_snack = "0";
                                                        $snack_price = "0";
                                                    
                                                    }elseif($snack && $num_snack && $snack_price != "-"){
                                                    
                                                         $snack;
                                                         $num_snack;
                                                         $snack_price;
                                                    }
                                                    $sum_snack = $snack * $num_snack * $snack_price;
                                        ?>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>รวมทั้งหมด/บาม</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sum_snack; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="activity"><b>หบักฐานการจ่าย/ฉบับ</b></label><br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $document_num; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    

                                <div class="row">
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <a href="../debt/edit.php?id=<?php echo $doc_id;?>" class="btn btn-warning btn-block">แก้ไขข้อมูลเอกสารจ้างเหมาบริการ</a>
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
            <script src="<?php echo ROOT_PROJECT_FRONTEND; ?>/js/script.js"></script>
    <script src="../js/script.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            var rows = 1;
            $("#createRows").click(function () {


                var tr = "<tr>";
                tr = tr + "<td><div class='row'><div class='col-md-4'><div class='form-group'><input type='text' class='form-control p_input' name='foreword" + rows + "'></div></div></td>";
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
            $(document).ready(function() {
                $('#project').change(function() {
                    $.ajax({
                        type: 'POST',
                        data: {project: $(this).val()},
                        url: 'select_activity.php',
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
