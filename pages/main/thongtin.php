<?php
    $sql="SELECT ten,sdt,email,diachi FROM tbl_dangky WHERE username='".$_SESSION['dangnhap']."' ";
    $row=mysqli_fetch_array(mysqli_query($mysqli,$sql));
?>
<br><br>
<h4 style="color:red;display:inline;">
            <i class="fa-solid fa-angle-left" style="color:red;"></i>
            <a style="color:red;" href='javascript: history.go(-1)'>Trở về</a>
        </h4>
        <h3 style="color:red;display:inline;margin-left:30%">Thông tin tài khoản</h3>  
        <br><br>
<form action="" method="POST">
    <div style="margin-left:10%">
        <p>Tên người dùng: <?php echo $row[0]; ?></p>
        <p>SĐT: <?php echo $row[1]; ?></p>
        <p>Email: <?php echo $row[2]; ?></p>
        <p>Địa chỉ: <?php echo $row[3]; ?></p>
        <button class="btn">
            <span class="shadow"></span>
            <span class="edge"></span>
            <span class="front text"><a href="index.php?quanly=capnhattt" style="color:white">Cập nhật thông tin</a>
            </span>
        </button>
    </div>
</form>