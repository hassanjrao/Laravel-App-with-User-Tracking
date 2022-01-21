@extends("layouts.admin-backend")
@section('content')




    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ $page->page_name }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.pages.update', $page->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row push justify-content-center">

                        <div class="col-lg-8 col-xl-8">

                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="page_name">Page Name</label>
                                    <input required disabled type="text" class="form-control" id="page_name"
                                        name="page_name" value="{{ $page->page_name }}">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-12">
                                    <label class="form-label" for="iframe">Iframe</label>

                                    <textarea class="form-control" name="iframe" id="iframe" cols="30"
                                        rows="6">{{ $page->iframe }}</textarea>


                                </div>
                            </div>

                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>



        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Users allowed to see {{ $page->page_name }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.pages.updatePageAccess', $page->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row push justify-content-center">

                        <div class="col-lg-8 col-xl-8">

                            <div class="row mb-4">
                                @foreach ($users as $user)

                                    <div class="col-4 mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" name="users[]" {{ $user->hasPermissionTo("view ".strtolower($page->page_name)) ==true ? "checked" : ""  }} type="checkbox" value="{{ $user->id }}" id="user{{ $user->id }}">
                                            <label class="form-check-label" for="user{{ $user->id }}">
                                                {{ $user->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>





    </div>
    <!-- END Page Content -->


@endsection
