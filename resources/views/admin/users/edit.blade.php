@extends("layouts.admin-backend")
@section('content')




    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ $user->name }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row push justify-content-center">

                        <div class="col-lg-8 col-xl-8">

                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="name">Name</label>
                                    <input required type="text" class="form-control" id="name"
                                        name="name" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-12">
                                    <label class="form-label" for="email">Email</label>

                                    <input type="email" name="email" value="{{ $user->email }}" required class="form-control">

                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-lg-12">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" name="password" class="form-control">

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
                <h3 class="block-title">Users allowed to see pages</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.users.updatePageAccess', $user->id) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row push justify-content-center">

                        <div class="col-lg-8 col-xl-8">

                            <div class="row mb-4">
                                @foreach ($pages as $page)

                                    <div class="col-4 mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" name="pages[]"
                                                {{ $user->hasPermissionTo('view ' . strtolower($page->page_name)) == true ? 'checked' : '' }}
                                                type="checkbox" value="{{ $page->id }}" id="page{{ $page->id }}">
                                            <label class="form-check-label" for="page{{ $page->id }}">
                                                {{ $page->page_name }}
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
