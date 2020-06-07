<?php

session_start();


if (isset($_SESSION['valid'])) {
	require_once("header_log.php");
} else {
	require_once("header.php");
}

?>

<!DOCTYPE HTML>
<html>

<head>
	<title>Full Motion</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="maincard.css" />
</head>
<div style="margin: 100px;"></div>

<div class="root">
	<div class="header">
		<div class="leftSide">
			<h1 class="numberOfArticles"> <?php if (isset($querryResult)) {
											} ?> </h1>
		</div>
		<div class="rightSide">
			<h1><a class="numberOfArticles" href="addarticle.php" style="color:#5381b5;">Add article</a></h1>
		</div>

	</div>
	<div class="articlesContainer">

	</div>
</div>

<body id="top">
	<div id="main">
		<div class="inner">

			<!-- Boxes -->
			<div class="thumbnails">


				<?php


				if (isset($_POST['submit-search'])) {
					$search = mysqli_real_escape_string($conn, $_POST['search']);
					$sql = "SELECT * FROM articles WHERE a_title LIKE '%$search%' OR a_txt LIKE '%$search%'
                                    OR a_author LIKE '%$search%' OR a_date LIKE '%$search%'";
					$result = mysqli_query($conn, $sql);
					$querryResult = mysqli_num_rows($result);



					if ($querryResult > 0) {
						echo "
						<div class='leftSide'>
						</div>
						";
						while ($row = mysqli_fetch_assoc($result)) {
							echo "
									<div class='box'>
									<a href='thearticle.php?id=" . $row['a_id'] . "' class='image fit'><img src='images/phone.jpg' /></a>
										<div class='inner'>
											<h3>" . $row['a_title'] . "</h3>
											<p>" . $row['a_date'] . "</p>
											<p>" . $row['a_author'] . "</p>
											<a href='' class='button  fit' >Watch</a>
										</div>
									</div>
									";
						}
					} else {
						echo "<h1>There are no results matching your search</h1>";
					}
				}

				?>


			</div>

		</div>
	</div>
</body>

</html>