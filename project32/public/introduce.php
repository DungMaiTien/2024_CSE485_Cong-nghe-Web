<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới thiệu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-PMaCV4aH/bA6e1uov4P4flc+i+iaPnsnGaHO5fv1+cBm2uBiJykgxDV9GDdMdJCB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/ft.css">
    <style>
        
        .container-border {
            border: 2px solid black;
            padding: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<?php
include 'C:\laragon\www\project32\app\views\header.php';
?>
<div class="my-5"></div>

<div class="container">
    <div class="container-border">
        <h2>1. Giới thiệu về tổ chức</h2>
        <p>Trường Đại Học Thủy Lợi chúng tôi là một trường đại học hàng đầu, chuyên đào tạo nguồn nhân lực chất lượng cao đa lĩnh vực về Công trình Thủy, Công nghệ thông tin và các ngành liên quan. Với lịch sử lâu dài và uy tín được khẳng định, chúng tôi cam kết mang lại môi trường học tập và nghiên cứu tiên tiến, cùng với các cơ hội phát triển nghề nghiệp cho sinh viên.</p>
    </div>

    <div class="container-border">
        <h2>2. Tính năng chính của website</h2>
        <ul>
            <li>Tra cứu thông tin cán bộ, giảng viên và nhân viên của trường.</li>
            <li>Liên lạc và kết nối dễ dàng với thành viên trong tổ chức.</li>
            <li>Tìm kiếm linh hoạt với giao diện dễ sử dụng.</li>
        </ul>
    </div>

    <div class="container-border">
        <h2>3. Thống kê số liệu</h2>
        <?php
        // Kết nối đến cơ sở dữ liệu
        include 'C:\laragon\www\project32\app\database.php';
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Truy vấn số lượng đơn vị
        $sql_units = "SELECT COUNT(*) AS total_departments FROM Departments";
        $result_units = $conn->query($sql_units);
        $row_units = $result_units->fetch_assoc();

        // Truy vấn số lượng nhân viên
        $sql_employees = "SELECT COUNT(*) AS total_employees FROM Employees";
        $result_employees = $conn->query($sql_employees);
        $row_employees = $result_employees->fetch_assoc();
        ?>
        
        <p>Số lượng đơn vị : <?php echo $row_units['total_departments']; ?></p>
        <p>Số lượng nhân viên : <?php echo $row_employees['total_employees']; ?></p>
        
        <?php
        // Đóng kết nối
        $conn->close();
        ?>
    </div>
   
</body>
<?php
include 'C:\laragon\www\project32\app\views\footer.php';
?>
</html>
