
<?php 
    $html_seat = '';
    $seat_vip = '';
    foreach ($seats as $s) {
        extract($s);
        if ($id_loaive == 2) {
            $seat_vip = 'bg-warning';
        } else {
            $seat_vip = '';
        }
        if ($stt == 10) {
            $html_seat.= '<div class="col-1 fs-5 seat '.$seat_vip.'" onclick="changeColor(this)">
                            <p>'.$seat_name.$stt.'</p>
                            <input type="hidden" name="price" value="'.$price.'">
                        </div>
                        <div class="w-100"></div>';
        } else {
            $html_seat.= '<div class="col-1 fs-5 seat '.$seat_vip.'" onclick="changeColor(this)">
                            <p>'.$seat_name.$stt.'</p>
                            <input type="hidden" name="price" value="'.$price.'">
                        </div>';
        }
    }
?>

<body>
    
  <div class="container">
        <div class="text-center mt-3">
            <h5 class="section-title bg-dark text-center text-primary px-3">Chọn Ghế</h5>
        </div>

        <div class="text-center">
        <p class="text-white m-0 fs-5">Screen</p>
            <img src="../admin/style/img/screen.webp" alt="">
        </div>

        <div class="row justify-content-end" >
            <div class="col-3 m-2 border rounded-pill text-center" >
                <p class="fs-4 text-white m-0">Thời gian chọn ghế: 
                    <span id="countdown"></span>
                </p>
            </div>
            <div class="col-2"></div>
        </div>

        <form action="index.php?act=thanh_toan" method="post">
            <div class="row justify-content-center">
                <?= $html_seat; ?>
            </div>
            <input type="hidden" name="id_phim" value="<?= $id_phim ?>">
            <input type="hidden" name="id_date" value="<?= $id_date ?>">
            <input type="hidden" name="time" value="<?= $time ?>">
            <input id="seat1" type="hidden" name="seat" value="">
            <input id="price1" type="hidden" name="price" value="">
            <div class="row justify-content-around">
                <div class="col-1"></div>
                
                <div class="col-4 py-2 px-5">
                    <p class="fs-5 text-white m-0">Ghế đã chọn: 
                        <span id="seat" class="fs-5 text-white"></span>
                        
                    </p>
                    <p class="fs-5 text-white m-0">Thành tiền: 
                        <span id="price" class="fs-5 text-white"></span>
                    </p>
                    
                </div>

                <div class="col-2 py-2">
                    <button class="btn btn-primary py-2 px-4 mt-2 mx-1 rounded-pill fs-5" type="submit">Thanh Toán</button>
                </div>

                <div class="col-1"></div>
            </div>
        </form> 

  </div>
  
  <!-- Link to Bootstrap JS (required for some features) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    var seatValue = [];
    var priceValue = [];
    // Hàm được gọi khi box được nhấp vào
    function changeColor(clickedBox) {
        value = clickedBox.innerText;
        valuePr = clickedBox.querySelector('input[type="hidden"]').value;

        // clickedBox.classList.toggle("selected");

        var seat = document.getElementById("seat");
        var seat1 = document.getElementById("seat1");

        var price = document.getElementById("price");
        var price1 = document.getElementById("price1");


        var hasColor = clickedBox.classList.contains('selected');
        var hasVip = clickedBox.classList.contains('bg-warning');

        if (hasColor) {
            // Nếu box đã có màu, xóa màu và giá trị khỏi mảng
            clickedBox.classList.remove('selected');

            var index = seatValue.indexOf(value);
            var indexs = priceValue.indexOf(valuePr);

            if (index !== -1) {
                seatValue.splice(index, 1);
                priceValue.splice(indexs, 1);
            }
        } else {
            // Nếu box chưa có màu, đặt màu xanh và thêm giá trị vào mảng
            clickedBox.classList.add('selected');

            seatValue.push(value);
            priceValue.push(valuePr);
        }
        
        seat.innerText = seatValue.join(', ');
        seat1.value = seatValue.join(', ');


        function sumPrice() {
            var sum = 0;
            for (let i = 0; i < priceValue.length; i++) {
                sum += parseInt(priceValue[i]);
            }
            return sum;
        }
            sumPr = sumPrice();
            price.innerText = sumPr == 0 ? "" : sumPr + ".000đ";
            price1.innerText = sumPr == 0 ? "" : sumPr + ".000đ";
    }

    var fiveMin = document.getElementById("countdown");
    var countdown;

function startCountdown() {
  // Định nghĩa thời gian bắt đầu (5 phút)
  var startTime = new Date().getTime() + 5 * 60 * 1000;

  // Cập nhật thời gian đếm ngược mỗi giây
  countdown = setInterval(function() {
    // Lấy thời gian hiện tại
    var now = new Date().getTime();

    // Tính thời gian còn lại
    var timeLeft = startTime - now;

    // Kiểm tra nếu thời gian còn lại đã hết
    if (timeLeft <= 0) {
      // Dừng đếm ngược
      clearInterval(countdown);

      // Chuyển hướng sang trang khác
      window.location.href = "index.php";
    }

    // Tính toán phút và giây còn lại
    var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

    // Định dạng thời gian còn lại
    var formattedTime = formatTime(minutes, seconds);

    // Hiển thị thời gian còn lại
    // console.log(formattedTime);
    fiveMin.innerText = formattedTime;
  }, 1000);
}

console.log(startCountdown());

// Hàm để định dạng thời gian thành chuỗi "00:00"
function formatTime(minutes, seconds) {
  var formattedMinutes = minutes < 10 ? "0" + minutes : minutes;
  var formattedSeconds = seconds < 10 ? "0" + seconds : seconds;
  return formattedMinutes + ":" + formattedSeconds;
}
  </script>
</body>