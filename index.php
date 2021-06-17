<?php


require_once "autoload.php";





?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<body>


<div class="container p-5">



<h1 class="text-center mb-5">Add new student</h1>

<div class="row">
    <div class="col-12 col-sm-6 col-md-6-col-lg-6">
        View all students:

    </div>

    <div class="col-12 col-sm-6 col-md-6-col-lg-6">
        <div class="text-center">

            <form action="StudentController.php" method="post">

                <div class="mb-5">
                    <label for="">Student name</label><br>
                    <input type="text" name="name">
                    <br><?php if(isset($errors['name'])) echo "<span class='text-danger'>".$errors['name']."</span>" ?><br>

                </div>

                <label for="">Choose student board</label>
                <div class="mb-5">
                    CSM <input type="radio" name="board" value="1">
                    CSMB<input type="radio" name="board" value="2">
                    <br><?php if(isset($errors['board'])) echo "<span class='text-danger'>".$errors['board']."</span>" ?><br>

                </div>

                <div>
                    <label for="">Student grades</label><br>
                    <input type="text" name="grades">
                    <br><?php if(isset($errors['grades'])) echo "<span class='text-danger'>".$errors['grades']."</span>" ?><br>

                </div>

                <br><br> <input type="submit" name="add_student" value="Add student">
            </form>
        </div>
    </div>

</div>

</div>

</body>
</html>
