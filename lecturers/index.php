<?php

require 'inc/dbcon.php';
 

function getLecturerList(){
    global $conn;

   $query = "SELECT * FROM lecturers";
   $query_run = mysqli_query($conn, $query);

   if($query_run){

        if(mysqli_num_rows($query_run) > 0){

            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

            $data = [
                'status' => 200,
                'message' => 'Lecturer List Fetched Successfully',
                'data' => $res,
            ];
            header('HTTP/1.0 200 Lecturer List Fetched Successfully');
            return json_encode($data);

        }else{
            $data = [
                'status' => 404,
                'message' => 'No lecturer Found'
            ];
            header('HTTP/1.0 200 No lecturer Found');
            return json_encode($data);
        }

   }else{
    $data = [
        'status' => 500,
        'message' => 'Internal Server Error'
    ];
    header('HTTP/1.O 500 Internal Server Error');
    return json_encode($data);
   }
}

function storeLecturer($lecturerInput){
    global $conn;

    if($lecturerInput){
        $name = mysqli_real_escape_string($conn, $lecturerInput["lecturer_name"]);
        $email = mysqli_real_escape_string($conn, $lecturerInput["email"]);
        $phone = mysqli_real_escape_string($conn, $lecturerInput["phone"]);

        if(empty(trim($name))){

            return error422("The name is empty");
        }elseif(empty(trim($email))){
            
            return error422("The email is empty");
        }elseif(empty(trim($phone))){
            
            return error422("The phone is empty");
        }else{
            $query = "INSERT INTO lecturers (lecturer_name, email, phone) VALUES ('$name', '$email', '$phone');";

            $result = mysqli_query($conn, $query);
            if($result){
                $data = [
                    'status' => 201,
                    'message' => 'Created'
                ];
                header('HTTP/1.O 201 Record created successfully.');
                return json_encode($data);
            }else{
                $data = [
                    'status' => 500,
                    'message' => 'Internal Server Error'
                ];
                header('HTTP/1.0 500 Internal Server Error');
                return json_encode($data);
            }
        }
    }
};

function getLecturer($lecturerParams){
    global $conn;

    if($lecturerParams['id'] == null){
       
        return error422('Enter your lecturer id');
    }

    $lecturerId = mysqli_real_escape_string($conn, $lecturerParams['id']);

    $query = "SELECT * FROM lecturers WHERE id='$lecturerId' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if($result)
    {
        if(mysqli_num_rows($result) == 1){
            $res = mysqli_fetch_assoc($result);
            $data = [
                'status' => 200,
                'message' => 'Success',
                'data' => $res
            ];
            header('HTTP/1.O 200 Success');
            return json_encode($data);
        }else{
            return error422('No record found');
        }
    }else{
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error'
        ];
        header('HTTP/1.O 500 Internal Server Error');
        return json_encode($data);
    }
}

function updateLecturer($lecturerInput, $lecturerParams){
    global $conn;

    if(empty($lecturerParams['id'])){

        return error422("The id is empty");
    }elseif($lecturerParams['id'] == null){

        return error422("The id cannot be null");
    }

    $lecturerId = mysqli_real_escape_string($conn, $lecturerParams['id']);
    $name = mysqli_real_escape_string($conn, $lecturerInput['lecturer_name']);
    $email = mysqli_real_escape_string($conn, $lecturerInput['email']);
    $phone = mysqli_real_escape_string($conn, $lecturerInput['phone']);

    if(empty(trim($name))){

        return error422('Enter your name');
    }elseif(empty(trim($email))){

        return error422('Enter your email');
    }elseif(empty(trim($phone))){

        return error422('Enter your phone');
    }else{
        
        $query = "UPDATE lecturers SET lecturer_name = '$name', email = '$email', phone = '$phone' WHERE id = '$lecturerId' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if($result){
           
            $data = [
                'status' => 200,
                'message' => 'Lecturer updated successfully',
            ];
            header('HTTP/1.0 Lecturer updated successfully');
            echo json_encode($data);
        }else{
            
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error'
            ];
            header('HTTP/1.0 500 Internal Server Error');
            echo json_encode($data);
        }
    }
}

function deleteLecturer($lecturerParams){
    global $conn;
    $lecturerId = $lecturerParams['id'];

    if(!isset($lecturerId)){
        
        return error422('No id found in url');
    }elseif($lecturerId == null){

        return error422('Enter the lecturer id');
    }

    $query = "DELETE FROM lecturers WHERE id ='$lecturerId' LIMIT 1";
    $result = mysqli_query($conn, $query);
    
    if($result){
        $data = [
            'status' => 200,
            'message' => 'Lecturer deleted Successfully',
        ];
        header('HTTP/1.0 Success');
        return json_encode($data);
    }else{
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error'
        ];
        header('HTTPS/1.0 500 Internal Server Error');
        return json_encode($data);
    }
}
?>