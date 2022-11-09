<div class="right_col" role="main">

    <div class="container-fluid">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <?php if ($this->session->flashdata('flash')) : ?>
        <?php endif; ?>
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row justify-content-center">
            <div class="col-lg-11">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors() ?>
                    </div>
                <?php endif; ?>
                <div class="row justify-content-end mb-3 mr-3">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#newSubMenuModal"> Add New Sub Menu</button>
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
                                                    <th>Title</th>
                                                    <th>Menu</th>
                                                    <th>Url</th>
                                                    <th>Active</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($subMenu as $sm) :
                                                ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $sm['title']; ?></td>
                                                        <td><?= $sm['menu']; ?></td>
                                                        <td><?= $sm['url']; ?></td>
                                                        <?php if ($sm['is_active']) { ?>
                                                            <td><span class="badge text-bg-success" style="color: #fff !important;background-color: RGBA(25, 135, 84, var(--bs-bg-opacity, 1)) !important;">Active</span>
                                                            </td>
                                                        <?php } else { ?>
                                                            <td><span class="badge text-bg-danger" style="color: #fff !important;background-color: RGBA(220, 53, 69, var(--bs-bg-opacity, 1)) !important;">Deactivate</span>
                                                            </td>
                                                        <?php } ?>

                                                        <td>
                                                            <a href="<?= base_url('menu/delete_sub/'); ?><?= $sm['id'] ?>" class="tombol-hapus btn btn-danger btn-sm">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?= $sm['id'] ?>"><i class="fa fa-edit"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade" id="myModal<?= $sm['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Sub Menu</h5>
                                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="<?= base_url() ?>menu/update_submenu/<?= $sm['id']; ?>" method="post">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title" value="<?= $sm['title']; ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <select name="menu_id" id="menu_id" class="form-control">
                                                                                <?php
                                                                                $idMenu = $sm['menu_id'];
                                                                                $getData = $this->M_menu->get_data_submenu_where($idMenu);
                                                                                ?>
                                                                                <option value="<?= $idMenu ?>"><?= $getData[0]->menu; ?></option>
                                                                                <?php foreach ($menu as $m) : ?>
                                                                                    <option value="<?= $m['id'] ?>"><?= $m['menu']; ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url" value="<?= $sm['url'];; ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="form-check">
                                                                                <input type="checkbox" name="is_active" id="is_active" value="1" class="form-check-input" checked>
                                                                                <label for="is_active" class="form-check-label">Active?</label>
                                                                            </div>
                                                                        </div>
                                                                        <input type="hidden" value="<?= $sm['id']; ?>" name="id">
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
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Sub Menu</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>menu/submenu" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id'] ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" name="is_active" id="is_active" value="1" class="form-check-input" checked>
                            <label for="is_active" class="form-check-label">Active?</label>
                        </div>
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