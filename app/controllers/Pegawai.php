<?php 

class Pegawai extends Controller {
    public function __construct()
    {
        // session_start();
        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
    }

    public function index($page = 1) {
        $pegawaiModel = $this->model('Pegawai_model');

        $jmlDataHalaman = 4;
        $jmlData = $pegawaiModel->getJumlahPegawai();
        $jmlHalaman = ceil($jmlData / $jmlDataHalaman);

        $halSkrg = (int)$page;
        if ($halSkrg < 1) $halSkrg = 1;
        if ($halSkrg > $jmlHalaman) $halSkrg = $jmlHalaman;

        $awalData = ($halSkrg - 1) * $jmlDataHalaman;

        $data['pegawai'] = $pegawaiModel->getPegawaiByLimit($awalData, $jmlDataHalaman);
        $data['halSkrg'] = $halSkrg;
        $data['jmlHalaman'] = $jmlHalaman;
        $data['awalData'] = $awalData;
        $data['jmlData'] = $jmlData;
        $data['jmlDataHalaman'] = $jmlDataHalaman;

        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $this->view('pegawai/tabel', $data); // tampilkan tabel
        } else {
            $this->view('templates/header', ['judul' => 'Data Pegawai']);
            $this->view('templates/sidebar');
            $this->view('pegawai/index', $data);
            $this->view('templates/footer');
        }
    }

    public function uploadFoto() {
        $namaFile = $_FILES['foto']['name'];
        $error = $_FILES['foto']['error'];
        $tmpName = $_FILES['foto']['tmp_name'];

        if ($error === 4) {
            Alert::setAlert('Gagal', 'Pilih foto terlebih dahulu', 'error');
            header('Location: ' . BASEURL . '/pegawai');
            exit;
        }

        $ekstensiFotoValid = ['jpg', 'jpeg', 'png'];
        $ekstensiFoto = explode('.', $namaFile);
        $ekstensiFoto = strtolower(end($ekstensiFoto));
        if (!in_array($ekstensiFoto, $ekstensiFotoValid)) {
            Alert::setAlert('Gagal', 'Yang anda upload bukan foto', 'error');
            header('Location: ' . BASEURL . '/pegawai');
            exit;
        }

        $namaFileBaru = uniqid();
        $namaFileBaru .=  '.' . $ekstensiFoto;

        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
        return $namaFileBaru;
    }

    public function tambah() {
        if (isset($_POST['submit'])) {
            $foto = $this->uploadFoto();
            if (!$foto) {
                return $this->view('pegawai/tambah', ['tombol' => 'Tambah', 'data_pegawai' => $_POST]);
            }

            $dataPegawai = [
                'foto' => $foto,
                'nama' => $_POST['nama'],
                'jenis_kelamin' => $_POST['jenis_kelamin'],
                'jabatan' => $_POST['jabatan'],
                'umur' => $_POST['umur'],
                'tanggal_masuk' => date('Y-m-d', strtotime(str_replace('/', '-', $_POST['tanggal_masuk']))),
                'no_hp' => $_POST['no_hp']
            ];

            if ($this->model('Pegawai_model')->tambahDataPegawai($dataPegawai) > 0) {
                Alert::setAlert('Berhasil', 'Data Pegawai berhasil ditambahkan', 'success');
                header('Location: ' . BASEURL . '/pegawai');
                exit;
            } else {
                Alert::setAlert('Gagal', 'Data Pegawai gagal ditambahkan', 'error');
                header('Location: ' . BASEURL . '/pegawai/tambah');
                exit;
            }
        }

        $data['judul'] = 'Tambah Pegawai';
        $data['fungsi'] = 'tambah';
        $data['tombol'] = 'Tambah';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('pegawai/form_pegawai', $data);
        $this->view('templates/footer');        
    }

    public function hapus($id) {
        if ($this->model('Pegawai_model')->hapusDataPegawai($id) > 0) {
            Alert::setAlert('Berhasil', 'Data Pegawai berhasil dihapus', 'success');
            header('Location: ' . BASEURL . '/pegawai');
            exit;
        } else {
            Alert::setAlert('Gagal', 'Data Pegawai gagal dihapus', 'error');
            header('Location: ' . BASEURL . '/pegawai');
            exit;
        }
    }

    public function ubah($id) {
        if (isset($_POST['submit'])) {
            $dataPegawaiLama = $this->model('Pegawai_model')->getPegawaiById($id);

            if ($_FILES['foto']['error'] === 4) {
                $foto = $dataPegawaiLama['foto'];
            } else {
                $foto = $this->uploadFoto();
                if (!$foto) {
                    return $this->view('pegawai/ubah', ['tombol' => 'Ubah', 'data_pegawai' => $_POST]);
                }
            }

            $dataPegawai = [
                'id' => $id,
                'foto' => $foto,
                'nama' => $_POST['nama'],
                'jenis_kelamin' => $_POST['jenis_kelamin'],
                'jabatan' => $_POST['jabatan'],
                'umur' => $_POST['umur'],
                'tanggal_masuk' => date('Y-m-d', strtotime(str_replace('/', '-', $_POST['tanggal_masuk']))),
                'no_hp' => $_POST['no_hp']
            ];

            if ($this->model('Pegawai_model')->ubahDataPegawai($dataPegawai) > 0) {
                Alert::setAlert('Berhasil', 'Data Pegawai berhasil diubah', 'success');
                header('Location: ' . BASEURL . '/pegawai');
                exit;
            } else {
                Alert::setAlert('Gagal', 'Data Pegawai gagal diubah', 'error');
                header('Location: ' . BASEURL . '/pegawai/ubah/' . $id);
                exit;
            }
        }

        $data['judul'] = 'Edit Pegawai';
        $data['fungsi'] = 'ubah';
        $data['tombol'] = 'Ubah';
        $data['data_pegawai'] = $this->model('Pegawai_model')->getPegawaiById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('pegawai/form_pegawai', $data);
        $this->view('templates/footer');        
    }
}