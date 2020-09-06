<!-- 비주얼 영역 -->
<div class="position-relative hx-300">
    <div class="background background--black">
        <img src="/images/visual/1.jpg" alt="슬라이드" title="슬라이드">
    </div>
    <div class="position-center text-center mt-5">
        <div class="fx-7 text-white mb-2">축제 정보</div>
        <div class="fx-n2 text-gray">
            전북 축제 On! 
            <i class="fa fa-angle-right mx-1"></i>
            축제 정보
        </div>
    </div>
</div>
<!-- /비주얼 영역 -->

<div class="container py-5">
    <div class="fx-4">축제 상세 정보</div>
    <div class="row mt-4">
        <?php if(count($festival->images) > 0):?>
        <div class="col-lg-5">
            <img src="<?=$festival->imagePath?>/<?= $festival->images[0] ?>" alt="">
        </div>
        <?php endif;?>
        <div class="col-lg-7">
            <div class="fx-3"><?= enc($festival->name) ?></div>
            <div class="fx-n1 text-muted mt-2"><?= enc($festival->content) ?></div>
            <div class="mt-4">
                <div class="mt-2">
                    <span class="fx-n2 text-muted">지역</span>
                    <span class="fx-n1 ml-2"><?=$festival->area?></span>
                </div>
                <div class="mt-2">
                    <span class="fx-n2 text-muted">장소</span>
                    <span class="fx-n1 ml-2"><?=$festival->location?></span>
                </div>
                <div class="mt-2">
                    <span class="fx-n2 text-muted">기간</span>
                    <span class="fx-n1 ml-2"><?=$festival->period?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <div class="fx-4">축제 후기</div>
        <div class="row mt-3">
            <?php foreach($festival->images as $image):?>
                <div class="col-lg-3">
                    <img src="<?=$festival->imagePath?>/<?=$image?>" alt="이미지" class="fit-cover hx-300">
                </div>
            <?php endforeach;?>
        </div>
    </div>
    <div class="mt-4">
        <div class="d-between border-bottom pb-3 mb-3">
            <div class="fx-4">축제 후기</div>
            <button class="btn-filled" data-target="#insert-modal" data-toggle="modal">후기 등록</button>
        </div>
        <?php foreach($reviews as $review):?>
        <div class="py-3 border-top border-bottom">
            <div class="align-center">
                <div class="fx-3"><?=enc($review->user_name)?></div>
                <div class="ml-2 text-red"><?= str_repeat("★", $review->score) ?></div>
                <?php if(user()):?>
                    <div>
                        <a href="/delete/reviews/<?=$review->id?>" class="ml-3 btn-bordered">삭제</a>
                    </div>
                <?php endif;?>
            </div>
            <div class="mt-2 fx-n1 text-muted"><?=enc($review->content)?></div>
        </div>
        <?php endforeach;?>
    </div>
</div>

<form action="/insert/reviews" id="insert-modal" class="modal fade" method="post">
    <input type="hidden" name="fid" value="<?=$festival->id?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-between w-100">
                    <div class="fx-4">후기 등록</div>
                    <button class="icon bg-red text-white" data-dismiss="modal">&times;</button>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>이름</label>
                    <input type="text" name="user_name" class="form-control">
                </div>
                <div class="form-group">
                    <label>평점</label>
                    <select name="score" id="score" class="form-control">
                        <option value="1">1점</option>
                        <option value="2">2점</option>
                        <option value="3">3점</option>
                        <option value="4">4점</option>
                        <option value="5">5점</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>후기</label>
                    <input type="text" name="content" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-filled">저장</button>
            </div>
        </div>
    </div>
</form>