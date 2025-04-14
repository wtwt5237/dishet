<?php
  include "cleandata.php";
?>
<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script src="js/jquery.min.js"></script>
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <title>DisHet User Interface</title>
    <script src="js/myScript.js"></script>
    <script>
        function loadwaiting(id) {
            $.ajax({
                type: 'GET',
                url: 'waiting.php',
                data: {"jobid": id},
                success: function (data) {
                    $("#plots").html(data);
                },
                error: function () {
                    $("#plots").html('Timeout contacting server..');
                }
            });
        }
        function loadresult(id) {
            $.ajax({
                type: 'GET',
                url: 'result.php',
                data: {"jobid": id},
                success: function (data) {
                    $("#plots").html(data);
                },
                error: function () {
                    $("#plots").html('Timeout contacting server..');
                }
            });
        }
        $(document).ready(function () {
            $("#tool").addClass("active");
            var waiting = "<?php if(isset($_GET['waiting']))echo cleandata::clean($_GET['waiting']); ?>";
            var jobid = "<?php if(isset($_GET['jobid'])) echo cleandata::clean($_GET['jobid']); ?>";
            var result = "<?php if(isset($_GET['result'])) echo cleandata::clean($_GET['result']); ?>";
            if (parseInt(waiting) === 1 && jobid) {
                loadwaiting(jobid);

            setInterval(function () {

                 loadwaiting(jobid);
                }, 6000,false);

            }
            if (parseInt(result) === 1 && jobid) {
                loadresult(jobid);
            }
        });
    </script>
    <style>
        body, .main{
            padding:0;
            margin:0;
            background:white url(images/menu.png) top no-repeat;
        }
    </style>
</head>

<body>
<!--Navigation-->
<div class="main">
    <?php include "menu.php" ?>
</div>

<!--Breadcrumb menu-->
<div class="tcontainer">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Tool</li>
    </ol>

    <!--Main page-->
    <div class="row">

        <!--Form Section-->
        <div class="col-sm-3">
            <h3>DisHet Submission Form</h3>
            <form class="well" action="submit.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <h3>Upload Files <a style="cursor:pointer" data-target="#myModal1" data-toggle="modal" target="_blank" download>
                            <i class="fa fa-question-circle"></i></a></h3>

                    <!--Upload File Requirements Modal-->
                    <div class="modal fade in" id="myModal1" role="dialog" style="padding-right: 13px;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Upload Format & Sample Download</h4>
                                </div>
                                <div class="modal-body">
                                    <p><img style="max-width:750px;" src="images/expT.png"></p>
                                    <h2 style="font-size: 17px;"><strong>Upload Format:</strong></h2>
                                    <ol style="list-style-type: disc; list-style-position: inside">
                                        <li>Only CSV file is accepted here, and the maximum size is 12MB.</li>
                                        <li>The first row is the patient's name. The first column is the gene's name.
                                            The rest of the row contains real data and must be numeric type.
                                        </li>
                                        <li>3. Each data row must contain the same number of columns as the first row.</li>
                                    </ol>
                                    <br/>
                                    <h2 style="font-size: 17px;"><strong>Sample Download:</strong></h2>
                                    <p><strong style="font-size: 17px">exp_T.csv  </strong><a href="data/exp_T.csv">
                                            <span style="font-size: 20px"><i class="fa fa-download" aria-hidden="true"></i></span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;<strong style="font-size: 17px">exp_N.csv  </strong><a href="data/exp_N.csv">
                                            <span style="font-size: 20px"><i class="fa fa-download" aria-hidden="true"></i></span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;<strong style="font-size: 17px">exp_G.csv  </strong><a href="data/exp_G.csv">
                                            <span style="font-size: 20px"><i class="fa fa-download" aria-hidden="true"></i></span></a></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End of the Modal-->

                    <!--Upload File Requirements Modal-->
                    <div class="modal modal-wide fade in" id="myModal2" role="dialog" style="padding-right: 13px;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">The estimated calculation time</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" style="width: 500px;">
                                            <thead>
                                            <tr>
                                                <th>The number of MCMC Iteration</th>
                                                <th>Calculation time</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>0 - 500</td>
                                                <td>10s - 20s</td>
                                            </tr>
                                            <tr>
                                                <td>500 - 1000</td>
                                                <td>20s - 40s</td>
                                            </tr>
                                            <tr>
                                                <td>1000 - 5000</td>
                                                <td>40s - 2min</td>
                                            </tr>
                                            <tr>
                                                <td>5000 - 10000</td>
                                                <td>2min - 4min</td>
                                            </tr>
                                            <tr>
                                                <td>10000 - 50000</td>
                                                <td>4min - 20min</td>
                                            </tr>
                                            <tr>
                                                <td>50000 - 100000</td>
                                                <td>20min - 40min</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End of the Modal-->


                </div>

                <!-- upload file1-->
                <div class="form-group">
                    <label>Upload un-logged gene expression in bulk tumor RNA-seq samples (exp_T):</label>
                    <div class="input-group">
                        <label class="input-group-btn">
                             <span class="btn btn-default btn-file">
                                Browse...
                                <input id="file1" name="file1" type="file" style="display: none;"/><span class="error">*</span>
                             </span>
                        </label>
                        <input type="text" id="file1display" class="form-control" placeholder="No file selected" readonly="readonly"/>
                    </div>
                    <div id="file1Err" class="error"></div>
                    <?php if (isset($_GET['file1Err'])) {$file1err=cleandata::clean($_GET['file1Err']);
                        if ($file1err == -1) {
                            echo "<div class='error'>Please re-select a file to upload</div>";
                        } elseif ($file1err == 1) {
                            echo "<div class='error'>The RNA seq samples cannot be empty</div>";
                        } elseif ($file1err == 2) {
                            echo "<div class='error'>The file is too large</div>";
                        } elseif ($file1err == 3) {
                            echo "<div class='error'>The file is not a csv file</div>";
                        } elseif ($file1err == 4) {
                            echo "<div class='error'>The file contents are invalid</div>";
                        }
                    }?>
                </div>

                <!--upload file 2-->
                <div class="form-group">
                    <label>Upload un-logged gene expression in the corresponding normal tissue samples (exp_N):</label>
                    <div class="input-group">
                        <label class="input-group-btn">
                <span class="btn btn-default btn-file">
                  Browse...
                  <input id="file2" name="file2" type="file" style="display: none;"/><span class="error">*</span>
                </span>
                        </label>
                        <input type="text" id="file2display" class="form-control" placeholder="No file selected" readonly="readonly"/>
                    </div>
                    <div id="file2Err" class="error"></div>
                    <?php if(isset($_GET['file2Err'])) {$file2err=cleandata::clean($_GET['file2Err']);
                        if ($file2err == -1) {
                            echo "<div class='error'>Please re-select a file to upload</div>";
                        } elseif ($file2err == 1) {
                            echo "<div class='error'>The corresponding normal samples cannot be empty</div>";
                        } elseif ($file2err == 2) {
                            echo "<div class='error'>The file is too large</div>";
                        } elseif ($file2err == 3) {
                            echo "<div class='error'>The file is not a csv file</div>";
                        } elseif ($file2err == 4) {
                            echo "<div class='error'>The file contents are invalid</div>";
                        }
                    }?>
                </div>

                <!--upload file 3-->
                <div class="form-group">
                    <label>Upload un-logged gene expression in the corresponding tumorgraft samples (exp_G):</label>
                    <div class="input-group">
                        <label class="input-group-btn">
                <span class="btn btn-default btn-file">
                  Browse...
                  <input id="file3" name="file3" type="file" style="display: none;"/><span class="error">*</span>
                </span>
                        </label>
                        <input type="text" id="file3display" class="form-control" placeholder="No file selected" readonly="readonly"/>
                    </div>
                    <div id="file3Err" class="error"></div>
                    <?php if(isset($_GET['file3Err'])) {$file3err=cleandata::clean($_GET['file3Err']);
                        if ($file3err == -1) {
                            echo "<div class='error'>Please re-select a file to upload</div>";
                        } elseif ($file3err == 1) {
                            echo "<div class='error'>The corresponding tumor samples cannot be empty</div>";
                        } elseif ($file3err == 2) {
                            echo "<div class='error'>The file is too large</div>";
                        } elseif ($file3err == 3) {
                            echo "<div class='error'>The file is not a csv file</div>";
                        } elseif ($file3err == 4) {
                            echo "<div class='error'>The file contents are invalid</div>";
                        }
                    } ?>
                </div>
                <hr/>

                <!--parameter inputs-->
                <h3>Input Parameters <a style="cursor:pointer" data-toggle="popover" data-placement="right" data-original-title="Input Format"
                                        data-content=" <table class='formatTable'>
                                                    <tr>
                                                    <th>Input</th>
                                                    <th>&nbspType</th>
                                                    <th>&nbspRange</th>
                                                    </tr>
                                                    <tr>
                                                    <td>MCMC Interation </td>
                                                    <td>&nbspInteger</td>
                                                    <td>&nbsp1-100000</td>
                                                    </tr>
                                                    <tr>
                                                    <td>Stablized Interation </td>
                                                    <td>&nbspInteger</td>
                                                    <td>&nbsp1-1000</td>
                                                    </tr>
                                                    <tr>
                                                    <td>Stroma Proportion </td>
                                                    <td>&nbspDecimal</td>
                                                    <td>&nbsp&nbsp0-1(&#8800;0)</td>
                                                    </tr>
                                                    <tr>
                                                    <td>Tumor Proportion </td>
                                                    <td>&nbspDecimal</td>
                                                    <td>&nbsp&nbsp0-1(&#8800;0)</td>
                                                    </tr>
                                                    <tr>
                                                    <td>Normal Proportion </td>
                                                    <td>&nbspDecimal</td>
                                                    <td>&nbsp&nbsp0-1(&#8800;0)</td>
                                                    </tr>
                                                    </table>">
                        <i class="fa fa-question-circle"></i></a></h3>
                <div class="form-group">
                    <label for="cycle">Number of MCMC Iteration: <span class="error">*</span></label><br>
                    <input id="cycle" name="cycle" type="number" step="1" value="<?php if(isset($_GET['mcmcvalue'])) {$input=cleandata::clean($_GET['mcmcvalue']); echo $input;} else {echo 500;} ?>" required>
                    <div id='cycleErr' class="error"></div>
                    <?php if (isset($_GET['mcmcerr'])) {if (cleandata::clean($_GET['mcmcerr']) == 1) {echo "<div class='error'>The input is invalid</div>";}} ?>
                </div>
                <div class="form-group">
                    <label for="mean">Segment of this number of iterations <br>to check for convergence: <span class="error">*</span></label><br>
                    <input id="mean" name="mean" type="number" step="1" value="<?php if (isset($_GET['meanvalue'])) {$input=cleandata::clean($_GET['meanvalue']); echo $input;} else {echo 50;} ?>" required>
                    <div id='meanErr' class="error"></div>
                    <?php if (isset($_GET['meanerr'])) {if (cleandata::clean($_GET['meanerr'] == 1)) {echo "<div class='error'>The input is invalid</div>";}} ?>
                </div>
                <div class="form-group">
                    <label for="stroma">Initial Value for Stroma Proportion:<span class="error">*</span></label><br>
                    <input id="stroma" name="stroma" type="number" step="0.01" value="<?php if(isset($_GET['stromavalue'])) {$input=cleandata::clean($_GET['stromavalue']); echo $input;} else {echo 0.02;} ?>" required>
                    <div id='stromaErr' class="error"></div>
                    <?php if (isset($_GET['stromaerr'])) {if (cleandata::clean($_GET['stromaerr'] == 1)) {echo "<div class='error'>The input is invalid</div>";}} ?>
                </div>
                <div class="form-group">
                    <label for="tumor">Initial Value for Tumor Proportion: <span class="error">*</span></label><br>
                    <input id="tumor" name="tumor" type="number" step="0.01" value="<?php if(isset($_GET['tumorvalue'])) {$input=cleandata::clean($_GET['tumorvalue']); echo $input;}  else {echo 0.96;}?>" required>
                    <div id='tumorErr' class="error"></div>
                    <?php if (isset($_GET['tumorerr'])) {if (cleandata::clean($_GET['tumorerr'] == 1)) {echo "<div class='error'>The input is invalid</div>";}} ?>
                </div>
                <div class="form-group">
                    <label for="normal">Initial Value for Normal Proportion: <span class="error">*</span></label><br>
                    <input id="normal" name="normal" type="number" step="0.01" value="<?php if(isset($_GET['normalvalue'])) {$input=cleandata::clean($_GET['normalvalue']); echo $input;} else {echo 0.02;} ?>" required>
                    <div id='normalErr' class="error"></div>
                    <?php if (isset($_GET['normalerr'])) {if (cleandata::clean($_GET['normalerr'] == 1)) {echo "<div class='error'>The input is invalid</div>";}} ?>
                </div>
                <hr/>
                <input id="run" name="submit" type="submit" class="btn btn-primary action-button submitbt" value="Submit">
            </form>
        </div>

        <!--result display-->
        <div class="col-sm-9">

            <div class="alert alert-info" role="alert">
                <h5>Please read the <strong><a data-target="#myModal1" data-toggle="modal" target="_blank" style="cursor:pointer">Sample File Uploads</a></strong> to understand the input formats of DisHet</h5>
                <h5>The number of MCMC iteration determines the calculation time. An estimated time is <strong><a data-target="#myModal2" data-toggle="modal" target="_blank" style="cursor:pointer">HERE</a></strong>.</h5>
            </div>
            <div id="plots">
                <?php
                    if(isset($_GET['errorpage'])){
                        $errorpage=cleandata::clean($_GET['errorpage']);
                        if($errorpage==1){
                            echo "<h4><img src='images/errorico.png' style='max-height: 80px'>There is a problem with the website. Please try again later!</p>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="fbg">
    <?php include "footer.php"; ?>
</div>
<script>
    $(document).ready(function () {
        //Popover, activated by clicking
        $("body").popover({
            selector: "[data-toggle='popover']",
            container: "body",
            html: true
        });
    });
</script>
</body>

</html>