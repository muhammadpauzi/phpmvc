<?php
// Gunakan extends agar bisa menggunakan method didalam controllernya yaitu view
class Home extends Controller
{
    // View
    public function index()
    {
        // $data adalah data yang akan dikirimkan
        $data['judul'] = 'Home';
        // Jalankan method view dengan mengirimkan halaman apa yang ingin ditampilkan
        // Panggil halaman header untuk menampilkan bagian atas htmlnya dengan mengirimkan nama title yaitu yang ada didalam $data
        $this->view('templates/header', $data);
        // Panggil halaman indexnya dan juga mengirimkan data agar bisa digunakan dihalaman atau filenya
        $this->view('home/index', $data);
        // Dan panggil juga halaman footernya
        $this->view('templates/footer');
    }
}
