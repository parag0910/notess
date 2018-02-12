<?php
require ('config.php');

      if(isset($_POST['submit'])){


          if (empty($_POST["username"])) {
              $nameErr = "Missing";
          }
          else {
              $user = $_POST['username'];
          }
          if (empty($_POST["message"])) {
              $messageErr = "Missing";
          }
          else {
              $message = $_POST['message'];
          }

          $dir ="Notes";
          if (!file_exists($dir.'/'.$user)) {
              mkdir($dir.'/'.$user, 0775, true);
          }
          $r = (count(scandir($dir.'/'.$user)))-1;

          $k = $r++;
          $filename =$user.$k;

          $myfile = fopen($dir.'/'.$user.'/'.$filename.'.txt', "a") or die("Unable to open file!");
          $txt = $message;
          fwrite($myfile, "\n". $txt);
          fclose($myfile);



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
			<p>Create your note..</p>
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
            <div class="col-md-3">
                <label for="message">Message : </label>
            </div>
			<div class="col-md-4">
			<textarea id="message" style="height: 240px;width:260px;padding: 20px;"  name="message" class="message" placeholder="write your message" required >
			</textarea>
		</div>
            </div>
	<div class="row" style="padding-top:20px;padding-left: 30px;">
		<div class="col-md-3"></div>
		<div class="col-md-4">		
			<button type="submit" onsubmit="validate();"  name="submit" class="btn">Create</button></div>
		</div>
            </form>
	</div>
	<div class="row" style="padding-top:40px;padding-left: 530px;">
		<p> To view your saved notes <a href="view.php">click here</a></p>
	</div>

</body>
</html>