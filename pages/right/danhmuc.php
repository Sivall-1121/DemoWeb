<?php
    $sql_pro = "SELECT * FROM tbl_sanpham WHERE id_danhmuc='$_GET[id]' ORDER BY ma_sanpham DESC";
    $query_pro=mysqli_query($mysqli,$sql_pro);

    $sql_cate = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc='$_GET[id]' LIMIT 1";
    $query_cate=mysqli_query($mysqli,$sql_cate);
    $row_title=mysqli_fetch_array ($query_cate);
?>
<div class="menutop">
    <h3 style="margin-left:3%;display:inline;"> 
        <a href="index.php" style="color:#e92525">
            <i class="fa-solid fa-house"></i>  Trang chủ 
        </a>
    </h3>
    <h3 style="display:inline">
        <i class="fa-sharp fa-solid fa-angle-right fa-2xs"></i>
        <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_title['id_danhmuc']?>">
            <?php echo $row_title['ten_danhmuc']?>
        </a>
    </h3>
</div>
    <ul class="list_product">
        <?php
            while($row_pro= mysqli_fetch_array ($query_pro)){
        ?>  
        <li>
            <div class="product__price--percent">
                    <p class="product__price--percent-detail">
                        Giảm <?php echo $row_pro['giamgia'].'%'?>
                    </p>
            </div>
            <img src="../admincp/modules/quanlisanpham/upload/<?php echo $row_pro['ha_sanpham'] ?>" width=70%>
            <a href="index.php?quanly=sanpham&ma=<?php echo $row_pro['ma_sanpham'] ?>">
                <p class="title_product"><?php echo $row_pro['ten_sanpham']?></p>
                <p class="price_product" style="font-size:15px;color:red;margin-left: 20px;"><?php echo number_format(($row_pro['gia_sanpham']*(100-$row_pro['giamgia'])/100),0,',','.').' vnđ' ?></p>
                <p class="price_product"style="text-decoration: line-through; font-size:12px;"><?php echo number_format($row_pro['gia_sanpham'],0,',','.').' vnđ' ?></p>
            </a>
        </li>  
        <?php
        }
        ?>          
    </ul>