<br>
<h3>Liệt kê ý kiến đóng góp</h3>
<br>
<?php
    $sql_lietke_dh="SELECT * FROM tbl_binhluan";
    $query_lietke_dh=mysqli_query($mysqli,$sql_lietke_dh);
?>
<table border=1 style="border-collapse:collapse;" width=100%>
    <tr>
        <th style="height:30px">Thứ tự</th>
        <th>Tên tài khoản</th>
        <th>Ý kiến đóng góp</th>
    </tr>
    <?php
    $i=0;
    while($row=mysqli_fetch_array($query_lietke_dh)){
        $i++;
    ?>
    <tr>
        <td style="height:40px" align='center'><?php echo $i ?></td>
        <td align='center'><?php echo $row['username'] ?></td>
        <td align='center'><?php echo $row['binhluan'] ?></td>
    </tr>
    <?php
    }
    ?>
</table>