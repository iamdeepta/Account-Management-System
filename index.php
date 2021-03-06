<?php
session_start();

$first_num = rand(1, 10);
$second_num = rand(1, 10);

$operators = array("+");
$operator = rand(0, count($operators)-1);
$operator = $operators[$operator];

$answer = 0;

switch ($operator) {
	case "+":
		$answer = $first_num + $second_num;
		break;
	
	/*case "-":
		$answer = $first_num - $second_num;
		break;

	case "*":
		$answer = $first_num * $second_num;
		break;*/
}

$_SESSION["answer"] = $answer;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Account Management</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="assets/img/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css"> 
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css"> 
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/iconic/css/material-design-iconic-font.min.css"> 
<!--===============================================================================================-->
	 <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css"> 
<!--===============================================================================================-->	
	 <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	 <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css"> 
<!--===============================================================================================-->
	 <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css"> 
<!--===============================================================================================-->	
	 <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css"> 
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css"> 
<!--===============================================================================================-->

<style type="text/css">
	@media only screen and (min-width: 320px){
        
			.form-control-plaintext.input1 {

				width: 20px !important;
			}

			.form-control-plaintext.input2 {

				width: 20px !important;
			}

			.form-control-plaintext.input3 {

				width: 20px !important;
			}

			.form-control-plaintext.input4 {

				width: 20px !important;
			}

			.form-control-plaintext.input5 {

				width: 10px !important;
			}
      

        }

        @media only screen and (min-width: 480px){

        	.form-control-plaintext.input1 {

				width: 20px !important;
			}

			.form-control-plaintext.input2 {

				width: 20px !important;
			}

			.form-control-plaintext.input3 {

				width: 20px !important;
			}

			.form-control-plaintext.input4 {

				width: 20px !important;
			}

			.form-control-plaintext.input5 {

				width: 10px !important;
			}
          

        }

        @media only screen and (min-width: 767px){

        	.form-control-plaintext.input1 {

				width: 50px !important;
			}

			.form-control-plaintext.input2 {

				width: 50px !important;
			}

			.form-control-plaintext.input3 {

				width: 50px !important;
			}

			.form-control-plaintext.input4 {

				width: 50px !important;
			}

			.form-control-plaintext.input5 {

				width: 70px !important;
			}
        

        }

        @media only screen and (min-width: 991px){

        	.form-control-plaintext.input1 {

				width: 50px !important;
			}

			.form-control-plaintext.input2 {

				width: 50px !important;
			}

			.form-control-plaintext.input3 {

				width: 50px !important;
			}

			.form-control-plaintext.input4 {

				width: 50px !important;
			}

			.form-control-plaintext.input5 {

				width: 70px !important;
			}
          

        }

        @media only screen and (min-width: 1200px){
         .form-control-plaintext.input1 {

				width: 50px !important;
			}

			.form-control-plaintext.input2 {

				width: 50px !important;
			}

			.form-control-plaintext.input3 {

				width: 50px !important;
			}

			.form-control-plaintext.input4 {

				width: 50px !important;
			}

			.form-control-plaintext.input5 {

				width: 70px !important;
			}
          

        }

</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('assets/img/bg-01.jpg');">

			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<!-- <img src="assets/img/login_logo.jpg" class="center" style="width: 100px; height: 100px;display: block;margin-left: auto;margin-right: auto; margin-top: -30px;"> -->
				<form class="login100-form validate-form" action="user_login.php" method="post">


					<h1 style="font-weight: bold ;text-align: center;font-size: 16px;margin-top: 10px;color: blue"> <!-- class="login100-form-title p-b-49" -->
						Account Management System
					</h1>

					<?php if(isset($_GET['msg'])){ ?>
          <div class="card" style="margin-top: 5px;">
          <div class="card-body" style="background-color: #e0aeb5; height: 30px;">
          <p style="margin-top: -10px; text-align: center; color: black">
            <?php 
          
              echo $_GET['msg'];
            //echo "The username or password is incorrect!";
          
          ?>
            
	          </p>
	        </div>
	      </div>

	    <?php } ?>


	    <?php if(isset($_GET['msg_pass'])){ ?>
          <div class="card" style="margin-top: 5px;">
          <div class="card-body" style="background-color: #DFF0D8; height: 30px;">
          <p style="margin-top: -10px; text-align: center; color: black">
            <?php 
          
              echo $_GET['msg_pass'];
            //echo "The username or password is incorrect!";
          
          ?>
            
	          </p>
	        </div>
	      </div>

	    <?php } ?>


					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is required" style="margin-top: 40px;">
						<!-- <span class="label-input100">Username</span> -->
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-symbol="&#xf206;" style="margin-top: -10px;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<!-- <span class="label-input100">Password</span> -->
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-symbol="&#xf190;" style="margin-top: -10px;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="recover_email.php">
							Forgot password?
						</a>
					</div>

					<!-- <div class="row" style="margin-left: 70px; margin-top: 10px;">


					<input type="text" name="first_num" readonly class="form-control-plaintext input1" style="width: 50px;" value="<?php echo $first_num?>">
					<input type="text" readonly class="form-control-plaintext input2" style="width: 50px;" value="<?php echo $operator?>">
					<input type="text" name="second_num"readonly class="form-control-plaintext input3" style="width: 50px;" value="<?php echo $second_num?>">
					<input type="text" readonly class="form-control-plaintext input4" style="width: 50px;" value="=">

					<input type="text" name="answer" class="form-control input5" style="width: 70px;border: 2px solid #555;border-radius: 1px;background-color: #E1F5FE">
		

					</div> -->
					
					<div class="container-login100-form-btn" style="margin-top: 30px;">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" name="submit" class="login100-form-btn">
								<!-- <a href="home.php" style="color: white"> -->
								Login
								<!-- </a> -->
							</button>
						
						</div>
					</div>

				</form>

				<!-- <footer>
				<div class="card" style="margin-top: 30px; width: 515px;margin-left: -55px">
				<div class="card-header" style="text-align: center;height: 100px">
						<div>
							<a href="http://pwd.gov.bd/" target="_blank">Technical Support: PWD MIS</a>
							
						</div>
						<div>
							<a href="http://shelltechnologiesbd.com/" target="_blank">Design & Developed By: Shell Technologies</a>
						</div>
					</div>
				</div>
				</footer> -->

				
			</div>

		</div>

	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script> 
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script> 
<!--===============================================================================================-->
  <script src="assets/js/main.js"></script>

</body>
</html>


