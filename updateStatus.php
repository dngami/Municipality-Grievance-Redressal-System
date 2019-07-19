
<?php
$dbname = "grievanceSystem";
$con = mysqli_connect("localhost","root","",$dbname);
if(!$con){
  die("Connection Failed :" + mysqli_connect_error());
}

if (isset($_POST['approve1'])) {
  $sql = "SELECT * FROM grievancetable WHERE status = 'Pending' AND department = 'Water Department' " ;
  $query = mysqli_query($GLOBALS['con'],$sql);

  $row_=mysqli_fetch_assoc($query);
  echo $row_['ID'];
  $sql_update = "UPDATE grievancetable SET status = 'Approved' WHERE ID= '".$row_['ID']."'";
  $query = mysqli_query($GLOBALS['con'],$sql_update);
}
if (isset($_POST['reject1'])) {
  $sql = "SELECT * FROM grievancetable WHERE status = 'Pending' AND department = 'Water Department' " ;
  $query = mysqli_query($GLOBALS['con'],$sql);

  $row_=mysqli_fetch_assoc($query);
  $sql_update = "UPDATE grievancetable SET status = 'Rejected' WHERE ID= '".$row_['ID']."' " ;
  $query = mysqli_query($GLOBALS['con'],$sql_update);
}


?>
