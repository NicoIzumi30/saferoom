<div class="right_col" role="main">
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
            <!-- <?php
                    $query = $this->M_menu->getAccMenuWhere('3');
                    var_dump($query);
                    ?> -->

            <div class="col-lg-12">
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '
          </div>') ?>
                <?= $this->session->flashdata('message'); ?>
                <?= $this->session->flashdata('message_update'); ?>
                <div class="row justify-content-end mb-3 mr-3">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#newMenuModal"> Add New Menu</button>
                </div>


                <div class="table-responsive">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Icon</th>
                                <th scope="col" colspan="2" width=10%>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            <?php foreach ($menu as $m) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $m['menu']; ?></td>
                                    <td><i class="<?= $m['icon']; ?>"></i></td>
                                    <td onclick="javascript: return confirm('Apakah anda yakin menghapus menu ini?')"><?php echo anchor('menu/delete/' . $m['id'], '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                                    <td><?php echo anchor('menu/edit/' . $m['id'], '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></div>') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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