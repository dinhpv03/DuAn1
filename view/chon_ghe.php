<!-- <div class="container">
  <div class="text-center mt-3">
    <h5 class="section-title bg-dark text-center text-primary px-3">Chọn Ghế</h5>
  </div>

  <div class="text-center">
    <img src="../admin/style/img/screen.webp" alt="">
  </div>

  <div class="row justify-content-sm-center row-cols-auto">
    <div class="col mx-2 my-2 border">1</div>
    <div class="col mx-2 my-2 border">2</div>
    <div class="col mx-2 my-2 border">3</div>
    <div class="col mx-2 my-2 border">4</div>
    <div class="col mx-2 my-2 border">5</div>
    <div class="col mx-2 my-2 border">6</div>
    <div class="col mx-2 my-2 border">7</div>
    <div class="col mx-2 my-2 border">8</div>
    <div class="col mx-2 my-2 border">9</div>
    <div class="col mx-2 my-2 border">10</div>
    <div class="col mx-2 my-2 border">1</div>
    <div class="col mx-2 my-2 border">2</div>
  </div>
</div> -->

<body>

<div class="container mt-5">
    <h2 class="mb-4">Select Your Seat</h2>
    <div id="seat-map" class="d-flex flex-wrap justify-content-center">
        <!-- Generate your seat elements dynamically here using JavaScript/PHP -->
        <!-- Example: -->
        <!-- <div class="seat" data-seat-number="A1">A1</div> -->
        <!-- ... Repeat for all seats ... -->
    </div>
    <div class="mt-4">
        <button id="book-btn" class="btn btn-success">Book Selected Seats</button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    // Add your JavaScript code here
    $(document).ready(function () {
        // Sample: Generate seat elements dynamically (you may use PHP for this in a real application)
        var seatMap = $('#seat-map');
        for (var row = 1; row <= 5; row++) {
            for (var seatNum = 1; seatNum <= 10; seatNum++) {
                var seat = $('<div class="seat" data-seat-number="' + String.fromCharCode(64 + row) + seatNum + '">' +
                    String.fromCharCode(64 + row) + seatNum +
                    '</div>');
                seatMap.append(seat);
            }
        }

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

                alert('Selected Seats: ' + seatNumbers);
            } else {
                alert('Please select at least one seat.');
            }
        });
    });
</script>

</body>