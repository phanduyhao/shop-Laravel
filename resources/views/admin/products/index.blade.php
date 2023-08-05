@extends('admin.main')
@section('contents')
<h1>{{$title}}</h1>
<div class="container-fluid">
   <div class="row">
      <div class="col-12">
         <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
               <a href="{{Route('Createproduct')}}" class="btn btn-success px-4 mb-3  py-2">Thêm mới product</a>
               <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                     <div class="col-sm-12 col-md-6"></div>
                     <div class="col-sm-12 col-md-6"></div>
                  </div>
                  <div class="row">
                     <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                           <thead>
                              <tr>
                                 <th>productId</th>
                                 <th>Name product</th>
                                 <th>Thumb</th>
                                 <th>Category</th>
                                 <th>Description</th>
                                  <th>Content</th>
                                  <th>Price Origin</th>
                                  <th>Price Discount</th>
                                 <th>Active</th>
                                  <th>Is hot</th>
                                  <th>Is New feed</th>
                                 <th>#</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($products as $product)
                              <tr class="odd">
                                 <td>{{$product->id}}</td>
                                 <td>
                                     <a href="/product/{{$product->slug}}/{{$product->id}}.html">
                                         {{$product->Title}}
                                     </a>
                                 </td>
                                 <td>
                                    @php
                                       $thumbs = json_decode($product->thumb); // Chuyển đổi chuỗi JSON thành mảng
                                       $firstThumb = $thumbs[0]; // Lấy đường dẫn đầu tiên
                                    @endphp
                                     <img width="150" src="{{ asset('storage/images/products/'. $firstThumb) }}" alt="Ảnh sản phẩm">
                                 </td>
                                 <td>{{$product->cate->CateName}}</td>
                                 <td>{{$product->description}}</td>
{{--                                 <td>{{$product->content}}</td>--}}
                                 <td>${{$product->price}}.00</td>
                                 <td>${{$product->discount}}.00</td>
                                 <td>
                                     @if($product->active == 1)
                                        <input type="checkbox" checked disabled>
                                     @else
                                        <input type="checkbox" disabled>
                                     @endif
                                 </td>
                                 <td>
                                     @if($product->ishot == 1)
                                         <input type="checkbox" checked disabled>
                                     @else
                                         <input type="checkbox" disabled>
                                     @endif
                                 </td>
                                 <td>
                                     @if($product->isnewfeed == 1)
                                         <input type="checkbox" checked disabled>
                                     @else
                                         <input type="checkbox" disabled>
                                     @endif
                                 </td>
                                 <td style="width: 20%">
                                     <div class="d-flex justify-content-around">
                                         <a href="{{ route('Editproduct', ['id' => $product->id]) }}" class="btn btn-info px-4 py-2">Chỉnh sửa</a>
                                         <form action="{{ route('deleteproduct', ['id' => $product->id]) }}" method="POST">
                                             @csrf
                                             @method('DELETE')
                                             <button class="btn btn-danger px-4 py-2" type="submit">Xóa</button>
                                         </form>
                                     </div>
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>
                           <tfoot>

                           </tfoot>
                        </table>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                     </div>
                     {{-- <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                           <ul class="pagination">
                              <li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                              <li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                              <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                              <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                              <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                              <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                              <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                              <li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                           </ul>
                        </div>
                     </div> --}}
                  </div>
               </div>
            </div>
            <!-- /.card-body -->
         </div>
         <!-- /.card -->
         <!-- /.card -->
      </div>
      <!-- /.col -->
   </div>
   <!-- /.row -->
</div>
<!-- /.container-fluid -->
@endsection
