<!DOCTYPE html>
<head>
<meta charset="utf-8">
<style>
h3 {
   padding-left: 15px;
   border-left: solid 5px #edbf07;
   /*color:red;*/
}
#close {
   margin:20px 0 0 20px;
   cursor:pointer;
}
#goimg{
    float:right;
    padding-right:80px;


}
#pass{
    margin-top:25px;
}
body{
    /*background-color:rgba(230, 76, 65, 0.733)*/
    background-color: red;
}
</style>
<script>
    function check_input(){
        if (!document.checkpass_form.pass.value){
            alert("비밀번호를 입력하세요!");
            return;     
        }
    if (confirm("정말 회원 탈퇴를 하시겠습니까? \n회원님의 게시글, 포인트, 랭킹 등이 사라집니다.")==0){     //아니요 누를때
        alert("취소하셨습니다.");
        javascript:self.close();
        return;
    }
    else{                                                                                              //하겠다고 하면 
        document.checkpass_form.submit();   
      }
    }

</script>
</head>
<body>
<h3>회원 탈퇴</h3>
<p>
<?php
   session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    
    if($userid==""){
        echo "회원 탈퇴는 로그인 후 가능합니다.";
    }
    else{
        echo "비밀번호를 입력해주세요.";
    ?>
    <div id="checkpass">
        <form name="checkpass_form" method="post" action="member_delete.php">
            <input type="password" height="50" id="pass" name="pass" placeholder="비밀번호">
            
            <div id="goimg"><a href="#"><img src="./img/go_button2.png" height="80" onclick="check_input()"></a></div>
            
            
        </form>
    </div>
    <?php   
    }
    ?>

</p>
<div id="close">
   <img src="./img/close.png" onclick="javascript:self.close()">
</div>
</body>
</html>

