<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4>Edit Variasi Menu</h4>
        </div>
        <div class="col-md-7 p-3">
            <?php foreach ($variasi as $vm) ?>
            <form action="<?= base_url() ?>product/update_variasi/<?= $vm->id_variasi ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama Variasi</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Variasi Menu" value="<?= $vm->nama_variasi;; ?>">
                </div>
                <div class="form-group">
                    <label>Category Product</label>
                    <select name="category" class="form-control" required>
                        <?php
                        $idCategory = $vm->id_category;
                        $query = $this->M_admin->get_data_category_where($idCategory);
                        ?>
                        <option value="<?= $idCategory ?>"><?= $query[0]->nama_category; ?></option>
                        <?php
                        $data2 = $this->M_admin->get_data_category();
                        foreach ($data2 as $getData) :
                        ?>
                            <option value="<?= $getData->id_category ?>"><?= $getData->nama_category; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="alamat">Cara Pembuatan</label>
                    <textarea class="form-control" name="tutorial" id="tutorial" rows="3"><?= $vm->cara_pembuatan;; ?></textarea>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input class="btn btn-primary" type="submit" value="Update">
                </div>
                <input type="hidden" name="id" value="<?= $vm->id_variasi ?>">
                <input type="hidden" name="old" value="<?= $vm->image ?>">
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>assets/ckeditor/ckeditor1/ckeditor.js"></script>
<script>
    CKEDITOR.replace('tutorial');
</script>