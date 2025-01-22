<?php

namespace App\Http\Controllers;

use App\Models\TeacherStaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacherStaffs = TeacherStaff::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.admin.teacher-staff.admin-teacher-staff', compact('teacherStaffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.teacher-staff.admin-teacher-staff-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:100',
            'role_detail' => 'required|string|max:100',
            'nip' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'joined_date' => 'required|date',
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            try {
                $imagePath = $request->file('image')->store('teacher_staff', 'public');
            } catch (\Exception $e) {
                return back()->with('error', 'There was an issue uploading the image.');
            }
        }

        // Create new teacher/staff record
        TeacherStaff::create([
            'name' => $request->name,
            'role' => $request->role,
            'role_detail' => $request->role_detail,
            'nip' => $request->nip,
            'phone' => $request->phone,
            'image_path' => $imagePath,
            'joined_date' => $request->joined_date,
            'status' => 'active',
        ]);

        return redirect()->route('teacher-staff.create')->with('success', 'Guru/Staf Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $teacherStaff = TeacherStaff::findOrFail($id);

        return response()->json([
            'name' => $teacherStaff->name,
            'role' => $teacherStaff->role,
            'role_detail' => $teacherStaff->role_detail,
            'nip' => $teacherStaff->nip,
            'phone' => $teacherStaff->phone,
            'image_url' => $teacherStaff->image_path ? asset('storage/' . $teacherStaff->image_path) : null,
            'joined_date' => $teacherStaff->joined_date->format('d/m/Y'),
            'qualification' => $teacherStaff->qualification,
            'status' => ucfirst($teacherStaff->status),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $teacherStaff = TeacherStaff::findOrFail($id);
        return view('pages.admin.teacher-staff.admin-teacher-staff-edit', compact('teacherStaff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:100',
            'role_detail' => 'required|string|max:100',
            'nip' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'joined_date' => 'required|date',
        ]);

        $teacherStaff = TeacherStaff::findOrFail($id);

        // Handle image upload if a new one is provided
        if ($request->hasFile('image')) {
            if ($teacherStaff->image_path && Storage::disk('public')->exists($teacherStaff->image_path)) {
                Storage::disk('public')->delete($teacherStaff->image_path);
            }
            $teacherStaff->image_path = $request->file('image')->store('teacher_staff', 'public');
        }

        $teacherStaff->update([
            'name' => $request->name,
            'role' => $request->role,
            'role_detail' => $request->role_detail,
            'nip' => $request->nip,
            'phone' => $request->phone,
            'joined_date' => $request->joined_date,
            'status' => 'active',
        ]);

        return redirect()->route('teacher-staff.edit', $teacherStaff->id)->with('success', 'Guru/Staf Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $teacherStaff = TeacherStaff::find($id);

        if (!$teacherStaff) {
            return redirect()->route('teacher-staff')->with('error', 'Guru/Staf tidak ditemukan');
        }

        // Delete image file if it exists
        if ($teacherStaff->image_path && Storage::disk('public')->exists($teacherStaff->image_path)) {
            Storage::disk('public')->delete($teacherStaff->image_path);
        }

        $name = $teacherStaff->name;

        $teacherStaff->delete();

        return redirect()->route('teacher-staff')->with('success', $name . ' Berhasil dihapus ');
    }
}
