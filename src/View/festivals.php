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
    <div class="d-between pb-3 mb-3 border-bottom align-items-end">
        <div>
            <hr>
            <div class="fx-4">전북 축제</div>
        </div>
        <?php if(user()):?>
            <button class="btn-custom" data-target="#insert-modal" data-toggle="modal">축제 등록</button>
        <?php endif;?>
    </div>
    <div class="t-head">
        <div class="cell-10">번호</div>
        <div class="cell-40">축제명(사진)</div>
        <div class="cell-20">다운로드</div>
        <div class="cell-20">기간</div>
        <div class="cell-10">장소</div>
    </div>
    <?php foreach($festivals->data as $festival):?>
        <!-- 데이터 행 -->
        <div class="t-row">
            <div class="cell-10" <?= user() ? "data-target='#update-modal-$festival->id' data-toggle='modal'" : '' ?>  ><?= $festival->id ?></div>
            <div class="cell-40" onclick="location.href='/festivals/<?=$festival->id?>';">
                <?= enc($festival->name) ?>
                <span class="badge badge-danger"><?= count($festival->images) ?></span>
            </div>
            <div class="cell-20">
                <a href="/download/tar/<?=$festival->id?>" class="btn-bordered">tar</a>
                <a href="/download/zip/<?=$festival->id?>" class="btn-bordered">zip</a>
            </div>
            <div class="cell-20">
                <?= $festival->period ?>
            </div>
            <div class="cell-10">
                <?= enc($festival->area) ?>
            </div>
        </div>
        <!-- 데이터 행 -->
        <!-- 업데이트 모달 -->
        <form action="/update/festivals/<?=$festival->id?>" id="update-modal-<?=$festival->id?>" method="post" class="modal fade" enctype="multipart/form-data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="d-between w-100">
                            <div class="fx-4">축제 관리</div>
                            <button class="icon bg-red text-white" data-dismiss="modal">&times;</button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>축제명</label>
                            <input type="text" class="form-control" name="festival_name" value="<?=$festival->name?>">
                        </div>
                        <div class="form-group">
                            <label>지역</label>
                            <input type="text" class="form-control" name="area" value="<?=$festival->area?>">
                        </div>
                        <div class="form-group">
                            <label>기간</label>
                            <input type="text" class="form-control" name="period" placeholder="예) 2020-01-01 ~ 2020-07-13" value="<?= dt($festival->start_date). " ~ ". dt($festival->end_date) ?>">
                        </div>
                        <div class="form-group">
                            <label>장소</label>
                            <input type="text" class="form-control" name="location" value="<?= $festival->location ?>">
                        </div>
                        <div class="form-group">
                            <label>삭제할 사진</label>
                            <small class="text-muted">※ 업로드한 사진 중 삭제할 것을 선택하세요</small>
                            <div class="p-3 border bg-light d-flex flex-wrap">
                                <input type="checkbox" name="rm_images[]" value="" class="mr-2" checked hidden>
                                <?php foreach($festival->images as $image):?>
                                    <div class="p-1 align-center">
                                        <input type="checkbox" name="rm_images[]" value="<?=$image?>" class="mr-2">
                                        <?= $image ?>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>추가할 사진</label>
                            <input type="file" name="images[]" multiple class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn-filled">저장</button>
                        <a href="/delete/festivals/<?=$festival->id?>" class="btn-filled">삭제</a>
                        <button class="btn-bordered" data-dismiss="modal">닫기</button>
                    </div>
                </div>
            </div>
        </form>
        <!-- /업데이트 모달 -->
    <?php endforeach;?>
    <div class="d-center mt-4">
        <a href="/festivals?page=<?= $festivals->prevPage ?>" class="mx-1 icon bg-red text-white" <?= !$festivals->prev ? 'disabled': '' ?>><i class="fa fa-angle-left"></i></a>
        <?php for($i = $festivals->start; $i <= $festivals->end; $i++):?>
            <a href="/festivals?page=<?= $i ?>" class="mx-1 icon border <?= $i == $festivals->page ? 'bg-red text-white' : 'border-red text-red'?>"><?=$i?></a>
        <?php endfor;?>
        <a href="/festivals?page=<?= $festivals->nextPage ?>" class="mx-1 icon bg-red text-white" <?= !$festivals->next ? 'disabled': '' ?>><i class="fa fa-angle-right"></i></a>
    </div>
</div>


<form action="/insert/festivals" method="post" enctype="multipart/form-data" id="insert-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-between w-100">
                    <div class="fx-4">축제 관리</div>
                    <button class="icon bg-red text-white" data-dismiss="modal">&times;</button>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>축제명</label>
                    <input type="text" class="form-control" name="festival_name">
                </div>
                <div class="form-group">
                    <label>지역</label>
                    <input type="text" class="form-control" name="area">
                </div>
                <div class="form-group">
                    <label>기간</label>
                    <input type="text" class="form-control" name="period" placeholder="예) 2020-01-01 ~ 2020-07-13">
                </div>
                <div class="form-group">
                    <label>장소</label>
                    <input type="text" class="form-control" name="location">
                </div>
                <div class="form-group">
                    <label>축제 사진</label>
                    <input type="file" name="images[]" multiple class="form-control" accept="image/*">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-filled">저장</button>
                <button class="btn-bordered" data-dismiss="modal">닫기</button>
            </div>
        </div>
    </div>
</form>