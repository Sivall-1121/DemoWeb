<?php
    $sql_sua_sp="SELECT * FROM tbl_sanpham WHERE ma_sanpham='$_GET[ma_sanpham]' LIMIT 1";
    $query_sua_sp=mysqli_query($mysqli,$sql_sua_sp);
?>
<br>
<h3>Sửa sản phẩm</h3>
    <form method="POST" action="modules/quanlisanpham/xuly.php?ma_sanpham=<?php echo $_GET['ma_sanpham'] ?>" enctype="multipart/form-data">
    <?php
        while($row=mysqli_fetch_array($query_sua_sp)){
    ?>
        <p>Danh mục sản phẩm:
            <select name="dmsp">
            <?php
                $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                $query_danhmuc=mysqli_query($mysqli,$sql_danhmuc);
                while($row_danhmuc= mysqli_fetch_array ($query_danhmuc)){
                    if($row_danhmuc['id_danhmuc']==$row['id_danhmuc']){
            ?>
            <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>">
                <?php echo $row_danhmuc['ten_danhmuc'] ?>
            </option>
            <?php
                    }else{
            ?>
            <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>">
                <?php echo $row_danhmuc['ten_danhmuc'] ?>
            </option>
            <?php
                    }
                }
            ?>
            </select>
            </p>
        <p>Tên sản phẩm:
            <input class="input" type="text" name="tensp" value="<?php echo $row['ten_sanpham'] ?>">
        </p> 
        <p>Mã sản phẩm:
            <input class="input" type="text" name="masp"  value="<?php echo $row['ma_sanpham'] ?>">
        </p>
        <p>Hình ảnh sản phẩm:
            <img src="modules/quanlisanpham/upload/<?php echo $row['ha_sanpham'] ?>" width=10%>
            <input type="file" name="hasp">
        </p>
        <p>Thông số sản phẩm:
            <textarea name="dacdiem" rows="10" cols="10" style="resize: none">
                <?php echo $row['dd_sanpham'] ?>
            </textarea>
        </p>
        <p>Giới thiệu:
            <textarea name="gioithieu" rows="10" cols="10" style="resize: none">
                <?php echo $row['gt_sanpham'] ?>
            </textarea>
        </p>
        <p>Giá sản phẩm:
            <input class="input" type="text" name="giasp" value="<?php echo $row['gia_sanpham'] ?>">
        </p>
        <p>Số lượng:
            <input class="input" type="text" name="slsp" value="<?php echo $row['sl_sanpham'] ?>" >
        </p>
        <p>Tình trạng:
            <select name="ttsp">
                <?php
                    if($row['tt_sanpham']==1){
                ?>
                <option value="1">Mới</option>
                <option value="0">Cũ</option>
                <?php
                    }else{
                ?>
                <option value="1">Mới</option>
                <option value="0">Cũ</option>
                <?php
                    }
                ?>
            </select>
        </p>
        <p>Giảm giá:
            <input class="input" type="text" name="ggsp" value="<?php echo $row['giamgia'] ?>" >
        </p>
<br>
        <button type="submit" name="suasanpham" style="margin-left:30%">
                    Sửa
        </button>
    </form>
    <?php
    }
    ?>