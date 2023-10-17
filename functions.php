<?php

require 'inc/dbcon.php';
 
function error422($message){
    $data = [
        'status' => 422,
        'message' => $message,
    ];
    header('HTTP/1.0 422 Unprocessable Entity');
    return json_encode($data);
    exit();
}

//students=========================
function getStudentList(){
    global $conn;

   $query = "SELECT * FROM students";
   $query_run = mysqli_query($conn, $query);

   if($query_run){

        if(mysqli_num_rows($query_run) > 0){

            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

            $data = [
                'status' => 200,
                'message' => 'Student List Fetched Successfully',
                'data' => $res,
            ];
            header('HTTP/1.0 200 Student List Fetched Successfully');
            return json_encode($data);

        }else{
            $data = [
                'status' => 404,
                'message' => 'No student Found'
            ];
            header('HTTP/1.0 200 No student Found');
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

function storeStudent($studentInput){
    global $conn;

    if($studentInput){
        $name = mysqli_real_escape_string($conn, $studentInput["student_name"]);
        $email = mysqli_real_escape_string($conn, $studentInput["email"]);
        $phone = mysqli_real_escape_string($conn, $studentInput["phone"]);
        $level = mysqli_real_escape_string($conn, $studentInput["level"]);
        $department = mysqli_real_escape_string($conn, $studentInput["department"]);

        $timestamp = time();
        $student_code = 'STU-'.str_shuffle(substr($timestamp, 0, 6));

        $courses = array();

        if(empty(trim($name))){

            return error422("The name is empty");
        }elseif(empty(trim($email))){
            
            return error422("The email is empty");
        }elseif(empty(trim($phone))){
            
            return error422("The phone is empty");
        }elseif(empty(trim($level))){
            
            return error422("The level is empty");
        }elseif(empty(trim($department))){
            
            return error422("The department is empty");
        }else{
            $query = "INSERT INTO students (student_name, email, phone, student_code, level, department) VALUES ('$name', '$email', '$phone', '$student_code', '$level', '$department');";

            $result = mysqli_query($conn, $query);
            if($result){
                $data = [
                    'status' => 201,
                    'message' => 'Created'
                ];
                header('HTTP/1.0 201 Record created successfully.');
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

function getStudent($studentParams){
    global $conn;

    if($studentParams['id'] == null){
       
        return error422('Enter your student id');
    }

    $studentId = mysqli_real_escape_string($conn, $studentParams['id']);

    $query = "SELECT * FROM students WHERE id='$studentId' LIMIT 1";
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

function updateStudent($studentInput, $studentParams){
    global $conn;

    if(empty($studentParams['id'])){

        return error422("The id is empty");
    }elseif($studentParams['id'] == null){

        return error422("The id cannot be null");
    }

    $studentId = mysqli_real_escape_string($conn, $studentParams['id']);
    $name = mysqli_real_escape_string($conn, $studentInput['student_name']);
    $email = mysqli_real_escape_string($conn, $studentInput['email']);
    $phone = mysqli_real_escape_string($conn, $studentInput['phone']);

    if(empty(trim($name))){

        return error422('Enter your name');
    }elseif(empty(trim($email))){

        return error422('Enter your email');
    }elseif(empty(trim($phone))){

        return error422('Enter your phone');
    }else{
        
        $query = "UPDATE students SET student_name = '$name', email = '$email', phone = '$phone' WHERE id = '$studentId' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if($result){
           
            $data = [
                'status' => 200,
                'message' => 'Student updated successfully',
            ];
            header('HTTP/1.0 Student updated successfully');
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

function deleteStudent($studentParams){
    global $conn;
    $studentId = $studentParams['id'];

    if(!isset($studentId)){
        
        return error422('No id found in url');
    }elseif($studentId == null){

        return error422('Enter the student id');
    }

    $query = "DELETE FROM students WHERE id ='$studentId' LIMIT 1";
    $result = mysqli_query($conn, $query);
    
    if($result){
        $data = [
            'status' => 200,
            'message' => 'Student deleted Successfully',
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

//lecturers===========================
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
        $email = mysqli_real_escape_string($conn, $lecturerInput["lecturer_email"]);
        $phone = mysqli_real_escape_string($conn, $lecturerInput["phone"]);


        $courses = ['one', 'two', 'three'];


        //comment out the line above and uncomment the block below when this api is being consumed.

        // if(isset($_POST['course_list'])){

        //     $course_list = $_POST['course_list'];

        //     foreach ($course_list as $values) {
        //         array_push($courses, $values);
        //         echo $values;
        //     }
        // }
        
        $courses = serialize($courses);

        if(empty(trim($name))){

            return error422("The name is empty");
        }elseif(empty(trim($email))){
            
            return error422("The email is empty");
        }elseif(empty(trim($phone))){
            
            return error422("The phone is empty");
        }else{
            $query = "INSERT INTO lecturers (lecturer_name, lecturer_email, phone, courses) VALUES ('$name', '$email', '$phone', '$courses');";

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
            // $data = $data['data']['courses'];
            
            header('HTTP/1.0 200 Success');
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
    $email = mysqli_real_escape_string($conn, $lecturerInput['lecturer_email']);
    $phone = mysqli_real_escape_string($conn, $lecturerInput['phone']);

    $courses = ['one', 'two', 'three'];

    //comment out the line above and uncomment the block below when this api is being consumed.
        

    // if(isset($_POST['course_list'])){
    //     $course_list = $_POST['course_list'];

    //     foreach ($course_list as $values) {
    //         array_push($courses, $values);
    //         echo $values;
    //     }
    // }

    $courses = serialize($courses);
  
    if(empty(trim($name))){

        return error422('Enter your name');
    }elseif(empty(trim($email))){

        return error422('Enter your email');
    }elseif(empty(trim($phone))){

        return error422('Enter your phone');
    }else{
        
        $query = "UPDATE lecturers SET lecturer_name = '$name', lecturer_email = '$email', phone = '$phone', courses = '$courses' WHERE id = '$lecturerId' LIMIT 1";
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

function myCourseList($courseParams){
    global $conn;

    if($courseParams['id'] == null){
       
        return error422('Enter your lecturer id');
    }

    $lecturerId = mysqli_real_escape_string($conn, $courseParams['id']);

    // $lecturerId = 7;

   $query = "SELECT courses FROM lecturers WHERE id = '$lecturerId'";
   $query_run = mysqli_query($conn, $query);

   if($query_run){

        if(mysqli_num_rows($query_run) > 0){

            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

            $data = [
                'status' => 200,
                'message' => 'Lecturer List Fetched Successfully',
                'data' => $res,
            ];

            // $data = $data['data'][0]['courses'];

            header('HTTP/1.0 200 Lecturer List Fetched Successfully');
            return json_encode($data);
            return($data);

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

function assignCourse($lecturerInput, $lecturerParams){
    global $conn;

    if(empty($lecturerParams['id'])){

        return error422("The id is empty");
    }elseif($lecturerParams['id'] == null){

        return error422("The id cannot be null");
    }

    $lecturerId = mysqli_real_escape_string($conn, $lecturerParams['id']);
   
    $courses = ['one', 'two'];

    //comment out the line above and uncomment the block below when this api is being consumed.
        
    // if(isset($_POST['course_list'])){
    //     $course_list = $_POST['course_list'];

    //     foreach ($course_list as $values) {
    //         array_push($courses, $values);
    //         echo $values;
    //     }
    // }

    $courses = serialize($courses);
  
        
    $query = "UPDATE lecturers SET courses = '$courses' WHERE id = '$lecturerId' LIMIT 1";
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

///save document

// function uploadFile(){
//     $file = $_FILES["file"];
//     move_uploaded_file($file["tmp_name"], "uploads/".$file["name"]);
//     header( "refresh:5;url=index.php" );

// }

function uploadFile(){
    global $conn;
    $file = $_FILES["file"];

    if ($_FILES["file"]["error"] !== UPLOAD_ERR_OK) {

        switch ($_FILES["file"]["error"]) {
            case UPLOAD_ERR_PARTIAL:
                exit('File only partially uploaded');
                break;
            case UPLOAD_ERR_NO_FILE:
                exit('No file was uploaded');
                break;
            case UPLOAD_ERR_EXTENSION:
                exit('File upload stopped by a PHP extension');
                break;
            case UPLOAD_ERR_FORM_SIZE:
                exit('File exceeds MAX_FILE_SIZE in the HTML form');
                break;
            case UPLOAD_ERR_INI_SIZE:
                exit('File exceeds upload_max_filesize in php.ini');
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                exit('Temporary folder not found');
                break;
            case UPLOAD_ERR_CANT_WRITE:
                exit('Failed to write file');
                break;
            default:
                exit('Unknown upload error');
                break;
        }
    }else{
        // Reject uploaded file larger than 1MB
        if ($_FILES["file"]["size"] > 1048576) {
            exit('File too large (max 1MB)');
        }
        if($_FILES["file"]["size"] < 1048576){
            // Use fileinfo to get the mime type
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mime_type = $finfo->file($_FILES["file"]["tmp_name"]);

            $mime_types = ["application/pdf", "image/gif", "image/png", "image/jpeg"];
                    
            if ( ! in_array($_FILES["file"]["type"], $mime_types)) {
                exit("Invalid file type");
            }

            // Replace any characters not \w- in the original filename
            $pathinfo = pathinfo($_FILES["file"]["name"]);

            $base = $pathinfo["filename"];

            $base = preg_replace("/[^\w-]/", "_", $base);

            $filename = $base . "." . $pathinfo["extension"];
            
            $stud_no = $_POST['student_num'];

            if(!file_exists($stud_no)){
                mkdir($stud_no, 0777);
            }
            $destination = __DIR__ . '/' . $stud_no . '/' . $filename;
            
            // Add a numeric suffix if the file already exists
            $i = 1;

            while (file_exists($destination)) {

                $filename = $base . "($i)." . $pathinfo["extension"];
                $destination = __DIR__ . '/' . $stud_no . '/' . $filename;
                  $i++;
            }

            if ( ! move_uploaded_file($_FILES["file"]["tmp_name"], $destination)) {

                exit("Can't move uploaded file");

            }

            //this block of code gets the url of the file
            //This gets all the other information from the form
            $my_filename=basename( $_FILES['file']['tmp_name']);
            

            //Writes the Filename to the server
            if(move_uploaded_file($_FILES['file']['tmp_name'], $destination)) {
                //Tells you if its all ok
                echo "The file ". basename( $_FILES['file']['name']). " has been uploaded, and your information has been added to the directory";
                // Connects to your Database
                mysql_connect("localhost", "root", "Totalchild6471!") or die(mysql_error()) ;
                mysql_select_db("campus_drive") or die(mysql_error()) ;

                //Writes the information to the database
                mysql_query("INSERT INTO docs (file_name)
                VALUES ('$my_filename')") ;
            } else {
                //Gives and error if its not
                echo "Sorry, there was a problem uploading your file.";
            }
            //this block of code gets the url of the file

            echo "File uploaded to your directory successfully.";

            $data = [
                'status' => 201,
                'file_name' => $filename,
                'file_type' => $pathinfo["extension"],
                'location' => $destination, 
                'message' => 'Uploaded successfully'
            ];
            header('HTTP/1.0 201 File uploaded successfully.');
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
};

//students=========================
function getCourseList(){
    global $conn;

   $query = "SELECT * FROM courses";
   $query_run = mysqli_query($conn, $query);

   if($query_run){

        if(mysqli_num_rows($query_run) > 0){

            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

            $data = [
                'status' => 200,
                'message' => 'Course List Fetched Successfully',
                'data' => $res,
            ];
            header('HTTP/1.0 200 Course List Fetched Successfully');
            return json_encode($data);

        }else{
            $data = [
                'status' => 404,
                'message' => 'No course Found'
            ];
            header('HTTP/1.0 200 No course Found');
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

function createCourse($inputData){
    global $conn;

    if($inputData){
        $course_title = mysqli_real_escape_string($conn, $inputData["course_title"]);
        $course_code = mysqli_real_escape_string($conn, $inputData["course_code"]);
        $lecturer = mysqli_real_escape_string($conn, $inputData["lecturer"]);

        if(empty(trim($course_title))){

            return error422("The Course title is empty");
        }elseif(empty(trim($course_code))){
            
            return error422("The Course code is empty");
        }elseif(empty(trim($lecturer))){
            
            return error422("The lecturer is empty");
        }else{
            $query = "INSERT INTO courses (course_title, course_code, lecturer) VALUES ('$course_title', '$course_code', '$lecturer');";

            $result = mysqli_query($conn, $query);
            if($result){
                $data = [
                    'status' => 201,
                    'message' => 'Created'
                ];
                header('HTTP/1.0 201 Course created successfully.');
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

function getCourse($courseParams){
    global $conn;

    if($courseParams['id'] == null){
       
        return error422('Enter your course id');
    }

    $courseId = mysqli_real_escape_string($conn, $courseParams['id']);

    $query = "SELECT * FROM courses WHERE id='$courseId' LIMIT 1";
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
            return error422('No course found');
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

function updateCourse($inputData, $courseParams){
    global $conn;

    if(empty($courseParams['id'])){

        return error422("The id is empty");
    }elseif($courseParams['id'] == null){

        return error422("The id cannot be null");
    }

    $courseId = mysqli_real_escape_string($conn, $courseParams['id']);
    $course_title = mysqli_real_escape_string($conn, $inputData['course_title']);
    $course_code = mysqli_real_escape_string($conn, $inputData['course_code']);
    $lecturer = mysqli_real_escape_string($conn, $inputData['lecturer']);

    if(empty(trim($course_title))){

        return error422('Enter course title');
    }elseif(empty(trim($course_code))){

        return error422('Enter course code');
    }elseif(empty(trim($lecturer))){

        return error422('Enter lecturer');
    }else{
        
        $query = "UPDATE courses SET course_title = '$course_title', course_code = '$course_code', lecturer = '$lecturer' WHERE id = '$courseId' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if($result){
           
            $data = [
                'status' => 200,
                'message' => 'Course updated successfully',
            ];
            header('HTTP/1.0 Course updated successfully');
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

function deleteCourse($courseParams){
    global $conn;
    $courseId = $courseParams['id'];

    if(!isset($courseId)){
        
        return error422('No id found in url');
    }elseif($courseId == null){

        return error422('Enter the course id');
    }

    $query = "DELETE FROM courses WHERE id ='$courseId' LIMIT 1";
    $result = mysqli_query($conn, $query);
    
    if($result){
        $data = [
            'status' => 200,
            'message' => 'Course deleted Successfully',
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

//====level========
function getLevelList(){
    global $conn;

   $query = "SELECT * FROM levels";
   $query_run = mysqli_query($conn, $query);

   if($query_run){

        if(mysqli_num_rows($query_run) > 0){

            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

            $data = [
                'status' => 200,
                'message' => 'Level List Fetched Successfully',
                'data' => $res,
            ];
            header('HTTP/1.0 200 Level List Fetched Successfully');
            return json_encode($data);

        }else{
            $data = [
                'status' => 404,
                'message' => 'No level Found'
            ];
            header('HTTP/1.0 200 No level Found');
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

function createLevel($levelInput){
    global $conn;

    if($levelInput){
        $level = mysqli_real_escape_string($conn, $levelInput["level"]);
     

        if(empty(trim($level))){

            return error422("The level is empty");
        
        }else{
            $query = "INSERT INTO levels (level) VALUES ('$level');";

            $result = mysqli_query($conn, $query);
            if($result){
                $data = [
                    'status' => 201,
                    'message' => 'Created'
                ];
                header('HTTP/1.0 201 Level created successfully.');
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

function getLevel($levelParams){
    global $conn;

    if($levelParams['id'] == null){
       
        return error422('Enter your level id');
    }

    $levelId = mysqli_real_escape_string($conn, $levelParams['id']);

    $query = "SELECT * FROM levels WHERE id='$levelId' LIMIT 1";
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
//====department========
function getDepartmentList(){
    global $conn;

   $query = "SELECT * FROM department";
   $query_run = mysqli_query($conn, $query);

   if($query_run){

        if(mysqli_num_rows($query_run) > 0){

            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

            $data = [
                'status' => 200,
                'message' => 'Department List Fetched Successfully',
                'data' => $res,
            ];
            header('HTTP/1.0 200 Department List Fetched Successfully');
            return json_encode($data);

        }else{
            $data = [
                'status' => 404,
                'message' => 'No department Found'
            ];
            header('HTTP/1.0 200 No department Found');
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

function createDepartment($deptInput){
    global $conn;

    if($deptInput){
        $dept = mysqli_real_escape_string($conn, $deptInput["department"]);
     

        if(empty(trim($dept))){

            return error422("The department is empty");
        
        }else{
            $query = "INSERT INTO department (department) VALUES ('$dept');";

            $result = mysqli_query($conn, $query);
            if($result){
                $data = [
                    'status' => 201,
                    'message' => 'Created'
                ];
                header('HTTP/1.0 201 Department created successfully.');
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

function getDepartment($deptParams){
    global $conn;

    if($deptParams['id'] == null){
       
        return error422('Enter your dept id');
    }

    $deptId = mysqli_real_escape_string($conn, $deptParams['id']);

    $query = "SELECT * FROM department WHERE id='$deptId' LIMIT 1";
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

function trashFile($inputData, $fileParams){
    global $conn;

    // var_dump($inputData['obj']['id']);die;
    // if(empty($fileParams['id'])){
    if(empty($inputData['obj']['id'])){

        return error422("The id is empty");
    }elseif($inputData['obj']['id'] == null){

        return error422("The id cannot be null");
    }

    $fileId = mysqli_real_escape_string($conn, $inputData['obj']['id']);

    if(empty(trim($fileId))){


        return error422('Enter your file id');
    }else{
        
        $query = "UPDATE docs SET trash = 1 WHERE id = '$fileId' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if($result){
           
            $data = [
                'status' => 200,
                'message' => 'File trashed successfully',
            ];
            header('HTTP/1.0 200 File trashed successfully');
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
function deleteFile($inputData, $fileParams){
    global $conn;
    var_dump($inputData);
    // echo("000000\n");
    // var_dump($fileParams);die();
    $fileId = $inputData['obj']['id'];

    if(!isset($fileId)){
        
        return error422('No id found in url');
    }elseif($fileId == null){

        return error422('Enter the file id');
    }

    $query = "DELETE FROM docs WHERE id ='$fileId' LIMIT 1";
    $result = mysqli_query($conn, $query);
    
    if($result){
        $data = [
            'status' => 200,
            'message' => 'File deleted Successfully',
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
function deleteFile2($inputData, $fileParams){
    global $conn;

    // var_dump($inputData['obj']['id']);die;
    // if(empty($fileParams['id'])){
    if(empty($inputData['obj']['id'])){

        return error422("The id is empty");
    }elseif($inputData['obj']['id'] == null){

        return error422("The id cannot be null");
    }

    $fileId = mysqli_real_escape_string($conn, $inputData['obj']['id']);

    if(empty(trim($fileId))){


        return error422('Enter your file id');
    }else{
        
        $query = "delete from docs SET WHERE id = '$fileId' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if($result){
           
            $data = [
                'status' => 200,
                'message' => 'File deleted successfully',
            ];
            header('HTTP/1.0 200 File deleted successfully');
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

function rename_file($inputData, $fileParams){
    global $conn;

    // var_dump($inputData['obj']);die;
    // if(empty($fileParams['id'])){
    if(empty($inputData['obj']['id'])){

        return error422("The id is empty");
    }elseif($inputData['obj']['id'] == null){

        return error422("The id cannot be null");
    }

    $fileId = mysqli_real_escape_string($conn, $inputData['obj']['id']);
    $file_name = mysqli_real_escape_string($conn, $inputData['obj']['file_name']);

    if(empty(trim($fileId))){


        return error422('Enter your file id');
    }else{
        // echo "Workign";
        $query = "UPDATE docs SET file_name = '$file_name' WHERE id = '$fileId' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if($result){
           
            $data = [
                'status' => 200,
                'message' => 'File renamed successfully',
            ];
            header('HTTP/1.0 200 File renamed successfully');
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
function add_to_favorites($inputData, $fileParams){
    global $conn;

    // var_dump($inputData['obj']['id']);die;
    // if(empty($fileParams['id'])){
    if(empty($inputData['obj']['id'])){

        return error422("The id is empty");
    }elseif($inputData['obj']['id'] == null){

        return error422("The id cannot be null");
    }

    $fileId = mysqli_real_escape_string($conn, $inputData['obj']['id']);

    if(empty(trim($fileId))){


        return error422('Enter your file id');
    }else{
        
        $query = "UPDATE docs SET favourite = 1 WHERE id = '$fileId' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if($result){
           
            $data = [
                'status' => 200,
                'message' => 'File restored successfully',
            ];
            header('HTTP/1.0 200 File restored successfully');
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

function remove_from_favorites($inputData, $fileParams){
    global $conn;

    // var_dump($inputData['obj']['id']);die;
    // if(empty($fileParams['id'])){
    if(empty($inputData['obj']['id'])){

        return error422("The id is empty");
    }elseif($inputData['obj']['id'] == null){

        return error422("The id cannot be null");
    }

    $fileId = mysqli_real_escape_string($conn, $inputData['obj']['id']);

    if(empty(trim($fileId))){


        return error422('Enter your file id');
    }else{
        
        $query = "UPDATE docs SET favourite = 0 WHERE id = '$fileId' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if($result){
           
            $data = [
                'status' => 200,
                'message' => 'File restored successfully',
            ];
            header('HTTP/1.0 200 File restored successfully');
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


function restoreFile($inputData, $fileParams){
    global $conn;

    // var_dump($inputData['obj']['id']);die;
    // if(empty($fileParams['id'])){
    if(empty($inputData['obj']['id'])){

        return error422("The id is empty");
    }elseif($inputData['obj']['id'] == null){

        return error422("The id cannot be null");
    }

    $fileId = mysqli_real_escape_string($conn, $inputData['obj']['id']);

    if(empty(trim($fileId))){


        return error422('Enter your file id');
    }else{
        
        $query = "UPDATE docs SET trash = 0 WHERE id = '$fileId' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if($result){
           
            $data = [
                'status' => 200,
                'message' => 'File restored successfully',
            ];
            header('HTTP/1.0 200 File restored successfully');
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

function forgot_password($inputData, $userParams){
    global $conn;

    if(empty($userParams['id'])){

        return error422("The id is empty");
    }elseif($userParams['id'] == null){

        return error422("The id cannot be null");
    }

    $studentId = mysqli_real_escape_string($conn, $userParams['id']);
    // $name = mysqli_real_escape_string($conn, $inputData['student_name']);
    // $email = mysqli_real_escape_string($conn, $inputData['email']);
    $password = $userParams['confirm_password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
   
    if(empty($password)){

        return error422('Enter your new password');
    }else{
        
        $query = "UPDATE users SET password = '$password' WHERE id = '$studentId' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if($result){
           
            $data = [
                'status' => 200,
                'message' => 'Student updated successfully',
            ];
            header('HTTP/1.0 Student updated successfully');
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
?>