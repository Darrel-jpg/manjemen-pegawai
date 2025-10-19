<?php 

class Pegawai_model{
    private $table = 'pegawai';
    private $db; // database handler

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPegawai()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();   
    }

    public function getPegawaiById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();   
    }

    public function getJumlahPegawai() {
        $this->db->query("SELECT COUNT(*) as total FROM $this->table");
        return $this->db->single()['total'];
    }

    public function getPegawaiByLimit($awalData, $jumlahData) {
        $this->db->query("SELECT * FROM $this->table ORDER BY id DESC LIMIT :awal, :jumlah");
        $this->db->bind('awal', $awalData);
        $this->db->bind('jumlah', $jumlahData);
        return $this->db->resultSet();
    }

    public function tambahDataPegawai($data)
    {
        $query = "INSERT INTO pegawai
                    VALUES
                  ('', :foto, :nama, :jenis_kelamin, :umur, :tanggal_masuk, :jabatan, :no_hp)";

        $this->db->query($query);
        $this->db->bind('foto', $data['foto']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('umur', $data['umur']);
        $this->db->bind('tanggal_masuk', $data['tanggal_masuk']);
        $this->db->bind('jabatan', $data['jabatan']);
        $this->db->bind('no_hp', $data['no_hp']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPegawai($id)
    {
        $query = "DELETE FROM pegawai WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataPegawai($data)
    {
        $query = "UPDATE pegawai SET
                    foto = :foto,
                    nama = :nama,
                    jenis_kelamin = :jenis_kelamin,
                    umur = :umur,
                    tanggal_masuk = :tanggal_masuk,
                    jabatan = :jabatan,
                    no_hp = :no_hp
                  WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('foto', $data['foto']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('umur', $data['umur']);
        $this->db->bind('tanggal_masuk', $data['tanggal_masuk']);
        $this->db->bind('jabatan', $data['jabatan']);
        $this->db->bind('no_hp', $data['no_hp']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}