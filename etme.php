<!DOCTYPE HTML>

<html>
<head>

    <title>eTME</title>
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
            //customize datatable item number in one page
            $("#documents").addClass("active");
            $('#definition').DataTable({
                "lengthMenu": [[10, 15, -1], [10, 15, "All"]]
            });
            //active clicked menu items in side bar
            $('.col-sm-3 li').click(function(){
                $('.col-sm-3 li').removeClass('active');
                $(this).addClass('active');
            });
            //add code panel feature
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
            <h2>Empirically-defined Immune Signature Genes in RCC Bulk Tumor</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item active">eTME Signatures</li>
            </ol>

            <!--Main Contents-->
            <div class="col-sm-9 bordershadow">

                <!--Description Section-->
                <div id="description" style="padding-top:20px">
                    <h2><span>Description</span></h2>
                    <div class="clr"></div>
                    <div class="clr"></div>
                    <p class="text-justify">Based on DisHet analysis of 35 RCC trio RNA-Seq data, we defined immune-specific genes with
                        empirical evidence, named eTME, for empirically-defined immune signature of tumor.  Using eTME,
                        we  refined  previously  published  Immunome  signatures. We also assigned other eTME genes to
                        specific immune cell types using the BLUEPRINT project data. These two sets of refined gene
                        signatures were consolidated and documented in the DisHet R package as the "eTME" immune cell
                        gene signatures.</p>
                </div>
                <hr>

                <!--Usage Section-->
                <div id="usage">
                    <h2><span>Usage</span></h2>
                    <div class="clr"></div>
                    <pre><code>data("eTME_signatures")</code></pre>
                    <div class="clr"></div>
                </div>
                <hr>

                <!--Argument List-->
                <div id="argument">
                    <h2><span>Format</span></h2>
                    <div class="clr"></div>
                    <table id="definition" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Vectors</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>M2 macrophages</td>
                            <td>a vector of genes that are abundantly expressed in M2 macrophages</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>M1 macrophages</td>
                            <td>a vector of genes that are abundantly expressed in M1 macrophages</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Macrophages</td>
                            <td>a vector of genes that are abundantly expressed in Macrophages</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Monocytes</td>
                            <td>a vector of genes that are abundantly expressed in Monocytes</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Thymocytes</td>
                            <td>a vector of genes that are abundantly expressed in Thymocytes</td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>Megakaryocyte cells</td>
                            <td>a vector of genes that are abundantly expressed in Megakaryocyte cells</td>
                        </tr>
                        <tr>
                            <th scope="row">7</th>
                            <td>save_last</td>
                            <td>Save the rho matrix updates for the last "save_last" Number of MCMC iterations.
                                The default value is 500.</td>
                        </tr>
                        <tr>
                            <th scope="row">8</th>
                            <td>B cells</td>
                            <td>a vector of genes that are abundantly expressed in B cells</td>
                        </tr>
                        <tr>
                            <th scope="row">9</th>
                            <td>CD8 T cells</td>
                            <td>a vector of genes that are abundantly expressed in CD8 T cells</td>
                        </tr>
                        <tr>
                            <th scope="row">10</th>
                            <td>T cells</td>
                            <td>a vector of genes that are abundantly expressed in T cells</td>
                        </tr>
                        <tr>
                            <th scope="row">11</th>
                            <td>Common lymphoid progenitors</td>
                            <td>a vector of genes that are abundantly expressed in Common
                                lymphoid progenitors</td>
                        </tr>
                        <tr>
                            <th scope="row">12</th>
                            <td>Dendritic cells</td>
                            <td>a vector of genes that are abundantly expressed in Dendritic cells</td>
                        </tr>
                        <tr>
                            <th scope="row">13</th>
                            <td>CD56dim NK cells</td>
                            <td>a vector of genes that are abundantly expressed in CD56dim NK cells</td>
                        </tr>
                        <tr>
                            <th scope="row">14</th>
                            <td>CD56bright NK cells</td>
                            <td>a vector of genes that are abundantly expressed in CD56bright NK cells</td>
                        </tr>
                        <tr>
                            <th scope="row">15</th>
                            <td>NK cells</td>
                            <td>a vector of genes that are abundantly expressed in NK cells</td>
                        </tr>
                        <tr>
                            <th scope="row">16</th>
                            <td>Endothelial cells</td>
                            <td>a vector of genes that are abundantly expressed in Endothelial cells</td>
                        </tr>
                        <tr>
                            <th scope="row">17</th>
                            <td>Erythroblasts</td>
                            <td>a vector of genes that are abundantly expressed in Erythroblasts</td>
                        </tr>
                        <tr>
                            <th scope="row">18</th>
                            <td>CD56dim NK cells</td>
                            <td>a vector of genes that are abundantly expressed in CD56dim NK cells</td>
                        </tr>
                        <tr>
                            <th scope="row">19</th>
                            <td>Eosinophils</td>
                            <td>a vector of genes that are abundantly expressed in Eosinophils</td>
                        </tr>
                        <tr>
                            <th scope="row">20</th>
                            <td>Neutrophils</td>
                            <td>a vector of genes that are abundantly expressed in Neutrophils</td>
                        </tr>
                        <tr>
                            <th scope="row">21</th>
                            <td>Treg cells</td>
                            <td>a vector of genes that are abundantly expressed in Treg cells</td>
                        </tr>
                        <tr>
                            <th scope="row">22</th>
                            <td>Th1 cells</td>
                            <td>a vector of genes that are abundantly expressed in Th1 cells</td>
                        </tr>
                        <tr>
                            <th scope="row">23</th>
                            <td>Th2 cells</td>
                            <td>a vector of genes that are abundantly expressed in Th2 cells</td>
                        </tr>
                        <tr>
                            <th scope="row">24</th>
                            <td>Th cells</td>
                            <td>a vector of genes that are abundantly expressed in Th cells</td>
                        </tr>
                        <tr>
                            <th scope="row">25</th>
                            <td>aDCs</td>
                            <td>a vector of genes that are abundantly expressed in aDCs</td>
                        </tr>
                        <tr>
                            <th scope="row">26</th>
                            <td>iDCs</td>
                            <td>a vector of genes that are abundantly expressed in iDCs</td>
                        </tr>
                        <tr>
                            <th scope="row">27</th>
                            <td>pDCs</td>
                            <td>a vector of genes that are abundantly expressed in pDCs</td>
                        </tr>
                        <tr>
                            <th scope="row">28</th>
                            <td>Mast cells</td>
                            <td>a vector of genes that are abundantly expressed in Mast cells</td>
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
                    <pre><code>data(eTME_signatures)
eTME_signatures$Macrophages
eTME_signatures$'T cells'</code></pre>
                    <div class="clr"></div>
                </div>

            </div> <!--End of main Contents-->

            <!--Side Menu-->
            <div class="col-sm-3">
                <nav class="nav-sidebar">
                    <ul class="nav" style="background:#8380801a">
                        <li class="active"><a href="#description">Description</a></li>
                        <li><a href="#usage">Usage</a></li>
                        <li><a href="#argument">Format</a></li>
                        <li><a href="#example">Examples</a></li>
                        <li class="nav-divider"></li>
                        <li><a href="https://cran.r-project.org/web/packages/DisHet/DisHet.pdf" class="btn btn-primary active" style="color:white; font-weight: bold">
                                <img src="images/downarrow.png" alt="arrow" style="float:right;height:16px;padding-top:3px;padding-left:10px">Download eTME_signature<br>
                            </a>
                        </li>
                    </ul>
                </nav><br>
            </div>
            <br>
        </div>
        <div class="clr"></div>
    </div>
    <br><br></div>
<div class="fbg">
    <?php include "footer.php"; ?>
</div>
</body>
</html>