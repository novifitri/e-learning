@extends('layouts.master')

@section('title')
   Create New Role
@endsection


@section('content')
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <form method="POST" action="/roles" >
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control"
                                        id="name" placeholder="Enter Role Name...">
                                        @error('name')
                                        <p class="text-danger text-center">{{$message}}</p>
                                        @enderror
                                </div>                    
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                <a href="/categories" class="btn btn-secondary  btn-block">Cancel</a>
                            </form>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection