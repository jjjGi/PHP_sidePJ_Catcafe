<script>
	function check_pass() {
     window.open("member_leave_form.php",
         "Password_check",
          "left=700,top=300,width=550,height=200,scrollbars=no,resizable=yes");
   }
</script>

<div id="footer_content">
    <p id="footer_logo">고양이 팬카페 | <span>20193184</span></p>
    <ul id="author">
        <li>작성자 번호</li>
        <li>- 번호 : 010-****-****</li>
    </ul>
    <ul id="download">
        <li>사진 출처</li>
        <li>PIXABAY<a href="https://pixabay.com/ko/">(https://pixabay.com/ko/)</a></li>
    </ul>
    <!--회원탈퇴 기능 추가 -->
    <ul id="leavecafe">
        <li>회원 탈퇴</li>
        <li><button onclick="check_pass()">탈퇴하기</button></li>
    </ul>
    <!---------------------->
</div>