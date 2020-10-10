@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Keys Update</div>
                <div class="card-body">
                <form id="Theform" onsubmit="return false;">
                        <label for="key">The Key</label>
                <input type="text" name="key" id="key" class="form-control" placeholder="Example:FFG123">

                        <button type="button" onclick="go()" class="btn btn-success mt-3 "> Update </button>
                    </form>
                </div>
            </div>
        </div>




    </div>
</div>
@endsection
@section('scripts')
<script>
    function go(){
    var form = $('#Theform');

sendData(' {{route('getData')}}' , form.serialize())
    .then(function(response) {
        swal.fire({
            title: response.t,
            text: response.m,
            type: response.tp,
            showConfirmButton: response.b,
            confirmButtonText: 'موافق'
        });
        if (response.tp == 'success') {
            swal.fire({
            title: response.t,
            text: response.m,
            icon: response.tp,
            showConfirmButton: response.b,
            confirmButtonText: 'موافق'
        });

        }
    });
    }

</script>
@endsection
