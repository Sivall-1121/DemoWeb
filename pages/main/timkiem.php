<?php  
    if(isset($_POST['tukhoa'])){
        $tukhoa=$_POST['tukhoa'];
    }
    $sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND
                tbl_sanpham.ten_sanpham LIKE '%".$tukhoa."%' ";
    $query_pro=mysqli_query($mysqli,$sql_pro);
?>
<h3>Sản phẩm tìm kiếm: <?php echo $_POST['tukhoa'] ?></h3>
    <ul class="list_product">
    <?php
            while($row= mysqli_fetch_array ($query_pro)){
        ?>  
        <li>
            <img src="../admincp/modules/quanlisanpham/upload/<?php echo $row['ha_sanpham'] ?>" width=70%>
            <a href="index.php?quanly=sanpham&ma=<?php echo $row['ma_sanpham'] ?>">
                <p class="title_product"><?php echo $row['ten_sanpham']?></p>
                <p class="price_product" style="font-size:15px;display:inline;color:red;"><?php echo number_format(($row['gia_sanpham']*(100-$row['giamgia'])/100),0,',','.').' vnđ' ?></p>
                <p class="price_product"style="text-decoration: line-through; font-size:12px;display:inline;text-align: center;"><?php echo number_format($row['gia_sanpham'],0,',','.').' vnđ' ?></p>
            </a>
        </li>  
        <?php
        }
        ?>     
    </ul>