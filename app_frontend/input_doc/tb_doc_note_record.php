<?php session_start();
if($_SESSION['status'] == 'Admin')
{
}
elseif($_SESSION['status'] == 'Personal')
{
}
else
{
    echo "<script>";
    echo "alert(\"คุณไม่มีสิทธิ์เข้าสู่ระบบ\");";
    echo "</script>";
    echo "<meta http-equiv='refresh' content='0;url=../../administrator/logout.php'>";
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
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>AdminWrap - Easy to Customize Bootstrap 4 Admin Template</title>
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
        <?php include '../menu/menu_admin.php'; ?>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">เอกสารบันทึกข้อความอื่นๆ</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">เอกสารบันทึกข้อความอื่นๆ</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <a href="tb_doc_note_command.php" class="btn btn-warning btn-block">เอกสารคำสั่ง</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <a href="tb_doc_note_record.php" class="btn btn-warning btn-block">เอกสารบันทึกข้อความ</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <a href="tb_doc_note_invite.php" class="btn btn-warning btn-block">เอกสารหนังสือเชิญ/ส่งออก</a>
                                        </div>
                                    </div>
                                </div>

                <div class="row">
                    <div class="col-lg-6 col-xlg-3 col-md-5">
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-body">
                                <h4 class="card-title">เอกสารบันทึกข้อความ/อนุมัติดำเนินการจ้างเหมา</h4>
                                <div class="text-right">
                                    <a href="input_doc_note_record1.php">
                                        <button type="button" class="btn btn-primary">กรอกเอกสารเพิ่ม</button>
                                    </a>
                                </div>

                                <br>
                                  <div class="text-right">
                                    <?php
                                  $strKeyword1 = null;
                                  if(isset($_POST["txtKeyword1"])){
                                    $strKeyword1 = $_POST["txtKeyword1"];
                                  }
                                  if(isset($_GET["txtKeyword1"])){
                                    $strKeyword1 = $_GET["txtKeyword1"];
                                  }
                                    ?>
                                    <form name="frmSearch1" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
                                    <div class="container">
                                      <div class="row">
                                        <div class="col-md-6">
                                        </div>
                                          <div class="col-md-4 col-8">
                                              <input class="form-control" type="text" placeholder="Search..." value="<?php echo $strKeyword1;?>" name="txtKeyword1" id="txtKeyword1">
                                          </div>
                                          <div class="col-md-1 col-2" style="padding-top:4px;">
                                                <button type="submit" class="btn btn-info"  name="btnsearch1">ค้นหา</button>
                                          </div>
                                      </div>
                                    </div>
                                    </form>

                                  </div>

                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">รหัสเอกสาร</th>
                                                <th class="text-center">วันที่</th>
                                                <th class="text-center">เรื่อง</th>
                                                <th class="text-center">รายละเอียดเอกสาร</th>
                                                <th class="text-center">ลบ</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            include '../../administrator/connect.php';
                                            // $username= $_SESSION['username'];
                                            // $sql ="SELECT * FROM account_login WHERE username = '".$username."' ";
                                            // $query = mysqli_query($conn,$sql);
                                            // while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
                                            // {
                                            //     $person_id = $row['person_id'];
                                            // }
                                            $i=1;
                                            $i<="";

                                            $sql ="SELECT tb_note_record1.id , tb_note_record1.doc_id , tb_note_record1.date_current , tb_project.project_name , tb_person.prefix, tb_person.firtname, tb_person.lastname, tb_title.title FROM tb_note_record1
                                            INNER JOIN tb_project ON tb_note_record1.project_id = tb_project.project_id
                                            INNER JOIN tb_person ON tb_note_record1.person_id = tb_person.person_id
                                            INNER JOIN tb_title ON tb_note_record1.title_id = tb_title.title_id
                                            WHERE (tb_note_record1.doc_id LIKE '%".$strKeyword1."%' or tb_project.project_name LIKE '%".$strKeyword1."%' or tb_person.prefix LIKE '%".$strKeyword1."%' or tb_person.firtname LIKE '%".$strKeyword1."%'or tb_person.lastname LIKE '%".$strKeyword1."%' or tb_title.title LIKE '%".$strKeyword1."%' ) ";

                                            // $sql ="SELECT * FROM tb_note_record1";
                                            $query = mysqli_query($conn,$sql);
                                            while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
                                            {
                                            //     $id = $row['id'];
                                            //     $doc_id = $row['doc_id'];
                                            //     $title_id = $row['title_id'];
                                            //     $project_id = $row['project_id'];
                                            //     $person_id = $row['person_id'];
                                            //     $date_current = $row['date_current'];
                                            //
                                            // // echo $doc_id;
                                            // // echo $person_id;
                                            //
                                            // $sql1 ="SELECT * FROM tb_title WHERE title_id = '".$title_id."' ";
                                            // $query1 = mysqli_query($conn,$sql1);
                                            // while($row1 = mysqli_fetch_array($query1,MYSQLI_ASSOC))
                                            // {
                                            //     $title = $row1['title'];
                                            // }
                                            // $sql2 ="SELECT * FROM tb_person WHERE person_id = '".$person_id."' ";
                                            // $query2 = mysqli_query($conn,$sql2);
                                            // while($row2 = mysqli_fetch_array($query2,MYSQLI_ASSOC))
                                            // {
                                            //     $prefix = $row2['prefix'];
                                            //     $firtname = $row2['firtname'];
                                            //     $lastname = $row2['lastname'];
                                            //     //$prefix = $row2['prefix'];
                                            // }
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row['doc_id'];?></td>
                                                <td><?php echo $row['date_current'];?></td>
                                                <td><?php echo $row['title'];?></td>
                                                <td>
                                                    <a href="show_doc_note_record1.php?id=<?php echo $row['id'];?>"><button type="button" class="btn btn-info">รายละเอียด</button></a>
                                                </td>
                                                <td><a href="JavaScript:if(confirm('ยืนยันการลบ ?') == true){window.location='delete_record1.php?id=<?php echo $row["id"];?>';}" class="btn btn-danger">ลบ</a></td>
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
                        <!-- Column -->
                    </div>
                    <div class="col-lg-6 col-xlg-3 col-md-5">
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-body">
                                <h4 class="card-title">เอกสารบันทึกข้อความ/ขอลาออกเจ้าหน้าที่โครงการ</h4>
                                <div class="text-right">
                                    <a href="input_doc_note_record2.php">
                                        <button type="button" class="btn btn-primary">กรอกเอกสารเพิ่ม</button>
                                    </a>
                                </div>

                                <br>
                                  <div class="text-right">
                                    <?php
                                  $strKeyword2 = null;
                                  if(isset($_POST["txtKeyword2"])){
                                    $strKeyword2 = $_POST["txtKeyword2"];
                                  }
                                  if(isset($_GET["txtKeyword2"])){
                                    $strKeyword2 = $_GET["txtKeyword2"];
                                  }
                                    ?>
                                    <form name="frmSearch2" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
                                    <div class="container">
                                      <div class="row">
                                        <div class="col-md-6">
                                        </div>
                                          <div class="col-md-4 col-8">
                                              <input class="form-control" type="text" placeholder="Search..." value="<?php echo $strKeyword2;?>" name="txtKeyword2" id="txtKeyword2">
                                          </div>
                                          <div class="col-md-1 col-2" style="padding-top:4px;">
                                                <button type="submit" class="btn btn-info"  name="btnsearch2">ค้นหา</button>
                                          </div>
                                      </div>
                                    </div>
                                    </form>

                                  </div>




                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">รหัสเอกสาร</th>
                                                <th class="text-center">วันที่</th>
                                                <th class="text-center">เรื่อง</th>
                                                <th class="text-center">รายละเอียดเอกสาร</th>
                                                <th class="text-center">ลบ</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            include '../../administrator/connect.php';
                                            // $username= $_SESSION['username'];
                                            // $sql ="SELECT * FROM account_login WHERE username = '".$username."' ";
                                            // $query = mysqli_query($conn,$sql);
                                            // while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
                                            // {
                                            //     $person_id = $row['person_id'];
                                            // }
                                            $i=1;
                                            $i<="";

                                            $sql ="SELECT tb_note_record2.id , tb_note_record2.doc_id , tb_note_record2.date_current , tb_project.project_name , tb_person.prefix, tb_person.firtname, tb_person.lastname, tb_title.title FROM tb_note_record2
                                            INNER JOIN tb_project ON tb_note_record2.project_id = tb_project.project_id
                                            INNER JOIN tb_person ON tb_note_record2.person_id = tb_person.person_id
                                            INNER JOIN tb_title ON tb_note_record2.title_id = tb_title.title_id
                                            WHERE (tb_note_record2.doc_id LIKE '%".$strKeyword2."%' or tb_project.project_name LIKE '%".$strKeyword2."%' or tb_person.prefix LIKE '%".$strKeyword2."%' or tb_person.firtname LIKE '%".$strKeyword2."%'or tb_person.lastname LIKE '%".$strKeyword2."%' or tb_title.title LIKE '%".$strKeyword2."%' ) ";


                                            // $sql ="SELECT * FROM tb_note_record2";
                                            $query = mysqli_query($conn,$sql);
                                            while($row1 = mysqli_fetch_array($query,MYSQLI_ASSOC))
                                            {
                                            //     $id = $row['id'];
                                            //     $doc_id = $row['doc_id'];
                                            //     $title_id = $row['title_id'];
                                            //     $project_id = $row['project_id'];
                                            //     $person_id = $row['person_id'];
                                            //     $date_current = $row['date_current'];
                                            //
                                            // // echo $doc_id;
                                            // // echo $person_id;
                                            //
                                            // $sql1 ="SELECT * FROM tb_title WHERE title_id = '".$title_id."' ";
                                            // $query1 = mysqli_query($conn,$sql1);
                                            // while($row1 = mysqli_fetch_array($query1,MYSQLI_ASSOC))
                                            // {
                                            //     $title = $row1['title'];
                                            // }
                                            // $sql2 ="SELECT * FROM tb_person WHERE person_id = '".$person_id."' ";
                                            // $query2 = mysqli_query($conn,$sql2);
                                            // while($row2 = mysqli_fetch_array($query2,MYSQLI_ASSOC))
                                            // {
                                            //     $prefix = $row2['prefix'];
                                            //     $firtname = $row2['firtname'];
                                            //     $lastname = $row2['lastname'];
                                            //     //$prefix = $row2['prefix'];
                                            // }
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row1['doc_id'];?></td>
                                                <td><?php echo $row1['date_current'];?></td>
                                                <td><?php echo $row1['title'];?></td>
                                                <td>
                                                    <a href="show_doc_note_record2.php?id=<?php echo $row1['id'];?>"><button type="button" class="btn btn-info">รายละเอียด</button></a>
                                                </td>
                                                <td><a href="JavaScript:if(confirm('ยืนยันการลบ ?') == true){window.location='delete_record2.php?id=<?php echo $row1["id"];?>';}" class="btn btn-danger">ลบ</a></td>
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
                        <!-- Column -->
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
</body>

</html>
