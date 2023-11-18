<?php
require('dbconfig.php');

function getJobList() {
	global $db;
	$sql = "select * from shop;";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果

	$rows = array(); //要回傳的陣列
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r; //將此筆資料新增到陣列中
	}
	return $rows;
}

function addJob($goodName,$goodContent,$price,$buyNum,$totalPrice,$goodID) {
	global $db;
	if($goodID>0) {
		$sql = "update todo set goodName=?, goodContent=?, price=?, buyNum=?, totalPrice=? where goodID=?"; //SQL中的 ? 代表未來要用變數綁定進去的地方
		$stmt = mysqli_prepare($db, $sql); //prepare sql statement
		mysqli_stmt_bind_param($stmt, "ssiii", $goodName, $goodContent, $price, $buyNum, $totalPrice); //bind parameters with variables, with types "sss":string, string ,string
	} else {
		$sql = "insert into todo (goodName, goodContent, price, buyNum, totalPrice) values (?, ?, ?, ?, ?)"; //SQL中的 ? 代表未來要用變數綁定進去的地方
		$stmt = mysqli_prepare($db, $sql); //prepare sql statement
		mysqli_stmt_bind_param($stmt, "ssiii", $goodName, $goodContent, $price, $buyNum, $totalPrice); //bind parameters with variables, with types "sss":string, string ,string
	}
	mysqli_stmt_execute($stmt);  //執行SQL
	return True;
}

/* update 的備用方案
function updateJob($goodID, $goodName, $goodContent, $price, $buyNum, $totalPrice) {
	echo $goodID, $goodName, $goodContent, $price, $buyNum, $totalPrice;
	return;
}
*/

function delJob($goodID) {
	global $db;

	$sql = "delete from todo where goodID=?;"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "i", $goodID); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	return True;
}
?>