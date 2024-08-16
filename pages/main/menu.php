<?php
    $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
    $query_danhmuc=mysqli_query($mysqli,$sql_danhmuc);
?>
<div class="menu">
    <ul class="list_menu">
        <li><a href="index.php">Trang chủ</a></li>
        <li><a href="index.php?quanly=allsanpham"> Tất cả sản phẩm</a></li>
        <li><a href="index.php?quanly=ykien"> Đóng góp ý kiến </a></li>
    </ul>
</div>