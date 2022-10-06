<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4>Edit Kategori</h4>
        </div>
        <div class="col-md-7 p-3">
            <?php foreach ($category as $cat) ?>
            <form action="<?= base_url() ?>product/update_category/<?= $cat->id_category ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" value="<?= $cat->nama_category ?>" name="nama" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="alamat">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"><?= $cat->deskripsi ?></textarea>
                </div>
                <input type="hidden" value="<?= $cat->id_category ?>" name="id">
                <input type="hidden" id="old" name="old" value="<?= $cat->image ?>">
                <div class="modal-footer">
                    <input class="btn btn-primary" type="submit" value="Update">
                </div>

            </form>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>assets/ckeditor/ckeditor1/ckeditor.js"></script>
<script>
    CKEDITOR.replace('deskripsi');
</script>