<div class="right_col" role="main">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4>Edit Menu</h4>
            </div>
            <div class="col-lg-4 p-3">
                <?php foreach ($menu as $m) ?>
                <form action="<?= base_url() ?>menu/update_menu/<?= $m->id ?>" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name" value="<?= $m->menu ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="ICon" value="<?= $m->icon ?>">
                    </div>
                    <input type="hidden" value="<?= $m->id ?>" name="id">
                    <div class="modal-footer">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>