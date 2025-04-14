<?php
include "cleandata.php";
if (isset($_POST["submit"])) {
// ------------------------------------------------ check submitted parameters  ------------------------------------------------------------
    $cycleerr = 0;
    $meanerr = 0;
    $stromaerr = 0;
    $tumorerr = 0;
    $normalerr = 0;

    if (isset($_POST['cycle'])) {
        //check input is an integer between 1 to 100000
        $cycle = cleandata::clean($_POST['cycle']);
        if (!filter_var($cycle, FILTER_VALIDATE_INT) || filter_var($cycle, FILTER_VALIDATE_INT) > 100000 || filter_var($cycle, FILTER_VALIDATE_INT) <= 0) {
            $cycleerr = 1;
        }
    }
    if (isset($_POST['mean'])) {
        //check input is an integer between 1 to 1000
        $mean = cleandata::clean($_POST['mean']);
        if (!filter_var($mean, FILTER_VALIDATE_INT) || filter_var($mean, FILTER_VALIDATE_INT) > 1000 || filter_var($mean, FILTER_VALIDATE_INT) <= 0) {
            $meanerr = 1;
        }
    }

    if (isset($_POST['stroma'])) {
        //check input is a float number between 0 to 1
        $stroma=cleandata::clean($_POST['stroma']);
        if (!filter_var($stroma, FILTER_VALIDATE_FLOAT) || filter_var($stroma, FILTER_VALIDATE_FLOAT) > 1 || filter_var($stroma, FILTER_VALIDATE_FLOAT) < 0) {
            $stromaerr = 1;
        }
    }
    if (isset($_POST['tumor'])) {
        //check input is a float number between 0 to 1
        $tumor = cleandata::clean($_POST['tumor']);
        if (!filter_var($tumor, FILTER_VALIDATE_FLOAT) || filter_var($tumor, FILTER_VALIDATE_FLOAT) > 1 || filter_var($tumor, FILTER_VALIDATE_FLOAT) < 0) {
            $tumorerr = 1;
        }
    }
    if (isset($_POST['normal'])) {
        //check input is a float number between 0 to 1
        $normal = cleandata::clean($_POST['normal']);
        if (!filter_var($normal, FILTER_VALIDATE_FLOAT) || filter_var($normal, FILTER_VALIDATE_FLOAT) > 1 || filter_var($normal, FILTER_VALIDATE_FLOAT) < 0) {
            $normalerr = 1;
        }
    }
    $jobid = "";

//----------------------------------------------------------------check upload files-----------------------------------------------------------
    $file1Err = 0;
    $file2Err = 0;
    $file3Err = 0;
    $expr_data = "";
    $allowed = array('csv', 'xlsx', 'xlsm', 'xltx', 'xltm');
    $info = pathinfo($_FILES['file1']['name']);
    $ext = $info['extension'];
    // ---------------------- check upload file1  ------------------------------
    if ($_FILES['file1']['error'] == 4) {
        $file1Err = 1;
    }
    if ($_FILES['file1']['size'] > 0 && isset($_FILES['file1']['tmp_name'])) {
        if ($_FILES['file1']['size'] > 12000000) {
            $file1Err = 2;
        } elseif (!in_array($ext, $allowed)) {
            $file1Err = 3;
        } else {
            $file1_path = $_FILES['file1']['tmp_name'];
            //read all contents for saving in database later
            $expr_data = file_get_contents($file1_path);
            $expr_data = cleandata::clean($expr_data);
            $csvFile = fopen($_FILES['file1']['tmp_name'], 'r');
            //read first line of csv file
            $firstline_arr = fgetcsv($csvFile);
            //count colnum numbers in first line
            $colnum = sizeof($firstline_arr);
            while (($line = fgetcsv($csvFile)) !== FALSE) {
                $line_colnum = sizeof($line);
                $picker = rand(1, $line_colnum - 1);
                if ($colnum != $line_colnum || (!is_numeric($line[$picker])) || (is_numeric($line[0]))) {
                    $file1Err = 4;
                }
            }
        }
    }
    // -------------------------- check upload file2  --------------------------------------
    $expr_data2 = "";
    $info2 = pathinfo($_FILES['file2']['name']);
    $ext2 = $info2['extension'];
    if ($_FILES['file2']['error'] == 4) {
        $file2Err = 1;
    }
    if ($_FILES['file2']['size'] > 0 && isset($_FILES['file2']['tmp_name'])) {
        if ($_FILES['file2']['size'] > 12000000) {
            $file2Err = 2;
        } elseif (!in_array($ext2, $allowed)) {
            $file2Err = 3;
        } else {
            $file2_path = $_FILES['file2']['tmp_name'];
            //read all contents for saving in database later
            $expr_data2 = file_get_contents($file2_path);
            $expr_data2 = cleandata::clean($expr_data2);
            $csvFile2 = fopen($_FILES['file2']['tmp_name'], 'r');
            //read first line of csv file
            $firstline_arr2 = fgetcsv($csvFile2);
            //count colnum numbers in first line
            $colnum2 = sizeof($firstline_arr2);
            while (($line = fgetcsv($csvFile2)) !== FALSE) {
                $line_colnum = sizeof($line);
                $picker = rand(1, $line_colnum - 1);
                if ($colnum2 != $line_colnum || (!is_numeric($line[$picker])) || (is_numeric($line[0]))) {
                    $file2Err = 4;
                }
            }
        }
    }
    // ------------------------------------ check upload file3  ---------------------------------------------
    $expr_data3 = "";
    $info3 = pathinfo($_FILES['file3']['name']);
    $ext3 = $info3['extension'];
    if ($_FILES['file3']['error'] == 4) {
        $file3Err = 1;
    }
    if ($_FILES['file3']['size'] > 0 && isset($_FILES['file3']['tmp_name'])) {
        if ($_FILES['file3']['size'] > 12000000) {
            $file3Err = 2;
        } elseif (!in_array($ext3, $allowed)) {
            $file3Err = 3;
        } else {
            $file3_path = $_FILES['file3']['tmp_name'];
            //read all contents for saving in database later
            $expr_data3 = file_get_contents($file3_path);
            $expr_data3 = cleandata::clean($expr_data3);
            $csvFile3 = fopen($_FILES['file3']['tmp_name'], 'r');
            //read first line of csv file
            $firstline_arr3 = fgetcsv($csvFile3);
            $colnum3 = sizeof($firstline_arr3);
            while (($line = fgetcsv($csvFile3)) !== FALSE) {
                $line_colnum = sizeof($line);
                $picker = rand(1, $line_colnum - 1);
                if ($colnum3 != $line_colnum || (!is_numeric($line[$picker])) || (is_numeric($line[0]))) {
                    $file3Err = 4;
                }
            }
        }
    }
    if ($cycleerr == 1 || $meanerr == 1 || $stromaerr == 1 || $tumorerr == 1 || $normalerr == 1 || $file1Err != 0 || $file2Err != 0 || $file3Err != 0) {
        if ($file1Err == 0) {
            $file1Err = -1;
        }
        if ($file2Err == 0) {
            $file2Err = -1;
        }
        if ($file3Err == 0) {
            $file3Err = -1;
        }
        header("location:tool.php?file1Err=$file1Err&&file2Err=$file2Err&&file3Err=$file3Err&&mcmcvalue=$cycle&&mcmcerr=$cycleerr&&meanerr=$meanerr&&meanvalue=$mean&&stromaerr=$stromaerr&&stromavalue=$stroma&&tumorerr=$tumorerr&&tumorvalue=$tumor&&normalerr=$normalerr&&normalvalue=$normal");
        exit();
    }
//--------------connect to database-------------------------
    include "/var/www/dbincloc/dishet.inc";

    $db_conn = new mysqli($hostname, $usr, $pwd, $dbname);
    if ($db_conn->connect_error) {
        die('Unable to connect to database: ' . $db_conn->connect_error);
    }
    $status = 0;
    date_default_timezone_set('America/Chicago');
    $null = NULL;
    $jobid = uniqid("", True);
    $createtime = date("Y-m-d H:i:s");
    if ($stmt1 = $db_conn->prepare("INSERT INTO Jobs (JOBID, Software, Analysis, CreateTime) VALUES (?, 'dishet', 'dishet', ?);")) {
        $stmt1->bind_param("ss", $jobid, $createtime);
        $exstatus = $stmt1->execute();
        if($exstatus){
            if ($stmt = $db_conn->prepare("INSERT INTO DisHetParameters (JobID, Exp_T, Exp_N, Exp_G, Cycle, Mean, StromaProportion, TumorProportion, NormalProportion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);")) {
                $stmt->bind_param("sbbbiiddd", $jobid, $null, $null, $null, $cycle, $mean, $stroma, $tumor, $normal);
                $stmt->send_long_data(1, $expr_data);
                $stmt->send_long_data(2, $expr_data2);
                $stmt->send_long_data(3, $expr_data3);
                $exstatus2 = $stmt->execute();
                //if it is failed to insert data into DisHetParameter table, it would go to error page
                if(!$exstatus2){
                    header("location:tool.php?errorpage=1");
                    exit;
                }
                $stmt->close();
            } else{
                header("location:tool.php?errorpage=1");
                exit;
            }
        }
        //if it is failed to insert data into Jobs TABLE, it would go to error page
        else{
            header("location:tool.php?errorpage=1");
            exit;
        }
        $stmt1->close();
    }else{
        header("location:tool.php?errorpage=1");
        exit;
    }
    $db_conn->close();
    header("location:tool.php?waiting=1&&jobid=${jobid}&&mcmcvalue=$cycle&&meanvalue=$mean&&stromavalue=$stroma&&tumorvalue=$tumor&&normalvalue=$normal");
    exit();
}
?>
