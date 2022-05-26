@extends('layouts.master')

@section('title')
   Add New Student
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
                            <form method="POST" action="/students" >
                                @csrf
                                <div class="form-group">
                                    <label for="nis">Nomor Induk Siswa</label>
                                    <input type="text" name="nis" class="form-control"
                                        id="nis" placeholder="Enter Student NIS...">
                                    @error('name')
                                        <p class="text-danger text-center">{{$message}}</p>
                                    @enderror
                                </div>                    
                                <div class="form-group">
                                    <label for="name">Nama Siswa</label>
                                    <input type="text" name="name" class="form-control"
                                        id="name" placeholder="Enter Student Name...">
                                    @error('name')
                                        <p class="text-danger text-center">{{$message}}</p>
                                    @enderror
                                </div>                    
                                <div class="form-group">
                                    <label for="email">Email Siswa</label>
                                    <input type="email" name="email" class="form-control"
                                        id="email" placeholder="Enter Student Email...">
                                    @error('email')
                                        <p class="text-danger text-center">{{$message}}</p>
                                    @enderror
                                </div>                    
                                <div class="form-group">
                                    <label for="alamat">Alamat Siswa</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Enter Student Address"></textarea>
                                    @error('alamat')
                                        <p class="text-danger text-center">{{$message}}</p>
                                    @enderror
                                </div>  
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <select class="form-control" id="agama" name="agama">
                                      <option value="islam">Islam</option>
                                      <option value="katolik">Katolik</option>
                                      <option value="kristen">Kristen</option>
                                      <option value="hindu">Hindu</option>
                                      <option value="buddha">Buddha</option>
                                      <option value="konghucu">Konghucu</option>
                                    </select>
                                </div>    
                                <label>Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="laki" value="laki - laki">
                                    <label class="form-check-label" for="laki">
                                      Laki - laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="perepmpuan" value="perempuan">
                                    <label class="form-check-label" for="perepmpuan">
                                        Perempuan
                                    </label>
                                </div> <br>
                                <div class="form-group">
                                    <label for="number">Nomor Telepon Siswa</label>
                                    <input type="text" name="number" class="form-control"
                                        id="number" placeholder="Enter Student Phone Number...">
                                    @error('number')
                                        <p class="text-danger text-center">{{$message}}</p>
                                    @enderror
                                </div>  
                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <select class="form-control" id="kelas" name="kelas">
                                      @foreach ($classrooms as $class)
                                          <option value="{{$class->id}}">{{$class->nama}}</option>
                                      @endforeach
                                    </select>
                                </div>               
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                <a href="/students" class="btn btn-secondary  btn-block">Cancel</a>
                            </form>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection