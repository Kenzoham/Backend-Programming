<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals =["Kucing", "Ayam", "Ikan"];
        public function index() 
        {
            echo "Menampilkan data animals" . PHP_EOL;
            foreach ($this->animals as $animal){
                echo $animal . PHP_EOL;
                }
        }
        public function store(Request $request)
         {
            echo "Menambahkan binatang baru" . PHP_EOL;
            $data = $request->only('nama');
            array_push($this->animals, $data["nama"]);
            $this->index();
        }
        public function update(Request $request, $id)
         {
            echo "Mengupdate data hewan index ke " . $id . PHP_EOL;
            $data = $request->only('nama');
            $this->animals[$id] = $data["nama"];
            $this->index();
        }
        public function destroy($id) {
            echo "Menghapus data hewan index ke " . $id . PHP_EOL;
            unset($this->animals[$id]);
            $this->index();
        }
}
