<?php
    require_once "../function/config.php";
    require_once "../function/koneksi.php";
    require_once "../dao/PenyakitDao.php";

    if ($_SERVER['REQUEST_METHOD'] === 'GET') 
    {
        $penyakitDao = new PenyakitDao();
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $response = $penyakitDao->get_one_penyakit($id);
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

            $response = $penyakitDao->get_all_penyakit()->getArrayCopy();
            
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