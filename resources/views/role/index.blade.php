@extends('layouts.master')

@section('title')
    Manage Role
@endsection

@section('create-button')
<a href="{{route('roles.create')}}" class="btn btn-sm btn-primary shadow-sm">Add Role<i class="fas fa-plus ml-2"></i></a>
@endsection



@section('content')
@include('components.alert')

{{-- @component('components.modal')
    Hapus data ini
@endcomponent --}}
<div class="card shadow mb-4 col-lg-10">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Role</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive table-hover">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Role</th>
                        <th>Action</th>            
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $key => $role)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$role->name}}</td>
                        <td>          
                            <form action="/roles/{{$role->id}}" class="text-center" method="POST">
                                <a href="/roles/{{$role->id}}/edit" class="btn btn-sm btn-warning" title="Edit"><i class="fas fa-edit mx-1"></i></a>
                                @csrf
                                @method("delete")
                                <button type="submit" class="btn btn-sm btn-danger" title="Delete"><i class="fas fa-trash mx-1"></i></button>
                                {{-- <input type="submit" value="Delete" class="btn btn-danger btn-sm"> --}}
                                {{-- <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal{{$role->id}}" title="Delete"><i class="fas fa-trash mx-1"></i></button>              --}}
                            </form>
                        </td>
                    </tr>
                    {{-- @include('components.modal')                 --}}
                    @empty
                    <h4>Anda belum menambahkan role</h4>
                     @endforelse 
                </tbody>
            </table>     
        </div>
    </div>
   
</div>
@endsection