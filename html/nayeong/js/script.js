var currentScrollTop = 0, footerScrollTop=0 , menuScrollTop = 90;

window.onload = function() {
    
    footerScrollTop = $('footer').offset().top;
    //새로고침
    scrollController();
    // 스크롤 하는 경우 실행됨
    $(window).on('scroll', function() {
        scrollController();
    });
}

function scrollController() {
    currentScrollTop = $(window).scrollTop();
    if(currentScrollTop > menuScrollTop){
        $('nav, #wrap-menu').addClass('mv-scroll');
    }else{ 
        $('nav, #wrap-menu').removeClass('mv-scroll');
    }
}

function showThis(target){
    var strTarget = target+'.php';
    location.href='./project/'+strTarget;
}