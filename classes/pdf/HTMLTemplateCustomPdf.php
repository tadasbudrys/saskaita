<?php
/**
 * 2007-2015 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 *  @author 	PrestaShop SA <contact@prestashop.com>
 *  @copyright  2007-2015 PrestaShop SA
 *  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */

/**
 *
 */
class HTMLTemplateCustomPdf extends HTMLTemplate
{
	public $order;
	public $available_in_your_account = false;

	/**
	 * @param OrderInvoice $order_invoice
	 * @param $smarty
	 * @throws PrestaShopException
	 */
	public function __construct($custom_object, $smarty)
	{
		$this->custom_model = $custom_object;
		$this->smarty = $smarty;

		$id_lang = Context::getContext()->language->id;
		$this->title = HTMLTemplateCustomPdf::l('Custom Title');
		// footer informations
		$this->shop = new Shop(Context::getContext()->shop->id);
	}

	/**
	 * Returns the template's HTML header
	 *
	 * @return string HTML header
	 */
	public function getHeader()
	{
		$this->assignCommonHeaderData();
		$this->smarty->assign(array(
			'header' => $this->l('Modulis'),
			'adresas' => Configuration::get('BLOCKCONTACTINFOS_ADDRESS'),
			'telefonas' => Configuration::get('BLOCKCONTACTINFOS_PHONE'),
			'email' => Configuration::get('BLOCKCONTACTINFOS_EMAIL'),
		));
		//return $this->smarty->fetch($this->getTemplate('header'));
		return $this->smarty->fetch(_PS_MODULE_DIR_ . 'saskaita/views/templates/front/header_catalog.tpl');
	}

	/**
	 * Returns the template's HTML content
	 *
	 * @return string HTML content
	 */
	public function getContent()
	{
        $katalogs = Catalog::getDataKatalog();


		$this->smarty->assign(array(
			'katalogs' => $katalogs,

            'order' => $this->custom_model,
        ));

        return $this->smarty->fetch(_PS_MODULE_DIR_ . 'saskaita/views/templates/front/content_catalog.tpl');
	}

	/**
	 * Returns the template filename when using bulk rendering
	 *
	 * @return string filename
	 */
	public function getBulkFilename()
	{
		return 'CustomPdf.pdf';
	}

	/**
	 * Returns the template filename
	 *
	 * @return string filename
	 */
	public function getFilename()
	{
		return 'CustomPdf.pdf';
	}
}
