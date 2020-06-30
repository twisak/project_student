<!-- <?php session_start();
if($_SESSION['status'] == 'admin')
{
}
elseif($_SESSION['status'] == 'staff')
{
}
else
{
    echo "<script>";
    echo "alert(\"คุณไม่มีสิทธิ์เข้าสู่ระบบ\");";
    echo "</script>";
    echo "<meta http-equiv='refresh' content='0;url=../../administrator/logout.php'>";
}
?> -->
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
    <title>AdminWrap - Easy to Customize Bootstrap 4 Admin Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/report.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="../css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<head>
    <meta charset="utf-8">
<title>css print report table continue</title>
<style type="text/css">
* {
    margin:0;
    padding:0;
    font-family:Arial, "times New Roman", tahoma;
    font-size:12px;
}
html {
    font-family:Arial, "times New Roman", tahoma;
    font-size:12px;
    color:#000000;
}
body {
    font-family:Arial, "times New Roman", tahoma;
    font-size:12px;
    padding:0;
    margin:0;
    color:#000000;
}
.headTitle {
    font-size:12px;
    font-weight:bold;
    text-transform:uppercase;
}
.headerTitle01 {
    border:1px solid #333333;
    border-left:2px solid #000;
    border-bottom-width:2px;
    border-top-width:2px;
    font-size:11px;
}
.headerTitle01_r {
    border:1px solid #333333;
    border-left:2px solid #000;
    border-right:2px solid #000;
    border-bottom-width:2px;
    border-top-width:2px;
    font-size:11px;
}
/* สำหรับช่องกรอกข้อมูล  */
.box_data1 {
    font-family:Arial, "times New Roman", tahoma;
    height:18px;
    border:0px dotted #333333;
    border-bottom-width:1px;
}
/* กำหนดเส้นบรรทัดซ้าย  และด้านล่าง */
.left_bottom {
    border-left:2px solid #000;
    border-bottom:1px solid #000;
}
/* กำหนดเส้นบรรทัดซ้าย ขวา และด้านล่าง */
.left_right_bottom {
    border-left:2px solid #000;
    border-bottom:1px solid #000;
    border-right:2px solid #000;
}
/* สร้างช่องสี่เหลี่ยมสำหรับเช็คเลือก */
.chk_box {
    display:block;
    width:10px;
    height:10px;
    overflow:hidden;
    border:1px solid #000;
}
/* css ส่วนสำหรับการแบ่งหน้าข้อมูลสำหรับการพิมพ์ */
@media all
{
    .page-break { display:none; }
    .page-break-no{ display:none; }
}
@media print
{
    .page-break { display:block;height:1px; page-break-before:always; }
    .page-break-no{ display:block;height:1px; page-break-after:avoid; }
}
</style>
</head>
</head>
<?php

     include '../../administrator/connect.php';
     $id = $_GET['id'];

     $sql_salary = "SELECT * FROM tb_salary WHERE id = '".$id."' ";
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
     $day_work = $result_salary['day_work'];
     $start_time = $result_salary['start_time'];
     $end_time = $result_salary['end_time'];
     $Job = $result_salary['Job'];
     $part_time = $result_salary['part_time'];

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
        <table border="0" align="center" width="100%" class="statement-view text-gray-900">
            <tr>
            </tr>
            <tr>
                <td width="100%"  class="statement-header">
                    <table border="0" width="100%" class="statement-view text-gray-900" align="center">
                      <tr>
                        <td align="center">ใบสำคัญรับเงิน</td>
                      </tr>
                    </table>
                    <br>
                </td>
            </tr>

            <tr>
                <td width="100%"  class="statement-header">
                    <table border="0" width="100%" class="statement-view text-gray-900">
                      <tr>
                        <td width="50%"></td>
                        <td width="50%">วันที่ 30 เดือน กันยายน พ.ศ. 2562</td>
                      </tr>
                      <tr>
                        <td colspan="2">ข้าพเจ้า.........................บ้านเลขที่.................หมู่ที่.................</td>
                      </tr>
                      <tr>
                        <td colspan="2">ถนน.................ตำบล.................อำเภอ...............จังหวัด.......................</td>
                      </tr>
                      <tr>
                        <td colspan="2">ได้รับเงินจาก ............................... ดังรายละเอียดต่อไปนี้</td>
                      </tr>
                    </table>
                    <br>
                </td>
            </tr>

            <tr>
                <td width="100%"  class="statement-header">
                    <table border="1" width="100%" class="statement-view text-gray-900">

                      <tr>
                        <td rowspan="2" align="center">รายการ</td>
                        <td colspan="2" align="center">ลำดับ</td>

                      </tr>

                      <tr>

                        <td></td>
                        <td align="center">สต.</td>
                      </tr>

                      <tr>
                        <td>- ค่าจ้างเหมาบริการเจ้าหน้าที่ประสานงานโครงการฯ โครงการ "พัฒนาครูและบุคลากรทางการศึกษาเพื่อลดความเหลื่อมล้ำจากผลกระทบของเหตุการณ์ความไม่สงบในพื้นที่ชายแดนใต้" งวดที่ 12 ประจำเดือน กันยายน 2562</td>
                        <td>15,000</td>
                        <td>-</td>
                      </tr>

                      <tr>
                        <td>รวมเงิน (ตัวอักษร) เป็นเงินหนึ่งหมื่นห้าพันบาทถ้วน</td>
                        <td>15,000</td>
                        <td>-</td>
                      </tr>

                    </table>
                    <br>
                </td>
            </tr>

            <tr>
                <td width="100%"  class="statement-header">
                    <table border="0" width="100%" class="statement-view text-gray-900">

<tr align="center">
  <td>ลง..................ผู้รับเงิน</td>
</tr>
<tr align="center">
  <td>(นางสาวปาตีเมาะห์ สาและ)</td>
</tr>

                    </table>
                    <br>
                </td>
            </tr>

            <tr>
                <td width="100%"  class="statement-header">
                    <table border="0" width="100%" class="statement-view text-gray-900">

<tr align="center">
  <td>ลง..................ผู้จ่ายเงิน</td>
</tr>
<tr align="center">
  <td>(....................................)</td>
</tr>

                    </table>
                    <br>
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
