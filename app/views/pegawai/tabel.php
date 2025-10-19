<table class="table-fixed border-collapse border border-gray-400 w-full text-center text-sm">
    <tr class="bg-gray-100">
        <th class="border border-gray-300 px-2 py-2 w-10">No.</th>
        <th class="border border-gray-300 px-4 py-2 w-25">Foto</th>
        <th class="border border-gray-300 px-4 py-2 w-40">Nama</th>
        <th class="border border-gray-300 px-2 py-2 w-30">Jenis Kelamin</th>
        <th class="border border-gray-300 px-2 py-2 w-15">Umur</th>
        <th class="border border-gray-300 px-4 py-2 w-40">Tanggal Masuk</th>
        <th class="border border-gray-300 px-2 py-2 w-23">Jabatan</th>
        <th class="border border-gray-300 px-4 py-2 w-32">No HP</th>
        <th class="border border-gray-300 px-4 py-2 w-30">Aksi</th>
    </tr>
    <?php $i = $data['awalData'] + 1 ?>
    <?php foreach ($data['pegawai'] as $pegawai): ?>
        <tr>
            <td class="border border-gray-300 px-2 py-2"><?= $i ?></td>
            <td class="border border-gray-300 px-3 py-2">
                <img src="<?= ASSET; ?>/img/<?= $pegawai["foto"] ?>" class="w-[60px] h-[85px] block mx-auto object-cover rounded">
            </td>
            <td class="border border-gray-300 px-3 py-2"><?= $pegawai["nama"] ?></td>
            <td class="border border-gray-300 px-3 py-2"><?= $pegawai["jenis_kelamin"] ?></td>
            <td class="border border-gray-300 px-3 py-2"><?= $pegawai["umur"] ?></td>
            <td class="border border-gray-300 px-3 py-2">
                <?php
                $tanggal = new DateTime($pegawai["tanggal_masuk"]);
                echo $tanggal->format('j F Y');
                ?>
            </td>
            <td class="border border-gray-300 px-3 py-2"><?= $pegawai["jabatan"] ?></td>
            <td class="border border-gray-300 px-3 py-2"><?= $pegawai["no_hp"] ?></td>
            <td class="border border-gray-300 px-3 py-2">
                <a href="<?= BASEURL; ?>/pegawai/ubah/<?= $pegawai['id']; ?>" class="text-white bg-green-500 px-2 py-1 rounded text-xs hover:bg-green-600">Edit</a>
                <a href="<?= BASEURL; ?>/pegawai/hapus/<?= $pegawai['id']; ?>" class="btn-hapus text-white bg-red-500 px-2 py-1 rounded text-xs hover:bg-red-600">Hapus</a>
            </td>
        </tr>
        <?php $i++ ?>
    <?php endforeach; ?>
</table>
<!-- Akhir data pegawai -->

<!-- Pagination -->
<div class="fixed bottom-5 flex w-5/6 items-center justify-between bg-white px-4 py-3 mt-5">
    <p class="text-sm text-gray-700">
        Showing <span class="font-medium"><?= $data['awalData'] + 1 ?></span>
        to <span class="font-medium"><?= min($data['awalData'] + $data['jmlDataHalaman'], $data['jmlData']) ?></span>
        of <span class="font-medium"><?= $data['jmlData'] ?></span> results
    </p>

    <nav aria-label="Pagination" class="isolate inline-flex -space-x-px rounded-md shadow-sm">
        <!-- Tombol Previous -->
        <?php if ($data['halSkrg'] > 1): ?>
            <a href="<?= BASEURL; ?>/pegawai/<?= $data['halSkrg'] - 1; ?>" data-page="<?= $data['halSkrg'] - 1; ?>"
                class="page-link relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                <span class="sr-only">Previous</span>
                <svg viewBox="0 0 20 20" fill="currentColor" class="size-5">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z" />
                </svg>
            </a>
        <?php else: ?>
            <span class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-300 ring-1 ring-inset ring-gray-200 cursor-not-allowed">
                <svg viewBox="0 0 20 20" fill="currentColor" class="size-5">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z" />
                </svg>
            </span>
        <?php endif; ?>

        <!-- Nomor Halaman -->
        <?php for ($i = 1; $i <= $data['jmlHalaman']; $i++): ?>
            <a href="<?= BASEURL; ?>/pegawai/<?= $i; ?>" data-page="<?= $i; ?>"
                class="page-link relative inline-flex items-center px-4 py-2 text-sm font-semibold <?= $i == $data['halSkrg'] ? 'bg-blue-500 text-white' : 'text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50' ?>">
                <?= $i; ?>
            </a>
        <?php endfor; ?>

        <!-- Tombol Next -->
        <?php if ($data['halSkrg'] < $data['jmlHalaman']): ?>
            <a href="<?= BASEURL; ?>/pegawai/<?= $data['halSkrg'] + 1; ?>" data-page="<?= $data['halSkrg'] + 1; ?>"
                class="page-link relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                <span class="sr-only">Next</span>
                <svg viewBox="0 0 20 20" fill="currentColor" class="size-5">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" />
                </svg>
            </a>
        <?php else: ?>
            <span class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-300 ring-1 ring-inset ring-gray-200 cursor-not-allowed">
                <svg viewBox="0 0 20 20" fill="currentColor" class="size-5">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" />
                </svg>
            </span>
        <?php endif; ?>
    </nav>
</div>