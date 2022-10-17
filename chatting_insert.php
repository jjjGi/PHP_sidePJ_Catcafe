<?php
header("Content-Type: application/json; charset=UTF-8");

$obj = json_decode($_GET["content"], false);
//디코드
$chattext = htmlspecialchars($obj->chattext, ENT_QUOTES);
$chatuser = htmlspecialchars($obj->chatuser, ENT_QUOTES);
$chatpassword = htmlspecialchars($obj->chatpassword, ENT_QUOTES);
addslashes($chattext);
addslashes($chatuser);
addslashes($chatpassword);
$chattime = date("Y-m-d (H:i) D");  // 현재의 '년-월-일-시-분'을 저장

$con = mysqli_connect("localhost", "root", "", "20193184");

mysqli_query ($con, 'set names UTF8');


$sql= "insert into chatting (chatuser,chattext,chatpassword,chattime) 
VALUES ('$chatuser','$chattext','$chatpassword','$chattime')";

$result = mysqli_query($con, $sql);

 mysqli_close($con);

$outp = $result->fetch_all(MYSQLI_ASSOC);
//한행씩 넣는다.
echo json_encode($outp);
//다시 인코드. 후 보낸다
?>