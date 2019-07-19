<?php

    $dbname = "grievanceSystem";
    $con = mysqli_connect("localhost","root","",$dbname);
    if(!$con){
      die("Connection Failed :" + mysqli_connect_error());
    }

    $err ='';

    if(isset($_POST['btnSubmit'])){

        if ( !(strcmp($_POST['userName'],'') && strcmp($_POST['password'],'')&&strcmp($_POST['name'],'')&&strcmp($_POST['gender'],'')&&strcmp($_POST['Address1'],'')&&strcmp($_POST['mobileNo'],'')&&strcmp($_POST['email'],'')) ) {
          $err= 'All fields with '. '*' .' are compulsory';
        }else{
          $sql = "SELECT * FROM user WHERE username = '".$_POST["userName"]."' or mobileNo = '".$_POST["mobileNo"]."' or email = mobileNo = '".$_POST["email"]."' ";
          $query = mysqli_query($GLOBALS['con'],$sql);
          if ($query->num_rows == 0){
              echo "Already existed";
          }else{
            $sql = "INSERT INTO user (ID  , userName , password , name ,gender, address,phoneNo, mobileNo , email , grievance) Values
           (NULL  , '".$_POST["userName"]."' , '".$_POST["password"]."' ,'".$_POST["name"]."' ,'".$_POST["gender"]."' ,'".$_POST["Address1"]."' ,'".$_POST["phoneNo"]."' ,'".$_POST["mobileNo"]."' ,'".$_POST["email"]."' ,DEFAULT )";
            $query = mysqli_query($GLOBALS['con'],$sql);

            header("Location:http://127.0.0.1/grivanceSystem/index.php");
            echo '<script type="text/javascript">
            alert("you are not logged in")
            </script>';

            exit; // <- don't forget this!

            mysqli_close($con);
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
                          <li>
                                  <a href="index.php"><i class="fa fa-home"></i> <strong>Home</strong></a>
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





  <div class="panel panel-primary">
      <div class="panel-heading text-center">
          Registration/Sign up Form
      </div>

      <div class="panel-body">

          <span class="pull-left text-primary"><strong>Enter Details</strong></span>
          <span class="col-md-4  text-primary "><strong></strong></span>
          <span class="col-md-4 pull-left text-primary text-warning bold text-red"><strong><?php echo $err;?></strong></span>
          <span class="pull-right text-primary"><strong>Fields marked with <b class="text-danger">*</b> are mandatory</strong></span>
          <hr>
          <form action="" enctype="multipart/form-data" autocomplete="off" id="form1" method="post" novalidate="novalidate"  ><input name="__RequestVerificationToken" type="hidden" value="6yF3QE-vhCvMQSy6GFpbcrp9ECnJCgrkR7he7H-gwjEmE3oIjPfNVHukv424HcWgRFT4cnz5Y-E7l4nF39doMHGvSbfrcwIdF744ev4Go18ppKSBwi0N7etfCBsUWpbJ0">            <div class="form-horizontal">

                  <div class="form-group">
                      <label class="col-md-4 text-right required" for="Name">Name</label>
                      <div class="col-md-6">
                          <input autocomplete="off" class="form-control text-box single-line" data-val="true" data-val-length="Name cannot be longer than 65 characters" data-val-length-max="50" data-val-onlywhitespace="Please provide a valid Name" data-val-regex="Alphabet A-Z, a-z and special characters . - only are allowed." data-val-regex-pattern="^([A-Za-z\.\-\s]+)$" data-val-required="Please enter name" id="Name" name="name" type="text" value="" required>
                          <span class="field-validation-valid text-danger" data-valmsg-for="Name" data-valmsg-replace="true"></span>
                      </div>
                  </div>

                  <!-- <div class="form-group">
                      <label class="col-md-4 text-right required" for="Sex">Gender</label>
                      <div class="col-md-6">
                          <div class="row">

                              <select name="gender">
                               <option value="m">Male</option>
                               <option value="f">Female</option>
                               <option value="o">Transgender</option>
                              </select>
                          </div>

                          <span class="field-validation-valid text-danger" data-valmsg-for="Sex" data-valmsg-replace="true"></span>
                      </div>
                  </div> -->

                  <div class="form-group">
                      <label class="col-md-4 text-right required" for="Gender">Gender</label>
                      <div class="col-md-6">
                          <input autocomplete="off" class="form-control text-box single-line" data-val="true" data-val-length="Gender cannot be longer than 65 characters" data-val-length-max="50" data-val-onlywhitespace="Please provide a valid Gender" data-val-regex="Alphabet A-Z, a-z and special characters . - only are allowed." data-val-regex-pattern="^([A-Za-z\.\-\s]+)$" data-val-required="Please enter name" id="Gender" name="gender" type="text" value="" required>
                          <span class="field-validation-valid text-danger" data-valmsg-for="Gender" data-valmsg-replace="true"></span>
                      </div>
                  </div>


                  <div class="form-group">
                      <label class="col-md-4 text-right required" for="Address1">Address</label>
                      <div class="col-md-6">
                          <input placeholder="Premise Number or Name" autocomplete="off" class="form-control text-box single-line"  id="Address1" name="Address1" type="text" value="">
                          <span class="field-validation-valid text-danger" data-valmsg-for="Address1" data-valmsg-replace="true"></span>
                      </div>
                  </div>



                  <div class="form-group">
                      <label class="col-md-4 text-right required" for="Name">District</label>
                      <div class="col-md-6">
                          <input autocomplete="off" class="form-control text-box single-line"  id="district" name="District" type="text" value="">
                          <span class="field-validation-valid text-danger" data-valmsg-for="Name" data-valmsg-replace="true"></span>
                      </div>
                  </div>

                  <div id="divPincode" class="form-group">
                      <label class="col-md-4 text-right" for="Pincode">Pincode</label>
                      <div class="col-md-6">
                          <input autocomplete="off" class="form-control text-box single-line" id="Pincode" maxlength="6" name="Pincode" type="text" value="">
                          <span class="field-validation-valid text-danger" data-valmsg-for="Pincode" data-valmsg-replace="true"></span>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-md-4 text-right" for="PhoneNo">Phone number</label>
                      <div class="col-md-6">
                          <input autocomplete="off" class="form-control text-box single-line" id="PhoneNo" maxlength="15" name="phoneNo" placeholder="Phone number with STD code. (e.g 011XXXXXXXX)" type="number" value="">
                          <span class="field-validation-valid text-danger" data-valmsg-for="PhoneNo" data-valmsg-replace="true"></span>
                      </div>
                  </div>


                  <div id="divMobileNo" class="form-group">
                      <label class="col-md-4 text-right required" for="MobileNo">Mobile number</label>
                      <div class="col-md-6">
                          <input autocomplete="off" class="form-control text-box single-line"  id="MobileNo" maxlength="10" name="mobileNo" placeholder="10 digit mobile number." type="number" value="">
                          <span class="field-validation-valid text-danger" data-valmsg-for="MobileNo" data-valmsg-replace="true"></span>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-md-4 text-right required" for="EmailAddress">E-mail address</label>
                      <div class="col-md-6">
                          <input autocomplete="off" class="form-control text-box single-line"  id="EmailAddress" name="email" type="email" value="">
                          <span class="field-validation-valid text-danger" data-valmsg-for="EmailAddress" data-valmsg-replace="true"></span>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-md-4 text-right required" for="Username">Username</label>
                      <div class="col-md-6">
                          <input autocomplete="off" class="form-control text-box single-line" data-val="true" data-val-length="Username cannot be longer than 65 characters" data-val-length-max="50" data-val-onlywhitespace="Please provide a valid Username" data-val-regex="Alphabet A-Z, a-z and special characters . - only are allowed." data-val-regex-pattern="^([A-Za-z\.\-\s]+)$" data-val-required="Please enter name" id="Username" name="userName" type="text" value="" required>
                          <span class="field-validation-valid text-danger" data-valmsg-for="Username" data-valmsg-replace="true"></span>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-md-4 text-right required" for="Password">Password</label>
                      <div class="col-md-6">
                          <input autocomplete="off" class="form-control text-box single-line" data-val="true" data-val-length="Password cannot be longer than 65 characters" data-val-length-max="50" data-val-onlywhitespace="Please provide a valid Password" data-val-regex="Alphabet A-Z, a-z and special characters . - only are allowed." data-val-regex-pattern="^([A-Za-z\.\-\s]+)$" data-val-required="Please enter name" id="Password" name="password" type="password" value="" required>
                          <span class="field-validation-valid text-danger" data-valmsg-for="Password" data-valmsg-replace="true"></span>
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="col-md-4">
                      </div>
                      <div class="col-md-6">
                          <button type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-primary btn-social">
                              <i class="fa fa-save"></i> Submit
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
