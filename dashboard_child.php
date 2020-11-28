<?php

$msg = $_GET['msg'];

  $items = mysqli_query($conn,"SELECT * from tbl_item where category_id = $msg") or die(mysqli_error($conn));


     ?>  

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <?php //include 'css_master.php';?>


  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.png' />
</head>

<body>
  
            
            <div class="row">

              <div class="col-12">

                <button type="button" class="btn btn-primary btn-sm" name="add_amount" data-toggle="modal" data-target="#exampleModalAddAmount">Add Amount</button>

                <div class="modal fade" id="exampleModalAddAmount" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add Amount</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">

                <input type="hidden" name="modal_input" id="modal_input">
                <p id="rooms"></p>

                <form action="insert.php?msg=<?=$msg_cat?>" method="post">
                <div class="form-group">
                      <label>Date</label><label style="color: red"> *</label>
                      <input type="date" class="form-control" name="date" required>
                    </div>

                    <div class="form-group">
                      <label>Item Description</label><label style="color: red"> *</label>
                      <input type="text" class="form-control" name="item_description" required>
                    </div>

                    <div class="form-group">
                      <label>Amount</label><label style="color: red"> *</label>
                      <input type="text" class="form-control" name="amount" required>
                    </div>

                    <div class="form-group">
                      <label>Give Credit/Accept Payment</label><label style="color: red"> *</label>
                      <select class="custom-select" id="sell_payment" name="sell_payment">
                        <?php
                      //while($ministry_name=mysqli_fetch_array($result)){
                        ?>
                      
                     <option value="1">Give Credit</option> 
                     <option value="2">Accept Payment</option> 
                    
                      <?php //} ?>
                      </select>
                    </div>

              </div>
              <div class="modal-footer bg-whitesmoke br">
                <?php
                //foreach($project_info_result as $project_result){
    
                            ?>
                            

                              <!-- <input type="hidden" value="<?=$project_result['id']?>"> -->
                
                <button type="submit" class="btn btn-primary" name="btn_submit_amount">Submit</button>
              </form>
            <?php //}
              ?>
                <!-- <button type="button" style="background-color: red" class="btn btn-secondary" name="no[]" data-dismiss="modal">No</button> -->
              </div>
            </div>
          </div>
        </div>

                <div class="card" style="margin-top: 1%">
                  <div class="card-header">
                    <h4>List of Amount</h4>
                  </div>


                  <div class="card-body">

                    <?php if(isset($_GET['msg_success'])){ ?>
          <div class="card">
          <div class="card-body" style="background-color: #DFF0D8; height: 60px;"> 
          <label style="margin-top: 0px; color: black">
            <?php 
          
              echo $_GET['msg_success'];
          
          ?>
            
          </label>
        </div>
      </div>

    <?php }

        ?>

                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                          <tr>

                            <th style="width: 4%">SL</th>
                            <th style="width: 8%">Date</th>
                            <th style="width: 10%">Item Description</th>
                            <th class="duration">Amount (BDT)</th>
                            <th >Give Credit/Accept Payment</th>
                            
                            <th style="width: 5%">Action</th>
                            <!-- <th style="width: 3% !important"></th> -->
                            
                            
          
                          </tr>
                        </thead>
                        <tbody>

                          <?php

                          $sl = 0;

                         while($item=mysqli_fetch_array($items)){

                            $sl++;
                            ?>

                          
                               

                            <tr>
                              
                              <p style="display: none;">
                                <?php 
                                $originalDate = $item['date'];
                                $item['date'] = date("d/m/Y", strtotime($originalDate));
                                ?>
                              </p>
                            <td><?=$sl?></td>
                            <td><?=$item['date']?></td>
                            <td><?=$item['item_description']?></td>
                            <td><?=$item['amount']?></td>
                            <td ><?php if($item['sell_payment']==1){ echo 'Give Credit';}elseif($item['sell_payment']==2){ echo 'Accept Payment';}else{echo 'N/A';}?></td>
                        
                            <td ><form action="" method="post"><button type="button" class="btn btn-success btn-sm" name="btn_edit_amount" data-toggle="modal" data-target="#exampleModalUpdateAmount<?=$item['id']?>">Edit</button></form></td>



                            <div class="modal fade" id="exampleModalUpdateAmount<?=$item['id']?>" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Update Amount</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">

                <input type="hidden" name="modal_input" id="modal_input">
                <p id="rooms"></p>

                <form action="update_remove.php?msg=<?=$item['id']?>" method="post">
                <div class="form-group">
                      <label>Date</label><label style="color: red"> *</label>
                      <input type="date" class="form-control" name="date1" value="<?=$originalDate?>" required>
                    </div>

                    <div class="form-group">
                      <label>Item Description</label><label style="color: red"> *</label>
                      <input type="text" class="form-control" name="item_description1" value="<?=$item['item_description']?>" required>
                    </div>

                    <div class="form-group">
                      <label>Amount</label><label style="color: red"> *</label>
                      <input type="text" class="form-control" name="amount1" value="<?=$item['amount']?>" required>
                    </div>

                    <div class="form-group">
                      <label>Sell/Payment</label><label style="color: red"> *</label>
                      <select class="custom-select" id="sell_payment" name="sell_payment1">
                        <?php
                      //while($ministry_name=mysqli_fetch_array($result)){
                        ?>
                      
                     <option value="1" <?php if($item['sell_payment']==1){echo 'selected';}?>>Give Credit</option> 
                     <option value="2" <?php if($item['sell_payment']==2){echo 'selected';}?>>Accept Payment</option> 
                    
                      <?php //} ?>
                      </select>
                    </div>

              </div>
              <div class="modal-footer bg-whitesmoke br">
                <?php
                //foreach($project_info_result as $project_result){
    
                            ?>
                            

                              <!-- <input type="hidden" value="<?=$project_result['id']?>"> -->
                
                <button type="submit" class="btn btn-success" name="btn_update_amount">Update</button>
              </form>
            <?php //}
              ?>
                <!-- <button type="button" style="background-color: red" class="btn btn-secondary" name="no[]" data-dismiss="modal">No</button> -->
              </div>
            </div>
          </div>
        </div>


                          <!-- </form> -->
                           <!-- <form action="update_remove.php?msg=<?php echo$project_result['id']?>" method="post"> 
                              
                            <td><button type="submit" class="btn btn-danger"  name="remove_project[]" style="font-size: 14px; width: 35px; height: 35px;">✖</button></td>
 -->
                            <!-- data-toggle="modal" data-target="#exampleModalCenter"  data-id="<?php echo$project_result['id']?>"-->

                             <!-- </form> -->
                             <?php //include 'modal_remove.php'; ?>





                           


                          </tr>
                        
                    <?php } ?>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
 


        
          

            <!-- <style type="text/css">
              th.duration{
                  width: 15% !important;
                }
            </style> -->


</body>


</html>