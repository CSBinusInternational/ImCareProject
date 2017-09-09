<?php
    require_once "../function/config.php";
    require_once "../function/koneksi.php";
    require_once "../dao/ArtikelDao.php";

    if ($_SERVER['REQUEST_METHOD'] === 'GET') 
    {
        $artikeldao = new ArtikelDao();
        if(isset($_GET['kdpenyakit']))
        {
            $kdpenyakit = $_GET['kdpenyakit'];
            $response = $artikeldao->get_artikel_by_kdpenyakit($kdpenyakit);
            if($response != null && isset($response))
            {
                header('Content-type:application/json');
                http_response_code(200);
                echo json_encode($response,JSON_PRETTY_PRINT);
            }
            else
            {
                http_response_code(400);
            }
        }
        else
        {
            header('Content-type:application/json');
            http_response_code(200);

            $response = $artikeldao->get_all_artikel()->getArrayCopy();
            
            echo json_encode($response,JSON_PRETTY_PRINT);
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