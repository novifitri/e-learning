@extends('layouts.master')

@section('title')
   Edit Permission
@endsection

@section('content')
    <div>
      
    </div>
    <div class="card shadow mb-4 col-lg-10">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Role : {{$role->name}}</h6>
        </div>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">List Permission</h6>
        </div>
        <div class="card-body">
            <form action="/permissions/{{$role->id}}" method="POST">
                @csrf
                @method("put")
                @forelse ($permissions as $item)
                <div class="form-check">          
                    <input class="form-check-input" type="checkbox" 
                    name="permissions[]" 
                    value="{{$item->id}}" 
                    id="{{$item->name}}"
                    @if ($role->hasPermissionTo($item->name))
                        checked
                    @endif
                    >
                    <label class="form-check-label" for="{{$item->name}}">
                        {{$item->name}}
                    </label>
                </div>      
                @empty
                there is no permission yet
                @endforelse       
                <button type="submit" class="btn btn-primary my-3">Submit</button>
            </form>
        
         
        </div>   
    </div>
@endsection