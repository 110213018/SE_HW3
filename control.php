<?php
require('model.php');

/* 
需要有這幾個變數: goodName, goodContent, price, buyNum, totalPrice, goodID
(buyer)買方html界面: 需要設計輸入等的資料在欄位
(seller)賣方html界面: 需要設計以上的變數
*/

$act=$_REQUEST['act']; // 輸出買方填入的資料表格
switch ($act) {
case "listJob":
  $jobs=getJobList();
  echo json_encode($jobs);
  return;  

case "listCart":
    $Carts=getCartList();
	echo json_encode($Carts);
	return;  

case "addJob":
    // 添加資料或是update資料  如果goodID=-1 就執行add
	// 改 的button 是setEditUI 之前老師的todoView.html 裏面有這個程式可以用一下在 最下面
	// Load Add Form 的button 是setAddUI 之前老師的todoView.html 程式碼的 最上面和最下面
	$jsonStr = $_POST['dat'];
	$job = json_decode($jsonStr);
	// addJob($job->goodsName, $job->goodsContent, $job->price, $job->buyNum, $job->totalPrice, $job->totalQuantity, $job->id, $job->Quantity);
	addJob($job->goodsName, $job->goodsContent, $job->price, 6, 666, $job->totalQuantity, 0);
	return;

case "addCart":
	// 添加資料或是update資料  如果goodID=-1 就執行add
	// 改 的button 是setEditUI 之前老師的todoView.html 裏面有這個程式可以用一下在 最下面
	// Load Add Form 的button 是setAddUI 之前老師的todoView.html 程式碼的 最上面和最下面
	$id = $_REQUEST['id'];
	// $Cart = json_decode($jsonStr);
	echo($id);
	// addJob($job->goodsName, $job->goodsContent, $job->price, $job->buyNum, $job->totalPrice, $job->totalQuantity, $job->id, $job->Quantity);
	addCart($id);
	return;

/* update 的備用方案
case "updateJob":
    $id=(int)$_REQUEST['goodID'];
    updateJob($id);
    return;
*/

case "delJob":
	$id=(int)$_REQUEST['goodID']; //$_GET, $_REQUEST
	delJob($id);
	return;

case "delJob_Cart":
	$goodsID=(int)$_REQUEST['id']; //$_GET, $_REQUEST
	delJob_Cart($goodsID);
	return;

case "gettotal":
	$id=(int)$_REQUEST['goodID'];
	gettotal($id);
	return;

case "checkout":
	// $id=(int)$_REQUEST['goodID'];
	checkout();
	return;	
default:
  
}

?>