<?php
$table = "<table>";
$table = "<table>";
for($rows = 1;$rows <= 9;$rows++)
{
    $table.= "\t<tr>";
    for($col=1; $col <= 9; $col++)
{
    $table .= "<td>" .$rows * $col . "</td>";
}
    $table .="</tr>\n";
}
$table .= "</table>"

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

</body>
<?php echo $table; ?>
</html>