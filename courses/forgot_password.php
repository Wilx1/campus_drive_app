<?php

header('Allow-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: PUT');
header('Access-Control-Allow-Headers: Allow-Control-Allow-Origin, Content-Type, Authorization, X-Request-With');

include ('../functions.php');

$requestMethod = $_SERVER['REQUEST_METHOD'];

if($requestMethod == 'PUT'){

    $inputData = json_decode(file_get_contents("php://input"), true);

    if(empty($inputData)){

        $forgot_password = forgot_password($_POST, $_GET);
        echo $forgot_password;
        
    }else{
        
        $forgot_password = forgot_password($inputData, $_GET);
        echo $forgot_password;

    }
}else{

    $data = [
        'status'=> 405,
        'message'=> 'Method not allowed'
    ];    
    header('HTTP/1.O 405 Method not allowed');
    echo json_encode($data);
}

?>