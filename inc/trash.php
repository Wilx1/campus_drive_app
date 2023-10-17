<?php
session_start();
require_once "functions.php";
$info = [];
$info['success'] = 1;
$info['LOGGED_IN'] = 1;
$info['data_type'] = 'delete_row';
$info['success'] = false;
$info['LOGGED_IN'] = is_logged_in();
$info['data_type'] = $_POST['data_type'] ?? '';

// $_SESSION['CURRENT_USER']['username'] = 'admin';
// $_SESSION['CURRENT_USER']['id'] = 1;
// $_POST['data_type'] = "delete_row";

if(!$info['LOGGED_IN'] && ($_POST['data_type'] != 'user_signup' && $_POST['data_type'] != 'user_login')){
    echo json_encode($info);
    die;
}

// $info['username'] = $_SESSION['CURRENT_USER']['username'] ?? 'User';
$info['drive_occupied'] = get_drive_space($_SESSION['CURRENT_USER']['id']);
$info['drive_total'] = 1; //in gigabytes
// $info['drive_total'] = 500; //in megabytes

function is_logged_in(){
    if(!empty($_SESSION['CURRENT_USER']) && is_array($_SESSION['CURRENT_USER'])){
        return true;
    }
    return false;
}
// if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['data_type'])){

  
    global $conn;
    // if($_POST['data_type'] == "delete_row"){

    $id = addslashes($_POST['id']);
    // $file_type = addslashes($_POST['file_type']);
    $user_id = $_SESSION['CURRENT_USER']['id'];

    $sql = "select * from docs where id = '$id' limit 1";
    $row = query($sql);
    // if($row)
    // {
        // if($row['trash'] == 1)
        // {
        //     $query = "delete from docs where id = '$id' && user_id = '$user_id' limit 1";
            // $actually_deleted = true;
        // }else{
            $query = "update docs set trash = 1 where id = '$id' && user_id = '$user_id' limit 1";
        // }
    // }

    // $query = "UPDATE docs SET trash = 1 where id = '$id' && user_id ='$user_id' limit 1";
    $result = mysqli_query($conn, $query);
    
    if($result){

        $data = [
            'status' => 201,
            'message' => 'Trashed'
        ];
        header('HTTP/1.0 201 File trashed successfully.');
        return json_encode($data);
    }else{
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error'
        ];
        header('HTTP/1.0 500 Internal Server Error');
        return json_encode($data);
    }

    // $info['success'] = true;
    // }
// }

    // echo json_encode($data)
?>