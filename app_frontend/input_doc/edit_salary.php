<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php
        include '../../administrator/connect.php';

        $id = $_POST['id'];

        $doc_id = $_POST['doc_id'];
        $str_date = $_POST['str_date'];
        $stp_date = $_POST['stp_date'];
        $project_id = $_POST['project_id'];
        $activity_id = $_POST['activity_id'];
        $person_id = $_POST['person_id'];

        $period = $_POST['period'];
        $total_amount = $_POST['total_amount'];
        $perform = $_POST['perform'];
        $month = $_POST['month'];
        $teacher_id = $_POST['teacher_id'];

        $day_work = serialize($_POST["day_work"]);
        // print_r($day_work);

        $start_time = serialize($_POST["start_time"]);
        $end_time = serialize($_POST["end_time"]);
        $Job = serialize($_POST["Job"]);
        $part_time = serialize($_POST["part_time"]);

        $sql= "UPDATE tb_salary SET   doc_id     = '".$doc_id."',
                                    str_date        = '".$str_date."',
                                    stp_date        = '".$stp_date."',
                                    project_id      = '".$project_id."',
                                    activity_id      = '".$activity_id."',
                                    person_id        = '".$person_id."',

                                    period        = '".$period."',
                                    total_amount        = '".$total_amount."',
                                    perform        = '".$perform."',
                                    month        = '".$month."',
                                    teacher_id        = '".$teacher_id."',
                                    day_work        = '".$day_work."',
                                    start_time        = '".$start_time."',
                                    end_time        = '".$end_time."',
                                    Job        = '".$Job."',
                                    part_time        = '".$part_time."'

                  WHERE id = '".$id."'";
         $db_query = mysqli_query($conn,$sql);
        //  echo $sql;
        //  echo $db_query;
        //  echo "<br>";

        echo "<script>alert('แก้ไขข้อมูลเรียบร้อย')</script>";
        echo "<script>window.location='tb_doc_salary.php'</script>";
    ?>

  </body>
</html>