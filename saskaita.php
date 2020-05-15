<?php
    if(!defined('_PS_VERSION_'))
        exit();

      require_once(dirname(__FILE__). '/classes/catalog.php');


  	class saskaita extends Module{
       public $id;

      public function __construct(){
            $this->name = 'saskaita';
            $this->tab = 'front_office_features';
            $this->version = '1.0.0';
            $this->author = 'tadas budrys';
            $this->need_instance = 0;
            $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
            $this->bootstrap = true;

            parent::__construct();

            $this->displayName = $this->l('Saskaitas');
            $this->description = $this->l('Automatizuotas sakitu israsinejimas.');

            $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

            if (!Configuration::get('Saskaita'))
              $this->warning = $this->l('No name provided');
        }

        // public function install()
    		// {
    		// 	if (!parent::install())
    		// 		return false;

    		// 	if(!$this->registerHook('displayCustomerAccount') || !$this->registerHook('displayOrderDetail'))
    		// 		return false;

    		// 	return true;
        // }
        public function install()
{
    if (Shop::isFeatureActive()) {
        Shop::setContext(Shop::CONTEXT_ALL);
    }
        return parent::install() &&
        $this->registerHook('displayCustomerAccount') &&
        $this->registerHook('displayOrderDetail') &&
        Configuration::updateValue('saskaita', 'Saskaita');
}

        public function uninstall()
        {
          if (!parent::uninstall())
            return false;
          return true;
        }
        public function hookDisplayOrderDetail($params){
            // $this->context->smarty->assign('link',$this->context->link);
            //  return $this->display(__FILE__, 'mygtukas.tpl');

            return print_r('hook');
            }

    }
