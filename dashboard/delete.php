<?php


  if (isset($_REQUEST['id'])) {
      userDelete();
    }


  if (isset($_REQUEST['pakid'])) {
      packageDelete();
    }

   if (isset($_REQUEST['timeid'])) {
       timesloteDelete();
   }

   if (isset($_REQUEST['trinid'])) {
       trinarDelete();
   }

  function userDelete(){
       $user_id = $_REQUEST['id'];
        date_default_timezone_set("Asia/Kolkata");
        $user_udate =              date("m/d/yy");    
        $user_status = "0";
        require_once 'db.php';
//        $sql = "UPDATE users SET user_status= '$user_status' , user_udate= '$user_udate' WHERE user_id = '$user_id' ";
      $sql="DELETE FROM users WHERE user_id = '$user_id'";
         $retval = mysqli_query($conn, $sql);
             
         if(! $retval ) {
            die('Could not get data: ' . mysql_error());
         }   

         header('location: user-list.php');   
  }

  function packageDelete(){
        $package_id = $_REQUEST['pakid'];
        date_default_timezone_set("Asia/Kolkata");
        $package_udate =              date("m/d/yy");    
        $package_status = "0";
        require_once 'db.php';
        $sql = "UPDATE package SET package_status= '$package_status' , package_udate= '$package_udate' WHERE package_id = '$package_id' ";
         $retval = mysqli_query($conn, $sql);
             
         if(! $retval ) {
            die('Could not get data: ' . mysql_error());
         }   

         header('location: package-list.php');   
    }

    function timesloteDelete(){
       $timeslote_id = $_REQUEST['timeid'];
        date_default_timezone_set("Asia/Kolkata");
        $timeslote_udate =              date("m/d/yy");    
        $timeslote_status = "0";
        require_once 'db.php';
        $sql = "UPDATE timeslote SET timeslote_status= '$timeslote_status' , timeslote_udate= '$timeslote_udate' WHERE timeslote_id = '$timeslote_id' ";
         $retval = mysqli_query($conn, $sql);
             
         if(! $retval ) {
            die('Could not get data: ' . mysql_error());
         }   

         header('location: timeslote-list.php');   
    }


    function trinarDelete(){
        $trainer_id = $_REQUEST['trinid'];
        date_default_timezone_set("Asia/Kolkata");
         $trainer_udate =  date("m/d/yy");    
         $trainer_status = "0";

        require_once 'db.php';
        
        $sql = "UPDATE trainer SET trainer_status= '$trainer_status' , trainer_udate= '$trainer_udate' WHERE trainer_id = '$trainer_id' ";
         $retval = mysqli_query($conn, $sql);
             
         if(! $retval ) {
            die('Could not get data: ' . mysql_error());
         }   

         header('location: trainer-list.php');   
    }
?>