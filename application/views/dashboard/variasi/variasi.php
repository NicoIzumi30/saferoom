<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Variasi Menu</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?= $this->session->flashdata('message'); ?>
        </div>
        <div class="row d-flex justify-content-end">

            <div class="col-md-3 mt-3 mr-4 text-right">
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add_category"><i class="fa fa-plus"></i> Tambah Variasi Menu</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-start" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width=5%>No</th>
                            <th width=10%>Nama</th>
                            <th width=10%>Kategori</th>
                            <th width=15%>Image</th>
                            <th width=50%>Cara Pembuatan</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($variasi as $menu) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $menu->nama_variasi ?></td>
                                <?php
                                $idd = $menu->id_category;
                                $data1 = $this->M_admin->get_data_category_where($idd);

                                ?>
                                <td><?= $data1[0]->nama_category ?></td>
                                <td><img class="image-responsive" src="<?= base_url() ?>assets/image/variasi/<?= $menu->image ?>" width="100px" height="75px"></td>

                                <td><?= $menu->cara_pembuatan ?></td>
                                <td onclick="javascript: return confirm('Apakah anda yakin menghapus variasi ini?')"><?php echo anchor('product/del_variasi/' . $menu->id_variasi, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                                <td><?php echo anchor('product/edit_variasi/' . $menu->id_variasi, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></div>') ?></td>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Variasi Menu</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>product/add_variasi" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama">Nama Variasi</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Variasi Menu">
                    </div>
                    <div class="form-group">
                        <label>Category Product</label>
                        <select name="category" class="form-control" required>
                            <option value=""></option>
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
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Cara Pembuatan</label>
                        <textarea class="form-control" name="tutorial" id="tutorial" rows="3"></textarea>
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
    CKEDITOR.replace('tutorial');
</script>