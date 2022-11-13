<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    # method index - get all resources
    public function index()
    {
        # menggunakan model Student untuk select data
        $students = Student::all();

        $data = [
            'message' => 'Get all students',
            'data' => $students,
        ];

        # menggunakan response json laravel
        # otomatis set header content type json
        # otomatis mengubah data array ke JSON
        # mengatur status code
        return response()->json($data, 200);
    }

    # menambahkan resource student
    # membuat method store
    public function store(Request $request)
    {
        $student = New Student();

        # menangkap data request
        $student->nama = $request->input('nama');
        $student->nim = $request->input('nim');
        $student->email = $request->input('email');
        $student->jurusan = $request->input('jurusan');

        # menggunakan Student untuk insert data
        $student->save();

        $data = [
            'message' => 'Student is created successfully',
            'data' => $student,
        ];

        # mengembalikan data (json) status code 200
        return response()->json($data, 200);
    }    

        
    // mendapatkan detail resource student
    // membuat method show
    public function show($id)
    {
        // mencari data student
        $student = Student::find($id);

        if($student)
        {
            $data = [
                'messege'=>'Get Detail Student',
                'data'=>$student,
            ];
    
            // mengambil data json status code 200
            return response()->json($data,200);
        }else{
            $data = [
                'message' => 'student not found',
            ];

            // mengembalikan data json
            return response()->json($data,404);
        }
    }

    // mengupdate resouce student
    // membuat method update
    public function update(Request $request, $id)
    {
        // cari data student yg ingin di update
        $student = Student::find($id);

        // mendapatkan data request
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ];
        $student->update($input);
    
        $data = [
            'message' => 'Resource student update',
            'data' => $student,
        ];
        // mengirimkan respon json dengan status code 200
        return response()->json($data,200);
    }


    public function destroy($id)
    {
        $student = Student::find($id);

        if($student){
            $student->delete();
        $data = [
            'message'=>'Student is deleted',
        ];

        // mengembalikan data json status code 200
        return response()->json($data,200);
        }else{
            $data = [
                'message'=>'Student not found',
            ];
            return response()->json($data,404);
        }
    }
}