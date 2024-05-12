<?php
namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $services = Service::with('category')
            ->where('name', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->get();
        return view('admin.service.index', compact('services'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $services = Service::with('category')
            ->where('name', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->get();
        return view('admin.service.index', compact('services'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.service.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'duration' => 'required'
        ]);
        Service::create($request->all());
        return redirect()->route('services.index')->with('success', 'Service has been created successfully.');
    }

    public function show(Service $service)
    {
        $serviceRequests = $service->requests()->get();
        return view('admin.service.show', compact('service', 'serviceRequests'));
    }

    public function edit(Service $service)
    {
        $categories = Category::all();
        return view('admin.service.edit', compact('service', 'categories'));
    }
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'duration' => 'required'
        ]);
        $service->update($request->all());
        return redirect()->route('services.index')->with('success', 'Service has been updated successfully');
    }
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service has been deleted successfully.');
    }

}
