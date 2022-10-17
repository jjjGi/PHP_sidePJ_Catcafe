<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>고양이 팬카페</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">

</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>
    <div id="main_img_bar">
       
    </div>
    <div id="board_box">
        <h3 class="title">
            게시판 > 내용보기
        </h3>
<?php
///////////////////////////////////////////////////////////////////////////////////////////게시판 아무나 수정 불가능하게 수정
    //헤더에 이미 session_start있으니 생략 
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
 /////////////////////////////////////////////////////////////////////////////여기까지 
    $num  = $_GET["num"];
    //////////////////////////////////////////////////////////////////////////////////수정
    if (isset($_GET["page"])){
        $page = $_GET["page"];
    }
    else{
        $page = 1;
    }
    /////////////////////////////////////////////////////////////////////////////////////
    $con = mysqli_connect("localhost", "root", "", "20193184");
    $sql = "select * from board where num=$num";
    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($result);
    $id      = $row["id"];
    $name      = $row["name"];
    $regist_day = $row["regist_day"];
    $subject    = $row["subject"];
    $content    = $row["content"];
    $file_name    = $row["file_name"];
    $file_type    = $row["file_type"];
    $file_copied  = $row["file_copied"];
    $hit          = $row["hit"];

    $content = str_replace(" ", "&nbsp;", $content);
    $content = str_replace("\n", "<br>", $content);

    $new_hit = $hit + 1;
    $sql = "update board set hit=$new_hit where num=$num";   
    mysqli_query($con, $sql);
    mysqli_close($con);                                             //수정 
?>      
        <ul id="view_content">
            <li>
                <span class="col1"><b>제목 :</b> <?=$subject?></span>
                <span class="col2"><?=$name?> | <?=$regist_day?></span>
            </li>
            <li>
                <?php
                    if($file_name) {
                        $real_name = $file_copied;
                        $file_path = "./data/".$real_name;
                        $file_size = filesize($file_path);

                        echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='board_download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";

                        $img_chk=explode("/",$file_type);
                        if($img_chk[0]=="image"){                               //이미지파일일때만 본문에 출력 
                            echo"<img src='$file_path' width='500'><br><br>";
                        }
                    }
                    
                ?>
                <!--게시판 사진보이게 수정. 폭은 500으로 고정  -->
                <?=$content?>
            </li>       
        </ul>
        <ul class="buttons">
                <li><button onclick="location.href='board_list.php?page=<?=$page?>'">전체 목록</button></li>
                <?php
                /////////////////////////////////////////////////////////////게시판 아무나 수정 불가능하게 수정
                    if($id==$userid){
                ?>
                <li><button onclick="location.href='board_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button></li>
                <li><button onclick="location.href='board_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button></li>
                <?php
                    }
                    ////////////////////////////////////////////////////////////////////여기까지
                ?>
                <li><button onclick="location.href='board_form.php'">글쓰기</button></li>
        </ul>
    </div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
