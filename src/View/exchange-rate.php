<!-- 비주얼 영역 -->
<div class="position-relative hx-300">
    <div class="background background--black">
        <img src="/images/visual/1.jpg" alt="슬라이드" title="슬라이드">
    </div>
    <div class="position-center text-center mt-5">
        <div class="fx-7 text-white mb-2">환율안내</div>
        <div class="fx-n2 text-gray">
            전북 축제 On! 
            <i class="fa fa-angle-right mx-1"></i>
            환율안내
        </i></div>
    </div>
</div>
<!-- /비주얼 영역 -->

<!-- 환율 안내 -->
<div class="container py-5">
    <div class="row">
        <div class="col-lg-4">
            <hr>
            <div class="title">환율 안내</div>
            <div class="text-title">오늘의 <strong>환율 정보</strong>를
                알려드립니다</div>
            <div class="mt-4">
                <span class="fx-n2 mr-2 text-muted">기준일</span>
                <span id="update-date" class="fx-n1"></span>
            </div>
        </div>
        <div class="col-lg-8">
            <div id="content">

            </div>
            <button id="more" class="btn-custom">더 보기 +</button>
        </div>
    </div>
</div>
<!-- /환율 안내 -->
<script src="/js/exchange-rate.js"></script>