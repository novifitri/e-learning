@extends('layouts.master')

@section('title')
    Manage Teachers
@endsection

@section('create-button')
<a href="{{route('teachers.create')}}" class="btn btn-sm btn-primary shadow-sm">Add Teachers<i class="fas fa-plus ml-2"></i></a>
@endsection



@section('content')
@include('components.alert')


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="card-title text-primary font-weight-bold">List Teachers</div>
        <div class="card-tools">
            <form action="{{route("teachers.index")}}">

            <div class="input-group input-group-sm" style="width: 200px;">
              <input type="text" name="search" class="form-control float-right" placeholder="Search teachers by name">
              <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            </div>
          </div>
    </div>

    <div class="card-body">
        <div class="table-responsive table-hover">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIG</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Religion</th>
                        <th>Gender</th>
                        <th>Phone Number</th>
                        <th>Action</th>            
                    </tr>
                </thead>
                <tbody>
                    @forelse ($teachers as $key => $teacher)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$teacher->nig}}</td>
                        <td>{{$teacher->name}}</td>
                        <td>{{$teacher->email}}</td>
                        <td>{{$teacher->alamat}}</td>
                        <td>{{$teacher->agama}}</td>
                        <td>{{$teacher->gender}}</td>
                        <td>{{$teacher->no_hp}}</td>
                        <td>         
                            <a href="/teachers/{{$teacher->id}}/edit" class="btn btn-sm btn-warning" title="Edit"><i class="fas fa-edit mx-1"></i></a>
                            @csrf                
                            <button class="btn btn-sm btn-danger" data-link="/teachers/{{$teacher->id}}" data-toggle="modal" data-name="{{$teacher->name}}" data-value="{{$teacher->id}}" data-target="#modal" title="Delete"><i class="fas fa-trash mx-1"></i></button>             
                         
                        </td>
                    </tr>
                    @include('components.modal')                
                    @empty
                        <h4><i>Data tidak ada</i></h4>
                    @endforelse 
                </tbody>
            </table>     
        </div>
    </div>
   
</div>

@endsection

@push('script')
    <script>
        $('#modal').on('show.bs.modal', function (event){
           var btn = $(event.relatedTarget)
           var delete_id = btn.data('value')
           var nama = btn.data('name')
           var link = btn.data('link')
           var modal = $(this)

           modal.find('#nama').text(nama)
           modal.find('#delete-form').attr('action', link)
           console.log(modal)
        })
    </script>
@endpush