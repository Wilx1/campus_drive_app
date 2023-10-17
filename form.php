<?php
$courses = [];
if(isset($_POST['course_list'])){
    $course_list = $_POST['course_list'];
    foreach ($course_list as $values) {
        array_push($courses, $values);
        echo $values;
    }
}

var_dump($courses);
?>