<?php
namespace Controller;

use App\DB;

class ViewController {
    // 메인 페이지
    function main(){
        view("main");
    }

    // 공지사항
    function notices(){
        view("notices");
    }

    // 전북대표축제
    function festivalMain(){
        view("festival-main");
    }

    // 축제 이미지
    function festivalImage($dirname, $filename){
        $filepath = FIMAGE."/$dirname/$filename";
 
        if(is_file($filepath)){
            header("Content-Type: image/jpeg");
            readfile($filepath);
        }
    }

    // 환율 안내
    function exchangeRate(){
        view("exchange-rate");
    }

    // 축제 정보
    function festivals(){
        view("festivals", [
            "festivals" => pagination( 
                array_map(function($festival){
                    $festival->images = json_decode($festival->images);
                    return $festival;
                }, DB::fetchAll("SELECT * FROM festivals ORDER BY id DESC"))
            ),
        ]);
    }

    // 축제 상세보기
    function festival($id){
        $festival = DB::find("festivals", $id);
        if(!$festival) back("대상을 찾을 수 없습니다.");
        $festival->images = json_decode($festival->images);
        
        $reviews = DB::fetchAll("SELECT * FROM reviews WHERE fid = ?", [$id]);
        
        view("festival", compact("reviews", "festival"));
    }

    // 축제 일정
    function schedules(){
        $year = isset($_GET['year']) ? $_GET['year'] : date("Y");
        $month = isset($_GET['month']) ? $_GET['month'] : date("m");

        $t_first_day = strtotime("$year-$month-1");
        if(!$t_first_day) $t_first_day = date("Y-m-1", $t_first_day);
        $t_last_day = strtotime("-1 Day", strtotime("+1 Month", $t_first_day));

        $prev_month = strtotime("-1 Month", $t_first_day);
        $next_month = strtotime("+1 Month", $t_first_day);
        

        $schedules = DB::fetchAll("SELECT 
                                        id, name, period,
                                        IF(start_date < ?, 1, DATE_FORMAT(start_date, '%d')) start,
                                        IF(end_date > ?, ?, DATE_FORMAT(end_date, '%d')) end
                                    FROM festivals
                                    WHERE (? BETWEEN start_date AND end_date)
                                    OR (? BETWEEN start_date AND end_date)
                                    OR (start_date BETWEEN ? AND ?)
                                    OR (end_date BETWEEN ? AND ?)", [
                                        date("Y-m-d", $t_first_day),
                                        date("Y-m-d", $t_last_day), date("d", $t_last_day),
                                        date("Y-m-d", $t_first_day),
                                        date("Y-m-d", $t_last_day),
                                        date("Y-m-d", $t_first_day), date("Y-m-d", $t_last_day),
                                        date("Y-m-d", $t_first_day), date("Y-m-d", $t_last_day),
                                    ]);
        view("schedules", compact("year", "month", "t_first_day", "t_last_day", "prev_month", "next_month", "schedules"));
    }

    function openApi(){
        view("open-api");
    }
}