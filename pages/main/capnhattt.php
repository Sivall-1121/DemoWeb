<?php
    $sql="SELECT ten,sdt,email,diachi FROM tbl_dangky WHERE username='".$_SESSION['dangnhap']."' ";
    $row=mysqli_fetch_array(mysqli_query($mysqli,$sql));
    if(isset($_POST['luu'])){
        $ten=$_POST['ten'];
        $email=$_POST['email'];
        $sdt=$_POST['sdt'];
        $diachi=$_POST['diachi'];
        $sql_user="UPDATE `tbl_dangky` SET `ten`='".$ten."',`email`='".$email."',`sdt`='".$sdt."',`diachi`='".$diachi."' WHERE username='".$_SESSION['dangnhap']."' ";
        $query_user=mysqli_query($mysqli,$sql_user);
        header('Location:index.php?quanly=thongtin');
    }
?>
<br><br>
<h4 style="color:red;display:inline;">
            <i class="fa-solid fa-angle-left" style="color:red;"></i>
            <a style="color:red;" href='javascript: history.go(-1)'>Trở về</a>
</h4>
<h3 style="color:red;display:inline;margin-left:30%">Cập nhật thông tin</h3>  
        <br><br>
<form action="" method="POST">
    <div style="margin-left:10%">
        <p>Tên người dùng:</p>
            <input type="text" name="ten" class="tt" value='<?php echo $row[0]?>'>

        <p>Email:</p>
            <input type="text" name="email" class="tt"value='<?php echo $row[2]?>'>

        <p>SĐT:</p>
            <input type="text" name="sdt" class="tt"value='<?php echo $row[1]?>'>

        <p>Địa chỉ nhận hàng:</p>
            <input type="text" name="diachi" class="tt"value='<?php echo $row[3]?>'>
        <br>
        <br>
        <button name="luu" class="btn">
            <span class="shadow"></span>
            <span class="edge"></span>
            <span class="front text"> Lưu
            </span>
        </button>
    </div>
    <br>
</form>