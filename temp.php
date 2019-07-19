<?php

    $dbname = "grievanceSystem";
    $con = mysqli_connect("localhost","root","",$dbname);
    if(!$con){
      die("Connection Failed :" + mysqli_connect_error());
    }

    $err ='';

    //
    // $sql = "INSERT INTO user (ID  , userName , password , name ,gender, address,phoneNo, mobileNo , email , grievance) Values
    // (NULL , 'gami' , 'gami' ,'dg' ,'male' ,'iitg' ,'6659' ,'8770270901' ,'i@gmail.com' ,DEFAULT )";

    $sql = "SELECT * FROM user WHERE username = '".$_POST["userName"]."' or mobileNo = '".$_POST["mobileNo"]."' or email = mobileNo = '".$_POST["email"]."' ";
    $query = mysqli_query($GLOBALS['con'],$sql);
    if ($query->num_rows == 0){
        echo "Already existed";
    }
    else{
      if ( strcmp($_POST['userName'],'') && strcmp($_POST['password'],'')&&strcmp($_POST['name'],'')&&strcmp($_POST['gender'],'')&&strcmp($_POST['Address1'],'')&&strcmp($_POST['mobileNo'],'')&&strcmp($_POST['email'],'') ) {
        $err 'All fields with * are compulsory';
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
?>
