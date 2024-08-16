<div class="clear"></div>
<div class="main">
    <?php
        if(isset($_GET['action'])&&$_GET['query']){
            $tam=$_GET['action'];
            $query=$_GET['query'];
        }else {
            $tam='';
            $query='';
        }
        if($tam=='quanlidanhmucsanpham'&&$query=='them'){
            include("modules/quanlidanhmucsp/lietke.php");
            include("modules/quanlidanhmucsp/them.php");

        }elseif($tam=='quanlidanhmucsanpham'&&$query=='sua'){
            include("modules/quanlidanhmucsp/sua.php");
            
        }elseif($tam=='quanlisanpham'&&$query=='them'){
            include("modules/quanlisanpham/lietke.php");
            include("modules/quanlisanpham/them.php");
            

        }elseif($tam=='quanlisanpham'&&$query=='sua'){
            include("modules/quanlisanpham/sua.php");

        }elseif($tam=='quanlidonhang'&&$query=='lietke'){
            include("modules/quanlidonhang/lietke.php");
            
        }elseif($tam=='quanliykien'&&$query=='lietke'){
            include("modules/ykien.php");

        }elseif($tam=='donhang'&&$query=='xemdonhang'){
            include("modules/quanlidonhang/donhang.php");
        
        }elseif($tam=='quanlitaikhoan'&&$query=='lietke'){
            include("modules/quanlitaikhoan/lietke.php");
    }
    ?>
</div>