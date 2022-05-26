@extends('layouts.master')

@section('title')
    Manage Permission
@endsection

@section('create-button')
<a href="{{route('permissions.create')}}" class="btn btn-sm btn-primary shadow-sm">Add Permission<i class="fas fa-plus ml-2"></i></a>
@endsection



@section('content')
@include('components.alert')


<div class="card shadow mb-4 col-lg-10">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Permission</h6>
    </div>
    <div class="card-body">
        @forelse ($permissions as $item)
    
        <span class="badge badge-warning">{{$item->name}} 
        <form action="/permissions/{{$item->id}}" method="POST" style="display: inline-block">   
                @csrf
                @method("delete")
                <button type="submit" class="btn btn-warning btn-sm" title="delete permission"><i class="fas fa-trash"></i></button>
            </form>
        </span>
   
        @empty
            No permission yet
        @endforelse
    </div>
    <div class="card-body">
        <div class="table-responsive table-hover">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Role</th>
                        <th>Permissions</th>
                        <th>Action</th>            
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $key => $role)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$role->name}}</td>
                        <td>
                            @forelse ($role->permissions as $permission)
                            <span class="badge badge-warning">{{$permission->name}}</span>
                            @empty
                                dont have permission
                            @endforelse
                        </td>
                        <td>          
                            <a href="/permissions/{{$role->id}}/edit" class="btn btn-sm btn-warning" title="Edit"><i class="fas fa-edit mx-1"></i></a>
                        </td>
                    </tr>
                    {{-- @include('components.modal')                 --}}
                    @empty
                    <h4>Anda belum menambahkan role dan permission</h4>
                     @endforelse 
                </tbody>
            </table>     
        </div>
    </div>
   
</div>
@endsection