<?php
	

 $prefixes_file = file_get_contents('prefixes.txt');
 
 $prefixes = preg_split("/[\s]+/", $prefixes_file);
 
  //$prefixes = ['222','223','224','227','925','924','928','929','821','822','826','828','829','422','421','420','424'];


    if(isset($_POST['handlecity'])){

          $city = $_POST['city'];

          $pre_selected = [];

          switch ($city) {
                case 'Ramallah':
                        for ($i=0; $i < count($prefixes); $i++) {
                                if(startsWith($prefixes[$i],'2')){
                        array_push($pre_selected, $prefixes[$i]);
                                }
                        }
                        break;
                case 'Nablus':
                        for ($i=0; $i < count($prefixes); $i++) {
                                if(startsWith($prefixes[$i],'9')){
                        array_push($pre_selected, $prefixes[$i]);
                                }
                        }
                        break;
                case 'Gaza':
                        for ($i=0; $i < count($prefixes); $i++) {
                                if(startsWith($prefixes[$i],'8')){
                        array_push($pre_selected, $prefixes[$i]);
                                }
                        }
                        break;
                case 'Jinin':
                        for ($i=0; $i < count($prefixes); $i++) {
                                if(startsWith($prefixes[$i],'4')){
                        array_push($pre_selected, $prefixes[$i]);
                                }
                        }
                        break;

                }

                echo json_encode($pre_selected) ;


        }

         function startsWith ($string, $startString)
           {
            $len = strlen($startString);
            return (substr($string, 0, $len) === $startString);
           }




?>

