    <?php
    session_start();
    $err_invalid= "";
    $_SESSION['isUserLogin'] = "N";


        if(isset($_POST["submit"])){

        if(!empty($_POST['userName']) && !empty($_POST['password'])) {
            $user=$_POST['userName'];
            $pass=$_POST['password'];

            $dbname = "grievanceSystem";
            $con = mysqli_connect("localhost","root","",$dbname);
            if(!$con){
              die("Connection Failed :" + mysqli_connect_error());
            }

            $sql = "SELECT * FROM user WHERE username='".$user."' AND password='".$pass."'";
            $query = mysqli_query($GLOBALS['con'],$sql);
            $numrows=mysqli_num_rows($query);
            if($numrows!=0)
            {
              while($row=mysqli_fetch_assoc($query))
              {
              $dbusername=$row['userName'];
              $dbpassword=$row['password'];
              $dbname = $row['name'];
              }

              if($user == $dbusername && $pass == $dbpassword)
              {

                $_SESSION['sess_user']=$user;
                $_SESSION['sess_name']=$dbname;

                $_SESSION['isUserLogin'] = "Y";


                /* Redirect browser */
                header("Location: loginPage.php");
                exit;
              }
            } else {
              $err_invalid =  "Invalid username or password!";
              }

        } else {
            $err_invalid= "All fields are required!";
          }
        }


        $dbname = "grievanceSystem";
        $con = mysqli_connect("localhost","root","",$dbname);
        if(!$con){
          die("Connection Failed :" + mysqli_connect_error());
        }

        $totalCount=$disposalCount = 0;
        $sql = "SELECT * FROM grievancetable" ;
        $query = mysqli_query($GLOBALS['con'],$sql);

        $totalCount=mysqli_num_rows($query);


        $sql = "SELECT * FROM grievancetable WHERE status LIke 'Completed%' " ;
        $query = mysqli_query($GLOBALS['con'],$sql);

        $disposalCount=mysqli_num_rows($query);



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
                            <li><a href="index.php"><i class="fa fa-home"></i> <strong>Home</strong></a></li>
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

<div class="row">
    <div class="col-md-3">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
<form action="/" method="post">                            <div class="form-group">
                                <label>Select Language</label>
                                <div>
                                    <input checked="checked" id="language_en" name="language" onchange="this.form.submit();" type="radio" value="en" /> English
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                            </div>
</form>

                        <a  title="External link open in a new tab" class="btn btn-block btn-pinterest btn-social btn-lg hidden" href ="/Status">
                            <i class="fa fa-external-link"></i>&nbsp;
                                <strong class="text-left">View Status</strong><br />
                        </a>
                    </div>

                </div>


                <fieldset style="border-color: blue">
                    <legend class="bg-orange roundedcorner">
                        <div  class="box-body">
                            <h4 class="no-margin text-bold"><i class="fa fa-user"></i> User Login</h4>
                        </div>
                    </legend><br/>



                            <div class="row">


                                    <div class="box-body">
<form action="" method="post"><input name="__RequestVerificationToken" type="hidden" value="l_U13hqgteeGQYc47jnN44OeIayO64iMdiiDZMTopLwxVc3ZSZChlhKcFbQUhF9U9prMJ2pHlNHGhFZOdtzeYTbEbylBGTKPjzT7BQwlWbtIfJoR-JwkpMXw-qTb996V0" />
<label for="Username">Mobile No/Email Id/Username</label>                                            <div class="form-group has-feedback">
                                                <input autocomplete="off" class="form-control" data-val="true" data-val-maxlength="Please enter a valid user name." data-val-maxlength-max="100" data-val-onlywhitespace="Please provide valid Mobile No/Email Id/Username" data-val-required="Enter Mobile No/Email Id/Username." id="Username" name="userName" placeholder="Mobile No/Email Id/Username" type="text" value="" />
                                                <span class="glyphicon  form-control-feedback"><i class="fa fa-sign-in"></i></span>
                                                <span class="field-validation-valid text-danger" data-valmsg-for="Username" data-valmsg-replace="true"></span>
                                            </div><br/>
<label for="TempPassword">Password</label>                                            <div class="form-group has-feedback">
                                                <input class="form-control" data-val="true" data-val-maxlength="Please enter a valid user name." data-val-maxlength-max="150" data-val-required="Enter Password." id="TempPassword" name="password" placeholder="Password" type="password" />
                                                <span class="glyphicon  form-control-feedback"><i class="fa fa-lock"></i></span> </span>
                                                <span class="field-validation-valid text-danger" data-valmsg-for="TempPassword" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <input data-val="true" data-val-maxlength="Please enter a valid user name." data-val-maxlength-max="150" data-val-required="Enter Mobile No/Email Id/Username." id="Password" name="Password" type="hidden" value="" />
                                                <span class="field-validation-valid text-danger" data-valmsg-for="Password" data-valmsg-replace="true"></span>
                                            </div>
                                              <br/>
                                            <div class="row">
                                                <div class="col-xs-12 text-center">
                                                    <button type="submit" id="btnSubmit" name="submit" class="btn btn-primary btn-social">
                                                        Login
                                                        <i class="fa fa-sign-in"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <br/>
                                            <?php echo "$err_invalid";?><br/><br/>
                                            <div class="row">
                                                <div class="col-xs-12">

                                                    <a class="fa fa-user-plus text-red" href="Registration.php">&nbsp;Click here to sign up</a>
                                                    <br/><br/>
                                                    <a class="fa fa-lock text-green" href="forgotPassword.php">&nbsp;&nbsp;Forgot Password</a>
                                                    <br/>
                                                </div>
                                            </div>
</form>                                    </div>
                                </div>


                </fieldset>


                <div class="row">
                    <div class="col-md-12 text-danger text-bold">


                    </div>
                </div>
            </div>
        </div>
        <!--Pannel End-->
    </div><!--Sidebar end-->

    <div class="col-md-9">
        <div class="row">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <strong class="text-maroon text-capitalize">
                        <i class="fa fa-sticky-note-o"></i>
                        One platform where you can lodge your grievances for quick redress
                    </strong>
                </div>
                <div class="box-body">
                            <p class="text-justify">
                              Municipality Grievance Redressal System (MGRS) is an
                                online web-enabled system. MGRS is the platform based on web
                                technology which primarily aims to enable submission of grievances by the
                                aggrieved citizens from anywhere and anytime (24x7) basis to
                                Departments/Organisations who scrutinize and take action for speedy
                                and favorable redress of these grievances. Tracking grievances is also facilitated
                                on this portal.
                            </p>
                            <p>
                                <strong>Issues which are not taken up for redress</strong>
                                <ul class="margin">
                                    <li>Subjudice cases or any matter concerning judgment given by any court.</li>
                                    <li>Personal and family disputes.</li>
                                    <li>RTI matters.</li>
                                    <li>Anything that impacts upon territorial integrity of the city.</li>
                                    <li>Suggestions.</li>
                                </ul>
                            </p>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <strong class="text-maroon text-capitalize">
                        <i class="ion ion-ios-pie-outline"></i>

                        Grievance statistics 
                    </strong>
                </div>
                <div class="box-body">
                    <div class="col-lg-12 col-xs-12">
                        <div class="row margin-bottom">
                            <div class="col-md-6 col-xs-12">
                                <div class="info-box bg-aqua">
                                    <span class="info-box-icon"><i class="ion-ios-list"></i></span>
                                    <div class="info-box-content">
                                        <span id="textReceipts" class="info-box-text">Receipts</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 100%"></div>
                                        </div>
                                        <span class="info-box-number"><?php echo $totalCount; ?></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="info-box bg-green">
                                    <span class="info-box-icon"><i class="ion ion-ios-checkmark-outline"></i></span>
                                    <div class="info-box-content">
                                        <span id="textDisposal" class="eitherOrRequired info-box-text">Disposals</span>

                                        <div class="progress">
                                            <div class="progress-bar" style="width: 100%"></div>
                                        </div>
                                        <span class="info-box-number">
                                          <?php echo $disposalCount; ?>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <span class="text-info eitherOrRequiredBefore">

                                Disposals includes the grievances that are completely addressed.
                            </span>
                        </div>

                        <div class="box-footer">
                            <strong class="text-danger">Help : iitg.ac.in</strong>
                            <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-body">
        <div class="row">
            <p class="col-md-12 text-justify text-primary">
                <i class="fa fa-arrow-circle-right"></i> &nbsp;Your valuable feedback on quality of grievance disposal will help us to improve the service
            </p>

            <p class="col-md-12 text-justify text-primary">
                <i class="fa fa-arrow-circle-right"></i> &nbsp;Any Grievance sent by email will not be attended to / entertained.Please lodge your grievance at the website.
            </p>

            <p class="col-md-12 text-justify text-warning">
                <strong>Note :</strong> If you have not got a satifactory redress of your grievance within a reasonable period of time,relating to Departments and Division, you may seek help of member of respective ward in resolution.
            </p>
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



    <script type="text/javascript">
        $(function() {
            setTimeout(function() { $('input:password').val(""); }, 100);
            $("#btnSubmit").click(function () {
                var randomString = "Rw6CorBT8fhDiYYA0S";
                var password = $("#TempPassword").val();
                if (password !== "") {
                    var hashedPassword = sha256(password);
                    var saltedPassword = hashedPassword + randomString;
                    var doubleHashedPassword = sha512(saltedPassword);
                    $("#Password").val(doubleHashedPassword);
                    $("#TempPassword").val(genetateStarString(password.length));
                }
            });

            $("#dashboardLink").click(function() {
                setTimeout(function () {
                    swal({
                        title:
                            "You are being redirected to an external website.",
                        text:
                            "आपको बाहरी वेबसाइट पर रीडायरेक्ट किया जा रहा है।",
                        type: "warning",
                        showCancelButton: true,
                        reverseButtons: true,
                        allowOutsideClick: false,
                        confirmButtonText: 'Continue'
                    }).then(function (result) {
                        if (result.value) {
                            window.open("https://pgportal-dashboard.gov.in/", "_blank");
                        }
                    });
                }, 500);
            });
        });
        function genetateStarString(length) {
            var str = "";
            for (var i = 0; i < length; i++) {
                str += "*";
            }
            return str;
        }
    </script>

    <script type="text/javascript">
        var loginUrl='/Home/AutoLogout';
        var extendMethodUrl='/Home/ExtendSession';
        $(document).ready(function() {
            var isLoggedIn = "True".toLowerCase() === "true" ? false : true;
            if(isLoggedIn){
                SessionTimeout.schedulePopup();
            } else {
                setTimeout("location.reload();",600000);
            }

            $("#pensionGrievanceLink").click(function() {
                setTimeout(function () {
                    swal({
                        title:
                            "You are being redirected to Grievance System of Department of Pension & Pensioner's Welfare",
                        text:
                            "आपको पेंशन और पेंशनभोगी कल्याण विभाग की शिकायत प्रणाली पर पुनर्निर्देशित किया जा रहा है।",
                        type: "warning",
                        showCancelButton: true,
                        reverseButtons: true,
                        allowOutsideClick:false
                    }).then(function (result) {
                        console.log(result);
                        if (result.value) {
                            window.open("http://pgportal.gov.in/pension/", "_blank");
                        }
                    });
                }, 500);
            });
        });

        window.SessionTimeout = (function() {
            var timeLeft, popupTimer, countDownTimer;
            var stopTimers = function() {
                window.clearTimeout(popupTimer);
                window.clearTimeout(countDownTimer);
            };
            var updateCountDown = function() {
                var min = Math.floor(timeLeft / 60);
                var sec = timeLeft % 60;
                if(sec < 10)
                    sec = "0" + sec;
                document.getElementById("CountDownHolder").innerHTML = min + ":" + sec;

                if(timeLeft > 0) {
                    timeLeft--;
                    countDownTimer = window.setTimeout(updateCountDown, 1000);
                } else  {
                    document.location = loginUrl;
                }
            };
            var showPopup = function() {
                    $("#divPopupTimeOut").show();
                timeLeft = 120;
                updateCountDown();
            };
            var schedulePopup = function() {
                $("#divPopupTimeOut").hide();
                stopTimers();
                popupTimer = window.setTimeout(showPopup, 1020000);
            };
            var hidePopup=function(){
                $("#divPopupTimeOut").hide();
            };
            var sendKeepAlive = function() {
                stopTimers();
                $("#divPopupTimeOut").hide();
                $.ajax({
                    type: "GET",
                    url: extendMethodUrl,
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    success: function() {
                        SessionTimeout.schedulePopup();
                    },
                    error:function(){
                    }
                });
            };
            return {
                schedulePopup: schedulePopup,
                sendKeepAlive: sendKeepAlive,
                hidePopup:hidePopup,
                stopTimers:stopTimers
            };

        })();

    </script>
</body>
</html>
<div id="divPopupTimeOut" style="display:none; text-align: left; margin-top:15px; width:280px !important; position:fixed; top:40px; right:0; z-index:9999; height:165px;" class="alert alert-warning">
    <div class="row" style="margin-top:10px; margin-left:10px;">
        Your session is about to expire!
        <br />
        <span id="CountDownHolder"></span>
        <br />
        Click OK to continue your session.
    </div>
    <div class="row">
        <div class="text-center" style="text-align:center; margin-top:22px;">
            <button type="button" class="btn btn-default btn-sm" onclick="SessionTimeout.sendKeepAlive();">OK</button>
            <button type="button" class="btn btn-default btn-sm" onclick="SessionTimeout.hidePopup();">Cancel</button>
        </div>
    </div>
</div>
