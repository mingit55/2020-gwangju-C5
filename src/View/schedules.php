<!-- 비주얼 영역 -->
<div class="position-relative hx-300">
    <div class="background background--black">
        <img src="/images/visual/1.jpg" alt="슬라이드" title="슬라이드">
    </div>
    <div class="position-center text-center mt-5">
        <div class="fx-7 text-white mb-2">축제 일정</div>
        <div class="fx-n2 text-gray">
            전북 축제 On! 
            <i class="fa fa-angle-right mx-1"></i>
            축제 일정
        </div>
    </div>
</div>
<!-- /비주얼 영역 -->

<div class="container py-5">
    <div class="fx-4">축제 일정</div>
    <div class="d-between">
        <a href="/schedules" class="btn-bordered">이번달</a>
        <div>
            <a href="/schedules?year=<?=date("Y", $prev_month)?>&month=<?=date("m", $prev_month)?>" class="btn-bordered">이전달</a>
            <span class="fx-4 mx-3"><?=$year?>년 <?=$month?>월</span>
            <a href="/schedules?year=<?=date("Y", $next_month)?>&month=<?=date("m", $next_month)?>" class="btn-bordered">다음달</a>
        </div>
        <a href="/festivals" class="btn-filled">축제관리</a>
    </div>
    <div class="calender mt-5">
        <div class="calender__head">SUN</div>
        <div class="calender__head">MON</div>
        <div class="calender__head">TUE</div>
        <div class="calender__head">WED</div>
        <div class="calender__head">THU</div>
        <div class="calender__head">FRI</div>
        <div class="calender__head">SAT</div>

        <?php for($i = 0; $i < date("w", $t_first_day); $i++):?>
            <div class="calender__body" disabled></div>
        <?php endfor;?>

        <?php 
            global $day, $viewList;
            $viewList = [null, null, null];
            for($day = date("d", $t_first_day); $day <= date("d", $t_last_day); $day++):
                foreach($viewList as $idx => $item){
                    if($item && $item->end < $day)
                        $viewList[$idx] = null;
                }

                foreach($schedules as $schedule){
                    if($schedule->start == $day){
                        $idx = array_search(null, $viewList);
                        if($idx !== false){
                            $viewList[$idx] = $schedule;
                        }
                    }
                }
                
        ?>
        <div class="calender__body <?= dt("$year-$month-$day") == date("Y-m-d") ? "active" : "" ?>">
            <div class="schedule">
                <?php foreach($viewList as $item):?>
                    <?php if($item):?>
                        <div class="schedule__item" onclick="location.href='/festivals/<?=$schedule->id?>'" title="<?=$item->name?>(<?=$item->period?>)">
                            <?=$day == $item->start ? $item->name : ' '?>
                        </div>
                    <?php else:?>
                        <div class="schedule__item"></div>
                    <?php endif;?>
                <?php endforeach;?>
            </div>
        </div>
        <?php endfor;?>

        <?php for($i = 0; $i < 6 - date("w", $t_last_day); $i++):?>
            <div class="calender__body" disabled></div>
        <?php endfor;?>
    </div>
</div>