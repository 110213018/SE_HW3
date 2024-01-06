<?php
    require('dbConfig.php');
    
    function Customer_Register($Name, $Register_Time, $Sex, $Password) {
        global $db_1;

        $Id = Generate_Id("Customer");
        $C_Id = "C".str_pad($Id, 10, '0', STR_PAD_LEFT);  // 補齊10位

		$sql = "insert into customer_list (Id, Name, Register_Time, Sex, Password) values (?, ?, ?, ?, ?)"; //SQL中的 ? 代表未來要用變數綁定進去的地方
		$stmt = mysqli_prepare($db_1, $sql); //prepare sql statement
		mysqli_stmt_bind_param($stmt, "sssss", $C_Id, $Name, $Register_Time, $Sex, $Password);
	    mysqli_stmt_execute($stmt);  //執行SQL
	    return True;
    }

    function Merchant_Register($Name, $Register_Time, $Password) {
        global $db_1;

        $Id = Generate_Id("Merchant");
        $C_Id = "M".str_pad($Id, 10, '0', STR_PAD_LEFT);  // 補齊10位

		$sql = "insert into merchant_list (Id, Name, Register_Time, Password) values (?, ?, ?, ?)"; //SQL中的 ? 代表未來要用變數綁定進去的地方
		$stmt = mysqli_prepare($db_1, $sql); //prepare sql statement
		mysqli_stmt_bind_param($stmt, "ssss", $C_Id, $Name, $Register_Time, $Password);
	    mysqli_stmt_execute($stmt);  //執行SQL
	    return True;
    }

    function Generate_Id($User) {
        global $db_1;
        // $Id = array();

        $sql = "SELECT count(*) as Num FROM ".$User."_List WHERE 1";
        $stmt = mysqli_prepare($db_1, $sql);
        mysqli_stmt_execute($stmt);  // 執行sql

        $result = mysqli_stmt_get_result($stmt); //取得查詢結果
        $Id = mysqli_fetch_assoc($result);
        return $Id["Num"];
    }
?>