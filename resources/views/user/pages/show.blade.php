@extends('layouts.backend')


@section('content')

    <!-- Page Content -->
    <div class="content text-center">

        <h2>{{ $page->page_name }}</h2>

     {!! $page->iframe !!}
    </div>
    <!-- END Page Content -->
@endsection
