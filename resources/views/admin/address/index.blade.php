@extends('admin.main')
@section('contents')
<h1>Quản lý address</h1>
<div class="container-fluid">
   <div class="row">
      <div class="col-12">
         <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
               <a href="{{Route('Createaddress')}}" class="btn btn-success px-4 py-2 mb-3">Thêm mới address</a>
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
                                 <th>AddressId</th>
                                 <th>Country</th>
                                  <th>City</th>
                                 <th>#</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($addresses as $address)
                              <tr class="odd">
                                 <td>{{$address->id}}</td>
                                  <td>{{$address->countries->name}}</td>
                                  <td>{{$address->city}}</td>
                                 <td class="d-flex justify-content-around">
                                     <a href="{{ route('Editaddress', ['id' => $address->id]) }}" class="btn btn-info px-4 py-2">Chỉnh sửa</a>
                                     <form action="{{ route('deleteaddress', ['id' => $address->id]) }}" method="POST">
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
