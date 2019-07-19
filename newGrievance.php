<?php
session_start();
$dbname = "grievanceSystem";
$con = mysqli_connect("localhost","root","",$dbname);
if(!$con){
  die("Connection Failed :" + mysqli_connect_error());
}

$name = "";
$address = "";
$mobileNo = "";
$email = "";
$err="";
if(!strcmp($_SESSION['isUserLogin'], 'Y')){
  $sql = "SELECT   name, gender, address, phoneNo, mobileNo, email FROM user WHERE userName = '".$_SESSION['sess_user']."'";

  $result = $con->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $name = $row["name"];
          $address = $row["address"];
          $phoneNo = $row["phoneNo"];
          $mobileNo = $row["mobileNo"];
          $email = $row["email"];
      }
  }
}



if(isset($_POST['submit'])){
  if($_POST['GrievanceDescription'] == ""){
    $err =  "Enter a Grievance Description";
  }
    else{
      $dbname = "grievancesystem";
      $con = mysqli_connect("localhost","root","",$dbname);
      if(!$con){
        die("Connection Failed :" + mysqli_connect_error());
      }
      $date = date('Y-m-d H:i:s');
      if($_POST['Make'] == 0){
        $division = "Water Department";
        $subdivion = "Pipeline Blockage";
      }
    elseif($_POST['Make'] == 1){
      $division = "Water Department";
      $subdivion = "Pipeline Leakage";
    }
    elseif($_POST['Make'] == 2){
      $division = "Road Management";
      $subdivion = "Potholes";
    }
    elseif($_POST['Make'] == 3){
      $division = "Road Management";
      $subdivion = "Cleaning";
    }
    elseif($_POST['Make'] == 4){
      $division = "Road Management";
      $subdivion = "Reconstruction";
    }
    elseif($_POST['Make'] == 5){
      $division = "Road Management";
      $subdivion = "Speed Breaker";
    }
    elseif($_POST['Make'] == 6){
      $division = "Sewage & Waste Management";
      $subdivion = "Manhole";
    }
    elseif($_POST['Make'] == 7){
      $division = "Sewage & Waste Management";
      $subdivion = "Drainage Leakage";
    }
    elseif($_POST['Make'] == 8){
      $division = "Sewage & Waste Management";
      $subdivion = "Drainage Cleaning";
    }
    elseif($_POST['Make'] == 9){
      $division = "Sewage & Waste Management";
      $subdivion = "Drainage Repair";
    }
    elseif($_POST['Make'] == 10){
      $division = "Sewage & Waste Management";
      $subdivion = "Dead Animal";
    }
    elseif($_POST['Make'] == 11){
      $division = "Sewage & Waste Management";
      $subdivion = "Dustbin Installation";
    }

       $sql = "INSERT INTO grievancetable (ID  , userName  , name ,recievedDate, address, mobileNo , email ,description,department,subdivision,status) Values
       (NULL ,  '".$_SESSION['sess_user']."' , '".$name."' ,'".$date."' ,'".$address."' ,'".$mobileNo."' ,'".$email."' ,'".$_POST['GrievanceDescription']."' ,'".$division."' ,'".$subdivion."','Pending' )";

      //$sql = "INSERT INTO grievancetable (ID  , userName  , name ,recievedDate, address, mobileNo , email ,description,department,subdivision,status)"

      $query = mysqli_query($GLOBALS['con'],$sql);

      header("Location:http://127.0.0.1/grivanceSystem/loginPage.php");
    exit;
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
                                    <a href= loginPage.php ><i class="fa fa-home"></i> <strong>Home</strong></a>
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

<?php



if(!strcmp($_SESSION['isUserLogin'], 'N') ){
  echo '
  <section class="content">
      <div class="box box-warning">
          <div class="box-header with-border">
              <h3 class="box-title">
                  Grievance can now be lodged only by registered users.
              </h3>
          </div>
          <div class="box-body">
              <div class="text-center">
                  <i class="fa fa-warning fa-5x text-yellow"></i>
              </div>
              <div class="text-center">
                  <p class="text-red">
                      <strong>Grievance can now be lodged only by registered users..</strong>
                  </p>
              <p class="text-info">
                  <strong>If you are a registered user, then login to MGRA by providing Username and Password in <a href="index.php"> User Login</a> section of the home page.</strong>
              </p>
              <p class="text-orange">
                  <strong>Not yet registered! <a href="Registration.php"> Click here to register</a>.</strong>
              </p>
              </div>
              <br>
              <br>
              <div class="text-center">
                  <a href="index.php" class="btn btn-social btn-primary">
                      <i class="fa fa-arrow-circle-left"></i>
                      Home
                  </a>
              </div>
          </div>
      </div>
  </section>
  ';
}
else{
  echo   '
  <section class="content">



  <div id="myModal" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content panel-warning">
              <div class="modal-header panel-heading">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title">Confirmation</h4>
              </div>
              <div id="myModalBody" class="modal-body">
              </div>
              <div class="modal-footer">
                  <span id="results" class="hidden"></span>
                  <button type="button" id="btnok" class="btn btn-primary">OK</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </div>
          </div>
      </div>
  </div>

  <div id="fileWarnningModal" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content panel-danger">
              <div class="modal-header panel-heading">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title">Upload selected file first.</h4>
              </div>
              <div class="modal-body">
                  <h4 class="text-danger">A file is selected but not attached.Please click on Attache button to attached file  and submit again.</h4>
              </div>
              <div class="modal-footer">
                  <button id="fileCloseButton" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>

  <div class="box box-primary">
      <div class="box-header with-border">
          <h3 class="box-title text-info">Grievance registration form</h3>
          <span class="pull-right text-warning bold">Fields marked with <b class="text-danger">*</b> are mandatory.</span>
      </div><!-- /.box-header -->
      <div class="box-body">
          <form action="" autocomplete="off" id="form1" method="post" novalidate="novalidate">
              <fieldset>
                  <legend class="text-green">Personal and Communication Details</legend>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label class="col-md-12 required" for="Name">Name</label>
                              <div class="col-md-12">
                                  <input class="form-control text-box single-line valid" data-val="true" data-val-length="Name should be of minimum 1 and maximum 50 characters in length." data-val-length-max="50" data-val-length-min="1" data-val-onlywhitespace="Please provide valid Name" data-val-regex="Alphabet A-Z, a-z and special characters . - only are allowed." data-val-regex-pattern="^([^\s][A-Za-z\.\-\s]+)$" data-val-required="Please enter Your Name" id="Name" name="Name" type="text" value=' .$name.' aria-describedby="Name-error" aria-invalid="false">
                                  <span class="text-danger field-validation-valid" data-valmsg-for="Name" data-valmsg-replace="true"></span>
                              </div>
                          </div>
                          <!-- /.form-group -->
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                          <div class="form-group">
                              <label class="col-md-12 required" for="Gender">Gender</label>
                              <div class="col-md-12">
                                  <div class="row">
                                      <div class="col-md-3">
                                          <div class="iradio_line-blue checked"><input checked="checked" class="radio-inline" data-val="true" data-val-regex="Please choose a valid gender." data-val-regex-pattern="^[M|F|T]{1}$" data-val-required="Please choose a gender" id="Gender" name="Gender" type="radio" value="M" style="position: absolute; opacity: 0;"><div class="icheck_line-icon"></div>Male<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>

                                      </div>
                                      <div class="col-md-4">
                                          <div class="iradio_line-blue"><input class="radio-inline" id="Gender" name="Gender" type="radio" value="F" style="position: absolute; opacity: 0;"><div class="icheck_line-icon"></div>Female<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>

                                      </div>
                                      <div class="col-md-5">

                                          <div class="iradio_line-blue"><input class="radio-inline" id="Gender" name="Gender" type="radio" value="O" style="position: absolute; opacity: 0;"><div class="icheck_line-icon"></div>Transgender<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>

                                      </div>
                                  </div>

                                  <span class="field-validation-valid text-danger" data-valmsg-for="Gender" data-valmsg-replace="true"></span>
                              </div>
                          </div>
                          <!-- /.form-group -->
                      </div>
                      <!-- /.col -->
                  </div><!-- /.row -->


                <div class= "row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-12 required" for="Address1">Address</label>
                        <div class="col-md-12">
                            <input class="form-control text-box single-line" data-val="true" data-val-length="Maximum 50 characters are allowed in address." data-val-length-max="50" data-val-length-min="1" data-val-onlywhitespace="Please provide valid Address" data-val-regex="Alphabet A-Z, a-z, number 0-9 and special characters  , .  - ( )  : &amp; / only are allowed in address." data-val-regex-pattern="^([A-Za-z0-9 \-,.():&amp;/ \s]+)$" data-val-required="Address is required" id="Address1" name="Address1" type="text" value='.$address.'>
                            <span class="field-validation-valid text-danger" data-valmsg-for="Address1" data-valmsg-replace="true"></span>
                        </div>
                    </div>
                  </div>




                      <div class="col-md-6">
                          <div class="form-group">
                              <label class="col-md-12 required" for="EmailId">Email ID</label>
                              <div class="col-md-12">
                                  <input autocomplete="off" class="form-control text-box single-line" data-val="true" data-val-length="Enter valid Email Address" data-val-length-max="250" data-val-required="Please enter your email id." id="EmailId" name="EmailId" type="email" value='.$email.'>

                                  <span class="field-validation-valid text-danger" data-valmsg-for="EmailId" data-valmsg-replace="true"></span>
                              </div>
                          </div>
                      </div><!-- /.col -->
                  </div><!-- /.row -->
                  <div class="row">
                      <div class="col-md-6" id="divMobileNo">
                          <div class="form-group">
                              <label class="col-md-12 required" for="MobileNo">Mobile Number</label>
                              <div class="col-md-12">
                                  <input autocomplete="off" class="form-control text-box single-line" data-val="true" data-val-length="Mobile Number Should Be Upto 10 digits" data-val-length-max="10" data-val-regex="Enter Correct Mobile Number." data-val-regex-pattern="^[5|6|7|8|9]\d{9}$" data-val-requiredif="Please provide a 10 digits valid mobile number" data-val-requiredif-dependentproperty="Country" data-val-requiredif-dependentvalue="001" data-val-requiredif-operator="EqualTo" id="MobileNo" maxlength="10" name="MobileNo" placeholder="10 digits mobile number." type="text" value='. $mobileNo.'>

                                  <small class="text-info">Provide mobile number in order to receive SMS alerts related to your grievance.</small><br>
                                  <span class="field-validation-valid text-danger" data-valmsg-for="MobileNo" data-valmsg-replace="true"></span>
                              </div>
                          </div>
                      </div><!-- /.col -->
                      <div class="col-md-6">
                          <div class="form-group ">
                              <label class="col-md-12" for="PhoneNo">Phone Number</label>
                              <div class="col-md-12">
                                  <input class="form-control text-box single-line" data-val="true" data-val-regex="Please enter valid Phone Number" data-val-regex-pattern="[0-9-]{1,15}" id="PhoneNo" name="PhoneNo" type="text" value='.$phoneNo.'>
                                  <span class="field-validation-valid text-danger" data-valmsg-for="PhoneNo" data-valmsg-replace="true"></span>
                              </div>
                          </div>
                      </div><!-- /.col -->
                  </div><!-- /.row -->
              </fieldset>

              <fieldset>
                  <legend class="text-green">Grievance Details</legend>
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label class="col-md-12 required" for="ConcernAuthority">Concerned authority of grievance</label>
                              <div class="col-md-12">
                                  <div class="row">

                                    <select id="cmbMake" name="Make"   >

                                           <option value="0">Pipeline Blockage - Water Department</option>
                                           <option value="1">Pipeline Leakage - Water Department</option>
                                           <option value="2">Potholes - Road Management</option>
                                           <option value="3">Cleaning - Road Management</option>
                                           <option value="4">Reconstruction - Road Management</option>
                                           <option value="5">Speed Breaker - Road Management</option>
                                           <option value="6">Manhole - Sewage & Waste Management</option>
                                           <option value="7">Drainage Leakage - Sewage & Waste Management</option>
                                           <option value="8">Drainage Cleaning - Sewage & Waste Management</option>
                                           <option value="9">Drainage Repair - Sewage & Waste Management</option>
                                           <option value="10">Dead Animal - Sewage & Waste Management</option>
                                           <option value="11">Dustbin Installation - Sewage & Waste Management</option>

                                      </select>

                                  </div>
                                  <span class="field-validation-valid text-danger" data-valmsg-for="ConcernAuthority" data-valmsg-replace="true"></span>
                              </div>
                          </div>
                      </div><!-- /.col -->
                  </div><!-- /.row -->

                  </div>


                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label class="col-md-12 required" for="GrievanceDescription">Grievance Description</label>
                              <span class="text-info margin">(Alphabet A-Z, a-z, number 0-9 and special characters  , . - _ ( ) / : &amp; @ only are allowed in grievance description.)</span>
                              <div class="col-md-12">
                                      <span class="text-info">Maximum 4000 characters are allowed in description.</span></br>
                                      <span class="pull-right text-warning bold text-red" >'.$err.'.</span>
                                  <textarea class="form-control" cols="20" data-val="true" data-val-length="Grievance description should be of maximum 4000 characters." data-val-length-max="4000" data-val-onlywhitespace="Please provide valid Grievance Description" data-val-regex="Alphabet A-Z, a-z, number 0-9 and special characters  , . - _ ( ) / : &amp; @ only are allowed in grievance description." data-val-regex-pattern="^([A-Za-z0-9 \,\.\-_\(\)\:\&amp;\/\@\s]+)$" data-val-required="Please enter grievance description." id="GrievanceDescription" name="GrievanceDescription" rows="8"></textarea>
                                  <span class="field-validation-valid text-danger" data-valmsg-for="GrievanceDescription" data-valmsg-replace="true"></span>
                              </div>
                          </div>
                      </div><!-- /.col -->
                  </div><!-- /.row -->



              </fieldset>


              <div class="row">
                  <div class="col-md-12">
                      <p class="text-red">
                          <strong>I hereby state that the facts mentioned above are true to the best of my knowledge and belief.</strong>
                      </p>
                  </div>

              </div>
              <div class="row">
                  <div class="col-md-offset-4">
                      <div class="form-group">
                          <button type="submit" id="submit" name = "submit" class="btn btn-social btn-primary">
                              <i class="fa fa-save"></i>
                              Submit
                          </button>
                          <a class="btn btn-default btn-social" href="loginPage.php">
                              <i class="fa fa-arrow-circle-left"></i>Back to Home
                          </a>
                      </div>
                  </div><!-- /.col -->
              </div>
              <!-- /.row -->
  </form>
  </div><!-- /.box-body -->
      <div class="box-footer">
      </div>
  </div>
  <!-- /.box -->

                  </section>

  ';
}
?>


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
