<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <link rel="stylesheet" href="mdl/material.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="mdl/material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> 
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
        <title>Index Page</title>
        
<!--        it must for checkbox select-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    </head>
<body>
    
  <?php
        include("database/connection.php");
        if (isset($_GET['q'])) {  //get value as table name from url
        $link=$_GET['q'];
        mysqli_query ($con,"set character_set_results='utf8'"); 
        }
?>  
    
    
    <div class="">
        
        
<!--      <form name="frmUser" method="post" action="edit_user.php?q=<?php echo $link; ?>">-->
            <table class="mdl-data-table mdl-js-data-table  mdl-shadow--2dp">
                       <thead>
                    <tr>
                        <?php
                             $query="DESCRIBE $link"; //build query for get column names from table
                             $results=mysqli_query($con,$query) or die('Query error:'.mysql_error());

                             $columnname=array();
                             $count=0;
                              while($row1= mysqli_fetch_array($results)) {
                                $columnname[$count]=$row1[0];
                                $columnname1=ucwords($row1[0]);
                                echo "<th class='mdl-data-table__cell--non-numeric'>$columnname1</th>";
                                $count++;
                              }
                          echo "<th class='mdl-data-table__cell--non-numeric'>Update</th>";
                          echo "<th class='mdl-data-table__cell--non-numeric'>Delete</th>";

                        ?>
                    </tr>
                  </thead>
<!--                  <tbody>-->
                      <?php
                            echo "<tbody>";
                            $arraylen=sizeof($columnname); //find array length
                            $result=mysqli_query($con,"SELECT * FROM $link");//select value from perticular table
                            while($row2= mysqli_fetch_array($result)) {
                                
                                echo "<tr>";
                            for($co=0;$co<$arraylen;$co++){  
                                $col_value=$row2[$co];
                                echo "<th class='mdl-data-table__cell--non-numeric'>$col_value</th>";
                         
                                 }
                echo "<th><a class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent' href='edit_user.php?q=$link'>Update</a></th>";
                                         echo "<th><a class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent' href='table_for_delete.php?q=$link'>Delete</a></th>";
     

                                   echo "</tr>";
                                   $co++;
                            }
                           echo "</tbody>";
                      ?>
<!--                  </tbody>-->
                 </table>
            
<!--
                         <input type="submit" name="update" value="Update"  id="checkBtn" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent submitbtn"/>  
                    <button type='button' class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent abutton'><a href='addData.php?q=$link' >Add</a></button>
                       <button type='button' class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent abutton'><a href='table_for_delete.php?q=$link' id='checkBtn1' >Delete</a></button>
-->
                  
           
<!--    </form>  -->
    
    </div>
    
    
    

      
</body>
</html>  
    
    
    

