<br>
<h3>Chi tiết đơn hàng</h3>
<br>
<?php
    $a="HD-";
    $sql_lietke_dh="SELECT * FROM tbl_donhang WHERE tbl_donhang.ma_dh='$_GET[ma_dh]' ORDER BY ma_dh DESC";
    $query_lietke_dh=mysqli_query($mysqli,$sql_lietke_dh);
?>
<table border=1 style="border-collapse:collapse;" width=100%>
    <tr>
        <th style="height:40px">Thứ tự</th>
        <th>Mã đơn hàng</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Thành tiền</th>
    </tr>
    <?php
    $i=0;
    $tongtien=0;
    while($row=mysqli_fetch_array($query_lietke_dh)){
        $i++;
        $tongtien+=$row['soluong']*$row['gia_sanpham'];
    ?>
    <tr>
        <td style="height:40px" align='center'><?php echo $i ?></td>
        <td align='center'><?php echo $a.$row['ma_dh'] ?></td>
        <td align='center'><?php echo $row['ten_sanpham'] ?></td>
        <td align='center'><?php echo $row['soluong'] ?></td>
        <td align='center'><?php echo number_format($row['gia_sanpham'],0,',','.').' vnđ'; ?></td>
        <td style="text-align:center;color:red"><?php echo number_format($row['soluong']*$row['gia_sanpham'],0,',','.').' vnđ'; ?></td>
    </tr>
    <?php
    }
    ?>
    <th colspan='5' style="text-align:center;height:40px" >Tổng tiền: </th>
        <td style="text-align:center;color:red" >
            <?php echo number_format($tongtien,0,',','.').' vnđ'; ?>
        </td>
</table>