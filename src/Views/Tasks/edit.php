<h1>Edit task</h1>
<form method='post' action='<?php if (isset($task["id"])) echo "/traningAHT/MVC/AHT_MVC_EX00/src/Webroot/tasks/edit/" . $task["id"];?>'>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Enter a title" name="title" value ="<?php if (isset($task["title"])) echo $task["title"];?>">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" placeholder="Enter a description" name="description" value ="<?php if (isset($task["description"])) echo $task["description"];?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>