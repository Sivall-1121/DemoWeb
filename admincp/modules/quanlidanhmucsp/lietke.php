<?php
    $sql_lietke="SELECT * FROM tbl_danhmuc";
    $query_lietke=mysqli_query($mysqli,$sql_lietke);
?>
<br>
<h3>Liệt kê danh mục sản phẩm</h3>
<br>
<table border=1 style="border-collapse:collapse;" width=100%>
    <tr>
        <th style="width:100px;height:50px">Thứ tự</th>
        <th>Tên danh mục</th>
        <th>Hình ảnh</th>
        <th>Quản lí</th>
    </tr>
    <?php
    $i=0;
    while($row=mysqli_fetch_array($query_lietke)){
        $i++;
    ?>
    <tr>
        <td align='center'><?php echo $i ?></td>
        <td align='center'><?php echo $row['ten_danhmuc'] ?></td>
        <td style="height:60px" align="center"><img src="modules/quanlidanhmucsp/upload/<?php echo $row['img_danhmuc'] ?>" width=10%></td>
        <td align='center'>
            <button><a href="modules/quanlidanhmucsp/xuly.php?id_danhmuc=<?php echo $row['id_danhmuc']?>">Xóa</a></button>
            |
            <button><a href="?action=quanlidanhmucsanpham&query=sua&id_danhmuc=<?php echo $row['id_danhmuc']?>">Sửa</a></button>
        </td>
    </tr>
    <?php
    }
    ?>
</table>