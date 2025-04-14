<?php
include "/var/www/dbincloc/dishet.inc";
include "cleandata.php";
//check jobid
if (isset($_GET['jobid'])) {
    $jobid = cleandata::clean($_GET['jobid']);
}else{
    header("location:tool.php?errorpage=1");
    exit;
}
//open the database connection
$db_conn = new mysqli($hostname, $usr, $pwd, $dbname);
if ($db_conn->connect_error) {
    die('Unable to connect to database: ' . $db_conn->connect_error);
}
$resultgene = "";

//Retrive Plot 1 picture
if (!empty($jobid) && $result = $db_conn->prepare("SELECT Rho_jpg FROM DisHetResults WHERE JobID = ?")) {
    $result->bind_param("s", $jobid);
    $result->execute();
    $result->store_result();
    $result->bind_result($resultgene);
    $result->fetch();
    if ($resultgene) {
        header('Content-Type: image/jpg');
        header("Content-Disposition: attachment; filename=ProportionExpImage.jpg");
        header("Content-length: " . strlen($resultgene) . "\"");
        echo $resultgene;
    } else {
        header("location:tool.php?errorpage=1");
        exit;
    }

    $result->close();
}else{
    header("location:tool.php?errorpage=1");
    exit;
}

$db_conn->close();
?>
