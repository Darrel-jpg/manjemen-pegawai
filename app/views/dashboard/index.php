<section class="flex-1 p-4 overflow-y-auto">
    <h2 class="text-lg font-semibold border-b-1 border-gray-300 pb-3 mb-8 w-full">Selamat Datang, <?= $data['user']['username'] ?> di Aplikasi Manajemen Pegawai</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
        <div class="bg-blue-500 w-2xs text-white rounded-xl shadow-xl px-6 py-10 flex items-center gap-10">
            <div class="text-4xl">
                <i class="fa-solid fa-users"></i>
            </div>
            <div>
                <h3 class="text-sm font-medium">Total Pegawai</h3>
                <p class="text-3xl font-bold mt-1"><?= $data['totalPegawai']; ?></p>
            </div>
        </div>
    </div>
</section>