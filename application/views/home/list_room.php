<!DOCTYPE html>
<html lang="en">

<head>
    <title>List Room</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/build/css/bootstrap-5.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/build/css/styleU.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/fontawesome/css/all.min.css">
    <script type='text/javascript' src='<?= base_url() ?>assets/build/js/popper.min.js'></script>
    <script type='text/javascript' src='<?= base_url() ?>assets/build/js/bootstrap-5.min.js'></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/build/css/styleH2.css">
</head>

<body>
    <section id="header">
        <nav class="navbar navbar-expand-sm" style="background-color: #C6C6C6;display:block">
            <div class="row px-2">
                <div class="col-3 col-sm-3 text-center">
                    <h1 class="navbar-brand text-white" style="font-size: 32px;">SafeRoom</h1>
                </div>
                <div class="col-5 col-sm-0 d-sm-none d-md-none d-lg-block">
                    <div class="row justify-content-center">
                        <div class="col-10">
                            <div class="input-group mt-2">
                                <input type="text" class="form-control"
                                    placeholder="&nbsp Enter a City, Locality or Hotel"
                                    aria-label="Enter a City, Locality or Hotel" aria-describedby="basic-addon2" style="border: none; border-bottom-left-radius: 9999px;border-top-left-radius: 9999px; background-color: 
                                    #D9D9D9; box-shadow: none; height: 45px;">
                                <button type="submit" class="input-group-text" id="basic-addon2" style="border: none; border-bottom-right-radius: 9999px;border-top-right-radius: 9999px; background-color: #b9b9b9;
                        ;">
                                    <table>
                                        <tr>
                                            <td><i class="fa-solid fa-magnifying-glass"></i></td>
                                            <td class="ml-2">Cari</td>
                                        </tr>
                                    </table>
                                </button>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-sm-9 col-md-9 col-lg-3 text-end">
                    <!-- Button trigger modal -->
                    <?php
                    if ($this->session->userdata('full_name')) {
                    ?>
                    <div class="dropdown mt-2">
                        <a class="text-dark dropdown-toggle" href=" #" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" style="border-radius:9999px;text-decoration: none;font-size: 19px;">
                            <i class="fa-solid fa-user"></i><span> Hallo, <?= $this->session->userdata('full_name') ?>
                        </a>

                        <ul class="dropdown-menu" id="profile">
                            <li><a class="dropdown-item" href="<?= base_url('home/profile') ?>"
                                    style="border-bottom: 1px solid black;"><i class="fa-solid fa-user"></i>
                                    Profile</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('home/pesanansaya') ?>"
                                    style="border-bottom: 1px solid black;"><i class="fa-solid fa-briefcase"></i>
                                    Pesanan
                                    Saya</a></li>
                            <li><a class="dropdown-item" data-toggle="modal" data-target="#logoutModal" href="#"><i
                                        class="fa-solid fa-right-from-bracket"></i>Log
                                    out</a></li>
                        </ul>
                    </div>

                    <?php } else { ?>
                    <a href="<?= base_url('home/login') ?>">
                        <button type="button" class="btn btn-lg"
                            style="border-radius:9999px; background-color: #ffffff5c; color: #fff;font-size:15px; height: 50px;">
                            Gabung | Daftar
                        </button>
                    </a>
                    <?php } ?>

                </div>
            </div>
        </nav>
    </section>

    <section id="content" class="mb-4">
        <div class="row justify-content-center">
            <div class="col-11 mt-3">
                <div class="row">
                    <div class="col-md-4 d-sm-none d-md-none d-lg-block  my-3" id="filter-hotel">
                        <form action="">
                            <div class="filter-hotel p-3 px-4">
                                <div class="row">
                                    <div class="col-3">
                                        <p style="color:#4F4F4F;font-size:24px;font-weight: 400;">Filter</p>
                                    </div>
                                    <div class="col-9 text-end">
                                        <button class="btn-nb" type="reset">Bersihkan Semua</button>
                                        <!-- <p style="color:#4F4F4F;font-size:18px;font-weight: 400;"></p> -->
                                    </div>
                                </div>
                                <hr style="border:.1rem solid black">
                                <div class="filter-input mb-3 mt-4">
                                    <label for="customRange2" class="form-label"
                                        style="color:#4F4F4F;font-size:20px;font-weight: 400;">Harga</label>
                                    <div class="slider mt-3">
                                        <div class="progress"></div>
                                    </div>
                                    <div class="range-input">
                                        <input type="range" class="range-min" min="0" max="10000" value="2500"
                                            step="100">
                                        <input type="range" class="range-max" min="0" max="10000" value="7500"
                                            step="100">
                                    </div>
                                    <div class="price-input">
                                        <div class="row">
                                            <div class="col-6 text-start">
                                                <div class="field ">
                                                    <input type="number" id="id123" class="input-min inp-min-max"
                                                        value="2500">
                                                </div>
                                            </div>
                                            <div class="col-6 text-end">
                                                <div class="field">
                                                    <input type="number" id="id1234" class="input-max inp-min-max"
                                                        value="7500">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="pilihan-tambahan mt-5">
                                    <p class="mt-5" style="color:#4F4F4F;font-size:24px;font-weight: 400;">Pilihan
                                        Tambahan
                                    </p>
                                    <hr style="border:.1rem solid black">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Sarapan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Chek out lebih lama
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Chek in lebih cepat
                                        </label>
                                    </div>
                                </div>
                                <div class="tipe mt-4">
                                    <p class="" style="color:#4F4F4F;font-size:24px;font-weight: 400;">Tipe SafeRoom
                                    </p>
                                    <hr style="border:.1rem solid black">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Semua Tipe
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Koolkost
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            SafePartner
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            UrbanView
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            SafeLiving
                                        </label>
                                    </div>
                                </div>
                                <div class="kosong-aja" style="height: 200px;">

                                </div>
                                <div class="baat text-center">
                                    <button type="submit" class="btn px-5"
                                        style="border-radius: 9999px; border:1px solid black">Terapkan
                                        Filter</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="text-end">

                            <a href="#" class="text-decoration-none text-dark d-lg-none d-sm-block"
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="modal-filter"><i
                                    class="fa-solid fa-list"></i>
                                Filter</a>
                        </div>
                        <?php foreach ($room as $kamar) : ?>
                        <div class="row my-3 bunkusKamar">
                            <div class="col-6">
                                <?php $img = explode(',', $kamar->image); ?>
                                <a href="<?= base_url('home/halaman3/' . $kamar->id) ?>">
                                    <img class="w-100" src="<?= base_url() ?>assets/image/room/<?= $img[0] ?>" alt="">
                                </a>
                            </div>
                            <div class="col-6 mt-2 bTitle">
                                <a href="<?= base_url('home/halaman3') ?>">
                                    <h5 style="color:#222222;font-size: 24px;"><?= $kamar->room_name; ?></h5>
                                </a>
                                <p style="font-size:15px"><?= $this->M_room->shorten($kamar->address, 25); ?></p>
                                <table style="font-size: 12px;">
                                    <?php
                                        $all_tags = explode(',', $kamar->facility);
                                        foreach ($all_tags as $key) :
                                        ?>
                                    <tr>
                                        <td><img src="<?= base_url() ?>assets/build/images/fasilitas/<?= $key ?>.png"
                                                alt="" width="20px" class="mr-2"></td>
                                        <td><?= $key ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </table>
                                <p class="text-danger fs-5 mt-4">Rp. <?= number_format($kamar->price) ?></p>

                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
    </section>

    <section id="footer mt-4">
        <div class="footer">
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-facebook"></i>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color:#d1d1d1;">

                <div class="modal-body">
                    <div class="text-end">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="col-md-12">
                        <form action="">
                            <div class=" p-3 px-4">
                                <div class="row">
                                    <div class="col-3">
                                        <p style="color:#4F4F4F;font-size:24px;font-weight: 400;">Filter</p>
                                    </div>
                                    <div class="col-9 text-end">
                                        <button class="btn-nb" type="reset">Bersihkan Semua</button>
                                        <!-- <p style="color:#4F4F4F;font-size:18px;font-weight: 400;"></p> -->
                                    </div>
                                </div>
                                <hr style="border:.1rem solid black">
                                <div class="filter-input mb-3 mt-4">
                                    <label for="customRange2" class="form-label"
                                        style="color:#4F4F4F;font-size:20px;font-weight: 400;">Harga</label>
                                    <div class="mt-3" id="slider">
                                        <div class="progress"></div>
                                    </div>
                                    <div class="" id="range-input">
                                        <input type="range" class="range-min" min="0" max="10000" value="2500"
                                            step="100">
                                        <input type="range" class="range-max" min="0" max="10000" value="7500"
                                            step="100">
                                    </div>
                                    <div class="" id="price-input">
                                        <div class="row">
                                            <div class="col-6 text-start">
                                                <div class="field ">
                                                    <input type="number" id="id123" class="input-min inp-min-max"
                                                        value="2500">
                                                </div>
                                            </div>
                                            <div class="col-6 text-end">
                                                <div class="field">
                                                    <input type="number" id="id1234" class="input-max inp-min-max"
                                                        value="7500">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="pilihan-tambahan mt-5">
                                    <p class="mt-5" style="color:#4F4F4F;font-size:24px;font-weight: 400;">Pilihan
                                        Tambahan
                                    </p>
                                    <hr style="border:.1rem solid black">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Sarapan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Chek out lebih lama
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Chek in lebih cepat
                                        </label>
                                    </div>
                                </div>
                                <div class="tipe mt-4">
                                    <p class="" style="color:#4F4F4F;font-size:24px;font-weight: 400;">Tipe SafeRoom
                                    </p>
                                    <hr style="border:.1rem solid black">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Semua Tipe
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Koolkost
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            SafePartner
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            UrbanView
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            SafeLiving
                                        </label>
                                    </div>
                                </div>
                                <div class="kosong-aja" style="height: 100px;">

                                </div>
                                <div class="baat text-center">
                                    <button type="submit" class="btn px-5"
                                        style="border-radius: 9999px; border:1px solid black">Terapkan
                                        Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('home/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url() ?>assets/vendors/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/fontawesome/js/all.min.js"></script>
    <script src="<?= base_url() ?>assets/build/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/build/js/scriptH2.js"></script>
</body>