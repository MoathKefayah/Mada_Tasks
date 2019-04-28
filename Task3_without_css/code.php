
<?php

$result="";

$totalstatus=0;

$domainexists='';

$totalstatusmobile='';

$beginmonth=date("Y-m-d",mktime(0,0,0,date("m"),date(1),date("y"))); 

$beginmonth=$beginmonth." 00:00:00";


 $prefixes = $_POST['prefix'];

 if(empty($prefixes))

  {
    echo("You didn't select any buildings.");
  }

  else{
    $N = count($prefixes);
    for($i=0; $i < $N-1; $i++)
    {
       $where .= " customer.username LIKE '$prefixes[$i]%' or" ;

    }

    $where .= " customer.username LIKE '". $prefixes[$N-1]."%' " ;       
    }



  $query = "select mobile,invoiceserial,customer.aflag,customer.username,totalbillvat from customer left join customerinvoice on customer.username=customerinvoice.username where customerinvoice.startdatebilling='$beginmonth' and paid='NO' and totalbillvat > 0  and cancelled='0' and customerinvoice.owner='system' and customer.sendsms='1' and ".$where." order by invoiceserial ;";

  echo $query ;

  die(0);

$counter=0;
$counternotvalid=0;

foreach ($data as $d){

    $mobile=$d['mobile'];

    $invoiceserial=$d['invoiceserial'];

    $username=$d['username'];

    $totalbillvat=$d['totalbillvat'];


    $message='نود اعلامك بان فاتورة الرقم # قد صدرت بقيمة $ شيكل،نعتز بثقتكم';

    $message=str_replace('#', $username, $message);

    $message=str_replace('$', $totalbillvat, $message);


    if(checkmobile($mobile)==false){
        echo "$username : $mobile not valid\n";
              $counternotvalid++;
        continue;
}
   addtosmsbuffer($username, $mobile, $message,1,"System");

    $counter++;


} 


echo "\n=============================================================\n";
echo "Number of messages added to buffer : $counter \n";
echo "Number of not valid mobiles        : $counternotvalid \n";

echo "==============================================================\n";      


function checkmobile($mobile){
   if(!is_numeric($mobile)){
              return false;
}
   if(strlen($mobile)!=10) return false;
   if(substr($mobile,0,2)!="05") return false;
   if(substr($mobile,4,10)=="000000") return false;

return true;


}

?>
