@extends('layouts.app')

@section('content')
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Manage User</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Create User</h3>
                            </div>
                            <hr>
                            <form action="users" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="user_name" class="control-label mb-1">User Name</label>
                                    <input  name="user_name" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="user_email" class="control-label mb-1">User Email</label>
                                    <input  name="user_email" type="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="user_password" class="control-label mb-1">User Password</label>
                                    <input  name="user_password" type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="user_image" class="control-label mb-1">User Image</label>
                                    <input  name="user_image" type="file" class="form-control">
                                </div>


                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">Add
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
