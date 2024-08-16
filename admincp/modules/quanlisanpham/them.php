<br>
<br>
<h3 align="center">Thêm sản phẩm</h3>
    <form method="POST" action="modules/quanlisanpham/xuly.php" enctype="multipart/form-data">
        <p>Danh mục sản phẩm:
            <select name="dmsp">
            <?php
                $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                $query_danhmuc=mysqli_query($mysqli,$sql_danhmuc);
                while($row_danhmuc= mysqli_fetch_array ($query_danhmuc)){
            ?>
            <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>">
                <?php echo $row_danhmuc['ten_danhmuc'] ?>
            </option>
            <?php
                }
            ?>
            </select>
            </p>
        <p>Tên sản phẩm:
            <input class="input" type="text" name="tensp" >
            </p>
        <p>Mã sản phẩm:
            <input class="input" type="text" name="masp" >
        <p>Hình ảnh sản phẩm:
            <input type="file" name="hasp" >
        </p>
        <p>Đặc điểm nổi bật:
            <textarea name="dacdiem" rows="10" cols="10" style="resize:none"></textarea>
            </p>
        <p>Giới thiệu:
            <textarea name="gioithieu" rows="10" cols="10" style="resize:none"></textarea>
            </p>
        <p>Giá sản phẩm:
            <input class="input" type="text" name="giasp" >
            </p>
        <p>Số lượng:
            <input class="input" type="text" name="slsp" >
            </p>
        <p>Tình trạng:
            <select name="ttsp">
                <option value="1">Mới</option>
                <option value="0">Cũ</option>
            </select>
            </p>
        <p>Giảm giá:
            <input class="input" type="text" name="ggsp" >
            </p>
            <br>
            <button type="submit" name="themsanpham" style="margin-left:30%">
                Thêm
            </button>
    </form>