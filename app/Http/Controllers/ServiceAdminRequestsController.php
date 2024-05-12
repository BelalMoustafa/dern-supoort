<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\ServiceRequest;

class ServiceAdminRequestsController extends Controller
{
    public function index()
    {
        $requests = ServiceRequest::where('request_status', 'waiting')
            ->with('service', 'user')
            ->get();
        return view('admin.request.index', compact('requests'));
    }
    public function accept()
    {
        $requests = ServiceRequest::where('request_status', 'accepted')
            ->with('service', 'user')
            ->get();
        return view('admin.request.acc', compact('requests'));
    }
    public function reject()
    {
        $requests = ServiceRequest::where('request_status', 'rejected')
            ->with('service', 'user')
            ->get();
        return view('admin.request.re', compact('requests'));
    }
    public function re(Request $request)
    {
        $serviceRequest = ServiceRequest::findOrFail($request->request_id);
        $serviceRequest->update(['request_status' => "rejected"]);
        return redirect()->route('admin-home')->with('success', 'Request status has been updated successfully');
    }
    public function acc(Request $request)
    {
        $serviceRequest = ServiceRequest::findOrFail($request->request_id);
        $serviceRequest->update(['request_status' => "accepted"]);
        return redirect()->route('admin-home')->with('success', 'Request status has been updated successfully');
    }

}
