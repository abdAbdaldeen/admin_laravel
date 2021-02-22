@extends ('layouts.app')
@section('content')
<div class="section__content section__content--p30">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">Manage Admin</div>
          <div class="card-body">
            <div class="card-title">
              <h3 class="text-center title-2">Create Admin</h3>
            </div>
            <hr>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
              <p>{{ $message }}</p>
            </div>
            @endif
            <form action="{{ route('admin.update', $admin->id) }}" method="post" enctype="multipart/form-data">
              @method('PATCH')
              {{ csrf_field() }}
              <div class="form-group">
                <label for="admin_name" class="control-label mb-1">Admin Name</label>
                <input name="admin_name" type="text" class="form-control" value="{{ $admin-> admin_name }}">
                @if ($errors->has('admin_name'))
                <div class="alert alert-danger">{{ $errors->first('admin_name') }}</div>
                @endif
              </div>
              <div class="form-group">
                <label for="admin_email" class="control-label mb-1">Admin Email</label>
                <input name="admin_email" type="email" class="form-control" value="{{ $admin-> admin_email }}">
                @if ($errors->has('admin_email'))
                <div class="alert alert-danger">{{ $errors->first('admin_email') }}</div>
                @endif
              </div>
              <div class="form-group">
                <label for="admin_password" class="control-label mb-1">Admin Password</label>
                <input name="admin_password" type="password" class="form-control">
                @if ($errors->has('admin_password'))
                <div class="alert alert-danger">{{ $errors->first('admin_password') }}</div>
                @endif
              </div>
              <div class="form-group">
                <label for="admin_image" class="control-label mb-1">Admin Image</label>
                <input name="admin_image" type="file" class="form-control">
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