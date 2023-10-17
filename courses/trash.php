<?php

header('Allow-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: PUT');
header('Access-Control-Allow-Headers: Allow-Control-Allow-Origin, Content-Type, Authorization, X-Request-With');

include ('../functions.php');

$requestMethod = $_SERVER['REQUEST_METHOD'];

if($requestMethod == 'PUT'){

    $inputData = json_decode(file_get_contents("php://input"), true);
    // if(empty($inputData)){

        // $trashFile = trashFile($_POST, $_GET);
        // echo $trashFile;
        
        // }else{
            
        $trashFile = trashFile($inputData, $_POST);
        echo $trashFile;
        // var_dump($inputData);die();

    // }
}else{

    $data = [
        'status'=> 405,
        'message'=> 'Method not allowed'
    ];    
    header('HTTP/1.0 405 Method not allowed');
    echo json_encode($data);
}

?>