<?php

	
// include('../layouts/nav.php');
    // include('assignment_info.php');
    // include('assignment_info.php');
    
    
    if(isset($_GET['score'])){
        $scoreupdated=$_GET['scoreupdated'];
        $aid = $_GET['aid'];
        $uid = $_GET['uid'];
    
    echo $aid;
    echo $uid;
    echo $scoreupdated;
     $conn = mysqli_connect('localhost','root','','pacific');
         $query2 = mysqli_query($conn,"UPDATE  assignment_evaluation set assignment_marks=$scoreupdated where assignment_id=$aid and user_id=$uid ");
         echo $query2;
          header("location:http://localhost/Pacific/staff/dashboard.php");
     }

