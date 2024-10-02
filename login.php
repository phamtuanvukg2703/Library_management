<?php 
    require_once('func.php');
    $conn = connectDB();
    if(session_id() === '' )
      session_start();
    if (isset($_GET["logout"]))
      unset($_SESSION["username"]);
    if (isset($_POST["username"])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $result = getpassuser_sdt($conn,$username);
      mysqli_close($conn);
      if(isset($result) && password_verify($password, $result['matKhau'])) {
          $_SESSION["username"] = 'ABC';
          $_SESSION["tenBandoc"] = $result["tenBandoc"];
          $_SESSION["maBandoc"] = $result["maBandoc"];
          header("Location: index.php");
          exit();
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Sai mật khẩu");';
            echo 'window.location.href = "login.php";'; 
            echo '</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class ="form-main">
        <form method="post">
            <h2>Đăng nhập</h2>
            <div class ="username">
                <label for="username">Tên đăng nhập</label>
                <input type="text" name="username" class ="username"  id = "username"placeholder="Nhập số điện thoại/email" required>
            </div>
            <div class = "password">
                <label for="password">Mật khẩu</label>
                <input type="password" name="password" class ="password" id = "password"placeholder="Nhập mật khẩu" required>
            </div>
            <div class ="btn">
                <button type="submit" class ="btn_dn">Đăng nhập</button>
            </div>
            <div class ="">Đăng nhập với tài khoản 
                <a href="admin">Thủ Thư</a>
            </div>
        </form>
    </div>
</body>
</html>
