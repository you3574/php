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
                <P >퍼블리데이</P>
            </div>
            <div id='proj-summary'>
                <p>퍼블리데이</p>
                <p class='t-h2'>Web and Mobile App</p>
                <table>
                    <tr>
                        <td class='summarytxt'>&middot; 기&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;간 </td>
                        <td>2017년 03월 - 2017년 09월</td>
                    </tr>
                    <tr>
                        <td>&middot; 소&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;속 </td>
                        <td>팀 / 웹, 서버 개발</td>
                    </tr>
                    <tr>
                        <td>&middot; 설&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;명</td>
                        <td>미디어 파일(동영상, 음성파일)을 큐알코드로 변환하여 출력해주는 웹, 모바일 어플리케이션 </td>
                    </tr>
                    <tr>
                        <td>&middot; 동작환경</td>
                        <td>Web Browser, Android</td>
                    </tr>
                    <tr>
                        <td>&middot; 개발환경</td>
                        <td>Google Ouath 2.0 ,HTML5, CSS, Javascript, PHP, AWS, SQL, Android</td>
                    </tr>
                </table>
            </div>
        </article>
        <article id='wrap-allinfo'>
            <div id='outline'>
                <p>요구사항</p>
                <ul>
                    <li>[서버]
                    </li>
                    <li>- AWS에 대한 이해
                    </li>
                    <li>- 리눅스 환경(centOS)에서의 서버환경 설정</li>
                    <li style='margin-top: 8px;'>[웹]
                    </li>
                    <li>- Google Ouath 2.0 : 토큰을 이용한 로그인 처리의 이해
                    </li>
                    <li>- 웹 페이지의 동작방식에 대한 이해를 바탕으로 한 설계
                    </li>
                    <li style='margin-top: 8px;'>[데이터베이스]</li>
                    <li>- 데이터베이스 구조와 명령어에 대한 이해
                    </li>
                    <li>- 대용량 데이터(미디어 파일)처리에 대한 고민
                    </li>
                </ul>
            </div>
            <div id='solution'>
                <p>과정</p>
                <p>한학기 학교 수업으로 기본적인 html, database, php를 배운 후 처음으로 도전한 웹/서버 프로젝트였다. css, javascript를 몰랐기에 시간이 오래 걸렸다. css와 javascript를 공부하고 웹페이지를 로컬에서 어느 정도 만든 후 이제 서버에 파일을 업로드 해야하는데, 이때 들었던 생각은 '서버는 무엇일까?', '뭐 부터 해야하지?'였다. 커다란 벽을 마주한 기분이었다. 구글에 검색하고, 주변에 물어보고 일주일 넘게 검색만 했었다. 여차저차 아마존에서 제공하는 튜토리얼을 참고해서 centOS 서버를 대여하는데 성공했지만 익숙하지 않은 리눅스 환경에서 내가 사용할 apache, php, database 등 설치해야 할 것들이 너무 많았다. 설치를 완료한 후에는 로컬파일을 옮기고 나서 발생하는 에러를 해결해 나갔다. 기본적인 사용환경도 내가 설정해야 하다니... 뜬금없지만 기억하자! AWS에서 centOS를 대여했다면 root계정부터 살리자! ip를 받아놓고 인스턴스랑 연결해 놓지 않으면 과금이 발생한다.<br />
                서버환경 세팅을 끝내고 도메인도 할당받아 publiday.co.kr로 접속이 가능하게 만들었다. 그러나 이때 발생한 또 다른 이슈는 용량문제였다. 미디어 파일(동영상, 음성 등)을 큐알코드로 변환해서 다이어리로 출력하는 어플인데 동영상을 언제까지 보관할 것이며, 서버의 용량은 정해져 있어서 언젠간 차고 말 것이다. 이때 생각해낸 방법이 구글 드라이브, 유투브을 이용하는 것이다. 회원가입을 구글로 받아서 사용자 계정의 유튜브에 영상을 올리고, 유튜브 주소만 받아와 큐알코드로 변환하여 출력하면 용량문제는 해결이 가능했다. 이를 위해 나는 데이터베이스를 다시 설계하면서 홈페이지에 구글로그인 기능을 구현하고자 했다. 구글로그인 구현을 위해 Oauth의 동작방식에 대해 공부했는데 이를 이 페이지 아래에서 자세하게 설명하고 싶다. 결국 웹 상에서의 기능구현은 끝이 났지만, 해당 미디어의 유튜브 주소를 서버로 넘겨줘야하는 안드로이드 파트 친구들이 성공하지 못하는 바람에 아쉽게 실패하고 말핬다. 이번 프로젝트를 하면서 많은 공부를 했고 그만큼 애정과 열정을 쏟았기에 아쉬움이 남는다. 혼자서라도 안드로이드를 공부해서 완성시키고 싶다. 언젠가 꼭 완성된 '퍼블리데이'라는 어플을 출시해서 나처럼 기록을 좋아하는 사람들이 즐겁게 사용하는 날이 왔으면 좋겠다.
                </p>
            </div>
            <div id='proj-images'>
                <P>실행화면</P>
                <img src='../img/everypubliday.png' class='wth_100' />
            </div>

            <div id='links'>
                <p>소스코드 및 링크</p>
                <ul>
                    <li>- 소스파일 : https://github.com/NAYE0NG/PUBLIDAY_WEB</li>
                    <li>- 웹 사이트 : http://publiday.co.kr</li>
                </ul>
            </div>
            <div id='reference'>
                <P>참고사이트</P>
                <ul>
                    <li>- 생활코딩 : </li>
                    <li>- AWS개발자센터 : </li>
                </ul>
            </div>
            <div id='addexplain'></div>
        </article>
    </section>
    <footer></footer>
</body>

</html>