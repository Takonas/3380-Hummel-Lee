<!-- CSC 3380 Final Project Code
Connor Hummel 
Sun Lee -->

<!-- Open XAMPP
Turn on Apache
Turn on MySQL -->

<!doctype html>
<html lang="en">
<style>
	.div1 {
		font-family: "Helvetica", Sans-serif;
		padding-top: 25px;
		padding-bottom: 25px;
	}

	.div2 {
		font-family: "Verdana", Sans-serif;
		font-weight: bold;
		font-size: 18pt;

	}
</style>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
	<title>Health Database Project</title>
</head>

<body>
	<div class="container">
		<div>
			<div>
				<div class="card mt-4">
					<div class="card-header">
						<h4>Search for Health Articles </h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-7">
								<form action="" method="GET">
									<div class="input-group mb-3">
										<!-- setting up search button -->
										<input type="text" name="search" required value="<?php if (isset($_GET['search'])) {
																								echo $_GET['search'];
																							} ?>" class="form-control" placeholder="Search here">
										<button type="submit" class="btn btn-primary">Search</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="card mt-4">
					<div class="card-body">
						<table class="table">
							<thead>
								<tr>
									<th>Title</th>
									<th>Link</th>
								</tr>
							</thead>
							<tbody>

							<!-- What happens when clicking the search button -->
								<?php
								$con = mysqli_connect("localhost", "root", "", "testing");
								if (isset($_GET['search'])) {
									$filtervalues = $_GET['search'];
									$query = "SELECT * FROM search WHERE CONCAT(title,link) LIKE '%$filtervalues%' ";
									$query_run = mysqli_query($con, $query);
									if (mysqli_num_rows($query_run) > 0) {
								?>
										<div class=div2>
											<p> Most relevant results</p>
										</div>
										<?php
										foreach ($query_run as $items) {
										?>
											<tr>
												<td><?= $items['Title']; ?></td>
												<td><?= $items['Link']; ?></td>
											</tr>
										<?php
										}
									} else {
										?>
										<tr>
											<td colspan="4">No Articles Found</td>
										</tr>
									<?php
									}
									?>
								<?php
								}
								?>
							</tbody>
						</table>
						<div class="div1">
							<a href="https://scholar.google.com/schhp?hl=en&as_sdt=0,19">Can't find what you're looking for?</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>