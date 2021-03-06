<?php session_start();
if ($_SESSION["flag"] == "ok"){ 
require("config/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Account Management</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

  <style type="text/css">
        
        @media only screen and (min-width: 320px){
         /*.text1{
           font-size: 12px;
          }*/
        

                    .form-control.input1 {
            width: 100px !important;
            margin-left: 0px !important;
            
            
          }

          .form-control.input2{

            width: 100px !important;
            margin-left: 0px !important;

          }
      
      

        }

        @media only screen and (min-width: 480px){
          .form-control.input1 {
            width: 100px !important;
            margin-left: 0px !important;
            
            
          }

          .form-control.input2{

            width: 100px !important;
            margin-left: 0px !important;

          }

        }

        @media only screen and (min-width: 767px){
          .form-control.input1 {
            width: 150px !important;
            margin-left: 5px !important;
            
          }

          .form-control.input2{

            width: 150px !important;
            margin-left: 5px !important;
          }

        }

        @media only screen and (min-width: 991px){
          .form-control.input1 {
            width: 150px !important;
            margin-left: 5px !important;
            
          }

          .form-control.input2{

            width: 150px !important;
            margin-left: 5px !important;
          }

        }

        @media only screen and (min-width: 1200px){

          /*.input-group-append{

          width: 100px;
        }*/
    
         .form-control.input1 {
            width: 150px !important;
            margin-left: 5px !important;
            
          }

          .form-control.input2{

            width: 150px !important;
            margin-left: 5px !important;
          }
          

        }
      </style>
  <!-- General CSS Files -->
  <?php include 'css_master.php';?>
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.png' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include 'nav_bar.php';?>
      <?php //include 'sidebar.php';?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <ul class="breadcrumb breadcrumb-style ">
            <li class="breadcrumb-item">
              <h4 class="page-title m-b-0">Change Password</h4>
            </li>
            <li class="breadcrumb-item">
              <a href="home.php">
                <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item">Password</li>
            <!-- <li class="breadcrumb-item">Basic Form</li> -->
          </ul>

          <?php if(isset($_GET['msg'])){ ?>
          <div class="card">
          <div class="card-body" style="background-color: #DFF0D8; height: 60px;">
          <label style="margin-top: 0px; color: black">
            <?php 
          
              echo $_GET['msg'];
          
          ?>
            
          </label>
        </div>
      </div>

    <?php }

        ?>


        <?php if(isset($_GET['msg_confirm_error'])){ ?>
          <div class="card">
          <div class="card-body" style="background-color: #e0aeb5; height: 60px;"> 
          <label style="margin-top: 0px; color: black">
            <?php 
          
              echo $_GET['msg_confirm_error'];
          
          ?>
            
          </label>
        </div>
      </div>

    <?php }

        ?>


        <?php if(isset($_GET['msg_current_error'])){ ?>
          <div class="card">
          <div class="card-body" style="background-color: #e0aeb5; height: 60px;"> 
          <label style="margin-top: 0px; color: black">
            <?php 
          
              echo $_GET['msg_current_error'];
          
          ?>
            
          </label>
        </div>
      </div>

    <?php }

        ?>

        <?php if(isset($_GET['msg_old_repeat_error'])){ ?>
          <div class="card">
          <div class="card-body" style="background-color: #e0aeb5; height: 60px;"> 
          <label style="margin-top: 0px; color: black">
            <?php 
          
              echo $_GET['msg_old_repeat_error'];
          
          ?>
            
          </label>
        </div>
      </div>

    <?php }

        ?>

          <form class="form-horizontal" action="insert_change_pass.php" method="post" data-parsley-validate>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- <div class="card-header">
                    <h4>HTML5 Form Basic</h4>
                  </div> -->
                  <div class="card-body">

                

                    <div class="form-group">
                      <label>Current Password</label>
                      <input type="password" class="form-control" name="current_pass" required>
                    </div>

                    <div class="form-group">
                      <label>New Password</label>
                      <input type="password" class="form-control" name="new_pass" required>
                    </div>

                    <div class="form-group">
                      <label>Confirm Password</label>
                      <input type="password" class="form-control" name="confirm_pass" required>
                    </div>


                 
                 <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" name="change_pass" type="submit" id="change_pass">Change</button>
                    <!-- <button class="btn btn-secondary" type="reset">Reset</button> -->
                  </div>


    
                    
                  </div>
                  
                </div>  
 
              </div>
              
            </div>
          </div>
        </form>
        </section>
      </div>

      <?php include 'footer.php';?>
      
    </div>
  </div>
  
  <?php include 'javascript.php';?>
      
</body>


</html>

<?php }else{
  header("Location: index.php"); }
  ?>




