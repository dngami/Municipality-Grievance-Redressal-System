
<?php
session_start();
  $err = '';
  if (isset($_POST['submit'])) {

    if(!strcmp($_SESSION['isUserLogin'],"N")){
      echo '<script type="text/javascript">
      alert("you are not logged in")
    </script>';

    }else{
      if(strcmp($_POST['registrationNo'],"") && strcmp($_POST['email'],"")  ){
        $ID = $_POST['registrationNo'];
        $link = "http://127.0.0.1/grivanceSystem/grievanceStatus.php?ID=" . $ID;
        header("Location:$link");
        exit; // <- don't forget this!
      }else{
            $err = '*All fields are required';
      }
    }



  }


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



  <div class="container-fluid">
      <div class="panel panel-primary">
          <div class="panel-heading text-center">
              View Status
          </div>
          <div class="panel-body">
              <span class="pull-right text-primary"><strong>Fields marked with <b class="text-danger">*</b> are mandatory.</strong></span>
              <hr>
          </div>
  <form action="" autocomplete="off" id="form1" method="post" novalidate="novalidate">
     <div class="form-horizontal">

                  <div class="form-group">

                      <label class="col-md-4 required text-right" for="RegistrationNo">Registration number</label>
                      <div class="col-md-6">
                          <input class="form-control text-box single-line"  id="RegistrationNo" maxlength="20" name="registrationNo" onkeypress="myFocus();" onkeyup="myFocus();"  type="text" value="" required>
                          <!-- <span class="field-validation-valid text-danger" data-valmsg-for="RegistrationNo" data-valmsg-replace="true"></span> -->
                      </div>
                  </div>
                  <hr style="height:1px;border:none;color:#467cbf;background-color:#467cbf;">


                  <div>
                      <div class="form-group">

                          <label class=" col-md-4 text-right eitherOrRequired" for="EmailOrMobileno">Email id/Mobile number</label>
                          <div class="col-md-6">
                              <input class="form-control text-box single-line" data-val="true" data-val-length="Enter valid Email Id/Mobile Number" data-val-length-max="250" id="EmailOrMobileno" name="email" type="text" value="" required="required">
                              <span class="field-validation-valid text-danger" data-valmsg-for="EmailOrMobileno" data-valmsg-replace="true"></span>
                          </div>
                      </div>
                  </div>
                  <hr style="height:1px;border:none;color:#467cbf;background-color:#467cbf;">
                  <div class="form-group">
                    <br>
                  </div>
                  <div class="form-group">
                      <div class="col-md-4">
                          <span class="pull-right text-warning bold text-red" ><?php echo $err; ?></span>
                      </div>
                      <div class="col-md-8">

                          <button class="btn btn-primary btn-social" type="submit" id="btnpop" name="submit">
                              <i class="fa fa-save"></i> submit
                          </button>

                      </div>
                  </div>

      </div>
  </form>    </div>
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
