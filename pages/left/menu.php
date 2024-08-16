<div class="sidebar">
    <ul class="list_sidebar">
        <h4 style="margin-left: 15px;margin-bottom:10px">
        <i class="fa-solid fa-bars fa-sm" style="color: #000000;"></i> 
            Danh mục sản phẩm</h4>
        <?php
            $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc ASC";
            $query_danhmuc=mysqli_query($mysqli,$sql_danhmuc);
            while($row_danhmuc= mysqli_fetch_array ($query_danhmuc)){
        ?>
        <li style="margin-left: 20px;">
            <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>">
                <img src="../admincp/modules/quanlidanhmucsp/upload/<?php echo $row_danhmuc['img_danhmuc'] ?>" style="box-shadow:none;margin-right:10px"> 
                <?php echo $row_danhmuc['ten_danhmuc']?>
            </a>
        </li>
        <?php
        }
        ?>
    </ul>
</div>