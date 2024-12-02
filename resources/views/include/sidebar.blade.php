<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        <li class=" nav-item d-none d-sm-inline-block">
            <a href="index" class="nav-link">خانه</a>
        </li>
       
        <!-- Logout Button -->
        <li class="nav-item d-none d-sm-inline-block">
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger nav-link btn btn-link" style="color: inherit;">
                    خروج
                </button>
            </form>
        </li>
    </ul>

    
</nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
           
      <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    
    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
      <div style="direction: rtl">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
           
          </div>
          <div class="info">
            <a href="#" class="d-block">یاسر حامدی</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="index" class="nav-link active">
                <i class="nav-icon fa fa-dashboard"></i>
                <p>
                  داشبوردها
                  
                </p>
              </a>
           
            </li>
            
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-table"></i>
                <p>
               کتگوری ها
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="category-show" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p> نمایش کتگوری</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="category-add" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>اضافه کردن کتگوری </p>
                  </a>
                </li>
                
              </ul>
              
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-table"></i>
                <p>
               داکتر ها
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a
                   href="doctor-show" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>نمایش داکترها</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="doctor-add" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>اضافه کردن داکتر </p>
                  </a>
                </li>
                
              </ul>
              
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-table"></i>
                <p>
               مریض ها
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="patient-show" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p> نمایش مریض</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="patient-add" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>اضافه کردن مریض </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="patient-complete" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>نمایش مریضان تمام شده </p>
                  </a>
                </li>
                
              </ul>
              
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-table"></i>
                <p>
            جلسات مریض 
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="session-show" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p> نمایش جلسات مریض</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="session-add" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>اضافه کردن جلسه مریض</p>
                  </a>
                </li>
               
                
              </ul>
              
            </li>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-table"></i>
                <p>
               اکانت  ها
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a
                   href="account-show" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>نمایش اکانت ها</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="account-add" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>اضافه کردن اکانت  </p>
                  </a>
                </li>
                
              </ul>

              
            </li>
            </li>
           
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-table"></i>
                <p>
               پرداختی  ها
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a
                   href="payment-show" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>نمایش پرداختی ها</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="payment-add" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>اضافه کردن پرداختی  </p>
                  </a>
                </li>
                
              </ul>

              
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
              <i class="nav-icon fa fa-table"></i>
                <p>
               انقالات 
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a
                   href="transaction-show" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>نمایش انقالات</p>
                  </a>
                </li>
               
                
              </ul>
              
            </li>
            </li>
            <a href="index3.html" class="brand-link">
           
           <span class="brand-text font-weight-light"> بخش دواخانه کلینیک</span>
         </a>
         <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-table"></i>
                <p>
               کتگوری دارو  ها
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a
                   href="medicineCategory-show" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>نمایش کتگوری دارو ها</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="category-add" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>اضافه کردن کتگوری دارو  </p>
                  </a>
                </li>
                
              </ul>

              
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-table"></i>
                <p>
               دارو  ها
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a
                   href="medicine-show" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>نمایش دارو ها</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="category-add" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>اضافه کردن دارو  </p>
                  </a>
                </li>
              
              </ul>

              
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-table"></i>
                <p>
               خرید دارو  ها
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a
                   href="bay-show" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>نمایش خرید دارو ها</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('buyMedicineForm') }}" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>خرید دارو</p>
                  </a>
                </li>
                
              </ul>

              
            </li>
            <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-table"></i>
        <p>
            فروش دارو ها
            <i class="right fa fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('sell.show') }}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>نمایش فروش دارو ها</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('sell.create') }}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>فروش دارو</p>
            </a>
        </li>
    </ul>
</li>
         
      </div>
    </div>