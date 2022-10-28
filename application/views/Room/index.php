<div class="right_col" role="main">
    <div class="container-fluid ">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

        <!-- DataTales Example -->

        <div class="card shadow mb-4 ">
            <div class="card-header col-lg-12 py-3">
                <?= $this->session->flashdata('message'); ?>

            </div>
            <div class="col-lg-12 mt-4">
                <div class="row d-flex justify-content-end">
                    <div class="col-md-3 mt-3 mr-4 text-right">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#add_room_types">Add
                            Hotel</button>
                    </div>
                </div>
                <?php 
                $dac = $this->M_room->getRoom();
                var_dump($dac);
                ?>
                <div class="card-body ">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width=5%>No</th>
                                    <th>Room Name</th>
                                    <th>Hotel</th>
                                    <th>Type Room</th>
                                    <th>Account</th>
                                    <th>Address</th>
                                    <th>Price</th>
                                    <th>Fasility</th>
                                    <th>About</th>
                                    <th>Status</th>
                                    <th colspan="2" width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($room as $t) :
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $t->hotel_name ?></td>
                                    <td><?= $t->nama_hotel ?></td>
                                    <td><?= $t->name ?></td>
                                    <td><?= $t->email ?></td>
                                    <td><?= $t->address ?></td>
                                    <td><?= $t->price ?></td>
                                    <td><?= $t->facility ?></td>
                                    <td><?= $t->about ?></td>
                                    <?php if ($t->status) { ?>
                                    <td><span class="badge text-bg-success"
                                            style="color: #fff !important;background-color: RGBA(25, 135, 84, var(--bs-bg-opacity, 1)) !important;">Active</span>
                                    </td>
                                    <?php } else { ?>
                                    <td><span class="badge text-bg-danger"
                                            style="color: #fff !important;background-color: RGBA(220, 53, 69, var(--bs-bg-opacity, 1)) !important;">Deactivate</span>
                                    </td>
                                    <?php } ?>
                                    <td onclick="javascript: return confirm('Apakah anda yakin menghapus room ini?')">
                                        <?php echo anchor('room/delete/' . $t->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>
                                    </td>
                                    <!-- <td><?php echo anchor('type/edit/' . $t->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></div>') ?></td> -->
                                    <td><a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#myModal<?= $t->id ?>"><i class="fa fa-edit"></i></a></td>
                                </tr>
                                <div class="modal fade" id="myModal<?= $t->id ?>" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Room Types</h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url() ?>hotel/update/<?= $t->id ?>"
                                                    method="post">
                                                    <?php $getData = $this->db->get_where('hotel', ['id' => $t->id])->row_array(); ?>
                                                    <div class="form-group">
                                                        <label for="name">Hotel Name </label>
                                                        <input type="text" class="form-control" id="name" name="name"
                                                            value="<?= $t->nama_hotel ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="city">City </label>
                                                        <select name="city" id="city" class="form-control">
                                                            <option value="<?= $t->id_city ?>"><?= $t->city ?></option>
                                                            <?php foreach ($city as $c) : ?>
                                                            <option value="<?= $c['id'] ?>"><?= $c['city']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="user">Account </label>
                                                        <select name="user" id="user" class="form-control">
                                                            <option value="<?= $t->id_user ?>"><?= $t->email ?></option>
                                                            <?php foreach ($usere as $u) : ?>
                                                            <option value="<?= $u['id'] ?>"><?= $u['email']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pemilik">Pemilik</label>
                                                        <input type="text" class="form-control" id="pemilik"
                                                            name="pemilik" value="<?= $t->pemilik ?>">
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="kebijakan">Kebijakan</label>
                                                        <textarea id="kebijakan" name="kebijakan" class="form-control"
                                                            rows="5" cols="80"><?= $t->kebijakan ?></textarea>

                                                    </div>
                                                    <?php if ($t->status) { ?>
                                                    <div class="form-group">
                                                        <label for="status">Status </label>
                                                        <select name="status" id="status" class="form-control">
                                                            <option value="1">Activate </option>
                                                            <option value="0">Deactivate</option>
                                                        </select>
                                                    </div>
                                                    <?php } else { ?>
                                                    <div class="form-group">
                                                        <label for="status">Status </label>
                                                        <select name="status" id="status" class="form-control">
                                                            <option value="0">Deactivate</option>
                                                            <option value="1">Activate </option>
                                                        </select>
                                                    </div>
                                                    <?php } ?>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-dismiss="modal">Cancel</button>
                                                        <input class="btn btn-primary" type="submit" value="Add">
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
        <div class="modal fade" id="add_room_types" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Hotel</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url() ?>hotel/index/<?= $t->id ?>" method="post">
                            <?php $getData = $this->db->get_where('hotel', ['id' => $t->id])->row_array(); ?>
                            <div class="form-group">
                                <label for="name">Hotel Name </label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="city">City </label>
                                <select name="city" id="city" class="form-control">
                                    <option value="">Select City</option>
                                    <?php foreach ($city as $c) : ?>
                                    <option value="<?= $c['id'] ?>"><?= $c['city']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="user">Account </label>
                                <select name="user" id="user" class="form-control">
                                    <option value="">Select User</option>
                                    <?php foreach ($usere as $u) : ?>
                                    <option value="<?= $u['id'] ?>"><?= $u['email']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pemilik">Pemilik</label>
                                <input type="text" class="form-control" id="pemilik" name="pemilik">
                            </div>
                            <div class="form-group ">
                                <label for="kebijakan">Kebijakan</label>
                                <textarea id="kebijakan" name="kebijakan" class="form-control" rows="5"
                                    cols="80"></textarea>

                            </div>
                            <div class="form-group">
                                <label for="status">Status </label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="1">Activate </option>
                                    <option value="0">Deactivate</option>
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
</div>