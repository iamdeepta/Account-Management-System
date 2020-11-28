<?php

  $categories = mysqli_query($conn,"SELECT tc.id, tc.name, sum(tb.credit) as credit, sum(tb.debit) as debit, sum(tb.profit) as profit FROM tbl_category as tc left outer join tbl_item as ti on tc.id = ti.category_id left outer join tbl_bank as tb on tb.item_id = ti.id group by tc.id order by tc.name asc") or die(mysqli_error($conn));


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

                <button type="button" class="btn btn-primary btn-sm" name="add_category" data-toggle="modal" data-target="#exampleModalAddCategory">Add Project</button>

                <div class="modal fade" id="exampleModalAddCategory" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">

                <input type="hidden" name="modal_input" id="modal_input">
                <p id="rooms"></p>

                <form action="insert.php" method="post">
                <div class="form-group">
                      <label>Project name</label><label style="color: red"> *</label>
                      <input type="text" class="form-control" name="category_name" required>
                    </div>

              </div>
              <div class="modal-footer bg-whitesmoke br">
                <?php
                //foreach($project_info_result as $project_result){
    
                            ?>
                            

                              <!-- <input type="hidden" value="<?=$project_result['id']?>"> -->
                
                <button type="submit" class="btn btn-primary" name="btn_submit">Submit</button>
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
                    <h4>List of Projects</h4>
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

                            <th style="width: 12%">Project Name</th>
                            <th style="width: 12%">Give Credit</th>
                            <th style="width: 12%">Accept Payment</th>
                            <th class="duration">Profit</th>
                            
                            <th style="width: 5%">Action</th>
                            <!-- <th style="width: 3% !important"></th> -->
                            
                            
          
                          </tr>
                        </thead>
                        <tbody>

                          <?php

                          $sl = 0;

                         while($category=mysqli_fetch_array($categories)){

                            $sl++;
                            ?>

                          
                               

                            <tr>
                              
                            <td><a href="home.php?msg=<?=$category['id']?>"><?php echo $category['name'];?></a></td>
                            <td><?php if($category['debit']==NULL){ echo '0';}else{ echo $category['debit'];}?></td>
                            <td><?php if($category['credit']==NULL){ echo '0';}else{ echo $category['credit'];}?></td>
                            <td ><?php if($category['profit']==NULL){ echo '0';}else{ echo $category['profit'];}?></td>
                        
                            <td ><!-- <form action="" method="post"> --><button type="button" class="btn btn-success btn-sm" name="btn_edit" data-toggle="modal" data-target="#exampleModalUpdateCategory<?=$category['id']?>">Edit</button><!-- </form> --></td>


                            <div class="modal fade" id="exampleModalUpdateCategory<?=$category['id']?>" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Update Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">

                <input type="hidden" name="modal_input" id="modal_input">
                <p id="rooms"></p>

                <form action="update_remove.php?msg=<?=$category['id']?>" method="post">
                <div class="form-group">
                      <label>Category name</label><label style="color: red"> *</label>
                      <input type="text" class="form-control" value="<?=$category['name']?>" name="category_name1" required>
                    </div>

              </div>
              <div class="modal-footer bg-whitesmoke br">
                <?php
                //foreach($project_info_result as $project_result){
    
                            ?>
                            

                              <!-- <input type="hidden" value="<?=$project_result['id']?>"> -->
                
                <button type="submit" class="btn btn-success" name="btn_update">Update</button>
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