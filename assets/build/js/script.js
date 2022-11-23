// Sweet Alert
const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal.fire(
        'Sukses',
        'Data Berhasil ' + flashData,
        'success'
    )
}

// Sweet Alert
const flashGagal = $('.flash-data-gagal').data('flashdata');

if (flashGagal) {
    Swal.fire({
        title: 'Gagal',
        text: 'Data Gagal ' + flashGagal,
        type: 'error'
    });
}



// tombol-hapus
$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin',
        text: "data akan dihapus!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e74c3c',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Delete'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});


// Data table
// $(function () {
//     $("#dataBerita").DataTable({
//         "responsive": true,
//         "lengthChange": false,
//         "autoWidth": false,
//         "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
//     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
//     $('#example2').DataTable({
//         "paging": true,
//         "lengthChange": false,
//         "searching": false,
//         "ordering": true,
//         "info": true,
//         "autoWidth": false,
//         "responsive": true,
//     });
// });

// $(document).ready(function () {
//     $("#dataBerita").DataTable({
//         order: [[1, "desc"]],
//     });
// });

// $(document).ready(function () {
//     $("#dataGalery").DataTable({
//         order: [[1, "desc"]],
//     });
// });

// $(document).ready(function () {
//     $("#dataFile").DataTable({
//         order: [[1, "desc"]],
//     });
// });

// $(document).ready(function () {
//     $("#dataPages").DataTable({
//         order: [[1, "desc"]],
//     });
// });

// // Summernote
// $(function () {
//     // Summernote
//     $('#summernote').summernote({
//         toolbar: [
//             // [groupName, [list of button]]
//             ['style', ['bold', 'italic', 'underline', 'clear']],
//             ['font', ['strikethrough', 'superscript', 'subscript']],
//             // ['fontsize', ['fontsize']],
//             // ['color', ['color']],
//             ['para', ['ul', 'ol', 'paragraph']],
//             ['height', ['height']],
//             ['insert', ['link']]
//         ]
//     });
// })

// Preview sampul
// function previewImg() {
//     const sampul = document.querySelector("#gambar");
//     const sampulLabel = document.querySelector(".costum-file-label");
//     const imgPreview = document.querySelector(".img-preview");

//     sampulLabel.textContent = sampul.files[0].name;

//     const fileSampul = new FileReader();
//     fileSampul.readAsDataURL(sampul.files[0]);

//     fileSampul.onload = function (e) {
//         imgPreview.src = e.target.result;
//     };
// }

// function previewGmb() {
//     const sampul = document.querySelector("#sampul");
//     const sampulLabel = document.querySelector(".custom-file-input");
//     const imgPreview = document.querySelector(".img-preview");

//     sampulLabel.textContent = sampul.files[0].name;

//     const fileSampul = new FileReader();
//     fileSampul.readAsDataURL(sampul.files[0]);

//     fileSampul.onload = function (e) {
//         imgPreview.src = e.target.result;
//     };
// }

// function previewGmb() {
//     const sampul = document.querySelector("#image");
//     const sampulLabel = document.querySelector(".custom-file-input");
//     const imgPreview = document.querySelector(".img-preview");

//     sampulLabel.textContent = sampul.files[0].name;

//     const fileSampul = new FileReader();
//     fileSampul.readAsDataURL(sampul.files[0]);

//     fileSampul.onload = function (e) {
//         imgPreview.src = e.target.result;
//     };
// }

// // Input / Browse file

// $('.custom-file-input').on('change', function () {
//     let fileName = $(this).val().split('\\').pop();
//     $(this).next('.custom-file-label').addClass("selected").html(fileName);
// });
