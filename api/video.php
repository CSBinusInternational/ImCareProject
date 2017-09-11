<?php
    require_once "../function/config.php";
    require_once "../function/koneksi.php";
    require_once "../dao/VideoDao.php";

    if ($_SERVER['REQUEST_METHOD'] === 'GET') 
    {
        $videodao = new VideoDao();
        if(isset($_GET['kdpenyakit']))
        {
            header('Content-type:application/json');
            http_response_code(200);
        
            $id = $_GET['kdpenyakit'];
            $response = $videodao->get_video_by_kdpenyakit($id)->getArrayCopy();
            echo json_encode($response,JSON_PRETTY_PRINT);
        }
        else
        {
            header('Content-type:application/json');
            http_response_code(404);

            $body["code"]=404;
            $body["message"]="Not Found";
            $error["errors"] = $body;

            echo json_encode($error,JSON_PRETTY_PRINT);
        }
    }
    else
    {
        header('Content-type:application/json');
        http_response_code(404);
     
        $body["code"]=404;
        $body["message"]="Not Found";
        $error["errors"] = $body;
        
        echo json_encode($error,JSON_PRETTY_PRINT);
    }
?>