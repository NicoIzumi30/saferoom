<div class="right_col" role="main">
    <div class="container-fluid ">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <?php if ($this->session->flashdata('flash')) : ?>
        <?php endif; ?>

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
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width=5%>No</th>
                                    <th>Room Name</th>
                                    <th>Hotel</th>
                                    <th>Type Room</th>
                                    <th>Image</th>
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
                                        <td><?= $t->room_name ?></td>
                                        <td><?= $t->nama_hotel ?></td>
                                        <td> <?php
                                                $img = explode(',', $t->image);
                                                foreach ($img as $foto) :
                                                ?>
                                                <img src="<?= base_url('assets/image/room/') ?><?= $foto ?>" width="15px">
                                            <?php endforeach ?>
                                        </td>
                                        <td><?= $t->name ?></td>
                                        <td><?= $t->email ?></td>
                                        <td><?= $t->address ?></td>
                                        <td><?= $t->price ?></td>
                                        <td><?= $t->facility ?></td>
                                        <td><?= $t->about ?></td>
                                        <?php if ($t->status) { ?>
                                            <td><span class="badge text-bg-success" style="color: #fff !important;background-color: RGBA(25, 135, 84, var(--bs-bg-opacity, 1)) !important;">Active</span>
                                            </td>
                                        <?php } else { ?>
                                            <td><span class="badge text-bg-danger" style="color: #fff !important;background-color: RGBA(220, 53, 69, var(--bs-bg-opacity, 1)) !important;">Deactivate</span>
                                            </td>
                                        <?php } ?>
                                        <td onclick="javascript: return confirm('Apakah anda yakin menghapus room ini?')">
                                            <?php echo anchor('room/delete/' . $t->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>
                                        </td>
                                        <!-- <td><?php echo anchor('type/edit/' . $t->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></div>') ?></td> -->
                                        <td><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?= $t->id ?>"><i class="fa fa-edit"></i></a></td>
                                    </tr>
                                    <div class="modal fade" id="myModal<?= $t->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Room Types</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= base_url() ?>room/index/" method="post" enctype="multipart/form-data">
                                                        <?php
                                                        $getData = $this->db->get_where('hotel', ['id' => '2'])->row_array();
                                                        ?>
                                                        <div class="form-group">
                                                            <label for="name">Room Name</label>
                                                            <input type="text" class="form-control" id="room_name" name="room_name" value="<?= $t->room_name ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="hotel">Hotel</label>
                                                            <input type="text" class="form-control" id="hotel" name="hotel" value="<?= $getData['nama_hotel'] ?>" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="type">Type Room </label>
                                                            <select name="type" id="type" class="form-control">
                                                                <option value="<?= $t->name ?>"><?= $t->name ?></option>
                                                                <?php foreach ($type as $u) : ?>
                                                                    <option value="<?= $u['id'] ?>"><?= $u['name']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="account">Account</label>
                                                            <input type="text" class="form-control" id="account" name="account" value="<?= $this->session->userdata('email') ?>" disabled>
                                                        </div>
                                                        <div class="form-group3">
                                                            <label for="image">Image</label>
                                                            <input type="file" class="form-control" name="image[]" id="image" multiple required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="address" class="form-label">Address</label>
                                                            <textarea class="form-control" name="address" id="address" rows="3"><?= $t->address ?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="price">Price</label>
                                                            <input type="number" value="<?= $t->price ?>" class="form-control" id="price" name="price">
                                                        </div>
                                                        <p style="margin-bottom:0">Fasilitas</p>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="Resepsionis" name="fasilitas[]" id="flexCheckDefault">
                                                            <label class="form-check-label" for="fasilitas">
                                                                Resepsionis
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="AC" name="fasilitas[]" id="flexCheckDefault">
                                                            <label class="form-check-label" for="fasilitas">
                                                                AC
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="Televisi" name="fasilitas[]" id="flexCheckDefault">
                                                            <label class="form-check-label" for="fasilitas">
                                                                Televisi
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="wifi Gratis" name="fasilitas[]" id="flexCheckDefault">
                                                            <label class="form-check-label" for="fasilita   s">
                                                                wifi Gratis
                                                            </label>
                                                        </div>
                                                        <div class="form-group  mt-3">
                                                            <label for="about" class="form-label">About</label>
                                                            <textarea class="form-control" name="about" id="about" rows="3"><?= $t->about ?></textarea>
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
                                                        <input type="hidden" name="hotel_id" value="<?= $getData['id'] ?>">
                                                        <input type="hidden" name="user_id" value="<?= $this->session->userdata('id') ?>">

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
        <div class="modal fade" id="add_room_types" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Room</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url() ?>room/index/" method="post" enctype="multipart/form-data">
                            <?php
                            $getData = $this->db->get_where('hotel', ['id' => '2'])->row_array();
                            ?>
                            <div class="form-group">
                                <label for="name">Room Name</label>
                                <input type="text" class="form-control" id="room_name" name="room_name">
                            </div>
                            <div class="form-group">
                                <label for="hotel">Hotel</label>
                                <input type="text" class="form-control" id="hotel" name="hotel" value="<?= $getData['nama_hotel'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="type">Type Room </label>
                                <select name="type" id="type" class="form-control">
                                    <option value="">Type Room </option>
                                    <?php foreach ($type as $u) : ?>
                                        <option value="<?= $u['id'] ?>"><?= $u['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="account">Account</label>
                                <input type="text" class="form-control" id="account" name="account" value="<?= $this->session->userdata('email') ?>" disabled>
                            </div>
                            <div class="form-group3">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image[]" id="image" multiple required>
                            </div>
                            <div class="form-group">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price">
                            </div>
                            <p style="margin-bottom:0">Fasilitas</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Resepsionis" name="fasilitas[]" id="flexCheckDefault">
                                <label class="form-check-label" for="fasilitas">
                                    Resepsionis
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="AC" name="fasilitas[]" id="flexCheckDefault">
                                <label class="form-check-label" for="fasilitas">
                                    AC
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Televisi" name="fasilitas[]" id="flexCheckDefault">
                                <label class="form-check-label" for="fasilitas">
                                    Televisi
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="wifi Gratis" name="fasilitas[]" id="flexCheckDefault">
                                <label class="form-check-label" for="fasilitas">
                                    wifi Gratis
                                </label>
                            </div>
                            <div class="form-group  mt-3">
                                <label for="about" class="form-label">About</label>
                                <textarea class="form-control" name="about" id="about" rows="3"></textarea>
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
                            <input type="hidden" name="hotel_id" value="<?= $getData['id'] ?>">
                            <input type="hidden" name="user_id" value="<?= $this->session->userdata('id') ?>">

                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>