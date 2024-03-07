<?php
// Hiển thị các liên kết điều hướng với tham số GET để chuyển trang
echo '<div class="pagination">';
if ($currentPage > 1) {
    echo '<a href="?page=' . ($currentPage - 1) . '">Previous</a>';
}
for ($i = 1; $i <= $totalPages; $i++) {
    if ($i == $currentPage) {
        echo '<span class="active">' . $i . '</span>';
    } else {
        echo '<a href="?page=' . $i . '">' . $i . '</a>';
    }
}
if ($currentPage < $totalPages) {
    echo '<a href="?page=' . ($currentPage + 1) . '">Next</a>';
}
echo '</div>';
?>
