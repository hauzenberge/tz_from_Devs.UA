@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row">

        @if (count($files) > 0)
        @foreach ($files as $file)
        <div class="col-md-4 mb-3">
            @include('components.file_info')
        </div>
        @endforeach
        @endif

    </div>
</div>


@endsection