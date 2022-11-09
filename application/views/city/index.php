<div class="right_col" role="main">
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <?php if ($this->session->flashdata('flash')) : ?>
            <?php endif; ?>
            <div class="row d-flex justify-content-end">
                <div class="col-md-3 mt-3 mr-4 text-right">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#add_city">Add City</button>
                </div>
            </div>
            <div class="card-body">

                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">

                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th width=10%>No</th>
                                                    <th>Nama Kota</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
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
                                                        <td>
                                                            <a href="<?= base_url('city/delete/'); ?><?= $c->id; ?>" class="tombol-hapus btn btn-danger btn-sm">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?= $c->id ?>"><i class="fa fa-edit"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade" id="myModal<?= $c->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Kota</h5>
                                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="<?= base_url() ?>city/edit/<?= $c->id ?>" method="post" enctype="multipart/form-data">
                                                                        <div class="form-group">
                                                                            <label for="city">City</label>
                                                                            <input type="text" class="form-control" id="city" value="<?= $c->city ?>" name="city">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Image</label>
                                                                            <input type="file" name="image" class="form-control">
                                                                        </div>
                                                                        <input type="hidden" value="<?= $c->id ?>" name="id">
                                                                        <input type="hidden" id="old" name="old" value="<?= $c->image ?>">
                                                                        <div class="modal-footer">
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
                    </div>
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