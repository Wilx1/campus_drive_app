<?php

header('Allow-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

include('../functions.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];

if($requestMethod == 'POST'){
    $inputData = json_decode(file_get_contents("php://input"), true);
    
    if(empty($inputData)){
        // echo $_POST['name'];
        $createDepartment = createDepartment($_POST);
    }else{
        // echo $inputData['name'];
        $createDepartment = createDepartment($inputData);
    }
    echo $createDepartment;

}else{
    $data = [
        'status' => 405,
        'message'=> $requestMethod . ' Method not allowed',
    ];
    header('HTTP/1.O 405 Method not allowed');
    echo json_encode($data);
}


?>