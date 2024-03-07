<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <!-- Link đến file CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-PMaCV4aH/bA6e1uov4P4flc+i+iaPnsnGaHO5fv1+cBm2uBiJykgxDV9GDdMdJCB" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/home.css">
    <style>
        .search-container {
            border: 1px solid #000;
            padding: 20px;
            border-radius: 5px;
        }
 
        .result-table th, .result-table td {
            border: 1px solid #000;
            padding: 8px;
        }
    </style>
</head>
<body>

<?php
include 'C:\laragon\www\project32\app\views\header.php';

// Kết nối đến cơ sở dữ liệu
include 'C:\laragon\www\project32\app\database.php';

?>

<h2 class="text-center mb-4"></h2>
<h2 class="text-center mb-4">Tìm kiếm nâng cao</h2>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="search-container">
                <form action="#" method="GET">
                    <div class="form-group">
                        <label for="unit">Phòng/Ban</label>
                        <select class="form-control" name="unit" id="unit">
                            <option value="">-- Vui lòng chọn --</option>
                            <?php
                            // Truy vấn dữ liệu từ bảng Departments
                            $sqlDepartments = "SELECT DepartmentName FROM Departments";
                            $resultDepartments = $conn->query($sqlDepartments);
                            
                            // Duyệt qua các dòng kết quả từ truy vấn và tạo option cho select
                            if ($resultDepartments->num_rows > 0) {
                                while($row = $resultDepartments->fetch_assoc()) {
                                    echo "<option value='" . $row['DepartmentName'] . "'>" . $row['DepartmentName'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="position">Chức vụ</label>
                        <select class="form-control" name="position" id="position">
                            <option value="">-- Vui lòng chọn --</option>
                            <?php
                            // Truy vấn dữ liệu từ bảng Employees
                            $sqlEmployees = "SELECT DISTINCT Position FROM Employees";
                            $resultEmployees = $conn->query($sqlEmployees);
                            
                            // Duyệt qua các dòng kết quả từ truy vấn và tạo option cho select
                            if ($resultEmployees->num_rows > 0) {
                                while($row = $resultEmployees->fetch_assoc()) {
                                    echo "<option value='" . $row['Position'] . "'>" . $row['Position'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Tên:</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Địa chỉ Email:</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
                    <div class="text-center">
                        <button type="submit" name="search" class="btn btn-primary">Tìm Kiếm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <h2 class="text-center mb-4"></h2>

</div>
<?php
// Kiểm tra xem có sự kiện tìm kiếm được gửi đi không
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    // Lấy dữ liệu từ form
    $unit = $_GET['unit'];
    $position = $_GET['position'];
    $name = $_GET['name'];
    $email = $_GET['email'];

    // Khởi tạo câu truy vấn cơ sở
    $sql = "SELECT Employees.*, Departments.DepartmentName 
            FROM Employees 
            INNER JOIN Departments ON Employees.DepartmentID = Departments.DepartmentID";

    // Kiểm tra và thêm điều kiện vào câu truy vấn
    $conditions = array();
    if (!empty($unit)) {
        $conditions[] = "Departments.DepartmentName = '" . $unit . "'";
    }
    if (!empty($position)) {
        $conditions[] = "Employees.Position = '" . $position . "'";
    }
    if (!empty($name)) {
        $conditions[] = "Employees.FullName = '" . $name . "'";
    }
    if (!empty($email)) {
        $conditions[] = "Employees.Email = '" . $email . "'";
    }

    // Nếu có điều kiện được thêm vào câu truy vấn, thêm vào phần WHERE
    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }

    // Thực hiện truy vấn
    $result = $conn->query($sql);

    // Kiểm tra nếu có dữ liệu trả về
    if ($result->num_rows > 0) {
        // Hiển thị dữ liệu
        echo "<div class='container'>";
        echo "<h3>Kết quả tìm kiếm:</h3>";
        echo "<div class='result-container'>";
        echo "<table class='result-table'>";
        echo "<tr>";
        echo "<th>Tên</th>";
        echo "<th>Chức vụ</th>";
        echo "<th>Phòng ban</th>";
        echo "<th>Email</th>";
        echo "<th>Số điện thoại</th>";
        echo "<th></th>"; // Thêm cột cho nút "Xem thêm"
        echo "</tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['FullName'] . "</td>";
            echo "<td>" . $row['Position'] . "</td>";
            echo "<td>" . $row['DepartmentName'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['MobilePhone'] . "</td>"; // Hiển thị số điện thoại
            echo "<td><button class='btn btn-primary'>Xem chi tiết</button></td>"; // Thêm nút "Xem thêm"
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        echo "</div>";
    } else {
        echo "Không tìm thấy kết quả phù hợp";
    }
}

?>
<h2 class="text-center mb-4"></h2>

</body>
</html>
