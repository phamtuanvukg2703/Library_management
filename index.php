<?php
    require_once('func.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="/css/bookcate.css">
</head>
<body>
    <div id = 'header'>
        <ul>    
            <li><h2>THƯ VIỆN ONLINE</h2></li>
            <li id = 'search'>
                <form action="pages/searchbooks.php" method="get">
                    <input type='text' name = "search" id = 'text_search' placeholder='Tìm kiếm...' required>
                    <input type="submit" id= 'btn_search' value = 'Tìm'>
                </form>
            </li>
            <?php
            session_start(); // Bắt buộc khi sử dụng session
            // Kiểm tra xem người dùng đã đăng nhập chưa
            if (isset($_SESSION['username'])) {
                // Người dùng đã đăng nhập
                echo '<li class ="login_left"><p>Xin chào ' . $_SESSION['tenBandoc'] . '<p></li>';
                echo '<li><a href="login.php?logout=1">Đăng xuất</a></li>';
            } else {
                // Người dùng chưa đăng nhập, hiển thị thẻ a dẫn đến form đăng nhập
                echo '<li class ="login_left"><a href="login.php">Đăng nhập</a></li>';
            }
            ?>

        </ul>
    </div>
    <div class = 'container'>
        <div class = 'left'>
            <h4>THƯ MỤC</h4>
            <ul>
                <li><a href="?page=dssach">Tất cả sách</a></li>
                <li>
                    <a href="#">Sách theo thể loại</a>
                        <div class = "item_cate">
                            <a href="?page=dssachcate&theloai=Tâm lý học">Tâm lý học</a>
                            <a href="?page=dssachcate&theloai=Khoa học lịch sử">Khoa học lịch sử</a>
                            <a href="?page=dssachcate&theloai=Khoa học viễn tưởng">Khoa học viễn tưởng</a>
                            <a href="?page=dssachcate&theloai=Fantasy">Fantasy</a>
                            <a href="?page=dssachcate&theloai=Khoa học">Khoa học</a>
                            <a href="?page=dssachcate&theloai=Văn học viễn tưởng hài hước">Văn học viễn tưởng hài hước</a>
                        </div>
                </li>
                <li><a href="?page=dkmuonsach">Đăng ký yêu cầu mượn sách</a></li>
                <li><a href="?page=yeucau">Danh sách đã yêu cầu</a></li>
                <li><a href="?page=brw_list">Danh sách đang mượn</a></li>
            </ul> 
        </div>
        <div id="main">
        <?php
         $page = isset($_GET["page"]) ? $_GET["page"] : "";
         switch ($page) {
                case 'dssach':
                    default:
                        require("pages/dssach.php");
                case 'dssachcate':
                    require("pages/dssachcate.php");
                    break;
                case 'dkmuonsach':
                    require("pages/dkmuonsach.php");
                    break;
                case 'yeucau':
                    require("pages/yeucau.php");
                    break;
                case 'brw_list':
                    require("pages/brw_list.php");
                    break;
               };
        ?>
    </div>
        </div>
    </div>
    <div class ='Footer'></div>
</body>
</html>