@extends('admin.layouts.layout')

@section('title','Category List')
@section('admin-content')

<style>


div#datatable-buttons_length {
    width: 50% !important;
}

div#datatable-buttons_filter {
    margin-top: -48px;
    margin-bottom: 14px;
}
.dt-buttons.btn-group a.btn {
    border: solid 2px #80808036;
    display: flex;
    margin-bottom: 12px;
    border-radius: 5px;
}

a.btn.btn-default.buttons-copy.buttons-html5.btn-sm {
    border-radius: 5px;
}

a.btn.btn-default.buttons-csv.buttons-html5.btn-sm {
    border-radius: 5px;
}

a.btn.btn-default.buttons-excel.buttons-html5.btn-sm {
    border-radius: 5px;
}

a.btn.btn-default.buttons-pdf.buttons-html5.btn-sm {
    border-radius: 5px;
}

a.btn.btn-default.buttons-print.btn-sm {
    border-radius: 5px;
}

.dt-buttons.btn-group {
    gap: 11px;
}
.toggle-group .btn {
    font-size: 13px;
}
select#heard12 {
    font-size: 14px;
}
.table-responsive .table td, .table th {
    padding-bottom: 0px;
}

.pagination .flex.justify-between.flex-1.sm\:hidden {
    display: flex;
    justify-content: space-between;
}

.pagination p.text-sm.text-gray-700.leading-5 {
    text-align: center;
}

.pagination svg.w-5.h-5 {
    width: 50px;
}

.pagination {
    display: flex;
    justify-content: center;
}

</style>

<!-- Bootstrap Toggle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>



<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
          
      </div>


    </div>

    <div class="clearfix"></div>
    
<!--FIlter Section start-->  
    <div class="row">
        <div class="col-md-12 customer-form-first">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Customer Form </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form action="{{ url('admin/listDocument') }}" id="course_form" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        {!! csrf_field() !!}
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Vendor Name</label>
                                <input type="text" class="form-control" placeholder="Enter Vendor Name" name="first_name"  value="{{ old('first_name', request('first_name')) }}">
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Mobile Number<span class="mandatory" style="color:red"> *</span></label>
                                <input type="text" class="form-control" placeholder="Enter Mobile Number" name="mobile_number" oninput="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" title="Only numbers are allowed" minlength="1" maxlength="12" value="{{ old('mobile_number', request('mobile_number')) }}">
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Document Name</label>
                                <input type="text" class="form-control" placeholder="Enter Document Name" name="doc_name" value="{{ old('doc_name', request('doc_name')) }}">
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Status</label>
                                <select id="country" class="form-control" name="doc_status">
                                <option value="3" {{ request('doc_status') == '' ? 'selected' : '' }}>All</option>
                                <option value="0" {{ request('doc_status') == '0' ? 'selected' : '' }}>Pending</option>
                                <option value="1" {{ request('doc_status') == '1' ? 'selected' : '' }}>Approved</option>
                                <option value="2" {{ request('doc_status') == '2' ? 'selected' : '' }}>Rejected</option>
								</select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 go-back-btn mt-3">
                                <button type="submit" name="action" value="search" class="btn btn-primary">Search</button>
                                <button type="submit" name="action" value="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!--FIlter Section End-->  


    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Document List</h2>
            
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
                  <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>S.No.</th>
                        <th>Vendor</th>
                        <th>Mobile</th>
                        <th>Document</th>
                        <th>Document Name</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php $i = 1; ?>
                      @foreach ($document as $list)
                      <tr data-id="{{$list->id}}">
                        <td>{{$i}}</td>
                        <td>{{$list->name}}</td>
                        <td>{{$list->mobile_no}}</td>
                        <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal{{$i}}">Document {{$i}}</button></td>
                        <td>{{$list->doc_name}}</td>
                        <td><select name="doc_status" class="form-control docu_status">
                            <option value="0" {{ $list->verification_status == 0 ? 'selected' : '' }}>Pending</option>
                            <option value="1" {{ $list->verification_status == 1 ? 'selected' : '' }}>Approved</option>
                            <option value="2" {{ $list->verification_status == 2 ? 'selected' : '' }}>Rejected</option>
                        </select></td>
                        <td>
                          <a title="Delete Document" class="btn btn-sm btn-danger" href="{{ route('deleteDocument',$list->id)}}" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i>
                        </td>

                      </tr>
                      <div class="modal fade" id="myModal{{$i}}" role="dialog">
                                                        <div class="modal-dialog">
                                                        
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            {{$list->doc_name}}
                                                            
                                                            </div>
                                                            <div class="modal-body">
                                                            <p>@php
                                                                    $fileExtension = pathinfo($list->doc_file, PATHINFO_EXTENSION);
                                                                @endphp

                                                                @if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                                                    <!-- Display Image -->
                                                                    <img src="{{ asset('public/documents/' . $list->doc_file) }}" alt="Document" class="img-fluid">
                                                                @elseif($fileExtension == 'pdf')
                                                                    <!-- Display PDF -->
                                                                    <embed src="{{ asset('public/documents/' . $list->doc_file) }}" type="application/pdf" width="100%" height="500px" />
                                                                @else
                                                                    <!-- Display Download Link for Other Files -->
                                                                    <a href="{{ asset('public/documents/' . $list->doc_file) }}" target="_blank">View or Download File</a>
                                                                @endif
                                                            </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                        
                                                        </div>
                                                    </div>
                      <?php $i++; ?>
                      @endforeach
                    </tbody>
                  </table>
                 
                </div>
                
              </div>
            

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="pagination">
    {{ $document->appends(request()->except('page'))->links() }}
</div>
  </div>
</div>

<script>
    new DataTable('#myTable', {
    info: false,
    ordering: false,
    paging: false
});
        $(document).ready(function() {
            $('.toggle-class').bootstrapToggle();
        });
    </script>
<script>
    $('.docu_status').on("change", function() {
      let docId = $(this).closest('tr').data('id'); 
      let status = $(this).val(); 
      $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo url('/admin/documentStatus'); ?>",
            data: {
                _token: '{{ csrf_token() }}',
                'status': status,
                'id': docId
            },
            success: function(data) {
                if (data.success) {
                    toastr.success('Status changed successfully');
                   // location.reload();

                } else {
                    toastr.error('Failed to change status');
                    //location.reload();
                }
            },
        });
    });
</script>

<script>
    $(document).ready(function() {
        @if(Session::has('message'))
            toastr.success("{{ Session::get('message') }}");
        @endif

        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @endif

        @if(Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
        @endif
    });
</script>

@endsection