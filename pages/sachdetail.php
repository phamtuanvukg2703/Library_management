<?php
require_once('../func.php');
$conn = connectDB();
$id = $_GET['ids'];
$s = getCTS($conn,$id);
$r = mysqli_fetch_array($s);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dssach.css">
    <title>Chi tiết sách</title>
    <link rel="stylesheet" href="../css/sachdetail.css">
</head>
<body>
    <div id = 'header'>
        <ul>    
            <a href="javascript:history.back()">< Quay lại</a>
            <script>bac</script>
            <li><a href="../index.php">THƯ VIỆN ONLINE</a></li>
        </ul>
    </div>
    <div id = 'main'>
        <div class = 'img'><img src="../img/<?php echo $r['hinh']?>"></div>
        <div class= 'info'>
            <div class = 'name'><h2><?php echo $r['tenSach'] ?></h2></div>
            <div class = 'id'>Mã sách: <?php echo $r['maSach'] ?> </div>
            <div class = 'cate'>Thể loại: <?php echo $r['theLoai'] ?></div>
            <div class = 'author'>Tác giả: <?php echo $r['tacGia'] ?></div>
            <div class ='publishing_year'>Năm xuất bản:<?php echo $r['namXuatban'] ?></div>
            <div class = 'publishing_company'>Nhà xuất bản: <?php echo $r['nhaXuatban'] ?></div>
            <div class = 'desc'>Mô tả: <br><?php echo $r['moTa'] ?></div>
        </div>
    </div>
</body>
</html>
