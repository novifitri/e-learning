@extends('layouts.master')

@section('title')
   Update Teacher
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
                            <form method="POST" action="/teachers/{{$teacher->id}}" >
                                @csrf
                                @method("put")
                                <div class="form-group">
                                    <label for="nis">Nomor Induk Guru</label>
                                    <input type="text" name="nig" class="form-control"
                                        id="nis" value="{{ $teacher->nig }}">
                                    @error('name')
                                        <p class="text-danger text-center">{{$message}}</p>
                                    @enderror
                                </div>                    
                                <div class="form-group">
                                    <label for="name">Nama Guru</label>
                                    <input type="text" name="name" class="form-control"
                                        id="name" value="{{ $teacher->name }}">
                                    @error('name')
                                        <p class="text-danger text-center">{{$message}}</p>
                                    @enderror
                                </div>                    
                                <div class="form-group">
                                    <label for="email">Email Guru</label>
                                    <input type="email" name="email" class="form-control"
                                        id="email" value="{{ $teacher->email }}">
                                    @error('email')
                                        <p class="text-danger text-center">{{$message}}</p>
                                    @enderror
                                </div>                    
                                <div class="form-group">
                                    <label for="alamat">Alamat Guru</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Enter Teacher Address">{{$teacher->alamat}}</textarea>
                                    @error('alamat')
                                        <p class="text-danger text-center">{{$message}}</p>
                                    @enderror
                                </div>  
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <select class="form-control" id="agama" name="agama">
                                      <option value="islam" {{$teacher->agama == 'islam' ? "selected" : ""}}>Islam</option>
                                      <option value="katolik" {{$teacher->agama == 'katolik' ? "selected" : ""}}>Katolik</option>
                                      <option value="kristen" {{$teacher->agama == 'kristen' ? "selected" : ""}}>Kristen</option>
                                      <option value="hindu" {{$teacher->agama == 'hindu' ? "selected" : ""}}>Hindu</option>
                                      <option value="buddha" {{$teacher->agama == 'buddha' ? "selected" : ""}}>Buddha</option>
                                      <option value="konghucu" {{$teacher->agama == 'konghucu' ? "selected" : ""}}>Konghucu</option>
                                    </select>
                                </div>    
                                <label>Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="laki" value="laki - laki" 
                                    {{$teacher->gender=="laki - laki" ? "checked" : ""}}>
                                    <label class="form-check-label" for="laki">
                                      Laki - laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="perepmpuan" value="perempuan"
                                    {{$teacher->gender=="perempuan" ? "checked" : ""}}>
                                    <label class="form-check-label" for="perepmpuan">
                                        Perempuan
                                    </label>
                                </div> <br>
                                <div class="form-group">
                                    <label for="number">Nomor Telepon Guru</label>
                                    <input type="text" name="number" class="form-control"
                                        id="number" value="{{$teacher->no_hp}}">
                                    @error('number')
                                        <p class="text-danger text-center">{{$message}}</p>
                                    @enderror
                                </div>                               
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                <a href="/teachers" class="btn btn-secondary  btn-block">Cancel</a>
                            </form>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection