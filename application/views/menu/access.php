<div class="right_col" role="main">
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">

            <div class="col-lg-12">
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '
          </div>') ?>
                <?= $this->session->flashdata('message'); ?>
                <?= $this->session->flashdata('message_update'); ?>
                <div class="row justify-content-end mb-3 mr-3">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#newAccessMenuModal"> Add New Menu</button>
                </div>


                <div class="table-responsive">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Role</th>
                                <th scope="col">Menu</th>
                                <th scope="col" colspan="2" width=10%>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            <?php foreach ($access as $ac) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $ac['role']; ?></td>
                                    <td><?= $ac['menu']; ?></td>
                                    <td onclick="javascript: return confirm('Apakah anda yakin menghapus access menu ini?')"><?php echo anchor('menu/delete_access/' . $ac['id'], '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                                    <td><?php echo anchor('menu/edit_access/' . $ac['id'], '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></div>') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="newAccessMenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Access Menu</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() ?>menu/access" method="post">
                        <div class="form-group">
                            <select name="role_id" id="role_id" class="form-control">
                                <option value="">Select Role</option>
                                <?php foreach ($role as $r) : ?>
                                    <option value="<?= $r['id'] ?>"><?= $r['role']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="menu_id" id="menu_id" class="form-control">
                                <option value="">Select Menu</option>
                                <?php foreach ($menu as $m) : ?>
                                    <option value="<?= $m['id'] ?>"><?= $m['menu']; ?></option>
                                <?php endforeach; ?>
                            </select>
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
</div>