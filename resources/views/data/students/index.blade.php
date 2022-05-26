@extends('layouts.master')

@section('title')
    Manage Students
@endsection

@section('create-button')
<a href="{{route('students.create')}}" class="btn btn-sm btn-primary shadow-sm">Add Student<i class="fas fa-plus ml-2"></i></a>
@endsection



@section('content')
@include('components.alert')


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="card-title text-primary font-weight-bold">List Students</div>
        <div class="card-tools">
            <form action="{{route("students.index")}}">

            <div class="input-group input-group-sm" style="width: 200px;">
              <input type="text" name="search" class="form-control float-right" placeholder="Search students by name">
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
                        <th>NIS</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Religion</th>
                        <th>Gender</th>
                        <th>Phone Number</th>
                        <th>Class</th>
                        <th>Action</th>            
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $key => $student)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$student->nis}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->alamat}}</td>
                        <td>{{$student->agama}}</td>
                        <td>{{$student->gender}}</td>
                        <td>{{$student->no_hp}}</td>
                        <td>{{$student->classroom->nama}}</td>
                        <td>          
                            {{-- <form action="/students/{{$student->id}}" class="text-center" method="POST"> --}}
                                <a href="/students/{{$student->id}}/edit" class="btn btn-sm btn-warning" title="Edit"><i class="fas fa-edit mx-1"></i></a>
                                @csrf
                                {{-- @method("delete") --}}
                                {{-- <button type="submit" class="btn btn-sm btn-danger" title="Delete"><i class="fas fa-trash mx-1"></i></button> --}}
                                {{-- <input type="submit" value="Delete" class="btn btn-danger btn-sm"> --}}
                                <button class="btn btn-sm btn-danger" data-link="/students/{{$student->id}}" data-toggle="modal" data-name="{{$student->name}}" data-value="{{$student->id}}" data-target="#modal" title="Delete"><i class="fas fa-trash mx-1"></i></button>             
                            {{-- </form> --}}
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