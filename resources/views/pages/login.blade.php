

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>RESTORAN</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>
<body>

    <form action="{{route('proses_login')}}" method="POST">
	 @csrf
	<div class="card col-4" style="margin-top: 10%; margin-left: 33%">
	
	<div class="card-body">

	<div style="text-align:center;">
	     <h2>RESTORAN</h2>
	</div>
	
	<div class="input-group" style="margin-top:30px">
	<div class="input-group-prepend">
		<span class="input-group-text">
		<i class="flaticon-user"></i>
		</span>
	</div>
	<input type="email" class="form-control" placeholder="Email" name="email">
    </div>

	<div class="input-group" style="margin-top:20px">
	<div class="input-group-prepend">
		<span class="input-group-text">
		<i class="flaticon-lock"></i>
		</span>
	</div>
	<input type="password" class="form-control" placeholder="Password" name="password">
    </div>

	<div style="text-align:center; margin-top:15px;"> 
	<button type="submit" class="btn btn-info ">Login</button>
	
	</div>
	<a href="{{(route('register'))}}">Make Account</a>
    
	   @if($message = Session::get('sukses'))
	                                <div style="margin-top:20px;"></div>
                                    <div class="alert alert-primary alert-dismissible fade show">
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button> <strong>{{$message}}</strong>
                                    </div>
                                    @endif



	</div>
    </div>
	</form>
	 
	<!--   Core JS Files   -->
	<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="../assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="../assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../assets/js/setting-demo.js"></script>
	<script src="../assets/js/demo.js"></script>

	
</body>
</html>