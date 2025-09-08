<?php
require_once 'db_connect.php';

$table = $_GET['table']; // Bảng cần thêm/sửa
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Lấy danh sách cột của bảng
$columns = [];
$res = $conn->query("SHOW COLUMNS FROM `$table`");
while ($col = $res->fetch_assoc()) {
    if ($col['Field'] != 'id') {
        $columns[] = $col['Field'];
    }
}

// Nếu sửa, lấy dữ liệu hiện có
$values = [];
if ($id) {
    $res = $conn->query("SELECT * FROM `$table` WHERE id=$id");
    $values = $res->fetch_assoc();
}

// Xử lý khi form submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [];
    foreach ($columns as $col) {
        $data[$col] = $_POST[$col];
    }

    if ($id) {
        // Cập nhật dữ liệu
        $set = [];
        foreach ($data as $col => $val) {
            $set[] = "`$col`='" . $conn->real_escape_string($val) . "'";
        }
        $sql = "UPDATE `$table` SET " . implode(',', $set) . " WHERE id=$id";
    } else {
        // Thêm dữ liệu mới
        $cols = implode(',', array_keys($data));
        $vals = "'" . implode("','", array_map([$conn, 'real_escape_string'], array_values($data))) . "'";
        $sql = "INSERT INTO `$table` ($cols) VALUES ($vals)";
    }

    $conn->query($sql);
    header("Location: manage.php?table=$table");
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title><?= $id ? "Sửa" : "Thêm" ?> <?= ucfirst($table) ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: #f5f6fa;
        }
        h2 { margin-bottom: 20px; }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 6px;
            box-shadow: 0 0 8px rgba(0,0,0,0.05);
            max-width: 500px;
        }
        label { font-weight: bold; display: block; margin-top: 10px; }
        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            margin-top: 15px;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            background: #007bff;
            color: white;
            cursor: pointer;
        }
        button:hover { background: #0056b3; }
        .btn-back {
            background: #6c757d;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <a href="manage.php?table=<?= $table ?>"><button class="btn-back"><i class="fa fa-arrow-left"></i> Quay lại</button></a>
    <h2><?= $id ? "Sửa" : "Thêm" ?> <?= ucfirst($table) ?></h2>
    <form method="post">
        <?php foreach ($columns as $col): ?>
            <label><?= ucfirst($col) ?>:</label>
            <input type="<?= ($col == 'date') ? 'date' : 'text' ?>" name="<?= $col ?>" value="<?= htmlspecialchars($values[$col] ?? '') ?>">
        <?php endforeach; ?>
        <button type="submit"><?= $id ? "Cập nhật" : "Thêm mới" ?></button>
    </form>
</body>
</html>
