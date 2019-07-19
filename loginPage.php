 <?php
 session_start();

//  foreach($_SESSION as $value){
//     echo $value . "<br>";
// }


if ($_SESSION['isUserLogin']=="N") {
  echo '<script type="text/javascript">
  alert("you are not logged in")
</script>';

header("Location: index.php");
exit;
}


$division =  array('Pipeline Blockage' => 5 ,
                  'Pipeline Leakage' => 3,
                'Potholes' => 7,
                'Cleaning' => 3,
                'Reconstruction' => 20,
                'Speed Breaker' => 5,
                'Manhole' => 5,
                'Drainage Leakage' => 10,
                'Drainage Cleaning' => 7,
                'Drainage Repair' => 10,
                'Dead Animal' => 4,
                'Dustbin Installation' => 6);



 $dbname = "grievanceSystem";
 $con = mysqli_connect("localhost","root","",$dbname);
 if(!$con){
   die("Connection Failed :" + mysqli_connect_error());
 }


if (isset($_POST['approve1'])) {
  $sql = "SELECT * FROM grievancetable WHERE status = 'Pending' AND department = 'Water Department' " ;
  $query = mysqli_query($GLOBALS['con'],$sql);

  $row_=mysqli_fetch_assoc($query);

  $sql_update = "UPDATE grievancetable SET status = 'Approved' WHERE ID= '".$row_['ID']."' ";
  $query = mysqli_query($GLOBALS['con'],$sql_update);
}
if (isset($_POST['reject1'])) {
  $sql = "SELECT * FROM grievancetable WHERE status = 'Pending' AND department = 'Water Department' " ;
  $query = mysqli_query($GLOBALS['con'],$sql);

  $row_=mysqli_fetch_assoc($query);
  $sql_update = "UPDATE grievancetable SET status = 'Rejected' WHERE ID= '".$row_['ID']."' " ;
  $query = mysqli_query($GLOBALS['con'],$sql_update);
}

if (isset($_POST['approve2'])) {
  $sql = "SELECT * FROM grievancetable WHERE status = 'Pending' AND department = 'Road Management' " ;
  $query = mysqli_query($GLOBALS['con'],$sql);

  $row_=mysqli_fetch_assoc($query);

  $sql_update = "UPDATE grievancetable SET status = 'Approved' WHERE ID= '".$row_['ID']."' ";
  $query = mysqli_query($GLOBALS['con'],$sql_update);
}
if (isset($_POST['reject2'])) {
  $sql = "SELECT * FROM grievancetable WHERE status = 'Pending' AND department = 'Road Management' " ;
  $query = mysqli_query($GLOBALS['con'],$sql);

  $row_=mysqli_fetch_assoc($query);
  $sql_update = "UPDATE grievancetable SET status = 'Rejected' WHERE ID= '".$row_['ID']."' " ;
  $query = mysqli_query($GLOBALS['con'],$sql_update);
}

if (isset($_POST['approve3'])) {
  $sql = "SELECT * FROM grievancetable WHERE status = 'Pending' AND department = 'Sewage & Waste Management ' " ;
  $query = mysqli_query($GLOBALS['con'],$sql);

  $row_=mysqli_fetch_assoc($query);

  $sql_update = "UPDATE grievancetable SET status = 'Approved' WHERE ID= '".$row_['ID']."' ";
  $query = mysqli_query($GLOBALS['con'],$sql_update);
}
if (isset($_POST['reject3'])) {
  $sql = "SELECT * FROM grievancetable WHERE status = 'Pending' AND department = 'Water Department' " ;
  $query = mysqli_query($GLOBALS['con'],$sql);

  $row_=mysqli_fetch_assoc($query);
  $sql_update = "UPDATE grievancetable SET status = 'Rejected' WHERE ID= '".$row_['ID']."' " ;
  $query = mysqli_query($GLOBALS['con'],$sql_update);
}






if (isset($_POST['app1'])) {
  $sql = "SELECT * FROM grievancetable WHERE status = 'Approved' AND department = 'Water Department' " ;
  $query = mysqli_query($GLOBALS['con'],$sql);

  $sql2 = "SELECT * FROM labour WHERE department = 'Water Department' " ;
  $query2 = mysqli_query($GLOBALS['con'],$sql2);

  $row2 = mysqli_fetch_assoc($query2);

  $row_=mysqli_fetch_assoc($query);
  if ($division[$row_['subdivision']] <= $row2['count']) {
    echo $division[$row_['subdivision']];
    $sql_update = "UPDATE grievancetable SET status = 'Alloted' WHERE ID= '".$row_['ID']."' ";
    $query = mysqli_query($GLOBALS['con'],$sql_update);

    $finalCount  = $row2['count'] - $division[$row_['subdivision']];
    $sql_update = "UPDATE labour SET count = '".$finalCount."' WHERE  department = 'Water Department' ";
    $query = mysqli_query($GLOBALS['con'],$sql_update);
  }
  else {
    $sql_update = "UPDATE grievancetable SET status = 'Enqueue' WHERE ID= '".$row_['ID']."' ";
    $query = mysqli_query($GLOBALS['con'],$sql_update);
  }


}
if (isset($_POST['rej1'])) {
  $sql = "SELECT * FROM grievancetable WHERE status = 'Approved' AND department = 'Water Department' " ;
  $query = mysqli_query($GLOBALS['con'],$sql);

  $row_=mysqli_fetch_assoc($query);
  $sql_update = "UPDATE grievancetable SET status = 'Rejected' WHERE ID= '".$row_['ID']."' " ;
  $query = mysqli_query($GLOBALS['con'],$sql_update);
}

if (isset($_POST['app2'])) {
  $sql = "SELECT * FROM grievancetable WHERE status = 'Approved' AND department = 'Road Management' " ;
  $query = mysqli_query($GLOBALS['con'],$sql);

    $sql2 = "SELECT * FROM labour WHERE department = 'Road Management' " ;
    $query2 = mysqli_query($GLOBALS['con'],$sql2);

    $row2 = mysqli_fetch_assoc($query2);

    $row_=mysqli_fetch_assoc($query);
    if ($division[$row_['subdivision']] <= $row2['count']) {
      echo $division[$row_['subdivision']];
      $sql_update = "UPDATE grievancetable SET status = 'Alloted' WHERE ID= '".$row_['ID']."' ";
      $query = mysqli_query($GLOBALS['con'],$sql_update);

      $finalCount  = $row2['count'] - $division[$row_['subdivision']];
      $sql_update = "UPDATE labour SET count = '".$finalCount."' WHERE  department = 'Road Management' ";
      $query = mysqli_query($GLOBALS['con'],$sql_update);
    }
    else {
      $sql_update = "UPDATE grievancetable SET status = 'Enqueue' WHERE ID= '".$row_['ID']."' ";
      $query = mysqli_query($GLOBALS['con'],$sql_update);
    }
}

if (isset($_POST['rej2'])) {
  $sql = "SELECT * FROM grievancetable WHERE status = 'Approved' AND department = 'Road Management' " ;
  $query = mysqli_query($GLOBALS['con'],$sql);

  $row_=mysqli_fetch_assoc($query);
  $sql_update = "UPDATE grievancetable SET status = 'Rejected' WHERE ID= '".$row_['ID']."' " ;
  $query = mysqli_query($GLOBALS['con'],$sql_update);
}

if (isset($_POST['app3'])) {
  $sql = "SELECT * FROM grievancetable WHERE status = 'Approved' AND department = 'Sewage & Waste Management' " ;
  $query = mysqli_query($GLOBALS['con'],$sql);

  $sql2 = "SELECT * FROM labour WHERE department = 'Sewage & Waste Management' " ;
  $query2 = mysqli_query($GLOBALS['con'],$sql2);

  $row2 = mysqli_fetch_assoc($query2);

  $row_=mysqli_fetch_assoc($query);
  if ($division[$row_['subdivision']] <= $row2['count']) {
    echo $division[$row_['subdivision']];
    $sql_update = "UPDATE grievancetable SET status = 'Alloted' WHERE ID= '".$row_['ID']."' ";
    $query = mysqli_query($GLOBALS['con'],$sql_update);

    $finalCount  = $row2['count'] - $division[$row_['subdivision']];
    $sql_update = "UPDATE labour SET count = '".$finalCount."' WHERE  department ='Sewage & Waste Management' ";
    $query = mysqli_query($GLOBALS['con'],$sql_update);
  }
  else {
    $sql_update = "UPDATE grievancetable SET status = 'Enqueue' WHERE ID= '".$row_['ID']."' ";
    $query = mysqli_query($GLOBALS['con'],$sql_update);
  }
}
if (isset($_POST['rej3'])) {
  $sql = "SELECT * FROM grievancetable WHERE status = 'Approved' AND department = 'Water Department' " ;
  $query = mysqli_query($GLOBALS['con'],$sql);

  $row_=mysqli_fetch_assoc($query);
  $sql_update = "UPDATE grievancetable SET status = 'Rejected' WHERE ID= '".$row_['ID']."' " ;
  $query = mysqli_query($GLOBALS['con'],$sql_update);
}


if (isset($_POST['done']) && isset($_POST['id'])) {

  $sql_update = "UPDATE grievancetable SET status = 'Done' WHERE ID= '".$_POST['id']."' ";
  $query = mysqli_query($GLOBALS['con'],$sql_update);
}


if (isset($_POST['completed']) && isset($_POST['id'])) {
  $comp = "Completed - ".$_POST['id'];
  $sql_update = "UPDATE grievancetable SET status = '$comp' WHERE ID= '".$_POST['id']."' ";
  $query = mysqli_query($GLOBALS['con'],$sql_update);

  $sql = "SELECT * FROM grievancetable WHERE ID = '".$_POST['id']."' " ;
  $query2 = mysqli_query($GLOBALS['con'],$sql);
  $row_=mysqli_fetch_assoc($query2);      // row_ is department and subdivision

  $sql = "SELECT * FROM labour WHERE department =  '".$row_['department']."' " ;
  $query3 = mysqli_query($GLOBALS['con'],$sql);
  $row2=mysqli_fetch_assoc($query3);     // row2 count of labour in department

  $finalCount  = $row2['count'] + $division[$row_['subdivision']];
  $sql_update = "UPDATE labour SET count = '".$finalCount."' WHERE  department = '".$row_['department']."' ";
  $query = mysqli_query($GLOBALS['con'],$sql_update);


  // to allot Enqueued grievance **********************************************************************************************
  // sewage department**************************************************************************************************
  $sql_a = "SELECT * FROM grievancetable WHERE status = 'Enqueue' AND department = 'Sewage & Waste Management' " ;
  $query_a = mysqli_query($GLOBALS['con'],$sql_a);

  $sql_b = "SELECT * FROM labour WHERE department = 'Sewage & Waste Management' " ;
  $query_b = mysqli_query($GLOBALS['con'],$sql_b);

  $row_b = mysqli_fetch_assoc($query_b);   //row2 here for current available count

  $initialCount=$row_b['count'];
  while($row_a=mysqli_fetch_assoc($query_a)){
    echo '$initialCount'.$initialCount;
    if ($division[$row_a['subdivision']] <=$initialCount ) {
      $sql_update = "UPDATE grievancetable SET status = 'Alloted' WHERE ID= '".$row_a['ID']."' ";
      $query_c = mysqli_query($GLOBALS['con'],$sql_update);
      $initialCount  = $initialCount - $division[$row_a['subdivision']];
    }
  }
    $sql_up = "UPDATE labour SET count = '".$initialCount."' WHERE  department ='Sewage & Waste Management' ";
    $query_d = mysqli_query($GLOBALS['con'],$sql_up);

    // Water department**************************************************************************************************
    $sql = "SELECT * FROM grievancetable WHERE status = 'Enqueue' AND department = 'Water Department' " ;
    $query = mysqli_query($GLOBALS['con'],$sql);

    $sql2 = "SELECT * FROM labour WHERE department = 'Water Department' " ;
    $query2 = mysqli_query($GLOBALS['con'],$sql2);

    $row2 = mysqli_fetch_assoc($query2);

    $initialCount =$row2['count'];
    while($row_=mysqli_fetch_assoc($query)){
      if ($division[$row_['subdivision']] <=$initialCount ) {
        $sql_update = "UPDATE grievancetable SET status = 'Alloted' WHERE ID= '".$row_['ID']."' ";
        $query = mysqli_query($GLOBALS['con'],$sql_update);
        $initialCount  = $initialCount - $division[$row_['subdivision']];
      }
    }
      $sql_update = "UPDATE labour SET count = '".$initialCount."' WHERE  department ='Water Department' ";
      $query = mysqli_query($GLOBALS['con'],$sql_update);

    // Road department**************************************************************************************************
    $sql = "SELECT * FROM grievancetable WHERE status = 'Enqueue' AND department = 'Road Management' " ;
    $query = mysqli_query($GLOBALS['con'],$sql);

    $sql2 = "SELECT * FROM labour WHERE department = 'Road Management' " ;
    $query2 = mysqli_query($GLOBALS['con'],$sql2);

    $row2 = mysqli_fetch_assoc($query2);

    $initialCount =$row2['count'];
    while($row_=mysqli_fetch_assoc($query)){
      if ($division[$row_['subdivision']] <=$initialCount ) {
        $sql_update = "UPDATE grievancetable SET status = 'Alloted' WHERE ID= '".$row_['ID']."' ";
        $query = mysqli_query($GLOBALS['con'],$sql_update);
        $initialCount  = $initialCount - $division[$row_['subdivision']];
      }
    }
      $sql_update = "UPDATE labour SET count = '".$initialCount."' WHERE  department ='Road Management' ";
      $query = mysqli_query($GLOBALS['con'],$sql_update);



}



//engineer*******************************************************************************************************************************************
//*******************************************************************************************************************************************

 if (!strcmp($_SESSION['sess_user'],'engineer')) {

   $sql = "SELECT * FROM grievancetable  ";
   $query = mysqli_query($GLOBALS['con'],$sql);
    $count = $pending = $closed =0;
    $entry='';

    while($row=mysqli_fetch_assoc($query)){
      $count++;
      if( !strcmp($row['status'],'Pending'))$pending++;
      if($row['status']=='Alloted')$closed++;
      $entry = $entry.'<tr role="row" class="odd">
         <td tabindex="" class="sorting_1">'.$count.'</td>
         <td>'.$row['ID'].'</td>
         <td>'.$row['recievedDate'].'</td>
          <td>'.substr($row['description'] , 0 , 30) .'<a href="grievanceDetails.php?ID='.$row['ID'].'" class="btn btn-xs">more...</a> </td>
          <td style="">'.$row['status']. '<a href="grievanceStatus.php?ID='.$row['ID'].' " class="btn btn-xs">more...</a></td>
          <td>'.$row['department'].'</td>


    </tr>';
    }
//pending*******************************************************************************************************************************************


    if(isset($_POST['pending'])){

      // water departent***********************************************************************
      $sql = "SELECT * FROM grievancetable WHERE status = 'Pending' AND department = 'Water Department' " ;
      $query = mysqli_query($GLOBALS['con'],$sql);
      $sNo=0;
      $entry = '';

      if ($row=mysqli_fetch_assoc($query)) {
        $sNo++;
        $btnName = "approve".$row['ID'];
        $entry = $entry.'<tr role="row" class="odd">
           <td tabindex="" class="sorting_1">'.$sNo.'</td>
           <td>'.$row['ID'].'</td>
           <td>'.$row['recievedDate'].'</td>
              <td>'.substr($row['description'] , 0 , 30) .'<a href="grievanceDetails.php?ID='.$row['ID'].'" class="btn btn-xs">more...</a> </td>
               <td style="">'.$row['status']. '<a href="grievanceStatus.php?ID='.$row['ID'].' " class="btn btn-xs">more...</a></td>

              <form action = "" method="post">
              <td style="">
                <button type="submit" id="btnSubmit" name="approve1" class="btn btn-info">
                    Approve
                    <i class="fa fa-sign-in"></i>
                </button>
              </td>
              <td style="">
              <button type="submit" id="btnSubmit" name="reject1" class="btn btn-info">
                  Reject
                  <i class="fa fa-sign-in"></i>
              </button>
              </td>
              </form>
      </tr>';
      }
      // road departent***********************************************************************
      $sql = "SELECT * FROM grievancetable WHERE status = 'Pending' AND department = 'Road Management' " ;
      $query = mysqli_query($GLOBALS['con'],$sql);


      if ($row=mysqli_fetch_assoc($query)) {
        $sNo++;
        $entry = $entry.'<tr role="row" class="odd">
           <td tabindex="" class="sorting_1">'.$sNo.'</td>
           <td>'.$row['ID'].'</td>
           <td>'.$row['recievedDate'].'</td>
              <td>'.substr($row['description'] , 0 , 30) .'<a href="grievanceDetails.php?ID='.$row['ID'].'" class="btn btn-xs">more...</a> </td>
               <td style="">'.$row['status']. '<a href="grievanceStatus.php?ID='.$row['ID'].' " class="btn btn-xs">more...</a></td>

               <form action = "" method="post">
                 <td style="">
                   <button type="submit" id="btnSubmit" name="approve2" class="btn btn-info"> Approve<i class="fa fa-sign-in"></i></button>
                 </td>
                 <td style=""><button type="submit" id="btnSubmit" name="reject2" class="btn btn-info">Reject<i class="fa fa-sign-in"></i></button>
                 </td>
               </form>
      </tr>';
      }
      // sewage departent***********************************************************************
      $sql = "SELECT * FROM grievancetable WHERE status = 'Pending' AND department = 'Sewage & Waste Management' " ;
      $query = mysqli_query($GLOBALS['con'],$sql);

      if ($row=mysqli_fetch_assoc($query)) {
        $sNo++;
        $entry = $entry.'<tr role="row" class="odd">
           <td tabindex="" class="sorting_1">'.$sNo.'</td>
           <td>'.$row['ID'].'</td>
           <td>'.$row['recievedDate'].'</td>
              <td>'.substr($row['description'] , 0 , 30) .'<a href="grievanceDetails.php?ID='.$row['ID'].'" class="btn btn-xs">more...</a> </td>
               <td style="">'.$row['status']. '<a href="grievanceStatus.php?ID='.$row['ID'].' " class="btn btn-xs">more...</a></td>

               <form action = "" method="post">
                 <td style="">
                   <button type="submit" id="btnSubmit" name="approve3" class="btn btn-info"> Approve<i class="fa fa-sign-in"></i></button>
                 </td>
                 <td style=""><button type="submit" id="btnSubmit" name="reject3" class="btn btn-info">Reject<i class="fa fa-sign-in"></i></button>
                 </td>
               </form>
      </tr>';
      }
}
//closed*******************************************************************************************************************************************


    if (isset($_POST['closed'])) {
      $sql = "SELECT * FROM grievancetable WHERE status = 'Alloted'";
      $query = mysqli_query($GLOBALS['con'],$sql);
      $sNo=0;
      $entry = '';
      while($row=mysqli_fetch_assoc($query)){
          $sNo++;

        $entry = $entry.'<tr role="row" class="odd">
           <td tabindex="" class="sorting_1">'.$sNo.'</td>
           <td>'.$row['ID'].'</td>
           <td>'.$row['recievedDate'].'</td>
              <td>'.substr($row['description'] , 0 , 30) .'<a href="grievanceDetails.php?ID='.$row['ID'].'" class="btn btn-xs">more...</a> </td>
               <td style="">'.$row['status']. '<a href="grievanceStatus.php?ID='.$row['ID'].' " class="btn btn-xs">more...</a></td>

              <td style="">

                <form action = "" method="post">
                  <td style="">
                    <button type="submit" id="btnSubmit" name="done" class="btn btn-info"  ><i class="fa fa-sign-in"> Done</i></button>
                    <input type="hidden" name="id" value= '.$row['ID'].'>
                </form>
              </td>
      </tr>';
      }
    }


//SuperVisior*******************************************************************************************************************************************
//*******************************************************************************************************************************************

 } else if(!strcmp($_SESSION['sess_user'],'supervisior')){

   $sql = "SELECT * FROM grievancetable  ";
   $query = mysqli_query($GLOBALS['con'],$sql);
    $count = $pending = $closed =0;
    $entry='';

    while($row=mysqli_fetch_assoc($query)){
      $count++;
      if( !strcmp($row['status'],'Approved'))$pending++;
      if($row['status']=='Done')$closed++;
      $entry = $entry.'<tr role="row" class="odd">
         <td tabindex="" class="sorting_1">'.$count.'</td>
         <td>'.$row['ID'].'</td>
         <td>'.$row['recievedDate'].'</td>
         <td>'.substr($row['description'] , 0 , 30) .'<a href="grievanceDetails.php?ID='.$row['ID'].'" class="btn btn-xs">more...</a> </td>
         <td style="">'.$row['status']. '<a href="grievanceStatus.php?ID='.$row['ID'].' " class="btn btn-xs">more...</a></td>
         <td>'.$row['department'].'</td>

    </tr>';
    }

    //pending*******************************************************************************************************************************************


        if(isset($_POST['pending'])){

          // water departent***********************************************************************
          $sql = "SELECT * FROM grievancetable WHERE status = 'Approved' AND department = 'Water Department' " ;
          $query = mysqli_query($GLOBALS['con'],$sql);
          $sNo=0;
          $entry = '';

          if ($row=mysqli_fetch_assoc($query)) {
            $sNo++;
            $btnName = "approve".$row['ID'];
            $entry = $entry.'<tr role="row" class="odd">
               <td tabindex="" class="sorting_1">'.$sNo.'</td>
               <td>'.$row['ID'].'</td>
               <td>'.$row['recievedDate'].'</td>
                  <td>'.substr($row['description'] , 0 , 30) .'<a href="grievanceDetails.php?ID='.$row['ID'].'" class="btn btn-xs">more...</a> </td>
                   <td style="">'.$row['status']. '<a href="grievanceStatus.php?ID='.$row['ID'].' " class="btn btn-xs">more...</a></td>

                  <form action = "" method="post">
                  <td style="">
                    <button type="submit" id="btnSubmit" name="app1" class="btn btn-info">
                        Approve
                        <i class="fa fa-sign-in"></i>
                    </button>
                  </td>
                  <td style="">
                  <button type="submit" id="btnSubmit" name="rej1" class="btn btn-info">
                      Reject
                      <i class="fa fa-sign-in"></i>
                  </button>
                  </td>
                  </form>
          </tr>';
          }
          // road departent***********************************************************************
          $sql = "SELECT * FROM grievancetable WHERE status = 'Approved' AND department = 'Road Management' " ;
          $query = mysqli_query($GLOBALS['con'],$sql);


          if ($row=mysqli_fetch_assoc($query)) {
            $sNo++;
            $entry = $entry.'<tr role="row" class="odd">
               <td tabindex="" class="sorting_1">'.$sNo.'</td>
               <td>'.$row['ID'].'</td>
               <td>'.$row['recievedDate'].'</td>
                  <td>'.substr($row['description'] , 0 , 30) .'<a href="grievanceDetails.php?ID='.$row['ID'].'" class="btn btn-xs">more...</a> </td>
                   <td style="">'.$row['status']. '<a href="grievanceStatus.php?ID='.$row['ID'].' " class="btn btn-xs">more...</a></td>

                   <form action = "" method="post">
                     <td style="">
                       <button type="submit" id="btnSubmit" name="app2" class="btn btn-info"> Approve<i class="fa fa-sign-in"></i></button>
                     </td>
                     <td style=""><button type="submit" id="btnSubmit" name="rej2" class="btn btn-info">Reject<i class="fa fa-sign-in"></i></button>
                     </td>
                   </form>
          </tr>';
          }
          // sewage departent***********************************************************************
          $sql = "SELECT * FROM grievancetable WHERE status = 'Approved' AND department = 'Sewage & Waste Management' " ;
          $query = mysqli_query($GLOBALS['con'],$sql);

          if ($row=mysqli_fetch_assoc($query)) {
            $sNo++;
            $entry = $entry.'<tr role="row" class="odd">
               <td tabindex="" class="sorting_1">'.$sNo.'</td>
               <td>'.$row['ID'].'</td>
               <td>'.$row['recievedDate'].'</td>
                  <td>'.substr($row['description'] , 0 , 30) .'<a href="grievanceDetails.php?ID='.$row['ID'].'" class="btn btn-xs">more...</a> </td>
                   <td style="">'.$row['status']. '<a href="grievanceStatus.php?ID='.$row['ID'].' " class="btn btn-xs">more...</a></td>

                   <form action = "" method="post">
                     <td style="">
                       <button type="submit" id="btnSubmit" name="app3" class="btn btn-info"> Approve<i class="fa fa-sign-in"></i></button>
                     </td>
                     <td style=""><button type="submit" id="btnSubmit" name="rej3" class="btn btn-info">Reject<i class="fa fa-sign-in"></i></button>
                     </td>
                   </form>
          </tr>';
          }
    }

    //closed*******************************************************************************************************************************************


        if (isset($_POST['closed'])) {
          $sql = "SELECT * FROM grievancetable WHERE status = 'Done'";
          $query = mysqli_query($GLOBALS['con'],$sql);
          $sNo=0;
          $entry = '';
          while($row=mysqli_fetch_assoc($query)){
              $sNo++;

            $entry = $entry.'<tr role="row" class="odd">
               <td tabindex="" class="sorting_1">'.$sNo.'</td>
               <td>'.$row['ID'].'</td>
               <td>'.$row['recievedDate'].'</td>
                  <td>'.substr($row['description'] , 0 , 30) .'<a href="grievanceDetails.php?ID='.$row['ID'].'" class="btn btn-xs">more...</a> </td>
                   <td style="">'.$row['status']. '<a href="grievanceStatus.php?ID='.$row['ID'].' " class="btn btn-xs">more...</a></td>

                  <td style="">

                    <form action = "" method="post">
                      <td style="">
                        <button type="submit" id="btnSubmit" name="completed" class="btn btn-info"  ><i class="fa fa-sign-in"></i> Completed</button>
                        <input type="hidden" name="id" value= '.$row['ID'].'>
                    </form>
                  </td>
          </tr>';
          }
        }

 }


 //Citizen*******************************************************************************************************************************************
 //*******************************************************************************************************************************************

else{

 $sql = "SELECT * FROM grievancetable WHERE username = '".$_SESSION["sess_user"]."'  ";
 $query = mysqli_query($GLOBALS['con'],$sql);
  $count = $pending = $closed =0;
  $entry='';


  while($row=mysqli_fetch_assoc($query)){
    $count++;
    if( !strcmp($row['status'],'pending'))$pending++;
    if($row['status']=='closed')$closed++;
    $entry = $entry.'<tr role="row" class="odd">
       <td tabindex="" class="sorting_1">'.$count.'</td>
       <td>'.$row['ID'].'</td>
       <td>'.$row['recievedDate'].'</td>
        <td>'.substr($row['description'] , 0 , 30) .'<a href="grievanceDetails.php?ID='.$row['ID'].'" class="btn btn-xs">more...</a> </td>
       <td style="">'.$row['status']. '<a href="grievanceStatus.php?ID='.$row['ID'].' " class="btn btn-xs">more...</a></td>
       <td>'.$row['department'].'</td>

  </tr>';
  }
}
  mysqli_close($con);

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
                                  <a href="#"><i class="fa fa-home"></i> <strong>Home</strong></a>
                          </li>
                          <li><a href="aboutUs.php"><strong><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;About Us</strong></a></li>
                          <li><a href="status.php"><strong><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;View Status</strong></a></li>
                          <li ><a href="flow.php" class="dropdown-toggle" data-toggle="dropdown"><strong><i class="fa fa-road" aria-hidden="true"></i>&nbsp;Redress Process</strong> <span class="caret"></span></a></li>
                          <li ><a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong><i class="fa fa-book" aria-hidden="true"></i>&nbsp;Guidelines</strong> <span class="caret"></span></a></li>
                          <li><a href="faq.php"><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;<strong>FAQ</strong></a></li>
                            <li><a href="updateProfile.php" ><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<strong>Welcome!  <?php echo " ".$_SESSION['sess_name'];?></strong></a></li>
                            <li><a href="logout.php" ><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;<strong>logout</strong></a></li>
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
                    <div class="col-lg-4 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-red"><i class="ion ion-ios-list"></i></span>
                            <!-- <a id="All" href="/Desk/Index/All">
                                <div class="info-box-content">
                                    <span class="info-box-text text-red">Total Grievances Registered</span>
                                    <span class="info-box-number text-red"></span>
                                </div>
                            </a> -->
                            <form id="myform3" method="post" action="">
                              <input type="hidden" name="total" value="value" />
                              <a onclick="document.getElementById('myform3').submit();">
                                <div class="info-box-content">
                                  <span class="info-box-text text-red">Total Grievances Registered</span>
                                  <span class="info-box-number text-red"><?php echo $count; ?></span>
                                </div>
                              </a>
                            </form>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-lg-4 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-orange"><i class="ion ion-ios-clock"></i></span>
                            <!-- <a id="Pending" name="pending"  action="" method = "post">
                                <div class="info-box-content">
                                    <span class="info-box-text text-orange">Number of Grievances Pending</span>
                                    <span class="info-box-number text-orange"></span>
                                </div>
                            </a> -->
                            <form id="myform" method="post" action="">
                              <input type="hidden" name="pending" value="value" />
                              <a onclick="document.getElementById('myform').submit();">
                                <div class="info-box-content">
                                    <span class="info-box-text text-orange">Number of Grievances Pending</span>
                                    <span class="info-box-number text-orange"><?php echo $pending; ?></span>
                                </div>
                              </a>
                            </form>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-lg-4 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="ion ion-checkmark-circled"></i></span>
                            <!-- <a id="Closed" href="/Desk/Index/Closed">
                                <div class="info-box-content">
                                    <span class="info-box-text text-green">Number of Grievances Closed</span>
                                    <span class="info-box-number text-green"></span>
                                </div>
                            </a> -->
                            <form id="myform2" method="post" action="">
                              <input type="hidden" name="closed" value="value" />
                              <a onclick="document.getElementById('myform2').submit();">
                                <div class="info-box-content">
                                  <span class="info-box-text text-green">Number of Grievances Closed</span>
                                  <span class="info-box-number text-green"><?php echo $closed; ?></span>
                                </div>
                              </a>
                            </form>

                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->


                </div>

                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title text-blue">List of Grievances</h3>
                        <div class="pull-right"

                        <?php
                        $visibility = '';
                        if(  !strcmp($_SESSION['sess_user'],"engineer") || !strcmp($_SESSION['sess_user'],"supervisior")  ){
                          $visibility = 'hidden';
                        }
                        echo $visibility;
                        ?>
                        >
                         <a href="newGrievance.php" class="btn btn-social bg-blue">
                                <i class="fa fa-plus"></i>
                                <b>Lodge Public Grievance</b>
                            </a>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="TblGrievance_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="TblGrievance_length"><label><select name="TblGrievance_length" aria-controls="TblGrievance" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div>
                                <div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="TblGrievance" class="table table-striped table-bordered dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="TblGrievance_info" style="width: 1091px;">
                                    <thead>
                                        <tr role="row"><th width="2%" class="sorting_asc" tabindex="0" aria-controls="TblGrievance" rowspan="1" colspan="1" style="width: 21px;" aria-sort="ascending" aria-label="Sn.activate to sort column descending">Sn.</th
                                          ><th width="20%" class="sorting" tabindex="0" aria-controls="TblGrievance" rowspan="1" colspan="1" style="width: 102px;" aria-label="Registration Numberactivate to sort column ascending">Reg. Number</th>
                                          <th width="10%" class="sorting" tabindex="0" aria-controls="TblGrievance" rowspan="1" colspan="1" style="width: 150px;" aria-label="Received Dateactivate to sort column ascending">Received Date</th>
                                          <th width="25%" class="sorting" tabindex="0" aria-controls="TblGrievance" rowspan="1" colspan="1" style="width: 300px;" aria-label="Grievance descriptionactivate to sort column ascending">Grievance description</th>
                                          <th width="33%" class="sorting" tabindex="0" aria-controls="TblGrievance" rowspan="1" colspan="1" style="width: 250px;" aria-label="Statusactivate to sort column ascending">Status</th>
                                          <th width="10%" class="sorting_disabled" rowspan="1" colspan="1" style="width: 150px; " aria-label="&amp;nbsp;">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <tr role="row" class="odd">
                                              <td tabindex="0" class="sorting_1">1</td>
                                              <td>GOVMP/E/2019/01823  </td>
                                              <td>30/04/2019</td>
                                              <td>please find the attached... <a href="grievanceDetails.php" class="btn btn-xs">more...</a> </td>
                                              <td style="">Grievance received <a href="grievanceStatus.php" class="btn btn-xs">more...</a></td>

                                              <td style="">

                                                      <a href="/Reminder/LoadReminderIndexforLoggedinUser/R09WTVAvRS8yMDE5LzAxODIz" class="btn btn-info"><i class="fa fa-bell-o"></i>&nbsp;Reminder</a>
                                              </td>
                                      </tr> -->
                                      <?php echo $entry; ?>
                                    </tbody>
                                </table></div></div>
                                <div class="row">
                                  <div class="col-sm-5"><div class="dataTables_info" id="TblGrievance_info" role="status" aria-live="polite">Showing 1 to 1 of 1 entries</div>
                                  </div>
                                  <div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="TblGrievance_paginate"><ul class="pagination">
                                    <li class="paginate_button previous disabled" id="TblGrievance_previous"><a href="#" aria-controls="TblGrievance" data-dt-idx="0" tabindex="0">Prev</a></li><li class="paginate_button active"><a href="#" aria-controls="TblGrievance" data-dt-idx="1" tabindex="0">1</a></li>
                                    <li class="paginate_button next disabled" id="TblGrievance_next"><a href="#" aria-controls="TblGrievance" data-dt-idx="2" tabindex="0">Next</a></li></ul></div>
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
