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
                                <h2>Data Hotel</h2>
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
                                                        <th>Nama</th>
                                                        <th>Email</th>
                                                        <th>Telp</th>
                                                        <th>Image</th>
                                                        <th>Role</th>
                                                        <th>Status</th>
                                                        <th>Created</th>
                                                        <th width="5%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($usere as $usr) :
                                                    ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $usr->name ?></td>
                                                            <td><?= $usr->email ?></td>
                                                            <td><?= $usr->telp ?></td>
                                                            <td class="text-center"><img src="<?= base_url() ?>assets/image/profile/<?= $usr->image ?>" alt="" style="width: 50px;"></td>
                                                            <td><?= $usr->role ?></td>
                                                            <?php if ($usr->is_active) { ?>
                                                                <td><span class="badge text-bg-success" style="color: #fff !important;background-color: RGBA(25, 135, 84, var(--bs-bg-opacity, 1)) !important;">Active</span>
                                                                </td>
                                                            <?php } else { ?>
                                                                <td><span class="badge text-bg-danger" style="color: #fff !important;background-color: RGBA(220, 53, 69, var(--bs-bg-opacity, 1)) !important;">Deactivate</span>
                                                                </td>
                                                            <?php } ?>
                                                            <td><?= date("d-M-Y", $usr->date_created) ?></td>

                                                            <td>
                                                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?= $usr->id ?>"><i class="fa fa-edit"></i>
                                                                </a>
                                                            </td>

                                                        </tr>

                                                        <div class="modal fade" id="myModal<?= $usr->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Room Types</h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="<?= base_url() ?>users/update_user/<?= $usr->id ?>" method="post">
                                                                            <div class="form-group">
                                                                                <select name="role" id="role" class="form-control">
                                                                                    <!-- <?php
                                                                                            $drole = $this->m_users->getRole($usr->id);
                                                                                            $rolea = $this->db->get('user_role')->result_array();

                                                                                            ?> -->
                                                                                    <!-- <option value="<?= $$usr->id ?>"><?= $drole[0]->role; ?></option>
                                                                                    <?php foreach ($rolea as $m) : ?>
                                                                                        <option value="<?= $m['id'] ?>"><?= $m['role']; ?></option>
                                                                                    <?php endforeach; ?> -->
                                                                                </select>
                                                                            </div>

                                                                            <input type="hidden" value="<?= $usr->id ?>" name="id">
                                                                            <div class="modal-footer">
                                                                                <input class="btn btn-primary" type="submit" value="Update">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>