
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
    <div class="card-body col-md-4">
                            <form method="GET" action="{{ route('account-show') }}">
                                <div class="input-group mb-3">
                                    <input type="text" name="query" class="form-control" placeholder="جستجو بر اساس نام اکانت ها" value="{{ request()->get('query') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">جستجو</button>
                                    </div>
                                </div>
                            </form>
                        </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          
<div class="col-md-12">
<div class=" card">
	     <div class="d-flex justify-content-between card-header">اکانت ها
       <div class=''>
<a href="account-add" class="btn btn-primary btn-round px-5">اضافه کردن اکانت</a>

</div>
</div>	

	       <div class="table-responsive">
                 <table class="table align-items-center table-flush table-borderless">
                  <thead>
                   <tr>
                     <th>شماره</th>
                     <th>نام</th>
                     <th>توضیحات</th>
                     <th>تاریخ</th>
                     <th>عملیات</th>
                     
                   </tr>
                   </thead>
                   <tbody>
                   <?php $counter = 0; ?>
                            @foreach($accounts as $account)
                    <tr>
                    <th scope="row">{{++$counter}}</th>
                                <td>{{$account->account_name}}</td>
                                <td>{{$account->description}}</td>
                                <td>{{$account->date}}</td>
                    <td>
                                    <div class="row" style="gap:10px">
                                      <a href="accountEdit/{{$account->account_id}}" class='btn btn-primary' style="margin: 0 10px;">ویرایش</a>
                                      <a href="accountDelete/{{$account->account_id}}" class='btn btn-danger' style="margin: 0 10px;">حذف </a>
                                    </div>
                                </td>
                   
                   </tr>
                   @endforeach
                  

                 </tbody></table>
               </div>
	   </div>
        </div>

@endsection




