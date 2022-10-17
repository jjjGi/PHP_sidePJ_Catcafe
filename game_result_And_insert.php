<style type="text/css">
	body{
		background-color: rgb(237,191,7);
	}
	#close {
  position: absolute; top: 150px; left: 110px; margin-top: 10px;
   cursor:pointer;
}
</style>
<?php
session_start();
if(isset($_SESSION["userid"])){
	$userid=$_SESSION["userid"];
}
else{
	$userid="";
}


$nowresult= $_GET["result"];



$con= mysqli_connect("localhost","root","","20193184");
mysqli_query($con,"set names UTF8");
$sql1= "select game_result from members where id='$userid'";		//현재 사용자의 최고점수를 받아옴
$sql2="select *from members order by game_result desc limit 5";		//상위 5위권 사람들의 점수
$sql3="update members set game_result = $nowresult where id='$userid'";	//최고기록 갱신시 기록 넣으려고 
$result1= mysqli_query($con,$sql1);
if(!$result1){
	echo "멤버 테이블을 생성 후 이용해주세요!";
	mysqli_close($con);
    exit;
}
$num_match= mysqli_num_rows($result1);
echo "<b>$nowresult 점 입니다!</b><br><br>";

if(!$num_match){
	
	echo"로그인 후 게임을 하시면 점수를 저장하실 수 있습니다.<br><br>";
	
}
else{
	
	$row=mysqli_fetch_array($result1);
	if($row["game_result"]<$nowresult){
		echo "축하드립니다! $userid 님의 최고기록입니다.<br>";	
		$result3= mysqli_query($con,$sql3);					 

		$result2= mysqli_query($con,$sql2);
		$num_match= mysqli_num_rows($result2);
		if(!$num_match){
			echo "점수를 업데이트 하는데 실패하였습니다.";
		}

		else{
			$rank=1;
			while($row=mysqli_fetch_array($result2)){
		
				$winscore=$row["game_result"];
				if($nowresult==$winscore){
					echo "와우~~~~!!! 순위권 안에 드셨습니다~!!!<br>";
					echo "$rank 등입니다!<br>";							
					break;
				}

				$rank++;
			}
		}
	}
}




mysqli_close($con);



?>

<img id= "close" src="./img/close.png" onclick="javascript:self.close()">