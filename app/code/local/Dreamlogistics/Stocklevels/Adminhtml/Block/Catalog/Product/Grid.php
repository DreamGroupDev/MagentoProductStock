<?php
class Dreamlogistics_Stocklevels_Adminhtml_Block_catalog_Product_Grid extends Mage_Adminhtml_Block_Catalog_Product_Grid
 {
	protected function _prepareColumns()
	{
		$this->addColumn('Dreamlogistics', array(
			'header' => 'DL lagersaldo',
			'type'  => 'number',
			'align' => 'right',
			'width' => '50px',
			'index' => 'sku',
			'renderer' => 'Dreamlogistics_Stocklevels_Block_Adminhtml_Template_Grid_Renderer_Lagersaldo'
		));
		$this->addColumnsOrder('Dreamlogistics', 'qty');
		return parent::_prepareColumns();
	}
 }
?>