<?php
use App\Router;

Router::get("/init", "ActionController@init");

// 메인 페이지
Router::get("/", "ViewController@main");

// 공지사항
Router::get("/notices", "ViewController@notices");

// 전북 대표 축제
Router::get("/festival-main", "ViewController@festivalMain");

Router::get("/xml/festivalList.xml", "ActionController@getFestivals");
Router::get("/xml/festivalImages/{dirname}/{filename}", "ViewController@festivalImage");

// 환율 안내
Router::get("/exchange-rate", "ViewController@exchangeRate");


// 찾아오시는 길
Router::get("/location.php", "ViewController@location");

// 축제정보
Router::get("/festivals", "ViewController@festivals");
Router::get("/festivals/{id}", "ViewController@festival");

Router::get("/download/{type}/{id}", "ActionController@download");
Router::post("/insert/festivals", "ActionController@insertFestival");
Router::post("/update/festivals/{id}", "ActionController@updateFestival");
Router::get("/delete/festivals/{id}", "ActionController@deleteFestival");
Router::post("/insert/reviews", "ActionController@insertReview");
Router::get("/delete/reviews/{id}", "ActionController@deleteReview");

// 축제 일정
Router::get("/schedules", "ViewController@schedules");

// 공공 데이터 개방
Router::get("/open-api", "ViewController@openApi");

Router::get("/openAPI/festivalList.php", "ActionController@openApi");

// 회원 관리
Router::post("/sign-in", "ActionController@signIn");
Router::get("/sign-out", "ActionController@signOut");


Router::start();