CREATE TABLE IF NOT EXISTS `dnt_basket` (
  `id` int(11) NOT NULL,
  `id_entity` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `user_id` varchar(300) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id_entity` varchar(300) NOT NULL,
  `count` int(11) NOT NULL,
  `datetime_creat` datetime NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;