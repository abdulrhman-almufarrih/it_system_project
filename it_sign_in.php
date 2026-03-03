<?php
session_start();
include "config.php";

$message = "";

if (isset($_POST['login'])) {
    $emp_id = $_POST['user_id'];
    $pass   = $_POST['password'];

    if (!empty($emp_id) && !empty($pass)) {
        $sql = "SELECT * FROM users WHERE id='$emp_id' AND pasword='$pass'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION['logged_in'] = true;
            $_SESSION['id_user'] = $user['id'];
            $_SESSION['name'] = $user['name'];

            header("Location: home_it.php");
            exit();
        } else {
            $message = "الرقم الوظيفي أو كلمة المرور غير صحيحة ❌";
        }
    } else {
        $message = "الرجاء تعبئة جميع الحقول";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {background:white;font-family:Arial;margin:0;text-align:center;}
.top-bar{background:#007BFF;height:60px;}
h3{font-size:32px;margin-top:40px;}
form{margin-top:40px;}
.form-group{margin:15px;}
label{display:inline-block;width:120px;text-align:right;font-weight:bold;}
input{padding:5px;width:200px;}
button{padding:8px 20px;background:#007BFF;color:white;border:none;cursor:pointer;}
button:hover{background:#0056b3;}
.message{margin-top:20px;font-weight:bold;color:red;}
</style>
</head>
<body>
<div class="top-bar"></div>
<h3>تقنية المعلومات</h3>
<form method="POST">
    <div class="form-group">
        <label>الرقم الوظيفي:</label>
        <input type="text" name="user_id">
    </div>
    <div class="form-group">
        <label>كلمة المرور:</label>
        <input type="password" name="password">
    </div>
    <br>
    <button type="submit" name="login">إرسال</button>
</form>
<div class="message"><?php echo $message; ?></div>
</body>
</html>