@extends('layouts.master')

@section('title')
    Dashboard Admin
@endsection

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">
                        Admin
                    </span>
                    <span class="info-box-number">
                        {{$admin}}
                        <small>orang</small>
                    </span>
                </div>
            </div>   
        </div>
    
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-user-md" aria-hidden="true"></i></i></span>
                <div class="info-box-content">
                <span class="info-box-text">Teachers</span>
                <span class="info-box-number">{{$teachers}}
                    <small>orang</small>
                
                </span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Students</span>
                    <span class="info-box-number">{{$students}}
                        <small>orang</small>
                    
                    </span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">New Members</span>
                    <span class="info-box-number">2,000</span>
                </div>
            </div>
    </div>

   
@endsection