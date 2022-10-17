<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
    else $userpoint = "";
?>		
        <div id="top">
            <h3>
                <a href="index.php">
                    <p>고양이</p> 
                    <p>팬카페</p>
                </a>
            </h3>
            <div id="menu_bar">
                <ul>  
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="message_form.php">쪽지 보내기</a></li>            
                    <li><a href="board_form.php">고양이 자랑하기</a></li>
                    <li><a href="mytest.php">실시간익명채팅</a></li>          
                    <li>
                        <a href="game.php">게임하기</a>
                    </li>
                </ul>
            </div>

            <ul id="top_menu">  
<?php
    if(!$userid) {              //로그인 되지 않았을 때 
?>                
                <li><a href="member_form.php">회원 가입</a> </li>
                <li> | </li>
                <li><a href="login_form.php">로그인</a></li>
<?php
    } else {
                $logged = $username."(".$userid.")님[Level:".$userlevel.", Point:".$userpoint."]";
?>
                <li><?=$logged?> </li>
                <li> | </li>
                <li><a href="logout.php">로그아웃</a> </li>
                <li> | </li>
                <li><a href="member_modify_form.php">정보 수정</a></li>
<?php
    }
?>
<?php
    if($userlevel==1) {
?>
                <li> | </li>
                <li><a href="admin.php">관리자 모드</a></li>
<?php
    }
?>
            </ul>
        </div>
