<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Assignment || @yield('title')</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
	    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
	    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
	    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	    <style type="text/css">
	    	img {
				border: 1px solid #555;
			}
	    </style>
	</head>
	<body>
		<div class="container">
			<div class="container-fluid">
				@yield('content')
			</div>
		</div>
	</body>
	<script type="text/javascript">
  		var url = "{{url('/')}}";
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js" defer="defer"></script>
	<script type="text/javascript">
		var loadFile = function(event) {
	        var reader = new FileReader();
	        reader.onload = function(){
	            var output = document.getElementById('output');
	            output.src = reader.result;
	            output.classList.remove("d-none");
	        };
	        reader.readAsDataURL(event.target.files[0]);
	    };
	</script>
	<script type="text/javascript" src="{{url('js/custom.js') }}"></script>
</html>