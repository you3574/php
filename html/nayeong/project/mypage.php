<!DOCTYPE html>
<html lang="ko">

<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"
    />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
    <link rel="stylesheet" href="../css/import.css">
    <!--script type="text/javascript" src="../js/script.js"></script-->
</head>

<body>
    <nav class='mv-scroll'>
        <div id='wrap-menu' class='mv-scroll'>
		<a href='../'><p>HOME</p></a>
            <a href='../index.php#about'><p>ABOUT</p></a>
            <a href='../index.php#project'><p>PROJECT</p></a>
            <a href='./projectlist.php'><p>+</p></a>
            <a href='../index.php#contact'><p>CONTACT</p></a>
        </div>
    </nav>
    <section id='wrap-explain' class='wrap-explain'>
        <article id='wrap-topinfo'>
            <div id='proj-route'>
                <p class='in_bl f_l'>PROJECT &nbsp;&nbsp;>&nbsp;&nbsp; PROJECT LIST &nbsp;&nbsp;>&nbsp;&nbsp;</p>
                <!--여기에 PHP 변수 넣을거임-->
                <P >나의 홈페이지</P>
            </div>
            <div id='proj-summary'>
                <p>나의 홈페이지</p>
                <p class='t-h2'>Website</p>
                    <table>
                    <tr>
                        <td class='summarytxt'>&middot; 기&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;간 </td>
                        <td>2018년 02월 - 2018년 03월</td>
                    </tr>
                    <tr>
                        <td>&middot; 소&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;속 </td>
                        <td>개인</td>
                    </tr>
                    <tr>
                        <td>&middot; 설&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;명</td>
                        <td>개인 포트폴리오 정리, 공부 기록을 위한 반응형 홈페이지 제작</td>
                    </tr>
                    <tr>
                        <td>&middot; 동작환경</td>
                        <td>Web Browser</td>
                    </tr>
                    <tr>
                        <td>&middot; 개발환경</td>
                        <td>HTML5, CSS, Javascript, PHP, AWS, SQL</td>
                    </tr>
                </table>
            </div>
        </article>
        <article id='wrap-allinfo'>
            <div id='outline'>
                <p>요구사항</p>
                <ul>
                    <li>- 웹 페이지의 동작방식에 대한 이해를 바탕으로 한 설계
                    </li>
                    <li>- 반응형 웹사이트를 위한 미디어쿼리
                    </li>
                    <li>- 데이터베이스 구조와 명령어에 대한 이해
                    </li>
                    <li>- (예정) 메일기능
                    </li>
                </ul>
            </div>
            <div id='solution'>
                <p>과정</p>
                <p>그동안 웹 공부를 하면서 나를 위한 웹 페이지를 만들어보고 싶다는 생각을 가지고 있었는데 이렇게 실행하게 되었다. <!--넣고 싶은 기능은 아래와 같다.
                    <br /> - 클립보드에 메일주소 복사하기
                    <br /> -->
                    아이러니하게도 제일 힘든점은 변수명과 디자인이다. 몇번을 만들다가 디자인이 맘에 안들어서 엎어버리기 일수였다. 아르바이트 끝나고 홈페이지를 만드느라 매일 새벽에 자면서도 늘어나는 기능과 페이지를 보면 뿌듯하게 느껴진다. 그리고 무엇보다 공부하고 적용하는 과정이 재밌다. 대학에 와서 우연히 듣게된 타과의 프로그래밍 수업이 많은 것을 바꿔놓았다. '하고 싶은 일을 찾았다.'는 게 얼마나 감사한 일인지 새삼 느끼고 있다.
                    <br />여담이지만 본전공인 수학과의 홈페이지가 아직 없는데, 2018년 상반기에는 우리 수학과 홈페이지를 만들고 싶다. 이것 외에도 소프트웨어 마에스트로, 삼성 소프트웨어 멤버쉽, SCPC, 카카오 코딩 페스티펄 등 이번 년도에 도전하고 싶은 일들이 잔뜩 있다. 모르는 것들을 공부하고 궁금한 것들은 찾아보면서 노력하다 보면 분명 좋은 기회와 결과가 있을것이라 생각한다.
                    <br /><br />&nbsp; + 디비에 프로젝트 정보를 넣어 놓고 불러오자 했지만 각각 필요한 정보들이 달라서 디비를 사용하지 않기로 했다. 그래서 이번에 디비는 CONTACT페이지에서만 사용하게 되었다.
                </p>
            </div>
            <div id='proj-images'>
                <P>실행화면</P>
                <img src='../img/madelist.png' class='h400' />
            </div>

            <div id='links'>
                <p>소스코드 및 링크</p>
                <ul>
                    <li>- 소스파일 : https://github.com/NAYE0NG/RESUME</li>
                    <li>- 웹 사이트 : http://52.78.20.161/nayeong/</li>
                </ul>
            </div>
            <div id='addexplain'></div>
        </article>
    </section>
    <footer></footer>
</body>

</html>