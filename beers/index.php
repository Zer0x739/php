<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Seznam piv</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin: auto;
            font-size: 1rem;
        }
        th, td {
            text-align: left;
            padding: 0.5rem;
        }
        th {
            background-color: #ddd;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        @media screen and (max-width: 768px) {
            table {
                font-size: 0.8rem;
            }
            th, td {
                padding: 0.2rem;
            }
        }
    </style>
</head>
<body>
<h1>Seznam piv</h1>
	<table>
		<thead>
			<tr>
				<th>Značka</th>
				<th>Název</th>
				<th>Obsah alkoholu (%)</th>
			</tr>
			<?php include("beers.php"); ?>
		</thead>
		<tbody>
		</tbody>
	</table>
</body>
</html>
