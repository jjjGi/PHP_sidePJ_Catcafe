<meta charset='utf-8'>

<?php

	$num = $_GET["num"];

	$mode = $_GET["mode"];



	$con = mysqli_connect("localhost", "root", "", "20193184");


	//////////////////////////////////////////////////////////////////////////////////////////////////////////////수정 
	if($mode == "send"){
		$sql = "delete from sendmessage where num=$num";
			$url = "message_box.php?mode=send";	
	}

	else{
		$sql = "delete from receivemessage where num=$num";
			$url = "message_box.php?mode=rv";	
	}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	mysqli_query($con, $sql);



	mysqli_close($con);                // DB 연결 끊기


	echo "

	<script>

		location.href = '$url';
	</script>

	";

?>

  
