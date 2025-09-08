<?php
require_once 'db_connect.php';

$keyword = isset($_GET['q']) ? $conn->real_escape_string($_GET['q']) : '';

$results = [];
if ($keyword) {
    // Tìm trong bảng bác sĩ
    $sql = "SELECT name, specialty, phone FROM doctors 
            WHERE name LIKE '%$keyword%' OR specialty LIKE '%$keyword%'";
    $res = $conn->query($sql);
    while ($row = $res->fetch_assoc()) {
        $results[] = [
            'type' => 'Bác sĩ',
            'title' => $row['name'],
            'desc' => $row['specialty'] . ' | ' . $row['phone']
        ];
    }

    // Tìm trong bảng dịch vụ
    $sql = "SELECT title, description FROM services 
            WHERE title LIKE '%$keyword%' OR description LIKE '%$keyword%'";
    if ($res = $conn->query($sql)) {
        while ($row = $res->fetch_assoc()) {
            $results[] = [
                'type' => 'Dịch vụ',
                'title' => $row['title'],
                'desc' => $row['description']
            ];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết quả tìm kiếm</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #f9f9f9; }
        h2 { margin-bottom: 20px; }
        .result { background: #fff; padding: 10px; margin-bottom: 10px; border-radius: 5px; }
        .type { color: #007bff; font-weight: bold; }
        .desc { font-size: 14px; color: #555; }
    </style>
</head>
<body>
    <h2>Kết quả tìm kiếm: <?= htmlspecialchars($keyword) ?></h2>
    <?php if ($results): ?>
        <?php foreach ($results as $r): ?>
            <div class="result">
                <div class="type"><?= $r['type'] ?></div>
                <div><strong><?= $r['title'] ?></strong></div>
                <div class="desc"><?= $r['desc'] ?></div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Không tìm thấy kết quả nào.</p>
    <?php endif; ?>
    <a href="index.php">⬅ Quay lại Trang chủ</a>
</body>
</html>
