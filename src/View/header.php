<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>전북축제 On!</title>
    <script src="/js/jquery-3.5.0.min.js"></script>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <script src="/js/bootstrap.js"></script>
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/common.js"></script>
</head>
<body>
    <div id="road-modal" class="modal fade">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="fx-4">찾아오시는 길</div>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>

    <form id="sign-in" class="modal fade" method="post" action="/sign-in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="text-center w-100">
                        <div class="fx-7 font-weight-bold">전북 축제 on!</div>
                        <div class="mt-2 fx-n2">전북 축제 On! 사이트 로그인 페이지 입니다.</div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>아이디</label>
                        <input type="text" name="user_id" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>비밀번호</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="d-between">
                        <div class="align-center">
                            <input type="checkbox">
                            <span class="ml-2 fx-n1">Remember me</span>
                        </div>
                        <div class="align-center">
                            <a href="#">Forgot Password</a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn-filled">로그인</button>
                    <button class="btn-bordered" type="button">회원가입</button>
                </div>
            </div>
        </div>
    </form>

    <!-- 헤더 영역 -->
    <input type="checkbox" id="open-aside" hidden>
    <header>
        <div class="header__top d-none d-lg-block">
            <div class="container h-100 d-between">
                <div class="search">
                    <div class="icon"><i class="fa fa-search"></i></div>
                    <input type="text" placeholder="Search">
                </div>
                <div class="other">
                    <select>
                        <option value="ko">한국어</option>
                        <option value="en">English</option>
                        <option value="ch">中文(简体)</option>
                    </select>
                    <a href="#">전라북도청</a>
                    <?php if(user()):?>
                        <a href="/sign-out">로그아웃</a>
                    <?php else :?>
                        <a href="#" data-target="#sign-in" data-toggle="modal">로그인</a>
                        <a href="#">회원가입</a>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <div class="header__bottom">
            <div class="container h-100 d-between">
                <a href="#">
                    <img src="/images/logo.svg" alt="전북축제 On!" title="전북축제 On!" height="40">
                </a>
                <div class="nav d-none d-lg-flex">
                    <div class="nav__item"><a href="/">HOME</a></div>
                    <div class="nav__item"><a href="/festival-main">전북 대표 축제</a></div>
                    <div class="nav__item"><a href="/festivals">축제 정보</a></div>
                    <div class="nav__item"><a href="/schedules">축제 일정</a></div>
                    <div class="nav__item"><a href="/exchange-rate">환율안내</a></div>
                    <div class="nav__item">
                        <a href="/notices">종합지원센터</a>
                        <div class="nav__list">
                            <a href="/notices">공지사항</a>
                            <a href="#">센터 소개</a>
                            <a href="#">관광정보 문의</a>
                            <a href="/open-api">공공 데이터 개방</a>
                            <a href="#" data-target="#road-modal" data-toggle="modal">찾아오시는 길</a>
                        </div>
                    </div>
                </div>
                <label for="open-aside" class="icon-bars d-lg-none">
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
            </div>
        </div>
    </header>
    <!-- /헤더 영역 -->


    <!-- 사이드 바 -->
    <aside>
        <div class="search search--aside">
            <div class="icon"><i class="fa fa-search"></i></div>
            <input type="text" placeholder="Search">
        </div>
        <div class="other other--aside">
            <select>
                <option value="ko">한국어</option>
                <option value="en">English</option>
                <option value="ch">中文(简体)</option>
            </select>
            <a href="#">전라북도청</a>
            <?php if(user()):?>
                <a href="/sign-out">로그아웃</a>
            <?php else :?>
                <a href="#" data-target="#sign-in" data-toggle="modal">로그인</a>
                <a href="#">회원가입</a>
            <?php endif;?>
        </div> 
        <div class="nav nav--aside">
            <div class="nav__item"><a href="/">HOME</a></div>
            <div class="nav__item"><a href="/festival-main">전북 대표 축제</a></div>
            <div class="nav__item"><a href="/festivals">축제 정보</a></div>
            <div class="nav__item"><a href="/schedules">축제 일정</a></div>
            <div class="nav__item"><a href="/exchange-rate">환율안내</a></div>
            <div class="nav__item">
                <a href="/notices">종합지원센터</a>
                <div class="nav__list">
                    <a href="/notices">공지사항</a>
                    <a href="#">센터 소개</a>
                    <a href="#">관광정보 문의</a>
                    <a href="/open-api">공공 데이터 개방</a>
                    <a href="#">찾아오시는 길</a>
                </div>
            </div>
        </div>
    </aside>
    <!-- /사이드 바 -->