<h1>Edit Student</h1>
<form method='post' action='<?php if ($student->getId()) echo "/traningAHT/MVC/MVC_Doctrine/src/Webroot/students/edit/" . $student->getId();?>'>
    <div class="form-group">
        <label for="title">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter a name" name="name" value ="<?php if ($student->getName()) echo $student->getName();?>">
    </div>

    <div class="form-group">
        <label for="age">Age</label>
        <input type="text" class="form-control" id="age" placeholder="Enter a age" name="age" value ="<?php if ($student->getAge()) echo $student->getAge();?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>