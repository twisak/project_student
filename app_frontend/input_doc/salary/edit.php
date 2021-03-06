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
    <?php

    include '../../menu/menu_admin.php';

    $doc_id = $_GET['id'];

    $sql_salary = "SELECT * FROM tb_salary WHERE doc_id = '".$doc_id."' ";
    $query_salary = mysqli_query($conn,$sql_salary);
    $result_salary = mysqli_fetch_assoc($query_salary);

    $doc_id = $result_salary['doc_id'];
    $person_id = $result_salary['person_id'];
    

    $day_work = unserialize( $result_salary["day_work"] );
    $start_time = unserialize( $result_salary["start_time"] );
    $end_time = unserialize( $result_salary["end_time"] );
    $Job = unserialize( $result_salary["Job"] );
    $part_time = unserialize( $result_salary["part_time"] );

    $sql_person = "SELECT * FROM tb_person WHERE person_id = '".$person_id."' ";
    $query_person = mysqli_query($conn,$sql_person);
    $result_person = mysqli_fetch_assoc($query_person);

    $prefix = $result_person['prefix'];
    $firtname = $result_person['firtname'];
    $lastname = $result_person['lastname'];



    ?>
    <div id="main-wrapper">
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">เอกสารเงินเดือน</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">เอกสารเงินเดือน</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-body">
                                <form class="form-horizontal form-material" action="../salary/edit_action.php" method="post">
                                  <!-- <input type="hidden" name="id" value="<?=$id?>" /> -->
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><b>รหัสเอกสารเงินเดือน</b></label>
                                                <input type="text" value="<?php echo $doc_id; ?>" readonly class="form-control form-control-line">
                                                <input type="hidden" class="form-control" name="doc_id" value="<?php echo $doc_id?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                               <label><b>ชื่อบุคลากร</b></label>
                                                <input type="text" value="<?php echo $prefix?><?php echo $firtname?>&nbsp;&nbsp;<?php echo $lastname?>" class="form-control form-control-line">
                                                <input type="hidden" class="form-control" name="person_id" value="<?php echo $person_id?>">
                                            </div>
                                        </div>
                                    </div>

                                   

                                    <div class="row">
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label><b>รายการงานในหน้าที่</b></label>
                                    </div>
                                    </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-7"><div class="form-group"><button type="button" class="btn btn-info" id="createRows" value="Add">เพิ่มหัวข้อย่อย</button>&nbsp;&nbsp;<button type="button" class="btn btn-warning" id="deleteRows" value="Del">ลบหัวข้อย่อย</button>&nbsp;&nbsp;<button type="button" class="btn btn-danger" id="clearRows" value="Clear">ลบทั้งหมด</button></div></div>
                                    </div>

                                    <table width="100%" border="0" id="myTable">

                                    <thead>


                                      <div class='row'>
                                      <div class='col-md-4'>
                                              <div class='form-group'>
                                       <?php
                                              $start_time1 = array($start_time);
                                              foreach ($start_time1 as $start_time1){
                                                $j=0;

                                                foreach ($start_time1 as $start_time1[$j]){
                                                    $value_start_time1 = $start_time1[$j];
                                                    $j++;
                                                }

                                            }

                                            $end_time1 = array($end_time);
                                            foreach ($end_time1 as $end_time1){
                                              $j=0;

                                              foreach ($end_time1 as $end_time1[$j]){
                                                  $value_end_time1 = $end_time1[$j];
                                                  $j++;
                                              }
                                          }

                                          $Job1 = array($Job);
                                          foreach ($Job1 as $Job1){
                                            $j=0;

                                            foreach ($Job1 as $Job1[$j]){
                                                $value_Job1 = $Job1[$j];
                                                $j++;
                                            }
                                        }

                                        $part_time1 = array($part_time);
                                        foreach ($part_time1 as $part_time1){
                                          $j=0;

                                          foreach ($part_time1 as $part_time1[$j]){
                                              $value_part_time1 = $part_time1[$j];
                                              $j++;
                                          }
                                      }

                                              $day_work1 = array($day_work);

                                                foreach ($day_work1 as $day_work1){
                                                  $j=0;

                                                  foreach ($day_work1 as $day_work1[$j]){
                                                      $value_day_work1 = $day_work1[$j];
                                                      $value_start_time1 = $start_time1[$j];
                                                      $value_end_time1 = $end_time1[$j];
                                                      $value_Job1 = $Job1[$j];
                                                      $value_part_time1 = $part_time[$j];
                                                      echo "<tr><td><div class='row'><div class='col-md-2'><div class='form-group'><label>วัน/เดือน/ปี</label><input type='date' class='form-control p_input' value='$value_day_work1' name='day_work[]'></div></div><div class='col-md-2'><div class='form-group'><label>เริ่มเวลา</label><input type='time' class='form-control p_input' value='$value_start_time1'  name='start_time[]'></div></div><div class='col-md-2'><div class='form-group'><label>เวลาสิ้นสุด</label><input type='time' class='form-control p_input' value='$value_end_time1'  name='end_time[]'></div></div><div class='col-md-6'><div class='form-group'><label>งานในหน้าที่</label><input type='text' class='form-control p_input' value='$value_Job1'  name='Job[]'></div></div><div class='col-md-6'><div class='form-group'><label>งานพิเศษ</label><input type='text' class='form-control p_input' value='$value_part_time1'  name='part_time[]'></div></div></div></td></tr>";
                                                      //echo "<li>{$value}</li>";
                                                      $j++;
                                                  }


                                              }

                                      ?>
                                      </div>
                                          </div>


                                    </thead>

                                    <tbody></tbody>
                                    </table>


                                    <br/>
                                    <center>
                                    <br>
                                    <input type="hidden" id="hdnCount" name="hdnCount">
                                    </center>


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
                            url: 'select_activity.php',
                            success: function (data) {
                                $('#activity').html(data);
                            }
                        });
                        return false;
                    });
                });
            </script>
            <!-- listbox 2 ชั้น -->
            <script type="text/javascript">
$(document).ready(function(){

    var rows = 1;
    $("#createRows").click(function(){


        var tr = "<tr>";
tr = tr + "<td><div class='row'><div class='col-md-2'><div class='form-group'><label>วัน/เดือน/ปี</label><input type='date' class='form-control p_input' name='day_work"+rows+"'></div></div><div class='col-md-2'><div class='form-group'><label>เริ่มเวลา</label><input type='time' class='form-control p_input'  name='start_time"+rows+"'></div></div><div class='col-md-2'><div class='form-group'><label>เวลาสิ้นสุด</label><input type='time' class='form-control p_input'  name='end_time"+rows+"'></div></div><div class='col-md-6'><div class='form-group'><label>งานในหน้าที่</label><input type='text' class='form-control p_input'  name='Job"+rows+"'></div></div><div class='col-md-6'><div class='form-group'><label>งานพิเศษ</label><input type='text' class='form-control p_input'  name='part_time"+rows+"'></div></div>                           </div></td>";
        tr = tr + "</tr>";
        $('#myTable > tbody:last').append(tr);

        $('#hdnCount').val(rows);
        rows = rows + 1;
    });

    $("#deleteRows").click(function(){
        if ($("#myTable tr").length != 1) {
            $("#myTable tr:last").remove();
        }
    });

    $("#clearRows").click(function(){
        rows = 1;
        $('#hdnCount').val(rows);
        $('#myTable > tbody:last').empty(); // remove all
    });

});
</script>
</body>

</html>
