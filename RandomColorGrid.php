<?php
$table = "<table>";
    $table = "<table>";
    for($rows = 0;$rows <= 10;$rows++)
    {
     $table.= "\t<tr>";
        for($col=0; $col <= 10; $col++)
         {
            $table .= "<td style='background-color:$color;'>.$color."<br /><span style='color:#ffffff;'>".$color."</span>"</td>;"
         }
     $table .="</tr>\n";
    }
        $table .= "</table>";


    function RandomColor()
    {
        $color = '#';
        for ($i = 1; $i <= 7; $i++)
        {
        $randNum = rand(0,15);
        switch ($randNum)
            {
            case 10: $randNum = 'A';
            break;
            case 11: $randNum = 'B';
            break;
            case 12: $randNum = 'C';
            break;
            case 13: $randNum = 'D';
            break;
            case 14: $randNum = 'E';
            break;
            case 15: $randNum = 'F';
            break;
            }
            $color .= $randNum;
        }
        return $color;
    }

?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php echo $table; ?>

</body>
</html>