<?php 
$strings = "A1, A2, A3";
$array = explode(", ", $strings);

$pattern = '/^([A-Za-z]+)(\d+)$/';
var_dump($array);
foreach ($array as $string) {
    if (preg_match($pattern, $string, $matches)) {
        $alphaPart = $matches[1]; // Chuỗi chứa ký tự
        $numericPart = $matches[2]; // Chuỗi chứa số

        // In kết quả
        echo "<p>Chuỗi: $alphaPart\n</p>";
        echo "<p>Số: $numericPart\n</p>";
    } else {
        echo "Không tìm thấy kết quả phù hợp cho chuỗi '$string'\n";
    }
}
?>
<!-- <!DOCTYPE html>
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
  0% { transform: translateX(-50%) translateY(-100%); }
  30% { transform: translateX(-50%) translateY(0); }
  70% { transform: translateX(-50%) translateY(0); }
  100% { transform: translateX(-50%) translateY(-150%); }
}
  </style>
  <script src="https://kit.fontawesome.com/836af14c7c.js" crossorigin="anonymous"></script>
</head>

<body>
  <button id="showButton">Hiển thị thông báo</button>
  <div id="notification"><i class="fa-solid fa-circle-check fa-lg" style="color: #2cd129;"></i><span style="font-size: large;"> Thông báo của bạn</span></div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
  var showButton = document.getElementById("showButton");
  var notification = document.getElementById("notification");

  // Hiển thị thông báo khi tải lại trang
  notification.classList.add("show");
  setTimeout(function() {
    notification.classList.remove("show");
  }, 3000);

  showButton.addEventListener("click", function() {
    notification.classList.add("show");
    setTimeout(function() {
      notification.classList.remove("show");
    }, 3000);
  });
});
  </script>

</body>

</html> -->