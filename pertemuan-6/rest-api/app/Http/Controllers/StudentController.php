<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    # methode get all resources
    public function index()
    {
        # Menggunakan model Student
        $students = Student::all();

        $data = [
            'message' => 'Get all students',
            'data' => $students,
        ];

        # menggunakan response json laravel
        # otomatis mengatur header Content-Type ke json
        # otomatis mengubah array ke JSON
        # dapat mengatur status code
        return response()->json($data, 200);
    }

    // Mendapatkan detail resources student
    // Membuat mehthode show
    public function show($id){
        // Mencari data student
        $student = Student::find($id);

        if ($student) 
        {
            $data = [
                'messege'=>'Get detail student',
                'data'=>$student
            ];

            // mengembalikan data json status code 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not Found'
            ];

            // Mengembalikan data json status code 404
            return response()->json($data, 404);
        }
    }

    # Menambahkan resources
    # Membuat methode store
    public function store(Request $request){
    # Menangkap data request
    $input = [
        'nama' => $request->nama,
        'nim' => $request->nim,
        'email' => $request->email,
        'jurusan' => $request->jurusan,
    ];

    #menggunakan student untuk insert data
    $student = Student::create($input);
    
    $data = [
        'message' => 'Student is created successfully',
        'data' => $student,
    ];

    # mengembalikan data (json) status code 201
    return response()->json($data, 201);
    }

    // Mengupdate data student
    public function update(Request $request, $id)
    {
        // mencari data student yg ingin diupdate
        $student = Student::find($id);

        if ($student) {
            // mendapatkan data request
            $input = [
                'nama' => $request->nama ?? $student->nama,
                'nim' => $request->nim ?? $student->nim,
                'email' => $request->email ?? $student->email,
                'jurusan' => $request->jurusan ?? $student->jurusan,
            ];

            // mengupdate data
            $student->update($input);

            $data = [
                'message' => 'Resource student updated',
                'data' => $student,
            ];
            // mengirimkan respon json dgn status code 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found',
            ];

            // mengembalikan data json status code 404
            return response()->json($data, 404);
        }
    }

    // controller untuk menghapus data student
    public function destroy($id)
    {
        # cari data student yg ingin dihapus
        $student = Student::find($id);

        if ($student) {
            # hapus data student
            $student->delete();

            $data = [
                'message' => 'Student is deleted',
            ];

            # mengembalikan data json status code 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found',
            ];

            # mengembalikan data json status code 404
            return response()->json($data, 404);
        }
    }
}
