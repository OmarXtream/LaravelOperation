@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Keys Update</div>
                <div class="card-body">
                @if(session('success'))
                {{ session('success') }} 
                @endif
                <form method="post" action="{{route('updateKey',$key->id)}}">
                    @csrf
                        <label for="key">The Key</label>
                <input type="text" name="key" id="key" value="{{ $key->key }}"class="form-control" placeholder="Example:FFG123">
                
                        @error('key')
                        <small class="form-text text-danger"> {{ $message }}</small>
                        @enderror
                        <button type="submit" class="btn btn-success mt-3 "> Update </button>
                    </form>
                </div>
            </div>
        </div>




    </div>
</div>
@endsection
