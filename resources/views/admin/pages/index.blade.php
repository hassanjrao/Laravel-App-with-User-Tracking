@extends('layouts.admin-backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/buttons.bootstrap5.min.css') }}">
@endsection


@section('content')



    {{-- <div class="modal fade" id="modal-block-popin" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-popin" role="document">
            <div class="modal-content">

                <form action="{{ route('admin.pages.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="block block-rounded block-transparent mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Add User</h3> <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            <div class="block block-rounded">

                                <div class="block-content">

                                    <div class="row push justify-content-center">

                                        <div class="col-lg-12 ">

                                            <div class="row mb-4">
                                                <div class="col-12">
                                                    <label class="form-label" for="name">Name</label>
                                                    <input required type="text" class="form-control" id="name"
                                                        name="name">
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-12">
                                                    <label class="form-label" for="email">Email</label>
                                                    <input required type="email" class="form-control" id="email"
                                                        name="email">
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-12">
                                                    <label class="form-label" for="password">Password</label>
                                                    <input required type="password" class="form-control" id="password"
                                                        name="password">
                                                </div>
                                            </div>


                                            <div class="row mb-4">


                                                @for ($i = 1; $i <= 20; $i++)

                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="view page {{ $i }}"
                                                                id="page-{{ $i }}" name="pages[]">
                                                            <label class="form-check-label" for="page-{{ $i }}">
                                                                Page {{ $i }} View
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endfor

                                            </div>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full text-end bg-body">
                            <button type="button" class="btn btn-sm btn-alt-secondary me-1"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

    <!-- Page Content -->
    <div class="content">




        {{-- <button type="button" class="btn btn-primary push" data-bs-toggle="modal" data-bs-target="#modal-block-popin">Add
            User</button> --}}


        <!-- Dynamic Table with Export Buttons -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    All Pages</small>
                </h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons fs-sm">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">#</th>
                            <th>Name</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Iframe</th>
                            <th style="width: 15%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $ind => $page)


                            <tr>
                                <td class="text-center">{{ ++$ind }}</td>
                                <td class="fw-semibold">
                                    {{ $page->page_name }}
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    {{ $page->iframe }}
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Horizontal Primary">
                                        <a href="{{ route('admin.pages.edit', $page->id) }}"
                                            class="btn btn-sm btn-alt-primary">Edit</a>
                                        {{-- <form id="form-{{ $page->id }}"
                                            action="{{ route('admin.pages.destroy', $page->id) }}" method="POST">
                                            @method("DELETE")
                                            @csrf
                                            <input type="button" onclick="confirmDelete({{ $page->id }})"
                                                class="btn btn-sm btn-alt-danger" value="Delete">

                                        </form> --}}
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table with Export Buttons -->
    </div>
    <!-- END Page Content -->




@endsection



@section('js_after')
    <!-- jQuery (required for DataTables plugin) -->
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.colVis.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>

    <script>
        function confirmDelete(id) {
            swal({
                    title: "Are you sure?",
                    text: "",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $("#form-" + id).submit();
                    }
                });

        }
    </script>
@endsection
