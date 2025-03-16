@extends('user.layout')
@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Bulk Entry Form</h2>

    <div id="myGrid" style="height: 500px"></div>
    <button id="addRow" class="btn btn-success mt-3">Add New Record</button>
    <button id="submitData" class="btn btn-primary mt-3">Submit Data</button>


    <script>
        const storeOptions = JSON.parse(`{!!$body['storeConfig']!!}`)
    </script>
    <!-- <button id="addRow" class="btn btn-success mt-3">Add Row</button>
    <button id="submitData" class="btn btn-primary mt-3">Submit Data</button> -->
</div>

@endsection