<?php
session_start();

$errors = ['firstName' => '', 'secondName' => '', 'email' => '', 'password' => '', 'date' => '', 'color'=>'',
'gender'=> '', 'department'=> ''];
// sanitize input
function sanitize($data){
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);
   
    return $data;
   }

if(isset($_POST['submit'])){
    // header('location:dashboard.php');
    // print_r($_POST);
    // validation for first Name
    if(empty($_POST['firstName'])){
        $errors['firstName'] = '<p><strong>Please enter a first Name!</strong></p>';
    }else{
         $first_name = sanitize(filter_var($_POST['firstName'], FILTER_SANITIZE_STRING));
    }
    // // validation for second Name
    if(empty($_POST['secondName'])){
        $errors['secondName'] = '<p><strong>Please enter your second name!</strong></p>';
    }else{
         $second_name = sanitize(filter_var($_POST['secondName'], FILTER_SANITIZE_STRING));
    }
    // validation for email
    if(empty($_POST['email'])){
        $errors['email']= '<p><strong>Please enter your email address!</strong></p>';
    }else{
         $email = sanitize(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $errors['email'] = '<p><strong>Please enter a valid email address!</strong></p>';
        }
    }
    // // validation for password
    if(empty($_POST['password'])){
        $errors['password'] = '<p><strong>Please enter a Password!</strong></p>';
    }else{
        $password = $_POST['password'];
    }

    // // validation for D.O.B
    if(empty($_POST['date'])){
        $errors['date'] = '<p><strong>Please enter a valid date!</strong></p>';
    }else{
         $date = $_POST['date'];
    }

    // // validation for color
    if(empty($_POST['color'])){
        $errors['color'] = '<p><strong>Please select a valid color!</strong></p>';
    }else{
        $color = $_POST['color'];
    }

    // validation for gender
    if(empty($_POST['gender']) || count($_POST['gender']) > 1){
        $errors['gender'] = '<p><strong>Please select one gender</strong></p>';
    }else{
        $gender = $_POST['gender'];
    }

    // validation for department
    if(($_POST['department']) === ""){
        $errors['department'] = '<p><strong>Please select a Department!</strong></p>';
    }else{
         $department = $_POST['department'];
    }

       
    if(array_filter($errors)){
       

        // success redirect
        
    }else{
        $_SESSION['first_name'] = $first_name;
        $_SESSION['second_name'] = $second_name;
        $_SESSION['email'] = $email;
        $_SESSION['date'] = $date;
        $_SESSION['color'] = $color;
        $_SESSION['gender'] = $gender;
        $_SESSION['department'] = $department;
        
            header('location:dashboard.php');
        
        
    }  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up form</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/5435703326.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <div id="card">
        <div id="card-header">
            <h2>Create Account</h2>
        </div>
        <div id="card-body">
            <form action="signup.php" method="POST">
                <div class="form-group">
                <label for="#">First Name</label>
                    <input type="text" placeholder="enter Username"  name="firstName">
                    <div class="red"><?= $errors['firstName']; ?></div>
                </div>
                
                <div class="form-group">
                <label for="#">Second Name</label>
                    <input type="text" placeholder="enter Username" name="secondName">
                    <div class="red"><?= $errors['secondName']; ?></div>
                </div>
                <div class="form-group">
                    <label for="#">Email</label>
                        <input type="text" placeholder="enter Email"  name="email">
                        <div class="red"><?= $errors['email']; ?></div>
                </div>
                <div class="form-group">
                    <label for="#">Password</label>
                        <input type="password" placeholder="enter Password" name="password" >
                        <div class="red"><?= $errors['password']; ?></div>
                </div>
                <div class="form-group">
                    <label for="#">Date of Birth(DOB)</label>
                        <input type="date" id="date" name="date" >
                        <div class="red"><?= $errors['date']; ?></div>
                </div>
                <div class="form-group">
                    <label>Favorite Color</label><br>
                        <input type="color" name="color" value="" class="color">
                        <div class="red"><?= $errors['color']; ?></div>
                </div>
                <div class="form-group">
                    <label>Gender</label><br>
                    <input type="checkbox" id="gender1" name="gender[]" value="male" class="checkbox">
                    <label for="gender1">Male</label>
                    <input type="checkbox" id="gender2" name="gender[]" value="female" class="checkbox">
                    <label for="gender2">Female</label>
                    <div class="red"><?= $errors['gender']; ?></div>
                </div>
                <div class="form-group">
                    <label>Department</label><br>
                    <select name="department" id="department">
                        <option value="" checked>Please Select</option>
                        <option value="IT">IT</option>
                        <option value="HR">HR</option>
                        <option value="staff">STAFF</option>
                    </select>
                    <div class="red"><?= $errors['department']; ?></div>
                </div>
                <input type="submit" name="submit" class="submit-btn" value="submit">
            </form>
        </div>
    </div>
  </div>

</body>
</html>