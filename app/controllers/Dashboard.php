<?php

class Dashboard extends Controller{
    public function index() {
        
        if (!isset($_SESSION['user'])) {
          header('Location: ' . BASEURL . '?c=auth');
          exit;
        }

        $username = $_SESSION['user']['username'];
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->model('User_model')->getUserByUsername($username);
        $data['totalPegawai'] = $this->model('Pegawai_model')->getJumlahPegawai();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }
}