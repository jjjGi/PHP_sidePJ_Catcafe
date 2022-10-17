var is_bottom=true,first=true; 
var txt = ""; 
var bottom_height,l1,l2; 
var myVar = setInterval(live_chat, 1000); //1초마다 함수 실행
function live_chat() {//live_chat()함수
    var obj, dbParam, xmlhttp, myObj, x;
    obj = { "table": "chatting" }; 
    dbParam = JSON.stringify(obj);
    xmlhttp = new XMLHttpRequest(); 
    xmlhttp.onreadystatechange = function () {
  
        if (this.readyState == 4 && this.status == 200) {
            myObj = JSON.parse(this.responseText);
            l1 = myObj.length;
            if (l1 != l2) txt = ""; //이전과 글 수가 다르면 실행! 
            if (txt == "") { 
                for (x in myObj) { //배열수만큼 반복
                    txt += 
                        "<span style='font-size: 15px;'>" + myObj[x].chatuser.replace(/ /g, "&nbsp")+ " 님<br></span>"+ myObj[x].chattext.replace(/ /g, "&nbsp").replace(/\n/g, "<br>")
                            .replace(/\(하악질\)/g, "<img src='./img/cat2.png' style='width:150px; height:150px;'>")
                            .replace(/\(젤리\)/g, "<img src='./img/catpawButton.png' style='width:150px; height:150px;'>")
                            .replace(/\(갸우뚱\)/g, "<img src='./img/tilt_cat.jpg' style='width:150px; height:150px;'>")
                            .replace(/\(하품\)/g, "<img src='./img/yawn_cat.jpg' style='width:150px; height:150px;'>")
                            .replace(/\(미소\)/g, "<img src='./img/smile_cat.jpg' style='width:150px; height:150px;'>")
                            .replace(/\r\n/g, "<br>")+ "<button style='float:right;' onclick='textdelete("+ '\"' + myObj[x].num + '\"' + "," + '\"' + myObj[x].chatpassword + '\"' + ")'>삭제</button><br>"+ "<span style='font-size: 10px;'>" + myObj[x].chattime + "</span><br>";
                    //화면에 보이는것들 다 총합 
                } 
            document.getElementById("chatlist").innerHTML = txt; //chatlist안에 넣는다.

            if (first) {
                document.getElementById("chatlist").scrollTop =
                    document.getElementById("chatlist").scrollHeight;
                    bottom_height=document.getElementById("chatlist").scrollHeight
                    - document.getElementById("chatlist").scrollTop;
                first=false;
            }
            if (!is_bottom&&(l2<l1)) { //스크롤이 위에있고 새 글이 올라오면 
                document.getElementById("newchat").innerHTML = "새로운 채팅: "+ myObj[l1-1].chattext.replace(/ /g, "&nbsp").replace(/\n/g, "<br>")
                            .replace(/\(하악질\)/g, "<img src='./img/cat2.png' style='width:20px; height:20px;'>")
                            .replace(/\(젤리\)/g, "<img src='./img/catpawemt.png' style='width:20px; height:20px;'>")
                            .replace(/\(갸우뚱\)/g, "<img src='./img/tilt_cat.jpg' style='width:20px; height:20px;'>")
                            .replace(/\(하품\)/g, "<img src='./img/yawn_cat.jpg' style='width:20px; height:20px;'>")
                            .replace(/\(미소\)/g, "<img src='./img/smile_cat.jpg' style='width:20px; height:20px;'>")
                            .replace(/\r\n/g, "<br>");
               //새글이 보인다.
         
                l2 = l1; 
            }

            } 
            if (is_bottom) {//스크롤이 맨밑에있으면
                document.getElementById("newchat").innerHTML = "";
                document.getElementById("chatlist").scrollTop =document.getElementById("chatlist").scrollHeight;
                bottom_height=document.getElementById("chatlist").scrollHeight- document.getElementById("chatlist").scrollTop;
           
            }
            l2 = l1;//12는 l1의 값을 가진다.
        }
    };
    xmlhttp.open("GET", "chatting_start.php?content=" + dbParam, true);
    //안보이게 전달하고받음 
    xmlhttp.send();
 
}


function scroll_check(){
 //   alert("뺀거 : " + (document.getElementById("chatlist").scrollHeight-bottom_height));
 //   alert("스크롤 탑 : "+document.getElementById("chatlist").scrollTop);
        if(document.getElementById("chatlist").scrollTop<document.getElementById("chatlist").scrollHeight-bottom_height){
            is_bottom=false;
         //   alert("위");
        }

        else{
            is_bottom=true;
          //  alert("바닥");
        }



}

function new_click(){
    document.getElementById("chatlist").scrollTop =document.getElementById("chatlist").scrollHeight;
    bottom_height=document.getElementById("chatlist").scrollHeight- document.getElementById("chatlist").scrollTop;
    is_bottom=true;
}



function chat_send() { //chat_send() 함수

    if (!document.getElementById("chatpw").value) { //비밀번호 안눌렀을때
        alert("비밀번호를 입력하세요."); 
        return false; 
    }
    if (!document.getElementById("chatid").value) { //아이디 안쳤을때 
        alert("익명 아이디를 입력하세요."); 
        return false; 
    }
    if (!document.getElementById("chattxt").value) { //채팅을 안쳤을 때 
        alert("입력된 텍스트가 없습니다."); 
        return false; 
    } else { //다 쳤을 때 
   
  
        var obj, dbParam, xmlhttp; 
        obj = {
            "table": "chatting", "chatuser": document.getElementById("chatid").value, "chattext": document.getElementById("chattxt").value,
            "chatpassword": document.getElementById("chatpw").value
        };

        dbParam = JSON.stringify(obj);

        xmlhttp = new XMLHttpRequest(); 

        document.getElementById("chatlist").scrollTop = document.getElementById("chatlist").scrollHeight;

        bottom_height=document.getElementById("chatlist").scrollHeight- document.getElementById("chatlist").scrollTop;
        is_bottom=true;
        xmlhttp.open("GET", "chatting_insert.php?content=" + dbParam, true);
        xmlhttp.send(); 
        document.getElementById("chattxt").value = "";
             
    }


}


function emt(emoticon) { 
    document.getElementById("chattxt").value += emoticon;
}

function chat_id(chatid) { //유니코드로 바꾸니까 오류 해결....
    document.getElementById("chatid").value = document.getElementById("chatid")
        .value.replace("+", "＋").replace(/#/g, "＃").replace(/&/g, "＆").replace(/=/g, "＝")
        .replace(/\\/g, "＼");
}

function password(pw) { 
    document.getElementById("chatpw").value = document.getElementById("chatpw").value
        .replace("+", "＋").replace(/#/g, "＃").replace(/&/g, "＆").replace(/=/g, "＝")
        .replace(/\\/g, "＼");
}


function textdelete(num, password) { 
    var obj, dbParam, xmlhttp; 
    obj = {
        "table": "chatting", "num": num, "chatpassword": document
            .getElementById("chatpw").value
    };

    dbParam = JSON.stringify(obj); 
    xmlhttp = new XMLHttpRequest(); 
    if (password == document.getElementById("chatpw").value) {

        xmlhttp.open("GET", "chatting_delete.php?content=" + dbParam, true);

        xmlhttp.send(); 
    } else { 
        alert("비밀번호가 틀렸습니다.");
    }
}




function replace() { //replace() 함수
    document.getElementById("chattxt").value = document.getElementById("chattxt").value
        .replace("+", "＋").replace(/#/g, "＃").replace(/&/g, "＆").replace(/=/g, "＝")
        .replace(/\\/g, "＼");
}
