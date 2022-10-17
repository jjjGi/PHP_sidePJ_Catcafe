<div id="main_img_bar">
    <!-- <img src="./img/realcat.png" width="750"> -->
</div>
<audio id="maincatAudio">
         <!--메인화면 들어갈때 나오는 소리 -->
            <source src="./audio/main_cat.mp3" type="audio/mpeg">
           
</audio> 
<script >
    //////////////////////////////////////////////////////////////////////////////고양이 소리 추가 수정 
    var music = document.getElementById("maincatAudio");
    music.play();
    ////////////////////////////////////////////////////////////////////////////////////////////////////
</script>
<div id="main_content">
    <div id="right-content">
        <div id="point_rank">
            <h4>포인트 랭킹</h4>

            <ul>
                <!-- 포인트 랭킹 표시하기 -->
                <?php
                $con = mysqli_connect("localhost", "root", "", "20193184");
                    $rank = 1;
                    $sql = "select * from members order by point desc limit 5";
                    $result = mysqli_query($con, $sql);
                    ////////////////////////////////////////////////////////////////회원 아무도 없을때 구별 수정 


                    if (!$result){
                        echo "회원 DB 테이블(members)이 생성 전입니다!";
                    }                    
                    else if(($record_num=mysqli_num_rows($result))==0){

                        echo "아직 가입된 회원이 없습니다!";
                    }
                    ///////////////////////////////////////////////////////////////////
                    else
                    {
                        while( $row = mysqli_fetch_array($result) )
                        {
                            $name  = $row["name"];        
                            $id    = $row["id"];
                            $point = $row["point"];
                            /////////////////////////////////////////////////////////////////////////이름 길이에 맞게 *처리 수정 
                            $name_num=mb_strlen($name);
                            $cover_name=mb_substr($name, 0, 1);
                            if($name_num<=2){
                                $cover_name.="*";
                            }
                            else{
                                for($i=1; $i<$name_num-1; $i++){
                                    $cover_name.="*";
                                }
                                $cover_name.=mb_substr($name, $name_num-1,1);
                            }
                           
                            ////////////////////////////////////////////////////////////////////////////////////////////////////
                ?>

                <li>
                    <span><?=$rank?></span>
                    <span><?=$cover_name?></span>           
                    <!--(위에) 이름 길이에 맞게 *처리 수정-->
                    <span><?=$id?></span>
                    <span><?=$point?></span>
                </li>

                <?php
                            $rank++;
                        }
                    }
               
                ?>
            </ul>
        </div>

        <!--여기서부터 추가했다. -->
        <div id="game_rank">
            <h4>고양이펀치게임 랭커</h4>
            <ul>
                <!-- 포인트 랭킹 표시하기 -->
                <?php
                    /////////////////////////////////////////공동순위 구별하기 위해 $rank=0으로 바꾸고 while문 안에 rank++에 조건문을 달아 구별 
                    $rank = 0;
                    $sql = "select * from members order by game_result desc limit 5";
                    $result = mysqli_query($con, $sql);
                    ////////////////////////////////////////////////////////////////////////회원 아무도 없을때 구별 수정 
                  
 
                    if (!$result)
                        echo "회원 DB 테이블(members)이 생성 전입니다!";
                    else if(($record_num=mysqli_num_rows($result))==0){
                        echo "아직 가입된 회원이 없습니다!";
                    }
                    ////////////////////////////////////////////////////////////////////////회원 아무도없을때 끝 
                    else
                    {
                        $pre_score=-1;            //공동순위 구별용 변수 추가              
                        while( $row = mysqli_fetch_array($result) )
                        {
                            $name  = $row["name"];        
                            $id    = $row["id"];
                            $game_result = $row["game_result"];
                            /////////////////////////////////////////////////////////////////////////이름 길이에 맞게 *처리 수정
                            $name_num=mb_strlen($name);
                            $cover_name=mb_substr($name, 0, 1);
                            if($name_num<=2){
                                $cover_name.="*";
                            }
                            else{
                                for($i=1; $i<$name_num-1; $i++){
                                    $cover_name.="*";
                                }
                                $cover_name.=mb_substr($name, $name_num-1,1);
                            }
                            //////////////////////////////////////////////////////////////////////////////////////////////////
                            if($pre_score!=$game_result){
                                $rank++;
                            }                       
                ?>

                <li>
                    <span><?=$rank?></span>
                    <span><?=$cover_name?></span>
                    <!--(위에) 이름 길이에 맞게 *처리 수정-->
                    <span><?=$id?></span>
                    <span><?=$game_result?></span>
                </li>

                <?php

                            $pre_score=$game_result;            //이전의 점수와 같은지 확인위해 
                            /////////////////////////////////////////////////////////////////////////////////////////
                        }
                    }

                   
                ?>
            </ul>
        </div>
    </div>


    <div id="left-content">
        <h4>최근 게시글</h4>

        <ul>
            <!-- 최근 게시 글 DB에서 불러오기 -->
            <?php
                
                $sql = "select * from board order by num desc limit 10";
                $result = mysqli_query($con, $sql);
                /////////////////////////////////////////////////////////////////////회원 아무도 없을때 구분 수정 
                
                if (!$result)           //result안에 결과값이 없으면 
                    echo "게시판 DB 테이블(board)이 생성 전입니다!";
                else if(($record_num=mysqli_num_rows($result))==0){
                    echo "아직 게시글이 없습니다!";
                }
                /////////////////////////////////////////////////////////////////////////
                else
                {
                    while( $row = mysqli_fetch_array($result) ) //result에 들어온 것들을 속성 기반으로 다 자른다. 잘라낸 값을row객체에다가 넣음 
                    {   /////////////////////////////////////////////////////////////////////////수정
                        $regist_day = substr($row["regist_day"], 0, 10);
                        $num=$row["num"];
            ?>

            <li>
                <span><a href="board_view.php?num=<?=$num?>"><?=$row["subject"]?></a></span><!--여기까지 수정. 메인에서 최근게시글은 모두 페이지가 1 이므로 페이지는 따로 보내지 않는다. 그 이뉴는 board_view.php에서 페이지가 안왔을때 $page변수에 1을 넣도록 에러처리를 (내가 )했기때문에 이를 이용.-->
                <span><?=$row["name"]?></span>
                <span><?=$regist_day?></span>
            </li>

            <?php
                    }
                }
                mysqli_close($con);
            ?>
    </div>
<!--여기까지 추가한거다 . 문제있을시 삭제-->
</div>