<?php


class Student extends Database
{
    protected $table = "students";


    /**
     * @param $name
     * @param $board
     * @param $grades
     *
     * This method inserting data of student
     */

    public function create($name, $board, $grades)
    {

        $this->query("INSERT INTO students(name, board, grades)VALUES( :name, :board, :grades)");

        $this->bind(":name", $name);
        $this->bind(':board', $board);
        $this->bind(':grades', $grades);

        $this->execute();
    }


    /**
     * @param $id
     * This method is return Student
     */

    public function findStudent($id)
    {
       return $this->find($id);
    }


    public function update($average, $result, $id)
    {
        $this->query("UPDATE students SET  average = :average,
                            result = :result WHERE id = :id ");

        $this->bind(":average", $average);
        $this->bind(":result", $result);
        $this->bind(":id", $id);


       $this->execute();
    }

    /**
     * @param $grades
     * This method returns average grade
     */

    public static function average_grade($grades)
    {
        $sum = 0;
        $array = explode(',', $grades);

        foreach ($array as $value){

            $sum += $value;
        }

       return  $result = $sum / count($array);
    }


    /**
     * @param $name
     * @param $board
     * @param $grades
     * @param $student_grades
     * This method validate student
     */
    public static function validate($name, $board, $grades, $student_grades)
    {
        $errors = [];
        $student = new Student();

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


    public static function returnedStudent($id)
    {
        return $id;
    }



}