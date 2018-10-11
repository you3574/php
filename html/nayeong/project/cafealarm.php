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
                <P class='in_bl f_l'>네이버 카페 새소식 알람</P>
            </div>
            <div id='proj-summary'>
                <p>네이버 카페 새소식 알람</p>
                <p class='t-h2'>Chrome Extension App</p>
                <table>
                    <tr>
                        <td class='summarytxt'>&middot; 기&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;간 </td>
                        <td>2017년 11월 23일 - 2017년 11월 24일</td>
                    </tr>
                    <tr>
                        <td>&middot; 소&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;속 </td>
                        <td>개인</td>
                    </tr>
                    <tr>
                        <td>&middot; 설&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;명</td>
                        <td>네이버 카페 서버에서 제공해주는 정보를 바탕으로 사용자가 설정한 새글, 새 덧글 등의 정보를 제공해주는 앱</td>
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
                    <li>- 모바일웹 및 카페앱에서 서비스중인 네이버 카페의 새소식 설정 기능에 대한 숙지.</li>
                    <li>- Chrome extension(크롬 확장프로그램) 동작에 대한 이해. </li>
                    <li>- JavaScript를 활용한 Ajax 호출/응답 처리 구현에 대한 이해.<li/>
                    <li>- 네이버 카페에서 새소식 설정한 항목을 카페앱 푸시알림으로 받아 사용자가 새 컨텐츠를 인지하고 카페로 진입할 수 있는것처럼, 이를 PC에서 크롬 브라우저 확 장프로그램 아이콘(또는 더 나은 수단)을 통해서도 확인하고 카페로 진입할 수 있어야 함.</li>
                </ul>
            </div>
            <div id='solution'>
                <p>과정</p>
                <p>이전의 날씨정보앱에서는 Contants Script까지 사용할 필요가 없었지만, 이번 프로젝트에서는 크롬에서 제공하는 Alarm API를 사용해야 하기에 크롬확장프로그램의 보다 넓은 이해가 필요했다. 처음 코딩할 때만 해도 각 스크립트의 통신 중에서 문제가 생겨날 것이라고 예상했지만 오히려 문제는 다른 부분에 있었다. setInterval()함수를 이용해 특정시간 단위로 계속해서 Ajax 호출을 시도하고, 이전 소식과 비교하여 업데이트된 정보가 있을 경우 알람이 울리게 만드는 과정에서 문제가 발생했다. 해당 스크립트가 백그라운드 단에서 돌아가기 때문에 setInterval()함수가 처음부터 호줄되지 않고 익스텐션앱을 한번 클릭한 뒤에나 함수가 실행된다는 점이다. 이는 내가 해결하지 못한 부분이며 어쩔 수 없는 부분이기에 아쉬움이 남는다.<br/>비록 해커톤 이후 진행된 우수참가자 인턴 면접에서는 떨어졌지만 앞으로 어떤 부분을 중점적으로 공부해야 하는지, 또 네이버라는 회사의 기술 면접을 본 경험이 남은 학기 중에 좋은 길잡이가 되어 줄 것이라 믿는다.</p>
            </div>
            <div id='addexplain'>
                    <P>특이사항</P>
                    <p>2017 네이버 동계 해커톤 - 우수참가자 선정 <p>
            </div>
            <div id='proj-images'>
                <P>실행화면</P>
                <img src='../img/navercafe.JPG' class='h400' />
            </div>

            <div id='links'>
                <p>소스코드 및 링크</p>
                <ul>
                    <li>- 소스파일 : 제공불가</li>
                    <li>- 확장 프로그램 설치 : 제공불가</li>
                </ul>
            </div>
        </article>
    </section>
    <footer></footer>
</body>

</html>