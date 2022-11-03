<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
</link>
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
                <div class="card-body ">
                    <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Responsive example<small>Users</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                      Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
                    </p>
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                                <tr>
                                    <th width=5%>No</th>
                                    <th>Hotel</th>
                                    <th>City</th>
                                    <th>Account</th>
                                    <th>Pemilik</th>
                                    <th>Kebijakan</th>
                                    <th>Status</th>
                                    <th>Action</th>
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
                                        <td><?= $t->kebijakan ?></td>
                                        <?php if ($t->status) { ?>
                                            <td><span class="badge text-bg-success" style="color: #fff !important;background-color: RGBA(25, 135, 84, var(--bs-bg-opacity, 1)) !important;">Active</span>
                                            </td>
                                        <?php } else { ?>
                                            <td><span class="badge text-bg-danger" style="color: #fff !important;background-color: RGBA(220, 53, 69, var(--bs-bg-opacity, 1)) !important;">Deactivate</span>
                                            </td>
                                        <?php } ?>
                                        <td onclick="javascript: return confirm('Apakah anda yakin menghapus Hotel ini?')">
                                            <?php echo anchor('hotel/delete/' . $t->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>
                                        
                                        <!-- <td><?php echo anchor('type/edit/' . $t->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></div>') ?></td> -->
                                        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?= $t->id ?>"><i class="fa fa-edit"></i>
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
                                                    <form action="<?= base_url() ?>hotel/update/<?= $t->id ?>" method="post">
                                                        <?php $getData = $this->db->get_where('hotel', ['id' => $t->id])->row_array(); ?>
                                                        <div class="form-group">
                                                            <label for="name">Hotel Name </label>
                                                            <input type="text" class="form-control" id="name" name="name" value="<?= $t->nama_hotel ?>">
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
                                                            <input type="text" class="form-control" id="pemilik" name="pemilik" value="<?= $t->pemilik ?>">
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="kebijakan">Kebijakan</label>
                                                            <textarea id="kebijakan" name="kebijakan" class="form-control" rows="5" cols="80"><?= $t->kebijakan ?></textarea>

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
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                            <input class="btn btn-primary" type="submit" value="Add">
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div></a></td>
                                    </tr>
                                   
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
                                <label for="kebijakan">Kebijakan</label>
                                <textarea id="kebijakan" name="kebijakan" class="form-control" rows="5" cols="80"></textarea>

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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.4/dist/sweetalert2.all.min.js"></script>
<script>
    const flashData = $('.flash-data').data('flashdata');

    if (flashData) {
        Swal({
            title: 'Sukses',
            text: 'Data Berhasil ' + flashData,
            type: 'success'
        });
    }
</script>