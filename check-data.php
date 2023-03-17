<?php
require("conn.php");
$DATA = $_POST['data'];
$sql = "SELECT * FROM tbl_branch";
$result = $conn->query($sql);



$DATA_RESULT = array(
    "status" => 0,
    "table" => "",
    "status_branch_error" => 0,
);



if (mysqli_num_rows($result) == 0) {
    print_r("ERROR");
} else {
    $DATA_RESULT["status"] = 1;
    while ($r = mysqli_fetch_assoc($result)) {
        $DATA_BRANCH[] = $r;
    }
    $table_tr = "";
    $table_tr .= "<tr>";
    foreach ($DATA as $data) {
        $status =   CHECK_BRANCH($DATA_BRANCH, $data['branch_id'],$DATA_RESULT );
        // print($status);
        // $table_tr .= "<td>" . $data['std_id'] . "</td>";
        $table_tr .= "<td>" . $data['std_code']  . "</td>";
        $table_tr .= "<td>" . $data['std_tname']  . "</td>";
        $table_tr .= "<td>" . $data['std_fname']  . "</td>";
        $table_tr .= "<td>" . $data['std_lname']  . "</td>";
        $table_tr .= "<td>" . $data['std_phone']  . "</td>";
        $table_tr .= "<td>" . $data['std_email']  . "</td>";
        $table_tr .= "<td>" . $data['std_race']  . "</td>";
        $table_tr .= "<td>" . $data['std_nationnality']  . "</td>";
        if ($status) {
            $table_tr .= "<td>" . $data['branch_id']. "</td>";
        } else {
            $DATA_RESULT['status_branch_error'] = 1;
            $table_tr .= "<td  class='bg-danger text-light' >" . $data['branch_id'].$status .  "</td>";
        }

        $table_tr .= "<td>" . $data['department_id']  . "</td>";
        $table_tr .= "<td>" . $data['admin_id']  . "</td>";
        $table_tr .= "/<tr>";
    }
    $DATA_RESULT["table"] = $table_tr;
    print_r(json_encode(
        $DATA_RESULT
    ));
    // print("AAAA");
    // print($status);
}



function CHECK_BRANCH($DATA_BRANCH, $branch)
{
    foreach ($DATA_BRANCH as $DB) {
        $_BRANCH = str_replace(' ','',$DB['branch_name']);
        if (strval($_BRANCH) == $branch) {
            return 1;
        }
    }

    return 0;
}

$conn->close();
