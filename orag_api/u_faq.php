<?php
require dirname(dirname(__FILE__)) . "/filemanager/evconfing.php";
header("Content-type: text/json");
$data = json_decode(file_get_contents("php://input"), true);
if ($data["orag_id"] == "") {
    $returnArr = [
        "ResponseCode" => "401",
        "Result" => "false",
        "ResponseMsg" => "Something Went Wrong!",
    ];
} else {
    $orag_id = strip_tags(
        mysqli_real_escape_string($evmulti, $data["orag_id"])
    );

    $check = $evmulti->query("select * from tbl_faq where status=1");
    $op = [];
    while ($row = $check->fetch_assoc()) {
        $op[] = $row;
    }
    $returnArr = [
        "FaqData" => $op,
        "ResponseCode" => "200",
        "Result" => "true",
        "ResponseMsg" => "Faq List Get Successfully!!",
    ];
}
echo json_encode($returnArr);
