<!DOCTYPE html>
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
    
    .selected {
      background-color: green;
    }
  </style>
</head>
<body>
  <div class="box" onclick="changeColor(event, 'box1')">
    Box 1
    <a href="https://example.com/page1" onclick="linkClick(event, 'example.com/page1')">Link</a>
  </div>
  <div class="box" onclick="changeColor(event, 'box2')">
    Box 2
    <a href="https://example.com/page2" onclick="linkClick(event, 'page2')">Link</a>
  </div>
  <div class="box" onclick="changeColor(event, 'box3')">
    Box 3
    <a href="https://example.com/page3" onclick="linkClick(event, 'page3')">Link</a>
  </div>
  
  <script>
    // Hàm được gọi khi box được nhấp vào
    function changeColor(event, boxId) {
      var clickedBox = event.currentTarget;
      
      // Kiểm tra nếu phần tử được nhấp vào là thẻ "a"
      if (event.target.tagName.toLowerCase() === 'a') {
        return;
      }
      
      clickedBox.classList.toggle("selected");
      history.pushState(null, '', '#' + boxId);
    }
    
    // Hàm được gọi khi click vào các thẻ "a" trong box
    function linkClick(event, pageId) {
      event.preventDefault();
      history.pushState(null, '', pageId);
    }
  </script>
</body>
</html>
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