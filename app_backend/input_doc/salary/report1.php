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

    <!-- แบมะ -->
    <link href="<?php echo ROOT_PROJECT_FRONTEND; ?>/css/bootstrap_plugin.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo ROOT_PROJECT_FRONTEND; ?>/css/report.css" rel="stylesheet">
    <link href="<?php echo ROOT_PROJECT_FRONTEND; ?>/assets/node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- แบมะ -->

    <!-- You can change the theme colors from here -->
    <link href="<?php echo ROOT_PROJECT_FRONTEND; ?>/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<?php
     $doc_id = $_GET['id'];
     $sql_salary = "SELECT * FROM tb_salary WHERE doc_id = '".$doc_id."' ";
     $query_salary = mysqli_query($conn,$sql_salary);
     $result_salary = mysqli_fetch_assoc($query_salary);

     $doc_id = $result_salary['doc_id'];
     $person_id = $result_salary['person_id'];
     
     $day_work = unserialize($result_salary['day_work']);
     $start_time = unserialize($result_salary['start_time']);
     $end_time = unserialize($result_salary['end_time']);
     $Job = unserialize($result_salary['Job']);
     $part_time = unserialize($result_salary['part_time']);
     $date_current = $result_salary['date_current'];
     // $day_work = $result_salary['day_work'];
     // $start_time = $result_salary['start_time'];
     // $end_time = $result_salary['end_time'];
     // $Job = $result_salary['Job'];
     // $part_time = $result_salary['part_time'];

     $sql ="SELECT * FROM tb_contract WHERE person_id = '".$person_id."'";
     $query = mysqli_query($conn,$sql);
     $num_rows = mysqli_num_rows($query);
     while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
     {
         //$doc_id = $row['doc_id'];
         $foreword = unserialize($row['foreword']);
         $str_date = $row['str_date'];
         $stp_date = $row['stp_date'];
         $project_id = $row['project_id'];
         $activity_id = $row['activity_id'];
         $person_id = $row['person_id'];
         $teacher_id = $row['teacher_id'];
         $number = $row['number'];
         $money = $row['money'];
         $work = $row['work'];
         $date_work = $row['date_work'];
         $government = $row['government'];
         $that = $row['that'];
         $c_day = $row['c_day'];
         $title_id = $row['title_id'];
         $people = $row['people'];
         $mid_price = $row['mid_price'];
         $details = $row['details'];
         $date_start  = $row['date_start'];
         $date_end = $row['date_end'];
         $property = unserialize($row['property']);
         $scope = unserialize($row["scope"]);
         $responsible = $row['responsible'];
         $fine = unserialize($row["fine"]);
         $payment = unserialize( $row["payment"] );
         $insurance = unserialize( $row["insurance"] );
     }


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


     $strDate = explode("-", "$stp_date");//วันปัจจุบัน

     $str_day = $strDate[2];
     $str_month = $strDate[1];
     $str_year = $strDate[0];

     $year=date("$str_year")+543;

     $message = "$year";
     $numthai = array("๑","๒","๓","๔","๕","๖","๗","๘","๙","๐");
     $numarabic = array("1","2","3","4","5","6","7","8","9","0");

     //$test = str_replace($numthai,$numarabic,$message);
     $year_thai = str_replace($numarabic,$numthai,$message);
     //echo $year_thai;

     $message = "$str_day";
     $numthai = array("๑","๒","๓","๔","๕","๖","๗","๘","๙","๐");
     $numarabic = array("1","2","3","4","5","6","7","8","9","0");


     //$test = str_replace($numthai,$numarabic,$message);
     $day_thai = str_replace($numarabic,$numthai,$message);
     //echo $day_thai;

     if($str_month == "01"){
     $month_thai = "มกราคม";
     }else if($str_month == "02"){
     $month_thai = "กุมภาพันธ์";
     }else if($str_month == "03"){
     $month_thai = "มีนาคม";
     }else if($str_month == "04"){
     $month_thai = "เมษายน";
     }else if($str_month == "05"){
     $month_thai = "พฤษภาคม";
     }else if($str_month == "06"){
     $month_thai = "มิถุนายน";
     }else if($str_month == "07"){
     $month_thai = "กรกฎาคม";
     }else if($str_month == "08"){
     $month_thai = "สิงหาคม";
     }else if($str_month == "09"){
     $month_thai = "กันยายน";
     }else if($str_month == "10"){
     $month_thai = "ตุลาคม";
     }else if($str_month == "11"){
     $month_thai = "พฤศจิกายน";
     }else if($str_month == "12"){
     $month_thai = "ธันวาคม";
     }



?>

<body id="<?php //echo $body['name'];?>">
<div class="page">
        <table border="0" align="center" width="100%" class="statement-view text-gray-900">
            <tr>
            </tr>
            <tr>
                <td width="50%" class="statement-header" align="center">
                    <br>
                </td>
                <td width="50%" class="statement-header" align="left">
                    <table border="0" width="100%" class="statement-view text-gray-900">
                        <tr width="100%">
                            <td width=""></td>
                            <td width="1" class="text-nowrap border-0 padding-0">สถาบันพัฒนาครูและบุคลากร <br>ทางการศึกษาชายแดนใต้ <br>มหาวิทยาลัมหาวิทยาลัยราชภัฏยะลา</td>
                        </tr>
                    </table>
                    <br>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <table border="0" width="100%" class="statement-view text-gray-900">
                        <td width="50%" class="statement-header" align="center">

                            <br>
                        </td>
                        <td width="50%" class="statement-header" align="left">
                            วันที่ <?php echo $day_thai?>&nbsp;<?php echo $month_thai?>&nbsp;<?php echo $year_thai?>
                            <br>
                        </td>
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    เรื่อง ส่งมอบงานจ้าง
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    เรียน อธิการบดีมหาวิทยาลัมหาวิทยาลัยราชภัฏยะลา
                </td>
            </tr>
            <?php
                    $strDate = explode("-", "$str_date");//วันเริ่ม

                    $str_day = $strDate[2];
                    $str_month = $strDate[1];
                    $str_year = $strDate[0];

                    $year=date("$str_year")+543;

                    $message = "$year";
                    $numthai = array("๑","๒","๓","๔","๕","๖","๗","๘","๙","๐");
                    $numarabic = array("1","2","3","4","5","6","7","8","9","0");

                    //$test = str_replace($numthai,$numarabic,$message);
                    $year_thaiS = str_replace($numarabic,$numthai,$message);
                    //echo $year_thai;

                    $message = "$str_day";
                    $numthai = array("๑","๒","๓","๔","๕","๖","๗","๘","๙","๐");
                    $numarabic = array("1","2","3","4","5","6","7","8","9","0");


                    //$test = str_replace($numthai,$numarabic,$message);
                    $day_thaiS = str_replace($numarabic,$numthai,$message);
                    //echo $day_thai;

                    if($str_month == "01"){
                    $month_thaiS = "มกราคม";
                    }else if($str_month == "02"){
                    $month_thaiS = "กุมภาพันธ์";
                    }else if($str_month == "03"){
                    $month_thaiS = "มีนาคม";
                    }else if($str_month == "04"){
                    $month_thaiS = "เมษายน";
                    }else if($str_month == "05"){
                    $month_thaiS = "พฤษภาคม";
                    }else if($str_month == "06"){
                    $month_thaiS = "มิถุนายน";
                    }else if($str_month == "07"){
                    $month_thaiS = "กรกฎาคม";
                    }else if($str_month == "08"){
                    $month_thaiS = "สิงหาคม";
                    }else if($str_month == "09"){
                    $month_thaiS = "กันยายน";
                    }else if($str_month == "10"){
                    $month_thaiS = "ตุลาคม";
                    }else if($str_month == "11"){
                    $month_thaiS = "พฤศจิกายน";
                    }else if($str_month == "12"){
                    $month_thaiS = "ธันวาคม";
                    }

                    $strDate = explode("-", "$stp_date");//วันที่จบ

                    $str_day = $strDate[2];
                    $str_month = $strDate[1];
                    $str_year = $strDate[0];

                    $year=date("$str_year")+543;

                    $message = "$year";
                    $numthai = array("๑","๒","๓","๔","๕","๖","๗","๘","๙","๐");
                    $numarabic = array("1","2","3","4","5","6","7","8","9","0");

                    //$test = str_replace($numthai,$numarabic,$message);
                    $year_thaiE = str_replace($numarabic,$numthai,$message);
                    //echo $year_thai;

                    $message = "$str_day";
                    $numthai = array("๑","๒","๓","๔","๕","๖","๗","๘","๙","๐");
                    $numarabic = array("1","2","3","4","5","6","7","8","9","0");


                    //$test = str_replace($numthai,$numarabic,$message);
                    $day_thaiE = str_replace($numarabic,$numthai,$message);
                    //echo $day_thai;

                    if($str_month == "01"){
                    $month_thaiE = "มกราคม";
                    }else if($str_month == "02"){
                    $month_thaiE = "กุมภาพันธ์";
                    }else if($str_month == "03"){
                    $month_thaiE = "มีนาคม";
                    }else if($str_month == "04"){
                    $month_thaiE = "เมษายน";
                    }else if($str_month == "05"){
                    $month_thaiE = "พฤษภาคม";
                    }else if($str_month == "06"){
                    $month_thaiE = "มิถุนายน";
                    }else if($str_month == "07"){
                    $month_thaiE = "กรกฎาคม";
                    }else if($str_month == "08"){
                    $month_thaiE = "สิงหาคม";
                    }else if($str_month == "09"){
                    $month_thaiE = "กันยายน";
                    }else if($str_month == "10"){
                    $month_thaiE = "ตุลาคม";
                    }else if($str_month == "11"){
                    $month_thaiE = "พฤศจิกายน";
                    }else if($str_month == "12"){
                    $month_thaiE = "ธันวาคม";
                    }

                    $message = "$money";
                    $numthai = array("๑","๒","๓","๔","๕","๖","๗","๘","๙","๐");
                    $numarabic = array("1","2","3","4","5","6","7","8","9","0");

                    //$test = str_replace($numthai,$numarabic,$message);
                    $money1 = str_replace($numarabic,$numthai,$message);

                    $total_amount = $money * 12;

                    $message = "$total_amount";
                    $numthai = array("๑","๒","๓","๔","๕","๖","๗","๘","๙","๐");
                    $numarabic = array("1","2","3","4","5","6","7","8","9","0");

                    //$test = str_replace($numthai,$numarabic,$message);
                    $total_amount1 = str_replace($numarabic,$numthai,$message);

                    function convert($total_amount){
                        $txtnum1 = array('ศูนย์','หนึ่ง','สอง','สาม','สี่','ห้า','หก','เจ็ด','แปด','เก้า','สิบ');
                        $txtnum2 = array('','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน');
                        $total_amount = str_replace(",","",$total_amount);
                        $total_amount = str_replace(" ","",$total_amount);
                        $total_amount = str_replace("บาท","",$total_amount);
                        $total_amount = explode(".",$total_amount);
                        if(sizeof($total_amount)>2){
                            return 'ทศนิยมหลายตัวนะจ๊ะ';
                            exit;
                        }
                        $strlen = strlen($total_amount[0]);
                        $convert = '';
                        for($i=0;$i<$strlen;$i++){
                            $n = substr($total_amount[0], $i,1);
                            if($n!=0){
                                if($i==($strlen-1) AND $n==1){ $convert .= 'เอ็ด'; }
                                elseif($i==($strlen-2) AND $n==2){  $convert .= 'ยี่'; }
                                elseif($i==($strlen-2) AND $n==1){ $convert .= ''; }
                                else{ $convert .= $txtnum1[$n]; }
                                $convert .= $txtnum2[$strlen-$i-1];
                            }
                        }

                        $convert .= 'บาทถ้วน';

                        return $convert;
                        }
                        $x = $total_amount;
            ?>
            <tr>
                <td colspan="2" class="text-indent-50" align="left">
                    ตามที่ สถาบันพัฒนาครูและบุคลากรทางการศึกษาชายแดนใต้ มหาวิทยาลัยราชภัฏยะลา <br>ได้จ้างให้ข้าพเจ้าเป็นเจ้าหน้าที่ประจำโครงการ "<?php echo $project_name?>" ตั้งแต่ <?php echo $day_thaiS?>&nbsp;<?php echo $month_thaiS?>&nbsp;<?php echo $year_thaiS?> ถึง <?php echo $day_thaiE?>&nbsp;<?php echo $month_thaiE?>&nbsp;<?php echo $year_thaiE?> งวดล่ะ <?php echo $money1?> รวมเป็นเงินทั้งสิ้น <?php echo $total_amount1?> บาท<br>(<?php echo  convert($x);?>) นั้น
                </td>
            </tr>
            <?php
                    // $strDate = explode("-", "$month");//วันที่จบ

                    // $str_day = $strDate[2];
                    // $str_month = $strDate[1];
                    // $str_year = $strDate[0];

                    // $year=date("$str_year")+543;

                    // $message = "$year";
                    // $numthai = array("๑","๒","๓","๔","๕","๖","๗","๘","๙","๐");
                    // $numarabic = array("1","2","3","4","5","6","7","8","9","0");

                    // //$test = str_replace($numthai,$numarabic,$message);
                    // $year_thaiM = str_replace($numarabic,$numthai,$message);


                    // if($str_month == "01"){
                    // $month_thaiM = "มกราคม";
                    // }else if($str_month == "02"){
                    // $month_thaiM = "กุมภาพันธ์";
                    // }else if($str_month == "03"){
                    // $month_thaiM = "มีนาคม";
                    // }else if($str_month == "04"){
                    // $month_thaiM = "เมษายน";
                    // }else if($str_month == "05"){
                    // $month_thaiM = "พฤษภาคม";
                    // }else if($str_month == "06"){
                    // $month_thaiM = "มิถุนายน";
                    // }else if($str_month == "07"){
                    // $month_thaiM = "กรกฎาคม";
                    // }else if($str_month == "08"){
                    // $month_thaiM = "สิงหาคม";
                    // }else if($str_month == "09"){
                    // $month_thaiM = "กันยายน";
                    // }else if($str_month == "10"){
                    // $month_thaiM = "ตุลาคม";
                    // }else if($str_month == "11"){
                    // $month_thaiM = "พฤศจิกายน";
                    // }else if($str_month == "12"){
                    // $month_thaiM = "ธันวาคม";
                    // }

                    $message = "$number";
                    $numthai = array("๑","๒","๓","๔","๕","๖","๗","๘","๙","๐");
                    $numarabic = array("1","2","3","4","5","6","7","8","9","0");

                    //$test = str_replace($numthai,$numarabic,$message);
                    $number1 = str_replace($numarabic,$numthai,$message);

                    function convertA($money){
                        $txtnum1 = array('ศูนย์','หนึ่ง','สอง','สาม','สี่','ห้า','หก','เจ็ด','แปด','เก้า','สิบ');
                        $txtnum2 = array('','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน');
                        $money = str_replace(",","",$money);
                        $money = str_replace(" ","",$money);
                        $money = str_replace("บาท","",$money);
                        $money = explode(".",$money);
                        if(sizeof($money)>2){
                            return 'ทศนิยมหลายตัวนะจ๊ะ';
                            exit;
                        }
                        $strlen = strlen($money[0]);
                        $convert = '';
                        for($i=0;$i<$strlen;$i++){
                            $n = substr($money[0], $i,1);
                            if($n!=0){
                                if($i==($strlen-1) AND $n==1){ $convert .= 'เอ็ด'; }
                                elseif($i==($strlen-2) AND $n==2){  $convert .= 'ยี่'; }
                                elseif($i==($strlen-2) AND $n==1){ $convert .= ''; }
                                else{ $convert .= $txtnum1[$n]; }
                                $convert .= $txtnum2[$strlen-$i-1];
                            }
                        }

                        $convert .= 'บาทถ้วน';

                        return $convert;
                        }
                        $x = $money;


                        $message = "$date_work";
                        $numthai = array("๑","๒","๓","๔","๕","๖","๗","๘","๙","๐");
                        $numarabic = array("1","2","3","4","5","6","7","8","9","0");
                
                        $date_work1 = str_replace($numarabic,$numthai,$message);
                
                        $message = "$work";//รวมเป็น
                        $numthai = array("๑","๒","๓","๔","๕","๖","๗","๘","๙","๐");
                        $numarabic = array("1","2","3","4","5","6","7","8","9","0");
                
                        //$test = str_replace($numthai,$numarabic,$message);
                        $work1 = str_replace($numarabic,$numthai,$message);
                        //echo $day_thai;
                
                            if($number == "1"){
                            $month = "ตุลาคม";
                            }else if($number == "2"){
                            $month = "พฤศจิกายน";
                            }else if($number == "3"){
                            $month = "ธันวาคม";
                            }else if($number == "4"){
                            $month = "มกราคม";
                            }else if($number == "5"){
                            $month = "กุมภาพันธ์";
                            }else if($number == "6"){
                            $month = "มีนาคม";
                            }else if($number == "7"){
                            $month = "เมษายน";
                            }else if($number == "8"){
                            $month = "พฤษภาคม";
                            }else if($number == "9"){
                            $month = "มิถุนายน";
                            }else if($number == "10"){
                            $month = "กรกฎาคม";
                            }else if($number == "11"){
                            $month = "สิงหาคม";
                            }else if($number == "12"){
                            $month = "กันยายน";
                            }
            ?>
            <tr>
                <td colspan="2" class="text-indent-50" align="left">
                    บัดนี้ ข้าพเจ้าได้ปฏิบัติงานดังกล่าวงวดที่ <?php echo $number1?> (เดือน <?php echo $month?> <?php echo $date_work1?>) เสร็จเรียบร้อยแล้ว
                </td>
            </tr>

            <tr>
                <td colspan="2" class="text-indent-50" align="left">
                    จึงเรียนมาเพื่อโปรดให้คณะกรรมการตรวจรับจ้าง ทำการตรวจรับงานจ้างและขอเบิก-จ่ายค่าจ้างเป็นจำนวนเงิน <?php echo $money1?> บาท(<?php echo  convert($x);?>) ให้กับจ้าพเจ้าต่อไปด้วย
                </td>
            </tr>

            <tr>
                <td colspan="3" class="border-0 padding-0">
                    <table width="100%" border="0">
                        <tr>
                            <td width="100%" class="border-0">
                                <table width="300px" border="0" align="center">
                                    <tr>
                                        <td colspan="3" class="border-0 padding-0" align="center">ขอแสดงความนับถือ</td>
                                    </tr>
                                    <tr>
                                        <td width="1" class="text-nowrap border-0 padding-0">ลงชื่อ</td>
                                        <td class="border-0 padding-0 text-center">
                                           
                                            <div class="line-bottom-dashed">&nbsp;</div>
                                        </td>
                                        <td width="1" class="text-nowrap border-0 padding-0">ผู้รับจ้าง</td>
                                    </tr>
                                    <tr>
                                        <td class="border-0 padding-0" align="right">(</td>
                                        <td align="center" class="border-0 padding-0">
                                            <?php echo $prefix; ?><?php echo $firtname; ?>&nbsp;&nbsp;<?php echo $lastname; ?>
                                        </td>
                                        <td class="border-0 padding-0" align="left">)</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-nowrap border-0 padding-0" align="center">ผู้รับจ้าง</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    บันทึกรับองที่ปฏิบัติงานของผู้ควบคุมงาน
                </td>
            </tr>

            <tr>
                <td colspan="2" class="text-indent-50" align="left">
                    ข้าพเจ้า อาจารย์<?php echo $t_firstname?>&nbsp;<?php echo $t_lastname?> ตำแหน่ง <?php echo $position_name?> เป็นบุคคลที่ควบคุมการปฏิบัติงานของผู้รับจ้าง ผู้ปฏิบัติงานจ้างเหมาบริการ เจ้าหน้าที่ประจำโครงการ "<?php echo $project_name?>" มหาวิทยาลัยราชภัฏยะลา ขอรับรองว่า<?php echo $prefix; ?><?php echo $firtname; ?>&nbsp;&nbsp;<?php echo $lastname; ?> ได้ปฏิบัติงานเรียบร้อยแล้วตั้งแต่วันที่  <?php echo $day_thaiS?>&nbsp;<?php echo $month_thaiS?>&nbsp;<?php echo $year_thaiS?> ถึง <?php echo $day_thaiE?>&nbsp;<?php echo $month_thaiE?>&nbsp;<?php echo $year_thaiE?>
                </td>
            </tr>

            <tr>
                <td colspan="3" class="border-0 padding-0" align="right">
                    <table width="100%" border="0">
                        <tr>
                            <td width="100%" class="border-0">
                                <table width="300px" border="0" align="right">
                                    <tr>
                                        <td width="1" class="text-nowrap border-0 padding-0">ลงชื่อ</td>
                                        <td class="border-0 padding-0 text-center">
                                            
                                            <div class="line-bottom-dashed">&nbsp;</div>
                                        </td>
                                        <td width="1" class="text-nowrap border-0 padding-0"></td>
                                    </tr>
                                    <tr>
                                        <td class="border-0 padding-0" align="right">(</td>
                                        <td align="center" class="border-0 padding-0 text-center">
                                            <?php echo $t_firstname; ?>&nbsp;&nbsp;<?php echo $t_lastname; ?>
                                        </td>
                                        <td class="border-0 padding-0" align="right">)</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="border-0 padding-0 text-center" align="center">ผู้ควบคุมการปฏิบัติงาน</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>

    <?php
        include '../salary/report2.php';
        include '../salary/report3.php';
    ?>



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
            <a href="http://localhost/project_student/app_backend/input_doc/salary/show.php?id=<?=$doc_id?>">
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
