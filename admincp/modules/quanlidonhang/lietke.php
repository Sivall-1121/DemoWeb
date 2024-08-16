<br>
<h3>Liệt kê đơn hàng</h3>
<br>
<?php
    $sql_lietke_dh="SELECT * FROM tbl_giohang,tbl_shopping WHERE tbl_giohang.username=tbl_shopping.username AND tbl_giohang.ma_dh=tbl_shopping.ma_dh";
    $query_lietke_dh=mysqli_query($mysqli,$sql_lietke_dh);
?>
<table border=1 style="border-collapse:collapse;" width=100%>
    <tr>
        <th style="height:30px">Thứ tự</th>
        <th>Mã đơn hàng</th>
        <th>Tên tài khoản</th>
        <th>Tên người nhận</th>
        <th>SĐT</th>
        <th>Địa chỉ nhận hàng</th>
        <th>Ghi chú</th>
        <th></th>
    </tr>
    <?php
    $i=0;
    while($row=mysqli_fetch_array($query_lietke_dh)){
        $i++;
    ?>
    <tr>
        <td align='center' style="height:50px   "><?php echo $i ?></td>
        <td align='center'><?php echo "HD-".$row['ma_dh'] ?></td>
        <td align='center'><?php echo $row['username'] ?></td>
        <td align='center'><?php echo $row['ten_shopping'] ?></td>
        <td align='center'><?php echo $row['sdt_shopping'] ?></td>
        <td align='center'><?php echo $row['dc_shopping'] ?></td>
        <td align='center'><?php echo $row['note'] ?></td>
        <td align='center'>
            <button><a href="?action=donhang&query=xemdonhang&ma_dh=<?php echo $row['ma_dh']?>">Chi tiết đơn hàng</a></button>
        </td>
    </tr>
    <?php
    }
    ?>
</table>