<?php
session_start();


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <noscript>
        <meta http-equiv="refresh" content="0;url=/NoJScript" />
    </noscript>
    <title>MGRA-Home</title>
    <!-- Bootstrap 3.3.6 -->
    <link href="./Content/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="./Content/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link href="./Content/admin-lte/css/AdminLTE.min.css" rel="stylesheet" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link href="./Content/admin-lte/css/skins/_all-skins.min.css" rel="stylesheet" />
    <!-- jQuery -->
    <script src="./Scripts/jquery-3.3.1.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="./Content/Style.css" rel="stylesheet" />



    <meta name="description" content="The description of my page" />
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="./images/favicon.ico" type="image/x-icon">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">

    <div class="header-wrapper">
        <div class="container header-container">
            <h1 class="logo" align="center">
                <img class="national_emblem" src="./Images/gov_of_assam.png" height="90px" alt="national emblem">
                <span class="ad4 text-capitalize" style="font-size: 65%; color: #000; font-weight: 600; width: 85%">Government of Assam</span>

                <span class="ad4 text-capitalize" style="font-size: 65%; color: #000; font-weight: 600; width: 85%">Municipal Corporation of Guwahati ,Assam</span>
                <br />

                <span class="ad4 text-capitalize" style="font-weight: 900; color: orangered">Municipality Grievance Redressal System</span>

            </h1>
            <div class="header-right clearfix">
                <div class="right-content clearfix">
                    <div class="float-element">
                        <a class="sw-logo" target="_blank" href= "https://gmc.assam.gov.in/" title="Guwahati Municipal Corporation">
                            <img src="./Images/gmc_logo.jpg" height="90px" alt="GMC">
                        </a>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="wrapper" >
        <header class="main-header">
            <nav class="navbar navbar-static-top bg-blue-active">
                <div class="container">
                    <div class="navbar-header">

                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                          <li><a href="
                            <?php
                            $home = 'index.php';
                            if (strcmp($_SESSION['isUserLogin'],"N")) {
                                $home = 'loginPage.php';
                            }
                            echo $home;
                            ?>
                            "><i class="fa fa-home"></i> <strong>Home</strong></a>
                          </li>
                            <li><a href="aboutUs.php"><strong><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;About Us</strong></a></li>
                            <li><a href="status.php"><strong><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;View Status</strong></a></li>
                            <li><a href="newGrievance.php" class="dropdown-toggle" data-toggle="dropdown"><strong><i class="fa fa-file-o" aria-hidden="true"></i>&nbsp;Grievance </strong> <span class="caret"></span></a></li>
                            <li ><a href="flow.php" class="dropdown-toggle" data-toggle="dropdown"><strong><i class="fa fa-road" aria-hidden="true"></i>&nbsp;Redress Process</strong> <span class="caret"></span></a></li>
                            <li ><a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong><i class="fa fa-book" aria-hidden="true"></i>&nbsp;Guidelines</strong> <span class="caret"></span></a></li>
                            <li><a href="faq.php"><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;<strong>FAQ</strong></a></li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->

                            </li>

                        </ul>
                    </div>
                    <!-- /.navbar-custom-menu -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </header>
        <!-- Full Width Column -->
        <div class="content-wrapper">
            <div class="container">

                <!-- Main content -->
                <section class="content">


  <div class="box box-info">
      <div class="box-header with-border">
          <h3 class="box-title text-blue">About Us</h3>
      </div>
      <div class="box-body">
          <div class="row">
              <div class="col-md-12">
                  <p>
                      The grievances received by the Department are forwarded to the concerned sub divisions, who are dealing with the substantive function linked with the grievance for redress under intimation to the complainant. The Department ‘takes up’ depending upon the seriousness of the grievance and follows them regularly till their final disposal. This enables the Department to evaluate the effectiveness of the grievance redress machinery of the concerned  agency.
                      <b>Department of  Public Grievances</b> is the nodal agency to formulate policy guidelines for citizen-centric governance in the locality. Redress of citizen's grievances, being one of the most important initiatives of the department,  formulates public grievance redress mechanisms for effective and timely redress / settlement of citizen's grievances.
                  </p>
                  <br>
                  <br>
                  <p>
                      This is a  Portal aimed at providing the citizens with a platform for redress of their grievances. If you have any grievance against any department organization in the city, you may lodge your grievance here which will go to the respective division concerned for immediate redress.
                  </p>
                  <br>
                  <p>
                      Any query/comments/discrepancies may be communicated to Department  Public Grievances as per the following Contact Address:
                      <br><br>
                      </p><address class="text-center">
                          Ms Priya <br>
                          Deputy Secretary<br>
                          Department of  Public Grievances, Muncipal Corporation<br>
                          Guwahati, Assam 781039<br>
                          Phone - (361) 25830000<br>
                          <br>
                      </address>
                  <p></p>
                  <hr>
                  <div class="panel panel-danger">
                      <div class="panel-heading text-center">
                          <b>Disclaimer</b>
                      </div>
                      <div class="panel-body bg-danger">
                          <p>This Site is Designed, Developed &amp; Hosted by IIT Guwahati Content owned, maintained and updated by Department of  Public Grievances. While all efforts have been made to make this Website as authentic as possible, the Department of Public Grievances or the IITG Guwahati will not be responsible for any loss to any person caused by any shortcoming, defect or inaccuracy in the information available on this Website.  </p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
                  </section>
                <!-- /.content -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer bg-light-blue-active">
            <div class="container">

                <div class="row">
                    <div class="col-md-6">
                        <a href="#"><strong style="color: #ffffff">Contact Us : </strong>  </a>
                        <br />
                        <a href="#"><strong style="color: #ffffff">Disclaimer</strong></a>
                        <br />
                        <b>Version</b> 1.1, <strong>Copyright &copy; </strong> 2019
                    </div>
                    <div style="line-height: 18px;border-left:solid 1px #668aee" class="col-md-6">

                                <span>This site is designed, developed, hosted and maintained by <br /><a target="_blank" href="http://www.iitg.ac.in/"><img alt="IITG Logo" src='./Images/IIT_Guwahati_Logo.svg_.png' height="50pt" width="50pt" /></a> Department of Computer Science and Technology,<br>Indian Institute of Technology, Guwahati.</span>

                    </div>
                </div>
            </div>
            <!-- /.container -->
        </footer>
    </div>
    <!-- ./wrapper -->
    <!-- Bootstrap -->
    <script src="/Scripts/bootstrap.min.js"></script>
    <!-- SlimScroll -->

    <!-- FastClick -->

    <!-- AdminLTE App -->
    <script src="/Scripts/app.min.js"></script>
    <script src="/Scripts/Custom/Browser.js"></script>
    <script src="/Scripts/Custom/RefreshCaptcha.js"></script>
    <script src="/Scripts/Custom/SubmitButtonDesable.js"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support -->
    <script src="/sweetAlert2/promise.min.js"></script>
    <script src="/sweetAlert2/sweetalert2.all.min.js"></script>


    <script src="/Scripts/jquery.validate.min.js"></script>
    <script src="/Scripts/jquery.validate.unobtrusive.min.js"></script>
    <script src="/Scripts/sha256.min.js"></script>
    <script src="/Scripts/sha512.js"></script>
    <script src="/Scripts/Custom/DesableEnterKey.js"></script>
    <script src="/Scripts/Custom/customValidationAttribute.js"></script>
