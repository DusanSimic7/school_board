<?php

require_once "autoload.php";

$student = new Student();

if(isset($_POST['add_student'])){
    //    var_dump('tu je');


//    var_dump($array);
//    die;
    $errors=[];

    $name = $_POST['name'];
   $board = $_POST['board'];
   $grades = $_POST['grades'];
   $student_grades = explode(',', $_POST['grades']);


    if(empty($name)){
       $errors['name'] = 'Name is required';
   }
    if(empty($board)){
        $errors['board'] = 'Board is required';
    }
    if(empty($grades)){
        $errors['grades'] = 'Grades is required';
    }

    if(count($student_grades) > 4){
        $errors['limit_grades'] = 'Student must have 1 or 4 grades';
    }
    foreach ($student_grades as $value){

        if($value < 6 or $value > 10){
            $errors['grades_rules'] = 'Student grades must be 6 - 10';
        }

    }



    if(count($errors) > 0){
        include_once "index.php";
    }else{
        $student->create($name, $board, $grades);
        header("Location:index.php");

    }


}

if(isset($_GET['student'])){

   $id = $_GET['student'];

   $data = $student->findStudent($id);

    var_dump($data);
    die;

}
