<?php
// Include file chứa dữ liệu sản phẩm
include 'products.php';

// Lấy số trang hiện tại từ URL
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Xác định số mục trên mỗi trang
$itemsPerPage = 4;

// Tính toán tổng số trang
$totalPages = ceil(count($products) / $itemsPerPage);

// Sử dụng hàm array_slice để lấy các mục cho trang hiện tại
$startIndex = ($currentPage - 1) * $itemsPerPage;
$currentPageItems = array_slice($products, $startIndex, $itemsPerPage);
?>

<!-- Hiển thị sản phẩm -->
<div class="container">
    <div class="row">
    <?php foreach ($currentPageItems as $product): ?>
    <div class="col-md-3">
        <div class="card mb-4">
            <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="<?php echo $product['name']; ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $product['name']; ?></h5>
                <p class="card-text"><?php echo $product['description']; ?></p>
                <p class="card-text">Price: $<?php echo $product['price']; ?></p>
            </div>
        </div>
    </div>
<?php endforeach; ?>

    </div>
</div>


</div>
