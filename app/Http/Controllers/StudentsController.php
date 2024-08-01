<?php

namespace App\Http\Controllers;

use App\Models\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentsController extends Controller
{
    public function index() {
        // membuat pagination
        $datas = students::paginate(10);
        // dd($datas);
        return view('students', compact('datas'));
    }

    public function create() {
        return view('students-create');
    }

    public function add(Request $request) {
        $request->validate([
            'nisn' => 'required',
            'full_name' => 'required',
            'call_name' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
            'birth_place' => 'required',
            'religion' => 'required',
            'citizenship' => 'required',
            'child_order' => 'required',
            'sibling_count' => 'required',
            'language' => 'required',
            'image' => 'unlable|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'nisn.required' => 'NISN is required',
            'full_name.required' => 'Full Name is required',
            'call_name.required' => 'Call Name is required',
            'gender.required' => 'Gender is required',
            'birth_date.required' => 'Birth Date is required',
            'birth_place.required' => 'Birth Place is required',
            'religion.required' => 'Religion is required',
            'citizenship.required' => 'Citizenship is required',
            'child_order.required' => 'Child Order is required',
            'sibling_count.required' => 'Sibling Count is required',
            'language.required' => 'Language is required',
        ]);

        $data = $request->all();
        // dd($request->image);
        $data['image'] = Storage::disk(name:'public')->put(path:'images', contents:$request->file('image'));

        students::query()->create($data);

        return to_route('students.index')->with('success', 'Data has been added');
    }

    public function show(students $student) {

        $data = $student;
        dd($data);
        // return view('students-show', compact('data'));
    }

    public function edit($id) {

        // find jika id tidak ada maka akan menampilkan null
        // findOrFail jika file tidak ada maka akan menampilkan error 404

        $data = students::query()->findOrFail($id);
        return view('students-edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nisn' => 'required',
            'full_name' => 'required',
            'call_name' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
            'birth_place' => 'required',
            'religion' => 'required',
            'citizenship' => 'required',
            'child_order' => 'required',
            'sibling_count' => 'required',
            'language' => 'required',
            'image' => 'unlabel|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'nisn.required' => 'NISN is required',
            'full_name.required' => 'Full Name is required',
            'call_name.required' => 'Call Name is required',
            'gender.required' => 'Gender is required',
            'birth_date.required' => 'Birth Date is required',
            'birth_place.required' => 'Birth Place is required',
            'religion.required' => 'Religion is required',
            'citizenship.required' => 'Citizenship is required',
            'child_order.required' => 'Child Order is required',
            'sibling_count.required' => 'Sibling Count is required',
            'language.required' => 'Language is required',
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
