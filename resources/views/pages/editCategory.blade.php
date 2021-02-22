@extends ('layouts.app')
@section('content')
<div class="section__content section__content--p30">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">Manage Category</div>
          <div class="card-body">
            <div class="card-title">
              <h3 class="text-center title-2">Create Category</h3>
            </div>
            <hr>

            <form action="{{ route('category.update', $category->category_id) }}" method="post"
              enctype="multipart/form-data">
              @method('PATCH')
              {{ csrf_field() }}
              <div class="form-group">
                <label for="name" class="control-label mb-1">Category Name</label>
                <input name="name" type="text" class="form-control" value="{{ $category-> name }}">
                @if ($errors->has('name'))
                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                @endif
              </div>

              <div class="form-group">
                <label for="image" class="control-label mb-1">Category Image</label>
                <input name="image" type="file" class="form-control">
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
