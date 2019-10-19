<?php 
class Database {
    // $host = untuk memberitau kita menggunakan server lokal yaitu localhost,
    // $user = username dari localhost
    // $pass = password untuk masuk ke localhost mysql kita, kosongkan jika tidak menggunakan password
    // $db = untuk memberi akses kita menggunakan database mana di server lokal kita (localhost)
    public $host = "localhost", $user = "root", $pass = 123, $db="latihan";
    public $koneksi;
    public function __construct()
    {
        $this->koneksi = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        
        if($this->koneksi)
        {
            // echo "berhasil";
        } else {
            echo "Koneksi Database Gagal";
        }
    }
}
class Bio extends Database {
    // Menampilkan Semua Data
    public function index()
    {
        
        $datasiswa = mysqli_query($this->koneksi,"select * from ulangan");
        // var_dump($datasiswa);
        return $datasiswa;
    }
    // Menambah Data
    public function create($nama_produk,$kategori_produk,$jumlah_produk,$harga_produk,$deskripsi,$sub_total)
    {
         mysqli_query($this->koneksi,"INSERT INTO ulangan VALUES('','$nama_produk','$kategori_produk','$jumlah_produk','$harga_produk','$deskripsi','$sub_total')");
    }
    // Menampilkan Data Berdasarkan ID
    public function show($id)
    {
        $datasiswa = mysqli_query($this->koneksi,"select * from ulangan where id='$id'");
        return $datasiswa;
    }
    // Menampilkan data berdasarkan id
    public function edit($id)
    {
        $datasiswa = mysqli_query($this->koneksi,"select * from ulangan where id='$id'");
        return $datasiswa;
    }
    // mengupdate data berdasarkan id
    public function update($id, $nama_produk,$kategori_produk,$jumlah_produk,$harga_produk,$deskripsi,$sub_total)
    {//UPDATE `biodata` SET `nama`=[value-2],`jenis_kelamin`=[value-3],`tgl_lahir`=[value-4],`umur`=[value-5],`agama`=[value-6],`alamat`=[value-7] WHERE `id`=[value-1]
        mysqli_query($this->koneksi,"update ulangan set nama_produk='$nama_produk',kategori_produk='$kategori_produk', jumlah_produk='$jumlah_produk' ,harga_produk='$harga_produk', deskripsi='$deskripsi',sub_total='$sub_total' where id='$id'");
    }
    // menghapus data berdasarkan id
    public function delete($id)
    {
        mysqli_query($this->koneksi,"delete from ulangan where id='$id'");
    }
}
// koneksi DB
$db = new Bio();
?>