</div>
<script src="<?= ASSET; ?>/js/pagination.js"></script>
<script src="<?= ASSET; ?>/js/form_pegawai.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite-datepicker@1.3.1/dist/flowbite-datepicker.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
  const container = document.getElementById("data-container") || document.body;

  container.addEventListener("click", function(e) {
    const btn = e.target.closest(".btn-hapus");
    if (!btn) return;

    e.preventDefault();
    const href = btn.getAttribute("href");

    Swal.fire({
      title: "Apakah anda yakin?",
      text: "Data ini akan dihapus dan tidak dapat dikembalikan!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Ya, hapus!"
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = href;
      }
    });
  });
});
</script>
<?php Alert::alert(); ?>
</body>
</html>