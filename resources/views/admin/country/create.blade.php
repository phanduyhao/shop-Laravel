@extends('admin.main')
@section('contents')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Thêm mới Country</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{ route('Insertcountry') }}">
      <div class="card-body">
        @include('admin.error')
        <div class="form-group">
          <label for="">Country</label>
          <input name="country" type="text" class="form-control" id="" placeholder="Input Country">
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
