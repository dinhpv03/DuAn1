<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center" >THÊM MỚI PHIM</h5>
                        <form class="row g-3">
                            <div class="col-12">
                                <label for="" class="form-label">Tên phim</label>
                                <input type="text" class="form-control" id="inputNanme4">
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Thời lượng phim</label>
                                <input type="time" class="form-control">
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Ngày phát hành</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Mô tả</label>
                                <textarea type="text" class="form-control"></textarea>
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Poster</label>
                                <input type="file" class="form-control">
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Loại phim</label>
                                <select name="" id="" class="form-control">
                                    <option value = "0">Chọn thể loại phim</option>
                                    <option value = "1">Hành động</option>
                                    <option value = "2">Kinh dị</option></option>
                                    <option value = "3">Tâm lý</option>
                                    <option value = "4">Hoạt Hình </option>
                                </select>
                            </div>
                            <div class="mt-4">
                                <input type="submit" class="btn btn-primary" value = "Thêm mới">
                                <button type="reset" class="btn btn-outline-success">Reset</button>
                                <a class="btn btn-outline-success" href="index.php?act=danh_sach_phim">Danh sách</a>
                            </div>
                        </form>
                    </div>
                </div>    
            </div>
        </div>
    </section>
</main>