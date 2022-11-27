<div class="right_col" role="main">
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('flash-gagal'); ?>"></div>
            <?php if ($this->session->flashdata('flash')) : ?>
            <?php endif; ?>

            <div class="row d-flex justify-content-end">
            </div>
            <div class="card-body">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">

                                        <table id="datatable-responsive" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th width=10%>No</th>
                                                    <th>Nama</th>
                                                    <th>Kamar</th>
                                                    <th>Hotel</th>
                                                    <th>Check In</th>
                                                    <th>Check Out</th>
                                                    <th>Payment Method</th>
                                                    <th>Total</th>
                                                    <th>kode</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($failed as $order) :
                                                ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $order->full_name ?></td>
                                                        <td><?= $order->room_name ?></td>
                                                        <td><?= $order->nama_hotel ?></td>
                                                        <td><?= $order->check_in ?></td>
                                                        <td><?= $order->check_out ?></td>

                                                        <td><?= $order->method ?></td>
                                                        <td><?= number_format($order->total) ?></td>
                                                        <td><?= $order->kode ?></td>
                                                        <td>
                                                            <?php if ($order->status == 'Expired') { ?>
                                                                <span class="badge text-bg-danger" style="color: #fff !important;background-color: #dc3545 !important;">Expired</span>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?= base_url('transaksi/delete_failed/') . $order->id ?>" class="tombol-hapus btn btn-danger btn-sm">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        </td>
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