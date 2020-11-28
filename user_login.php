<?php
session_start();
include("config/connection.php");

    $username = strtolower($_POST["username"]);
    $password = $_POST["pass"];
    //$user_answer = $_POST["answer"];
    $pass = md5($password);
   

    $result = mysqli_query($conn, "SELECT * from users where GenUserName = '$username'") or die(mysqli_error($conn));
	$user=mysqli_fetch_array($result);

    //foreach ($result as $user) {
		


   $user['GenUserName'] = strtolower($user['GenUserName']);
	
    
        if($user['GenUserName'] == $username && $user['GenPassword'] == $pass)
        {
            $_SESSION["flag"]="ok";
			$_SESSION["UserID"] = $user['UserID'];
			//$_SESSION["OfficeID"] = $user['OfficeID'];
			//$_SESSION["OfficeName"] = $user['OfficeName'];
            $_SESSION["GenUserName"] = $username;
            $_SESSION["FullName"] = $user['FullName'];
            //$_SESSION["privilege"] = $user['privilege'];

            header ("Location: home.php");
            }
			
			/*elseif ($user['GenUserName'] == $username && $user['GenPassword'] == $pass) {

                $_SESSION["flag"]="captcha";
           
            header ("Location: home.php");

            }*/
			
			elseif($user['GenUserName'] == $username && $user['GenPassword'] != $pass)  {

                $_SESSION["flag"]="error_pass";
            
            header ("Location: home.php");

            }
			
			elseif($user['GenUserName'] != $username && $user['GenPassword'] == $pass)  {

                $_SESSION["flag"]="error_username";
            
            header ("Location: home.php");

            }

    header("Location: home.php");
?>