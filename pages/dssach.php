<div id ='allbooks'>
    <?php
    require_once('func.php');
    $conn = connectDB();
    $dss = getBook($conn);
    $i = 1;
    while ($r = mysqli_fetch_array($dss)){
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
    <?php $i++;
    }
    ?>
</div>