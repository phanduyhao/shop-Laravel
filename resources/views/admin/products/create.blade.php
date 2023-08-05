@extends('admin.main')
@section('contents')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Thêm mới sản phẩm</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{ route('Insertproduct') }}" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        @include('admin.error')

        <div class="form-group">
          <label for="">Title</label>
          <input name="Title" type="text" class="form-control" id="title" placeholder="Input product Name">
        </div>
        <div class="form-group">
          <label for="">Slug</label>
          <input name="Slug" type="text" class="form-control" id="slug" placeholder="Slug Product">
        </div>
        <div id="image-gallery">
          <input type="file" name="thumb[]" id="file-input" multiple onchange="previewImages(event)">
          <div id="image-preview"></div>
        </div>
        <div class="form-group">
          <label for="">Description</label>
          <input name="desc" type="text" class="form-control" id="" placeholder="Input Desc">
        </div>
        <div class="form-group">
          <label for="">Content</label>
            <textarea name="content" class="form-control" id="content"></textarea>
        </div>
        <div class="form-group">
            <label for="">Category: </label>
            <select name="cate_id" class="px-3 py-1">
                @foreach($cate as $cate)
                    <option value="{{ $cate->id }}">{{ $cate->CateName }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
          <label for="">Price</label>
          <input name="price" type="number" class="form-control" id="" placeholder="Input price">
        </div>
        <div class="form-group">
          <label for="">Discount</label>
          <input name="discount" type="number" class="form-control" id="" placeholder="Input discount">
        </div>
        <div class="form-check">
          <input name="active" type="checkbox" class="form-check-input" id="">
          <label class="form-check-label" for="">Active</label>
        </div>
        <div class="form-check">
          <input name="ishot" type="checkbox" class="form-check-input" id="">
          <label class="form-check-label" for="">Is Hot</label>
        </div>
        <div class="form-check">
          <input name="isnewfeed" type="checkbox" class="form-check-input" id="">
          <label class="form-check-label" for="">Is New Feed</label>
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
