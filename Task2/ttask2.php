
<?php
// This file Not used


    $iprange = "192.168.16.0/22";

    if(isset($_POST['checkbtn'])){

       $ip = $_POST['ip'];

       list($ipaddress,$subnetmask) = explode('/',$iprange);

       $resultsubnetadd = subnetaddress($ipaddress,$subnetmask);

       if($resultsubnetadd[0] == 0 ){
            $t3 = 0;
       }
       else $t3 = 1;

       if($resultsubnetadd[1] == 0 ){
            $t2 = 0;
       }
       else $t2 = 1;

       if($resultsubnetadd[2] == 0 ){
            $t1 = 0;
       }
       else $t1 = 1;

       if($resultsubnetadd[3] == 0 ){
            $t0 = 0;
       }
       else $t0 = 1;

       $res = $t3.$t2.$t1.$t0;

       switch ($res) {
         case '1000':
           $temp = $resultsubnetadd[0];
           break;
         case '1100':
           $temp = $resultsubnetadd[1];
           break;
         case '1110':
           $temp = $resultsubnetadd[2];
           break;
         case '1111':
           $temp = $resultsubnetadd[3];
           break;
       }

       $hosts = num_of_available_hosts($temp);
       $subnets = num_of_subnets($temp);

       echo $subnets;

    }




    function subnetaddress($ipaddress, $subnetmask){

       list($ip1,$ip2,$ip3,$ip4) = explode('.',$ipaddress);

       $ipbin = sprintf( "%08d", decbin($ip1)).sprintf( "%08d", decbin($ip2)).sprintf( "%08d", decbin($ip3)).sprintf( "%08d", decbin($ip4));

       for($i = 0 ; $i < $subnetmask ; $i++ ){
            $subnetmaskbin .=1;
       }

       for($j=0 ; $j < (32-$subnetmask) ; $j++ ){
            $subnetmaskbin .= 0 ;
       }

       $subnetaddress = $ipbin & $subnetmaskbin;

       $subnetadd = str_split($subnetaddress,8);

       return $subnetadd ;

    }


    function num_of_available_hosts($temp){

     return pow(2,(getFirstSetBitPos($temp)-1)) - 2;

    }

    function num_of_subnets($temp){

     return pow(2, (8 - getFirstSetBitPos($temp) + 1)) - 2 ;

    }

    function getFirstSetBitPos($n){

     return ceil(log(($n& -$n) + 1, 2));

    }




?>
