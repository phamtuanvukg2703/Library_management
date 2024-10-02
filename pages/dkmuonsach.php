<div id ='dkmuonsach'>
    <form method="post">
        <h2>Đăng ký mượn sách</h2>
        <input type="hidden" name="maBandoc" value="<?php if(isset($_SESSION['maBandoc'])) {echo $_SESSION['maBandoc'];}?>">
        <label for="maSach">Mã Sách:</label>
        <input type="text" id="maSach" name="maSach" placeholder="Nhập mã sách" required>
        <label for="hanNhansach">Hạn nhận sách:</label>
        <input type="date" id="hanNhansach" name="hanNhansach" required>
        <button type="submit" class="btn_dk" name ="btn_dkms">Mượn Sách</button>
    </form>
</div>
<?php
    require_once('func.php');
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }
    $conn = connectDB();
    if (isset($_POST['btn_dkms'])){
        $mabandoc = $_SESSION['maBandoc'];
        $masach = $_POST['maSach'];
        $hanNhansach = $_POST['hanNhansach'];
        $check = "SELECT maSach FROM sach WHERE maSach IN (SELECT DISTINCT maSach FROM yeucau WHERE maSach = '$masach' AND hanNhansach >= CURRENT_DATE() AND trangThai = true) OR maSach IN (SELECT DISTINCT maSach FROM muon WHERE maSach = '$masach' AND ngayDatra IS NULL);";
        $result = mysqli_query($conn, $check);
        if(mysqli_num_rows($result)){
            echo '<script type="text/javascript">';
            echo 'alert("Lỗi mượn");';
            echo 'window.location.href = "index.php?page=dkmuonsach";'; 
            echo '</script>';
        }
        else{
            $sql = "INSERT INTO yeucau(maBandoc,maSach,hanNhansach) VALUES ($mabandoc,'$masach','$hanNhansach')";
            if ($conn->query($sql) === TRUE){
                    echo '<script type="text/javascript">';
                    echo 'alert("Đã gửi yêu cầu");';
                    echo 'window.location.href = "index.php?page=dkmuonsach";'; 
                    echo '</script>';
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }    
        }
        }
    $conn->close();
?>