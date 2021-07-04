<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>

	<form method="post" action="{{ url('/import') }}" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-group"}}">
			<label for="upload-file" class="control-label">CSV file to import</label>
			<input type="file" name="upload-file" class="form-control">
		</div>
		<p><button type="submit" class="btn btn-sucess" name="submit"><i class="fa fa-check"></i> Submit </button> </p>
	</form>

</body>
</html>
