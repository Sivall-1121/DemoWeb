<?php
    $sql_lietke_sp="SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc";
    $query_lietke_sp=mysqli_query($mysqli,$sql_lietke_sp);
?>
<br>
<h3>Liệt kê sản phẩm</h3>
<br>
<table border=1 style="border-collapse:collapse;" width=100%>
    <tr>
        <th style="height:50px">Thứ tự</th>
        <th>Danh mục</th>
        <th>Tên sản phẩm</th>
        <th>Mã sản phẩm</th>
        <th style="width:200px">Hình ảnh </th>
        <th>Thông số sản phẩm</th>
        <!-- <th style="width:30px">Giới thiệu </th> -->
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Tình trạng</th>
        <th>Giảm giá</th>
        <th></th>
    </tr>
    <?php
    $i=0;
    while($row=mysqli_fetch_array($query_lietke_sp)){
        $i++;
    ?>
    <tr>
        <td align='center'><?php echo $i ?></td>
        <td align='center'><?php echo $row['ten_danhmuc'] ?></td>
        <td align='center'><?php echo $row['ten_sanpham'] ?></td>
        <td align='center'><?php echo $row['ma_sanpham'] ?></td>
        <td align='center'><img src="modules/quanlisanpham/upload/<?php echo $row['ha_sanpham'] ?>" width=70%></td>
        <td align='center'><?php echo $row['dd_sanpham'] ?></td>
        <!-- <td align='center'style="width:30px"><?php echo $row['gt_sanpham'] ?></td> -->
        <td align='center'><?php echo $row['gia_sanpham'] ?></td>
        <td align='center'><?php echo $row['sl_sanpham'] ?></td>
        <td align='center'>
            <?php if($row['tt_sanpham']==1)
                echo " Mới";
                else {
                    echo " Cũ";
                }
            ?>
        </td>
        <td align='center'><?php echo $row['giamgia'].'%' ?></td>
        <td align='center'>
            <button><a href="modules/quanlisanpham/xuly.php?ma_sanpham=<?php echo $row['ma_sanpham']?>">Xóa</a></button>
            <button><a href="?action=quanlisanpham&query=sua&ma_sanpham=<?php echo $row['ma_sanpham']?>">Sửa</a></button>
        </td>
        
    </tr>
    <?php
    }
    ?>
</table>