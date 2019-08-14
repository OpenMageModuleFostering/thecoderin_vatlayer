<?php
class Thecoderin_VatLayer_AjaxController extends Mage_Core_Controller_Front_Action {
	public function indexAction(){
		$vatnum = preg_replace('/\s+/', '',$this->getRequest()->getParam('vat'));
		$model = Mage::getModel('vatlayer/vatlayer');
		print json_encode($model->VATcheck($vatnum)); exit;
	}
}