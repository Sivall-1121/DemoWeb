<?php
    if(isset($_GET['quanly'])){
        $tam=$_GET['quanly'];
    }else {
        $tam=' ';
    }
    if($tam==' '){
        include("menu.php");
    }
?>
<div id="main">
        <?php
        if($tam=='danhmucsanpham'){
            include("right/danhmuc.php");

        }elseif($tam=='sanpham'){
            include("right/sanpham.php");
        
        }elseif($tam=='allsanpham'){
            include("right/allsanpham.php");

        }elseif($tam=='giohang'){
            include("main/giohang.php");

        }elseif($tam=='thanhtoan'){
            include("main/thanhtoan.php");

        }elseif($tam=='dathang'){
            include("main/dathang.php");

        }elseif($tam=='dangky'){
            header("Location:main/dangky.php");

        }elseif($tam=='timkiem'){
                include("main/timkiem.php");
    
        }elseif($tam=='dangnhap'){
            header("Location:../account/login.php");

        }elseif($tam=='ykien'){
                include("main/ykien.php"); 

        }else{
            include("left/menu.php");
        ?>
        <div class="maincontent">
            <?php   
            if($tam=='doimk'){
                include("main/doimk.php");

            }elseif($tam=='capnhattt'){
                include("main/capnhattt.php");  

            }elseif($tam=='thongtin'){
                include("main/thongtin.php");  

            }else{
                include("right/index.php");
            ?>
            </div>
            <div class="clear"></div>
                <?php
                    include("right/index2.php");}
                ?>
        </div>        
        <?php
        }
    ?>
</div>
<div class="clear"></div>
