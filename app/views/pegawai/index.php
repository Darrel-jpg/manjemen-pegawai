<section class="flex-1 p-4 overflow-y-auto">
    <h2 class="text-lg font-semibold border-b-1 border-gray-300 pb-3 mb-8 w-full">Data Pegawai</h2>
    <a href="<?= BASEURL; ?>/pegawai/tambah" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 text-xs">Tambah</a>
    <div id="data-container" class="overflow-x-auto mt-5">
        <!-- Data pegawai -->
        <?php require 'tabel.php'; ?>
        <!-- Akhir Pagination -->
    </div>
</section>