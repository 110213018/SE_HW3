<?php
    require('dbConfig.php');
    
    function User_Login($User, $Name, $Password) {
        global $db_1;

        $sql = "";
        if($User == "Customer") {
            $sql = "SELECT * FROM `customer_list` WHERE `Name`=?";
        }
        else if($User == "Merchant") {
            $sql = "SELECT * FROM `merchant_list` WHERE `Name`=?";
        }
        $stmt = mysqli_prepare($db_1, $sql);
		mysqli_stmt_bind_param($stmt, "s", $Name);
        mysqli_stmt_execute($stmt);  // 執行sql
        
        $result = mysqli_stmt_get_result($stmt);
        if($Data = mysqli_fetch_assoc($result)) {
            if(password_verify($Password, $Data["Password"])) {
                // session_id($Data["Id"]);
                session_start();
                $_SESSION["Login"] = $Data["Id"];
                return $Data["Id"];
            }
            else {
                return "0密碼錯誤";
            }
        }
        else {
            return "0用戶不存在";
        }
    }

    function User_Information($U_Id) {
        global $db_1;

        $User = substr($U_Id,0,1);

        $sql = "";
        if($User == "C") {
            $sql = "SELECT * FROM `customer_list` WHERE `Id`=?";
        }
        else if($User == "M") {
            $sql = "SELECT * FROM `merchant_list` WHERE `Id`=?";
        }
        $stmt = mysqli_prepare($db_1, $sql);
		mysqli_stmt_bind_param($stmt, "s", $U_Id);
        mysqli_stmt_execute($stmt);  // 執行sql
        
        $result = mysqli_stmt_get_result($stmt);
        if($Data = mysqli_fetch_assoc($result)) {
            return json_encode($Data);
        }
        else {
            return "0用戶不存在";
        }
    }

    function LogOut($U_Id) {
        session_start();
        unset($_SESSION["Login"]);
        return "用戶登出";
    }
?>