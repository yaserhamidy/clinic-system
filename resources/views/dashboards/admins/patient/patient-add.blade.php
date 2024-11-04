@extends('layout.main')
@section('content')
</aside>


  <div class="content-wrapper">
  
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">داشبورد</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item active">داشبورد ورژن 2</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        
        <div class="row">
          
<div class="col-md-12">
        
<form action="{{ route('addPatient') }}" method="post" id="categoryForm">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="card-title">اضافه کردن مریض</div>
            <hr>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">نام</label>
                        <input type="text" name="patient_name" class="form-control form-control-rounded" placeholder="Enter patient's Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastName">تخلص</label>
                        <input type="text" name="lastName" class="form-control form-control-rounded" placeholder="Enter patient's Last Name">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="age">سن</label>
                        <input type="text" name="age" class="form-control form-control-rounded" placeholder="Enter patient's age">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">شماره تماس</label>
                        <input type="text" name="phone" class="form-control form-control-rounded" placeholder="Enter patient's phone">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">آدرس</label>
                        <input type="text" name="address" class="form-control form-control-rounded" placeholder="Enter patient's address">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gender">جنسیت</label>
                        <select name="gender" class="form-control form-control-rounded">
                            <option value="male">مرد</option>
                            <option value="female">زن</option>
                            <option value="other">دیگر</option>
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
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>

        <select name="diastolic" class="form-control form-control-rounded" required>
            <option value="" disabled selected>Diastolic</option>
            @for ($i = 60; $i <= 120; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
    </div>
</div>
                </div>
                <div class="form-group col-md-6">
                    <label>نام داکتر</label>
                    <select name="doctor_id" class="form-control form-control-rounded" id="cat-id">
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->doctor_id }}">{{ $doctor->doctor_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="medical_history">سابقه پزشکی</label>
                        <textarea name="medical_history" class="form-control form-control-rounded" rows="4" placeholder="Enter patient's medical history"></textarea>
                    </div>
                </div>
            </div>
            

            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-round px-5" value="اضافه کردن مریض">
            </div>
        </div>
    </div>
</form>
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

@endsection




