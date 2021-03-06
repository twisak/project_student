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
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
<?php include '../../include_title.php'; ?>
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap_plugin.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/report.css" rel="stylesheet">
    <link href="../assets/node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="../css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<?php

     include '../../administrator/connect.php';
     //$id = $_GET['id'];

     $sql_salary = "SELECT * FROM tb_salary ";
     $query_salary = mysqli_query($conn,$sql_salary);
     $result_salary = mysqli_fetch_assoc($query_salary);

     $doc_id = $result_salary['doc_id'];
     $str_date = $result_salary['str_date'];
     $stp_date = $result_salary['stp_date'];
     $project_id = $result_salary['project_id'];
     $activity_id = $result_salary['activity_id'];
     $person_id = $result_salary['person_id'];
     $period = $result_salary['period'];
     $total_amount = $result_salary['total_amount'];
     $perform = $result_salary['perform'];
     $month = $result_salary['month'];
     $teacher_id = $result_salary['teacher_id'];

     $day_work = unserialize($result_salary['day_work']);
     $start_time = unserialize($result_salary['start_time']);
     $end_time = unserialize($result_salary['end_time']);
     $Job = unserialize($result_salary['Job']);
     $part_time = unserialize($result_salary['part_time']);
     // $day_work = $result_salary['day_work'];
     // $start_time = $result_salary['start_time'];
     // $end_time = $result_salary['end_time'];
     // $Job = $result_salary['Job'];
     // $part_time = $result_salary['part_time'];

     $sql_project = "SELECT * FROM tb_project WHERE project_id = '".$project_id."' ";
     $query_project = mysqli_query($conn,$sql_project);
     $result_project = mysqli_fetch_assoc($query_project);

     $project_name = $result_project['project_name'];

     $sql_activity = "SELECT * FROM tb_activity WHERE activity_id = '".$activity_id."' ";
     $query_activity = mysqli_query($conn,$sql_activity);
     $result_activity = mysqli_fetch_assoc($query_activity);

     $activity = $result_activity['activity'];

     $sql_person = "SELECT * FROM tb_person WHERE person_id = '".$person_id."' ";
     $query_person = mysqli_query($conn,$sql_person);
     $result_person = mysqli_fetch_assoc($query_person);

     $prefix = $result_person['prefix'];
     $firtname = $result_person['firtname'];
     $lastname = $result_person['lastname'];
     $house_num = $result_person['house_num'];
     $road = $result_person['road'];
     $village = $result_person['village'];
     $province_id = $result_person['province_id'];
     $districts_id = $result_person['districts_id'];
     $amphures_id = $result_person['amphures_id'];

     $sql_province = "SELECT * FROM provinces WHERE id = '".$province_id."' ";
     $query_province = mysqli_query($conn,$sql_province);
     $result_province = mysqli_fetch_assoc($query_province);
     $name_th_p = $result_province['name_th'];

     $sql_districts = "SELECT * FROM districts WHERE id = '".$districts_id."' ";
     $query_districts = mysqli_query($conn,$sql_districts);
     $result_districts = mysqli_fetch_assoc($query_districts);
     $name_th_d = $result_districts['name_th'];

     $sql_amphures = "SELECT * FROM amphures WHERE id = '".$amphures_id."' ";
     $query_amphures = mysqli_query($conn,$sql_amphures);
     $result_amphures = mysqli_fetch_assoc($query_amphures);
     $name_th_a = $result_amphures['name_th'];


     $sql_teacher = "SELECT * FROM tb_teacher WHERE teacher_id = '".$teacher_id."' ";
     $query_teacher = mysqli_query($conn,$sql_teacher);
     $result_teacher = mysqli_fetch_assoc($query_teacher);

     $t_firstname = $result_teacher['t_firstname'];
     $t_lastname = $result_teacher['t_lastname'];
     $position_id = $result_teacher['position_id'];

     $sql_position = "SELECT * FROM tb_position WHERE position_id = '".$position_id."' ";
     $query_position = mysqli_query($conn,$sql_position);
     $result_position = mysqli_fetch_assoc($query_position);

     $position_name = $result_position['position_name'];

?>
<body id="<?php //echo $body['name'];?>">
    <div class="page">
        <table border="1" align="center" width="100%" class="statement-view">
            <tr>
                <td colspan="3" class="border-0">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="3" class="statement-header" align="center">
                    <strong>บันทึกการปฏิบัติงานประจำวันของเจ้าหน้าที่ประสานงานโครงการฯ</strong>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="statement-header" align="center">
                    <strong>โครงการ "<?php echo $project_name; ?>"</strong>
                </td>
            </tr>

            <tr>
                <td colspan="3" class="statement-header" align="center">
                <strong>หน่วยงาน โครงการจัดตั้งสถาบันพัฒนาครูและบุคลากรทางการศึกษาชายแดนใต้ มหาวิทยาลัยราชภัฏยะลา</strong>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="statement-header" align="center">
                <strong>ชื่อ - สกุล <?php echo $prefix; ?><?php echo $firtname; ?>&nbsp;&nbsp;<?php echo $lastname; ?></strong>
                </td>
            </tr>

            <tr>
                <td colspan="2">

                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table border="0" width="100%" class="statement-view text-gray-900">
                        <tr>
                            <td>ภาระหน้าที่ที่ได้รับมอบหมายตามบันทึกข้อตกลง/ขอบเขตของงาน (TOR) ได้แก่</td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. ออกแบบและจีดทำปฏิทินการดำเนินโครงการ</td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. ประสานงานการดำเนินโครงการภายในหน่วยงานและหน่วยงานภาย</td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. รับผิดชอบงานธุรการโครงการ</td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4. สรุปผลการดำเนินงานเบื้องต้นตามปฏิทินการทำงานตลอดจนปัญหา และข้อเสนอเพื่อนำสู่การพิจารณาจากผู้รับผิดชอบโครงการและแลกเปลี่ยนกับผู้มีส่วนร่วมเกี่ยวข้องต่อไป</td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5. ดูและระบบการเงินของโครงการ การจัดซื้อจัดจ้าง งานพัสดุของโครงการ</td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6. จัดประชุมของแต่ละกิจกรรมของโครงการ</td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7. สรุปผลการดำเนินงานเบื้องต้นตามปฏิทินการทำงานตลอดจนปัญหาและข้อเสนอแนะเพื่อนำสู่การพิจารณาจากผู้รับผิดชอบโครงการและการแลกเปลี่ยนกับผู้มีส่วนร่วมเกี่ยวข้องต่อไป</td>
                        </tr>

                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="border-0">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="3">
                <table border="1" width="100%" class="text-gray-900">

                    <tr>
                        <td width="15%" align="center">วัน เดือน ปี</td>
                        <td width="10%" align="center">ระหว่างเวลา..ถึง..</td>
                        <td width="30%" align="center">งานในหน้าที่</td>
                        <td width="15%" align="center">งานพิเศษ</td>
                        <td width="30%" align="center">ข้อเสนอ/ข้อปรับปรุง/ผู้ควบคุมการปฏิบัติงาน</td>
                    </tr>



                    <?php
                        $i=1;
                        $i<="";
                            $day_work = unserialize($result_salary['day_work']);
                            $start_time = unserialize($result_salary['start_time']);
                            $end_time = unserialize($result_salary['end_time']);
                            $Job = unserialize($result_salary['Job']);
                            $part_time = unserialize($result_salary['part_time']);

                            $day_work1 = array($day_work);
                                foreach ($day_work1 as $day_work1){
                                $j=0;
                                foreach ($day_work1 as $day_work1[$j]){
                                    $value_day_work = $day_work1[$j];
                                    $j++;
                                }
                            }

                            $start_time1 = array($start_time);
                                foreach ($start_time1 as $start_time1){
                                $j=0;
                                foreach ($start_time1 as $start_time1[$j]){
                                    $value_start_time = $start_time1[$j];
                                    $j++;
                                }
                            }

                            $end_time1 = array($end_time);
                                foreach ($end_time1 as $end_time1){
                                $j=0;
                                foreach ($end_time1 as $end_time1[$j]){
                                    $value_end_time = $end_time1[$j];
                                    $j++;
                                }
                            }

                            $Job1 = array($Job);
                                foreach ($Job1 as $Job1){
                                $j=0;
                                foreach ($Job1 as $Job1[$j]){
                                        $value_Job = $Job1[$j];
                                        $j++;
                                }
                                }

                            $part_time1 = array($part_time);
                            // print_r($part_time1);
                            //     print_r($Job1);
                            //         print_r($start_time1);
                            //             print_r($end_time1);
                            //                 print_r($day_work1);
                                foreach ($part_time1 as $part_time1){
                                $j=0;
                                foreach ($part_time1 as $part_time1[$j]){
                                            $value_part_time = $part_time1[$j];
                                            $value_day_work = $day_work1[$j];
                                            $value_start_time = $start_time1[$j];
                                            $value_end_time = $end_time1[$j];
                                            $value_Job = $Job1[$j];


                    ?>

                    <tr>
                        <?php $i; ?>
                        <td align="center"><?php echo $value_day_work;?></td>
                        <td align="center"><?php echo $value_start_time; ?>-<?php echo $value_end_time;?> น.</td>
                        <td align="center">- <?php echo $value_Job; ?></td>
                        <td align="center"><?php echo $value_part_time; ?></td>
                        <td align="center"><?php echo $value_part_time; ?></td>
                    </tr>
                    <?php $j++; $i++; }}?>
                    </table>
                </td>
            </tr>
            <tr>
            <td colspan="2">
                    <table width="100%">
                        <tr>
                            <td width="200px" height="1px">
                                <table width="100%" border="0" align="left">
                                    <tr>
                                        <td width="1" class="text-nowrap border-0 padding-0">มาปฏิบัติงาน จำนวน</td>
                                        <td class="border-0 padding-0 text-center">
                                        &nbsp;<?php //echo $total;?>
                                            <div class="line-bottom-dashed"></div>
                                        </td>
                                        <td width="1" class="text-nowrap border-0 padding-0">วัน</td>

                                        <td width="1" class="text-nowrap border-0 padding-0 text-indent-50">ไม่มาปฏิบัติ จำนวน</td>
                                        <td class="border-0 padding-0 text-center">
                                        &nbsp;<?php //echo  convert($x);?>
                                            <div class="line-bottom-dashed"></div>
                                        </td>
                                        <td width="1" class="text-nowrap border-0 padding-0">วัน</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
            <tr>
                <td class="statement-header" align="center">&nbsp;
                </td>
            </tr>
            <tr>
                <td class="statement-header" align="center">
                    ขอรับรองว่าผลการปฏิบัติงานตามที่ได้บันทึก และรายงานเป็นความจริงทุกประการ
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table width="100%">
                        <tr>
                            <td width="200px" height="1px">
                                <table border="0" width="100%" class="statement-view text-gray-900">
                                    <tr>
                                        <td width="1" class="text-nowrap border-0 padding-0">ลงชื่อ</td>
                                        <td class="border-0 padding-0 text-center">
                                            <?php echo $prefix; ?><?php echo $firtname; ?>&nbsp;&nbsp;<?php echo $lastname; ?>
                                            <div class="line-bottom-dashed">&nbsp;</div>
                                        </td>
                                        <td width="10" class="text-nowrap border-0 padding-0">ผู้บันทึก</td>
                                        <td></td>
                                        <td width="10" class="text-nowrap border-0 padding-0">ลงชื่อ</td>
                                        <td class="border-0 padding-0 text-center">
                                            <?php echo $t_firstname; ?>&nbsp;&nbsp;<?php echo $t_lastname; ?>
                                            <div class="line-bottom-dashed"></div>
                                        </td>
                                        <td width="1" class="text-nowrap border-0 padding-0">ผู้ควบคุม</td>
                                    </tr>
                                    <tr>
                                        <td class="border-0 padding-0" align="right">(</td>
                                        <td align="center" class="border-0 padding-0">
                                            <?php echo $prefix; ?><?php echo $firtname; ?>&nbsp;&nbsp;<?php echo $lastname; ?>
                                        </td>
                                        <td class="border-0 padding-0" align="left">)</td>
                                        <td></td>
                                        <td class="border-0 padding-0" align="right">(</td>
                                        <td align="center" class="border-0 padding-0">
                                            <?php echo $t_firstname; ?>&nbsp;&nbsp;<?php echo $t_lastname; ?>
                                        </td>
                                        <td class="border-0 padding-0" align="left">)</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>

    <ul class="right-menu">
        <li>
            <a href="#" onclick="window.print();">
                <span class="fa-stack hightlight fa-2x">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-print fa-stack-1x fa-inverse"></i>
                </span>
                พิมพ์รายงาน
            </a>
        </li>
        <li>
            <a href="#" onclick="location.reload();">
                <span class="fa-stack fa-2x">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-refresh fa-stack-1x fa-inverse"></i>
                </span>
                Refresh
            </a>
        </li>
        <li>
            <a href="#" onclick="window.close();">
                <span class="fa-stack fa-2x">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-times fa-stack-1x fa-inverse"></i>
                </span>
                ปิดหน้าจอนี้
            </a>
        </li>
    </ul>

    <script src="<?php //echo site_common_node_modules_url('jquery/dist/jquery.min.js');?>"></script>
</body>

</html>
