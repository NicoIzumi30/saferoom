<div class="right_col" role="main">
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?=$title?></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <?= $this->session->flashdata('message'); ?>

    </div>
    <div class="row d-flex justify-content-end">
        <div class="col-md-3 mt-3 mr-4 text-right">
            <button class="btn btn-primary" data-toggle="modal" data-target="#add_city">Add City</button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width=5%>No</th>
                        <th>Nama Kota</th>
                        <th>Image</th>
                        <th colspan="2" width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($city as $c) :
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $c->city ?></td>
                            <td><img class="image-responsive" src="<?= base_url() ?>assets/image/city/<?= $c->image ?>" width="100px" height="75px"></td>
                            <td onclick="javascript: return confirm('Apakah anda yakin menghapus kota ini?')"><?php echo anchor('city/delete/' . $c->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                            <td><?php echo anchor('city/edit/' . $c->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></div>') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="add_city" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add City</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="<?= base_url() ?>city" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">City Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="City Name">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input class="btn btn-primary" type="submit" value="Add City">
                </div>
            </form>
        </div>

    </div>
</div>
</div>  
</div>  