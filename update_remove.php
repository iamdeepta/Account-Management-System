<?php

session_start();

if (isset($_POST['btn_update']) && $_SESSION["flag"] == "ok") {

	require("config/connection.php");

    $msg = $_GET['msg'];

        $category_name1 = $_POST["category_name1"];
        

        
        $user_id = $_SESSION["UserID"];
        //$OfficeID = $_SESSION["OfficeID"];
    
        

          

        $categoryQuery1 = "UPDATE tbl_category 
                    SET 
                        `name` = '{$category_name1}'

                        WHERE id = $msg
                        
                      
                ";

        $category1 = mysqli_query($conn, $categoryQuery1);


    //}



        /*$lastID = $connection->lastInsertID();
        $contract_id=$lastID;*/


	$msg_success1 = "The category has been updated successfully!";
    //echo 'Inser successfully';
	header("Location: home.php?msg_success=".$msg_success1);

}



if (isset($_POST['btn_update_amount']) && $_SESSION["flag"] == "ok") {

    require("config/connection.php");

    $msg = $_GET['msg'];

        $date1 = $_POST["date1"];
        $item_description1 = $_POST["item_description1"];
        $amount1 = $_POST["amount1"];
        $sell_payment1 = $_POST["sell_payment1"];
        

        
        $user_id = $_SESSION["UserID"];
        //$OfficeID = $_SESSION["OfficeID"];
    
        
        $cat_id = mysqli_query($conn,"SELECT * from tbl_item where id = $msg") or die(mysqli_error($conn));

        foreach($cat_id as $cat){

            $c_id = $cat['category_id'];
        }
          

        $amountQuery1 = "UPDATE tbl_item 
                    SET 
                        `date` = '{$date1}',
                        `item_description` = '{$item_description1}',
                        `amount` = '{$amount1}',
                        `sell_payment` = '{$sell_payment1}'

                        WHERE id = $msg
                        
                      
                ";

        $amount1 = mysqli_query($conn, $amountQuery1);


        $query = mysqli_query($conn,"SELECT ti.*, tb.* from tbl_item as ti left outer join tbl_bank as tb on ti.id = tb.item_id where ti.id = $msg") or die(mysqli_error($conn));


        foreach($query as $q){

            $sell_pay = $q['sell_payment'];
            $item_id1 = $q['item_id'];
            $debit = $q['debit'];
            $credit = $q['credit'];
            $profit = $q['profit'];
            $amount = $q['amount'];
        }

        if ($sell_pay==1) {
            
            if ($debit == 0) {
                $zero = 0;

                $itemQuery1 = "UPDATE tbl_bank 
                    SET 
                        
                        
                        `debit` = '{$amount}',
                        `credit` = '{$zero}',
                        `profit` = -'{$amount}'

                        WHERE item_id = $item_id1
                        
                      
                ";

        $item = mysqli_query($conn, $itemQuery1);
                
            }else{

                $zero = 0;

                $itemQuery1 = "UPDATE tbl_bank 
                    SET 
                        
                        
                        `debit` = '{$amount}',
                        `credit` = '{$credit}',
                        `profit` = -'{$amount}'

                        WHERE item_id = $item_id1
                        
                      
                ";

        $item = mysqli_query($conn, $itemQuery1);
            }

        }elseif($sell_pay==2){

            if ($credit == 0) {
                $zero = 0;

                $itemQuery1 = "UPDATE tbl_bank 
                    SET 
                        
                        
                        `debit` = '{$zero}',
                        `credit` = '{$amount}',
                        `profit` = '{$amount}'

                        WHERE item_id = $item_id1
                        
                      
                ";

        $item = mysqli_query($conn, $itemQuery1);
                
            }else{

                $zero = 0;

                $itemQuery1 = "UPDATE tbl_bank 
                    SET 
                        
                        
                        `debit` = '{$debit}',
                        `credit` = '{$amount}',
                        `profit` = '{$amount}'

                        WHERE item_id = $item_id1
                        
                      
                ";

        $item = mysqli_query($conn, $itemQuery1);
            }
        }else{

            $msg_error = "There occurs an error while updating!";
    
    header("Location: home.php?msg=".$c_id."&msg_success=".$msg_error);

        }
 


    //}



        /*$lastID = $connection->lastInsertID();
        $contract_id=$lastID;*/


    $msg_success1 = "The item has been updated successfully!";
    //echo 'Inser successfully';
    header("Location: home.php?msg=".$c_id."&msg_success=".$msg_success1);

}

?>