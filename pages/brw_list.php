<div id = 'brw_list'>
    <h2>Danh sách đang mượn</h2>
    <?php
    require_once('func.php');
    $conn = connectDB();
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }
    $bandoc = $_SESSION['maBandoc'];
    $sql = "SELECT muon.ID, muon.maSach,sach.tenSach,muon.ngayMuon,muon.ngayTradukien
    FROM muon , sach
    where muon.maSach = sach.maSach
    and muon.ngayDatra = 0
    and muon.maBandoc = $bandoc";
    $result = mysqli_query($conn,$sql);
    $data = [];
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $data[] = array( 
        'ID' => $row['ID'],
        'maSach' => $row['maSach'],
        'tenSach' =>$row['tenSach'],
        'ngayMuon' => $row['ngayMuon'],
        'ngayTradukien' => $row['ngayTradukien'],
        );
    }
    $conn->close();
    ?>
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã Sách</th>
                <th>Tên sách</th>
                <th>Ngày mượn</th>
                <th>Ngày dự kiến trả</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if (count($data)==0) { ?>
            <tr>
                <td colspan="10">không có dữ liệu</td>
            </tr>
        <?php }
        else 
            foreach ($data as $row) {?>
            <tr>
                <td><?php echo $row['ID']; ?></td>
                <td><?php echo $row['maSach']; ?></td>
                <td><?php echo $row['tenSach']; ?></td>
                <td><?php echo $row['ngayMuon']; ?></td>
                <td><?php echo $row['ngayTradukien']; ?></td>
                <td>
            <?php } ?>
        </tbody>
    </table>
</div>