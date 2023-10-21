<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

try {
    $evmulti = new mysqli("localhost", "username", "password", "database");
    $evmulti->set_charset("utf8mb4");
} catch (Exception $e) {
    error_log($e->getMessage());
    //Should be a message a typical user could understand
}

$set = $evmulti->query("SELECT * FROM `tbl_setting`")->fetch_assoc();
date_default_timezone_set($set["timezone"]);

if (isset($_SESSION["stype"]) && $_SESSION["stype"] == "sowner") {
    
        $sdata = $evmulti
            ->query(
                "SELECT * FROM `tbl_sponsore` where email='" .
                    $_SESSION["evename"] .
                    "'"
            )
            ->fetch_assoc();
    
}

$maindata = $evmulti->query("SELECT * FROM `tbl_etom`")->fetch_assoc();
