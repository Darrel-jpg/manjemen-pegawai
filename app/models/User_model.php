<?php 

class User_model
{
    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUserById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getUserByUsername($username)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE BINARY username = :username");
        $this->db->bind('username', $username);
        return $this->db->single();
    }

    public function register($data)
    {
        $username = $data['username'];
        $password = isset($data['password']) ? $data['password'] : '';
        $confirm = isset($data['confirm_password']) ? $data['confirm_password'] : '';

        if ($password !== $confirm) {
            return 0;
        }

        // cek username sudah ada
        $this->db->query("SELECT username FROM {$this->table} WHERE username = :username");
        $this->db->bind('username', $username);
        if ($this->db->single()) {
            return 0;
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $this->db->query("INSERT INTO {$this->table} (username, password) VALUES (:username, :password)");
        $this->db->bind('username', $username);
        $this->db->bind('password', $passwordHash);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
