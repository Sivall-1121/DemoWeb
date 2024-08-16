<?php
    $sql_sua="SELECT * FROM tbl_danhmuc WHERE id_danhmuc=$_GET[id_danhmuc] LIMIT 1";
    $query_sua=mysqli_query($mysqli,$sql_sua);
?>
<br>
<h3>Sửa danh mục sản phẩm</h3>
<br>
    <form method="POST" action="modules/quanlidanhmucsp/xuly.php?id_danhmuc=<?php echo $_GET['id_danhmuc'] ?>" enctype="multipart/form-data">
    <?php
        while($dong=mysqli_fetch_array($query_sua)){
    ?>
        <p>Tên danh mục:
            <input class="input" type="text" value="<?php echo $dong['ten_danhmuc'] ?>" name="tendanhmuc" ></p>
<br>
        <p>Hình ảnh danh mục:
            <img src="modules/quanlidanhmucsp/upload/<?php echo $dong['img_danhmuc'] ?>" width=10%>
            <input type="file" name="hadm">
        </p>
        <br>
        <button  type="submit" name="suadanhmuc" style="margin-left:15%">
            Sửa
        </button>
    <?php 
    }
    ?>
    </form>