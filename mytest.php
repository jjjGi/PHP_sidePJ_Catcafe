<?php
//db생성 전 오류 수정
$con = mysqli_connect("localhost", "root", "", "20193184");
$sql= "select * from chatting";
$result = mysqli_query($con, $sql);
mysqli_close($con);
if(!$result){
    echo "<script>alert('채팅 테이블을 생성 후 이용해주세요!');
        location.href = 'index.php';
    </script>";
    exit;
}
?>

<!DOCTYPE html> 
<html>

    <head>
        <title>고양이 팬카페 익명 채팅방</title>
        <meta charset="UTF-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="./css/test.css">

        <script type="text/javascript" src="./js/mytest.js"></script>


        
    </head> 
    <body>

        <div class="left"> 
            <p>고양이</p>
            <p>익명채팅</p>
        </div> 


        <div class="center">

            <div class="chatcontent" id="chatlist" onscroll="scroll_check()" style="line-height: 1.5em; overflow-y:auto" >
               
            </div>
            
  
            <div class="input">

                <div>
                    <span>익명 아이디</span>
                    <input type="text"  id="chatid" placeholder="익명 아이디를 입력하세요" name="nickname" onkeyup="chat_id(this.value)"  maxlength="30">
                         
                </div>
                    
                <br>
                <div>
                    <span>익명 비밀번호</span>                
                    <input type="password" id="chatpw" placeholder="최대 10자" name="password" onkeyup="password(this.value)"  maxlength="10">

                </div>

                <br>
                <p style="font-size:14px; float:right; margin-right:15px;"></p>

                    <div class="images">
                        <!--이모티콘들-->
                            <img src='./img/cat2.png'onclick="emt('(하악질)')" style='width:30px; height:30px;'>
                            <img src='./img/catpawemt.png' onclick="emt('(젤리)')" style='width:30px; height:30px;'>
                            <img src='./img/tilt_cat.jpg' onclick="emt('(갸우뚱)')" style='width:30px; height:30px;'>
                            <img src='./img/yawn_cat.jpg' onclick="emt('(하품)')" style='width:30px; height:30px;'>
                            <img src='./img/smile_cat.jpg' onclick="emt('(미소)')" style='width:30px; height:30px;'>
                        
                    </div>
                
                <textarea id="chattxt" name="text" placeholder="글을 입력하세요." onkeyup="replace()"></textarea>
                <button style="border:2px; width:100%; background:white;"onclick="chat_send()" >
                    보내기</button>
                <p id="newchat" onclick="new_click()"></p>
            </div>
        </div>
        <div>
            <a href="index.php"><img src="./img/close.png"></a>

        </div>
        

    </body> 
</html> 