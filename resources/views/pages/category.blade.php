@extends('layouts.app')

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
            <form action="category" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="name" class="control-label mb-1">Category Name</label>
                <input name="name" type="text" class="form-control">
                @if ($errors->has('name'))
                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                @endif
              </div>
              <div class="form-group">
                <label for="image" class="control-label mb-1">Category image</label>
                <input name="image" type="file" class="form-control">
                @if ($errors->has('image'))
                <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                @endif
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
    <div class="row m-t-30">
      <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
          <table class="table table-borderless table-data3">
            <thead>
              <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach($categories as $category)
              <tr>

                <td>{{$category->name}}</td>

                <td>
                  <div class="image img-cir img-40">
                    <img src="images/{{$category->image}}">
                  </div>
                </td>
                <td>
                  <a href="{{ route('category.edit', $category->category_id)}}" class="text-warning">Edit</a>
                </td>
                <td>
                  <form action="{{ route('category.destroy', $category->category_id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="text-danger" type="submit">Delete</button>
                  </form>
                </td>

              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- END DATA TABLE-->
      </div>
    </div>
  </div>
</div>
@endsection