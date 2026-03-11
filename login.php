<?php
$errors = [];
$email = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){

$email = htmlspecialchars($_POST["email"]);
$password = $_POST["password"];

if(empty($email)){
$errors["email"]="Vui lòng nhập email";
}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
$errors["email"]="Email không đúng định dạng";
}

if(empty($password)){
$errors["password"]="Vui lòng nhập mật khẩu";
}

if(empty($errors)){
echo "<h2 style='color:green;text-align:center'>Đăng nhập thành công</h2>";
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

<title>Login Page</title>
</head>

<body>
<div class="wrapper fade-in-down">
<div id="form-content">

<a href="/login.php">
<h2 class="active">Đăng nhập</h2>
</a>

<a href="/register.php">
<h2 class="inactive underline-hover">Đăng ký</h2>
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
type="submit"
class="fade-in fourth"
value="Đăng nhập"
>

</form>

<div id="form-footer">
<a class="underline-hover" href="#">Quên mật khẩu?</a>
</div>

</div>
</div>
</body>
</html>
