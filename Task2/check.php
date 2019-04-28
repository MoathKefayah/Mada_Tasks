
<?php

    $iprange = "192.168.16.0/22";

    $ip = $_POST['ip'];

    if(isset($_POST['checkbtn']) && $ip != ""){

     

      list($ip_1,$ip_2,$ip_3,$ip_4) = explode('.',$ip);

      $ipbin = sprintf( "%08d", decbin($ip_1)).sprintf( "%08d", decbin($ip_2)).sprintf( "%08d", decbin($ip_3)).sprintf( "%08d", decbin($ip_4));

      

       list($ipaddress,$subnetmask) = explode('/',$iprange);

       $binarysubnetmask = binsubnetmask($subnetmask);

       $decsubnetmask = bindec($binarysubnetmask);

       $usable_hosts = num_of_usable_hosts($decsubnetmask);

       $result = find_FUA_LUA($ipaddress,$usable_hosts);

        list($firstusableaddress,$secondusableaddress) = explode(' to ', $result);
        list($f1,$f2,$f3,$f4) = explode('.',$firstusableaddress);
        list($l1,$l2,$l3,$l4) = explode('.',$secondusableaddress);

      $f = sprintf( "%08d", decbin($f1)).sprintf( "%08d", decbin($f2)).sprintf( "%08d", decbin($f3)).sprintf( "%08d", decbin($f4));
      $l = sprintf( "%08d", decbin($l1)).sprintf( "%08d", decbin($l2)).sprintf( "%08d", decbin($l3)).sprintf( "%08d", decbin($l4));
       
      
        if($ipbin >= $f && $ipbin <= $l){
          $exist= true ;
        }
        else{
          $exist= false ;
        }

       echo $exist ;

    }


    function binsubnetmask($subnetmask){


       for($i = 0 ; $i < $subnetmask ; $i++ ){
            $subnetmaskbin.=1;
       }

       for($j=0 ; $j < (32-$subnetmask) ; $j++ ){
            $subnetmaskbin.=0 ;
       }

       return $subnetmaskbin ;

    }


    function num_of_usable_hosts($binsubnetmask){

     return pow(2,(getFirstSetBitPos($binsubnetmask)-1)) - 2;

    }

   function getFirstSetBitPos($n){

     return ceil(log(($n& -$n) + 1, 2));

    }

    function find_FUA_LUA($ipaddress,$nuh){  //$nuh:num_of_usable_hosts

      list($ip1,$ip2,$ip3,$ip4) = explode('.',$ipaddress);

      $ipbin = sprintf( "%08d", decbin($ip1)).sprintf( "%08d", decbin($ip2)).sprintf( "%08d", decbin($ip3)).sprintf( "%08d", decbin($ip4));

      $FUA = addBinary($ipbin,"1");
      $LUA = addBinary($FUA,decbin($nuh));

      $F=str_split($FUA,8);
      $L=str_split($LUA ,8);

      $FUAD = bindec($F[0]).'.'.bindec($F[1]).'.'.bindec($F[2]).'.'.bindec($F[3]);
      $LUAD = bindec($L[0]).'.'.bindec($L[1]).'.'.bindec($L[2]).'.'.(int)(bindec($L[3])-1);

      return $FUAD.' to '.$LUAD ;

    } 

    function addBinary($a, $b){ 
  
        $result = ""; // Initialize result 
        $s = 0;  // Initialize digit sum 
      
        // Travers both strings starting  
        // from last characters 
        $i = strlen($a) - 1; 
        $j = strlen($b) - 1; 

        while ($i >= 0 || $j >= 0 || $s == 1) 
        { 
            // Comput sum of last digits and carry , ord: Convert the first byte of a string to a value between 0 and 255
            $s += (($i >= 0)? ord($a[$i]) - ord('0'): 0); 
            $s += (($j >= 0)? ord($b[$j]) - ord('0'): 0); 
      
            // If current digit sum is 1 or 3,  
            // add 1 to result 
            $result = chr($s % 2 + ord('0')) . $result; 
      
            // Compute carry 
            $s = (int)($s / 2); 
      
            // Move to next digits 
            $i--; $j--; 
        } 
        return $result; 
  }  


?>
