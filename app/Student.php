<?php


class Student extends Database
{
    protected $table = "subjects";


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


    public function findUser($id)
    {
        $this->find($id);
    }



}