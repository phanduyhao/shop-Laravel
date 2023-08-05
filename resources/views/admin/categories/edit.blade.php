@extends('admin.main')
@section('contents')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Chỉnh sửa Menu</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{ route('updatecate', ['id' => $cate->id]) }}">
      <div class="card-body">
        @include('admin.error')
        <div class="form-group">
          <label for="">Name</label>
          <input value="{{ $cate->name }}" name="name" type="text" class="form-control" id="title" placeholder="Input Menu Name">
        </div>
          <div class="form-group">
              <label for="">Slug</label>
              <input name="Slug" type="text" class="form-control" id="slug" placeholder="Slug Product">
          </div>
        <div class="form-group">
          <label>Parent ID</label>
          <select name="parentid" class="form-control">
            <option value="0">Parent ID</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">Description</label>
          <input value="{{ $cate->description }}" name="desc" type="text" class="form-control" id="" placeholder="Input Desc">
        </div>
        <div class="form-check">
          <input value="{{ $cate->active }}" name="active" type="checkbox" class="form-check-input" id="">
          <label class="form-check-label" for="">Active</label>
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
