<?php



class SaskaitaSaskaitaModuleFrontController extends FrontController
{
	protected $display_header = false;
	protected $display_footer = false;

	public $content_only = true;

	protected $template;
	public $filename;
	

	public function display($id)
	{
	    require_once _PS_MODULE_DIR_ . 'saskaita/classes/pdf/HTMLTemplateCustomPdf.php';
	    $order=  new Order($id);
	
	    $address=$order->getCustomer()->getAddresses($this->context->language->id);
	    Context::getContext()->smarty->assign('address', $address);
	 
	   
	    $pdf = new PDF($order, 'CustomPdf', Context::getContext()->smarty);
	    $pdf->render(); 
	    
	}

}

