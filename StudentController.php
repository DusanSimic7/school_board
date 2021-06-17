<?php

require_once "autoload.php";

$student = new Student();

if(isset($_POST['add_student'])){
    //    var_dump('tu je');

    $errors=[];

    $name = $_POST['name'];
   $board = $_POST['board'];
   $grades = $_POST['grades'];

   if(empty($name)){
       $errors['name'] = 'Name is required';
   }
    if(empty($board)){
        $errors['board'] = 'Board is required';
    }
    if(empty($grades)){
        $errors['grades'] = 'Grades is required';
    }

    if(count($errors) > 0){
        include_once "index.php";
    }else{
        $student->create($name, $board, $grades);
        header("Location:index.php");

    }


}

//if(isset($_GET['student'])){
//
//
//
//    var_dump('tu je');
//
//    $student->findUser($id);
//
//
//}
