<?php

session_start();


if (isset($_SESSION['admin']) && isset($_SESSION['valid'])) {
	require_once("header_log.php");
} elseif (isset($_SESSION['valid'])) {
	require_once("header_normal.php");
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

<body id="top">
	<div id="main">
		<div class="inner">

			<!-- Boxes -->
			<div class="thumbnails">

				<?php
				$sql = "SELECT * FROM articles";
				$result = mysqli_query($conn, $sql);
				$queryResults = mysqli_num_rows($result);
				if ($queryResults > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						echo "
									<div class='box'>
									<a href='thearticle.php?id=" . $row['a_id'] . "' class='image fit'><img src='images/phone.jpg' /></a>
										<div class='inner'>
											<h3>" . $row['a_title'] . "</h3>
											<p>" . $row['a_date'] . "</p>
											<p>" . $row['a_author'] . "</p>
										</div>
									</div>
									";
					}
				}

				?>


			</div>

		</div>
	</div>
</body>

</html>