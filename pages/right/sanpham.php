<?php
    $sql_chitiet= "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc 
                                                            AND tbl_sanpham.ma_sanpham='$_GET[ma]' LIMIT 1";
    $query_chitiet= mysqli_query($mysqli,$sql_chitiet);
    while($row_chitiet=mysqli_fetch_array($query_chitiet)){
?>
<div class="menutop">
    <h3 style="margin-left:3%;display:inline;"> 
        <a href="index.php" style="color:#e92525">
            <i class="fa-solid fa-house"></i>  Trang chủ 
        </a>
    </h3>
    <h3 style="display:inline;">
        <i class="fa-sharp fa-solid fa-angle-right fa-2xs"></i>
        <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_chitiet['id_danhmuc']?>" style="color:#e92525">
            <?php echo $row_chitiet['ten_danhmuc']?>
        </a>
    </h3>
    <h3 style="display:inline">
        <i class="fa-sharp fa-solid fa-angle-right fa-2xs"></i>
            <?php echo $row_chitiet['ten_sanpham']?>
    </h3>
</div>
<br>
<div class="warpper_sp">
    <h3><?php echo $row_chitiet['ten_sanpham']?></h3>
    <div class="warpper_chitiet">
        <div class="hasp">
            <img src="../admincp/modules/quanlisanpham/upload/<?php echo $row_chitiet['ha_sanpham'] ?>" width=70%>
        </div>
        <form method="POST" action="main/themgiohang.php?ma_sanpham=<?php echo $row_chitiet['ma_sanpham']?>">
        <div class="chitietsp">
            <h4>Thông số sản phẩm:</h4>
            <div class="warpper_ts"><?php echo $row_chitiet['dd_sanpham']?></div>
            <h4 style="font-size:20px;margin-left: 20px;color:red;">Giá: <?php echo number_format(($row_chitiet['gia_sanpham']*(100-$row_chitiet['giamgia'])/100),0,',','.').' vnđ' ?></h4>
            <h4 style="text-decoration: line-through; font-size:15px;"><?php echo number_format($row_chitiet['gia_sanpham'],0,',','.').' vnđ' ?></h4>
        <div class="clear"></div>
        <input class="themgh" type="submit" name="themgh" id="" value="Thêm sản phẩm">
        </div>
        </form>
    </div>
    <div class="warpper_gt clear">
        <br>
        <br>
        <?php echo $row_chitiet['gt_sanpham']?>
    </div>  
</div>
<?php
    }
?>