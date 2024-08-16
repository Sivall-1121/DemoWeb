<?php
    session_start();
    include("../../admincp/config/config.php");
    //them sp
    if($_POST['themgh']){
        $ma=$_GET['ma_sanpham'];
        $sql=" SELECT * FROM tbl_sanpham WHERE ma_sanpham='".$ma."' LIMIT 1 ";
        $query=mysqli_query($mysqli,$sql);
        $row=mysqli_fetch_array($query);
        $soluong=1;
        if($row){
            $gg=$row['giamgia'];
            $gia=$row['gia_sanpham']*(100-$gg)/100;
            $new_product=array(array('giamgia' =>$row['giamgia'] ,'ten_sanpham' =>$row['ten_sanpham'] ,'ma_sanpham' =>$row['ma_sanpham'] ,
                'sl_sanpham' =>$soluong,'gia_sanpham' =>$gia ,'ha_sanpham' =>$row['ha_sanpham'] ));
            //kiem tra session gio hang ton tai?
            if(isset($_SESSION['cart'])){
                $found=false;
                foreach ($_SESSION['cart'] as $cart_item) {
                    if($cart_item['ma_sanpham']==$ma){
                        //du lieu trung
                        $soluong=$cart_item['sl_sanpham']+1;
                        $product[]=array('giamgia' =>$cart_item['giamgia'],'ten_sanpham' =>$cart_item['ten_sanpham'] ,'ma_sanpham' =>$cart_item['ma_sanpham'] 
                        ,'sl_sanpham' =>$soluong,'gia_sanpham' =>$cart_item['gia_sanpham'],'ha_sanpham' =>$cart_item['ha_sanpham'] );
                        $found=true;
                    }else{
                        //du lieu rong
                        $product[]=array('giamgia' =>$cart_item['giamgia'],'ten_sanpham' =>$cart_item['ten_sanpham'] ,'ma_sanpham' =>$cart_item['ma_sanpham'] 
                        ,'sl_sanpham' =>$cart_item['sl_sanpham'],'gia_sanpham' =>($cart_item['gia_sanpham']*(100-$cart_item['giamgia'])/100),'ha_sanpham' =>$cart_item['ha_sanpham'] );
                    }
                    if($found==false){
                        //lien ket du lieu
                        $_SESSION['cart']=array_merge($product,$new_product);
                    }else{
                        $_SESSION['cart']=$product;
                    }
                }
            }else {
                $_SESSION['cart']=$new_product;
            }
        }
        header('Location:../index.php?quanly=giohang');
    }
    //xoa sp
    if(isset($_SESSION['cart'])&&isset($_GET['xoa'])){
        $ma=$_GET['xoa'];
        foreach ($_SESSION['cart'] as $cart_item) {
            if($cart_item['ma_sanpham']!=$ma){
                $product[]=array('giamgia' =>$cart_item['giamgia'],'ten_sanpham' =>$cart_item['ten_sanpham'] ,'ma_sanpham' =>$cart_item['ma_sanpham'] 
                ,'sl_sanpham' =>$cart_item['sl_sanpham'],'gia_sanpham' =>($cart_item['gia_sanpham']*(100-$cart_item['giamgia'])/100),'ha_sanpham' =>$cart_item['ha_sanpham'] );
            }
            $_SESSION['cart']=$product;
            header('Location:../index.php?quanly=giohang');
        }
    }
    //xoa tat ca san pham
    if(isset($_GET['lammoi'])&&$_GET['lammoi']==1){
        unset($_SESSION['cart']);
        header('Location:../index.php?quanly=giohang');
    }
    //them so luong
    if(isset($_GET['cong'])){
        $ma=$_GET['cong'];
        foreach ($_SESSION['cart'] as $cart_item) {
            if($cart_item['ma_sanpham']!=$ma){
                $product[]=array('giamgia' =>$cart_item['giamgia'],'ten_sanpham' =>$cart_item['ten_sanpham'] ,'ma_sanpham' =>$cart_item['ma_sanpham'] 
                ,'sl_sanpham' =>$cart_item['sl_sanpham'],'gia_sanpham' =>$cart_item['gia_sanpham'],'ha_sanpham' =>$cart_item['ha_sanpham'] );
                $_SESSION['cart']=$product;
            }else{
                $soluong=$cart_item['sl_sanpham']+1;
                $product[]=array('giamgia' =>$cart_item['giamgia'],'ten_sanpham' =>$cart_item['ten_sanpham'] ,'ma_sanpham' =>$cart_item['ma_sanpham'] 
                ,'sl_sanpham' =>$soluong,'gia_sanpham' =>$cart_item['gia_sanpham'],'ha_sanpham' =>$cart_item['ha_sanpham'] );
                $_SESSION['cart']=$product;
            }
        }
        header('Location:../index.php?quanly=giohang');
    }
    //tru so luong
    if(isset($_GET['tru'])){
        $ma=$_GET['tru'];
        foreach ($_SESSION['cart'] as $cart_item) {
            if($cart_item['ma_sanpham']!=$ma){
                $product[]=array('giamgia' =>$cart_item['giamgia'],'ten_sanpham' =>$cart_item['ten_sanpham'] ,'ma_sanpham' =>$cart_item['ma_sanpham'] 
                ,'sl_sanpham' =>$cart_item['sl_sanpham'],'gia_sanpham' =>$cart_item['gia_sanpham'],'ha_sanpham' =>$cart_item['ha_sanpham'] );
                $_SESSION['cart']=$product;
            }else{
                $soluong=$cart_item['sl_sanpham']-1;
                if($soluong>0){
                    $product[]=array('giamgia' =>$cart_item['giamgia'],'ten_sanpham' =>$cart_item['ten_sanpham'] ,'ma_sanpham' =>$cart_item['ma_sanpham'] 
                    ,'sl_sanpham' =>$soluong,'gia_sanpham' =>$cart_item['gia_sanpham'],'ha_sanpham' =>$cart_item['ha_sanpham'] );
                    $_SESSION['cart']=$product;
                }else{
                    unset($_SESSION['cart']);
                }
                
            }
        }
        header('Location:../index.php?quanly=giohang');
    }
?>