<?php

namespace App\Controllers\Verklaring;

use App\Controllers\BaseController;
use App\Models\UserModel;

class VerklaringController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function indexUpload()
    {
        $users = $this->userModel->findAll();

            // Sample data - replace with your actual data
        $sampleData = [];
        for ($i = 1; $i <= 25; $i++) {
            $sampleData[] = [
                'id' => $i,
                'name' => "Employee $i",
                'email' => "employee$i@company.com",
                'phone' => "+1 555-".rand(100,999)."-".rand(1000,9999),
                'address' => rand(100,999)." Main St",
                'city' => "City ".($i % 3 + 1),
                'state' => "State ".($i % 5 + 1),
                'zip' => rand(10000,99999),
                'country' => "Country ".($i % 2 + 1),
                'department' => "Department ".($i % 3 + 1),
                'position' => "Position $i",
                'salary' => 50000 + $i * 1000,
                'hire_date' => date('Y-m-d', strtotime('-'.rand(1,365).' days')),
                'status' => $i % 2 ? 'Active' : 'Inactive'
            ];
        }

        return view('verklaring/upload-excel', ['sampleData' => $sampleData]);
 
    }

    public function indexMailing()
    {
        $users = $this->userModel->findAll();
        return view('verklaring/mailing', ['users' => $users , 'title' => 'Send Email']);
    }

}
