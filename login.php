<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login'])) {
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $sql ="SELECT ID FROM tbladmin WHERE UserName=:username and Password=:password";
    $query=$dbh->prepare($sql);
    $query-> bindParam(':username', $username, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0) {
        foreach ($results as $result) {
            $_SESSION['etmsaid']=$result->ID;
        }
        if(!empty($_POST["remember"])) {
            setcookie ("user_login",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
            setcookie ("userpassword",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
        } else {
            if(isset($_COOKIE["user_login"])) {
                setcookie ("user_login","");
                if(isset($_COOKIE["userpassword"])) {
                    setcookie ("userpassword","");
                }
            }
        }
        $_SESSION['login']=$_POST['username'];
        echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
    } else{
        echo "<script>alert('Invalid Details');</script>";
    }
}

if(isset($_POST['submit'])) {
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $newpassword=md5($_POST['newpassword']);
    $sql ="SELECT Email FROM tbladmin WHERE Email=:email and MobileNumber=:mobile";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    if($query -> rowCount() > 0) {
        $con="update tbladmin set Password=:newpassword where Email=:email and MobileNumber=:mobile";
        $chngpwd1 = $dbh->prepare($con);
        $chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
        $chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
        $chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
        $chngpwd1->execute();
        echo "<script>alert('Your Password successfully changed');</script>";
    } else {
        echo "<script>alert('Email id or Mobile no is invalid');</script>"; 
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Login Page</title>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

*{
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: 'Montserrat', sans-serif;
}

body{
background-color: #c9d6ff;
background: linear-gradient(to right, #e2e2e2, #c9d6ff);
display: flex;
align-items: center;
justify-content: center;
flex-direction: column;
height: 100vh;
}

.container{
background-color: #fff;
border-radius: 30px;
box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
position: relative;
overflow: hidden;
width: 768px;
max-width: 100%;
min-height: 480px;
}

.container p{
font-size: 14px;
line-height: 20px;
letter-spacing: 0.3px;
margin: 20px 0;
}

.container span{
font-size: 12px;
}

.container a{
color: #333;
font-size: 13px;
text-decoration: none;
margin: 15px 0 10px;
}

.container button{
background-color: #512da8;
color: #fff;
font-size: 12px;
padding: 10px 45px;
border: 1px solid transparent;
border-radius: 8px;
font-weight: 600;
letter-spacing: 0.5px;
text-transform: uppercase;
margin-top: 10px;
cursor: pointer;
}

.container button.hidden{
background-color: transparent;
border-color: #fff;
}

.container form{
background-color: #fff;
display: flex;
align-items: center;
justify-content: center;
flex-direction: column;
padding: 0 40px;
height: 100%;
}

.container input{
background-color: #eee;
border: none;
margin: 8px 0;
padding: 10px 15px;
font-size: 13px;
border-radius: 8px;
width: 100%;
outline: none;
}

.form-container{
position: absolute;
top: 0;
height: 100%;
transition: all 0.6s ease-in-out;
}

.sign-in{
left: 0;
width: 50%;
z-index: 2;
}

.container.active .sign-in{
transform: translateX(100%);
}

.ForgotPassword{
left: 0;
width: 50%;
opacity: 0;
z-index: 1;
}

.container.active .ForgotPassword{
transform: translateX(100%);
opacity: 1;
z-index: 5;
animation: move 0.6s;
}

@keyframes move{
0%, 49.99%{
opacity: 0;
z-index: 1;
}
50%, 100%{
opacity: 1;
z-index: 5;
}
}

.social-icons{
margin: 20px 0;
}

.social-icons a{
border: 1px solid #ccc;
border-radius: 20%;
display: inline-flex;
justify-content: center;
align-items: center;
margin: 0 3px;
width: 40px;
height: 40px;
}

.toggle-container{
position: absolute;
top: 0;
left: 50%;
width: 50%;
height: 100%;
overflow: hidden;
transition: all 0.6s ease-in-out;
border-radius: 150px 0 0 100px;
z-index: 1000;
}

.container.active .toggle-container{
transform: translateX(-100%);
border-radius: 0 150px 100px 0;
}

.toggle{
background-color: #512da8;
height: 100%;
background: linear-gradient(to right, #5c6bc0, #512da8);
color: #fff;
position: relative;
left: -100%;
height: 100%;
width: 200%;
transform: translateX(0);
transition: all 0.6s ease-in-out;
}

.container.active .toggle{
transform: translateX(50%);
}

.toggle-panel{
position: absolute;
width: 50%;
height: 100%;
display: flex;
align-items: center;
justify-content: center;
flex-direction: column;
padding: 0 30px;
text-align: center;
top: 0;
transform: translateX(0);
transition: all 0.6s ease-in-out;
}

.toggle-left{
transform: translateX(-200%);
}

.container.active .toggle-left{
transform: translateX(0);
}

.toggle-right{
right: 0;
transform: translateX(0);
}

.container.active .toggle-right{
transform: translateX(200%);
}
</style>
    <script type="text/javascript">
        function valid() {
            if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
                alert("New Password and Confirm Password Field do not match  !!");
                document.chngpwd.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
</head>

<body class="inner_page login">
    <div class="container" id="container">
        <div class="form-container ForgotPassword">
            <form method="post" name="chngpwd" onSubmit="return valid();">
                <h1>Forgot Password</h1>
                <div class="social-icons">
                    <a class="icon"><i class="fa-solid fa-circle"></i></a>
                    <a class="icon"><i class="fa-solid fa-circle"></i></a>
                    <a class="icon"><i class="fa-solid fa-circle"></i></a>
                    <a class="icon"><i class="fa-solid fa-circle"></i></a>
                </div>
                <span>Forgot your password? Again? No problem</span>
                <input type="email" placeholder="Enter Your Email" required="true" name="email">
                <input type="text" placeholder="Enter Your Mobile Number" required="true" name="mobile" maxlength="10" pattern="[0-9]+">
                <input type="password" placeholder="Enter Your Password" required="true" name="newpassword">
                <input type="password" placeholder="Confirm Your Password" required="true" name="confirmpassword">
                <button name="submit">Reset</button>
            </form>
        </div>
        <div class="form-container sign-in">
        <form method="post" name="login">
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a class="icon"><i class="fa-solid fa-circle"></i></a>
                    <a class="icon"><i class="fa-solid fa-circle"></i></a>
                    <a class="icon"><i class="fa-solid fa-circle"></i></a>
                    <a class="icon"><i class="fa-solid fa-circle"></i></a>
                </div>
                <span>Please Sign in using your credentials</span>
                <input type="text" placeholder="Enter your username" name="username">
                <input type="password" placeholder="Password" name="password">
                <button name="login">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello!</h1>
                    <p>Forgot your Password? Again? No problem</p>
                    <button class="hidden" id="reset">Reset</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const container = document.getElementById('container');
        const resetBtn = document.getElementById('reset');
        const loginBtn = document.getElementById('login');

        resetBtn.addEventListener('click', () => {
            container.classList.add("active");
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove("active");
        });
    </script>
</body>
</html>
