
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đặt lịch khám bác sĩ</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background: #f5f8fa;
        }
        .booking-main {
            display: flex;
            gap: 32px;
            max-width: 950px;
            margin: 40px auto 0 auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 32px 32px 32px 32px;
        }
        .booking-left {
            flex: 1.2;
            border-right: 1px solid #f0f0f0;
            padding-right: 32px;
        }
        .booking-doctor-img {
            width: 110px;
            height: 110px;
            border-radius: 18px;
            object-fit: cover;
            border: 3px solid #e6f7ff;
            margin-bottom: 18px;
        }
        .booking-doctor-name {
            font-size: 1.35em;
            font-weight: bold;
            color: #2d3a4b;
            margin-bottom: 6px;
        }
        .booking-doctor-specialty {
            color: #1abc9c;
            font-size: 1.08em;
            margin-bottom: 8px;
        }
        .booking-desc {
            color: #444;
            font-size: 1em;
            margin-bottom: 18px;
        }
        .booking-right {
            flex: 1.1;
            min-width: 320px;
        }
        .booking-box {
            background: #eaf7ff;
            border-radius: 12px;
            padding: 24px 20px 20px 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }
        .booking-box h3 {
            margin: 0 0 18px 0;
            font-size: 1.18em;
            color: #007bff;
            letter-spacing: 1px;
        }
        .booking-date {
            margin-bottom: 14px;
        }
        .booking-date select {
            padding: 6px 12px;
            border-radius: 6px;
            border: 1px solid #b2d6f7;
            font-size: 1em;
        }
        .booking-times-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 18px;
        }
        .booking-time-btn {
            background: #fffbe6;
            border: 1px solid #ffe58f;
            border-radius: 7px;
            padding: 8px 18px;
            font-size: 1em;
            cursor: pointer;
            transition: background 0.2s, border 0.2s;
        }
        .booking-time-btn.selected,
        .booking-time-btn:hover {
            background: #ffe58f;
            border: 1.5px solid #f7b500;
        }
        .booking-location {
            margin-bottom: 18px;
            color: #444;
            font-size: 1em;
        }
        .btn-book {
            background: #00bfae;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px 32px;
            font-size: 1.08em;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
            margin-top: 8px;
        }
        .btn-book:hover {
            background: #009e8e;
        }
        @media (max-width: 900px) {
            .booking-main { flex-direction: column; padding: 18px 6vw;}
            .booking-left { border-right: none; border-bottom: 1px solid #f0f0f0; padding-right: 0; margin-bottom: 24px;}
        }
    </style>
    <script>
        // Chọn giờ khám
        document.addEventListener('DOMContentLoaded', function() {
            const timeBtns = document.querySelectorAll('.booking-time-btn');
            timeBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    timeBtns.forEach(b => b.classList.remove('selected'));
                    btn.classList.add('selected');
                    document.getElementById('selected-time').value = btn.innerText;
                });
            });
        });

        // Hiển thị popup xác nhận đặt lịch
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.booking-box form');
    if(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const date = form.querySelector('[name="date"]').value;
            const time = form.querySelector('[name="time"]').value;
            if(!time) {
                alert('Vui lòng chọn khung giờ khám!');
                return;
            }
            document.getElementById('popup-info').innerHTML =
                `<b>Ngày khám:</b> ${date}<br><b>Giờ khám:</b> ${time}`;
            document.getElementById('booking-success-popup').style.display = 'flex';
        });
    }
});

    </script>
</head>
<body>
    <a href="index.html" style="display:inline-block;margin:18px 0 0 24px;padding:8px 18px;background:#007bff;color:#fff;border-radius:7px;text-decoration:none;font-weight:500;box-shadow:0 2px 8px rgba(0,0,0,0.06);transition:background 0.2s;">← Quay lại trang chủ</a>
    <!-- ...existing code... -->
<?php

// ... PHP lấy dữ liệu bác sĩ như cũ ...
$doctor_id = $_GET['doctor_id'] ?? '';
$doctors = [
    'bs1' => [
        'img' => 'https://randomuser.me/api/portraits/women/44.jpg',
        'name' => 'PGS.TS. Nguyễn Thị Hoài An',
        'specialty' => 'Tai Mũi Họng - Nhi khoa',
        'location' => 'Bệnh viện Đa khoa An Việt, Số 1E Trường Chinh, Thanh Xuân, Hà Nội',
        'desc' => 'Phó Giáo sư, Tiến sĩ chuyên ngành Tai Mũi Họng. Hơn 25 năm kinh nghiệm, từng công tác tại nhiều bệnh viện lớn. Đặc biệt chuyên sâu khám và điều trị cho trẻ em.'
    ],
    'bs2' => [
        'img' => 'https://randomuser.me/api/portraits/men/32.jpg',
        'name' => 'GS.TS. Nguyễn Duy Hưng',
        'specialty' => 'Da liễu',
        'location' => 'Bệnh viện Da liễu Trung ương, 15A Phương Mai, Hà Nội',
        'desc' => 'Giáo sư, Tiến sĩ chuyên ngành Da liễu. Chuyên khám và điều trị các bệnh về da, tư vấn chăm sóc da chuyên sâu, hơn 30 năm kinh nghiệm.'
    ],
    'bs3' => [
        'img' => 'https://randomuser.me/api/portraits/men/45.jpg',
        'name' => 'GS.TS. Đào Văn Long',
        'specialty' => 'Tiêu hóa - Viêm gan',
        'location' => 'Bệnh viện Bạch Mai, 78 Giải Phóng, Hà Nội',
        'desc' => 'Giáo sư, Tiến sĩ chuyên ngành Tiêu hóa - Viêm gan. Đã điều trị thành công cho hàng nghìn bệnh nhân, chuyên sâu về các bệnh lý gan mật.'
    ]
];
$doctor = $doctors[$doctor_id] ?? null;
?>
<div class="booking-main">
    <?php if ($doctor): ?>
    <!-- Cột trái: Thông tin bác sĩ -->
    <div class="booking-left">
        <img class="booking-doctor-img" src="<?= $doctor['img'] ?>" alt="Bác sĩ">
        <div class="booking-doctor-name"><?= $doctor['name'] ?></div>
        <div class="booking-doctor-specialty"><?= $doctor['specialty'] ?></div>
        <div class="booking-desc"><?= $doctor['desc'] ?></div>
    </div>
    <!-- Cột phải: Đặt lịch -->
    <div class="booking-right">
        <div class="booking-box">
            <h3>ĐẶT KHÁM</h3>
            <form>
                <div class="booking-date">
                    <label for="date">Chọn ngày khám:</label>
                    <select id="date" name="date">
                        <option>Thứ 4 - 25/11</option>
                        <option>Thứ 5 - 26/11</option>
                        <option>Thứ 6 - 27/11</option>
                        <option>Thứ 7 - 28/11</option>
                        <option>Chủ nhật - 29/11</option>
                    </select>
                </div>
                <div>
                    <label style="font-weight:500;margin-bottom:6px;display:block;">Lịch khám:</label>
                    <div class="booking-times-list">
                        <button type="button" class="booking-time-btn">07:30 - 08:00</button>
                        <button type="button" class="booking-time-btn">08:00 - 08:30</button>
                        <button type="button" class="booking-time-btn">09:00 - 09:30</button>
                        <button type="button" class="booking-time-btn">10:00 - 10:30</button>
                        <button type="button" class="booking-time-btn">16:30 - 17:00</button>
                        <button type="button" class="booking-time-btn">17:00 - 17:30</button>
                    </div>
                    <input type="hidden" name="time" id="selected-time" value="">
                </div>
                <div class="booking-location">
                    <strong>Địa chỉ khám:</strong><br>
                    <?= $doctor['location'] ?>
                </div>
                <button class="btn-book" type="submit">Đặt lịch</button>
            </form>
        </div>
    </div>
    <?php else: ?>
    <div style="padding:40px;text-align:center;width:100%;">Không tìm thấy thông tin bác sĩ.</div>
    <?php endif; ?>
</div>

<!-- Popup xác nhận đặt lịch -->
<div id="booking-success-popup" style="display:none;position:fixed;z-index:9999;left:0;top:0;width:100vw;height:100vh;background:rgba(0,0,0,0.18);align-items:center;justify-content:center;">
  <div style="background:#fff;border-radius:16px;box-shadow:0 8px 32px rgba(0,0,0,0.13);padding:36px 32px 28px 32px;max-width:370px;width:90%;text-align:center;position:relative;">
    <div style="font-size:2.5em;color:#00bfae;margin-bottom:10px;">&#10003;</div>
    <div style="font-size:1.18em;font-weight:bold;color:#2d3a4b;margin-bottom:10px;">Đặt lịch thành công!</div>
    <div id="popup-info" style="color:#444;font-size:1em;margin-bottom:18px;"></div>
    <button onclick="document.getElementById('booking-success-popup').style.display='none'" style="background:#00bfae;color:#fff;border:none;border-radius:8px;padding:10px 28px;font-size:1em;font-weight:bold;cursor:pointer;">Đóng</button>
  </div>
</div>

</body>
</html>