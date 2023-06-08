// Membuat nama file berubah keika pengguna memilih file
$(function () {
  bsCustomFileInput.init();
});

$(document).ready(function () {
  // Ketika pengguna memilih file
  $(".custom-file-input").on("change", function () {
    // Dapatkan nama file yang dipilih
    var fileName = $(this).val().split("\\").pop();
    // Ubah teks label tombol pilih file sesuai dengan nama file
    $(this).next(".custom-file-label").html(fileName);
  });
});
