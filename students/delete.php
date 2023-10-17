<?php

header('Allow-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: DELETE');
header('Access-Control-Allow-Headers: Allow-Control-Allow-Origin, Access-Control-Allow-Headers, Content-Type');

include('../functions.php');

$requestMethod = $_SERVER['REQUEST_METHOD'];

if($requestMethod == 'DELETE'){

    $deleteStudent = deleteStudent($_GET);
    echo $deleteStudent;

}else{
    $data = [
        'status' => 405,
        'message' => 'Method not allowed',
    ];
    header('HTTP/1.0 405 Method not allowed');
    echo json_encode($data);
}

?>