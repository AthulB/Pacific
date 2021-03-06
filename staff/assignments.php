
<!DOCTYPE html>

 
<html>
<head>
	<title>Assignment Dashboard</title>
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

//    session_start();


    include('../layouts/nav.php');
    

    $result2 = mysqli_query($conn,"SELECT distinct c.class_id, a.assignment_id, a.assignment_name from assignments as a,class as c where a.user_id = $user->id and c.class_id = a.class_id  ");
    $result3 = mysqli_query($conn,"SELECT distinct c.class_id, a.assignment_id, a.assignment_name from assignments as a,class as c where a.user_id = $user->id and c.class_id = a.class_id  ");
    

     
    ?>


   <div id="id2" class="modal">
      <form class="modal-content animate" action="../php/create_assignments.php"  method="POST"  >
         <span onclick="document.getElementById('id2').style.display='none'" class="close" title="Close Modal">&times;</span>
         <div class="container">
            <h5 style="text-align: center; color: #05bca9;">Assignment</h5>
            <hr>

            <!-- Name of the assignment -->
            <div class="row">
               <div class="col-four">
                  <label for = "nameoftheassignment"><b>Name of the Assignment</b></label>
               </div>
               <div class="col-eight">
                  <input type="text" placeholder="Enter the name of the assignment" name = "nameoftheassignment" required>
               </div>
            </div>
            <div class="row">
               <div class="col-four">
                  <label for = "marksallotedtotheassignment"><b>Marks</b></label>
               </div>
               <div class="col-eight">
                  <input type="text" placeholder="Enter the marks alloted to the assignment" name="marksallotedtotheassignment" required>
               </div>
            </div>


            <!-- ********************** -->

             <div class="row">
               <div class="col-four">
                  <label for = "marksallotedtotheassignment"><b>Description</b></label>
               </div>
               <div class="col-eight">
                  <textarea style="width:100%; height : 50px;" placeholder="Enter the description for the assignment" name="descriptionoftheassignment" required></textarea>
               </div>
            </div>




            <div class="row">
               <div class="col-four">
                  <label for = "selectclass"><b>Select Class</b></label>
               </div>
               <div class="col-eight">
                  <select style="width:100%" class="round"  name="classalloted">
                     <option value="0" disabled>Select Class</option>
                     <option value="D5">D5</option>
                     <option value="D10">D10</option>
                     <option value="D15">D15</option>
                     <option value="D20">D20</option>
                     <option value="Teaching_staff">Teaching Staff</option>               
                  </select>
               </div>
            </div>
            <br>
            <div class="row">
               <div class="col-four">
                  <label for = "assignmenttype"><b>Assignment Type</b></label>
               </div>
               <div class="col-eight">
                  <select style="width:100%" class="round" name="assignment_type"  >
                     <option value="0" disabled>Assignment Type</option>
                     <option value="document">Document</option>
                     <option value="code">Code</option>
                  </select>
               </div>
            </div>
            <br>
            <div class="row">
               <div class="col-four">
                  <label for ="deadline">Deadline</label>
               </div>
               <div class="col-eight">
                  <input style="width:100%; height: 30px;" type = "datetime-local" placeholder="Enter the Description of the project" name="deadline" required></textarea>
               </div>
            </div>

            </div>
            
            <div class="row">
               <div class="col-six" style="text-align: center">
                  <button type="submit" class="signupbtn">Save</button>
               </div>
               <div class="col-six" style="text-align: center">
                  <button onclick="document.getElementById('id2').style.display='none'" class="cancelbtn">Cancel</button>
               </div>                           
            </div>
            



         </div>
      </form>
   </div>
  

   <section class="stats">
         <div class="row">
            <button onclick="document.getElementById('id2').style.display='block'" style="width:auto; float: right;"><i class="fa fa-plus"></i>&nbsp;Create Assignment</button>
         </div>
   		<div class="row">
   			<div class="col-twelve">
                  <div class="container">
                     <h5 class="add">Assignments Evaluated</h5>                 
                     <table class="table-common">
                        <tr>
                           <th width = 80%>Title</th>
                           
                        </tr>
                          <?php
                                
                               
                                while($rows = mysqli_fetch_assoc($result2))
                                {
                          ?>
                          <tr>
                          <td><a href="assignment_info.php?id=<?php echo $rows['class_id'] ; ?>&id2=<?php echo $rows['assignment_id']; ?>"><h4><?php  echo $rows['assignment_name']; ?></h4></a></td>
                          
                              
                              
        
                          </tr>
                        <?php  }
                        
  
                        ?>
                        

                       
                     </table>
                  </div>
            </div>
   		</div>
   		<div class="row">
            <div class="col-twelve">
                  <div class="container">
                     <h5 class="add">Assignments Not Evaluated</h5>                 
                     <table class="table-common">
                        <tr>
                           <th>Title</th>
                        </tr>
                        <?php 


                                          
                                while($rows = mysqli_fetch_assoc($result3))
                                {
                          ?>
                          <tr>
                          <td><a href="not_evaluated.php?id=<?php echo $rows['class_id'] ; ?>&id2=<?php echo $rows['assignment_id']; ?>"><h4><?php  echo $rows['assignment_name']; ?></h4></a></td>
                          
                              
                              
        
                          </tr>
                        <?php  }
                        
  
                        ?>
                        
                            
                        
                        </table>
                  </div>
            </div>
         </div>
   </section>
	
   <div class="clearfix"></div>
	<?php include('../layouts/footer.php') ?>
   <script >


      var modal = document.getElementById('id2');

//When the users click anywhere outside the modal
window.onclick = function(event) {
   if (event.target == modal){
      modal.style.display = "none";
   } 
   // body...
}



       var slider = document.getElementById("MyRange");
       var output = document.getElementById("demo");
       output.innerHTML = slider.value;

       slider.oninput = function(){
          output.innerHTML = this.value;

       }
      
   </script> 
   <script src="../js/jquery-1.11.3.min.js"></script>
   <script src="../js/plugins.js"></script>
   <script src="../js/main.js"></script>
</body>
</html>