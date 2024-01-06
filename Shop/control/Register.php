<?php
    require('../model/Register.php');
    
    /* 
    需要有這幾個變數: goodName, goodContent, price, buyNum, totalPrice, goodID
    (buyer)買方html界面: 需要設計輸入等的資料在欄位
    (seller)賣方html界面: 需要設計以上的變數
    */
    
    $User = $_REQUEST['User'];  // 用戶分類
    $Data = $_POST["Form"];
    switch ($User) {
        case "Customer":
            $Data = json_decode($Data);
            $Password = password_hash($Data->Password, PASSWORD_DEFAULT);
            Customer_Register($Data->Name, $Data->Register_Time, $Data->Sex, $Password);
            return;

        case "Merchant":
            $Data = json_decode($Data);
            $Password = password_hash($Data->Password, PASSWORD_DEFAULT);
            Merchant_Register($Data->Name, $Data->Register_Time, $Password);
            return;

        default: 
    }
?>