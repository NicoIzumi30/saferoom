<div class="right_col" role="main">
    <div class="container-fluid">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <?php if ($this->session->flashdata('flash')) : ?>
        <?php endif; ?>
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row justify-content-center">
            <div class="col-lg-11">
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '
          </div>') ?>
                <div class="row justify-content-end mb-3 mr-3">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#newMenuModal"> Add New Menu</button>
                </div>
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
                                                    <th>#</th>
                                                    <th>Menu</th>
                                                    <th>Icon</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($menu as $m) :
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?= $no++; ?></th>
                                                        <td><?= $m['menu']; ?></td>
                                                        <td><i class="<?= $m['icon']; ?>"></i></td>
                                                        <td>
                                                            <a href="<?= base_url('menu/delete/'); ?><?= $m['id']; ?>" class="tombol-hapus btn btn-danger btn-sm">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?= $m['id'] ?>"><i class="fa fa-edit"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade" id="myModal<?= $m['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5>
                                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <?php $me = $this->db->get_where('user_menu', ['id' => $m['id']])->row_array() ?>
                                                                    <form action="<?= base_url() ?>menu/update_menu/<?= $me['id'] ?>" method="post">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name" value="<?= $me['menu'] ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" id="icon" name="icon" placeholder="ICon" value="<?= $me['icon'] ?>">
                                                                        </div>
                                                                        <input type="hidden" value="<?= $me['id'] ?>" name="id">
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
</div>


<!-- Modal -->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Menu</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>menu" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>