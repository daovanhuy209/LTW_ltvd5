<?php
$errors = [];
$username = "";
$email = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){

$username = htmlspecialchars($_POST["username"]);
$email = htmlspecialchars($_POST["email"]);
$password = $_POST["password"];
$repeat = $_POST["repeat-password"];

if(empty($username)){
$errors["username"]="Vui lòng nhập họ tên";
}

if(empty($email)){
$errors["email"]="Vui lòng nhập email";
}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
$errors["email"]="Email không đúng định dạng";
}

if(empty($password)){
$errors["password"]="Vui lòng nhập mật khẩu";
}elseif(strlen($password)<6){
$errors["password"]="Mật khẩu phải ít nhất 6 ký tự";
}

if($repeat!=$password){
$errors["repeat"]="Mật khẩu xác nhận không khớp";
}

if(empty($errors)){
echo "<h2 style='color:green;text-align:center'>Đăng ký thành công</h2>";
$username = "";
$email = "";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./reset.css">
<link rel="stylesheet" href="./style.css">
<title>Register Page</title>
</head>

<body>
<div class="wrapper fade-in-down">
<div id="form-content">

<a href="/login.php">
<h2 class="inactive underline-hover">Đăng nhập</h2>
</a>

<a href="/register.php">
<h2 class="active">Đăng ký</h2>
</a>

<div class="fade-in first">
<img src="avatar.png" id="avatar" alt="User Icon">
</div>

<!-- HIỂN THỊ LỖI -->
<?php if(!empty($errors)): ?>
<div style="color:red;text-align:center">
<?php foreach($errors as $error): ?>
<p><?php echo $error; ?></p>
<?php endforeach; ?>
</div>
<?php endif; ?>

<form method="post">

<input
type="text"
name="username"
class="fade-in first"
placeholder="Họ tên"
value="<?php echo $username; ?>"
>

<input
type="email"
name="email"
class="fade-in second"
placeholder="Email"
value="<?php echo $email; ?>"
>

<input
type="password"
name="password"
class="fade-in third"
placeholder="Mật khẩu"
>

<input
type="password"
name="repeat-password"
class="fade-in fourth"
placeholder="Xác nhận mật khẩu"
>

<input
type="submit"
class="fade-in five"
value="Đăng ký"
>

</form>

<div id="form-footer">
<a class="underline-hover" href="#">Quên mật khẩu?</a>
</div>

</div>
</div>
</body>
</html>
