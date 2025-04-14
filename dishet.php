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
            //customize datatable item number in one page
            $("#documents").addClass("active");
            $('#definition').DataTable({
                "lengthMenu": [[3, 5, 10, 15, -1], [3, 5, 10, 15, "All"]]
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
            <h2>Heterogeneity Dissection</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item active">DisHet</li>
            </ol>

            <!--Main Contents-->
            <div class="col-sm-9 bordershadow">

                    <!--Description Section-->
                    <div id="description" style="padding-top:20px">
                        <h2><span>Description</span></h2>
                        <div class="clr"></div>
                        <div class="clr"></div>
                        <p class="text-justify">This function performs dissection of bulk sample gene expression using matched normal and tu-
                            morgraft RNA-seq data. It outputs the final proportion estiamtes of the three components for
                            all patients.</p>
                        <p class="text-justify">The patient-specific dissection proportion estimates are saved in a 3-by-k matrix named
                            "rho", where k is the number of patients. The 3 rows of "rho" matrix correspond to the tumor,
                            normal, stroma components in order. That is, the proportion estimate of tumor component for patient
                            i is stored in rho[1,i]; the normal component proportion estimate of this patient is stored in
                            rho[2,i];and stroma component proportion in rho[3,i].</p>
                    </div>
                    <hr>

                    <!--Usage Section-->
                    <div id="usage">
                        <h2><span>Usage</span></h2>
                        <div class="clr"></div>
                        <pre><code>DisHet (exp_T, exp_N, exp_G, save=TRUE, MCMC_folder, n_cycle=10000,
        save_last=500,mean_last=200, dirichlet_c=1, S_c=1, rho_small=1e-2,
        initial_rho_S=0.02, initial_rho_G=0.96, initial_rho_N=0.02)</code></pre>
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
                                <td>save</td>
                                <td>When save==TRUE, as in default, all component proportion estimates during
                                    MCMC iterations can be saved into a user-specified directory using the "MCMC_folder"
                                    argument.
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>MCMC_folder</td>
                                <td>Directory for saving the estimated mixture proportion matrix updates during
                                    MCMC iterations. The default setting is to create a "DisHet" folder under the
                                    current working directory.
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>n_cycle</td>
                                <td>Number of MCMC iterations(chain length). The default value is 10,000.</td>
                            </tr>
                            <tr>
                                <th scope="row">7</th>
                                <td>save_last</td>
                                <td>Save the rho matrix updates for the last "save_last" Number of MCMC iterations.
                                    The default value is 500.
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">8</th>
                                <td>mean_last</td>
                                <td>Calculate the final proportion estiamte matrix using the last "mean_last" number
                                    of MCMC iterations. The default value is 200.
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">9</th>
                                <td>dirichlet_c</td>
                                <td>Stride scale in sampling rho. Larger value leads to smaller steps in sampling
                                    rho. The default value is 1.
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">10</th>
                                <td>S_c</td>
                                <td>Stride scale in sampling Sij. Larger value leads to larger steps in sampling Sij.
                                    The default value is 1.
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">11</th>
                                <td>rho_small</td>
                                <td>The smallest rho updates allowed during MCMC. The default is 1e-2. This
                                    threshold is set to help improve numerical stability of the algorithm.
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">12</th>
                                <td>initial_rho_S</td>
                                <td>Initial value of the proportion estimate for the stroma component. The default
                                    value is 0.02.
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="clr"></div>
                    </div>
                    <hr>

                    <!--Details Section-->
                    <div id="detail">
                        <h2><span>Details</span></h2>
                        <div class="clr"></div>
                        <p>Un-logged expression values should be used in exp_N/T/G matrices, and their rows and columns
                            must match each other corresponding to the same set of genes and patients.
                        </p>
                        <p>The values specified for "initial_rho_S", "initial_rho_G", and "initial_rho_S" all have to be
                            positive.
                            If the three proportion initials are not summing to 1, normalization is performed
                            automatically to
                            force the sum to be 1.
                        </p>
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

rho <- DisHet(exp_T, exp_N, exp_G, save=FALSE, n_cycle=500, mean_last=50);</code></pre>
                        <div class="clr"></div>
                    </div>

            </div> <!--End of main Contents-->

            <!--Side Menu-->
            <div class="col-sm-3">
                <nav class="nav-sidebar">
                    <ul class="nav" style="background:#8380801a">
                        <li class="active"><a href="#description">Description</a></li>
                        <li><a href="#usage">Usage</a></li>
                        <li><a href="#argument">Arguments</a></li>
                        <li><a href="#detail">Details</a></li>
                        <li><a href="#example">Examples</a></li>
                        <li class="nav-divider"></li>
                        <li><a href="https://cran.r-project.org/web/packages/DisHet/DisHet.pdf" class="btn btn-primary active" style="color:white; font-weight: bold">
                                <img src="images/downarrow.png" alt="arrow" style="float:right;height:16px;padding-top:3px;padding-left:10px">Download DisHet<br>
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