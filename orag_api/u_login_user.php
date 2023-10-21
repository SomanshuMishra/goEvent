<?php
require dirname(dirname(__FILE__)) . "/filemanager/evconfing.php";
$data = json_decode(file_get_contents("php://input"), true);
header("Content-type: text/json");
if ($data["email"] == "" || $data["password"] == "") {
    $returnArr = [
        "ResponseCode" => "401",
        "Result" => "false",
        "ResponseMsg" => "Something Went Wrong!",
    ];
} else {
    $email = strip_tags(mysqli_real_escape_string($evmulti, $data["email"]));
    $ccode = strip_tags(mysqli_real_escape_string($evmulti, $data["ccode"]));
    $password = strip_tags(
        mysqli_real_escape_string($evmulti, $data["password"])
    );

    $chek = $evmulti->query(
        "select * from tbl_sponsore where   email='" .
            $email .
            "' and status = 1 and password='" .
            $password .
            "'"
    );
    $status = $evmulti->query("select * from tbl_sponsore where status = 1");
    if ($status->num_rows != 0) {
        if ($chek->num_rows != 0) {
            $c = $evmulti
                ->query(
                    "select * from tbl_sponsore where  email='" .
                        $email .
                        "' and status = 1 and password='" .
                        $password .
                        "'"
                )
                ->fetch_assoc();

            $returnArr = [
                "OragnizerLogin" => $c,
                "currency" => $set["currency"],
                "ResponseCode" => "200",
                "Result" => "true",
                "ResponseMsg" => "Login successfully!",
            ];
        } else {
            $returnArr = [
                "ResponseCode" => "401",
                "Result" => "false",
                "ResponseMsg" =>
                    "Invalid Mobile Number Or Email Address or Password!!!",
            ];
        }
    } else {
        $returnArr = [
            "ResponseCode" => "401",
            "Result" => "false",
            "ResponseMsg" => "Your Status Deactivate!!!",
        ];
    }
}

echo json_encode($returnArr);
