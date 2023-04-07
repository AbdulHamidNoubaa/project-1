<!DOCTYPE html>
<html lang="en"> 
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>
		@include('layouts.head')
		<link href="{{URL::asset('assets/css/alertify.min.css')}}" rel="stylesheet">
		{{-- <link href="{{URL:z:asset('assets/css/themes/default.min.css')}}" rel="stylesheet"> --}}
		<script src="{{ URL::asset('assets\plugins\sweet-alert\sweetalert.min.js') }}"></script>
		<link  rel="stylesheet" href="{{URL::asset('assets\plugins\sweet-alert\sweetalert.css')}}">
		<script src="{{ URL::asset('assets\js\swet.js') }}"></script>

		<style>
		.btn:focus{
				box-shadow: 0px 1px 6px 1px blue;
			}
		</style>
	</head>

	<body class="main-body app sidebar-mini">
		<!-- Loader -->
		<div id="global-loader">
			<img src="{{URL::asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->
		@include('layouts.main-sidebar')		
		<!-- main-content -->
		<div class="main-content app-content">
			@include('layouts.main-header')			
			<!-- container -->
			<div class="container-fluid">
				@yield('page-header')
				@yield('content')
				@include('layouts.sidebar')
				<!-- Basic modal -->
		<div class="modal" id="modaldemo15">
			<div class="modal-dialog" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">سداد قيمة الزبون</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						
						<!-- Select2 -->
						<form id="form-pay">
							{{-- @csrf --}}
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label>رقم الفاتورة </label>
										<input type="text" name="sales_bill_t" id="sales_bill_t" class="form-control">
										<input type="hidden" id="bill_no">
											
									</div>
									<p class="text-danger" id=bill_t_err></p>
								</div>
								<div class="col-md-2 ">
									<button type="button" class="mt-4 btn btn-primary" id="get_bill_id">بحث</button>
								</div>
								<div class="col-md-5">
									<h5 class="message">

									</h5>
								</div>
							</div>
							<hr>
							<div class="form-group">
								<label>الزبون</label>
								<input type="text" disabled name="client_name_t" id="client_name_t" class="form-control">
								{{-- <input type="hidden" name="client_id_t" id="client_id_t"> --}}
								<p id="phone_err" class="text-danger"></p>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>قيمة السداد</label>
										<input type="number" name="price" id="price_t" class="form-control">
										<p class="text-danger" id=price_t_err></p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>المتبقي</label>
										<input type="number" disabled id="Residual_t" class="form-control">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>الخالص</label>
										<input type="number" disabled id="sincere_t" class="form-control">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>الاجمالي</label>
										<input type="number" disabled id="total_t" class="form-control">
									</div>
								</div>
							</div>
						</form>						
						<!-- Select2 -->
					</div>
					<div class="modal-footer">
						<button class="btn ripple btn-primary" id="pay" type="button">حفظ</button>
						<button class="btn ripple btn-secondary close" data-dismiss="modal" type="button">الغاء</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal" id="modaldemo17">
			<div class="modal-dialog" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">سداد قيمة مورد</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						
						<!-- Select2 -->
						<form id="form-pay-custom">
							{{-- @csrf --}}
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label> رقم الفاتورة المشتريات </label>
										<input type="text" name="pur_bill" id="pur_bill" class="form-control">
										<input type="hidden" id="purbill_no_id">
											
									</div>
									<p class="text-danger" id='bill_custom_err'></p>
								</div>
								<div class="col-md-2 ">
									<button type="button" class="mt-4 btn btn-primary" id="get_purbill">بحث</button>
								</div>
								<div class="col-md-5">
									<h5 class="message1">

									</h5>
								</div>
							</div>
							<hr>
							<div class="form-group">
								<label>المورد</label>
								<input type="text" disabled name="custom_name_recep" id="custom_name_recep" class="form-control">
								{{-- <input type="hidden" name="client_id_t" id="client_id_t"> --}}
								<p id="custom_name_recep_err" class="text-danger"></p>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>قيمة السداد</label>
										<input type="number" name="custom_price_recep" id="custom_price_recep" class="form-control">
										<p class="text-danger" id="custom_price_error"></p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>المتبقي</label>
										<input type="number" disabled id="custom_Residual" class="form-control">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>الخالص</label>
										<input type="number" disabled id="custom_sincere" class="form-control">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>الاجمالي</label>
										<input type="number" disabled id="custom_total" class="form-control">
									</div>
								</div>
							</div>
						</form>						
						<!-- Select2 -->
					</div>
					<div class="modal-footer">
						<button class="btn ripple btn-primary" id="pay_custom" type="button">حفظ</button>
						<button class="btn ripple btn-secondary close" data-dismiss="modal" type="button">الغاء</button>
					</div>
				</div>
			</div>
		</div>
				{{-- @include('layouts.models') --}}
            	@include('layouts.footer')
				<script src="{{URL::asset('assets/js/alertify.min.js')}}"></script>
				@include('layouts.footer-scripts')	
				
				
				<script>
					$(function(){
						// Swal.fire(5)		
						$("#get_bill_id").click(function(){
					reset()
							Pay($("#sales_bill_t").val())
						})
						$("#get_purbill").click(function(){
							reset()
							Exchange($("#pur_bill").val())
						})
						function Exchange(id){
							$.ajax({
								url:"{{ route('get_purbill','') }}/"+id,
								type:"get",
								success:function(res){
									data = JSON.parse(res)
									if(data['error']){
										$(".message1").html(data['error'])
									}else{
										$("#custom_sincere").val(data['sincere'])
										$("#custom_Residual").val(data['Residual'])
										$("#custom_total").val(data['tolal'])
										$("#custom_name_recep").val(data['custom_name'])
										// $("#client_id_t").val(data['client_id'])
										$("#purbill_no_id").val(data['bill_no'])
									}
								}
							})
						}

						function Pay(id){
							$.ajax({
								url:"{{ route('get_bill','') }}/"+id,
								type:"get",
								success:function(res){
									data = JSON.parse(res)
									if(data['error']){
										$(".message").html(data['error'])
									}else{
										$("#sincere_t").val(data['sincere'])
										$("#Residual_t").val(data['Residual'])
										$("#total_t").val(data['total'])
										$("#client_name_t").val(data['client_name'])
										// $("#client_id_t").val(data['client_id'])
										$("#bill_no").val(data['bill_no'])
									}
								}
							})
						}

						$("#pay_custom").click(function(){
							// var id_clint = $("#client_id_t").val()
							reset()
							var bill_no = $("#purbill_no_id").val()
							var price = $("#custom_price_recep").val()
							// console.log(bill_no + " : "+price);
							$.ajax({
								url:"{{ route('Exchange_receipt') }}",
								type:"post",
								data:"_token={{ csrf_token() }}&bill_id="+bill_no+"&price="+price,
								success:function(res){
									// console.log(res)
									data = JSON.parse(res)
									if(data['done']){
										$(".message1").html(data['done'])
										$("#price").val("")
										Exchange(bill_no)
									}else if(data['error']){
										$(".message1").html(data['error'])
									}
								},error:function(res){
									data = res.responseJSON
									$("#custom_price_error").text(data.errors.price)
									$("#custom_name_recep_err").text(data.errors.bill_id)
								}
							})
						})

						function reset(){
							$(".message").html("")
							$(".message1").html('')
							$("#price_t_err").text("")
							$("#bill_t_err").text("")
							$("#custom_price_error").text("")
							$("#custom_name_recep_err").text("")
						}
						$("#pay").click(function(){
							// var id_clint = $("#client_id_t").val()
							reset()
							var bill_no = $("#bill_no").val()
							var price = $("#price_t").val()
							// console.log(bill_no + " : "+price);
							$.ajax({
								url:"{{ route('pay_receipt') }}",
								type:"post",
								data:"_token={{ csrf_token() }}&bill_id="+bill_no+"&price="+price,
								success:function(res){
									// console.log(res)
									data = JSON.parse(res)
									if(data['done']){
										$(".message").html(data['done'])
										$("#price").val("")
										Pay(bill_no)
									}else if(data['error']){
										$(".message").html(data['error'])
									}
								},error:function(res){
									data = res.responseJSON
									$("#price_t_err").text(data.errors.price)
									$("#bill_t_err").text(data.errors.bill_id)
								}
							})
						})
						$(".close").click(function(){
							$("#custom_sincere").val("")
							$("#custom_Residual").val("")
							$("#custom_total").val("")
							$("#custom_name_recep").val("")
							// $("#client_id_t").val(data['client_id'])
							$("#purbill_no_id").val("")
							reset()
							$("#sincere_t").val("")
							$("#Residual_t").val("")
							$("#total_t").val("")
							$("#client_name_t").val("")
							// $("#client_id_t").val(data['client_id'])
							$("#bill_no").val("")
						})
					})
				</script>
				<script>
					function myFunction() {
					  // Declare variables
					  var input, filter, table, tr, td, i, txtValue;
					  input = document.getElementById("myInput");
					  filter = input.value.toUpperCase();
					  table = document.getElementById("myTable");
					  tr = table.getElementsByTagName("tr");
					
					  // Loop through all table rows, and hide those who don't match the search query
					  for (i = 0; i < tr.length; i++) {
						td = tr[i].getElementsByTagName("td")[1];
						if (td) {
						  txtValue = td.textContent || td.innerText;
						  if (txtValue.toUpperCase().indexOf(filter) > -1) {
							tr[i].style.display = "";
						  } else {
							tr[i].style.display = "none";
						  }
						}
					  }
					}
					</script>
	</body>
</html>