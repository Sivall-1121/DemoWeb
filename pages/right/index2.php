<?php
    $sql_new = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.tt_sanpham=1
    ORDER BY tbl_sanpham.ma_sanpham DESC ";
    $sql_banchay="SELECT ma_sanpham,ten_sanpham,ha_sanpham,gia_sanpham,giamgia, SUM(soluong) AS 'So luong' 
                    FROM tbl_donhang   
                    GROUP BY ma_sanpham 
                    HAVING SUM(soluong)>3";

    $query_new=mysqli_query($mysqli,$sql_new);
    $query_banchay=mysqli_query($mysqli,$sql_banchay);

?>
<br>
<div class="main2">
    <h3 class="menutop">Sản phẩm mới</h3>
        <ul class="list_product">
        <?php
                while($row= mysqli_fetch_array ($query_new)){
            ?>  
            <li>
                <div class="product__price--percent">
                    <p class="product__price--percent-detail">
                        Giảm <?php echo $row['giamgia'].'%'?>
                    </p>
                </div>
                <img src="../admincp/modules/quanlisanpham/upload/<?php echo $row['ha_sanpham'] ?>" width=70%>
                <a href="index.php?quanly=sanpham&ma=<?php echo $row['ma_sanpham'] ?>">
                    <p class="title_product"><?php echo $row['ten_sanpham']?></p>
                    <p class="price_product" style="font-size:15px;display:inline;margin-left: 20px; color:red;"><?php echo number_format(($row['gia_sanpham']*(100-$row['giamgia'])/100),0,',','.').' vnđ' ?></p>
                    <p class="price_product"style="text-decoration: line-through; font-size:12px;display:inline;"><?php echo number_format($row['gia_sanpham'],0,',','.').' vnđ' ?></p>
                </a>
            </li>  
            <?php
            }
            ?>     
        </ul>
<div class="clear"></div>
    <h3 class="menutop">Sản phẩm bán chạy</h3>
        <ul class="list_product">
            <?php
                while($row1= mysqli_fetch_array($query_banchay)){
            ?>  
            <li>
            <div class="product__price--percent">
                    <p class="product__price--percent-detail">
                        Giảm <?php echo $row1['giamgia'].'%'?>
                    </p>
                </div>
                <img src="../admincp/modules/quanlisanpham/upload/<?php echo $row1['ha_sanpham'] ?>" width=70%>
                <a href="index.php?quanly=sanpham&ma=<?php echo $row1['ma_sanpham'] ?>">
                    <p class="title_product"><?php echo $row1['ten_sanpham']?></p>
                    <p class="price_product" style="font-size:15px;color:red;margin-left: 20px;"><?php echo number_format(($row1['gia_sanpham']*(100-$row1['giamgia'])/100),0,',','.').' vnđ' ?></p>
                    <p class="price_product"style="text-decoration: line-through; font-size:12px;"><?php echo number_format($row1['gia_sanpham'],0,',','.').' vnđ' ?></p>
                </a>
            </li>  
            <?php
            }
            ?>     
        </ul>
</div>
<button class="backtotop" type="submit">
    <a href="#top">
        <i class="fa-solid fa-angle-up" style="color: #ffffff;"></i>
    </a>
</button>