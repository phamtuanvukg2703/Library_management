<div id = 'yeucau'>
    <h2>Danh sách yêu cầu mượn</h2>
    <?php
    require_once('func.php');
    $conn = connectDB();
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }
    $bandoc = $_SESSION['maBandoc'];
    $sql = "SELECT *
    FROM yeucau, sach
    where yeucau.maSach = sach.maSach and yeucau.maBandoc = $bandoc and yeucau.trangthai = 1 and sach.trangThai = 1";
    $result = mysqli_query($conn,$sql);
    $data = [];
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $data[] = array( 
        'ID' => $row['ID'],
        'maSach' => $row['maSach'],
        'tenSach' => $row['tenSach'],
        'hanNhansach' => $row['hanNhansach'],
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
                <th>Hạn nhận sách</th>
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
                <td><?php echo $row['hanNhansach'] ?></td>
                <td>
            <?php } ?>
        </tbody>
    </table>
</div>