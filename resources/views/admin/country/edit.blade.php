@extends('admin.main')
@section('contents')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Chỉnh sửa Country</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{ route('updatecountry', ['id' => $country->id]) }}">
      <div class="card-body">
        @include('admin.error')
        <div class="form-group">
          <label for="">Country</label>
          <input value="{{ $country->name }}" name="country" type="text" class="form-control" id="title" placeholder="Input Country">
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
