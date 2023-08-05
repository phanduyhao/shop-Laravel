@extends('admin.main')
@section('contents')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Chỉnh sửa Menu</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{ route('updateaddress', ['id' => $address->id]) }}">
      <div class="card-body">
        @include('admin.error')
          <div class="form-group">
              <label for="">Country:  </label>
              <select name="country" class="px-3 py-1">
                  @foreach($country as $country)
                      <option value="{{ $country->id }}">{{ $country->name }}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="">City</label>
              <input value="{{ $address->city }}" name="city" type="text" class="form-control" id="slug" placeholder="Input City">
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button name="submit" type="submit" class="btn btn-primary">Chỉnh sửa</button>
      </div>
      @csrf
    </form>
  </div>
@endsection
