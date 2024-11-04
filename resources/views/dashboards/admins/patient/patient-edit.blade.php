

@extends('layout.main')
@section('content')

</aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">داشبورد</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item active">داشبورد ورژن 2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          
<div class="col-md-12">
<form action="{{ route('EditPatient', $patient->patient_id) }}" method="post">
    @csrf
    <input type="hidden" name="patient_id" value="{{ $patient->patient_id }}">
    <div class="card">
        <div class="card-body">
            <div class="card-title">ویرایش مریض</div>
            <hr>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">نام</label>
                        <input type="text" name="patient_name" class="form-control form-control-rounded" value="{{ old('patient_name', $patient->patient_name) }}" placeholder="Enter patient's Name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">تخلص</label>
                        <input type="text" name="lastName" class="form-control form-control-rounded" value="{{ old('lastName', $patient->lastName) }}" placeholder="Enter patient's Last Name" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">سن</label>
                        <input type="number" name="age" class="form-control form-control-rounded" value="{{ old('age', $patient->age) }}" placeholder="Enter age">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">شماره تماس</label>
                        <input type="text" name="phone" class="form-control form-control-rounded" value="{{ old('phone', $patient->phone) }}" placeholder="Enter patient's phone">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">آدرس</label>
                        <input type="text" name="address" class="form-control form-control-rounded" value="{{ old('address', $patient->address) }}" placeholder="Enter patient's address">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gender">جنسیت</label>
                        <select name="gender" class="form-control form-control-rounded" required>
                            <option value="">جنسیت مریض را انتخاب کنید</option>
                            <option value="male" @if($patient->gender == 'مرد') selected @endif>Male</option>
                            <option value="female" @if($patient->gender == 'زن') selected @endif>Female</option>
                            <option value="other" @if($patient->gender == 'دیگر') selected @endif>Other</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="blood_pressure">فشار خون</label>
                        <div class="d-flex">
                            <select name="systolic" class="form-control form-control-rounded mr-2" required>
                                <option value="" disabled selected>Systolic</option>
                                @for ($i = 90; $i <= 180; $i++)
                                    <option value="{{ $i }}" @if($i == explode('/', $patient->blood_pressure)[0]) selected @endif>{{ $i }}</option>
                                @endfor
                            </select>

                            <select name="diastolic" class="form-control form-control-rounded" required>
                                <option value="" disabled selected>Diastolic</option>
                                @for ($i = 60; $i <= 120; $i++)
                                    <option value="{{ $i }}" @if($i == explode('/', $patient->blood_pressure)[1]) selected @endif>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>نام داکتر</label>
                        <select name="doctor_id" class="form-control form-control-rounded">
                            <option value="">Select doctor</option>
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->doctor_id }}" @if($doctor->doctor_id == $patient->doctor_id) selected @endif>{{ $doctor->doctor_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="">تاریخچه مریضی</label>
                    <textarea name="medical_history" class="form-control form-control-rounded" rows="4" placeholder="Enter patient's medical history">{{ old('medical_history', $patient->medical_history) }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-light btn-round mt-5 px-5" value="ذخیره">
            </div>
        </div>
    </div>
</form>


        </div>

@endsection




