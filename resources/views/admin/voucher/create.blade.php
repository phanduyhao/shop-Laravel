@extends('admin.main')
@section('contents')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Thêm mới Address</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{ route('vouchers.store') }}">
      <div class="card-body">
        @include('admin.error')
          <div class="form-group">
              <label for="">Mã voucher</label>
              <input name="code" type="text"  class="input-field form-control" id="" placeholder="Input code">
          </div>
        <div class="form-group">
          <label for="">Loại voucher</label>
          <input name="type" type="text"  class="input-field form-control" id="" placeholder="Input type">
        </div>
          <div class="form-group">
              <label for="">Nội dung</label>
              <input name="contents"  type="text" class="input-field form-control" id="" placeholder="Input content">
          </div>
          <div class="form-group">
              <label for="">Giá</label>
              <input name="price"  type="text" class="input-field form-control" id="" placeholder="Input price">
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
