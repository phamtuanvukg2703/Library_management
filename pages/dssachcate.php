<?php
    require_once('func.php');
    $conn = connectDB();
    $theloai = isset($_GET['theloai']) ? $_GET['theloai'] : "";
    $sach_theo_theloai = array();
    $result = getCate($conn, $theloai); 
    $conn->close();
?>
    <div id = 'bookcate'>
        <?php
            if ($result->num_rows > 0) {
                // Hiển thị danh sách sách
                while ($r = $result->fetch_assoc()) {
                    ?>
                    <ul class = "list-book">
                        <a href="pages/sachdetail.php?ids=<?php echo $r['maSach']; ?>">
                        <li><img src="img/<?php echo $r['hinh']?>"></li>
                        <li><h2><?php echo $r['tenSach'] ?></h2></li>
                        <li>tác giả: <?php echo $r['tacGia'] ?></li>
                        <li>Thể loại: <?php echo $r['theLoai'] ?></li>
                        <li>Năm xuất bản: <?php echo $r['namXuatban'] ?></li>
                        <li>Nhà xuất bản: <?php echo $r['nhaXuatban'] ?></li>
                        </a>
                    </ul>
                <?php }
            } else {
            }
        ?>
    </div>