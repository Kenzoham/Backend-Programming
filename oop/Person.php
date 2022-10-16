<?php

class Person{

    # membuat property
    public $nama;
    public $alamat;
    public $jurusan;

    # membuat constructor
    public function __construct($nama, $alamat, $jurusan)
    {
        $this->nama = $nama;
        $this->alamat = $alamat;
        $this->jurusan = $jurusan;
    }

    # membuat method (function)
    public function setNama($data)
    {
        $this->nama = $data;
    }

    public function getNama()
    {
        return $this->nama;
    }

    # buat method set dan get alamat
    # buat method set dan get jurusan
}

$ilham = new Person('Abdullah Ilham', 'Bogor', 'Informatika');
$walter = new Person('Walter', 'Jakarta', 'Sistem Informasi');

echo $ilham->getNama();
echo '<br>';
echo $walter->getNama();

// $mahasiswa = [
//     [
//         'nama' => 'Abdullah Ilham',
//         'jurusan' => 'Informatika',
//     ],
//     [
//         'nama' => 'Walter',
//         'jurusan' => 'Sistem Informasi',
//     ],
// ];
// foreach ($mahasiswa as $mhs) {
//     $person = new Person();
//     $person->setNama($mhs['nama']);
//     echo $person->getNama();
//     echo '<br>';
// }

// $edo = new Person();
// $edo->setNama('Abdullah Ilham');
// echo $edo->getNama();
// echo '<br>';

// $ismail = new Person();
// $ismail->setNama('Walter');
// echo $ismail->getNama();