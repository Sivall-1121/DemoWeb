<?php
    if(isset($_GET['trang'])){
        $page=$_GET['trang'];
    }else {
        $page=1;
    }
    if($page==1){
        $begin=0;
    }else{
        $begin=($page*15)-15;
    }
    $sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc 
    ORDER BY tbl_sanpham.ma_sanpham DESC LIMIT $begin,15";
    $query_pro=mysqli_query($mysqli,$sql_pro);
    $sql_trang1=mysqli_query($mysqli,"SELECT * FROM tbl_sanpham");
    $row_count1=mysqli_num_rows($sql_trang1);
    $trang1=ceil($row_count1/15);
?>
<div class="menutop">
    <h3 style="margin-left:3%;display:inline"> 
        <a href="index.php" style="color:#e92525">
            <i class="fa-solid fa-house"></i>  Trang chủ 
        </a>
    </h3>
    <h3 style="display:inline">
        <i class="fa-sharp fa-solid fa-angle-right fa-2xs"></i>
        <a href="index.php?quanly=allsanpham">
            Tất cả sản phẩm
        </a>
    </h3> 
</div>
    <ul class="list_product">
    <?php
            while($row= mysqli_fetch_array ($query_pro)){
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
                <p class="price_product" style="font-size:15px;color:red;margin-left: 20px;"><?php echo number_format(($row['gia_sanpham']*(100-$row['giamgia'])/100),0,',','.').' vnđ' ?></p>
                <p class="price_product"style="text-decoration: line-through; font-size:12px;"><?php echo number_format($row['gia_sanpham'],0,',','.').' vnđ' ?></p>
            </a>
        </li>  
        <?php
        }
        ?>     
    </ul>
    <div style="clear:both;"></div>
    <br>
    <ul class="list_trang">
        <?php
        for($i=1;$i<=$trang1;$i++){
        ?>
        <li <?php if($i==$page){echo 'style="background-color:red;"';}?>>
            <a href="index.php?quanly=allsanpham&trang=<?php echo $i?>"><?php echo $i?></a>
        </li>
        <?php
        }
        ?>
    </ul>