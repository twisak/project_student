<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php
        include '../../administrator/connect.php';

        $id = $_GET['id'];

        $sql_tb_debt = "DELETE FROM tb_note_book2 WHERE id = '$id'";

        $db_query_debt = mysqli_query($conn,$sql_tb_debt);

        // echo "<script>alert('ลบข้อมูลเรียบร้อย')</script>";
        echo "<script>window.location='tb_doc_note_invite.php'</script>";
    ?>

  </body>
</html>
