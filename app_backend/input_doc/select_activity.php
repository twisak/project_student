<?php 
    include '../../administrator/connect.php';
    $project_id = isset($_POST['project']) ? $_POST['project'] : "";

    $sql = "SELECT * FROM tb_activity WHERE project_id ='{$project_id}'";
    $query = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($query);
    if ($rows > 0) {
        while ($result = mysqli_fetch_array($query)) {
            echo "<option value=\"" . $result['activity_id'] . "\">" . $result['activity'] . "</option>";
        }
    }else{
        echo "<option value=\"\">ไม่มีกิจกรมในหมวดหมู่ที่เลือก</option>";
    }
?>