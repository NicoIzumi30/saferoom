<div class="right_col" role="main">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4>Edit Role</h4>
            </div>
            <div class="col-lg-4 p-3">
                <?php foreach ($role as $r) ?>
                <form action="<?= base_url() ?>menu/update_role/<?= $r->id ?>" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="role" name="role" placeholder="Role Name" value="<?= $r->role ?>">
                    </div>
                    <input type="hidden" value="<?= $r->id ?>" name="id">
                    <div class="modal-footer">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>