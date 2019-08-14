<?php
class Thecoderin_VatLayer_Helper_Data extends Mage_Core_Helper_Abstract {
	const VLURL = "http://apilayer.net/api/validate";
	public function validateVAT($apikey, $vatnum) {
		$request = self::VLURL."?access_key=".$apikey."&vat_number=".$vatnum;
		$ch = curl_init();
		curl_setopt_array($ch, array(
			CURLOPT_URL => $request,
			CURLOPT_HTTPHEADER => array('Accept: application/json'),
			CURLOPT_RETURNTRANSFER => true
		));
		$result = curl_exec($ch);
		curl_close($ch);
		Mage::log($result);
		return $result;
	}
}
	 