<?php
class catalog extends ObjectModel
{

    public static $definition = array(
      
    );
	public static function getDataKatalog()
	{
		$katalog = Db::getInstance()->executeS('
		SELECT a.`id_product`, b.`name` AS `name`, b.`link_rewrite` AS `link`, `reference`, a.`price` AS `price`, sa.`active` AS `active` , shop.`name` AS `shopname`, a.`id_shop_default`, image_shop.`id_image` AS `id_image`, cl.`name` AS `name_category`, sa.`price`, 0 AS `price_final`, a.`is_virtual`, pd.`nb_downloadable`, sav.`quantity` AS `sav_quantity`, sa.`active`, IF(sav.`quantity`<=0, 1, 0) AS `badge_danger` FROM `ps_product` a LEFT JOIN `ps_product_lang` b ON (b.`id_product` = a.`id_product` AND b.`id_lang` = 1 AND b.`id_shop` = 1) LEFT JOIN `ps_stock_available` sav ON (sav.`id_product` = a.`id_product` AND sav.`id_product_attribute` = 0 AND sav.id_shop = 1 AND sav.id_shop_group = 0 ) JOIN `ps_product_shop` sa ON (a.`id_product` = sa.`id_product` AND sa.id_shop = a.id_shop_default) LEFT JOIN `ps_category_lang` cl ON (sa.`id_category_default` = cl.`id_category` AND b.`id_lang` = cl.`id_lang` AND cl.id_shop = a.id_shop_default) LEFT JOIN `ps_shop` shop ON (shop.id_shop = a.id_shop_default) LEFT JOIN `ps_image_shop` image_shop ON (image_shop.`id_product` = a.`id_product` AND image_shop.`cover` = 1 AND image_shop.id_shop = a.id_shop_default) LEFT JOIN `ps_image` i ON (i.`id_image` = image_shop.`id_image`) LEFT JOIN `ps_product_download` pd ON (pd.`id_product` = a.`id_product`) WHERE 1 ORDER BY a.`id_product` ASC LIMIT 0, 50');
		return $katalog;
	}
}