@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row">
            <h3>Edit Kategori</h3>
        </div>


        <div class="row mt-3 table-responsive">
            <form method="POST" action="{{ route('students.update', $data->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <table class="table table-bordered">
                <tbody>
                        <tr>
                            <td>Image</td>
                            <td>
                                @if($data->image)
                                    <img src="{{ asset('storage/'. $data->image) }}" alt="" width="auto" height="100">
                                @endif
                                <input class="form-control" type="file" value="{{ $data->image }}"
                                    name="image">
                            </td>
                        </tr>
                        <tr>
                            <td>NISN</td>
                            <td>
                                <input autocomplete="off" value="{{ $data->nisn }}" class="form-control" type="text"
                                    name="nisn">
                            </td>
                        </tr>
                        <tr>
                            <td>Fullname</td>
                            <td>
                                <input autocomplete="off" value="{{ $data->full_name }}" class="form-control" type="text"
                                    name="full_name">
                            </td>
                        </tr>
                        <tr>
                            <td>Callname</td>
                            <td>
                                <input autocomplete="off" value="{{ $data->call_name }}" class="form-control" type="text"
                                    name="call_name">
                            </td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>
                                <input autocomplete="off" value="{{ $data->gender }}" class="form-control" type="text"
                                    name="gender">
                            </td>
                        </tr>
                        <tr>
                            <td>Birth date</td>
                            <td>
                                <input autocomplete="off" value="{{ $data->birth_date }}" class="form-control" type="date" name="birth_date">
                            </td>
                        </tr>
                        <tr>
                            <td>Birth place</td>
                            <td>
                                <input autocomplete="off" value="{{ $data->birth_place }}" class="form-control" type="text"
                                    name="birth_place">
                            </td>
                        </tr>
                        <tr>
                            <td>Religion</td>
                            <td>
                                <input autocomplete="off" value="{{ $data->religion }}" class="form-control" type="text"
                                    name="religion">
                            </td>
                        </tr>
                        <tr>
                            <td>Citizenship</td>
                            <td>
                                <input autocomplete="off" value="{{ $data->citizenship }}" class="form-control" type="text"
                                    name="citizenship">
                            </td>
                        </tr>
                        <tr>
                            <td>Child order</td>
                            <td>
                                <input autocomplete="off" value="{{ $data->child_order }}" class="form-control" type="text"
                                    name="child_order">
                            </td>
                        </tr>
                        <tr>
                            <td>Sibling count</td>
                            <td>
                                <input autocomplete="off" value="{{ $data->sibling_count }}" class="form-control" type="text"
                                    name="sibling_count">
                            </td>
                        </tr>
                        <tr>
                            <td>Language</td>
                            <td>
                                <input autocomplete="off" value="{{ $data->language }}" class="form-control" type="text"
                                    name="language">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button class="btn btn-success" type="submit">Update Data</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
@endsection
