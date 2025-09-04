<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Bệnh viện Da liễu Chuyên khoa</title>
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>



<body>
    <!-- Header -->
    <header>
       <nav class="navbar">
    <div class="logo">Bệnh viện Da Liễu</div>
    <ul>
        <li>Tin tức</li>
        <li>Dịch vụ</li>
        <li>Đội ngũ bác sĩ</li>
        <li>Trang thiết bị</li>
        <li class="login-item"><button class="btn-login">Đăng nhập</button></li>
    </ul>
</nav>
    </header>

    <!-- Banner & Search -->
    <section class="banner">
        <h1>CHĂM SÓC & ĐIỀU TRỊ DA CHUYÊN SÂU</h1>
        <p>Nơi bạn tìm thấy sự tự tin từ làn da khỏe đẹp</p>
        <div class="search-bar">
    <form action="search.php" method="get">
        <input type="text" name="q" placeholder="Tìm bác sĩ, dịch vụ, hoặc thông tin..." required>
        <button type="submit"><span>🔍</span></button>
    </form>
</div>

    </section>

    <!-- Features -->
    <section class="features">
        <div>Chuyên khoa da liễu</div>
        <div>Cơ sở hiện đại</div>
        <div>Bác sĩ giàu kinh nghiệm</div>
        <div>Chăm sóc tận tâm</div>
    </section>

    <!-- Dịch vụ nổi bật -->
    <section class="services">
        <div class="service">
            <i class="fa fa-spa fa-2x"></i>
            <div>Điều trị<br>Mụn & Sẹo</div>
        </div>
        <div class="service">
            <i class="fa fa-sun fa-2x"></i>
            <div>Điều trị<br>Nám & Tàn nhang</div>
        </div>
        <div class="service">
            <i class="fa fa-leaf fa-2x"></i>
            <div>Chăm sóc<br>Da chuyên sâu</div>
        </div>
        <div class="service">
            <i class="fa fa-laptop-medical fa-2x"></i>
            <div>Tư vấn<br>Trực tuyến</div>
        </div>
        <div class="service">
            <i class="fa fa-vial fa-2x"></i>
            <div>Xét nghiệm<br>Da liễu</div>
        </div>
        <div class="service">
            <i class="fa fa-user-md fa-2x"></i>
            <div>Điều trị<br>Bệnh da</div>
        </div>
    </section>

    <!-- Bác sĩ nổi bật -->
    <section class="doctor-video">
        <div class="section-header">
            <h2>Bác sĩ da liễu nổi bật</h2>
            <a href="#" class="see-more">XEM THÊM</a>
        </div>
        <div class="doctor-list">
            <div class="doctor-card">
                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="BS. Nguyễn Thu Hà">
                <div class="doctor-title">BS. Nguyễn Thu Hà - Chuyên gia trị nám</div>
            </div>
            <div class="doctor-card">
                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="BS. Trần Văn An">
                <div class="doctor-title">BS. Trần Văn An - Điều trị mụn</div>
            </div>
            <div class="doctor-card">
                <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="BS. Phạm Đức Hoàng">
                <div class="doctor-title">BS. Phạm Đức Hoàng - Da liễu thẩm mỹ</div>
            </div>
            <div class="doctor-card">
                <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="BS. Lê Mai Anh">
                <div class="doctor-title">BS. Lê Mai Anh - Trẻ hóa làn da</div>
            </div>
        </div>
    </section>

    <!-- Chuyên khoa da liễu -->
    <section class="specialties">
        <div class="section-header">
            <h2>Dịch vụ da liễu nổi bật</h2>
            <a href="#" class="see-more">XEM THÊM</a>
        </div>
        <div class="specialty-list">
            <div class="specialty-card">
                <img src="https://img.freepik.com/free-photo/beautiful-woman-getting-skin-treatment_23-2148825131.jpg" alt="Điều trị mụn">
                <div class="specialty-title">Điều trị mụn</div>
            </div>
            <div class="specialty-card">
                <img src="https://img.freepik.com/free-photo/woman-having-face-massage_1098-18626.jpg" alt="Trẻ hóa da">
                <div class="specialty-title">Trẻ hóa da</div>
            </div>
            <div class="specialty-card">
                <img src="https://img.freepik.com/free-photo/female-patient-dermatologist_23-2149113842.jpg" alt="Điều trị nám">
                <div class="specialty-title">Điều trị nám</div>
            </div>
            <div class="specialty-card">
                <img src="https://img.freepik.com/free-photo/woman-receiving-face-treatment_1098-17759.jpg" alt="Chăm sóc da">
                <div class="specialty-title">Chăm sóc da</div>
            </div>
        </div>
    </section>

    <!-- Quản trị hệ thống -->
    <section class="admin-panel">
        <div class="section-header">
            <h2>Quản trị hệ thống</h2>
            <p>Quản lý dữ liệu bệnh viện</p>
        </div>

        <div class="admin-list">
            <div class="admin-card">
                <i class="fa fa-user-injured fa-2x"></i>
                <div>Patients<br><small>Thông tin bệnh nhân</small></div>
                <a href="manage.php?table=patients">
                    <button class="btn-manage">Quản lý</button>
                </a>
            </div>

            <div class="admin-card">
                <i class="fa fa-user-md fa-2x"></i>
                <div>Doctors<br><small>Thông tin bác sĩ</small></div>
                <a href="manage.php?table=doctors">
                    <button class="btn-manage">Quản lý</button>
                </a>
            </div>

            <div class="admin-card">
                <i class="fa fa-calendar-check fa-2x"></i>
                <div>Appointments<br><small>Lịch hẹn</small></div>
                <a href="manage.php?table=appointments">
                    <button class="btn-manage">Quản lý</button>
                </a>
            </div>

            <div class="admin-card">
                <i class="fa fa-users fa-2x"></i>
                <div>Users<br><small>Tài khoản đăng nhập</small></div>
                <a href="manage.php?table=users">
                    <button class="btn-manage">Quản lý</button>
                </a>
            </div>

            <div class="admin-card">
                <i class="fa fa-bell fa-2x"></i>
                <div>Notifications<br><small>Email / SMS</small></div>
                <a href="manage.php?table=notifications">
                    <button class="btn-manage">Quản lý</button>
                </a>
            </div>
        </div>

        <!-- Chatbot AI Icon -->
<div id="chatbot-ai-icon">
    <img src="download.jpg" alt="Chatbot AI" />
</div>
    </section>
<script>
const chatbot = document.getElementById('chatbot-ai-icon');
let isDragging = false, offsetX = 0, offsetY = 0;

chatbot.addEventListener('mousedown', function(e) {
    isDragging = true;
    offsetX = e.clientX - chatbot.getBoundingClientRect().left;
    offsetY = e.clientY - chatbot.getBoundingClientRect().top;
    chatbot.style.transition = 'none';
});

document.addEventListener('mousemove', function(e) {
    if (isDragging) {
        chatbot.style.right = 'auto';
        chatbot.style.left = (e.clientX - offsetX) + 'px';
        chatbot.style.top = (e.clientY - offsetY) + 'px';
        chatbot.style.bottom = 'auto';
    }
});

document.addEventListener('mouseup', function() {
    isDragging = false;
    chatbot.style.transition = '';
});
</script>
</body>

</html>
