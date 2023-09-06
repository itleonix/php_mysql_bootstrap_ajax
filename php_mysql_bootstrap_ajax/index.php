<!DOCTYPE html> 					<!-- Здесь и комментировать нечего, просто верстка с использованием Bootstrap 5-->
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Тестовая работа для компании ИНЛАЙН</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<div class="container p-5">
	<form class="navbar-form" role="form" id="search_form">
		<div class="row">
			<div class="col-10">
        		<input type="text" class="form-control border" placeholder="Search" id="search_input">
        		 <div class="invalid-feedback" hidden="True" id="mes_err">
      				Enter more than 3 characters!
    			</div>
        	</div>
        	<div class="col-2">
        		<button type="submit" id="search_submit" class="btn btn-outline-primary">Search</button>
        	</div>
        </div>
	</form>
</div>
<div class="container" id="result_search">
															<!-- Место для вывода выборки из БД -->
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script  src="/testworkinline/js/jquery-3.7.1.min.js"></script>
<script src="/testworkinline/js/scripts.js"></script>
</body>
</html>