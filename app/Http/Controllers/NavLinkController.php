<?php

namespace App\Http\Controllers;

use App\Models\NavLink;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NavLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $navLinks = NavLink::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.admin.nav-links.admin-nav-links', compact('navLinks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.nav-links.admin-nav-links-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:155',
            'content' => 'required|string',
            'is_active' => 'boolean',
        ]);

        $slug = Str::slug($request->name);

        NavLink::create([
            'name' => $request->name,
            'slug' => $slug,
            'content' => $request->content,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('nav-links.create')->with('success', 'Nav Link Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $navLink = NavLink::findOrFail($id);

        // Return the nav link details as JSON
        return response()->json([
            'name' => $navLink->name,
            'slug' => $navLink->slug,
            'content' => $navLink->content,
            'is_active' => $navLink->is_active,
            'created_at' => $navLink->created_at->format('d/m/Y'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $navLink = NavLink::findOrFail($id);
        return view('
        pages.admin.nav-links.admin-nav-links-edit', compact('navLink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:155',
            'content' => 'required|string',
            'is_active' => 'boolean',
        ]);

        $slug = Str::slug($request->name);

        $navLink = NavLink::findOrFail($id);

        // Update nav link data
        $navLink->update([
            'name' => $request->name,
            'slug' => $slug,
            'content' => $request->content,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('nav-links.edit', ['id' => $navLink->id])->with('success', 'Nav Link updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $navLink = NavLink::find($id);

        if (!$navLink) {
            return redirect()->route('nav-links')->with('error', 'Nav Link not found');
        }

        $name = $navLink->name;

        // Delete the nav link from the database
        $navLink->delete();

        return redirect()->route('nav-links')->with('success', 'Successfully deleted ' . $name);
    }
}
