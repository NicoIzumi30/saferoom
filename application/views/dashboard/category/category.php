<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Kategori</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?= $this->session->flashdata('message'); ?>

        </div>
        <div class="row d-flex justify-content-end">
            <div class="col-md-3 mt-3 mr-4 text-right">
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add_category"><i class="fa fa-plus"></i> Tambah Kategori</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width=5%>No</th>
                            <th width=15%>Nama</th>
                            <th width=15%>Image</th>
                            <th width=50%>Deskripsi</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($category as $cat) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $cat->nama_category ?></td>
                                <td><img class="image-responsive" src="<?= base_url() ?>assets/image/category/<?= $cat->image ?>" width="100px" height="75px"></td>

                                <td><?= $cat->deskripsi ?></td>
                                <td onclick="javascript: return confirm('Apakah anda yakin menghapus category ini?')"><?php echo anchor('product/del_category/' . $cat->id_category, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                                <td><?php echo anchor('product/edit_category/' . $cat->id_category, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></div>') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>product/add_category" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Category">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <input class="btn btn-primary" type="submit" value="Tambah">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script src="<?= base_url() ?>assets/ckeditor/ckeditor1/ckeditor.js"></script>
<script>
    CKEDITOR.replace('deskripsi');
</script>