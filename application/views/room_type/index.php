<div class="right_col" role="main">
<div class="container-fluid ">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?=$title?></h1>

<!-- DataTales Example -->

<div class="card shadow mb-4 ">
    <div class="card-header col-lg-8 py-3">
        <?= $this->session->flashdata('message'); ?>

    </div>
    <div class="col-lg-8 mt-4">
    <div class="row d-flex justify-content-end">
        <div class="col-md-3 mt-3 mr-4 text-right">
            <button class="btn btn-primary" data-toggle="modal" data-target="#add_room_types">Add Room Type</button>
        </div>
    </div>
    <div class="card-body ">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width=5%>No</th>
                        <th>Room Type</th>
                        <th colspan="2" width="25%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($type as $t) :
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $t->name ?></td>
                            <td onclick="javascript: return confirm('Apakah anda yakin menghapus tipe room ini?')"><?php echo anchor('type/delete/' . $t->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                            <!-- <td><?php echo anchor('type/edit/' . $t->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></div>') ?></td> -->
                            <td><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?= $t->id?>"><i class="fa fa-edit"></i></a></td>
                        </tr>
                        <div class="modal fade" id="myModal<?= $t->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Room Types</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url() ?>type/update/<?=$t->id?>" method="post">
                            <?php $getData = $this->db->get_where('room_type', ['id' => $t->id])->row_array(); ?>
                                        <div class="form-group">
                                            <label for="name">Room Type Name </label>
                                            <input type="text" class="form-control" id="name" name="name" value="<?=$getData['name']?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            <input class="btn btn-primary" type="submit" value="Update">
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="add_room_types" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Room Types</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="<?= base_url() ?>type" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Room Type Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Room Type Name">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input class="btn btn-primary" type="submit" value="Add Room Type">
                </div>
            </form>
        </div>

    </div>
</div>
</div>

</div>  
</div>  