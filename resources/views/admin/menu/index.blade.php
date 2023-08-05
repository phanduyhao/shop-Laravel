@extends('admin.main')
@section('contents')
<h1>Quản lý menu</h1>
<div class="container-fluid">
   <div class="row">
      <div class="col-12">
         <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
               <a href="{{Route('CreateMenu')}}" class="btn btn-success px-4 py-2 mb-3">Thêm mới Menu</a>
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
                                 <th>MenuId</th>
                                 <th>Name Menu</th>
                                 <th>Parent Id</th>
                                 <th>Description</th>
                                 <th>Slug</th>
                                 <th>Active</th>
                                 <th>#</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($menus as $menu)
                              <tr class="odd">
                                 <td>{{$menu->id}}</td>
                                 <td>{{$menu->name}}</td>
                                 <td>{{$menu->parent_id}}</td>
                                 <td>{{$menu->description}}</td>
                                 <td>{{$menu->slug}}</td>
                                 <td>
                                     @if($menu->active == 1)
                                         <input type="checkbox" checked disabled>
                                     @else
                                         <input type="checkbox" disabled>
                                     @endif
                                 </td>
                                 <td class="d-flex justify-content-around">
                                    <a href="{{ route('EditMenu', ['id' => $menu->id]) }}" class="btn btn-info px-4 py-2">Chỉnh sửa</a>
                                    <form action="{{ route('deleteMenu', ['id' => $menu->id]) }}" method="POST">
                                       @csrf
                                       @method('DELETE')
                                       <button class="btn btn-danger px-4 py-2" type="submit">Xóa</button>
                                   </form>
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
