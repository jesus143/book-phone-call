<?php
$query =   (!empty($_GET['term'])) ? $_GET['term'] : 'a';
$query1 = rawurlencode ($query);
$arr = '';
$curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.companieshouse.gov.uk/search/companies?q="  . $query1,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "authorization: Basic ZWplejhaa1ZZcUdRQjFOVkhheUQtS0ItOTVjWWh1ZTd1R1QtdDdURTo=",
      "cache-control: no-cache",
      "postman-token: f22ef0c9-3100-efd1-edc3-971ce059946a"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 0);
  curl_close($curl);

  if ($err) {
    // echo "cURL Error #:" . $err;
  } else {
    $arr_json = json_decode($response, true);
    $i = 0;
    $ak = ''; 
    $counter = 1; 
    $arrs = array();   
      foreach ($arr_json['items'] as $key => $value) {    
        $company_status = 'dissolved';
        if((string)$value['company_status'] == $company_status) {
          //unset($arrs[$i]);
          $arrs[$i] = '';
        } else {
          $ak = array('label' => $value['title'], 'company_status' => $value['company_status'], 'company_number' => $value['company_number'], 'address_snippet' => $value['address_snippet']);  
          $arrs[$i] = $ak;
            if($counter >= 5) { break; } $counter++; 
          }
         $i++;
      }
    echo json_encode( $arrs );
  } 
?>