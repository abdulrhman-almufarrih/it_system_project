<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: it_sign_in.php");
    exit();
}
$username = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<title>الصفحة الرئيسية</title>
<style>
body{margin:0;font-family:Arial;background:#f4f6f9;direction:rtl;}
.top-bar{background:#007BFF;height:80px;color:white;display:flex;justify-content:flex-end;align-items:center;padding:10px 20px;}
.user-name{font-weight:bold;}
.nav-links{margin-top:10px;}
.nav-links a{color:white;text-decoration:none;padding:10px 15px;background:#0056b3;margin-left:10px;border-radius:5px;}
.nav-links a:hover{background:#004494;}
.content{padding:60px;text-align:center;}
.about{width:60%;margin:auto;font-size:18px;line-height:1.8;margin-top:30px;}
</style>
</head>
<body>
<div class="top-bar">
    <div class="user-name"><?php echo $username; ?></div>
    <div class="nav-links">
        <a href="ticketit.php">رفع بلاغ</a>
        <a href="logout.php">تسجيل خروج</a>
    </div>
</div>
<div class="content">
    <h3>نبذة عن قسم تقنية المعلومات والدعم الفني</h3>
    <div class="about">
        يُعد قسم تقنية المعلومات والدعم الفني من الأقسام الحيوية في المنشأة، حيث يختص بتشغيل وإدارة الأنظمة التقنية وضمان استمرارية العمل بكفاءة عالية. يعمل القسم على تقديم الدعم الفني للموظفين، وحل المشكلات التقنية المتعلقة بالأجهزة، الشبكات، والبرمجيات، بما يضمن سرعة الاستجابة وتقليل الأعطال.<br><br>
        كما يساهم القسم في تطوير البنية التحتية التقنية، وتأمين البيانات والمعلومات، ومتابعة التحديثات التقنية بما يتوافق مع متطلبات العمل.
    </div>
</div>
</body>
</html>