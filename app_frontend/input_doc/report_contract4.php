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
</head>
<?php

     include '../../administrator/connect.php';
     $doc_id =$_GET['id'];
     $sql ="SELECT * FROM tb_contract WHERE doc_id = '".$doc_id."'";
     $query = mysqli_query($conn,$sql);
     while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
     {
         $doc_id = $row['doc_id'];
         $foreword = $row['foreword'];
         $str_date = $row['str_date'];
         $stp_date = $row['stp_date'];
         $project_id = $row['project_id'];
         $person_id = $row['person_id'];
     }

     $sql1 ="SELECT * FROM tb_project WHERE project_id = '".$project_id."' ";
     $query1 = mysqli_query($conn,$sql1);
     while($row1 = mysqli_fetch_array($query1,MYSQLI_ASSOC))
     {
         $project_name = $row1['project_name'];
         $project_id = $row1['project_id'];
     }

     $sql3 ="SELECT * FROM tb_activity WHERE project_id = '".$project_id."' ";
     $query3 = mysqli_query($conn,$sql3);
     while($row3 = mysqli_fetch_array($query3,MYSQLI_ASSOC))
     {
         $activity = $row3['activity'];
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
<body id="<?php //echo $body['name'];?>">
    <div class="page">
        <table border="0" align="center" width="100%" class="statement-view text-gray-900">
            <tr>
            </tr>
            <tr>
                <td width="100%"  class="statement-header">
                    <table border="0" width="100%" class="statement-view text-gray-900" align="center">
                      <tr>
                        <td align="center">ขอบเขตของงานจ้างเหมาบริการ</td>
                      </tr>
                    </table>
                    <br>
                </td>
            </tr>

            <tr>
                <td width="100%"  class="statement-header">
                    <table border="0" width="100%" class="statement-view text-gray-900">
                      <tr  align="left">
                        <td>รายละเอียดการจ้าง</td>
                      </tr>
                      <tr  align="left">
                        <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;งานจ้างเหมาบริการเจ้าหน้าที่ประจำศูนย์หน่วยวิจัย พัฒนา และให้บริการสื่อและนวัตกรรมทางการศึกษา</td>
                      </tr>
                    </table>
                    <br>
                </td>
            </tr>

            <tr>
                <td width="100%"  class="statement-header">
                    <table border="0" width="100%" class="statement-view text-gray-900">
                      <tr  align="left">
                        <td>ระยะเวลาการจ้าง</td>
                      </tr>
                      <tr  align="left">
                        <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตั้งแต่วันที่ 2 มกราคม 2562 ถึงวันที่ 30 กันยายน 2562</td>
                      </tr>
                    </table>
                    <br>
                </td>
            </tr>

            <tr>
                <td width="100%"  class="statement-header">
                    <table border="0" width="100%" class="statement-view text-gray-900">
                      <tr  align="left">
                        <td>คุณสมบัติของผู้รับจ้าง</td>
                      </tr>
                      <tr  align="left">
                        <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. สัญชาติไทย</td>
                      </tr>
                    </table>
                    <br>
                </td>
            </tr>

            <tr>
                <td width="100%"  class="statement-header">
                    <table border="0" width="100%" class="statement-view text-gray-900">
                      <tr  align="left">
                        <td>ขอบเขตของงานที่จ้าง</td>
                      </tr>
                      <tr  align="left">
                        <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. ให้บริการยืมคืนทรัพยากรสารสนเทศ</td>
                      </tr>
                    </table>
                    <br>
                </td>
            </tr>

            <tr>
                <td width="100%"  class="statement-header">
                    <table border="0" width="100%" class="statement-view text-gray-900">
                      <tr  align="left">
                        <td>ความรับผิดชอบของผู้ว่าจ้าง</td>
                      </tr>
                      <tr  align="left">
                        <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้ว่าจ้างยินยอมให้ผู้รับจ้างใช้วัสดุครุภัณฑ์ของทางราชการได้ตามความจำเป็นและเหมาะสม</td>
                      </tr>
                    </table>
                    <br>
                </td>
            </tr>

            <tr>
                <td width="100%"  class="statement-header">
                    <table border="0" width="100%" class="statement-view text-gray-900">
                      <tr  align="left">
                        <td>ค่าปรับและการหักเงินค่าจ้าง</td>
                      </tr>
                      <tr  align="left">
                        <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.</td>
                      </tr>
                    </table>
                    <br>
                </td>
            </tr>

            <tr>
                <td width="100%"  class="statement-header">
                    <table border="0" width="100%" class="statement-view text-gray-900">
                      <tr  align="left">
                        <td>เงื่อนไขการชำระเงิน</td>
                      </tr>
                      <tr  align="left">
                        <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. </td>
                      </tr>
                    </table>
                    <br>
                </td>
            </tr>

            <tr>
                <td width="100%"  class="statement-header">
                    <table border="0" width="100%" class="statement-view text-gray-900">
                      <tr  align="left">
                        <td>เงื่อนไขหลักประกัน</td>
                      </tr>
                      <tr  align="left">
                        <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. </td>
                      </tr>
                    </table>
                    <br>
                </td>
            </tr>

            <tr>
                <td width="100%"  class="statement-header">
                    <table border="0" width="100%" class="statement-view text-gray-900">
                      <tr  align="left">
                        <td width="50%" ></td>
                        <td width="50%" >
                          <table border="0" width="100%" class="statement-view text-gray-900">
                            <tr  align="center">
                              <td  >ลงชื่อ................ประธานกรรมการ</td>
                            </tr>
                            <tr  align="center">
                              <td  >(อาจารย์ซอและ เกปัน)</td>
                            </tr>
                          </table>
                      </tr>
                    </table>
                    <br>
                </td>
            </tr>

            <tr>
                <td width="100%"  class="statement-header">
                    <table border="0" width="100%" class="statement-view text-gray-900">
                      <tr  align="left">
                        <td width="50%" ></td>
                        <td width="50%" >
                          <table border="0" width="100%" class="statement-view text-gray-900">
                            <tr  align="center">
                              <td  >ลงชื่อ................กรรมการ</td>
                            </tr>
                            <tr  align="center">
                              <td  >(อาจารย์จันจลี ถนอมลิขิตวงศ์)</td>
                            </tr>
                          </table>
                      </tr>
                    </table>
                    <br>
                </td>
            </tr>

            <tr>
                <td width="100%"  class="statement-header">
                    <table border="0" width="100%" class="statement-view text-gray-900">
                      <tr  align="left">
                        <td width="50%" ></td>
                        <td width="50%" >
                          <table border="0" width="100%" class="statement-view text-gray-900">
                            <tr  align="center">
                              <td  >ลงชื่อ................กรรมการและเลขานุกร</td>
                            </tr>
                            <tr  align="center">
                              <td  >(อาจารย์พุมพนิต คงแสง)</td>
                            </tr>
                          </table>
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