<?php
//$key previously generated safely, ie: openssl_random_pseudo_bytes
function encrypt($plaintext,$key){
	$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
	$iv = openssl_random_pseudo_bytes($ivlen);
	$ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
	$hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
	$ciphertext = base64_encode( $iv.$hmac.$ciphertext_raw );
	echo $ciphertext;
	return $ciphertext;
}
//decrypt later....
function decrypt($ciphertext,$key){
	$c = base64_decode($ciphertext);
	$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
	$iv = substr($c, 0, $ivlen);
	$hmac = substr($c, $ivlen, $sha2len=32);
	$ciphertext_raw = substr($c, $ivlen+$sha2len);
	$original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
	$calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
	return $original_plaintext;
}
if (hash_equals($hmac, $calcmac))//PHP 5.6+ timing attack safe comparison
{
    echo $original_plaintext."\n";
}
?>
parent directory index