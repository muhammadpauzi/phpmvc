<?php
class App
{
    // Property untuk menentukan url
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        // Property Controller
        // Ambil return function parseURL
        $url = $this->parseURL();
        // Cek $url jika $url = null maka ganti $url menjadi apa nilai dari $controller
        if ($url == null) {
            $url = [$this->controller];
        }
        // Cek apakah ada file yang didalam folder controller yang namanya sama dengan url dengan index ke 0
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            // Masukan $url index ke 0 kedalam property controller
            $this->controller = $url[0];
            // Lalu hilang kan $url index ke 0 agar bisa mengambil $params
            unset($url[0]);
        }
        // Lalu tampilkan filenya
        require_once '../app/controllers/' . $this->controller . '.php';

        $this->controller = new $this->controller;

        // Property Method
        // Cek apakah ada method di url jika tidak ada panggil method default
        if (isset($url[1])) {
            // Cek apakah ada method diurl yang sama didalam object controller
            if (method_exists($this->controller, $url[1])) {
                // Lalu masukan ke dalam property method
                $this->method = $url[1];
                // Dan hilang kan url methodnya agar bisa mengambil parameter di url
                unset($url[1]);
            }
        }

        // Params
        // Setelah $url controller dan method dihapus cek jika $url masih ada maka itu adalah parameter
        if (!empty($url)) {
            // ambil isi array urlnya agar indexnya dari nol, coba cek dengan var_dump
            // Lalu masukan ke propery params
            $this->params = array_values($url);
        }

        // Jalankan controller & method, serta kirimkan params jika ada
        // function ini untuk menjalankan controller dan method dan juga mengirimkan params
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        // Routing
        // Cek apakah ada parameter url
        if (isset($_GET['url'])) {
            // Jika ada bersihkan slash di akhir dgn rtrim
            $url = rtrim($_GET['url'], '/');
            // Bersihkan url dari karakter aneh dengan function filter_var
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // Pecah url menjadi array dengan delimiter slash
            $url = explode('/', $url);
            return $url;
        }
    }
}
