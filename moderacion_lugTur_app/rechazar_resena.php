<?php
//Using GET
$var_value = $_GET['varname'];

$postdata = array ( 
    "id_review" => $var_value 
);

echo 'Has rechazado la reseña: '.$var_value.'';
print_r($postdata);

$postdata = json_encode($postdata);
echo $postdata;
$url ="http://localhost/apiRest/public/rechazar_resena";
$curl = curl_init($url);

//curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt( $curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
$postResult = curl_exec($curl); 

if (curl_errno($curl)) { 
   print curl_error($curl); 
} 
curl_close($curl); 
echo "<pre> $postResult</pre>";

echo "Reseña rechazada.";
?>

<a href="resena_rechazada.php">
<input name="submit" type="submit" value="Volver" class="btn solid" />