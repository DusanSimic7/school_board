<?php

require_once "autoload.php";

$student = new Student();

if(isset($_POST['add_student'])){

    $name = $_POST['name'];
   $board = $_POST['board'];
   $grades = $_POST['grades'];
   $student_grades = explode(',', $_POST['grades']);


  Student::validate($name, $board, $grades, $student_grades);


}

if(isset($_GET['student'])){

   $id = $_GET['student'];

   $student_data = $student->findStudent($id);

    $student_average = Student::average_grade($student_data->grades);

    $fail = 'Fail';
    $pass = 'Pass';

    if($student_data->board == 'CSM'){

        if($student_average >= 7){

           $updated_student = $student->update($student_average, $pass, $student_data->id);

        }else{

           $updated_student = $student->update($student_average, $fail, $student_data->id);
        }

    }


   $st_id = Student::returnedStudent($id);

   $new_student = $student->find($st_id);

    $dataJSON = json_encode($new_student);

    echo $dataJSON;

}
