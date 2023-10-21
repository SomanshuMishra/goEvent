<?php
require dirname(dirname(__FILE__)) . "/filemanager/evconfing.php";
require dirname(dirname(__FILE__)) . "/filemanager/event.php";
define('IMG', 'data:image/png;base64,');
define('PATH', 'images/event/');
define('MSG', 'Event  Update Successfully');
header("Content-type: text/json");
$data = json_decode(file_get_contents("php://input"), true);
$status = $data["status"];
$title = $evmulti->real_escape_string($data["title"]);
$address = $evmulti->real_escape_string($data["address"]);
$tags = $evmulti->real_escape_string($data["tags"]);
$vurls = $evmulti->real_escape_string($data["vurls"]);
$description = $evmulti->real_escape_string($data["cdesc"]);
$disclaimer = $evmulti->real_escape_string($data["disclaimer"]);
$status = $data["status"];
$orag_id = $data["orag_id"];
$facility_id = $data["facility_id"];
$restict_id = $data["restict_id"];
$place_name = $evmulti->real_escape_string($data["pname"]);
$sdate = $data["sdate"];
$stime = $data["stime"];
$etime = $data["etime"];
$cid = $data["cat_id"];
$latitude = $data["latitude"];
$longtitude = $data["longtitude"];
$record_id = $data["record_id"];
function getWhereClause($recordid, $orgid) {
    return "where id=$recordid and sponsore_id=$orgid";
  }
if (
    $status == "" ||
    $orag_id == "" ||
    $address == "" ||
    $title == "" ||
    $description == "" ||
    $disclaimer == "" ||
    $place_name == "" ||
    $sdate == "" ||
    $stime == "" ||
    $etime == "" ||
    $cid == "" ||
    $latitude == "" ||
    $longtitude == ""
) {
    $returnArr = [
        "ResponseCode" => "401",
        "Result" => "false",
        "ResponseMsg" => "Something Went Wrong!",
    ];
} else {
    if ($data["img"] == "0" && $data["cover"] != "0") {
        $imgs = $data["cover"];
        $imgs = str_replace(IMG, "", $imgs);
        $imgs = str_replace(" ", "+", $imgs);
        $datavbs = base64_decode($imgs);
        $paths = PATH. uniqid() . ".png";
        $fnames = dirname(dirname(__FILE__)) . "/" . $paths;
        file_put_contents($fnames, $datavbs);

        $table = "tbl_event";
        $field = [
            "tags" => $tags,
            "vurls" => $vurls,
            "place_name" => $place_name,
            "facility_id" => $facility_id,
            "restict_id" => $restict_id,
            "status" => $status,
            "cover_img" => $paths,
            "title" => $title,
            "cid" => $cid,
            "sdate" => $sdate,
            "stime" => $stime,
            "etime" => $etime,
            "address" => $address,
            "description" => $description,
            "disclaimer" => $disclaimer,
            "latitude" => $latitude,
            "longtitude" => $longtitude,
        ];
        $where = getWhereClause($record_id, $org_id);
        $h = new Event();
        $check = $h->evmultiupdateDatanull_Api($field, $table, $where);
        $returnArr = [
            "ResponseCode" => "200",
            "Result" => "true",
            "ResponseMsg" => MSG,
        ];
    } elseif ($data["img"] != "0" && $data["cover"] == "0") {
        $img = $data["img"];
        $img = str_replace(IMG, "", $img);
        $img = str_replace(" ", "+", $img);
        $datavb = base64_decode($img);
        $path = PATH. uniqid() . ".png";
        $fname = dirname(dirname(__FILE__)) . "/" . $path;
        file_put_contents($fname, $datavb);

        $table = "tbl_event";
        $field = [
            "tags" => $tags,
            "vurls" => $vurls,
            "place_name" => $place_name,
            "facility_id" => $facility_id,
            "restict_id" => $restict_id,
            "status" => $status,
            "img" => $path,
            "title" => $title,
            "cid" => $cid,
            "sdate" => $sdate,
            "stime" => $stime,
            "etime" => $etime,
            "address" => $address,
            "description" => $description,
            "disclaimer" => $disclaimer,
            "latitude" => $latitude,
            "longtitude" => $longtitude,
        ];
        $where = getWhereClause($record_id, $org_id);
        $h = new Event();
        $check = $h->evmultiupdateDatanull_Api($field, $table, $where);
        $returnArr = [
            "ResponseCode" => "200",
            "Result" => "true",
            "ResponseMsg" => MSG,
        ];
    } elseif ($data["img"] != "0" && $data["cover"] != "0") {
        $img = $data["img"];
        $img = str_replace(IMG, "", $img);
        $img = str_replace(" ", "+", $img);
        $datavb = base64_decode($img);
        $path = PATH. uniqid() . ".png";
        $fname = dirname(dirname(__FILE__)) . "/" . $path;
        file_put_contents($fname, $datavb);

        $imgs = $data["cover"];
        $imgs = str_replace(IMG, "", $imgs);
        $imgs = str_replace(" ", "+", $imgs);
        $datavbs = base64_decode($imgs);
        $paths = PATH. uniqid() . ".png";
        $fnames = dirname(dirname(__FILE__)) . "/" . $paths;
        file_put_contents($fnames, $datavbs);

        $table = "tbl_event";
        $field = [
            "tags" => $tags,
            "vurls" => $vurls,
            "place_name" => $place_name,
            "facility_id" => $facility_id,
            "restict_id" => $restict_id,
            "status" => $status,
            "cover_img" => $paths,
            "img" => $path,
            "title" => $title,
            "cid" => $cid,
            "sdate" => $sdate,
            "stime" => $stime,
            "etime" => $etime,
            "address" => $address,
            "description" => $description,
            "disclaimer" => $disclaimer,
            "latitude" => $latitude,
            "longtitude" => $longtitude,
        ];
        $where = getWhereClause($record_id, $org_id);
        $h = new Event();
        $check = $h->evmultiupdateDatanull_Api($field, $table, $where);
        $returnArr = [
            "ResponseCode" => "200",
            "Result" => "true",
            "ResponseMsg" => MSG,
        ];
    } else {
        $table = "tbl_event";
        $field = [
            "tags" => $tags,
            "vurls" => $vurls,
            "place_name" => $place_name,
            "facility_id" => $facility_id,
            "restict_id" => $restict_id,
            "status" => $status,
            "title" => $title,
            "cid" => $cid,
            "sdate" => $sdate,
            "stime" => $stime,
            "etime" => $etime,
            "address" => $address,
            "description" => $description,
            "disclaimer" => $disclaimer,
            "latitude" => $latitude,
            "longtitude" => $longtitude,
        ];
        $where = getWhereClause($record_id, $org_id);
        $h = new Event();
        $check = $h->evmultiupdateDatanull_Api($field, $table, $where);
        $returnArr = [
            "ResponseCode" => "200",
            "Result" => "true",
            "ResponseMsg" => MSG,
        ];
    }
}
echo json_encode($returnArr);

