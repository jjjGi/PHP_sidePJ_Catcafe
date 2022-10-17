<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>고양이 팬카페</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">

<script>
	
function search_check(){
	//검색내용 없을때 
	if(!document.boardsearch_form.keyword.value){
		alert("검색 내용을 입력하세요!");
		return false;
	}
	else{
		return true;
	}

}
</script>

</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>
	<div id="main_img_bar">
       
    </div>
   	<div id="board_box">
	    <h3>
	    	게시판 > 검색목록 보기
		</h3>
	    <ul id="board_list">
				<li>
					<span class="col1">번호</span>
					<span class="col2">제목</span>
					<span class="col3">글쓴이</span>
					<span class="col4">첨부</span>
					<span class="col5">등록일</span>
					<span class="col6">조회</span>
				</li>
<?php
	if (isset($_GET["page"]))
		$page = $_GET["page"];
	else
		$page = 1;

	$searchtype=$_GET["searchtype"];
	$keyword=$_GET["keyword"];
	$keyword = htmlspecialchars($keyword, ENT_QUOTES);	
	$con = mysqli_connect("localhost", "root", "", "20193184");


	//선택한 검색종류에따라 다른 쿼리문
	if($searchtype=="subject"){
		$sql= "select * from board where subject like '%".$keyword."%' order by num desc";
	}
	else{
		$sql= "select * from board where name like '%".$keyword."%' order by num desc";
	}
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result); // 전체 글 수

	$scale = 10;

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      

	$number = $total_record - $start;

   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
   {
      mysqli_data_seek($result, $i);
      // 가져올 레코드로 위치(포인터) 이동
      $row = mysqli_fetch_array($result);
      // 하나의 레코드 가져오기
	  $num         = $row["num"];
	  $id          = $row["id"];
	  $name        = $row["name"];
	  $subject     = $row["subject"];
      $regist_day  = $row["regist_day"];
      $hit         = $row["hit"];
      if ($row["file_name"])
      	$file_image = "<img src='./img/file.gif'>";
      else
      	$file_image = " ";
?>
				<li>
					<span class="col1"><?=$number?></span>
					<span class="col2"><a href="board_view.php?num=<?=$num?>&page=<?=$page?>"><?=$subject?></a></span>
					<span class="col3"><?=$name?></span>
					<span class="col4"><?=$file_image?></span>
					<span class="col5"><?=$regist_day?></span>
					<span class="col6"><?=$hit?></span>
				</li>	
<?php
   	   $number--;
   }
   mysqli_close($con);

?>
	    	</ul>
			<ul id="page_num"> 	
<?php
	if ($total_page>=2 && $page >= 2)	
	{
		$new_page = $page-1;
		//get방식이니까 다 넣음
		echo "<li><a href='board_search_list.php?page=$new_page&searchtype=$searchtype&keyword=$keyword'>◀ 이전</a> </li>";
	}		
	else 
		echo "<li>&nbsp;</li>";

   	// 게시판 목록 하단에 페이지 링크 번호 출력
   	for ($i=1; $i<=$total_page; $i++)
   	{
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<li><b> $i </b></li>";
		}
		else
		{
			echo "<li><a href='board_search_list.php?page=$i&searchtype=$searchtype&keyword=$keyword'> $i </a><li>";
		}
   	}
   	if ($total_page>=2 && $page != $total_page)		
   	{
		$new_page = $page+1;	
		echo "<li> <a href='board_search_list.php?page=$new_page&searchtype=$searchtype&keyword=$keyword'>다음 ▶</a> </li>";
	}
	else 
		echo "<li>&nbsp;</li>";
?>
			</ul> <!-- page -->	    	
			<ul class="buttons">
				<li>
					<span>
						<!--GET방식으로 form을 보낸다. (검색기능)-->
				<form name="boardsearch_form" method="GET" action="board_search_list.php" onsubmit="return search_check()"> 
					<select name="searchtype">
						<option value="subject" selected>제목 검색</option>
						<option value="name">글쓴이 이름 검색</option>
					</select>
                <input type="search" name="keyword"> 
                <input  type="submit" value="검색"> 
            	</form>
            	</span>
        		</li>
				<li><button onclick="location.href='board_list.php'">전체 목록</button></li>
				<li>
<?php 
    if($userid) {
?>
					<button onclick="location.href='board_form.php'">글쓰기</button>
<?php
	} else {
?>
					<a href="javascript:alert('로그인 후 이용해 주세요!')"><button>글쓰기</button></a>
<?php
	}
?>
				</li>
			</ul>
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>

