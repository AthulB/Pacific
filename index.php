<!DOCTYPE html>
<?php
   require 'php/includes/User.php';
   session_start();
   if(isset($_SESSION['user']))
      $user = unserialize($_SESSION['user']);
   if(isset($_SESSION['err'])){
      echo "<script>alert('".$_SESSION['err']."');</script>";
      unset($_SESSION['err']);
   }
?>

<?php
  if(isset($_GET['code']))
  {
    require "functions.php";
	header('Content-Type: text/html; charset=utf-8');
	global $CLIENT_ID, $CLIENT_SECRET, $REDIRECT_URI;
	$client = new Google_Client();
	$client->setClientId($CLIENT_ID);
	$client->setClientSecret($CLIENT_SECRET);
	$client->setRedirectUri($REDIRECT_URI);
	$client->setScopes('email');
	$authUrl = $client->createAuthUrl();
	getCredentials($_GET['code'], $authUrl);
	$userName = $_SESSION["userInfo"]["name"];
	$userEmail = $_SESSION["userInfo"]["email"];
  }
	

?>
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Pacific</title>
	<meta name="description" content="">  
	<meta name="author" content="">

   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="css/index.css">  
   <link rel="stylesheet" href="css/landing.css">
   <link rel="stylesheet" href="css/registration.css">
   
   <!-- script
   ================================================== -->

   <!-- favicons
	================================================== -->
	<link rel="icon" type="image/png" href="images/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>

<body id="top">
	<!-- header 
   ================================================== -->
   <header>

   	<div class="row">

   		<div class="logo">
	         <a href="index.html">Pacific</a>
	      </div>

	   	<nav id="main-nav-wrap">
				<ul class="main-navigation">
					<li class="current"><a class="smoothscroll"  href="#intro" title="">Home</a></li>
					<li><a class="smoothscroll"  href="#process" title="">Process</a></li>
					<li><a class="smoothscroll"  href="#about" title="">About Us</a></li>
					<li><a class="smoothscroll"  href="#features" title="">Features</a></li>
					
               <?php if(!isset($_SESSION['user'])) {?>
                  <li class="highlight with-sep"><a onclick="login()" href="#">Login</a></li>				
               <?php } else {?>
                  <li class="highlight"><a href="php/logout.php">Logout</a></li>
                  <li class="highlight"><a href="student/dashboard.php">Dashboard</a></li>
                  <li class="highlight"><a href="#">Welcome,<?php echo $user->email ?></a></li>
               <?php }?>
               
				</ul>
			</nav>

			<a class="menu-toggle" href="#"><span>Menu</span></a>
   		
   	</div>   	
   	
   </header> <!-- /header -->       

   <div id="id2" class="modal">
      <form class="modal-content animate" method="post" action="php/login.php" >
         <span id="span2" class="close">&times;</span> 
         <div class="container">
            <h5 style="text-align: center; color: #05bca9;">Login</h5>
            <hr>
            <div class="formrow">
               <div class="col-three"><label for="email"><b>Email</b></label></div>
               <div class="col-nine"><input type="text" placeholder="Enter your Email"  name="email" required></div>           
            </div>
            <div class="formrow">
               <div class="col-three"><label for="psw"><b>Password</b></label></div>
               <div class="col-nine"><input type="password" placeholder="Enter your Password"  name="psw" required></div>              
            </div>
            <div class="formrow">
               <div class="col-six" style="text-align: center;">
                  <button type="submit" class="signupbtn">Login</button>
               </div>
               <div class="col-six" style="text-align: center;">
                  <button onclick="document.getElementById('id2').style.display='none'" class="cancelbtn">Cancel</button>
               </div>                           
            </div>
            
            
         </div>

         <div class="clearfix">           
           
         </div>
      </form>
   </div>

	<!-- intro section
   ================================================== -->
   <section id="intro">

   	<div class="shadow-overlay"></div>

   	<div class="intro-content">
   		<div class="row">

   			<div class="col-twelve">

	   			<h5>Hello welcome to Pacific.</h5>
	   			<h1>A Platfrom to test the real talent.</h1>

	   			<a class="button stroke smoothscroll" href="#process" title="">Learn More</a>

	   		</div>  
   			
   		</div>   		 		
   	</div> 
	 	

   </section> <!-- /intro -->


   <!-- Process Section
   ================================================== -->
   <section id="process">  

   	<div class="row section-intro">
   		<div class="col-twelve with-bottom-line">

   			<h5>Process</h5>
   			<h1>How it works?</h1>

   			<p class="lead">Create and Post your projects here for Evaluation and solve the real time assignments and get yourself evaluated</p>

   		</div>   		
     </div>
     
     <br><br>

   	<div class="row process-content">

   		<div class="col-three">

   			<div class="item" data-item="1">

   				<h5>Sign Up</h5>

   				<p>A college Email-Id and Password is Enough</p>
   					
         </div>
      </div>
      <div class="col-three">
        <div class="item" data-item="2">

          <h5>Upload</h5>

          <p>Upload the work or projects that you have done beyond the syllabus and get yourself evluated . Complete the tasks and assignments in given time and be a programmer streak</p>
    
        </div>
      </div>
   		
   		<div class="col-three">
   				
   			<div class="item" data-item="3">

   				<h5>Create</h5>

   				<p>Create groups and start working on the project for better experience and also get yourself a mentor and get yourself evaluated</p>
   					
         </div>
      </div>

      <div class="col-three">
        <div class="item" data-item="4">

        <h5>Publish</h5>

        <p>Keep track of all your projects before publishing and also complete the fortnight targets . Get an experience of working in a group and also be better programmer</p>
          
        </div>
      </div>

   	</div> <!-- /process-content --> 

   </section> <!-- /process-->    

<!-- About Us section -->
	<section id="about">
		<div class="row section-intro">
			<div class="col-twelve with-bottom-line">
				<h5 class="about-text">About Us</h5>
				<h1 class="about-text">Our team of creators</h1>
			</div>
		</div>
		<div class="about-content">
			<div class="col-four">
				<image src="images/person1.jpg" class="about-image"/>
				<h3 class="about-text">Milan Hazra</h3>
			</div>	
			<div class="col-four">
				<image src="images/person1.jpg" class="about-image"/>
				<h3 class="about-text">Athul Balakrishnan</h3>
			</div>
			<div class="col-four">
				<image src="images/person1.jpg" class="about-image"/>
				<h3 class="about-text">Walsh Fernandes</h3>
			</div>		
		</div>

   </section> <!-- /features --> 
   <!-- features Section
   ================================================== -->
	<section id="features">

		<div class="row section-intro">
	   		<div class="col-twelve with-bottom-line">

	   			<h5>Our features</h5>
	   			<h1>Pick the suitable account type for you.</h1>

	   		</div>   		
   		</div>

   		<div class="row features-content">

            <div class="bgrid"> 

            	<div class="features-block">

            		<div class="top-part">

	            		<h3 class="plan-title">Staff</h3>
		               <image src="images/staff.jpg" class="feature-image" width="50" height="50"/>

	            	</div>                

	               <div class="bottom-part">

	            		<ul class="features">
		                  <li>Create Assignments</li>
		                  <li>Evaluate Assignments</li>		                  
		                  <li>Evaluate Projects</li>		                  
		               </ul>

		               <a class="button large" href="">Get Started</a>

	            	</div>

            	</div>           	
                        
			   </div> <!-- /features-block -->


            <div class="bgrid">

            	<div class="features-block primary">

            		<div class="top-part">

	            		<h3 class="plan-title">Student</h3>
		               <image src="images/student.jpg" class="feature-image" width="50" height="50"/>

	            	</div>               

	               <div class="bottom-part">

	            		<ul class="features">
		                  <li>Create Projects</li>
		                  <li>Send Projects for Evaluation</li>		                  
		                  <li>Solve Assignments</li>		                  
		               </ul>

		               <a class="button large" href="">Get Started</a>

	            	</div>
            		
            	</div>            	                 

			  </div> <!-- /features-block -->


        
		<!-- ========================================================================================================================================== -->
	</section> <!-- /features -->


  <!-- ==============================Maps===================================================== -->
	      <section style="text-align:center" id="about">
            <div class="row section-intro">
                <div class="col-twelve with-bottom-line">
                <h5 class="about-text">Contact Us</h5>
                </div>
            
            </div> 

            <div class="row section-content">
            <iframe id="map" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=VESIT/@19.0453696,72.8890976,19z&key=AIzaSyApzOuCklGrR7z95uj5-vcewu5tmuzAqNw" allowfullscreen></iframe>
              <style>
              #map{
                  height : 400px;
                  width : 100%;
                  text-align:center;
              }
              </style>
            </div>         
            

        </section>

   
   <!-- footer
   ================================================== -->
   <footer>

   	<div class="footer-main">
	      	<div class="copyright">
		        <span>© Copyright Pacific.</span> 	         	
		    </div>
   	</div> <!-- /footer-main -->

   </footer>  

   <script>

      function login(){
         document.getElementById('id2').style.display='block';
      }
      //Get the modal
      var modal2 = document.getElementById('id2');
      var span2 = document.getElementById("span2");

      //When the users click anywhere outside the modal
      span2.onclick = function() {
         document.getElementById('id2').style.display='none';
         console.log("done");
      }
      window.onclick = function(event) {
         if (event.target == modal2){
            modal2.style.display='none';          
         }          
         // body...

        }
        //  =======================Form validation==========================================

  function validate(){
			var password = document.getElementById('pass').value;
			var conf_password = document.getElementById('conf_pass').value;
			var email = document.getElementById('email').value;
      var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      

    // ============================Email not valid====================

    if(email.match(mailformat)){
				
				return true;
			} else{
				alert("Email Id is not valid...");
				return false;
			}

			if(password!=conf_password){
				alert("Password Not Matched");
				return false;
			}
			
			return true;
		}


   </script>


   
   <!-- Java Script
   ================================================== --> 
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmXZEcaOOGxVpwbqYfROvxyG_u7dJGVA0&callback=initMap" 
   async defer></script>
   <script src="js/jquery-1.11.3.min.js"></script>
   <script src="js/main.js"></script>

</body>

</html>