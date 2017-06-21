<?php
////////////////////////////////////////////////////////////////////////
// index.phpの検索フォームのキーワードからAmazon APIでRequest URLを生成する //
////////////////////////////////////////////////////////////////////////

$search_bname = $_GET['search_bname'];

// AmazonのProduct Advertising APIの呼び出し
// AWS Access Key IDの入力
$aws_access_key_id = "XXXXXXXXXXXXXXXXXXXX"; // AWSのアクセスキーを入力してください

// AWS Secret Keyの入力
$aws_secret_key = "XXXXXXXXXXXXXXXXXXXXXXXX"; // AWSのシークレットキーを入力してください

// The region you are interested in
$endpoint = "webservices.amazon.co.jp";

$uri = "/onca/xml";

$params = array(
    "Service" => "AWSECommerceService",
    "Operation" => "ItemSearch",
    "AWSAccessKeyId" => $aws_access_key_id, // アクセスキーを入力してください
    "AssociateTag" => "XXXXXXXXXXXXX",         // IDを入力してください
    "SearchIndex" => "Books",
    "Keywords" => $search_bname,                // 本の名前(検索キーワードから連携)
    "ResponseGroup" => "Images,Medium"
);

// Set current timestamp if not set
if (!isset($params["Timestamp"])) {
    $params["Timestamp"] = gmdate('Y-m-d\TH:i:s\Z');
}

// Sort the parameters by key
ksort($params);

$pairs = array();

foreach ($params as $key => $value) {
    array_push($pairs, rawurlencode($key)."=".rawurlencode($value));
}

// Generate the canonical query
$canonical_query_string = join("&", $pairs);

// Generate the string to be signed
$string_to_sign = "GET\n".$endpoint."\n".$uri."\n".$canonical_query_string;

// Generate the signature required by the Product Advertising API
$signature = base64_encode(hash_hmac("sha256", $string_to_sign, $aws_secret_key, true));

// Generate the signed URL
$request_url = 'http://'.$endpoint.$uri.'?'.$canonical_query_string.'&Signature='.rawurlencode($signature);

//AmazonへのリクエストURL確認用


?>