<?php
    if(isset($_POST['capnhat'])){
        $mkc=md5($_POST['mkc']);
        $mkm=md5($_POST['mkm']);
        $sql_mk="SELECT `password` FROM tbl_dangky WHERE username='".$_SESSION['dangnhap']."'  ";
        $res_mk=mysqli_query($mysqli,$sql_mk);
        $row=mysqli_fetch_array($res_mk);
        if($mkc!=$row[0]){
            echo '<script type="text/javascript">  alert("Mật khẩu chưa chính xác.") </script>';
        }else{
            if($mkc==$mkm){
                echo '<script type="text/javascript">  alert("Nhập lại mật khẩu cần đổi.") </script>';  
            }else{
                $sql_mkm="UPDATE `tbl_dangky` SET `password`='".$mkm."' WHERE username='".$_SESSION['dangnhap']."' ";
                mysqli_query($mysqli,$sql_mkm);
                header("Location:index.php");
            }
        }
    }
?>
<br>
<br>
<h4 style="color:red;display:inline;">
            <i class="fa-solid fa-angle-left" style="color:red;"></i>
            <a style="color:red;" href='javascript: history.go(-1)'>Trở về</a>
        </h4>    
<h3 style="color:red;display:inline;margin-left:30%">Đổi mật khẩu</h3>
<br>
<br>
<br>
<form action="" method="POST">
<div style="margin-left:10%">
        <p>Mật khẩu cũ:</p>
            <input type="password" class="tt"name="mkc">

        <p>Mật khẩu mới:</p>

            <input type="password"class="tt" name="mkm">
<br>
<br>
            <button name="capnhat" class="btn">
                <span class="shadow"></span>
                <span class="edge"></span>
                <span class="front text"> Cập nhật
                </span>
            </button>
</div>
</form>