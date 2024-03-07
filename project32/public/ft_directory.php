<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Danh Bạ nổi bật</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-PMaCV4aH/bA6e1uov4P4flc+i+iaPnsnGaHO5fv1+cBm2uBiJykgxDV9GDdMdJCB" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/home.css">

  <style>
    /* Custom CSS */
    /* Viết CSS tùy chỉnh ở đây */
  </style>
</head>
<body>

<?php
include 'C:\laragon\www\project32\app\views\header.php';
?>
<!-- Banner -->
<section id="banner" class="py-5">
    <div class="container text-center">
        <h1 class="display-4">DANH BẠ ĐIỆN TỬ</h1>
        <p class="lead">Tra cứu thông tin cán bộ, giảng viên .</p>
        <form action="#" method="GET" class="form-inline justify-content-center">
            <input type="text" name="search" class="form-control mr-2" placeholder="Tìm kiếm theo tên">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form>
    </div>
</section>
<div class="container rounded">
    <h3 class="mb-3">Ban Giám Hiệu</h2>
    <div class="row">
        <?php
        // Kết nối đến cơ sở dữ liệu
        include 'C:\laragon\www\project32\app\database.php';
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Truy vấn dữ liệu từ bảng Employees
        $sql = "SELECT * FROM Employees  where DepartmentID = '6'"; // Giới hạn chỉ lấy 4 bản ghi
        $result = $conn->query($sql);

        // Kiểm tra số lượng bản ghi trả về
        if ($result->num_rows > 0) {
            // Duyệt qua từng bản ghi và hiển thị thông tin
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="<?php echo $row['Avatar']; ?>" class="card-img-top img-fluid" alt="...">
                        <div class="card-body"> 
                            <h5 class="card-title text-center"><?php echo $row['FullName']; ?></h5>
                            <p class="card-text text-center"><?php echo $row['Position']; ?></p>
                            <a href="#" class="btn btn-primary">Chi Tiết</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "Không có nhân viên nào trong cơ sở dữ liệu.";
        }
        $conn->close();
        ?>
    </div>
    
</div>
<div class="container rounded">
    <h3 class="mb-3">Khoa Công Nghệ Thông Tin</h2>
    <div class="row">
        <?php
        // Kết nối đến cơ sở dữ liệu
        include 'C:\laragon\www\project32\app\database.php';
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Truy vấn dữ liệu từ bảng Employees
        $sql = "SELECT * FROM Employees  where DepartmentID = '1'"; // Giới hạn chỉ lấy 4 bản ghi
        $result = $conn->query($sql);

        // Kiểm tra số lượng bản ghi trả về
        if ($result->num_rows > 0) {
            // Duyệt qua từng bản ghi và hiển thị thông tin
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="<?php echo $row['Avatar']; ?>" class="card-img-top img-fluid" alt="...">
                        <div class="card-body"> 
                            <h5 class="card-title text-center"><?php echo $row['FullName']; ?></h5>
                            <p class="card-text text-center"><?php echo $row['Position']; ?></p>
                            <a href="#" class="btn btn-primary">Chi Tiết</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "Không có nhân viên nào trong cơ sở dữ liệu.";
        }
        $conn->close();
        ?>
    </div>
    
</div>
<?php
include 'C:\laragon\www\project32\app\views\footer.php'; // Include footer
?>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
