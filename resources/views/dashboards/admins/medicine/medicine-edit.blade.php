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
                        <li class="breadcrumb-item active">ویرایش دارو</li>
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
                <form action="{{ route('editMedicine') }}" method="post">
                        @csrf
                        <input type="hidden" name="medicine_id" value="{{ $medicine->medicine_id }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">ویرایش دارو</div>
                                <hr>
                                <div class="form-group">
                                    <label for="medicine_name">نام دارو</label>
                                    <input type="text" name="medicine_name" class="form-control form-control-rounded" value="{{ old('medicine_name', $medicine->medicine_name) }}" placeholder="Enter Medicine Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="amount">مقدار</label>
                                    <input type="number" name="amount" class="form-control form-control-rounded" value="{{ old('amount', $medicine->amount) }}" placeholder="Enter Amount" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">توضیحات</label>
                                    <input type="text" name="description" class="form-control form-control-rounded" value="{{ old('description', $medicine->description) }}" placeholder="Enter Medicine Description">
                                </div>
                                <div class="form-group">
                                    <label for="date">تاریخ</label>
                                    <input type="date" name="date" class="form-control form-control-rounded" value="{{ old('date', $medicine->date) }}" required>
                                </div>
                                <div class="form-group">
                                    <label>نام کتگوری</label>
                                    <select name="medicineCat_id" class="form-control form-control-rounded" required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->medicineCat_id }}" @if($category->medicineCat_id == $medicine->medicineCat_id) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-round mt-5 px-5" value="ذخیره">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
        </div>
    </section>
</div>

@endsection