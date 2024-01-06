<?php

namespace App\Http\Controllers\Complaint;

use Illuminate\Http\Request;
use App\Models\Complaint;


class fktComplaintController extends Complaint
{
    public function index()
    {
        $complaint = Complaint::all();
        return view('Complaint.fktComplaint', [
            'complaint' => $complaint
        ]);
    }
}
