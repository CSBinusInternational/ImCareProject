<?php
    include_once "../function/config.php";
    include_once "../function/koneksi.php"; 
    require_once "../dao/UserDao.php";

    if ($_SERVER['REQUEST_METHOD'] === 'GET') 
    {
        $userDao = new UserDao();
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $response = $userDao->get_one_user($id);
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

            $response = $userDao->get_all_user()->getArrayCopy();
            
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