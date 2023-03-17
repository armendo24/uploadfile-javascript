<?php
require("conn.php");
$data = $_POST['data'];
$sql = "INSERT INTO test_uploda (std_code,std_tname,std_fname,std_lname,std_phone,std_email,std_race,std_nationnality,branch_id,department_id,admin_id ) VALUES ";
for($i=0 ; $i < count($data);$i++){
    $sql .= "(";
    $sql .= " '".$data[$i]['std_code']."',";
    $sql .= " '".$data[$i]['std_tname']."',";
    $sql .= " '".$data[$i]['std_fname']."',";
    $sql .= " '".$data[$i]['std_lname']."',";
    $sql .= " '".$data[$i]['std_phone']."',";
    $sql .= " '".$data[$i]['std_email']."',";
    $sql .= " '".$data[$i]['std_race']."',";
    $sql .= " '".$data[$i]['std_nationnality']."',";
    $sql .= " '".$data[$i]['branch_id']."',";
    $sql .= " '".$data[$i]['department_id']."',";
    $sql .= " '".$data[$i]['admin_id']."'";
    $sql .= "),";
} 

$sql = substr($sql,0,strlen($sql)-1);
// print($sql);
if ($conn->query($sql) === TRUE) {
    print("success");
} else {
    print(json_encode("Error: " . "<br>" . $conn->error));
}

 