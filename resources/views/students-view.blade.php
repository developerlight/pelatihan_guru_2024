@extends('layouts.app')
@section('content')
<div class="container mt-2">
    <div class="card">
        <div class="card-header">
            <h3>
                Student Details
                <a href="{{ url('students') }}" class="btn btn-danger float-end">Back</a>                        
            </h3>
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3 row">
                    <div class="col-sm-10">
                        <div class="text-center">
                            <img src="{{ asset('storage/' . $data['image']) }}" class="rounded " alt="{{ $data['full_name'] }}" width="auto" height="200">
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nisn" value="{{ $data['nisn'] }}" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="full_name" class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="full_name" value="{{ $data['full_name'] }}" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="call_name" class="col-sm-2 col-form-label">Call Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="call_name" value="{{ $data['call_name'] }}" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="gender" value="{{ $data->gender->gender }}" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="birth_date" class="col-sm-2 col-form-label">Birth Date</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="birth_date" value="{{ $data['birth_date'] }}" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="birth_place" class="col-sm-2 col-form-label">Birth Place</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="birth_place" value="{{ $data['birth_place'] }}" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="religion" class="col-sm-2 col-form-label">Religion</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="religion" value="{{ $data['religion']->religion }}" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="citizenship" class="col-sm-2 col-form-label">Citizenship</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="citizenship" value="{{ $data['citizenship'] }}" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="child_order" class="col-sm-2 col-form-label">Child Order</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="child_order" value="{{ $data['child_order'] }}" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="sibling_count" class="col-sm-2 col-form-label">Sibling Count</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="sibling_count" value="{{ $data['sibling_count'] }}" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="language" class="col-sm-2 col-form-label">Language</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="language" value="{{ $data['language'] }}" readonly>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
