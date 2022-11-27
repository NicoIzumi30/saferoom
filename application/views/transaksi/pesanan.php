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
                                                foreach ($pesanan as $order) :
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
                                                            <?php if ($order->status == 'Menunggu') { ?>
                                                                <button class="btn btn-success btn-sm conpirm" href="<?= base_url('transaksi/confirm/' . $order->id) ?>">Konfirmasi</button>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?= base_url('transaksi/delete_order/') . $order->id ?>" class="tombol-hapus btn btn-danger btn-sm">
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
    <!-- <div class="modal fade" id="add_city" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Payment Method</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() ?>payment" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="method">Payment Method</label>
                            <input type="text" class="form-control" id="method" name="method" placeholder="Payment Method">
                        </div>
                        <div class="form-group">
                            <label for="norek">Nomer Rekening</label>
                            <input type="text" class="form-control" id="norek" name="norek" placeholder="Nomer Rekening">
                        </div>
                        <div class="form-group">
                            <label for="idc">id & class</label>
                            <input type="text" class="form-control" id="idc" name="idc">
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control">
                                <option value="">Select Category</option>
                                <?php foreach ($category as $m) : ?>
                                    <option value="<?= $m['id'] ?>"><?= $m['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <input class="btn btn-primary" type="submit" value="Add Payment Method">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div> -->
</div>
<script src="<?= base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/build/js/sweetalert2.all.min.js"></script>

<script>
    $('.conpirm').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        const flashData1 = $('.flash-data-confirm').data('flashdata');
        if (flashData1) {
            Swal.fire(
                'Sukses',
                'Data Berhasil ' + flashData,
                'success'
            )
        }
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Confirm',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    '',
                    'error'
                )
            }
        })

    });
</script>