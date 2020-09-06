<?php
namespace Controller;

use App\DB;

class ActionController {
    function init(){
        DB::query("DELETE FROM festivals");

        $xml_path = SRC."/init";
        $xml = simplexml_load_file($xml_path);
        foreach($xml->items->item as $item){
            $id = (string)$item->sn;
            $no = (string)$item->no;
            $name = (string)$item->nm;
            $location = (string)$item->location;
            $area = (string)$item->area;
            $content = (string)$item->cn;
            $period = (string)$item->dt;
            $temp = explode("~", $item->dt);
            $start_time = strtotime(str_replace(".", "-", $temp[0]));
            $end_time = strtotime(date("Y", $start_time) . "-" . str_replace(".", "-", $temp[1]));
            $imagePath = "/xml/festivalImages/" . str_pad($id, 3, "0", STR_PAD_LEFT) . "_" . $no;

            if($start_time > $end_time) 
                $end_time = strtotime("+1 Year", $end_time);
            
            $images = array_map(function($image) {
                return $image;
            }, (array)$item->images->image);
            
            DB::query("INSERT INTO festivals VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", 
                [ $id, $no, $name, $location, $area, $content, $period, date("Y-m-d", $start_time), date("Y-m-d", $end_time), json_encode($images), $imagePath]);
        }
    }

    // 축제 정보 가져오기
    function getFestivals(){
        json_response(
            array_map(function($festival){
                $festival->images = json_decode($festival->images);
                return $festival;
            }, DB::fetchAll("SELECT * FROM festivals"))
        );
    }

    // 로그인
    function signIn(){
        checkEmpty();
        extract($_POST);

        if($user_id != "admin" || $password != "admin") back("아이디 또는 비밀번호가 일치하지 않습니다.");
        $_SESSION['user'] = true;

        go("/", "로그인 되었습니다.");
    }

    // 로그아웃
    function signOut(){
        unset($_SESSION['user']);
        go("/", "로그아웃 되었습니다.");
    }

    // 이미지 다운로드
    function download($type, $id){
        global $festival;
        $festival = DB::find("festivals", $id);
        if(!$festival) back("대상을 찾을 수 없습니다.");

        $images = array_map(function($image){
            global $festival;
            return FIMAGE. substr($festival->imagePath, strlen("/xml/festivalImages")) . "/" . $image;
        }, json_decode($festival->images));
        
        download($type, $images);
    }

    // 축제 추가
    function insertFestival(){
        checkEmpty();   
        extract($_POST);

        if(!preg_match("/^([0-9]{4}-[0-9]{2}-[0-9]{2}) ~ ([0-9]{4}-[0-9]{2}-[0-9]{2})$/", $period, $matches))
            back("축제 기간의 입력 양식이 일치하지 않습니다. (ex: 2020-07-01 ~ 2020-07-13)");
        unset($matches[0]);
        $start_time = strtotime($matches[1]);
        $end_time = strtotime($matches[2]);
        $period = date("Y.m.d", $start_time) . "~". date("m.d", $end_time);
        
        $images = $_FILES['images'];
        $filenames = [];
        $fileLength = count($images['name']);

        if($images['name'][0] !== ""){
            for($i = 0; $i <$fileLength; $i++){
                $name = $images['name'][$i];
                $tmp_name = $images['tmp_name'][$i];
                $extname = extname($name);
                $filename = time(). "-" . $name;
                $filenames[] = $filename;
                
                if(array_search($extname, [".jpg", ".png", ".gif"]) === false)
                    back("축제 사진 업로드는 png, gif, jpg 형식만 가능합니다.");

                move_uploaded_file($tmp_name, FIMAGE."/uploads/$filename");
            }
        }

        DB::query("INSERT INTO festivals(name, area, location, period, start_date, end_date, images, imagePath) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)", [$festival_name, $area, $location, $period, date("Y-m-d", $start_time), date("Y-m-d", $end_time), json_encode($filenames), "/xml/festivalImages/uploads"]);


        go("/festivals", "축제를 추가했습니다.");
    }

    // 축제 수정
    function updateFestival($id){
        $festival = DB::find("festivals", $id);
        if(!$festival) back("대상을 찾을 수 없습니다.");

        global $remove, $images;
        checkEmpty();
        extract($_POST);

        $remove = $rm_images;
        

        if(!preg_match("/^([0-9]{4}-[0-9]{2}-[0-9]{2}) ~ ([0-9]{4}-[0-9]{2}-[0-9]{2})$/", $period, $matches))
            back("축제 기간의 입력 양식이 일치하지 않습니다. (ex: 2020-07-01 ~ 2020-07-13)");
        unset($matches[0]);
        $start_time = strtotime($matches[1]);
        $end_time = strtotime($matches[2]);
        $period = date("Y.m.d", $start_time) . "~". date("m.d", $end_time);
        
        $images = $_FILES['images'];
        $filenames = [];
        $fileLength = count($images['name']);

        if($images['name'][0] !== ""){
            for($i = 0; $i <$fileLength; $i++){
                $name = $images['name'][$i];
                $tmp_name = $images['tmp_name'][$i];
                $extname = extname($name);
                $filename = time(). "-" . $name;
                $filenames[] = $filename;
                
                if(array_search($extname, [".jpg", ".png", ".gif"]) === false)
                    back("축제 사진 업로드는 png, gif, jpg 형식만 가능합니다.");

                move_uploaded_file($tmp_name, FIMAGE."/uploads/$filename");
            }
        }

        $has_images = array_filter(json_decode($festival->images), function($image){
            global $remove;
            return array_search($image, $remove) === false;
        });

        DB::query("UPDATE festivals SET name = ?, area = ?, location = ?, period = ?, start_date = ?, end_date = ?, images = ? WHERE id = ?" ,[
            $festival_name, $area, $location, $period, date("Y-m-d", $start_time), date("Y-m-d", $end_time), json_encode([...$has_images, ...$filenames]), $id
        ]);

        go("/festivals", "축제를 수정했습니다.");
    }
    
    // 축제 삭제
    function deleteFestival($id){
        $festival = DB::find("festivals", $id);
        if(!$festival) back("대상을 찾을 수 없습니다.");

        DB::query("DELETE FROM festivals WHERE id = ?", [$id]);
        go("/festivals", "축제를 삭제했습니다.");
    }

    // 후기 등록
    function insertReview(){{
        checkEmpty();
        extract($_POST);

        DB::query("INSERT INTO reviews(fid, user_name, score, content) VALUES (?, ?, ?, ?)", [$fid, $user_name, $score, $content]);
        go("/festivals/$fid", "후기를 작성했습니다.");
    }}

    // 후기 삭제
    function deleteReview($id){
        $review = DB::find("reviews", $id);
        if(!$review) back("후기를 삭제했습니다.");

        DB::query("DELETE FROM reviews WHERE id = ?", [$id]);
        go("/festivals/{$review->fid}", "후기를 삭제했습니다.");
    }

    // 공개데이터
    function openApi(){
        $searchType = isset($_GET['searchType']) ? $_GET['searchType'] : null;
        $year = isset($_GET['year']) ? $_GET['year'] : null;
        $month = isset($_GET['month']) ? $_GET['month'] : null;

        if(!$searchType || !$year) return;
        if(array_search($searchType, ["Y", "M"]) === false) return;
        if(strtotime($year."-1-1") == false) return;
        if($searchType == "Y" && !$month) return;
        if(strtotime($year."-$month-1") == false) return;
        
        $sql = "SELECT 
                    id sn,
                    no,
                    name nm,
                    location,
                    period dt,
                    content cn,
                    images
                FROM festivals 
                WHERE LEFT(start_date, 4) = ?";
        $params = [$year];

        if($searchType === "M"){
            $sql .= " AND MID(start_date, 6, 2) = ?";
            $params[] = str_pad($month, 2, '0', STR_PAD_LEFT);
        }

        $items = DB::fetchAll($sql, $params);
        $totalCount = count($items);

        json_response(compact("searchType", "year", "month", "totalCount", "items"));
    }
}