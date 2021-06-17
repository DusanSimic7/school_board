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



}