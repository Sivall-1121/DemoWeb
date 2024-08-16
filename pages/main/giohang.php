<br>
<?php
if(isset($_SESSION['cart'])){
?>
<table border='1' style="border-collapse:collapse; width:100%; text-align:center" class="tbl-giohang">
    <tr>
        <th style="width:80px;height:50px"> Thứ tự</th>
        <th style="width:150px"> Mã sản phẩm</th>
        <th style="width:300px"> Tên sản phẩm</th>
        <th style="width:270px"> Hình ảnh</th>
        <th style="width:100px"> Số lượng</th>
        <th style="width:200px"> Giá</th>
        <th style="width:200px"> Thành tiền</th>
        <th style="width:80px"> Quản lý</th>
    </tr>
    <?php
        if(isset($_SESSION['cart'])){
            $i=0;
            $tongtien=0;
            ?>
    <div class="arrow-steps clearfix">
        <div class="step current"> <span>Giỏ hàng</span> </div>
        <div class="step"> <span>Xác nhận đơn hàng</span> </div>
        <div class="step"> <span>Thanh toán<span> </div>
    </div>
<br>
    <?php
        foreach ($_SESSION['cart'] as $cart_item) {
            $i++;
            $thanhtien=$cart_item['sl_sanpham']*$cart_item['gia_sanpham'];
            $tongtien += $thanhtien; 
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $cart_item['ma_sanpham']; ?></td>
        <td><?php echo $cart_item['ten_sanpham']; ?></td>
        <td><img src="../admincp/modules/quanlisanpham/upload/<?php echo $cart_item['ha_sanpham']; ?>"  style="margin: 20px 0;width:40%"></td>
        <td>
            <a href="main/themgiohang.php?tru=<?php echo $cart_item['ma_sanpham']?>"><i class="fa-solid fa-minus fa-2xs"></i></i></a>
            <?php echo $cart_item['sl_sanpham']; ?>
            <a href="main/themgiohang.php?cong=<?php echo $cart_item['ma_sanpham']?>"><i class="fa-solid fa-plus fa-2xs"></i></i></i></a>
        </td>
        <td><?php echo number_format($cart_item['gia_sanpham'],0,',','.').' vnđ'; ?></td>
        <td><?php echo number_format($thanhtien,0,',','.').' vnđ'; ?></td>
        <td>
            <button>
                <a href="main/themgiohang.php?xoa=<?php echo $cart_item['ma_sanpham']?>">Xóa</a>
            </button>
        </td>
    </tr>
    <?php
        }
    ?>
    <tr>
        <td colspan='6'><p>Tổng tiền :</p></td>
        <td><?php echo number_format($tongtien,0,',','.').' vnđ'; ?></td>
        <td>
            <button>
            <a href="main/themgiohang.php?lammoi=1">Làm mới</a>
            </button>
        </td>
    </tr>
</table>
<br>
<?php
    if(isset($_SESSION['dangnhap'])){
    ?>
    <button style="float:right;margin-right:20px;" class="btn">
        <span class="shadow"></span>
        <span class="edge"></span>
        <span class="front text" > <a href="index.php?quanly=dathang"style="color:white">Đặt hàng</a>
        </span>
    </button>
    <?php
    }else{
    ?>
    <button style="float:right;margin-right:20px;color: #090909;
    padding:10px;
    font-size: 15px;
    border-radius: 0.5em;
    background: #e8e8e8;
    border: 1px solid #e8e8e8;
    transition: all .3s;
    box-shadow: 6px 6px 12px #c5c5c5,
             -6px -6px 12px #ffffff;" >
        <a href="../account/login.php">Đăng nhập để thanh toán</a>
    </button>
    <?php
    }
?>
<br>
<a href="../pages/index.php" style="color: #090909;
    padding:10px;
    font-size: 15px;
    border-radius: 0.5em;
    background: #e8e8e8;
    border: 1px solid #e8e8e8;
    transition: all .3s;
    box-shadow: 6px 6px 12px #c5c5c5,
             -6px -6px 12px #ffffff;""><i class="fa-solid fa-arrow-rotate-left"></i>Tiếp tục mua hàng</a>
<?php
    }
}else {
?>
    <h4 style="color:red;display:inline;">
        <i class="fa-solid fa-angle-left" style="color:red;"></i>
        <a style="color:red;" href='javascript: history.go(-1)'>Trở về</a>
    </h4>
    <h3 style="color:red;display:inline;margin-left:41.5%">Giỏ hàng</h3>
        <br>
        <br>
        <br>
    <div align='center'>
        <i class="fa-solid fa-face-frown fa-2xl"></i>
        <p>Không có sản phẩm nào trong giỏ hàng!</p>
        <button>
            <a href="../pages/index.php">Quay lại trang chủ</a>
        </button>
    </div>
<?php   
}
?>