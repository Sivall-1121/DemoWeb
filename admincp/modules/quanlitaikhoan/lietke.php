<br>
<h3>Liệt kê tài khoản người dùng</h3>
<br>
<?php
    $sql_lietke_dh="SELECT * FROM tbl_dangky";
    $query_lietke_dh=mysqli_query($mysqli,$sql_lietke_dh);
?>
<table border=1 style="border-collapse:collapse;" width=100%>
    <tr>
        <th style="height:30px" >Thứ tự</th>
        <th>Tên tài khoản</th>
        <th>Tên khách hàng</th>
        <th>SĐT</th>
        <th>Email</th>
        <th>Địa chỉ</th>
    </tr>
    <?php
    $i=0;
    while($row=mysqli_fetch_array($query_lietke_dh)){
        $i++;
    ?>
    <tr>
        <td style="height:40px" align='center'><?php echo $i ?></td>
        <td align='center'><?php echo $row['username'] ?></td>
        <td align='center'><?php echo $row['ten'] ?></td>
        <td align='center'><?php echo $row['sdt'] ?></td>
        <td align='center'><?php echo $row['email'] ?></td>
        <td align='center'><?php echo $row['diachi'] ?></td>
    </tr>
    <?php
    }
    ?>
</table>