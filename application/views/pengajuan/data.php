<div class="right_col" role="main">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
    <?php endif; ?>
    <div class="container-fluid ">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

        <!-- DataTales Example -->

        <div class="card shadow mb-4 ">

            <div class="col-lg-12 mt-4">
                <!-- Button trigger modal -->


                <div class="card-body ">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Data Pengajuan Hotel</h2>
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
                                                        <th>Full Name</th>
                                                        <th>Email</th>
                                                        <th>Nama Hotel</th>
                                                        <th>Bukti Kepemilikan</th>
                                                        <th>Status</th>
                                                        <th width="5%">Action</th>
                                                        <th>Tanggal Lahir</th>
                                                        <th>Telp</th>
                                                        <th>Gender</th>
                                                        <th>City</th>
                                                        <th>Room</th>
                                                        <th>Address</th>
                                                        <th>About</th>
                                                        <th>Created</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($pengajuan as $ajuan) :
                                                    ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $ajuan->nama ?></td>
                                                            <td><?= $ajuan->email ?></td>
                                                            <td><?= $ajuan->hotel ?></td>
                                                            <td><?= $ajuan->image ?></td>
                                                            <?php if ($ajuan->status == 'Pengajuan') { ?>
                                                                <td>
                                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#cobaan<?= $ajuan->id ?>">
                                                                        Pengajuan
                                                                    </button>

                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="cobaan<?= $ajuan->id ?>" tabindex="-1" role="dialog" aria-labelledby="cobaanLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="cobaanLabel">Status Pengajuan</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body text-center">
                                                                                    <a href="<?= base_url('pengajuan/diterima/') . $ajuan->id ?>">
                                                                                        <button class="btn btn-success">Di Terima</button>
                                                                                    </a>
                                                                                    <a href="<?= base_url('pengajuan/ditolak/') . $ajuan->id ?>">
                                                                                        <button class="btn btn-danger">Di Tolak</button>
                                                                                    </a>

                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                            <?php } elseif ($ajuan->status == 'Diterima') { ?>
                                                                <td><span class="badge text-bg-success" style="color: #fff !important;background-color: RGBA(25, 135, 84, var(--bs-bg-opacity, 1)) !important;">Di Terima</span>
                                                                </td>

                                                            <?php } elseif ($ajuan->status == 'Ditolak') { ?>
                                                                <td><span class="badge text-bg-danger" style="color: #fff !important;background-color: RGBA(220, 53, 69, var(--bs-bg-opacity, 1)) !important;">Di Tolak</span>
                                                                </td>
                                                            <?php } ?>
                                                            <td>
                                                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i>
                                                                </a>
                                                            </td>
                                                            <td><?= $ajuan->telp ?></td>
                                                            <td><?= $ajuan->tanggal_lahir ?></td>
                                                            <td><?= $ajuan->gender ?></td>
                                                            <td><?= $ajuan->city ?></td>
                                                            <td><?= $ajuan->room ?></td>
                                                            <td><?= $ajuan->address ?></td>
                                                            <td><?= $ajuan->about ?></td>

                                                            <td><?= $ajuan->created ?></td>


                                                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">×</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

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

    </div>
</div>