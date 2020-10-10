@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin</div>
                <ul>
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                @lang('messages.welcome') -   @lang('messages.17')
                <div class="card-body">
                    <div class="text-success">
                        @if(session('success'))
                        {{ session('success') }}
                        @endif

                    </div>
                    <div class="text-danger">
                        @error('Error')
                        test
                        @enderror

                    </div>

                <form method="post" action="{{route('makeKey')}}" enctype="multipart/form-data">
                    @csrf
                        <label for="key">The Key</label>
                        <input type="text" name="key" id="key" class="form-control" placeholder="Example:FFG123">
                        @error('key')
                        <small class="form-text text-danger"> {{ $message }}</small>
                        @enderror
                        <input type="file" name="photo">
                        @error('photo')
                        <small class="form-text text-danger"> {{ $message }}</small>
                        @enderror

                        <button type="submit" class="btn btn-success mt-3 "> Create </button>
                    </form>
                </div>
            </div>
        </div>




        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Keys List</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Key</th>
                            <th scope="col">Admin</th>
                            <th scope="col">Settings </th>
                          </tr>
                        </thead>
                        <tbody>

                    @foreach ($keys as $key)
                    <tr>
                        <th scope="row">{{$key -> id}}</th>
                        <td>{{$key->key}}</td>
                        <td>{{$key->by}}</td>
                    <td>
                        <a href="{{route('Key.Delete',$key -> id)}}" class="btn btn-danger">Delete </button>
                        <a href="{{route('keyUpdate',$key -> id)}}"><button type="button" class="btn btn-info">Update </button></a>

                    </td>
                      </tr>

                    @endforeach
                </tbody>
            </table>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection

