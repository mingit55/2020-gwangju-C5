<?php
function dump(){
    foreach(func_get_args() as $arg){
        echo "<pre>";
        var_dump($arg);
        echo "</pre>";
    }
}

function dd(){
    foreach(func_get_args() as $arg){
        echo "<pre>";
        var_dump($arg);
        echo "</pre>";
    }
    exit;
}

function dt($date){
    return date("Y-m-d", strtotime($date));
}

function enc($output){
    return nl2br( str_replace(" ", "&nbsp;", htmlentities($output)) );
}

function go($url, $message = ""){
    echo "<script>";
    if($message !== "") echo "alert('$message');";
    echo "location.href='$url';";
    echo "</script>";
    exit;
}

function back($message = ""){
    echo "<script>";
    if($message !== "") echo "alert('$message');";
    echo "history.back();";
    echo "</script>";
    exit;
}

function view($viewName, $data = []){
    extract($data);

    require VIEW."/header.php";
    require VIEW."/$viewName.php";
    require VIEW."/footer.php";
}

function checkEmpty(){
    foreach($_POST as $input){
        if(!is_array($input) && trim($input) === ""){
            back("모든 정보를 입력해 주세요");
        }
    }
}

function extname($filename){
    return strtolower( substr($filename, strrpos($filename, ".")) );
}

function download($type, $images){
    $compact_path = ROOT."/compact.$type";
    $cnt = 0;

    if($type === "tar"){
        $tar = new PharData($compact_path);
        foreach($images as $path){
            if(is_file($path))
                $tar->addFile($path, ++$cnt . extname($path));
        }
    } else {
        $zip = new ZipArchive();
        $zip->open($compact_path, ZipArchive::OVERWRITE);
        foreach($images as $path){
            if(is_file($path))
                $zip->addFile($path, ++$cnt . extname($path));
        }
        $zip->close();
    }

    if($cnt === 0) back("압축할 이미지를 찾을 수 없습니다.");

    header("Content-Disposition: attachement; filename=download.$type");
    readfile($compact_path);
}

function json_response($data){
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}


function user(){
    return isset($_SESSION['user']) ? true : false;
}

function pagination($data){
    define("COUNT", 10);
    define("BCOUNT", 5);
    
    $page = isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] >= 1 ? $_GET['page'] : 1;

    $totalPage = ceil(count($data) / COUNT);
    $c_block = ceil($page / BCOUNT);

    $start = ($c_block - 1) * BCOUNT + 1;
    $end = $start + BCOUNT - 1;
    $end = $end > $totalPage ? $totalPage : $end;

    $prevPage = $start - 1;
    $prev = $prevPage >= 1;

    $nextPage = $end + 1;
    $next = $nextPage <= $totalPage;

    $data = array_slice($data, ($page - 1) * COUNT, COUNT);

    return (object)compact("start", "end", "prevPage", "prev", "nextPage", "next", "data", "page");
}