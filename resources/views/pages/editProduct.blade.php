@extends ('layouts.app')
@section('content')
<div class="section__content section__content--p30">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">Manage product</div>
          <div class="card-body">
            <div class="card-title">
              <h3 class="text-center title-2">Create product</h3>
            </div>
            <hr>

            <form action="{{ route('products.update', $product->product_id) }}" method="post"
              enctype="multipart/form-data">
              @method('PATCH')
              {{ csrf_field() }}
              <div class="form-group">
                <label for="name" class="control-label mb-1">product Name</label>
                <input name="name" type="text" class="form-control" value="{{ $product-> name }}">
                @if ($errors->has('name'))
                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                @endif
              </div>
              {{-- ================================= --}}
              <div class="form-group">
                <label for="price" class="control-label mb-1">product Price</label>
                <input name="price" type="text" class="form-control" value="{{ $product-> price }}">
                @if ($errors->has('price'))
                <div class="alert alert-danger">{{ $errors->first('price') }}</div>
                @endif
              </div>
              {{-- ================================= --}}
              <div class="form-group">
                <label for="description" class="control-label mb-1">product description</label>
                <input name="description" type="text" class="form-control" value="{{ $product-> description }}">
                @if ($errors->has('description'))
                <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                @endif
              </div>
              {{-- ================================= --}}
              <div class="form-group">
                <label for="category" class="control-label mb-1">product category</label>
                <select class="form-control" name="category" id="category">
                  <option disabled selected>Select Category</option>
                  @foreach ($categories as $Category)
									<option value={{$Category->category_id}}>{{$Category->name}}</option>
									@endforeach
                </select>
                @if ($errors->has('category'))
                <div class="alert alert-danger">{{ $errors->first('category') }}</div>
                @endif
              </div>
              {{-- ================================= --}}
              <div class="form-group">
                <label for="image" class="control-label mb-1">product Image</label>
                <input name="image" type="file" class="form-control">
                @if ($errors->has('image'))
                <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                @endif
              </div>
              {{-- ================================= --}}

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
