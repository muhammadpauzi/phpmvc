<?php
class User extends Controller
{
    public function index()
    {
        $data['judul'] = 'User';
        $data['users'] = $this->model('User_model')->getAllUser();
        $this->view('templates/header', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'User - Detail';
        $data['user'] = $this->model('User_model')->getUserById($id);
        $this->view('templates/header', $data);
        $this->view('user/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('User_model')->tambahDataUser($_POST) > 0) {
            Flasher::setFlash("berhasil", "ditambahkan", "success");
            header("Location: " . BASEURL . "/user");
            exit;
        } else {
            Flasher::setFlash("gagal", "ditambahkan", "danger");
            header("Location: " . BASEURL . "/user");
            exit;
        }
    }

    public function cari()
    {
        $keyword = $_POST['keyword'];
        if (!isset($keyword) or empty($keyword)) {
            header("Location: " . BASEURL . '/user');
            exit;
        }
        $data['judul'] = 'User';
        $data['users'] = $this->model('User_model')->cariDataUser($keyword);
        $this->view('templates/header', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer');
    }

    public function hapus($id)
    {
        if ($this->model('User_model')->hapusDataUser($id) > 0) {
            Flasher::setFlash("berhasil", "dihapus", "success");
            header("Location: " . BASEURL . "/user");
            exit;
        } else {
            Flasher::setFlash("gagal", "dihapus", "danger");
            header("Location: " . BASEURL . "/user");
            exit;
        }
    }

    public function getUbah()
    {
        $id = $_POST['id'];
        echo json_encode($this->model('User_model')->getUserById($id));
    }

    public function ubah()
    {
        if ($this->model('User_model')->ubahDataUser($_POST) > 0) {
            Flasher::setFlash("berhasil", "diubah", "success");
            header("Location: " . BASEURL . "/user");
            exit;
        } else {
            Flasher::setFlash("gagal", "diubah", "danger");
            header("Location: " . BASEURL . "/user");
            exit;
        }
    }
}
