<header>
    <div class="logo">
        <a href="index.php">
            <img src="../images/logo.png" alt="logo" style="box-shadow:none;width:130px;height:40px">
        </a>
    </div>
    <div class="search">
        <form action="index.php?quanly=timkiem" method="POST">
            <input type="text" class="searchInput" name="tukhoa" placeholder="Tìm kiếm sản phẩm ..." required>
            <button type="submit" class="searchButton">
                <i class="fa-solid fa-magnifying-glass fa-xl"></i>
            </button>
        </form>
    </div>
    <?php
    if (isset($_SESSION['dangnhap'])) {
        $sql = mysqli_query($mysqli, "SELECT ten FROM tbl_dangky WHERE username='" . $_SESSION['dangnhap'] . "' ");
        $row = mysqli_fetch_array($sql);
        if (isset($_GET['dangxuat']) && $_GET['dangxuat'] = 1) {
            unset($_SESSION['dangnhap']);
            header("Location:index.php");
        }
        ?>
        <div class="user">
            <i class="fa-solid fa-user fa-xl" style="color: #000000;"></i>
            Xin chào, <?php echo $row[0] ?>
            <ul class="bonus-user">
                <li> <a href="index.php?quanly=thongtin"> Thông tin tài khoản</a></li>
                <li> <a href="index.php?quanly=doimk"> Đổi mật khẩu</a></li>
                <li> <a href="index.php?dangxuat=1">Đăng xuất</a> </li>
            </ul>
        </div>
        <?php
    } else {
        ?>
        <div class="user" style="margin-top:-47px; margin-right:10px">
            <button>
                <span>
                    <a href="index.php?quanly=dangky"> <b style="color:white"> Đăng ký</b></a>
                </span>
            </button>
            <i class="fa-solid fa-minus fa-rotate-90 fa-xl" style="color: #000000;"></i>
            <button>
                <span>
                    <a href="index.php?quanly=dangnhap"><b style="color:white">Đăng nhập</b></a>
                </span>
            </button>
        </div>
        <?php
    }
    ?>
    <div class="shopping">
        <a href="index.php?quanly=giohang"><i class="fa-solid fa-cart-shopping fa-xl"></i> Giỏ hàng</a>
    </div>
</header>