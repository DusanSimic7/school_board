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

    $array_grades = explode(',',$student_data->grades);



    $fail = 'Fail';
    $pass = 'Pass';

    if($student_data->board == 'CSM'){

        if($student_average >= 7){

           $updated_student = $student->update($student_average, $pass, $student_data->id);

        }else{

           $updated_student = $student->update($student_average, $fail, $student_data->id);
        }

        $st_id = Student::returnedStudent($id);

        $new_student = $student->find($st_id);

        $dataJSON = json_encode($new_student);

        echo $dataJSON;

    }else{
        if(count($array_grades) > 2){
            $grade_pass = [];
            foreach ($array_grades as $value){

                if($value > 8){
                    $grade_pass[] = $value;
                }
            }

            if(count($grade_pass) > 0){
                $updated_student = $student->update($student_average, $pass, $student_data->id);

            }else{
                $updated_student = $student->update($student_average, $fail, $student_data->id);

            }
        }

        $st_id = Student::returnedStudent($id);

        $new_student = $student->find($st_id);

        $xmlDoc = new DOMDocument();

        $root = $xmlDoc->appendChild($xmlDoc->createElement("user_info"));
        $root->appendChild($xmlDoc->createElement("Name", $new_student->name));
        $root->appendChild($xmlDoc->createElement("Board", $new_student->board));
        $root->appendChild($xmlDoc->createElement("Grades", $new_student->grades));
        $root->appendChild($xmlDoc->createElement("Average", $new_student->average));
        $root->appendChild($xmlDoc->createElement("Result", $new_student->result));


        header("Content-Type:text/plain");

        $xmlDoc->formatOutput = true;


        $file_name = str_replace(' ',  '', $new_student->name.'.xml');

        $xmlDoc->save("files/".$file_name);





        $feed = file_get_contents("files/".$file_name);
        $items = simplexml_load_string($feed);



        var_dump($items);

    }


//   $st_id = Student::returnedStudent($id);
//
//   $new_student = $student->find($st_id);
//
//    $dataJSON = json_encode($new_student);
//
//    echo $dataJSON;

}
