const loginForm = document.querySelector('#login');

loginForm.addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(loginForm);

    fetch('../../client/controller/loginController.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Đăng nhập thành công, chuyển hướng tới trang chính của ứng dụng
            window.location.href = './launch.php';
        } else {
            // Đăng nhập thất bại, hiển thị thông báo lỗi lên giao diện người dùng
            alert('Invalid username or password');
        }
    });
});


