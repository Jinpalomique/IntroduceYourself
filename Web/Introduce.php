<html>
<head>

<title> Introduce </title>
<h1 style="background-color:rgb(230,30,60)"> Introduce Yourself! </h1>

<!-- Div -->
<style>
textarea {
	resize: none;
}

textarea {
	resize: none;
}	

.error {color: #FF0000;}



</style>
</head>

<body>

<!-- Fillup form Personal Information --> 
<form action="/action_page.php">
<fieldset>
<legend> <h2 style="color:rgb(243,58,12);"> About Me </h2> </legend> <b>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $educationErr = "";
$name = $email = $gender = $comment = $education = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // Filtering 
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["education"])) {
    $education = "";
  } else {
    $education = test_input($_POST["education"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$education)) {
      $educationErr = "Invalid Education";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Education: <input type="text" name="education" size="40" value="<?php echo $education;?>">
  <span class="error"><?php echo $education;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $education;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>


</fieldset> </b>


<!-- Result incomplete-->
<input type="submit" value="Submit">

</form>

<!-- Fillup form Passion tab -->

<form action="/action_page.php">
<fieldset>
<legend> <h2 style="color:rgb(243,58,12);"> Passion </h2> </legend> <b>

<label for="sport">Sports </label>
<input type="text" id="sport" name="sport"> <br> <br>
<label for="favfood">Favorite Food </label> 
<input type="text" id="favfood" name="favfood"> <br> <br>
<label for="dream">Dream Job </label> 
<input type="text" id="dream" name="dream"> <br> <br>

<p> During Freetime </p>
<textarea id="freetime" name="freetime" rows="6" cols="60">
</textarea> <br> <br>

<p> Hobby </p>
<textarea id="hobby" name="hobby" rows="6" cols="60">
</textarea> <br> <br>

</fieldset> <b>

<!-- Result incomplete-->
<input type="submit" value="Submit">

</form>


<!--Home button-->
<p>
<button onclick="history.back()">Home</button>
</p>


</body>

</html>