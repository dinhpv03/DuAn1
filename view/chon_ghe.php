
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
            $html_seat.= '<div class="col-1 seat '.$seat_vip.'" onclick="changeColor(this)">'.$seat_name.$stt.'</div>
                            <div class="w-100"></div>';
        } else {
            $html_seat.= '<div class="col-1 seat '.$seat_vip.'" onclick="changeColor(this)">'.$seat_name.$stt.'</div>';
        }
    }
?>

<body>
    
  <div class="container">
        <div class="text-center mt-3">
            <h5 class="section-title bg-dark text-center text-primary px-3">Chọn Ghế</h5>
        </div>

        <div class="text-center">
        <p style="color:white; margin:0;">Screen</p>
            <img src="../admin/style/img/screen.webp" alt="">
        </div>

        <div class="row justify-content-center">
            <?= $html_seat; ?> 
        </div>
  </div>
  
  <!-- Link to Bootstrap JS (required for some features) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Hàm được gọi khi box được nhấp vào
    function changeColor(clickedBox) {
      clickedBox.classList.toggle("selected");
    }
  </script>
</body>


<!-- <body>

<div class="container mt-5">
<<<<<<< HEAD
    <div class="row">
        <div class="col-6">
            <h2 class="mb-4">Select Your Seat</h2>
            <div id="seat-map" class="d-flex flex-wrap justify-content-center text-center text-dark bg-gradient">
                <!-- Generate your seat elements dynamically here using JavaScript/PHP -->
                <!-- Example: -->
                <!-- <div class="seat" data-seat-number="A1">A1</div> -->
                <!-- ... Repeat for all seats ... -->

        <!-- Generate your seat elements dynamically here using JavaScript/PHP -->
        <!-- Example: -->
        <!-- <div class="seat" data-seat-number="A1">A1</div> -->
        <!-- ... Repeat for all seats ... -->
    <!-- </div>
>>>>>>> 5fa330e4f2b2843124cc9d602e6a148ea1b6e03b
    <div class="mt-4">
        <button id="book-btn" class="btn btn-success">Book Selected Seats</button>
    </div>
</div> -->

<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>

    $(document).ready(function () {
        // Sample: Generate seat elements dynamically (you may use PHP for this in a real application)
        var seatMap = $('#seat-map');
<<<<<<< HEAD
        for (var row = 1; row <= 6; row++) {
            for (var seatNum = 1; seatNum <= 10; seatNum++) {
                var seat = $('<div class="seat" data-seat-number="' + String.fromCharCode(64 + row) + seatNum + '">' +
                    String.fromCharCode(64 + row) + seatNum +
                    '</div>');
                seatMap.append(seat);
            }
=======

    // Gửi yêu cầu AJAX để lấy dữ liệu từ bảng seat
    $.ajax({
    url: 'model/seat.php', // Đặt đường dẫn đến tệp xử lý dữ liệu từ bảng seat
    method: 'GET',
    dataType: 'json',
    success: function(data) {
        // Xử lý dữ liệu trả về từ yêu cầu AJAX
        var seats = data.seats;
        for (var i = 0; i < seats.length; i++) {
        var seat = $('<div class="seat" data-seat-number="' + seats[i].seat_name + '">' +
            seats[i].seat_name +
            '</div>');
        seatMap.append(seat);
>>>>>>> 5fa330e4f2b2843124cc9d602e6a148ea1b6e03b
        }
    },
    error: function() {
        // Xử lý lỗi nếu có
        console.log('Có lỗi xảy ra khi lấy dữ liệu từ bảng seat.');
    }
    });

        // Seat selection logic
        $('.seat').on('click', function () {
            $(this).toggleClass('selected');
        });

        // Booking logic
        $('#book-btn').on('click', function () {
            var selectedSeats = $('.seat.selected');
            if (selectedSeats.length > 0) {
                var seatNumbers = selectedSeats.map(function () {
                    return $(this).data('seat-number');
                }).get().join(', ');

                alert('Ghế đã chọn: ' + seatNumbers);
            } else {
                alert('Vui lòng chọn một chỗ!');
            }
        });
    });
</script>

</body> -->