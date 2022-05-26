<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset("admin/dist/img/user2-160x160.jpg")}}" class="img-circle elevation-2" alt="User Image">
      </div>
     
        <div class="info">
          <a href="#" class="d-block">
            @if (Auth::guard("student")->check())
                {{Auth::guard("student")->user()->name}}
            @elseif(auth()->check())
                {{auth()->user()->name}}
            @else
                Guest
            @endif
            
          </a>
        </div>    
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="/dashboard" class="nav-link {{Request::is('dashboard') ? 'active' : ''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
      
        </li>
        <li class="nav-item">
          <a href="{{route('course.index')}}" class="nav-link {{Request::is('course') ? 'active' : ''}}">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Course
            </p>
          </a>
        </li>
   
        <li class="nav-header">EXAMPLES</li>
        <li class="nav-item">
          <a href="../calendar.html" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Calendar
            </p>
          </a>
        </li> 
      
        <li class="nav-header">MANAGE DATA</li>
        <li class="nav-item">
          <a href="{{route('students.index')}}" class="nav-link {{Request::is('students') ? 'active' : ''}}">
            <i class="nav-icon fa fa-users" aria-hidden="true"></i>
            <p>
              Students
            </p>
          </a>
        </li> 
        <li class="nav-item">
          <a href="{{route('teachers.index')}}" class="nav-link {{Request::is('teachers') ? 'active' : ''}}">
            <i class="nav-icon fa fa-user-md" aria-hidden="true"></i>
            <p>
              Teachers
            </p>
          </a>
        </li> 

       @can('manage role')
        <li class="nav-header">MANAGE ROLE</li>
        <li class="nav-item">
          <a href="/roles" class="nav-link {{Request::is('roles') ? 'active' : ''}}">
            <i class="nav-icon fa fa-users " aria-hidden="true"></i>
            <p>
              Role
            </p>
          </a>
        </li>    
        <li class="nav-item">
          <a href="/permissions" class="nav-link {{Request::is('permissions') ? 'active' : ''}}"">
            <i class="nav-icon fa fa-id-card" aria-hidden="true"></i>
            <p>
              Permission
            </p>
          </a>
        </li>    
        @endcan
    </nav>
    <!-- /.sidebar-menu -->
  </div>