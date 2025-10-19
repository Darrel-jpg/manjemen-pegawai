<section class="flex-1 p-4 overflow-y-auto">
    <h2 class="text-lg font-semibold border-b border-gray-300 pb-3 mb-8 w-full"><?= $data['judul'] ?></h2>
    <form action="<?= BASEURL; ?>/pegawai/<?= $data['fungsi'] ?>/<?= isset($data['data_pegawai']['id']) ? $data['data_pegawai']['id'] : ''; ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= isset($data['data_pegawai']['id']) ? $data['data_pegawai']['id'] : ''; ?>">
        <input type="hidden" name="fotoLama" value="<?= isset($data['data_pegawai']['foto']) ? $data['data_pegawai']['foto'] : ''; ?>">

        <div class="flex gap-15 mx-20 mt-10 items-start">
            <!-- FOTO -->
            <div class="w-30 bg-white">
                <input type="file" id="file" name="foto" accept="image/*" hidden>
                <div id="imgArea"
                    class="relative w-full h-40 bg-gray-200 mb-3 rounded-lg overflow-hidden flex flex-col justify-center items-center transition-all duration-300 group"
                    data-img="">
                    <?php if (!empty($data['data_pegawai']['foto'])): ?>
                        <img src="<?= ASSET; ?>/img/<?= $data['data_pegawai']['foto']; ?>" alt="Foto Pegawai"
                            class="absolute top-0 left-0 w-full h-full object-cover object-center">
                    <?php else: ?>
                        <i class="fa-solid fa-cloud-arrow-up text-[40px] text-black"></i>
                        <h3 class="text-xs font-medium mt-3">Upload Pas Foto</h3>
                    <?php endif; ?>
                </div>

                <button id="selectImg" type="button"
                    class="w-full py-2.5 rounded-lg bg-blue-500 text-white font-medium text-sm border-none cursor-pointer hover:!bg-blue-600">
                    Select Foto
                </button>
            </div>

            <!-- FORM INPUT -->
            <div class="flex-1 max-w-[53rem] mx-auto grid grid-cols-2 gap-x-20 gap-y-4 text-xs">
                <div>
                    <label for="nama" class="block mb-1 font-medium !text-xs">Nama</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama"
                        value="<?= isset($data['data_pegawai']['nama']) ? $data['data_pegawai']['nama'] : ''; ?>"
                        class="border border-gray-300 !text-xs rounded px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" autocomplete="off" required>
                </div>

                <div>
                    <label for="tanggal_masuk" class="block mb-1 font-medium !text-xs">Tanggal Masuk</label>
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input id="datepicker-orientation" datepicker datepicker-format="dd/mm/yyyy"
                            datepicker-max-date="today" type="text" name="tanggal_masuk"
                            value="<?= isset($data['data_pegawai']['tanggal_masuk']) ? date('d/m/Y', strtotime($data['data_pegawai']['tanggal_masuk'])) : ''; ?>"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                            placeholder="Pilih tanggal" autocomplete="off" required>
                    </div>
                </div>

                <div>
                    <label for="jenis_kelamin" class="block mb-1 font-medium !text-xs">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin"
                        class="border border-gray-300 !text-xs rounded px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="" disabled <?= empty($data['data_pegawai']['jenis_kelamin']) ? 'selected' : ''; ?>>-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki" <?= isset($data['data_pegawai']['jenis_kelamin']) && $data['data_pegawai']['jenis_kelamin'] === 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                        <option value="Perempuan" <?= isset($data['data_pegawai']['jenis_kelamin']) && $data['data_pegawai']['jenis_kelamin'] === 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                    </select>
                </div>

                <div>
                    <label for="jabatan" class="block mb-1 font-medium !text-xs">Jabatan</label>
                    <select id="jabatan" name="jabatan"
                        class="border border-gray-300 !text-xs rounded px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="" disabled <?= empty($data['data_pegawai']['jabatan']) ? 'selected' : ''; ?>>-- Pilih Jabatan --</option>
                        <option value="Direktur" <?= isset($data['data_pegawai']['jabatan']) && $data['data_pegawai']['jabatan'] === 'Direktur' ? 'selected' : ''; ?>>Direktur</option>
                        <option value="Manajer" <?= isset($data['data_pegawai']['jabatan']) && $data['data_pegawai']['jabatan'] === 'Manajer' ? 'selected' : ''; ?>>Manajer</option>
                        <option value="HRD" <?= isset($data['data_pegawai']['jabatan']) && $data['data_pegawai']['jabatan'] === 'HRD' ? 'selected' : ''; ?>>HRD</option>
                        <option value="Supervisor" <?= isset($data['data_pegawai']['jabatan']) && $data['data_pegawai']['jabatan'] === 'Supervisor' ? 'selected' : ''; ?>>Supervisor</option>
                        <option value="Staf Admin" <?= isset($data['data_pegawai']['jabatan']) && $data['data_pegawai']['jabatan'] === 'Staf Admin' ? 'selected' : ''; ?>>Staf Admin</option>
                        <option value="Asisten Eksekutif" <?= isset($data['data_pegawai']['jabatan']) && $data['data_pegawai']['jabatan'] === 'Asisten Eksekutif' ? 'selected' : ''; ?>>Asisten Eksekutif</option>
                        <option value="Sekretaris" <?= isset($data['data_pegawai']['jabatan']) && $data['data_pegawai']['jabatan'] === 'Sekretaris' ? 'selected' : ''; ?>>Sekretaris</option>
                    </select>
                </div>

                <div>
                    <label for="umur" class="block mb-1 font-medium !text-xs">Umur</label>
                    <input type="number" id="umur" name="umur" min="0" placeholder="Masukkan umur"
                        value="<?= isset($data['data_pegawai']['umur']) ? $data['data_pegawai']['umur'] : ''; ?>"
                        class="border border-gray-300 !text-xs rounded px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div>
                    <label for="no_hp" class="block mb-1 font-medium !text-xs">No HP</label>
                    <input type="number" id="no_hp" name="no_hp" placeholder="Masukkan nomor HP"
                        value="<?= isset($data['data_pegawai']['no_hp']) ? $data['data_pegawai']['no_hp'] : ''; ?>"
                        class="border border-gray-300 !text-xs rounded px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="col-span-2 flex justify-end gap-3 mt-6">
                    <a href="<?= BASEURL; ?>/pegawai" class="px-4 py-2 bg-red-500 text-white rounded hover:!bg-red-600">Kembali</a>
                    <button type="submit" name="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:!bg-blue-600"><?= $data['tombol']; ?></button>
                </div>
            </div>
        </div>
    </form>
</section>