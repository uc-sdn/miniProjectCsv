<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php
  
  if (($open = fopen("data.csv", "r")) !== FALSE) 
  {
  
    echo "<table class='table table-bordered'>";
    $income = 0; $expense=0;
    while (($data = fgetcsv($open, 1000, ",")) !== FALSE) 
    {

        $size = count($data);

        
        
        echo "<tr>";
        for ($i=0; $i < $size; $i++) { 
                if($data[0][0])
                {
                    echo "<td class='bg-secondary text-light'>".$data[$i]."</td>";
                }
                elseif($i==3)
                {
                    if($data[3][0]=='$')
                    {
                        echo "<td class='text-success'>".$data[$i]."</td>";
                        $income += (float) substr($data[3],1);
                        
                    }
                    elseif($data[3][0]=='-'){
                        echo "<td class='text-danger'>".$data[$i]."</td>";
                        $expense += (float) substr($data[3],2);

                    }
                    else{
                        echo "<td>".$data[$i]."</td>";
                    }
                }
                else{
                    echo "<td>".$data[$i]."</td>";
                }

            }
        echo "<tr>";
        
    }
    $total =  $income - $expense;

    echo "<tr>";

        echo "<td rowspan='3'></td>";
        echo "<td rowspan='3'></td>";
        echo "<td rowspan='3'>total:-</td>";
        echo "<td >total income :  $income</td>";
    echo "</tr>";
        
    echo "<tr>";
        echo "<td>total expense :  $expense</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td> net income :  $total</td>";
    echo "</tr>";

    echo "</table>";
    fclose($open);
  }


?>    
</body>
</html>

