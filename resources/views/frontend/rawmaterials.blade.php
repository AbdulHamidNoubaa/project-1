@extends('layouts.master')
@section('title')
	المواد الخام 
@endsection
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('title')
المواد الخام
@endsection
@section('page-header')
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">المواد الخام</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ ادارة الاصناف</span>
		</div>
	</div>
	<div class="d-flex my-xl-auto right-content">
		{{-- <div class="pr-1 mb-3 mb-xl-0">
			<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
		</div>--}}
		<div class="pr-1 mb-3 mb-xl-0">
			<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
		</div> 
		@if (Auth::user()->user_type == 1)
		<div class="pr-1 mb-3 mb-xl-0">
			<button type="button"  data-effect="effect-scale" data-toggle="modal" data-target="#modaldemo1" class="btn btn-primary ml-2"><i class="mdi mdi-plus"></i> اضافة مادة </button>
		</div>
		@endif
	</div>
</div>
@endsection
@section('content')

@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>

</div>
	
@endif

@if (session()->has('edit'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>{{ session()->get('edit') }}</strong>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif
@if (session()->has('Add'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>{{ session()->get('Add') }}</strong>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif
@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<strong>{{ session()->get('error') }}</strong>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

@if (session()->has('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<strong>{{ session()->get('delete') }}</strong>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif
				<!-- row -->
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="crad-header p-5">
								<input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="البحث با اسم المنتج">
							</div>
							<div class="card-body" style="height:400px;overflow-y: scroll;">
								<div class="table-responsive">
                                    
									<table  class="table key-buttons text-md-nowrap">
										<thead>
											<tr>
												<th class="border-bottom-0">ر.ت</th>
												<th class="border-bottom-0">اسم المادة</th>
                                                
                                                <th class="border-bottom-0">نوع الحسبة</th>
                                                <th class="border-bottom-0">كمية المخزون</th>
												<th class="border-bottom-0">السعر</th>
                                                <th>المستخدم</th>
												<th class="border-bottom-0">العمليات</th>
												
											</tr>

										</thead>                                        
											<tbody id="myTable">
											</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->

					<!--div-->
							<!-- Basic modal -->
		<div class="modal" id="modaldemo1">
			<div class="modal-dialog" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">اضافة </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<form action="{{ route('rawmaterials.store') }}" id="form-add" method="POST">
						@csrf
					<!--'material_name'=>'required|unique:rawmaterials|max:255',
					'hisba_type'=>'required',
					'quantity'=>'required',
					'price'=>'required', -->
					<div class="modal-body">
						<div class="form-group">
							<label for="exampleInputEmail1">اسم المادة</label>
							<input type="text" class="form-control" id="material_name" name="material_name" required>
						</div>
						<div class="text text-danger" id="error_material_name"></div>
                        <div class="form-group">
							<label for="exampleFormControlTextarea1">نوع الكمية</label>
						<select name="hisba_type" id="hisba_type"  class="form-control">
                        <option value="">حدد نوع الكمية</option>
                        <option value="1">بالمتر</option>
                        <option value="2">بالطرف</option>
                    </select>
						</div>
						<div class="text text-danger" id="error_hisba_type"></div>

                        <div class="form-group">
							<label for="exampleFormControlTextarea1">كمية المخزون</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" required>
						</div>
						<div class="text text-danger" id="error_quantity"></div>
                        <div class="form-group">
							<label for="exampleFormControlTextarea1">السعر</label>
                            <input type="number" class="form-control" id="" name="price" required>
						</div>
						<div class="text text-danger" id="error_price"></div>						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" id="add-mate">تأكيد</button>
						<button type="button" class="btn btn-secondary">إغلاق</button>

					</div>
				</form>
				</div>
			</div>
		</div>

		<div class="modal" id="edit_material">
			<div class="modal-dialog" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">اضافة </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<form action="{{ route('rawmaterials.store') }}" id="form-edit" method="POST">
						@csrf
					<!--'material_name'=>'required|unique:rawmaterials|max:255',
					'hisba_type'=>'required',
					'quantity'=>'required',
					'price'=>'required', -->
					<div class="modal-body">
						<div class="form-group">
							<label for="exampleInputEmail1">اسم المادة</label>
							<input type="text" class="form-control" id="material_name_e" name="material_name" required>
						</div>
						<div class="text text-danger" id="error_material_name_e"></div>
                        <div class="form-group">
							<label for="exampleFormControlTextarea1">نوع الكمية</label>
						<select name="hisba_type" id="hisba_type_e" class="form-control">
                        <option value="">حدد نوع الكمية</option>
                        <option value="1">بالمتر</option>
                        <option value="2">بالطرف</option>
						<input type="hidden" name="id" id="material_id">
                    </select>
						</div>
						<div class="text text-danger" id="error_hisba_type_e"></div>

                        <div class="form-group">
							<label for="exampleFormControlTextarea1">كمية المخزون</label>
                            <input type="number" class="form-control" id="quantity_e" name="quantity" required>
						</div>
						<div class="text text-danger" id="error_quantity_e"></div>
                        <div class="form-group">
							<label for="exampleFormControlTextarea1">السعر</label>
                            <input type="number" class="form-control" id="price_e" name="price" required>
						</div>
						<div class="text text-danger" id="error_price_e"></div>						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" id="update">تأكيد</button>
						<button type="button" class="btn btn-secondary">إغلاق</button>

					</div>
				</form>
				</div>
			</div>
		</div>
		<!-- End Basic modal -->
					</div>
@endsection

@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
<script>
	$(function(){
		function getitem(){
			$.ajax({
				url:"{{route('getitem-mate')}}",
				type:"get",
				success:function(e){
					$('tbody').html(e)
				}
			})
		}
		getitem()
		$('#add-mate').click(function(){
			reset();
		$.ajax({
			url:"{{ route('rawmaterials.store') }}",
			type:"post",
			data:$('#form-add').serialize(),
			success:function(res){
				// console.log(res);
				$('#form-add').trigger("reset");
				$("#modaldemo1").modal('hide')
				alertify.success('تم الاضافة بنجاح');
				getitem();
			},error:function(e){
				$data = e.responseJSON;
				
				$("#error_material_name").text($data.errors.material_name)
				$("#error_hisba_type").text($data.errors.hisba_type)
				$("#error_quantity").text($data.errors.quantity)
				$("#error_price").text($data.errors.price)

			}
		})
	})
	function reset(){
		$("#error_material_name").text("")
		$("#error_hisba_type").text("")
		$("#error_quantity").text("")
		$("#error_price").text("")
		$("#error_material_name_e").text("")
		$("#error_hisba_type_e").text("")
		$("#error_quantity_e").text("")
		$("#error_price_e").text("")
	}
	$(document).on("click",".edit_mate",function(){
		$.ajax({
			url:"{{ route('materialedit','') }}/"+$(this).attr('id'),
			type:"get",
			// data:{"id":id,"_token": "{{ csrf_token() }}" },
			success:function(res){
				// console.log(res['id']);
				$("#material_id").val((res['id']))
				$("#material_name_e").val((res['material_name']))
				$("#hisba_type_e").val((res['hisba_type'])).change()
				$("#quantity_e").val((res['quantity']))
				$("#price_e").val((res['price']))
			}
		})
	})
//==================================================
	$('#add-mate').click(function(){
			reset();
		$.ajax({
			url:"{{ route('rawmaterials.store') }}",
			type:"post",
			data:$('#form-add').serialize(),
			success:function(res){
				// console.log(res);
				$('#form-add').trigger("reset");
				$("#modaldemo1").modal('hide')
				alertify.success('تم الاضافة بنجاح');
				getitem();
			},error:function(e){
				$data = e.responseJSON;
				
				$("#error_material_name").text($data.errors.material_name)
				$("#error_hisba_type").text($data.errors.hisba_type)
				$("#error_quantity").text($data.errors.quantity)
				$("#error_price").text($data.errors.price)

			}
		})
	})

	//============================================
	$('#update').click(function(){
			reset();
			// console.log($('#form-edit').serialize());
		$.ajax({
			url:"{{ route('materialupdate') }}",
			type:"post",
			data:$('#form-edit').serialize(),
			success:function(res){
				// console.log(res);
				$('#form-edit').trigger("reset");
				$("#edit_material").modal('hide')
				alertify.success('تم التعديل بنجاح');
				getitem();
			},error:function(e){
				$data = e.responseJSON;
				
				$("#error_material_name_e").text($data.errors.material_name)
				$("#error_hisba_type_e").text($data.errors.hisba_type)
				$("#error_quantity_e").text($data.errors.quantity)
				$("#error_price_e").text($data.errors.price)

			}
		})
	})
	
	})
</script>
@endsection
