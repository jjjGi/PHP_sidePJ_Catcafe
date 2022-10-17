<?php
header("Content-Type: application/json; charset=UTF-8");

$obj = json_decode($_GET["content"], false);
//디코드

$chatpassword = htmlspecialchars($obj->chatpassword, ENT_QUOTES);
addslashes($chatpassword);

$con = mysqli_connect("localhost", "root", "", "20193184");

mysqli_query ($con, 'set names UTF8');


$sql= "delete from chatting WHERE num='$obj->num' AND chatpassword='$chatpassword'";

$result = mysqli_query($con, $sql);
 mysqli_close($con);
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
//다시 인코드 후 보냄 
?>