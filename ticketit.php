<?php
session_start();
include "config.php";
if(!isset($_SESSION['logged_in'])){
    header("Location: it_sign_in.php");
    exit();
}
$id_user  = $_SESSION['id_user'];
$username = $_SESSION['name'];

if(isset($_POST['send'])){
    $division = trim($_POST['namedivision']);
    $building = trim($_POST['building']);
    $floor    = trim($_POST['floornumber']);
    $problem  = trim($_POST['problem']);

    if(!empty($division) && !empty($building) && !empty($floor) && !empty($problem)){
        $stmt = $conn->prepare("INSERT INTO tickets (id_user,text,division,building,floornumber) VALUES (?,?,?,?,?)");
        $stmt->bind_param("issii",$id_user,$problem,$division,$building,$floor);
        $stmt->execute();
        $ticket_number = $stmt->insert_id;
        $success = "تم رفع التذكرة بنجاح - رقم التذكرة: $ticket_number";
    } else {
        $error = "الرجاء تعبئة جميع الحقول";
    }
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<title>رفع بلاغ</title>
<style>
body{margin:0;font-family:Arial;background:#f4f6f9;direction:rtl;}
.top-bar{background:#007BFF;height:80px;color:white;display:flex;justify-content:flex-end;align-items:center;padding:10px 20px;}
.user-name{font-weight:bold;margin-left:20px;}
.nav-links a{color:white;text-decoration:none;padding:10px 15px;background:#0056b3;margin-left:10px;border-radius:5px;}
.nav-links a:hover{background:#004494;}
.form-container{width:40%;margin:60px auto;background:white;padding:30px;border-radius:10px;box-shadow:0 0 10px rgba(0,0,0,.1);}
input,textarea{width:100%;padding:10px;margin:5px 0 15px 0;}
button{background:#007BFF;color:white;padding:10px;border:none;cursor:pointer;width:100%;}
button:hover{background:#0056b3;}
.success{color:green;font-weight:bold;}
.error{color:red;font-weight:bold;}
</style>
</head>
<body>
<div class="top-bar">
    <div class="user-name"><?php echo $username;?></div>
    <div class="nav-links">
        <a href="home_it.php">الرئيسية</a>
        <a href="logout.php">تسجيل خروج</a>
    </div>
</div>
<div class="form-container">
    <h3>رفع بلاغ جديد</h3>
    <?php if(isset($success)) echo "<p class='success'>$success</p>"; ?>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
    <form method="POST">
        <label>الاسم</label>
        <input type="text" value="<?php echo $username;?>" readonly>
        <label>الدائرة</label>
        <input type="text" name="namedivision">
        <label>المبنى</label>
        <input type="text" name="building">
        <label>رقم الدور</label>
        <input type="text" name="floornumber">
        <label>اشرح المشكلة</label>
        <textarea name="problem"></textarea>
        <button type="submit" name="send">رفع التذكرة</button>
    </form>
</div>
</body>
</html>