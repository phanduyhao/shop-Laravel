@extends('admin.main')
@section('contents')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Thêm mới Address</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{ route('Insertaddress') }}">
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
          <input name="city" type="text" class="input-field form-control" id="" placeholder="Input city">
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button name="submit" type="submit" class="btn btn-primary">Thêm mới</button>
      </div>
      @csrf
    </form>
  </div>
@endsection
