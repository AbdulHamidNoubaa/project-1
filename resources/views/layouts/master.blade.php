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
		<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

		<style>
		.select2-container{
			width: 100% !important;
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
		
		<!--  ايصال القبض طريقة جديدة بنحذف الاول -->

		<!-- Button trigger modal-->

		<!-- Modal: modalCart -->
		<div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<!--Header-->
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">ايصال القبض</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
				</button>
			</div>
			<!--Body-->
			<div class="modal-body">
				<div class="text-danger massege"></div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>اختر الزبون</label>
							<select class="form-control pay_select" name="client" id="client_select">
								<option value="">....</option>
							</select>
							<p class="text-danger" id=client_pay_err></p>
						</div>
					</div>
					{{-- <div class="col-md-6">
					<label> الفاتورة (اختياري)</label>
					<select class="form-control pay_select" name="bills_num" id="bill_num_pay">
						<option value="">....</option>
					</select>
					<p class="text-danger" id=bills_num_pay_err></p>
					</div> --}}
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>قيمة السداد</label>
							<input type="number" name="price" id="price_pay" class="form-control">
							<p class="text-danger" id=price_pay_err></p>
						</div>
						ملاحظات(اختياري)
						<textarea rows="6" cols="6" class="form-control" name="descrip" placeholder="ملاحظات ....">
						</textarea>
						<small>{{ Auth::user()->name }}</small>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>المتبقي</label>
							<input type="number" disabled id="Residual_pay" class="form-control">
						</div>
						<div class="form-group">
							<label>الخالص</label>
							<input type="number" disabled id="sincere_pay" class="form-control">
						</div>
						<div class="form-group">
							<label>الاجمالي</label>
							<input type="number" disabled id="total_pay" class="form-control">
						</div>
					</div>
				</div>
			</div>
			<!--Footer-->
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-primary" data-dismiss="modal">اغلاق</button>
				<button class="btn btn-primary" id="pay">حفظ</button>
			</div>
			</div>
		</div>
		</div>
		<!-- Modal: modalCart -->

		<!--  نهاية الموديل متاع ايصال القبض -->
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
						<button type="button" class="btn btn-outline-primary" data-dismiss="modal">اغلاق</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal" id="modeExchange">
			<div class="modal-dialog" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header bg-primary text-withe">
						<h6 class="modal-title">ايصال صرف</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						
						<!-- Select2 -->
						<form id="form-pay-custom">
							@csrf
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>بيان الايصال</label>
										<input type="text" name="descripe_exc" id="descripe_exc" class="form-control">
										<input type="hidden" id="descripe_exc">
											
									</div>
									<p class="text-danger" id='descripe_exc_err'></p>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>القيمة</label>
										<input type="number" name="price" id="price_exc" class="form-control">
										{{-- <input type="hidden" رid="price_exc_err"> --}}
											
									</div>
									<p class="text-danger" id='price_exc_err'></p>
								</div>
								
							</div>
							<hr>
							
							
						</form>						
						<!-- Select2 -->
					</div>
					<div class="modal-footer">
						<button class="btn ripple btn-primary" id="exchange_send" type="button">حفظ</button>
						<button type="button" class="btn btn-outline-primary" data-dismiss="modal">اغلاق</button>
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
						function reset_form_pay(){
							$("#sincere_pay").val("")
							$("#Residual_pay").val("")
							$("#total_pay").val("")
							$("#bill_num_pay").html("")
							$('#price_pay').val("")
							$(".massege").html("")
							$("#client_select").val("")
						}
						$('#pay_select').select2({
								dropdownParent: $('#modalCart')
							});
						// عرض الزبائن او العملاء في سيليكت للاختيار منهم
						function client_select(){
							$.ajax({
								url:"{{ route('clientSelect') }}",
								type:"get",
								success:function(res){
									$("#client_select").html(res)
								}
							})
						}
						client_select()
						function select_client(id,bill=0){
							$.ajax({
								url:"{{ route('client_pay','') }}/"+id,
								data:"bill_id="+bill,
								type:"get",
								success:function(res){
									if(res != ""){
									data = JSON.parse(res)
									
									$("#sincere_pay").val(data['sincere'])
									$("#Residual_pay").val(data['Residual'])
									$("#total_pay").val(data['total'])
									$("#bill_num_pay").html(data['salesbill'])
								}else{
									reset_form_pay()
								}
								},error:function(res){
									
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
										$("#sincere_pay").val(data['sincere'])
										$("#Residual_pay").val(data['Residual'])
										$("#total_pay").val(data['total'])
									}
								}
							})
						}
						$("#client_select").change(function(){
							select_client($(this).val())
						})
						$("#bill_num_pay").change(function(){
							if($(this).val() != "")
							Pay($(this).val())
							else
							select_client($("#client_select").val())
						})
						
						function pay_send(){
							reset()
							var bill_no = $("#bill_num_pay").val()
							var price = $("#price_pay").val()
							var client = $("#client_select").val()
							$.ajax({
								url:"{{ route('pay_receipt') }}",
								type:"post",
								data:"_token={{ csrf_token() }}&price="+price+"&client="+client,
								success:function(res){
									// console.log(res)
									data = JSON.parse(res)
									if(data['done']){
										// console.log(data['done'])
										Swal.fire(data['done'])
										$("#modalCart").modal("hide");
										reset_form_pay()
										$("#pay").removeAttr("disabled")
									}else if(data['error']){
										$(".massege").html(data['error'])
										$("#pay").removeAttr("disabled")
									}
								},error:function(res){
									$("#pay").removeAttr("disabled")
									data = res.responseJSON
									$("#price_pay_err").text(data.errors.price)
									$("#bills_num_pay_err").text(data.errors.bill_id)
									$("#client_err").text(data.errors.client)
								}
							})
						}


						$("#pay").click(function(){
							$(this).attr("disabled","disabled")
							pay_send()
						})

						$("#price_pay").keypress(function(e){
							if(e.which == 13){
								pay_send()
							}
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
									console.log(res)
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

						function Exchange_pay(){
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
										$("#modaldemo17").modal("hide")
										Swal.fire(data['done'])
										$("#custom_price_recep").val("")
										$("#purbill_no_id").val().change()
									}else if(data['error']){
										$(".message1").html(data['error'])
									}
								},error:function(res){
									data = res.responseJSON
									$("#custom_price_error").text(data.errors.price)
									$("#custom_name_recep_err").text(data.errors.bill_id)
								}
							})
						}
						$("#custom_price_recep").keypress(function(e){
							if(e.which == 13){
								reset()
								Exchange_pay()
							}
						})

						$("#pay_custom").click(function(){
							// var id_clint = $("#client_id_t").val()
							Exchange_pay()
						})

						function Exchange_exc(){
							
							var descripe = $("#descripe_exc").val()
							var price = $("#price_exc").val()
							$.ajax({
								url:"{{ route('Exchange-exc') }}",
								type:"post",
								data:"_token={{ csrf_token() }}&descripe="+descripe+"&price="+price,
								success:function(res){
									data = JSON.parse(res)
									if(data['done']){
										$("#modeExchange").modal("hide");
										Swal.fire(data['done'])
										$("#descripe_exc").val("")
										$("#price_exc").val("")
									}
								},error:function(res){
									data = res.responseJSON
									$("#descripe_exc_err").text(data.errors.descripe)
									$("#price_exc_err").text(data.errors.price)
								}
							})
						}
						$("#exchange_send").click(function(){
							$("#descripe_exc_err").text("")
							$("#price_exc_err").text("")
							Exchange_exc()
						})
						$("#price_exc").keypress(function(e){
							if(e.which == 13){
								Exchange_exc()
							}
						})

						function reset(){
							$(".message").html("")
							$(".message1").html('')
							$("#price_t_err").text("")
							$("#bill_t_err").text("")
							$("#custom_price_error").text("")
							$("#custom_name_recep_err").text("")
						}
						
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