<?php

class Ravi_Testimonials_Block_Adminhtml_Testimonial_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("testimonialGrid");
				$this->setDefaultSort("id");
				$this->setDefaultDir("ASC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("testimonials/testimonial")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("id", array(
				"header" => Mage::helper("testimonials")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "id",
				));

				$this->addColumn("customer_id", array(
				"header" => Mage::helper("testimonials")->__("Customer Id"),
				"index" => "customer_id",
				));

                
				$this->addColumn("firstname", array(
				"header" => Mage::helper("testimonials")->__("First Name"),
				"index" => "firstname",
				));
				$this->addColumn("lastname", array(
				"header" => Mage::helper("testimonials")->__("Last Name"),
				"index" => "lastname",
				));
				$this->addColumn("email", array(
				"header" => Mage::helper("testimonials")->__("Email Id"),
				"index" => "email",
				));
				$this->addColumn("phonenumber", array(
				"header" => Mage::helper("testimonials")->__("Phone Number"),
				"index" => "phonenumber",
				));
						$this->addColumn('rating', array(
						'header' => Mage::helper('testimonials')->__('Rating'),
						'index' => 'rating',
						'type' => 'options',
						'options'=>Ravi_Testimonials_Block_Adminhtml_Testimonial_Grid::getOptionArray4(),				
						));
				
				
						$this->addColumn('status', array(
						'header' => Mage::helper('testimonials')->__('Status'),
						'index' => 'status',
						'type' => 'options',
						'options'=>Ravi_Testimonials_Block_Adminhtml_Testimonial_Grid::getOptionArray5(),				
						));
				
				
										
		 $this->addRssList('testimonials/adminhtml_rss_rss/testimonial', Mage::helper('testimonials')->__('RSS'));
			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV')); 
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('id');
			$this->getMassactionBlock()->setFormFieldName('ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_testimonial', array(
					 'label'=> Mage::helper('testimonials')->__('Remove Testimonial'),
					 'url'  => $this->getUrl('*/adminhtml_testimonial/massRemove'),
					 'confirm' => Mage::helper('testimonials')->__('Are you sure?')
				));
			return $this;
		}
			
		static public function getOptionArray4()
		{
            $data_array=array(); 
			$data_array[0]='Good';
			$data_array[1]='Very Good';
			$data_array[2]='Bad';
            return($data_array);
		}

		static public function getOptionArray5()
		{
            $data_array=array(); 
			$data_array[0]='Enable';
			$data_array[1]='Disable';
            return($data_array);
		}


		static public function getValueArray4()
		{
            $data_array=array();
			foreach(Ravi_Testimonials_Block_Adminhtml_Testimonial_Grid::getOptionArray4() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}



		static public function getValueArray5()
		{
            $data_array=array();
			foreach(Ravi_Testimonials_Block_Adminhtml_Testimonial_Grid::getOptionArray5() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}

		

}