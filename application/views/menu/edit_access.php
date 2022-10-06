<div class="right_col" role="main">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4>Edit Access Menu</h4>
            </div>
            <div class="col-lg-4 p-3">
                <?php foreach ($access as $ac) ?>
                <form action="<?= base_url() ?>menu/update_access/<?= $ac['id'] ?>" method="post">
                    <div class="form-group">
                        <select name="role_id" id="role_id" class="form-control">
                            <?php
                            $idRole = $ac->role_id;
                            $getData1 = $this->M_menu->get_data_submenu_where($idRole);
                            ?>
                            <option value="<?= $idRole ?>"><?= $getData1[0]->menu; ?></option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id'] ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <?php
                            $idMenu = $ac->menu_id;
                            $getData2 = $this->M_menu->get_data_submenu_where($idMenu);
                            ?>
                            <option value="<?= $idMenu ?>"><?= $getData2[0]->menu; ?></option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id'] ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <input type="hidden" value="<?= $ac['id'] ?>" name="id">
                    <div class="modal-footer">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>