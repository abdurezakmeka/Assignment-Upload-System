<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<title>Upload Project</title>
</head>
<body>
	<div class="container mt-5">
		<h2>Upload Your Final Project</h2>
		<form action="upload.php" method="POST" enctype="multipart/form-data">
			<div class="mb-3">
				<label for="fullName" class="form-label">Full Name</label>
				<input type="text" class="form-control" name="fullName" id="fullName" placeholder="Example: Fikadu Meka" required>
			</div>
			<div class="mb-3">
				<label for="phoneNumber" class="form-label">Phone Number</label>
				<input type="tel" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="Example: +2519110..." required>
			</div>
			<div class="mb-3">
				<label for="course" class="form-label">Select Course</label>
				<select class="form-select" name="course" id="course" required>
					<option value="" disabled selected>Select your course</option>
					<option value="course1">Course 1</option>
					<option value="course2">Course 2</option>
					<option value="course3">Course 3</option>
					<option value="course4">Course 4</option>
					<option value="course5">Course 5</option>
				</select>
			</div>
			<div class="mb-3">
				<label for="file" class="form-label">Select file</label>
				<input type="file" class="form-control" name="file" id="file" required>
			</div>
<button type="submit" class="btn btn-primary" style="background-color: black;  border:0px; color: white;">Upload file</button>		</form>
	</div>
</body>
</html>
