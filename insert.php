<?php

session_start();

/*insert into contract*/
if (isset($_POST['btn_submit']) && $_SESSION["flag"] == "ok") {

	require("config/connection.php");

        $category_name = $_POST["category_name"];
        

        
        $user_id = $_SESSION["UserID"];
        //$OfficeID = $_SESSION["OfficeID"];
    
        

          

        $categoryQuery = "INSERT INTO tbl_category 
                    SET 
                        `name` = '{$category_name}'
                        
                      
                ";

        $category = mysqli_query($conn, $categoryQuery);


    //}



        /*$lastID = $connection->lastInsertID();
        $contract_id=$lastID;*/


	$msg_success = "The category has been added successfully!";
    //echo 'Inser successfully';
	header("Location: home.php?msg_success=".$msg_success);

}


if (isset($_POST['btn_submit_amount']) && $_SESSION["flag"] == "ok") {

    require("config/connection.php");

    $msg = $_GET['msg'];

        $date = $_POST["date"];
        $item_description = $_POST["item_description"];
        $amount = $_POST["amount"];
        $sell_payment = $_POST["sell_payment"];
        

        
        $user_id = $_SESSION["UserID"];
        //$OfficeID = $_SESSION["OfficeID"];
    
        

          

        $itemQuery = "INSERT INTO tbl_item 
                    SET 
                        `date` = '{$date}',
                        `item_description` = '{$item_description}',
                        `amount` = '{$amount}',
                        `sell_payment` = '{$sell_payment}',
                        `category_id` = '{$msg}'
                        
                      
                ";

        $item = mysqli_query($conn, $itemQuery);

        $lastID = mysqli_insert_id($conn);


        $items1 = mysqli_query($conn,"SELECT * from tbl_item where id=$lastID") or die(mysqli_error($conn));


        foreach($items1 as $item1){

            $id = $item1['id'];
            $sell_pay = $item1['sell_payment'];
            $amount_last = $item1['amount'];
        }

        if($sell_pay==1){

            $zero = 0;

            $itemQuery = "INSERT INTO tbl_bank 
                    SET 
                        `item_id` = '{$id}',
                        `debit` = '{$amount_last}',
                        `credit` = '{$zero}',
                        `profit` = -'{$amount_last}'
                        
                      
                ";

        }elseif ($sell_pay==2) {
            
            $zero = 0;

            $itemQuery = "INSERT INTO tbl_bank 
                    SET 
                        `item_id` = '{$id}',
                        `debit` = '{$zero}',
                        `credit` = '{$amount_last}',
                        `profit` = '{$amount_last}'
                        
                      
                ";
        }


        $item = mysqli_query($conn, $itemQuery);

    //}



        /*$lastID = $connection->lastInsertID();
        $contract_id=$lastID;*/


    $msg_success = "The item has been added successfully!";
    //echo 'Inser successfully';
    header("Location: home.php?msg=".$msg."&msg_success=".$msg_success);

}



if (isset($_POST['btn_submit_main_balance']) && $_SESSION["flag"] == "ok") {

    require("config/connection.php");

        $main_balance = $_POST["main_balance"];
        

        
        $user_id = $_SESSION["UserID"];
        //$OfficeID = $_SESSION["OfficeID"];
    
        

          

        $mainbalanceQuery = "INSERT INTO tbl_main_balance 
                    SET 
                        `main_balance` = '{$main_balance}'
                        
                      
                ";

        $mainbalance = mysqli_query($conn, $mainbalanceQuery);


    //}



        /*$lastID = $connection->lastInsertID();
        $contract_id=$lastID;*/


    $msg_success = "The balance has been added successfully!";
    //echo $mainbalanceQuery;
    header("Location: home.php?msg_success_balance=".$msg_success);

}




?>