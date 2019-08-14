<?php
class Ravi_Testimonials_Block_Adminhtml_Testimonial_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("testimonials_form", array("legend"=>Mage::helper("testimonials")->__("Item information")));


						$fieldset->addField("customer_id", "text", array(
						"label" => Mage::helper("testimonials")->__("Customer Id"),					
						"name" => "customer_id",
						));



						 $fieldset->addField('status', 'select', array(
						'label'     => Mage::helper('testimonials')->__('Enabled??'),
						'values'   => Ravi_Testimonials_Block_Adminhtml_Testimonial_Grid::getValueArray5(),
						'name' => 'status',
						));				


				
						$fieldset->addField("firstname", "text", array(
						"label" => Mage::helper("testimonials")->__("First Name"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "firstname",
						));
					
						$fieldset->addField("lastname", "text", array(
						"label" => Mage::helper("testimonials")->__("Last Name"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "lastname",
						));
					
						$fieldset->addField("email", "text", array(
						"label" => Mage::helper("testimonials")->__("Email Id"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "email",
						));
					
						$fieldset->addField("phonenumber", "text", array(
						"label" => Mage::helper("testimonials")->__("Phone Number"),
						"name" => "phonenumber",
						));
									
						 $fieldset->addField('rating', 'select', array(
						'label'     => Mage::helper('testimonials')->__('Rating'),
						'values'   => Ravi_Testimonials_Block_Adminhtml_Testimonial_Grid::getValueArray4(),
						'name' => 'rating',
						));				
						$fieldset->addField('photo', 'image', array(
						'label' => Mage::helper('testimonials')->__('Photo'),
						'name' => 'photo',
						'note' => '(*.jpg, *.png, *.gif)',
						));
						$fieldset->addField("video", "textarea", array(
						"label" => Mage::helper("testimonials")->__("Video"),
						"name" => "video",
						));
					
						$fieldset->addField("comments", "textarea", array(
						"label" => Mage::helper("testimonials")->__("Comments"),
						"class" => "required-entry",
						"name" => "comments",
						));
					

				if (Mage::getSingleton("adminhtml/session")->getTestimonialData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getTestimonialData());
					Mage::getSingleton("adminhtml/session")->setTestimonialData(null);
				} 
				elseif(Mage::registry("testimonial_data")) {
				    $form->setValues(Mage::registry("testimonial_data")->getData());
				}
				return parent::_prepareForm();
		}
}
