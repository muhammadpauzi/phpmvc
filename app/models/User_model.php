<?php

class User_model
{
    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllUser()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataUser($data)
    {
        $this->db->query("INSERT INTO user VALUES (NULL,:nama,:umur,:email)");
        $this->db->bind("nama", htmlspecialchars($data['nama']));
        $this->db->bind("umur", htmlspecialchars($data['umur']) . " Tahun");
        $this->db->bind("email", htmlspecialchars($data['email']));
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataUser($keyword)
    {
        $this->db->query("SELECT * FROM user WHERE
                                nama LIKE :keyword");
        $this->db->bind("keyword", "%$keyword%");
        return $this->db->resultSet();
    }

    public function hapusDataUser($id)
    {
        $this->db->query("DELETE FROM user WHERE id = :id");
        $this->db->bind("id", $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataUser($data)
    {
        $this->db->query("UPDATE user SET 
                            nama = :nama,
                            umur = :umur,
                            email = :email
                        WHERE id = :id");
        $this->db->bind('id', htmlspecialchars($data['id']));
        $this->db->bind('nama', htmlspecialchars($data['nama']));
        $this->db->bind('umur', htmlspecialchars($data['umur']) . ' Tahun');
        $this->db->bind('email', htmlspecialchars($data['nama']));
        $this->db->execute();
        return $this->db->rowCount();
    }
}
