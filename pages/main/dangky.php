<?php
include("../../admincp/config/config.php");
if (isset($_POST['dangky'])) {
    $tendangnhap = $_POST['tendangnhap'];
    $matkhau = md5($_POST['matkhau']);
    $nhaplaimatkhau = md5($_POST['nhaplaimatkhau']);
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    $a = $sdt . length;

    $diachi = $_POST['diachi'];
    $sql_user = "SELECT username FROM tbl_dangky";
    $query_user = mysqli_query($mysqli, $sql_user);
    $dem = 0;
    if ($tendangnhap == "" || $matkhau == "" || $nhaplaimatkhau == "" || $email == "" || $sdt == "" || $diachi == "") {
        header("Location:../thongbao/dktb2.php");
    } else {
        while ($row = mysqli_fetch_array($query_user)) {
            if ($tendangnhap == $row[0]) {
                $dem++;
            }
        }
        if ($dem > 0) {
            header("Location:../thongbao/dktb1.php");
        } else {
            if ($matkhau == $nhaplaimatkhau && $a == 10) {
                $sql_dangky = "INSERT INTO `tbl_dangky`(`username`, `password`,`ten`,`email`, `sdt`, `diachi`) VALUES ('" . $tendangnhap . "','" . $matkhau . "','" . $ten . "','" . $email . "','" . $sdt . "','" . $diachi . "')";
                $row_dangky = mysqli_query($mysqli, $sql_dangky);
                if ($row_dangky) {
                    header("Location:../thongbao/dangkythanhcong.php");
                }
            } else {
                if ($matkhau != $nhaplaimatkhau) {
                    header("Location:../thongbao/dktb3.php");
                } else {
                    if ($a != 10)
                        header("Location:../thongbao/dktb4.php");
                }
                // echo '<script type="text/javascript">  alert("Mật khẩu chưa trùng khớp.") </script>';
            }
        }
    }
}
?>
<style>
    .dangky {
        width: 450px;
        height: auto;
        border-radius: 50px;
        background: #e0e0e0;
        box-shadow: 20px 20px 60px #bebebe,
            -20px -20px 60px #ffffff;
        transform: translateX(120%);
    }

    .input-group {
        margin: 30px;
    }

    .input {
        width: 400px;
        height: 44px;
        background-color: #05060f0a;
        border-radius: .5rem;
        padding: 0 1rem;
        border: 2px solid transparent;
        font-size: 1rem;
        transition: border-color .3s cubic-bezier(.25, .01, .25, 1) 0s, color .3s cubic-bezier(.25, .01, .25, 1) 0s, background .2s cubic-bezier(.25, .01, .25, 1) 0s;
    }

    .label {
        display: block;
        margin-bottom: .3rem;
        font-size: .9rem;
        font-weight: bold;
        color: #05060f99;
        transition: color .3s cubic-bezier(.25, .01, .25, 1) 0s;
    }

    .input:hover,
    .input:focus,
    .input-group:hover .input {
        outline: none;
        border-color: #05060f;
        box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
    }

    .input-group:hover .label,
    .input:focus {
        color: #05060fc2;
    }

    button {
        background-color: transparent;
        border: 0.125em solid #1A1A1A;
        border-radius: 0.9375em;
        box-sizing: border-box;
        color: #3B3B3B;
        cursor: pointer;
        font-size: 16px;
        font-weight: 600;
        line-height: normal;
        margin-bottom: 4%;
        margin-left: 32%;
        min-height: 2em;
        min-width: 0;
        outline: none;
        padding: 0.5em 1.5em;
        text-align: center;
        text-decoration: none;
        transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
        -webkit-user-select: none;
        touch-action: manipulation;
        will-change: transform;
    }

    button:disabled {
        pointer-events: none;
    }

    button:hover {
        color: #fff;
        background-color: #1A1A1A;
        box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
        transform: translateY(-2px);
    }

    button:active {
        box-shadow: none;
        transform: translateY(0);
    }
</style>
<div class="dangky">
    <br>
    <h2 align='center'>Đăng ký tài khoản</h2>
    <form action="" method="POST">
        <div class="input-group">
            <label class="label">Tên đăng nhập</label>
            <input autocomplete="off" class="input" type="text" name="tendangnhap">
        </div>
        <div class="input-group">
            <label class="label">Mật khẩu</label>
            <input autocomplete="off" class="input" type="password" name="matkhau">
        </div>
        <div class="input-group">
            <label class="label">Nhập lại mật khẩu</label>
            <input autocomplete="off" class="input" type="password" name="nhaplaimatkhau">
        </div>
        <div class="input-group">
            <label class="label">Tên người dùng</label>
            <input autocomplete="off" class="input" type="text" name="ten">
        </div>
        <div class="input-group">
            <label class="label">Email</label>
            <input autocomplete="off" class="input" type="email" name="email">
        </div>
        <div class="input-group">
            <label class="label">SĐT</label>
            <input autocomplete="off" class="input" type="number" name="sdt">
        </div>
        <div class="input-group">
            <label class="label">Địa chỉ nhận hàng</label>
            <input autocomplete="off" class="input" type="text" name="diachi">
        </div>
        <button name="dangky">
            Đăng ký
        </button>
    </form>
</div>