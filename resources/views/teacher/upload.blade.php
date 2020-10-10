@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Teacher upload S3 image</div>
                <div class="card-body">
                @if(session('success'))
                {{ session('success') }}
                @endif
                <form method="post" action="{{route('s3.upload')}}">
                    @csrf
                        <label for="image">The image</label>
                <input type="file" name="image" id="image" class="form-control">

                        @error('image')
                        <small class="form-text text-danger"> {{ $message }}</small>
                        @enderror
                        <button type="submit" class="btn btn-success mt-3 "> Upload </button>
                    </form>
                </div>
            </div>
        </div>




    </div>
</div>
@endsection
