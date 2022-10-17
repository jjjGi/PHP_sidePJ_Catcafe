<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>고양이 냥냥펀치게임</title>	
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/game.css">
    <audio id="gamecatAudio">
         <!--게임 누를때 나오는 소리 -->
            <source src="./audio/game_cat.mp3" type="audio/mpeg">
           
    </audio>
    <script>
         //////////////////////////////고양이 울음소리 수정         
        var music = document.getElementById("gamecatAudio");                
/////////////////////////////////////////////////////////////////////
    
        function finish(){        //게임끝나고 창띄우기 
            window.open("game_result_And_insert.php?result="+click_score,"Game_result","left=300,top=200,width=350,height=200,scrollbars=no,resizable=yes");
        }

        var click_score=0;
        $(document).ready(function () {
            // 스타일 변경 및 이벤트를 연결
            $('#box').css({
                width: 300,
                height: 300,
                // background: 'orange'
            }).on({
                mousedown: function () {
                    $(this).css('background', "url('img/cat2.png')");
                    $(this).css('background-repeat', 'no-repeat');
                    $(this).css('background-position', 'center');
                    $(this).css('background-size', 'cover');
                    music.play();               //누를때 소리 재생 
                    click_score++;                    
                },
                mouseenter: function () {
                    $(this).css('background', "url('img/cat1.png')");
                    $(this).css('background-repeat', 'no-repeat');
                    $(this).css('background-position', 'center');
                    $(this).css('background-size', 'cover');
                },
                mouseleave: function () {
                    $(this).css('background', "url('img/cat1.png')");
                    $(this).css('background-repeat', 'no-repeat');
                    $(this).css('background-position', 'center');
                    $(this).css('background-size', 'cover');
                }
                ,
                mouseup: function () {
                    $(this).css('background', "url('img/cat1.png')");
                    $(this).css('background-repeat', 'no-repeat');
                    $(this).css('background-position', 'center');
                    $(this).css('background-size', 'cover');
                }
            });
        });

        window.onload = function () {
            setTimeout(function () {
                alert('끝!');
                
                
                finish();
                location.href='index.php';      
            }, 5000);           //5초 뒤 종료 
        };
    </script>




</head>
<body>
    <header id="gameheader">
        <h1>고양이의 펀치게임</h1>
        <h2>제한시간은 5초! 빨리 클릭하세요!</h2>
    </header>
    <div class="box_wrapper">
        <div id="box"></div>
    </div>
</body>
</html>
