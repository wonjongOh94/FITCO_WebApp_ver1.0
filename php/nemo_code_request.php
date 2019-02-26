<?
$sMallID = 'nemocommerce';
$sClientID = '4RC0sgKHKhJpQzCqcoKmHA';
$sAuthCodeReceiveUrl = 'https://nemocommerce.cafe24.com';
$sScope = 'mall.read_product,mall.write_product,mall.read_category,mall.read_order,mall.write_order,mall.read_collection';
$aState = array(
    'mall_id'    => $sMallID,
);

$sAuthCodeRequestUrl = "https://nemocommerce.cafe24api.com/api/v2/oauth/authorize?";
$aRequestData = array(
    'response_type'=>'code',
    'client_id'=>$sClientID,
    'state'=> base64_encode(json_encode($aState)),
    'redirect_uri'=> $sAuthCodeReceiveUrl,
    'scope'=> $sScope,
);

$sUrl = $sAuthCodeRequestUrl . http_build_query($aRequestData);
$channel = curl_init();
curl_setopt($channel, CURLOPT_POST,				0);
curl_setopt($channel, CURLOPT_URL,				$sUrl);
curl_setopt($channel, CURLOPT_RETURNTRANSFER,	1);
$content = curl_exec($channel);


header('Location: ' . $sUrl);
exit;

?>


