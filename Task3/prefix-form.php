
<?php

  $prefixes = $_POST['prefix'];


  if(empty($prefixes))

  {
    echo("You didn't select any prefixes.");
  }

  else{
    $N = count($prefixes);
    for($i=0; $i < $N-1; $i++)
    {
       $where .= " username LIKE '$prefixes[$i]%' or" ;

    }

    $where .= " username LIKE '". $prefixes[$N-1]."%'  ; " ;

    
    
     echo $where;
}

?>


