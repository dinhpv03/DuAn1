<!-- <!DOCTYPE html>
<html>
<head>
  <title>Đếm ngược thời gian</title>
</head>
<body>
  <h1 id="countdown">05:00</h1>
  <button id="startButton" onclick="startCountdown()">Bắt đầu</button>

  <script>
  let countdownElement = document.getElementById("countdown");
let countdownInterval;

// Hàm để chuyển hướng sang trang mới và bắt đầu đếm ngược
function redirectToNewPage() {
  // Thay đổi URL của trang mới ở đây
  window.location.href = "newpage.php";
}

// Hàm để bắt đầu đếm ngược
function startCountdown() {
  let timeInSeconds = 300; // 5 phút = 300 giây

  // Hiển thị thời gian ban đầu
  updateCountdownDisplay(timeInSeconds);

  // Bắt đầu đếm ngược
  countdownInterval = setInterval(function() {
    timeInSeconds--;

    // Kiểm tra nếu hết thời gian
    if (timeInSeconds <= 0) {
      clearInterval(countdownInterval);
      redirectToNewPage();
    }

    // Cập nhật hiển thị thời gian còn lại
    updateCountdownDisplay(timeInSeconds);
  }, 1000);
}

// Hàm để cập nhật hiển thị thời gian
function updateCountdownDisplay(timeInSeconds) {
  let minutes = Math.floor(timeInSeconds / 60);
  let seconds = timeInSeconds % 60;

  // Định dạng thời gian thành chuỗi "mm:ss"
  let formattedTime = String(minutes).padStart(2, "0") + ":" + String(seconds).padStart(2, "0");

  countdownElement.textContent = formattedTime;
}
console.log(window.location.href.includes("test.php"));
// Gọi hàm startCountdown() nếu trang mới được mở
if (window.location.href.includes("newpage.php")) {
  startCountdown();
}
</script>
</body>
</html> -->

<!-- <!DOCTYPE html>
<html>

<head>
  <title>Chọn box</title>
  <style>
    .box {
      width: 100px;
      height: 100px;
      background-color: gray;
      margin-bottom: 10px;
      cursor: pointer;
    }
    .colored {
      background-color: green !important;
      color: white;
    }

    .selected {
      background-color: green;
    }
  </style>
</head>

<body>
<div class="box" onclick="changeColorAndReturnValue(this)">Box 1</div>
<div class="box" onclick="changeColorAndReturnValue(this)">Box 2</div>
<div class="box" onclick="changeColorAndReturnValue(this)">Box 3</div>

<p id="result"></p>

  <script>
    var selectedValues = [];

function changeColorAndReturnValue(box) {
  var value = box.innerText;
  // console.log(value);
  // Lấy thẻ <p> dựa trên id
  var resultElement = document.getElementById('result');

  // Kiểm tra xem box đã có màu hay chưa
  var hasColor = box.classList.contains('colored');

  if (hasColor) {
    // Nếu box đã có màu, xóa màu và giá trị khỏi mảng
    // box.style.backgroundColor = '';
    box.classList.remove('colored');
    var index = selectedValues.indexOf(value);
    if (index !== -1) {
      selectedValues.splice(index, 1);
    // console.log(selectedValues);
    }
  } else {
    // Nếu box chưa có màu, đặt màu xanh và thêm giá trị vào mảng
    // box.style.backgroundColor = 'green';
    box.classList.add('colored');
    selectedValues.push(value);
    // console.log(selectedValues);
  }
  console.log(selectedValues);

  // Hiển thị các giá trị đã chọn trong thẻ <p>
  resultElement.innerText = selectedValues.join(', ');
}
  </script>
</body>

</html> -->
<!-- <!DOCTYPE html>
<html>
<head>
  <title>Chọn box</title>
  <style>
    .box {
      width: 100px;
      height: 100px;
      background-color: gray;
      margin-bottom: 10px;
      cursor: pointer;
    }
    
    .active {
      background-color: green;
    }
  </style>
</head>
<body>
  <div class="box">Box 1</div>
  <div class="box">Box 2</div>
  <div class="box">Box 3</div>
  
  <script>
    // Lấy danh sách các phần tử có lớp "box"
    var boxes = document.getElementsByClassName("box");
    
    // Gán sự kiện onclick cho từng phần tử
    for (var i = 0; i < boxes.length; i++) {
      boxes[i].onclick = function() {
        // Thêm lớp "active" cho box được nhấp vào
        this.classList.add("active");
        
        // Loại bỏ lớp "active" từ các box còn lại
        for (var j = 0; j < boxes.length; j++) {
          if (boxes[j] !== this) {
            boxes[j].classList.remove("active");
          }
        }
        
        // Lưu trạng thái của box đã được chọn vào localStorage
        localStorage.setItem("selectedBox", this.textContent);
      };
    }
    
    // Hàm được gọi khi tải lại trang
    window.onload = function() {
      var selectedBox = localStorage.getItem("selectedBox");
      
      if (selectedBox) {
        // Nếu có box được chọn trước đó, tìm và thêm lớp "active" vào box đó
        for (var k = 0; k < boxes.length; k++) {
          if (boxes[k].textContent === selectedBox) {
            boxes[k].classList.add("active");
            break;
          }
        }
      }
    };
  </script>
</body>
</html> -->
<!-- <div class="box" onclick="changeColor(this)">Box 1</div>
<div class="box" onclick="changeColor(this)">Box 2</div>
<div class="box" onclick="changeColor(this)">Box 3</div>

<script>
  function changeColor(clickedBox) {
    var boxes = document.getElementsByClassName("box");
    
    for (var i = 0; i < boxes.length; i++) {
      if (boxes[i] === clickedBox) {
        boxes[i].classList.add("active");
      } else {
        boxes[i].classList.remove("active");
      }
    }
  }
</script>

<style>
  .box {
    width: 100px;
    height: 100px;
    background-color: gray;
    margin-bottom: 10px;
    cursor: pointer;
  }
  
  .active {
    background-color: green;
  }
  .bgred {
    background-color: red;
  }
</style> -->
<?php
// while () {
//   // Lấy ngày hiện tại
//   $currentDate = date('Y-m-d');

//   // Thực hiện các công việc liên quan đến ngày
//   // TODO: Thêm mã lệnh của bạn ở đây

//   // Tính toán ngày tiếp theo
//   $nextDay = date('Y-m-d', strtotime($currentDate . ' +1 day'));

//   // In ngày tiếp theo
//   echo "Ngày tiếp theo là: " . $nextDay . "<br>";

//   // Tạm dừng thực thi cho đến khi ngày mới bắt đầu
//   sleep(86400); // 86400 giây = 1 ngày
// }
?>