<?php
    
    require('../model/Login.php');
    
    $User = $_REQUEST['User'];  // 用戶分類
    // $Data = $_POST["Form"];
    switch ($User) {
        case "Customer":
            $Data = $_POST["Form"];
            $Data = json_decode($Data);
            echo User_Login("Customer", $Data->Name, $Data->Password);
            // echo "ok";
            return;

        case "Merchant":
            $Data = $_POST["Form"];
            $Data = json_decode($Data);
            echo User_Login("Merchant", $Data->Name, $Data->Password);
            return;

        case "Is_Login":
            session_start();
            if(isset($_SESSION["Login"])) {
                // echo $_SESSION["Login"];
                echo User_Information($_SESSION["Login"]);
                return;
            }
            else {
                echo false;
                return;
            }

        case "LogOut":
            echo LogOut($_REQUEST["U_Id"]);
            return;

        default: 
    }
?>