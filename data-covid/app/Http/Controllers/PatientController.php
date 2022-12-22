<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
        // Method index untuk mendapatkan semua data Patients
        public function index()
        {
            $patients = Patient::all();

            if ($patients) {
                $data = [
                    'message' => 'Get All Resource',
                    'data' => $patients,
                ];

                // response json status code 200
                return response()->json($data, 200);
            } else {
                $data = [
                    'message' => 'Data is Empty',
                ];

                // response json status code 200
                return response()->json($data, 200);
            }
        }
  

        // Menambahkan data patient
        // (Store)
        public function store(Request $request)
        {
            //  Membuat validasi required
            $validatedData = $request->validate([
                'name' => 'required',
                'phone' => 'numeric|required',
                'address' => 'required',
                'status' => 'required',
                'in_date_at' => 'date|required',
                'out_date_at' => 'date|required',
            ]);
    
            $patient = Patient::create($validatedData);
            // Print
            $data = [
                'message' => 'Resource is Added Successfully',
                'data' => $patient,
            ];
    
            // Response JSON status code 201
            return response()->json($data, 201);
        }
  

        // Mendapatkan detail dari Patient berdasarkan id 
        // (Show)
        public function show($id)
        {
            // Mencari Patient menggunakan id
            $patient = Patient::find($id);
    
            if ($patient) {
                $data = [
                    'message' => 'Get Detail Resource',
                    'data' => $patient,
                ];
    
                // response json status code 200
                return response()->json($data, 200);
            } 

            else {
                $data = [
                    'message' => 'Resource Not Found',
                ];
    
                // response json status code 404
                return response()->json($data, 404);
            }
        }


        // Mengupdate data patien berdasarkan id 
        // (Update)
        public function update(Request $request, $id)
        {
            // mencari data Patient yg ingin diupdate berdasarkan id
            $patient = Patient::find($id);

            if ($patient) {
                $input = [
                    'name' => $request->name ?? $patient->name,
                    'phone' => $request->phone ?? $patient->phone,
                    'address' => $request->address ?? $patient->address,
                    'status' => $request->status ?? $patient->status,
                    'in_date_at' => $request->in_date_at ?? $patient->in_date_at,
                    'out_date_at' => $request->out_date_at ?? $patient->out_date_at,
                ];

                $patient->update($input);
    
                $data = [
                    'message' => 'Resource is Update Successfully',
                    'data' => $patient,
                ];

                // response json dengan status code 200
                return response()->json($data, 200);
            } else {
                $data = [
                    'message' => 'Resource Not Found',
                ];

                // response json status code 404
                return response()->json($data, 404);
            }
        }
      

        // Menghapus data Patient berdasarkan id
        // (Destroy)
        public function destroy($id)
        {
            // Mencari data Patient yang ingin dihapus berdasarkan id
            $patient = Patient::find($id);
    
            if ($patient) {
                $patient->delete();
    
                $data = [
                    'message' => 'Resource is Delete Successfully',
                ];
    
                // response json status code 200
                return response()->json($data, 200);
            } else {
                $data = [
                    'message' => 'Resource Not Found',
                ];
    
                // response json status code 404
                return response()->json($data, 404);
            }
        }


        # mencari data resource Patient
        # method mencari data
        public function search($name)
        {
            $patient = Patient::where("name","like","%".$name."%")->get();

            if (count($patient)) {
                $data = [
                    'message' => 'Get Searched Resource',
                    'data' => $patient,
                ];

                // response json status code 200

                return response()->json($data, 200);
            } else {
                $data = [
                    'message' => 'Resource Not Found',
                ];

                // response json status code 404
                return response()->json($data, 404);
            }
        }

        // Mencari data Patients berdasarkan status
        public function status($status)
        {
            $patients = Patient::where("status","like","%".$status."%")->get();
    
            $data = [
                'message' => 'Get all status resource',
                'data' => $patients,
            ];

            return response()->json($data, 200);
        }

        // Mencari data Patients berdasarkan status (positive)
        public function positive()
        {
            $patients = Patient::where("status","positive")->get();

            $data = [
                'message' => 'Get Positive Resource',
                'data' => $patients,
            ];

            return response()->json($data, 200);
        }

        // Mencari data Patients berdasarkan status (recovered)
        public function recovered()
        {
            $patients = Patient::where("status","recovered")->get();

            $data = [
                'message' => 'Get Recovered Resource',
                'data' => $patients,
            ];

            return response()->json($data, 200);
        }

        // Mencari data Patients berdasarkan status (dead)
        public function dead()
        {
            $patients = Patient::where("status","dead")->get();

            $data = [
                'message' => 'Get Dead Resource',
                'data' => $patients,
            ];

            return response()->json($data, 200);
        }
}