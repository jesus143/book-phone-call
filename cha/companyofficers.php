<?php
$query =   (!empty($_GET['term'])) ? $_GET['term'] : '09320475';
$query1 = rawurlencode ($query);
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.companieshouse.gov.uk/company/".$query1."/officers",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "authorization: Basic ZWplejhaa1ZZcUdRQjFOVkhheUQtS0ItOTVjWWh1ZTd1R1QtdDdURTo=",
    "cache-control: no-cache",
    "postman-token: b8f467ce-ed7b-9989-997c-bd23d85e430e"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $arr_json = json_decode($response, true);
    $i = 0;
    $ak = '';
    $counter = 1; 
    $arrs = array();
    $data = [];
     foreach ($arr_json['items'] as $key => $value) {  
      if (array_key_exists('resigned_on', $value)) {
         unset($arrs[$i]);
         $arrs[$i] = empty($arrs[$i]);
        } else if (((strpos($value['name'], 'LIMITED')) > -1) || ((strpos($value['name'], 'LTD')) > -1)) {
          unset($arrs[$i]);
          $arrs[$i] = empty($arrs[$i]);
        } else {
           $ak = array('namesss' => $value['name']);  
            $arrs[$i] = $ak;
            $data[] = $ak; 
          }
      $i++;
    }
    echo json_encode( $data );
}
?>