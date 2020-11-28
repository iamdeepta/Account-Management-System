<?php
	

$balances = mysqli_query($conn,"SELECT sum(credit) as payment, sum(debit) as sell, sum(profit) as profit from tbl_bank") or die(mysqli_error($conn));

$balance=mysqli_fetch_array($balances);


$main_balances = mysqli_query($conn,"SELECT * from tbl_main_balance order by id desc limit 1") or die(mysqli_error($conn));

$m_balance=mysqli_fetch_array($main_balances);

?>


<div class="row ">


            <div class="col-xl-3 col-lg-6">
              <!-- <button type="submit" name="no_of_projects" style="height: 10px;border:none;background:none;"> -->
                <!-- <form action="" method="post"> -->
              <div class="card l-bg-green-dark">
                <button type="button" name="no_of_projects" data-toggle="modal" data-target="#exampleModalMainBalance" style="border:none; background: none"><div class="card-statistic-3 p-4">
                  <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                  <div class="mb-4">
                    <h5 class="card-title mb-0">Balance</h5>
                  </div>
                  <div class="row align-items-center mb-2 d-flex">
                    <div class="col-8" style="margin-left: 25%">
                      <?php $net_balance = $m_balance['main_balance']+($balance['payment']-$balance['sell']);
                      if($net_balance < 0){
                      ?>
                      <h2 class="d-flex align-items-center mb-0" style="color: red; font-weight: bold;">

                      <?php }else{?>

                        <h2 class="d-flex align-items-center mb-0">

                        <?php }?>
                        <?php 
                        
                        echo $net_balance;?>
                      </h2>
                    </div>
                    <!-- <div class="col-4 text-right">
                      <span>10% <i class="fa fa-arrow-up"></i></span>
                    </div> -->
                  </div>
                  <!-- <div class="progress mt-1 " data-height="8">
                    <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div> -->
                </div></button>


                <div class="modal fade" id="exampleModalMainBalance" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle" style="color: black">Add Main Balance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">

                <input type="hidden" name="modal_input" id="modal_input">
                <p id="rooms"></p>

                <form action="insert.php" method="post">
                <div class="form-group">
                      <label>Main Balance</label><label style="color: red"> *</label>
                      <input type="text" class="form-control" name="main_balance" required>
                    </div>

                  

              </div>
              <div class="modal-footer bg-whitesmoke br">
                <?php
                //foreach($project_info_result as $project_result){
    
                            ?>
                            

                              <!-- <input type="hidden" value="<?=$project_result['id']?>"> -->
                
                <button type="submit" class="btn btn-primary" name="btn_submit_main_balance">Submit</button>
              </form>
            <?php //}
              ?>
                <!-- <button type="button" style="background-color: red" class="btn btn-secondary" name="no[]" data-dismiss="modal">No</button> -->
              </div>
            </div>
          </div>
        </div>



              </div>
            <!-- </form> -->
            <!-- </button> -->
            </div>
            
            <div class="col-xl-3 col-lg-6">
              <!-- <button type="submit" name="no_of_contracts" style="height: 10px;border:none;background:none;"> --> 
                <form action="home.php" method="post">
              <div class="card l-bg-cherry">
                <!-- <a href="home.php" class="submit"> -->
                <button type="submit" name="no_of_contracts" style="border:none; background: none"><div class="card-statistic-3 p-4">
                  <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
                  <!-- <div class="col-4 text-left">
                      <span>Development <i class="fa fa-arrow-up"></i></span>
                    </div> -->
                  <div class="mb-4">

                    <h5 class="card-title mb-0">Give Credit</h5>
                  
                  </div>
                  <div class="row align-items-center mb-2 d-flex">

                    <div class="col-8" style="margin-left: 25%;">
                      <!-- <p class="d-flex" style="font-size: 12px; margin-left: -10px;">Development</p> -->
                      
                      <h2 class="d-flex align-items-center mb-0" >
                        
                        
                         <?php echo $balance['sell']?>
                      
                      </h2>
                  
                    </div>


                    <!-- <div class="col-4 text-right d-flex div1" style="margin-top: -23px;">
                      <p class="d-flex revenue" style="font-size: 12px; margin-left: 0px;">Revenue</p>
                      <p class="d-flex percent" style="margin-top: 20px; margin-left: -45px;">12.5% <i class="fa fa-arrow-up d-flex" style="margin-top: 4px; margin-left: 0px;"></i></p>
                      
                    </div> -->
                  </div>
                  <!-- <div class="row" style="margin-top: -4px;">
                  <div class="progress mt-1 d-flex" data-height="8" style="width: 40%">
                    <div class="progress-bar l-bg-cyan d-flex" role="progressbar" data-width="50%" aria-valuenow="0"
                      aria-valuemin="0" aria-valuemax="20" style="margin-top: -75px;width: 20px;"></div>
                     

                  </div>
                  <div class="progress mt-1 d-flex progress2" data-height="8" style="width: 40%; margin-left: 40px;">
                    <div class="progress-bar l-bg-cyan d-flex" role="progressbar" data-width="50%" aria-valuenow="0"
                      aria-valuemin="0" aria-valuemax="20" style="margin-top: -75px;width: 20px;"></div>
                      
                  </div>
                </div> -->

                </div></button>
              <!-- </a> -->
              </div>
            </form>
              <!-- </button> -->
            </div>
          
            <div class="col-xl-3 col-lg-6">
              <!-- <button type="submit" name="no_of_contractors" style="height: 10px;border:none;background:none;"> -->
                <form action="home.php" method="post">
              <div class="card l-bg-blue-dark">
                <button type="submit" name="no_of_contractors" style="border:none; background: none"><div class="card-statistic-3 p-4">
                  <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                  <div class="mb-4">
                    <h5 class="card-title mb-0">Accept Payment</h5>
                  </div>
                  <div class="row align-items-center mb-2 d-flex">
                    <div class="col-8" style="margin-left: 25%;">
                      
                      <h2 class="d-flex align-items-center mb-0">
                        <?php echo $balance['payment']?>
                      </h2>
                    
                    </div>
                    <!-- <div class="col-4 text-right">
                      <span>9.23% <i class="fa fa-arrow-up"></i></span>
                    </div> -->
                  </div>
                  <!-- <div class="progress mt-1 " data-height="8">
                    <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div> -->
                </div></button>
              </div>
            </form>
            <!-- </button> -->
            </div>

            <div class="col-xl-3 col-lg-6">
             <!--  <button type="submit" name="contracts_today" style="height: 10px;border:none;background:none;"> -->
              <form action="home.php" method="post">
              <div class="card l-bg-orange-dark">
                <button type="submit" name="contracts_today" style="border:none; background: none"><div class="card-statistic-3 p-4">
                  <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                  <div class="mb-4">
                    <h5 class="card-title mb-0">Profit</h5>
                  </div>
                  <div class="row align-items-center mb-2 d-flex">
                    <div class="col-8" style="margin-left: 25%;">

                      <?php if($balance['profit']<0){?>
                      
                      <h2 class="d-flex align-items-center mb-0" style="color: red; font-weight: bold;">
                      <?php }else{?>

                        <h2 class="d-flex align-items-center mb-0">

                        <?php }?>
                        <?php echo $balance['profit']?>
                      </h2>
                    
                    </div>
                   <!--  <div class="col-4 text-right">
                      <span>2.5% <i class="fa fa-arrow-up"></i></span>
                    </div> -->
                  </div>
                  <!-- <div class="progress mt-1 " data-height="8">
                    <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div> -->
                </div></button>
              </div>
            </form>
            <!-- </button> -->
            </div>
          </div>