<?php
class Thecoderin_VatLayer_Model_Vatlayer {
	const LOG = 'thecoderin_vatlayer.log';
	const API = 'thecoderin/thecoderin_vatlayer/apikey';

	public function VATcheck($vat) {
		$output = array();
		if (empty($vat)) {
			Mage::log ("VAT Field is Empty", NULL, self::LOG);
			$output = array('status'=>0, 'msg'=> 'VAT field is NULL');
		} else {
			$apikey = Mage::getStoreConfig(self::API, Mage::app()->getStore());
			if (empty(trim($apikey))) {
				Mage::log ("API Key Missing", NULL, self::LOG);
				$output = array('status'=>1, 'msg'=> 'Missing API Key');
			} else{
				$response = Mage::helper('vatlayer')->validateVAT($apikey, $vat);
				$respObj = json_decode($response);
				if ($respObj->valid == true) {
					$msg = "Success";
				} else {
					$msg = "Invalid VAT Number. Should include the country code along with the VAT number(Eg.GBxxxxxxxxx).";
				}
				$output = array(
					'status' => $respObj->valid?1:0,
					'vat' => $respObj->query,
					'msg' => $msg,
					'company' => $respObj->company_name
				);
			}
		}
		return $output;
	}
}