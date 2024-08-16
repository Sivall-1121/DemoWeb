<br>
<div class="arrow-steps clearfix">
    <div class="step done"> <span>Giỏ hàng</a></span> </div>
    <div class="step current"> <span>Xác nhận đơn hàng</span> </div>
    <div class="step"> <span>Thanh toán<span> </div>
</div>
<br>

<?php
        $user=$_SESSION['dangnhap'];
    if(isset($_POST['thanhtoan'])){
        $madh=rand(0,9999);
        $inser_giohang="INSERT INTO `tbl_giohang`(`username`, `ma_dh`) VALUES ('".$user."','".$madh."')";
        mysqli_query($mysqli,$inser_giohang);
        foreach ($_SESSION['cart'] as $key => $value) {
            $ma_sanpham=$value['ma_sanpham'];
            $soluong=$value['sl_sanpham'];
            $ten_sanpham=$value['ten_sanpham'];
            $ha_sanpham=$value['ha_sanpham'];
            $gia_sanpham=$value['gia_sanpham'];
            $giamgia=$value['giamgia'];
             $inser_cart="INSERT INTO `tbl_donhang`(`ma_dh`, `ma_sanpham`, `ten_sanpham`, `ha_sanpham`, `gia_sanpham`,`giamgia`, `soluong`) 
                    VALUES ('".$madh."','".$ma_sanpham."','".$ten_sanpham."','".$ha_sanpham."','".$gia_sanpham."','".$giamgia."','".$soluong."')";
        mysqli_query($mysqli,$inser_cart);
        }
        $ten=$_POST['ten'];
        $sdt=$_POST['sdt'];
        $dc=$_POST['dc'];
        $note=$_POST['note'];
        $sql_shopping="INSERT INTO `tbl_shopping`(`ma_dh`,`username`, `ten_shopping`, `sdt_shopping`, `dc_shopping`, `note`) 
        VALUES ('".$madh."','".$user."','".$ten."','".$sdt."','".$dc."','".$note."')";
        mysqli_query($mysqli,$sql_shopping);
        header("Location:index.php?quanly=thanhtoan");
    }
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<?php   
    $sql_a="SELECT ten,sdt,diachi FROM tbl_dangky WHERE username='".$user."' LIMIT 1";
    $res=mysqli_query($mysqli,$sql_a);
    $row=mysqli_fetch_array($res);
?>
<style>
    .arrow-steps .step {
    padding: 10px 0px 5.8px 14px;
    }
    a{
    color: #000;
    }
    a:hover{
    color: #000;
    text-decoration: none;     
    } 
</style>
<br>
<div class="row">
    <div class="col-md-12">
        <form action="" autocomplete="off" method="POST">
            <div class="form-group">
                <label>Tên người nhận:</label>
                <input type="text" class="form-control" name="ten" value="<?php echo $row[0] ?>">
            </div>
            <div class="form-group">
                <label >SĐT:</label>
                <input type="text" class="form-control" name="sdt" value="<?php echo $row[1] ?>">
            </div>
            <div class="form-group">
                <label>Địa chỉ:</label>
                <input type="text" class="form-control"  name="dc" value="<?php  echo $row[2] ?>">
            </div>
            <div class="form-group">
                <label>Ghi chú:</label>
                <input type="text" class="form-control" placeholder="Ghi chú ..."  name="note">
            </div>
            <label><b style="color:red">Đơn hàng:</b></label>
            <table border='1' style="border-collapse:collapse; width:100%; text-align:center" >
                <?php
                if(isset($_SESSION['cart'])){
                    ?>
                <tr>
                    <th style="width:80px;height:50px"> Thứ tự</th>
                    <th style="width:150px"> Mã sản phẩm</th>
                    <th style="width:300px"> Tên sản phẩm</th>
                    <th style="width:270px"> Hình ảnh</th>
                    <th style="width:100px"> Số lượng</th>
                    <th style="width:200px"> Giá</th>
                    <th style="width:200px"> Thành tiền</th>
                </tr>
                <?php
                    $i=0;
                    $tongtien=0;
                    foreach ($_SESSION['cart'] as $cart_item) {
                        $i++;
                        $thanhtien=$cart_item['sl_sanpham']*$cart_item['gia_sanpham'];
                        $tongtien += $thanhtien; 
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $cart_item['ma_sanpham']; ?></td>
                    <td><?php echo $cart_item['ten_sanpham']; ?></td>
                    <td><img src="../admincp/modules/quanlisanpham/upload/<?php echo $cart_item['ha_sanpham']; ?>" style="margin: 20px 0;width:40%"></td>
                    <td>
                        <?php echo $cart_item['sl_sanpham']; ?>
                    </td>
                    <td><?php echo number_format($cart_item['gia_sanpham'],0,',','.').' vnđ'; ?></td>
                    <td><?php echo number_format($thanhtien,0,',','.').' vnđ'; ?></td>
                </tr>
                <?php
                    }
                ?>
                <tr>
                    <td colspan='6' height=40px>Tổng tiền :</td>
                    <td><?php echo number_format($tongtien,0,',','.').' vnđ'; ?></td>
                </tr>
                <?php
                }
            ?>
            </table>
            <br>
            <button type="submit" class="btn btn-primary" style="margin-left: 50%;" name="thanhtoan">
                Thanh toán
            </button>
        </form>
    </div>
</div>
<br>
<br>