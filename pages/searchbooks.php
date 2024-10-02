<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dssach.css">
    <title>Danh sách tìm kiếm sách</title>
    <link rel="stylesheet" href="../css/searchbooks.css">
</head>
<body>
    <div id = 'header'>
        <ul>    
            <a href="javascript:history.back()">< Quay lại</a>
            <script>bac</script>
            <li><a href="../index.php">THƯ VIỆN ONLINE</a></li>
        </ul>
    </div>
<?php
require_once('../func.php');
$conn = connectDB();

if(isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM sach WHERE tenSach LIKE '%$search%' and trangthai = '1'";
    $result = mysqli_query($conn, $sql);
}
?>
<h3 class = 'title'>Kết quả tìm kiếm:</h3> <br>
<div id = 'main'>
<?php
    if(isset($_GET['search'])) {
        if ($result->num_rows > 0) {
            while($r = $result->fetch_assoc()) {   
                ?>
                <ul class = "list-book">
                    <a href="sachdetail.php?ids=<?php echo $r['maSach']; ?>">
                    <li><img src="../img/<?php echo $r['hinh']?>"></li>
                    <li><h2><?php echo $r['tenSach'] ?></h2></li>
                    <li>tác giả: <?php echo $r['tacGia'] ?></li>
                    <li>Thể loại: <?php echo $r['theLoai'] ?></li>
                    <li>Năm xuất bản: <?php echo $r['namXuatban'] ?></li>
                    <li>Nhà xuất bản: <?php echo $r['nhaXuatban'] ?></li>
                    </a>
                </ul>
            <?php }
        } else {
            echo "<p>Không tìm thấy kết quả.</p>";
        }
    } 
?>
</div>
</body>
</html>

