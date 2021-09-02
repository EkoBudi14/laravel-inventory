@extends('layouts.admin_master')

@section('content')

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add New User</h3></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('addnew.users') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputFirstName">Name</label>
                                        <input class="form-control" name="name" type="text" value="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputFirstName">Email</label>
                                        <input class="form-control" name="email" type="email" value="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputFirstName">Role</label>
                                    <select class="form-control" name="role" id="exampleFormControlSelect1">
                                        <option> --Choose Role--</option>
                                        <option>Admin</option>
                                      <option>Employee</option>
                                    </select>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputLastName">Password</label>
                                        <input class="form-control" name="password" type="password" placeholder="" />
                                    </div>
                                </div>

                            </div>
                            <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block" type="submit">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection