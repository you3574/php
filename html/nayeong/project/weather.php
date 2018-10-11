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
    <section id='wrap-explain'  class='wrap-explain'>
        <article id='wrap-topinfo'>
            <div id='proj-route'>
                <p class='in_bl f_l'>PROJECT &nbsp;&nbsp;>&nbsp;&nbsp; PROJECT LIST &nbsp;&nbsp;>&nbsp;&nbsp;</p>
                <!--여기에 PHP 변수 넣을거임-->
                <P class='in_bl f_l'>내 위치 실시간 날씨 알림</P>
            </div>
            <div id='proj-summary'>
                <p>내 위치 실시간 날씨 알림</p>
                <p class='t-h2'>Chrome Extension App</p>
                <table>
                    <tr>
                        <td class='summarytxt'>&middot; 기&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;간 </td>
                        <td>2017년 11월 21일</td>
                    </tr>
                    <tr>
                        <td>&middot; 소&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;속 </td>
                        <td>개인</td>
                    </tr>
                    <tr>
                        <td>&middot; 설&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;명</td>
                        <td>사용자 브라우저의 위치 정보를 바탕으로 실시간 날씨정보를 알려주는 크롬 확장 어플리케이션</td>
                    </tr>
                    <tr>
                        <td>&middot; 동작환경</td>
                        <td>Chrome Browser</td>
                    </tr>
                    <tr>
                        <td>&middot; 개발환경</td>
                        <td>HTML5, CSS, Javascript</td>
                    </tr>
                </table>
            </div>
        </article>
        <article id='wrap-allinfo'>
            <div id='outline'>
                <p>요구사항</p>
                <ul>
                    <li>- Chrome Extension 동작 과정에 대한 이해
                    </li>
                    <li>- JavaScript를 활용한 Ajax 호출/응답 처리 구현에 대한 이해.
                    </li>
                    <li>- Weatherground에서 제공하는 날씨정보 Open API에 대한 이해</li>
                </ul>
            </div>
            <div id='solution'>
                <p>과정</p>
                <p>처음 날씨정보를 출력하는 크롬확장프로그램을 만들기 위해 생각했던 방법은 두 가지가 있었다. 첫째는 네이버(혹은 기타 웹사이트)의 실시간 현재위치의 날씨정보 페이지를 통째로 가져와 필요한 날씨정보가
                    들어있는 영역만 남기는 방법, 두 번째는 웹브라우저가 제공하는 geolocation API를 이용해 얻은 위치정보를 바탕으로 날씨정보를 조회하는 방법이 있다. Json파싱과 Ajax
                    통신을 공부하고 있던 터라 두번째 방법으로 앱을 제작하기로 했다. 다행히도 Weatherground에서 무료로 날씨정보를 제공하고 있어 이를 이용하게 되었고 Ajax 통신을 이해하는데
                    도움이 되었다.</p>
            </div>
            <div id='proj-images'>
                <P>실행화면</P>
                <img src='../img/weatherinfo.JPG' class='h400'/>
            </div>

            <div id='links'>
                <p>소스코드 및 링크</p>
                <ul>
                    <li>- 소스파일 : https://github.com/NAYE0NG/CHROME_EXTENSION</li>
                    <!--li>- 확장 프로그램 설치 : https://github.com/NAYE0NG/CHROME_EXTENSION</li-->
                </ul>
            </div>
            <div id='reference'>
                <P>참고사이트</P>
                <ul>
                    <li>- 생활코딩 : https://opentutorials.org/course/2473/14086</li>
                </ul>
            </div>
            <div id='addexplain'></div>
        </article>
    </section>
    <footer></footer>
</body>

</html>