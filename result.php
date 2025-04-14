<?php
$jobid = "";
include "cleandata.php";
if (isset($_GET['jobid'])) {
    $jobid = cleandata::clean($_GET['jobid']);
}else{
    header("location:tool.php?errorpage=1");
    exit;
}
?>
<div class="row">
    <div class="col-sm-12">
        <div id="plot2"><img class="image-link" data-target="#myplot01" data-toggle="modal"
                             style="max-width:100%;display: block; margin: 0 auto"
                             src="resultplot1pic.php?jobid=<?php echo $jobid ?>"/>
        </div>
        <div class="modal fade" role="dialog" id="myplot01">
            <div class="modal-dialog" style="width:auto">
                <div class="modal-content">
                    <div class="modal-body" style="align-content: center">
                        <p><img style="max-width:1250px"
                                src="resultplot1pic.php?jobid=<?php echo $jobid; ?>"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a id="downloadplot1" class="btn btn-default" href="resultplot1pic.php?jobid=<?php echo $jobid; ?>" >
    <i class="fa fa-download"></i>Download the histogram</a>
<a id="downloadtable1" class="btn btn-default" href="resultplot1csv.php?jobid=<?php echo $jobid; ?>">
    <i class="fa fa-download"></i>Download the table of proportion estimates</a>
<br/>
<hr/>
<div class="row">
    <div class="col-sm-12">
        <div id="plot2"><img class="image-link" data-target="#myplot2" data-toggle="modal"
                             style="max-width:100%;display: block; margin: 0 auto" src="resultplot2pic.php?jobid=<?php echo $jobid; ?>">
        </div>
        <!-- The Modal -->
        <div class="modal modal-wide fade" role="dialog" id="myplot2">
            <div class="modal-dialog" style="width:auto">
                <div class="modal-content">
                    <div class="modal-body" style="align-content: center">
                        <p><img style="max-width:1250px"
                                src="resultplot2pic.php?jobid=<?php echo $jobid; ?>"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a id="downloadplot2" class="btn btn-default" href="resultplot2pic.php?jobid=<?php echo $jobid; ?>">
    <i class="fa fa-download"></i>
    Download the heatmap
</a>
<a id="downloadtable2" class="btn btn-default" href="resultplot2csv.php?jobid=<?php echo $jobid; ?>">
    <i class="fa fa-download"></i>
    Download the table of gene expression estimates in Stroma component
</a>
