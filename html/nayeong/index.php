<!DOCTYPE html>
<html lang="ko">

<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"
    />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
    <link rel="stylesheet" href="css/import.css">
    <script type="text/javascript" src="js/script.js"></script>
    <script>
        function check_input()
        {
            if (!document.message.usrname.value)
            {
                alert("이름을 입력하세요1");    
                document.message.usrname.focus();
                return;
            }

            if (!document.message.usrmail.value)
            {
                alert("이메일을 입력하세요!");    
                document.message.usrmail.focus();
                return;
            }
            if (!document.message.comment.value)
            {
                alert("내용을 입력하세요!");    
                document.message.comment.focus();
                return;
            }
            document.message.submit();
        }
    </script>
</head>

<body>
    <nav>
        <div id='wrap-menu'>
            <!--p>HOME / about까지 내려오고나서 맨앞쪽으로 이미지 동그랗게? 아님 내이름 넣어 그게 홈임</p-->
            <a href=''><p>HOME</p></a>
			<a href='#about'><p>ABOUT</p></a>
            <a href='#project'><p>PROJECT</p></a>
            <a href='./project/projectlist.php'><p>+</p></a>
            <a href='#contact'><p>CONTACT</p></a>
        </div>
    </nav>
    <header id='slider-area' class='fullscreen'>
        <div class='blackcover'></div>
    </header>
    <div id='whoami'>
        <div id='whoami-inner'>
            <p>NAYEONG KIM</p>
            <p>Web and Server Developer</p>
            <div class='social-contact'>
                <img src='./img/github-white.png' />
                <img src='./img/talk-white.png' />
                <img src='./img/mail-white.png' />
                <img src='./img/facebook-white.png' />
                <img src='./img/instagram-white.png' />
            </div>
        </div>
    </div>
    <div id='overflow-area'>
        <a id='about'></a>
        <section id='section1'>
            <div id='profile-images'>
                <img src='./img/me4.jpg' />
                <img src='./img/me.jpg' />
                <img src='./img/me3.jpg' />
            </div>
            <div id='introduce-txt' class='jejugothic'>
                저는 웹 프로그래밍에 관심이 있는 학생입니다.
                <br /> 처음 html을 접하고 만들었던 홈페이지를 php를 이용하여 다양한 기능을 추가했을 때의 즐거움은 더 다양하고 더 나은 기능을 제공하고 싶다는 욕심을 심어주었고 이는 css, database를
                공부하는 계기뿐만 아니라 웹 개발자의 꿈을 심어주었습니다. 원하는 기능이 제대로 작동하는 웹 페이지를 만든 후에 느끼는 성취감은 개발에 대한 저의 열정과 즐거움의 원동력입니다. 이런 즐거움을
                많은 사람들과 나누고 싶습니다.
                <br />성공보다는 성장을 위해 노력하는 개발자가 되겠습니다.
            </div>
            <div id='experience'>
                <p class='top-border'></p>
                <p class='subtitle'>EXPERIENCES</p>
                <div class='subtxt'>
                    <p>[2017.07 - 2017.08]
                        <br />앤아이컴즈 웹 개발팀 인턴</p>
                    <br />
                    <p>[2017.09 -2017.10]
                        <br />제 11회 공개소프트웨어 개발자대회
                        <p class='exp-result'>- 본선 1차 통과</p>
                    </p>
                    <br />
                    <p>[2017.09 -2017.10]
                        <br />NAVER CAMPUS HACK DAY2017
                        <p class='exp-result'>- 2017 네이버 동계 해커톤 우수참가자 선정</p>
                    </p>
                </div>
                <div id='skills'>
                    <p class='subtitle'>SKILLS &middot; INTERESTING</p>
                    <img src='./img/web.png' />
                    <img src='./img/php.png' />
                    <img src='./img/mysql.png' />
                    <img src='./img/aws.png' />
                    <img src='./img/java.png' />
                </div>
            </div>

        </section>
        <a id='project'></a>
        <section id='section2'>
            <div class='wrap-title'>
                <p class='title in_bl f_l'>PROJECT</p>
                <ul class="controller in_bl f_r">

                    <li class="moreBtn" value='projectlist'>
                        <img src='./img/add-btn.png' />
                    </li>
                    <li class="prevBtn">
                        <img src='./img/pre-btn.png' />
                    </li>
                    <li class="nextBtn">
                        <img src='./img/next-btn.png' />
                    </li>
                </ul>
                <div class='c_b'>
                    <p class='border-orange in_bl f_l'></p>
                    <p class='border-grey in_bl f_l'></p>
                </div>
                <div class="project-wrapper">
                    <div class="viewport">
                        <ul class="project-slider">
                            <li value='1'>
                                <figure class='project-list' value='publiday'>
                                    <div class='wrap-projectImg'>
                                        <div id='img1' class='projectImg scale'></div>
                                        <div class='blackcover2'></div>
                                    </div>
                                    <figcaption class='wrap-project-txt'>
                                        <p class='proj-title'>퍼블리데이 웹 / 서버
                                            <br />
                                            <span>Web/Mobile App</span>
                                        </p>
                                        <div class='proj-con'>
                                            <p>미디어를 큐알코드로 변환하여 출력해주는 다이어리 앱과 웹사이트</p>
                                            <br />
                                            <p>- 제 11회 공개소프트웨어 개발자대회</p>
                                            <br />
                                            <div class='skill-list'>
                                                <div class='used-skill'>Google Oauth 2.0</div>
                                                <div class='used-skill'>HTML</div>
                                                <div class='used-skill'>CSS</div>
                                                <div class='used-skill'>JS</div>
                                                <div class='used-skill'>PHP</div>
                                                <div class='used-skill'>AWS</div>
                                                <div class='used-skill'>SQL</div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </li>
                            <li value='2'>
                                <figure class='project-list' value='weather'>
                                    <div class='wrap-projectImg'>
                                        <div id='img2' class='projectImg scale'></div>
                                        <div class='blackcover2'></div>
                                    </div>
                                    <figcaption class='wrap-project-txt'>
                                        <p class='proj-title'>내 위치 실시간 날씨 알림
                                            <br />
                                            <span>Chrome Extension App</span>
                                        </p>
                                        <div class='proj-con'>
                                            <p>사용자의 현재 위치에 따른 날씨정보를 제공해주는 앱</p>
                                            <br />
                                            <p>&nbsp;</p>
                                            <br />
                                            <div class='skill-list'>
                                                <div class='used-skill'>Open API</div>
                                                <div class='used-skill'>HTML</div>
                                                <div class='used-skill'>CSS</div>
                                                <div class='used-skill'>JS</div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </li>
                            <li value='3'>
                                <figure class='project-list' value='cafealarm'>
                                    <div class='wrap-projectImg'>
                                        <div id='img3' class='projectImg scale'></div>
                                        <div class='blackcover2'></div>
                                    </div>
                                    <figcaption class='wrap-project-txt'>
                                        <p class='proj-title'>네이버 카페 새소식 알람
                                            <br />
                                            <span>Chrome Extension App</span>
                                        </p>
                                        <div class='proj-con'>
                                            <p>네이버 카페 서버에서 제공해주는 정보를 바탕으로 사용자가 설정한 새글, 새 덧글 등의 정보를 제공해주는 앱</p>
                                            <br />
                                            <p>- 2017 NAVER CAMPUS HACK DAY</p>
                                            <br />
                                            <div class='skill-list'>
                                                <div class='used-skill'>HTML</div>
                                                <div class='used-skill'>CSS</div>
                                                <div class='used-skill'>JS</div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </li>
                            <li value='4'>
                                <figure class='project-list' value='mypage'>
                                    <div class='wrap-projectImg'>
                                        <div id='img4' class='projectImg scale'></div>
                                        <div class='blackcover2'></div>
                                    </div>

                                    <figcaption class='wrap-project-txt'>
                                        <p class='proj-title'>나의 홈페이지
                                            <br />
                                            <span>Website</span>
                                        </p>
                                        <div class='proj-con'>
                                            <p>개인 포트폴리오 정리, 공부 기록을 위한 반응형 홈페이지 제작</p>
                                            <br />
                                            <p>&nbsp;</p>
                                            <br />
                                            <div class='skill-list'>
                                                <div class='used-skill'>HTML</div>
                                                <div class='used-skill'>CSS</div>
                                                <div class='used-skill'>JS</div>
                                                <div class='used-skill'>PHP</div>
                                                <div class='used-skill'>AWS</div>
                                                <div class='used-skill'>SQL</div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </li>
                            <li value='5'>
                                <figure class='project-list' value='ready'>
                                    <div class='wrap-projectImg'>
                                        <div id='img5' class='projectImg scale'></div>
                                        <div class='blackcover2'></div>
                                    </div>
                                    <figcaption class='wrap-project-txt'>
                                        <p class='proj-title'>GOOGLE DRIVE EXTENTION
                                            <br />
                                            <span>Chrome Extension App</span>
                                        </p>
                                        <div class='proj-con'>
                                            <p>익스텐션 창으로 파일 드래그 시, 자동으로 구글 드라이브에 파일을 저장하는 크롬확장 어플리케이션</p>
                                            <br />
                                            <p>- 만드는 중입니다.</p>
                                            <br />
                                            <div class='skill-list'>
                                                <div class='used-skill'>Google Oauth 2.0</div>
                                                <div class='used-skill'>HTML</div>
                                                <div class='used-skill'>CSS</div>
                                                <div class='used-skill'>JS</div>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </li>
                        </ul>
                    </div>
                </div>
				<script>
                    //하나의 li의 width값을 구해 놓는다.
                    var item_width = $('.project-slider li').outerWidth(true);
                    //맨 마지막 item을 맨 앞으로 이동시켜 놓는다.
                    $('.project-slider li:first').before($('.project-slider li:last'));
                    //늘어난 만큰 -로 위치를 설정해 준다.
                    $('.project-slider').css('left', -item_width + 'px');


                    //이전버튼 클릭시 
                    $('.prevBtn').click(function () {
                        var left_indent = parseInt($('.project-slider').css('left')) + item_width;
                        $('.project-slider').animate({ 'left': left_indent + 'px' }, 600, function () {
                            $('.project-slider li:first').before($('.project-slider li:last'));
                            $('.project-slider').css('left', -item_width + 'px');
                        });
                    });
                    

                    //다음으로 넘기는 함수
                    function nextList(){
                        var left_indent = parseInt($('.project-slider').css('left')) - item_width; //
                        $('.project-slider').animate({ 'left': left_indent + 'px' }, 600, function () {
                            $('.project-slider li:last').after($('.project-slider li:first'));
                            $('.project-slider').css('left', -item_width + 'px');
                        });
                    }
                    //다음버튼 클릭시
                    $('.nextBtn').click(nextList);
                    //자동으로 넘김
                    var idInterval = setInterval(nextList,4000);
                    //이영역안에 들어가면 인터벌 멈춤
                    $('.wrap-title').hover(
                        function(){clearInterval(idInterval)},
                        function(){idInterval = setInterval(nextList,4000)});
                    //리스트 페이지 이동
                    $('.moreBtn').click(function(){showThis($(this).attr('value'))})
                    //이미지 효과
                    $('.project-list').hover(
                        function () { 
                            $(this).find('.scale').addClass('hover')
                        },
                        function() {
                            $(this).find('.scale').removeClass('hover')
                        }
                    );

                    $('.project-list').click(function(){
                        var target=$(this).attr('value');
                        if(target=='ready'){
                            alert('공부하는 중입니다. 곧 완성되면 만나요!');
                            return;
                        }
                        showThis(target);
                    });

                </script>
            </div>
        </section>
        <a id='contact'></a>
        <section id='section3'>
            <div class='wrap-title'>
                <p class='title'>CONTACT</p>
                <p class='border-orange in_bl f_l'></p>
                <div id='wrap-contact'>
                    <article class='in_bl f_l'>
                        <p>더 알고 싶은 것이 있다면 언제든 연락주세요. 방문해 주셔서 감사합니다. 좋은 하루 되세요!
                            <br/>- 빠른 답장을 원하시면 오픈카톡을 이용해주세요.</p>
                        <br />
                        <p>Please feel free to contact me if you need any further information. Thank you for coming to my website!
                        </p>
                        <ul id='contact1'>
                            <li>
                                <img src='./img/location.png' align='left' />서울시 노원구 화랑로 621,
                                <br />서울여자대학교 샬롬하우스 B동 733호</li>
                            <li>
                                <img src='./img/mail.png' />nayeong_e@naver.com</li>
                            <li>
                                <img src='./img/talk.png' />opencacaotalk</li>
                        </ul>
                    </article>
                    <article class='in_bl f_l'>
                        <div id='contact2'>
                            <div class='message-form'>

                                <form action="./lib/insert.php" method="post" accept-charset="utf-8" name="message"  id='message'  enctype="multipart/form-data">
                                    <input type="text" name="usrname" onclick="if(this.value=='이름을 입력하세요.'){this.value=''}"  value='이름을 입력하세요.' />
                                    <input type="email" name="usrmail" onclick="if(this.value=='이메일을 입력하세요.'){this.value=''}"  value='이메일을 입력하세요.' />
                                    <textarea rows="5" name="comment" style="resize: none;"></textarea>
                                </form>
                                <div id='submit-btn' onclick="check_input()" class='in_bl'>SEND MESSAGE</div>
                            </div>
                        </div>
                    </article>
                </div>

            </div>
        </section>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>


    </div>
    <footer></footer>
</body>

</html>