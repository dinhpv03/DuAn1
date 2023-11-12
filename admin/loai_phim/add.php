<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">THÊM MỚI LOẠI PHIM</h5>
                        <form class="row g-3" action=""> 
                            <div class="col-12">
                                <label for="" class="form-label">ID loại phim</label>
                                <input type="number" class="form-control" disabled placeholder = "Tự tăng">
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Tên thể loại phim</label>
                                <input type="text" class="form-control" placeholder="Vd: Hành động , ...">
                            </div>
                            <div class="mt-3">
                                <input type="submit" class="btn btn-primary" value = "Thêm mới">
                                <button type="reset" class="btn btn-outline-success">Reset</button>
                                <a class="btn btn-outline-success" href="index.php?act=danh_sach_loai_phim">Danh sách</a>
                            </div>
                        </form>
                    </div>
                </div>    
            </div>
        </div>
    </section>
</main>