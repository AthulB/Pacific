<!DOCTYPE html>
<html>
<head>
	<title>Pacific | Dashboard</title>
	<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/projects.css">
	<link rel="stylesheet" type="text/css" href="../css/index.css">
</head>

<body id="top">
   <?php
   require "../php/includes/db.php";
   $active="assignments";
    include('../layouts/nav.php');
    
    $result5 = mysqli_query($conn,"SELECT a.assignment_name,a.assignment_id from assignments as a,users as u where a.assignment_id not in (select e.assignment_id from assignment_evaluation as e) and a.class_id = u.class_id and u.user_id = $user->id ");//assignments pending
    $rowcount2 = mysqli_num_rows($result5);
    $result4 = mysqli_query($conn,"SELECT a.assignment_id,a.assignment_name,e.assignment_marks from assignments as a,assignment_evaluation as e where a.assignment_id = e.assignment_id and e.user_id = $user->id ");//assignments pending
    
 ?>

   <section class="stats">
   		<div class="row">
   			<div class="col-twelve">
                  <div class="container">
                     <h5 class="add">Assignments Submitted</h5>                 
                     <table class="table-common">
                        <tr>
                           <th>Title</th>
                           <th>Score</th>
                        </tr>
                        <?php
                                //include('../php/create_assignments.php');
                               
                              while($rows1 = mysqli_fetch_assoc($result4)  )
                              {
                        ?>
                       
                        <tr>
                        <td><a href="assignment_info.php?id=<?php echo $rows1['assignment_id']; ?>"><h4><?php  echo $rows1['assignment_name']; ?></h4></a></td>
                        <td><a href="assignment_info.php"><h4><?php  echo $rows1['assignment_marks']; ?></h4></a></td>
                        </tr>
                        <!-- <tr>
                           <td><a href="assignment_info.php"><h4>Assignment 2</h4></a></td>
                           <td class="score">50</td>
                        </tr>
                        <tr>
                           <td><a href="assignment_info.php"><h4>Assignment 3</h4></a></td>
                           <td class="score">50</td>
                        </tr> -->

                        <?php  }?>
                     </table>
                  </div>
            </div>
   		</div>
   		<div class="row">
            <div class="col-twelve">
                  <div class="container">
                     <h5 class="add">Assignments Pending</h5>                 
                     <table class="table-common">
                        <tr>
                           <th>Title</th>
                        </tr>


                                     <?php
                               
                               
                               while($rows2 = mysqli_fetch_assoc($result5) )
                               {
                         ?>
                         <tr>
                         
                            <td><a href="assignment_info.php?id=<?php echo $rows2['assignment_id']; ?>"><h4><?php  echo $rows2['assignment_name']; ?></h4></a></td>
                            
                            
                            
                            
                         </tr>
                       <?php  }?>
                     




                       </table>
                  </div>
            </div>
         </div>
   </section>
	<div class="clearfix"></div>
   <?php include('../layouts/footer.php') ?>
   <script src="../js/jquery-1.11.3.min.js"></script>
   <script src="../js/plugins.js"></script>
   <script src="../js/main.js"></script>
</body>
</html>