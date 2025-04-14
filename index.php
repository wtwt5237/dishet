<!DOCTYPE HTML>

<html>
<head>

    <title>Dishet</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="description" content="This is an online analysis tool to estimate the gene expression levels and component proportions of
                                      the normal, stroma(immune) and tumor components of bulk tumor RNA-Seq samples.Although DisHet is designed
                                      for dissection of bulk tumor samples using matched normal tissue and tumorgraft RNA-seq data, it is widely
                                      applicable to dissection of gene expression of any mixture of 3 types of cells. ">
    <meta name="keywords" content="DisHet, Dissecting Heterogeneous bulk tumor, package dishet, online analysis tool, utsw, tao wang, qbrc ">
    <meta name="author" content="Danni Luo">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:700italic,400,300,700' rel='stylesheet'
          type='text/css'>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plotly-latest.min.js"></script>
    <!--    [if lt IE 9]-->
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <!--    [endif]-->
    <style>
        body, .home {
            padding:0;
            margin:0;
            background:#f1f1f1 url(images/main_bg.png) top no-repeat;
        }
    </style>
</head>

<body>
<div class="home">
    <?php include "header.php" ?>
    <!--Main Contents-->
    <div class="container">
        <div class="row">

            <!--Left Side Contents-->
            <div class="col-sm-7">
                <div class="card sb-card bordershadow">
                    <div class="card-body">
                        <h3>The Goal </h3>
                        <p style="text-align: justify;"> To estimate the gene expression levels and component proportions
                            of the <strong>normal, stroma (immune)
                            and tumor</strong> components of bulk tumor RNA-Seq samples. Although DisHet is designed
                            for dissection
                            of bulk tumor samples using matched normal tissue and tumorgraft RNA-seq data, it is widely
                            applicable to dissection of gene expression of any mixture of 3 types of cells.
                        </p>
                        <img src="images/fig3.png" style="max-width:100%;border-radius: 25px;padding:0 8px;">
                    </div>
                </div>
            </div>

            <!--Right Side Links-->
            <div class="col-sm-5" style="margin-left: 0; padding-left: 0">
                <!--Quick Link Section-->
                <div class="card sb-card bordershadow">
                    <div class="card-body">
                        <h3>Quick Link:</h3>
                        <p style="text-align: justify;">To read more about DisHet and download it, please download
                            the <span><a href="https://cran.r-project.org/web/packages/DisHet/index.html">source files
                            <i class="fa fa-external-link" aria-hidden="true"></i></a></span> and
                            <span><a style="cursor: pointer" data-target="#demo" data-toggle="modal" target="_blank" download>instruction manual
                            <i class="fa fa-question-circle-o" aria-hidden="true"></i>.</a></span> here. If you have any problems
                            using DisHet Online Tool, please contact us for assistance.
                        </p>
                        <!--Demo Modal-->
                        <div class="modal modal-wide fade in" id="demo" role="dialog" style="padding-right: 13px;">
                            <div class="modal-dialog" style="width:800px">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Sample File Download & Upload File Requirements</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p><img style="max-width:750px;height:auto;" src="images/demo.png"></p>
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
                </div>

                <!--Author Introduction Section-->
                <div class="card sb-card bordershadow">
                    <div class="card-body">
                        <h3>The Authors:</h3>
                        <div class="col-sm-12">
                            <div class="col-sm-3">
                                <p><a href="" class="img-hover not-active"><img class="authorimg" src="images/ronglu.png"></a>
                                </p></div>
                            <div class="col-sm-9" style="margin-top:20px;">
                                <ul style=" list-style-position: inside;">
                                    <li><strong>Author: </strong>Rong Lu</li>
                                    <li><strong>Email: </strong><a href="mailto:Tao.Wang@UTSouthwestern.edu">Rong.Lu@utsouthwestern.edu</a>
                                    </li>
                                    <li><strong>Phone: </strong>214-645-1731</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-3">
                                <p><a href="http://www.utsouthwestern.edu/labs/wang-tao/"><img class="authorimg" src="images/taowang.png"></a>
                                </p></div>
                            <div class="col-sm-9" style="margin-top:15px;">
                                <ul style=" list-style-position: inside;">
                                    <li><strong>Author: </strong>Tao Wang</li>
                                    <li><strong>Email: </strong><a href="mailto:Tao.Wang@UTSouthwestern.edu">Tao.Wang@utsouthwestern.edu</a>
                                    </li>
                                    <li><strong>Phone: </strong>214-648-4082</li>
                                    <li><strong>Link: </strong><a href="http://www.utsouthwestern.edu/labs/wang-tao/">Tao
                                            Wang Lab</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Citation Section-->
                <div class="card sb-card bordershadow">
                    <div class="card-body">
                        <h3>Citation:</h3>
                        <p><i>"An Empirical Approach Leveraging Tumorgrafts to Dissect the Tumor Microenvironment in Renal Cell Carcinoma Identifies Missing Link to Prognostic Inflammatory Factors"</i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="fbg">
    <?php include "footer.php"; ?>
</div>
</body>
</html>
