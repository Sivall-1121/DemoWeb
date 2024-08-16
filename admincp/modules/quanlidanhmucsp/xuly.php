<?php
    include("../../config/config.php");
    $tenloaisp=$_POST['tendanhmuc'];

    $hadm=$_FILES['hadm']['name'];
    $hadm_tmp=$_FILES['hadm']['tmp_name'];
    $hadm=time().'_'.$hadm;
    
    if(isset($_POST['themdanhmuc'])){
        $sql_them="INSERT INTO tbl_danhmuc(ten_danhmuc,img_danhmuc) VALUE('".$tenloaisp."','".$hadm."')";
        mysqli_query($mysqli,$sql_them);
        move_uploaded_file($hadm_tmp,'upload/'.$hadm);
        header('location:../../index.php?action=quanlidanhmucsanpham&query=them');
    }elseif(isset($_POST['suadanhmuc'])){
        if($hadm!=''){
            move_uploaded_file($hadm_tmp,'upload/'.$hadm);
            $sql_sua="UPDATE tbl_danhmuc SET ten_danhmuc='".$tenloaisp."',img_danhmuc='".$hadm."' WHERE id_danhmuc=$_GET[id_danhmuc]";
            //xoa anh cũ
            $sql=" SELECT * FROM  tbl_danhmuc WHERE id_danhmuc='$_GET[id_danhmuc]' LIMIT 1 ";
            $query=mysqli_query($mysqli,$sql);
            while($row = mysqli_fetch_array($query)){
                unlink('upload/'.$row['img_danhmuc']);
            }
        }else{
            $sql_sua="UPDATE tbl_danhmuc SET ten_danhmuc='".$tenloaisp."',img_danhmuc='".$hadm."' WHERE id_danhmuc=$_GET[id_danhmuc]";
        }
        mysqli_query($mysqli,$sql_sua);
        header('location:../../index.php?action=quanlidanhmucsanpham&query=them');
    
    }else{
        $id=$_GET['id_danhmuc'];
        $sql=" SELECT * FROM  tbl_danhmuc WHERE id_danhmuc='".$id."' ";
        $query=mysqli_query($mysqli,$sql);
        while($row = mysqli_fetch_array($query)){
            unlink('upload/'.$row['img_danhmuc']);
        }
        $sql_xoa="DELETE FROM tbl_danhmuc WHERE id_danhmuc='".$id."' ";
        mysqli_query($mysqli,$sql_xoa);
        header('location:../../index.php?action=quanlidanhmucsanpham&query=them');
    }
?>