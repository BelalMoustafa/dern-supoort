<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\ServiceRequest;
class DashboardController extends Controller
{
    public function admin()
    {
        $waitingRequests = ServiceRequest::where('request_status', 'waiting')
            ->orderByDesc('created_at')
            ->take(5)
            ->get();
        $servicesIds = ServiceRequest::select('service_id', ServiceRequest::raw('COUNT(service_id) as count'))
            ->groupBy('service_id')
            ->orderByDesc('count')
            ->limit(3)
            ->pluck('service_id');
        $services = Service::whereIn('id', $servicesIds)->get();
        return view('admin.home', compact('services', 'waitingRequests'));
    }
    public function user($id)
    {
        $user = Auth::user();
        $acceptedRequests = ServiceRequest::where('user_id', $user->id)->where('request_status', 'accepted')->get();
        $waitingRequests = ServiceRequest::where('user_id', $user->id)->where('request_status', 'waiting')->get();
        $rejectedRequests = ServiceRequest::where('user_id', $user->id)->where('request_status', 'rejected')->get();
        $requests = ServiceRequest::where('user_id', $user->id)->with('service', 'user')->get();
        return view('client.home', compact('user', 'acceptedRequests', 'waitingRequests', 'rejectedRequests', 'requests'));
    }

}
