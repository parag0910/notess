<?php
require ('config.php');

if(isset($_POST['submit'])) {

    $user = $_POST['username'];

    $dir ="Notes";

    if ($handle = opendir($dir.'/'.$user)) {
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != "..") {
                $thelist .= '<li><a href="' .$dir.'/'.$user.'/'. $file . '">' . $file . '</a></li>';
            }
        }
        closedir($handle);
    }
}
?>

    <html>
<head>
    <title>
        Notes Application
    </title>
    <script src="jquery.min.js" type="text/javascript"></script>
    <script src="bootstrap.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script>
        function trimfield(str)
        {
            return str.replace(/^\s+|\s+$/g,'');
        }
        function validate()
        {
            var obj1 = document.myForm.username;
            var obj2 = document.myForm.message;
            if(trimfield(obj1.value) == '')
            {
                alert("Please Provide Username!");
                obj1.focus();
                return false;
            }
            else if(trimfield(obj2.value) == '')
            {
                alert("Please Provide Message!");
                obj2.focus();
                return false;
            }
            else
                return true;
        }

    </script>
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <h3>Create your notes and save them</h3>
    </div>
    <div class="row">
        <div class="col-md-3">
            <p>View Your Saved Note..</p>
        </div>
    </div>
    <form method="post" name="myForm">
        <div class="row" style="padding-left: 30px;">
            <div class="col-md-3">
                <label for="username">UserName : </label>
            </div>
            <div class="col-md-6">
                <input type="text" name="username"  placeholder="username" required>
            </div>
        </div>
               <div class="row" style="padding-top:20px;padding-left: 30px;">
            <div class="col-md-3"></div>
            <div class="col-md-4">
                <button type="submit" name="submit" class="btn">List All Notes</button></div>
        </div>
    </form>
</div>



<div class="row"  style="padding-top:40px;padding-left: 530px;">
    <h1>List of files:</h1>
    <ul><?php echo $thelist; ?></ul>

</div>


<div class="row" style="padding-top:40px;padding-left: 530px;">
    <p> To add  your saved notes <a href="index.php">click here</a></p>
</div>

</body>
</html>