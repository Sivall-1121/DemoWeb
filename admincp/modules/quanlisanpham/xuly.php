<?php
    include("../../config/config.php");

    $tensp=$_POST['tensp'];
    $masp=$_POST['masp'];
     //xulianh
    $hasp=$_FILES['hasp']['name'];
    $hasp_tmp=$_FILES['hasp']['tmp_name'];
    $hasp=time().'_'.$hasp;
    $ddsp=$_POST['dacdiem'];
    $gtsp=$_POST['gioithieu'];
    $giasp=$_POST['giasp'];
    $slsp=$_POST['slsp'];
    $ttsp=$_POST['ttsp'];
    $ggsp=$_POST['ggsp'];
    $dmsp=$_POST['dmsp'];

    if(isset($_POST['themsanpham'])){
        $ma="SELECT ma_sanpham FROM tbl_sanpham";
        $query_masp=mysqli_query($mysqli,$ma);
        $dem=0;
        if($tensp==""||$masp==""||$hasp==""||$ddsp==""||$gtsp==""||$giasp==""||$slsp==""||$ttsp==""||$dmsp==""||$ggsp==""){
            echo '<script type="text/javascript">  alert("Bạn chưa điền đủ thông tin.") </script>';
            header('Location:../../index.php?action=quanlisanpham&query=them');
        }else{
            while($row=mysqli_fetch_array($query_masp)){
                if($masp==$row[0]){
                    $dem++;
                }
            }
            if($dem>0){
                echo '<script type="text/javascript">  alert("Mã sản phẩm này đã tồn tại.") </script>';
                header('Location:../../index.php?action=quanlisanpham&query=them');
            }else{
                $sql_them="INSERT INTO tbl_sanpham(id_danhmuc,ten_sanpham,ma_sanpham,ha_sanpham,dd_sanpham,gt_sanpham,gia_sanpham,sl_sanpham,tt_sanpham,giamgia) 
                        VALUE('".$dmsp."','".$tensp."','".$masp."','".$hasp."','".$ddsp."','".$gtsp."','".$giasp."','".$slsp."','".$ttsp."','".$ggsp."')";
                mysqli_query($mysqli,$sql_them);
                move_uploaded_file($hasp_tmp,'upload/'.$hasp);
                header('location:../../index.php?action=quanlisanpham&query=them');
            }
        }

    }elseif(isset($_POST['suasanpham'])){
        if($hasp!=''){

            move_uploaded_file($hasp_tmp,'upload/'.$hasp);

            $sql_sua_sp="UPDATE tbl_sanpham SET id_danhmuc='".$dmsp."',ten_sanpham='".$tensp."',ha_sanpham='".$hasp."',dd_sanpham='".$ddsp."',
            gt_sanpham='".$gtsp."',gia_sanpham='".$giasp."',sl_sanpham='".$slsp."',tt_sanpham='".$ttsp."',giamgia='".$ggsp."' WHERE ma_sanpham='$_GET[ma_sanpham]'";
            //xoa anh cũ
            $sql=" SELECT * FROM  tbl_sanpham WHERE ma_sanpham='$_GET[ma_sanpham]' LIMIT 1 ";
            $query=mysqli_query($mysqli,$sql);
             while($row = mysqli_fetch_array($query)){
                unlink('upload/'.$row['ha_sanpham']);
            }
        }else{
            $sql_sua_sp="UPDATE tbl_sanpham SET id_danhmuc='".$dmsp."',ten_sanpham='".$tensp."',ha_sanpham='".$hasp."',dd_sanpham='".$ddsp."',
            gt_sanpham='".$gtsp."',gia_sanpham='".$giasp."',sl_sanpham='".$slsp."',tt_sanpham='".$ttsp."',giamgia='".$ggsp."' WHERE ma_sanpham='$_GET[ma_sanpham]'";
        }
        mysqli_query($mysqli,$sql_sua_sp);
        header('location:../../index.php?action=quanlisanpham&query=them');
    }else{
        $id=$_GET['ma_sanpham'];
        $sql=" SELECT * FROM  tbl_sanpham WHERE ma_sanpham='".$id."' LIMIT 1 ";
        $query=mysqli_query($mysqli,$sql);
        while($row = mysqli_fetch_array($query)){
            unlink('upload/'.$row['ha_sanpham']);
        }
        $sql_xoa_sp=" DELETE FROM tbl_sanpham WHERE ma_sanpham='".$id."' ";
        mysqli_query($mysqli,$sql_xoa_sp);
        header('location:../../index.php?action=quanlisanpham&query=them');
    }
?>