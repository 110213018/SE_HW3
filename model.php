<?php
require('dbconfig.php');

function getJobList() {
	global $db;
	$sql = "select * from shop where 1;";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果

	$rows = array(); //要回傳的陣列
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r; //將此筆資料新增到陣列中
	}
	return $rows;
}

function getCartList() {
	global $db;
	$sql = "select * from shop where buyNum>0;";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果

	$rows = array(); //要回傳的陣列
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r; //將此筆資料新增到陣列中
	}
	return $rows;
}

function addJob($goodsName,$goodsContent,$price,$buyNum, $totalPrice, $totalQuantity, $goodsID) {
	global $db;
	if($goodsID>0) {
		$sql = "update shop set goodsName=?, goodsContent=?, price=?, buyNum=?, totalPrice=?, totalQuantity=? where id=?"; //SQL中的 ? 代表未來要用變數綁定進去的地方
		$stmt = mysqli_prepare($db, $sql); //prepare sql statement
		mysqli_stmt_bind_param($stmt, "ssiiiiii", $goodsName, $goodsContent, $price, $buyNum, $totalPrice, $totalQuantity, $Quantity, $goodsID);
	} else {
		$sql = "insert into shop (goodsName, goodsContent, price, totalQuantity) values (?, ?, ?, ?)"; //SQL中的 ? 代表未來要用變數綁定進去的地方
		$stmt = mysqli_prepare($db, $sql); //prepare sql statement
		mysqli_stmt_bind_param($stmt, "ssii", $goodsName, $goodsContent, $price, $totalQuantity);
	}
	mysqli_stmt_execute($stmt);  //執行SQL
	return True;
}

/* update 的備用方案
function updateJob($goodsID, $goodsName, $goodsContent, $price, $buyNum, $totalPrice) {
	echo $goodsID, $goodsName, $goodsContent, $price, $buyNum, $totalPrice;
	return;
}
*/

function delJob($goodsID) {
	global $db;

	$sql = "delete from shop where id=?;"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "i", $goodsID); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	return True;
}
function delJob_Cart($goodsID) {
	global $db;
    
	$sql = "update shop set totalQuantity=totalQuantity+buyNum, buyNum=0, totalPrice=0 where id=?;"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "i", $goodsID); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	
	return True;
}

function addCart($id) {
	global $db;

	$sql = "update shop set buyNum=buyNum+1, totalQuantity=totalQuantity-1 where totalQuantity>0 and id=?;";
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "i", $id); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	gettotal($id);
	return True;
}
function gettotal($goodsID) {
	global $db;

	$sql = "update shop set totalPrice=buyNum*price where id=?;"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "i", $goodsID); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);
	  //執行SQL
	$result = mysqli_stmt_get_result($stmt);
	if ($result && $row = mysqli_fetch_assoc($result)) {
        return $row['total'];
    }

    return 0;
}
function checkout() {
    global $db;

    $sql = "select sum(price * buyNum) from shop1";
    
	$stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if ($result && $row = mysqli_fetch_assoc($result)) {
        return $row['total'];

    }
    $sql = "update shop set buyNum=0, totalPrice=0 where 1;";

    return 0;
}
function rateProduct($productId, $rating) {
    global $db;
    $sql = "UPDATE shop SET rating = ? WHERE id = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $rating, $productId);
    mysqli_stmt_execute($stmt);
    return true;
}
?>
