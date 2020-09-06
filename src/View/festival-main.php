<!-- 비주얼 영역 -->
<div class="position-relative hx-300">
    <div class="background background--black">
        <img src="/images/visual/1.jpg" alt="슬라이드" title="슬라이드">
    </div>
    <div class="position-center text-center mt-5">
        <div class="fx-7 text-white mb-2">전북 대표 축제</div>
        <div class="fx-n2 text-gray">
            전북 축제 On! 
            <i class="fa fa-angle-right mx-1"></i>
            전북 대표 축제
        </div>
    </div>
</div>
<!-- /비주얼 영역 -->

<div class="container py-5">
    <div class="d-between pb-3 mb-3 border-bottom align-items-end">
        <div>
            <hr>
            <div class="fx-3">
                전북 대표 축제
            </div>
        </div>
        <div class="fx-n2">
            <a href="?type=normal" class="text-muted ml-3" data-target="normal"><i class="fa fa-table"></i> 일반형</a>
            <a href="?type=list" class="text-muted ml-3" data-target="list"><i class="fa fa-list"></i> 목록형</a>
        </div>
    </div>
    <div id="content">
        
    </div>
    <div id="pagination" class="mt-4 d-center">
        <a href="#" class="mx-1 icon bg-red text-white"><i class="fa fa-angle-left"></i></a>
        <a href="#" class="mx-1 icon border border-red text-red">1</a>
        <a href="#" class="mx-1 icon bg-red text-white"><i class="fa fa-angle-right"></i></a>
    </div>
</div>

<div id="view-modal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header d-between">
                <div class="fx-4">축제 상세 정보</div>
                <button class="icon bg-red text-white" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <div class="modal-body">
                
            </div>
        </div>
    </div>
</div>

<script src="/js/festival-main.js"></script>