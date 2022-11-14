<div class="right_col" role="main">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
    <?php endif; ?>
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
                <div class="card-body ">
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
                                                        <th width=5%>No</th>
                                                        <th>Hotel</th>
                                                        <th>City</th>
                                                        <th>Account</th>
                                                        <th>Pemilik</th>
                                                        <th>Address</th>
                                                        <th>kamar</th>
                                                        <th>About</th>
                                                        <th>Status</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($hotel as $t) :
                                                    ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $t->nama_hotel ?></td>
                                                            <td><?= $t->city ?></td>
                                                            <td><?= $t->email ?></td>
                                                            <td><?= $t->pemilik ?></td>
                                                            <td><?= $t->alamat ?></td>
                                                            <td><?= $t->jumlah_kamar ?></td>
                                                            <td><?= $t->about ?></td>
                                                            <?php if ($t->status) { ?>
                                                                <td><span class="badge text-bg-success" style="color: #fff !important;background-color: RGBA(25, 135, 84, var(--bs-bg-opacity, 1)) !important;">Active</span>
                                                                </td>
                                                            <?php } else { ?>
                                                                <td><span class="badge text-bg-danger" style="color: #fff !important;background-color: RGBA(220, 53, 69, var(--bs-bg-opacity, 1)) !important;">Deactivate</span>
                                                                </td>
                                                            <?php } ?>
                                                            <td>
                                                                <a href="<?= base_url('hotel/delete/'); ?><?= $t->id; ?>" class="tombol-hapus btn btn-danger btn-sm">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?= $t->id ?>"><i class="fa fa-edit"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <div class="modal fade" id="myModal<?= $t->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                            Room Types</h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="<?= base_url() ?>hotel/update/<?= $t->id ?>" method="post">
                                                                            <?php $getData = $this->db->get_where('hotel', ['id' => $t->id])->row_array(); ?>
                                                                            <div class="form-group">
                                                                                <label for="name">Hotel Name </label>
                                                                                <input type="text" class="form-control" id="name" name="name" value="<?= $t->nama_hotel ?>">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="city">City </label>
                                                                                <select name="city" id="city" class="form-control">
                                                                                    <option value="<?= $t->id_city ?>">
                                                                                        <?= $t->city ?></option>
                                                                                    <?php foreach ($city as $c) : ?>
                                                                                        <option value="<?= $c['id'] ?>">
                                                                                            <?= $c['city']; ?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="user">Account </label>
                                                                                <select name="user" id="user" class="form-control">
                                                                                    <option value="<?= $t->id_user ?>">
                                                                                        <?= $t->email ?></option>
                                                                                    <?php foreach ($usere as $u) : ?>
                                                                                        <option value="<?= $u['id'] ?>">
                                                                                            <?= $u['email']; ?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="pemilik">Pemilik</label>
                                                                                <input type="text" class="form-control" id="pemilik" name="pemilik" value="<?= $t->pemilik ?>" disabled>
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <label for="alamat">Address</label>
                                                                                <textarea id="alamat" name="alamat" class="form-control" rows="5" cols="80"></textarea>

                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="kamar">Jumlah Kamar </label>
                                                                                <input type="text" class="form-control" id="kamar" name="kamar">
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <label for="about">About</label>
                                                                                <textarea id="about" name="about" class="form-control" rows="5" cols="80"><?= $t->about ?></textarea>

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
                                                                            <input type="hidden" value="anj">
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                                                <input class="btn btn-primary" type="submit" value="Update">
                                                                            </div>
                                                                            <input type="hidden" name="yangPunyaYGY" value="<?= $t->pemilik ?>">
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


        <div class="modal fade" id="add_room_types" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <label for="alamat">Address</label>
                                <textarea id="alamat" name="alamat" class="form-control" rows="5" cols="80"></textarea>

                            </div>
                            <div class="form-group">
                                <label for="kamar">Jumlah Kamar </label>
                                <input type="text" class="form-control" id="kamar" name="kamar">
                            </div>
                            <div class="form-group ">
                                <label for="about">About</label>
                                <textarea id="about" name="about" class="form-control" rows="5" cols="80"></textarea>

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
<script src="<?= base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/build/js/sweetalert2.all.min.js"></script>

<!-- My Java Script -->
<script src="<?= base_url(); ?>assets/build/js/script.js"></script>