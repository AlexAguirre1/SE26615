<?php
$table = "<table>";
    $table = "<table>";
    for($rows = 0;$rows <= 9;$rows++)
    {
     $table.= "\t<tr>";
        for($col=0; $col <= 9; $col++)
         {
             $r = rand(25,255);
             $g = rand(25,255); // this grabs a random number that is between 128-255 for the RGB, so random number for r then g and finally b.
             $b = rand(25,255);
             $color =  dechex($r) . dechex($g) . dechex($b);// this will allows the random numbers that was generated to be converted from decimal to hexadecimal.
            $table .= "<td style='background-color: #$color;'>$color<br /><span style='color:#ffffff;'>$color</span></td>"; // this will allow to make the change of the individual box into different colors that was generated. and it will also allow to display the rdg collor code/hexadecimal for the color.
         }
     $table .="</tr>\n";
    }
        $table .= "</table>";

?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php echo $table; ?> <!-- This will allow the html to grab the php table and then display the table in the browser. -->

</body>
</html>