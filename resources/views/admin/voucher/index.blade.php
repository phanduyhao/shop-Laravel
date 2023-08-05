@extends('admin.main')
@section('contents')
<h1>Quản lý voucher</h1>
<div class="container-fluid">
   <div class="row">
      <div class="col-12">
         <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
               <a href="{{Route('vouchers.create')}}" class="btn btn-success px-4 py-2 mb-3">Thêm mới voucher</a>
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
                                 <th>Voucher ID</th>
                                 <th>Code Voucher</th>
                                  <th>Type Voucher</th>
                                  <th>Content Voucher</th>
                                  <th>Price Voucher</th>
                                  <th>#</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($vouchers as $voucher)
                              <tr class="odd">
                                 <td>{{$voucher->id}}</td>
                                  <td>{{$voucher->codeName}}</td>
                                  <td>{{$voucher->type}}</td>
                                  <td>{{$voucher->content}}</td>
                                  <td>{{$voucher->price}}</td>
                                  <td class="d-flex justify-content-around">
                                      <a href="{{ route('vouchers.edit', ['voucher' => $voucher]) }}" class="btn btn-info px-4 py-2">Chỉnh sửa</a>
                                      <form action="{{ route('vouchers.destroy', ['voucher' => $voucher]) }}" method="POST" id="delete-form-{{ $voucher->codeName }}">
                                          @method('DELETE')
                                          @csrf
                                          <!-- Nút xóa với sự kiện onclick -->
                                          <button type="button" class="btn btn-danger px-4 py-2" onclick="confirmDelete('{{ $voucher->codeName }}')">Xóa</button>
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
<script>
    function confirmDelete(codeName) {
        if (confirm('Bạn có chắc chắn muốn xóa "' + codeName + '" không?')) {
            // Tìm ID của form và gửi đi
            var formId = 'delete-form-' + codeName;
            document.getElementById(formId).submit();
        }
    }
</script>
@endsection
