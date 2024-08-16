<?php
session_start();
include("../admincp/config/config.php");
if (isset($_POST['dangnhap'])) {
  $taikhoan = $_POST['username'];
  // $matkhau = md5($_POST['password']);
  $matkhau = $_POST['password'];
  $sql_admin = "SELECT * FROM tbl_admin WHERE username='" . $taikhoan . "' AND password='" . $matkhau . "' ";
  $sql_user = "SELECT * FROM tbl_dangky WHERE username='" . $taikhoan . "' AND password='" . $matkhau . "' ";
  $row_admin = mysqli_query($mysqli, $sql_admin);
  $row_user = mysqli_query($mysqli, $sql_user);
  $count_admin = mysqli_num_rows($row_admin);
  $count_user = mysqli_num_rows($row_user);
  if ($count_admin > 0) {
    $row = mysqli_fetch_array($row_admin);
    $_SESSION['tenadmin'] = $row['admin_name'];
    header("Location:../admincp/index.php");
  } else {
    if ($count_user > 0) {
      $row = mysqli_fetch_array($row_user);
      $_SESSION['dangnhap'] = $taikhoan;
      $_SESSION['ten'] = $row['ten'];
      header("Location:../pages/index.php");
    } else {
      header('location:../pages/thongbao/loginsai.php');
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <title>Đăng nhập</title>
</head>

<body>
  <div class="signup" align="center">
    <br>
    <h2>Sign Up</h2>
    <form action="login.php" method="POST">
      <div class="form-control">
        <input type="text" name="username" required="">
        <label>
          <span style="transition-delay:0ms">U</span>
          <span style="transition-delay:50ms">s</span>
          <span style="transition-delay:100ms">e</span>
          <span style="transition-delay:150ms">r</span>
          <span style="transition-delay:200ms">n</span>
          <span style="transition-delay:250ms">a</span>
          <span style="transition-delay:300ms">m</span>
          <span style="transition-delay:350ms">e</span>
        </label>
      </div>
      <div class="form-control">
        <input type="password" name="password" required="">
        <label>
          <span style="transition-delay:0ms">P</span>
          <span style="transition-delay:50ms">a</span>
          <span style="transition-delay:100ms">s</span>
          <span style="transition-delay:150ms">s</span>
          <span style="transition-delay:200ms">w</span>
          <span style="transition-delay:250ms">o</span>
          <span style="transition-delay:300ms">r</span>
          <span style="transition-delay:350ms">d</span>
        </label>
      </div>
      <button class="cssbuttons-io-button" name="dangnhap">Log In
        <div class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
            <path fill="none" d="M0 0h24v24H0z"></path>
            <path fill="currentColor"
              d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"></path>
          </svg>
        </div>
      </button>
    </form>
  </div>
</body>

</html>