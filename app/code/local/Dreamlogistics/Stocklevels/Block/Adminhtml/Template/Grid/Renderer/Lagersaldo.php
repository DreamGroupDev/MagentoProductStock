<?php
class Dreamlogistics_Stocklevels_Block_Adminhtml_Template_Grid_Renderer_Lagersaldo extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
	public function render(Varien_Object $row)
	{
		return $this->_getValue($row);
	}
	protected function _getValue(Varien_Object $row)
	{
		$SKU = $row->getData($this->getColumn()->getIndex());
		
		//Hämta korrekt värde från DL
		$username = Mage::getStoreConfig('dream/general/dl_username');
		$password = Mage::getStoreConfig('dream/general/dl_userpass');
		$partnerid = Mage::getStoreConfig('dream/general/dl_userid');
		
		$client = new SoapClient('http://service.dreamlogistics.se/service.svc?wsdl');
		$response = $client->GetInventory(array( "Credentials" => array("UserName" => $username, "Password" => $password, "PartnerId" => $partnerid), "ProductNumber" => $SKU));
		
		$val = $response->GetInventoryResult->Items->Item->Quantity;
		return $val;
	}
}
?>