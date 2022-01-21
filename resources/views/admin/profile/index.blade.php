@extends("layouts.admin-backend")
@section('content')




    <!-- Hero -->
    <!-- <div class="bg-image" style="background-image: url('assets/media/photos/photo10@2x.jpg');">
            <div class="bg-primary-dark-op">
                <div class="content content-full text-center">
                    <div class="my-3">
                        <img class="img-avatar img-avatar-thumb" src="assets/media/avatars/avatar13.jpg" alt="">
                    </div>
                    <h1 class="h2 text-white mb-0">Edit Account</h1>
                    <h2 class="h4 fw-normal text-white-75">
                        John Parker
                    </h2>
                    <a class="btn btn-alt-secondary" href="be_pages_generic_profile.html">
                        <i class="fa fa-fw fa-arrow-left text-danger"></i> Back to Profile
                    </a>
                </div>
            </div>
        </div> -->
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content content-boxed">
        <!-- User Profile -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Profile</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.profile.update', Auth::user()->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method("PUT")
                    @csrf

                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="fs-sm text-muted">
                                Admin Account info.
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="mb-4">

                                <label class="form-label" for="one-profile-edit-username">Admin Name </label>
                                <input required type="text" class="form-control" id="one-profile-edit-username"
                                    name="name" placeholder="Enter your name.." value="{{ Auth::user()->name }}">
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="one-profile-edit-email">Email Address</label>
                                <input required type="email" class="form-control" id="one-profile-edit-email" name="email"
                                    placeholder="Enter your email.." value="{{ Auth::user()->email }}">
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
        <!-- END User Profile -->

        <!-- Change Password -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Change Password</h3>

            </div>
            <div class="block-content">
                <form action="{{ route('admin.profile.updatePassword', Auth::user()->id) }}" method="POST">
                    @method("PUT")

                    @csrf
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="fs-sm text-muted">
                                Update your password
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">

                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="one-profile-edit-password-new">New Password</label>
                                    <input required type="password" class="form-control"
                                        id="one-profile-edit-password-new" name="password">
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
        <!-- END Change Password -->



        <!-- END Connections -->
    </div>
    <!-- END Page Content -->


@endsection
