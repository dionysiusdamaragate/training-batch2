<?php
                        
   $urlproduct="local.freshmage.com/rest/V1/products/MJ01";
   $urltoken="local.freshmage.com/rest/V1/integration/admin/token?";
   $username="admin";
   $password="Antonagape";
    
   $ch = curl_init();
   $data = array("username" => $username, "password" => $password);
   $data_string = json_encode($data);
   
   $ch = curl_init($urltoken);
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
   curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_HTTPHEADER, array(
   'Content-Type: application/json',
   'Content-Length: ' . strlen($data_string))
   );
   $token = curl_exec($ch);
   echo $token;
   
?>