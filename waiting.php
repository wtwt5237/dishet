<?php
include "/var/www/dbincloc/dishet.inc";
include "cleandata.php";

//check jobid
if (isset($_GET['jobid'])) {
    $jobid = cleandata::clean( $_GET['jobid']);
}else{
    echo "<h4><img src='images/errorico.png' style='max-height: 80px'>There is a problem with the website. Please try again later!</p>";
    exit();
}

$db_conn = new mysqli($hostname, $usr, $pwd, $dbname);
if ($db_conn->connect_error) {
    die('Unable to connect to database: ' . $db_conn->connect_error);
}

$status = 0;
$cycle = 0;
$mean = 0;
$sp = 0;
$tp = 0;
$np = 0;

if (!empty($jobid)) {
    if ($stmt = $db_conn->prepare("SELECT Status, Cycle, Mean, StromaProportion, TumorProportion, NormalProportion FROM Jobs j, DisHetParameters d WHERE d.JobID = ? AND j.JOBID = d.JobID;")) {
        $stmt->bind_param("s", $jobid);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($status, $cycle, $mean, $sp, $tp, $np);
        $stmt->fetch();
    }

    if ($stmt->num_rows > 0) {
        if ($status == 1) {
            echo "<script>location.href='tool.php?result=1&&jobid=${jobid}&&mcmcvalue=$cycle&&meanvalue=$mean&&stromavalue=$sp&&tumorvalue=$tp&&normalvalue=$np'</script>";
            exit;
        }
        if($status == 9){
            echo "<h4><img src='images/errorico.png' style='max-height: 80px'>There is a problem with the website. Please try again later!</p>";
            exit();
        }
    }
    else{
        echo "<h4><img src='images/errorico.png' style='max-height: 80px'>There is a problem with the website. Please try again later!</p>";
        exit();
    }
}
$db_conn->close();
?>

<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-4">
            <div id="plot1.1" style="width: 100% ; height: 400px"><img src="images/waiting.svg"
                                                                       style="display: block; margin: 0 auto"/></div>
        </div>
        <div class="col-sm-4">
            <div id="plot1.2" style="width: 100% ; height: 400px"><img src="images/waiting.svg"
                                                                       style="display: block; margin: 0 auto"/></div>
        </div>
        <div class="col-sm-4">
            <div id="plot1.3" style="width: 100% ; height: 400px"><img src="images/waiting.svg"
                                                                       style="display: block; margin: 0 auto"/></div>
        </div>
    </div>
</div>
<br/>
<hr/>
<div id="plot2" style="width: 100% ; height: 400px"><img src="images/waiting.svg" style="display: block; margin: 0 auto"/>
</div>
