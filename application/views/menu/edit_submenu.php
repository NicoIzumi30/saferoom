<div class="right_col" role="main">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4>Edit Menu</h4>
            </div>
            <div class="col-lg-4 p-3">
                <?php foreach ($subMenu as $sm) ?>
                <form action="<?= base_url() ?>menu/update_submenu/<?= $sm->id ?>" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title" value="<?= $sm->title ?>">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <?php
                            $idMenu = $sm->menu_id;
                            $getData = $this->M_menu->get_data_submenu_where($idMenu);
                            ?>
                            <option value="<?= $idMenu ?>"><?= $getData[0]->menu; ?></option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id'] ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url" value="<?= $sm->url; ?>">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" name="is_active" id="is_active" value="1" class="form-check-input" checked>
                            <label for="is_active" class="form-check-label">Active?</label>
                        </div>
                    </div>
                    <input type="hidden" value="<?= $sm->id ?>" name="id">
                    <div class="modal-footer">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>