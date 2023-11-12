<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">THÊM MỚI LOẠI VÉ</h5>
                        <form class="row g-3" action=""> 
                            <div class="col-12">
                                <label for="" class="form-label">ID loại vé</label>
                                <input type="number" class="form-control" disabled placeholder = "Tự tăng">
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Loại vé</label>
                                <select class="form-control" name="" id="">
                                    <option value="0">Chọn loại vé</option>
                                    <option value="1">2D</option>
                                    <option value="1">3D</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Loại ghế</label>
                                <select class="form-control" name="" id="">
                                    <option value="0">Chọn ghế</option>
                                    <option value="1">Ghế thường</option>
                                    <option value="1">Ghế VIP</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Giá</label>
                                <input type="number" class="form-control"  placeholder = "Price">
                            </div>
                            <div class="mt-3">
                                <input type="submit" class="btn btn-primary" value = "Thêm mới">
                                <button type="reset" class="btn btn-outline-success">Reset</button>
                                <a class="btn btn-outline-success" href="index.php?act=danh_sach_loai_ve">Danh sách</a>
                            </div>
                        </form>
                    </div>
                </div>    
            </div>
        </div>
    </section>
</main>