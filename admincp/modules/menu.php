<?php
    if(isset($_GET['dangxuat'])&&$_GET['dangxuat']=1){
        unset($_SESSION['tenadmin']);
        header("Location:../account/login.php");
    }
?>
<div class="list_menu">
    <li><a href="index.php?action=quanlidanhmucsanpham&query=them">Quản lí danh mục sản phẩm</a></li>
    <li><a href="index.php?action=quanlisanpham&query=them">Quản lí sản phẩm</a></li>
    <li><a href="index.php?action=quanlidonhang&query=lietke">Quản lí đơn hàng</a></li>
    <li><a href="index.php?action=quanliykien&query=lietke">Quản lí ý kiến đóng góp</a></li>
    <li><a href="index.php?action=quanlitaikhoan&query=lietke">Quản lí tài khoản người dùng</a></li>
    <li style="margin-right:30px;">
        Người quản lý: <?php echo $_SESSION['tenadmin']?>  | 
        <a href="index.php?dangxuat=1">Đăng xuất</a>
    </li>
</div>