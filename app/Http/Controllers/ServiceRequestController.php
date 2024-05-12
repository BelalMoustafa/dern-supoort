<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $requests = ServiceRequest::where('user_id', $user->id)->with('service', 'user')->get();
        return view('client.request.index', compact('requests'));
    }
    public function create()
    {
        $services = Service::all();
        return view('client.request.create', compact('services'));
    }
    public function store(Request $request)
    {
        ServiceRequest::create($request->post());
        return redirect()->route('requests.index')->with('success', 'Request has been created successfully.');
    }
    public function show(ServiceRequest $request)
    {
        return view('client.request.show', compact('request'));
    }
    public function destroy(ServiceRequest $request)
    {
        $request->delete();
        return redirect()->route('requests.index')->with('success', 'Request has been deleted successfully.');
    }
}
