<?php
require_once 'db_connect.php';

// Lấy tên bảng từ URL (mặc định là patients)
$table = isset($_GET['table']) ? $_GET['table'] : 'patients';

// Xử lý xóa dữ liệu
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM `$table` WHERE id=$id");
    header("Location: manage.php?table=$table");
    exit();
}

// Lấy dữ liệu từ database
$sql = "SELECT * FROM `$table`";
$result = $conn->query($sql);

$currentData = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $currentData[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý <?= ucfirst($table) ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: #f5f6fa;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
            background: #fff;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 0 8px rgba(0,0,0,0.05);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background: #007bff;
            color: white;
        }
        td {
            background: #fff;
        }
        button {
            padding: 5px 10px;
            margin: 2px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        .btn-add { background: #28a745; color: #fff; }
        .btn-edit { background: #ffc107; color: #000; }
        .btn-delete { background: #dc3545; color: #fff; }
        .btn-back { background: #6c757d; color: #fff; margin-bottom: 15px; }
        a { text-decoration: none; }
    </style>
</head>
<body>
    <a href="index.html"><button class="btn-back"><i class="fa fa-arrow-left"></i> Quay lại</button></a>
    <h2>Quản lý <?= ucfirst($table) ?></h2>

    <a href="form.php?table=<?= $table ?>"><button class="btn-add"><i class="fa fa-plus"></i> Thêm mới</button></a>

    <table>
        <tr>
            <?php if (!empty($currentData)): ?>
                <?php foreach (array_keys($currentData[0]) as $col): ?>
                    <th><?= ucfirst($col) ?></th>
                <?php endforeach; ?>
                <th>Hành động</th>
            <?php else: ?>
                <th>Không có dữ liệu</th>
            <?php endif; ?>
        </tr>
        <?php foreach ($currentData as $row): ?>
            <tr>
                <?php foreach ($row as $value): ?>
                    <td><?= htmlspecialchars($value) ?></td>
                <?php endforeach; ?>
                <td>
                    <a href="form.php?table=<?= $table ?>&id=<?= $row['id'] ?>">
                        <button class="btn-edit"><i class="fa fa-pen"></i> Sửa</button>
                    </a>
                    <button class="btn-delete" onclick="if(confirm('Bạn có chắc muốn xóa?')) location.href='manage.php?table=<?= $table ?>&delete=<?= $row['id'] ?>'">
                        <i class="fa fa-trash"></i> Xóa
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
