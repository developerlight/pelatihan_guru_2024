<?php

namespace App\Http\Controllers;

use App\Models\Genders;
use App\Models\Religions;
use App\Models\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentsController extends Controller
{
    public function index() {
        // membuat pagination
        $datas = students::with(['gender', 'religion'])->paginate(10);
        // dd($datas);
        return view('students', compact('datas'));
    }

    public function create(Religions $religions, Genders $genders) {
        $religions = $religions->get();
        $genders = $genders->get();
        return view('students-create', compact('religions','genders'));
    }

    public function add(Request $request) {
        $request->validate([
            'nisn' => 'required',
            'full_name' => 'required',
            'call_name' => 'required',
            'gender_id' => 'required',
            'birth_date' => 'required',
            'birth_place' => 'required',
            'religion_id' => 'required',
            'citizenship' => 'required',
            'child_order' => 'required',
            'sibling_count' => 'required',
            'language' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'nisn.required' => 'NISN is required',
            'full_name.required' => 'Full Name is required',
            'call_name.required' => 'Call Name is required',
            'gender_id.required' => 'Gender is required',
            'birth_date.required' => 'Birth Date is required',
            'birth_place.required' => 'Birth Place is required',
            'religion_id.required' => 'Religion is required',
            'citizenship.required' => 'Citizenship is required',
            'child_order.required' => 'Child Order is required',
            'sibling_count.required' => 'Sibling Count is required',
            'language.required' => 'Language is required',
        ]);

        $data = $request->all();
        // dd($request->image);
        if ($request->image) {
            $data['image'] = Storage::disk('public')->put('images', $request->file('image'));
        }

        students::query()->create($data);

        return to_route('students.index')->with('success', 'Data has been added');
    }

    public function show(students $student) {
        // with = untuk mengambil data relasi pasangan nya pake first
        // 
        $data = $student;
        return view('students-view', compact('data'));
    }

    public function edit($id , Religions $religions, Genders $genders) {

        // find jika id tidak ada maka akan menampilkan null
        // findOrFail jika file tidak ada maka akan menampilkan error 404
        $religions = $religions->get();
        $genders = $genders->get();
        $data = students::query()->findOrFail($id);
        return view('students-edit', compact('data', 'religions','genders'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nisn' => 'required',
            'full_name' => 'required',
            'call_name' => 'required',
            'gender_id' => 'required',
            'birth_date' => 'required',
            'birth_place' => 'required',
            'religion_id' => 'required',
            'citizenship' => 'required',
            'child_order' => 'required',
            'sibling_count' => 'required',
            'language' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'nisn.required' => 'NISN is required',
            'full_name.required' => 'Full Name is required',
            'call_name.required' => 'Call Name is required',
            'gender_id.required' => 'Gender is required',
            'birth_date.required' => 'Birth Date is required',
            'birth_place.required' => 'Birth Place is required',
            'religion_id.required' => 'Religion is required',
            'citizenship.required' => 'Citizenship is required',
            'child_order.required' => 'Child Order is required',
            'sibling_count.required' => 'Sibling Count is required',
            'language.required' => 'Language is required',
            'image.nullable' => 'Image can be null',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg',
            'image.max' => 'The image may not be greater than 2048 kilobytes',
        ]);

        $student = students::query()->findOrFail($id);
        $datas = $request->all();
        $datas['image'] = $student->image;
        
        // hasFile = untuk mengecek apakah file ada atau tidak
        if ($request->hasFile('image')) {
            if ($student->image == !null) {
                Storage::disk(name:'public')->delete($student->image);
            }
            $datas['image'] = Storage::disk('public')->put('images', $request->file('image'));
        }

        // students::query()->findOrFail($id)->update($request->all());
        $student->update($datas);
        return to_route('students.index')->with('success', 'Data has been updated');
    }

    public function delete($id) {
        // students::query()->findOrFail($id)->delete();
        $student = students::query()->findOrFail($id);
        Storage::delete('public/'.$student->image);
        $student->delete();

        return to_route('students.index')->with('success', 'Data has been deleted');
    }
}
