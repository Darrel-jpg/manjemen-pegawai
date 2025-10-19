<?php

class Auth extends Controller
{
    public function index()
    {
        if (isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }

        if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
            $id = $_COOKIE['id'];
            $key = $_COOKIE['key'];

            $user = $this->model('User_model')->getUserById($id);

            if ($user && $key === hash('sha256', $user['username'])) {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $user['username'];
                
                header('Location: ' . BASEURL . '/dashboard');
                exit;
            }
        }

        $this->view('auth/index');
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->model('User_model')->getUserByUsername($username);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $user['username'];

                if (isset($_POST['remember'])) {
                    setcookie('id', $user['id'], time() + (7 * 24 * 60 * 60), '/');
                    setcookie('key', hash('sha256', $user['username']), time() + (7 * 24 * 60 * 60), '/');
                }

                header('Location: ' . BASEURL . '/dashboard');
                exit;
            } else {
                Alert::setAlert('Gagal', 'Username atau password salah', 'error');
                header('Location: ' . BASEURL . '/auth');
                exit;
            }
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->model('User_model')->register($_POST) > 0) {
                Alert::setAlert('Berhasil', 'User baru berhasil ditambahkan', 'success');
                header('Location: ' . BASEURL . '/auth');
                exit;
            } else {
                Alert::setAlert('Gagal', 'Registrasi gagal', 'error');
                header('Location: ' . BASEURL . '/auth');
                exit;
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['login']);
        session_destroy();
        setcookie('id', '', time() - (7 * 24 * 60 * 60), '/');
        setcookie('key', '', time() - (7 * 24 * 60 * 60), '/');
        header('Location: ' . BASEURL . '/auth');
        exit;
    }
}