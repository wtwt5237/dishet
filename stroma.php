<!DOCTYPE HTML>

<html>
<head>

    <title>Dishet</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jquery.dataTable.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:700italic,400,300,700' rel='stylesheet'
          type='text/css'>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-1.12.4.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <!--    [if lt IE 9]-->
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <!--    [endif]-->
    <script>
        $(document).ready(function () {
            $("#documents").addClass("active");
            $('#definition').DataTable({
                "bLengthChange": false,
                searching: false,
                "paging": false,
                "bInfo" : false
            });
            $('.col-sm-3 li').click(function(){
                $('.col-sm-3 li').removeClass('active');
                $(this).addClass('active');
            });
            (function() {
                var pre = document.getElementsByTagName('pre'),
                    pl = pre.length;
                for (var i = 0; i < pl; i++) {
                    pre[i].innerHTML = '<span class="line-number"></span>' + pre[i].innerHTML + '<span class="cl"></span>';
                    var num = pre[i].innerHTML.split(/\n/).length;
                    for (var j = 0; j < num; j++) {
                        var line_num = pre[i].getElementsByTagName('span')[0];
                        line_num.innerHTML += '<span>' + (j + 1) + '</span>';
                    }
                }
            })();
        });
    </script>
</head>

<body>
<div class="main">
    <?php include "menu.php" ?>
    <div class="clr"></div>
    <div class="content">
        <div class="content_resize">
            <h2>Stroma (Immune) Component Gene Expression Estimation</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item active">Stroma</li>
            </ol>

            <!--Main Contents-->
            <div class="col-sm-9 bordershadow">
                <div class="article">

                    <!--Description Section-->
                    <div id="description" style="padding-top:20px">
                        <h2><span>Description</span></h2>
                        <div class="clr"></div>
                        <p>This function estimate the stroma component gene expression profiles of all patients, using
                            the
                            proportion estimates obtained from function DisHet. The estimates are stored in a p-by-k
                            matrix,
                            where p is the number of genes and k is the number of patients.The order of genes and the
                            order of
                            patients are the same as in the input bulk sample expression matrix</p>
                    </div>
                    <hr>

                    <!--Usage Section-->
                    <div id="usage">
                        <h2><span>Usage</span></h2>
                        <div class="clr"></div>
                        <pre><code>StromaExp (exp_T,exp_N,exp_G, rho)</code></pre>
                        <div class="clr"></div>
                    </div>
                    <hr>

                    <!--Argument List-->
                    <div id="argument">
                        <h2><span>Arguments</span></h2>
                        <div class="clr"></div>
                        <table id="definition" class="display" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                            <th>#</th>
                            <th>Value</th>
                            <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>exp_T</td>
                                <td>Gene expression in bulk RNA-seq samples. The rows correspond to different
                                    genes. The columns correspond to different patients.
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>exp_N</td>
                                <td>Gene expression in the corresponding normal samples. The rows list the same
                                    set of genes as in exp_G. The columns correspond to patients matched with
                                    exp_T.
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>exp_G</td>
                                <td>Gene expression in the corresponding tumor samples. The rows list the same set
                                    of genes as in exp_G. The columns correspond to patients matched with exp_T
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>rho</td>
                                <td>Output from function DisHet: the patient-specific proportion estimates corresponding
                                    to tumor, normal, stroma components in order.
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="clr"></div>
                    </div>
                    <hr>

                    <!--Examples Section-->
                    <div id="example">
                        <h2><span>Examples</span></h2>
                        <div class="clr"></div>
                        <pre><code>load(system.file("example/example_data.RData",package="DisHet"));
exp_T <- exp_T[1:200,];
exp_N <- exp_N[1:200,];
exp_G <- exp_G[1:200,];

rho <- DisHet(exp_T, exp_N, exp_G, save=FALSE, n_cycle=500, mean_last=50);

S <- StromaExp(exp_T,exp_N,exp_G, rho)</code></pre>
                        <div class="clr"></div>
                    </div>
                </div>
            </div>


            <!--Side Menu-->
            <div class="col-sm-3" id="leftCol">
                <nav class="nav-sidebar">
                    <ul class="nav" style="background:#8380801a">
                        <li class="active"><a href="#description">Description</a></li>
                        <li><a href="#usage">Usage</a></li>
                        <li><a href="#argument">Arguments</a></li>
                        <li><a href="#example">Examples</a></li>
                        <li class="nav-divider"></li>
                        <li><a href="https://cran.r-project.org/web/packages/DisHet/DisHet.pdf"
                               class="btn btn-primary active" style="color:white; font-weight: bold">
                                <img src="images/downarrow.png" alt="arrow"
                                     style="float:right;height:16px;padding-top:3px;padding-left:10px">Download StromaExp<br>
                            </a>
                        </li>
                    </ul>
                </nav><br>
            </div>
            <div class="clr"></div>
        </div>
    </div><br><br>
</div>
<div class="fbg">
    <?php include "footer.php"; ?>
</div>
</body>
</html>