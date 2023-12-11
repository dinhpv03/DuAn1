<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .box-parent {
      background-color: #f2f2f2;
      padding: 10px;
      margin-bottom: 10px;
      cursor: pointer;
    }

    .box-child {
      display: none;
      background-color: #fff;
      padding: 10px;
    }

    .selected {
    background-color: #00ff00; /* Đặt màu xanh cho box parent được chọn */
  }
  </style>
</head>

<body>
  <div class="box-parent">
    <h2>Box Parent 1</h2>
    <div class="box-child">
      <p>Box Child 1</p>
    </div>
  </div>

  <div class="box-parent">
    <h2>Box Parent 2</h2>
    <div class="box-child">
      <p>Box Child 2</p>
    </div>
  </div>

  <div class="box-parent">
    <h2>Box Parent 3</h2>
    <div class="box-child">
      <p>Box Child 3</p>
    </div>
  </div>

  <script>
    // Lấy tất cả các box parent
const parentBoxes = document.querySelectorAll('.box-parent');

// Lặp qua từng box parent và thêm sự kiện click
parentBoxes.forEach((parentBox, index) => {
  let isChildVisible = false; // Biến theo dõi trạng thái hiển thị của box child

  // Hiển thị box child cho box parent đầu tiên
  if (index === 0) {
    const childBox = parentBox.querySelector('.box-child');
    childBox.style.display = 'block';
    isChildVisible = true;
    parentBox.classList.add('selected');
  }

  parentBox.addEventListener('click', () => {
    const childBox = parentBox.querySelector('.box-child');

    // Kiểm tra xem box child đã hiển thị hay chưa
    if (!isChildVisible) {
      // Nếu box child đang ẩn, hiển thị nó
      childBox.style.display = 'block';
      isChildVisible = true;
      parentBox.classList.add('selected'); // Thêm lớp "selected" cho box parent
    } else {
      // Nếu box child đang hiển thị, ẩn nó
      childBox.style.display = 'none';
      isChildVisible = false;
      parentBox.classList.remove('selected'); // Loại bỏ lớp "selected" khỏi box parent
    }
  });

  // Thêm sự kiện click vào document để ẩn box child khi click vào box parent khác
  document.addEventListener('click', (event) => {
    // Kiểm tra xem phần tử được click có là box parent hay không
    if (!parentBox.contains(event.target)) {
      const childBox = parentBox.querySelector('.box-child');
      childBox.style.display = 'none';
      isChildVisible = false;
      parentBox.classList.remove('selected'); // Loại bỏ lớp "selected" khỏi box parent
    }
  });
});
  </script>
</body>

</html> -->

<?php
// $strings = "A1, A2, A3";
// $array = explode(", ", $strings);

// $pattern = '/^([A-Za-z]+)(\d+)$/';
// var_dump($array);
// foreach ($array as $string) {
//     if (preg_match($pattern, $string, $matches)) {
//         $alphaPart = $matches[1]; // Chuỗi chứa ký tự
//         $numericPart = $matches[2]; // Chuỗi chứa số

//         // In kết quả
//         echo "<p>Chuỗi: $alphaPart\n</p>";
//         echo "<p>Số: $numericPart\n</p>";
//     } else {
//         echo "Không tìm thấy kết quả phù hợp cho chuỗi '$string'\n";
//     }
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    #notification {
      display: none;
      background-color: black;
      border: #333;
      margin-top: 8px;
      color: #fff;
      padding: 15px;
      position: fixed;
      top: 0;
      left: 50%;
      transform: translateX(-50%) translateY(-150%);
      border-radius: 10px;
    }

    #notification.show {
      display: block;
      animation: slideInOut 3s ease-in-out;
    }

    @keyframes slideInOut {
      0% {
        transform: translateX(-50%) translateY(-100%);
      }

      30% {
        transform: translateX(-50%) translateY(0);
      }

      70% {
        transform: translateX(-50%) translateY(0);
      }

      100% {
        transform: translateX(-50%) translateY(-150%);
      }
    }
  </style>
  <script src="https://kit.fontawesome.com/836af14c7c.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php
  session_start();
  $pass = 123;
  var_dump($pass);
  ?>
  <!-- <button id="showButton">Hiển thị thông báo</button>
  <div id="notification"><i class="fa-solid fa-circle-check fa-lg" style="color: #2cd129;"></i><span style="font-size: large;"> Thông báo của bạn</span></div> -->
  <div id="notification">
    <!-- Thông báo: Đăng nhập thành công! -->
  </div>

  <form id="loginForm">
    <label for="username">Tên đăng nhập:</label>
    <input type="text" id="username" name="username" required>
    <br>
    <label for="password">Mật khẩu:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <input type="submit" value="Đăng nhập">
  </form>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var showButton = document.getElementById("showButton");
      var notification = document.getElementById("notification");
      var loginForm = document.getElementById("loginForm");

      // Hiển thị thông báo khi tải lại trang
      // notification.classList.add("show");
      // setTimeout(function() {
      //   notification.classList.remove("show");
      // }, 2000);

      loginForm.addEventListener("submit", function(event) {
        event.preventDefault(); // Ngăn chặn gửi form mặc định

        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;

        // Kiểm tra thông tin đăng nhập
        if (username !== "" && password !== "") {
        notification.textContent = "Thông báo: Đăng nhập thành công";
        notification.classList.add("show");
        setTimeout(function() {
          notification.classList.remove("show");
        }, 2000);
        } else {
          notification.textContent = "Thông báo: Đăng nhập không thành công!";
          notification.classList.add("show");
          setTimeout(function() {
            notification.classList.remove("show");
          }, 2000);
        }

        // Đặt lại giá trị của form
        loginForm.reset();
      });
    });
  </script>

</body>

</html>