<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-10-20 10:53:24 --> Query error: Illegal mix of collations (latin1_swedish_ci,IMPLICIT) and (utf8_general_ci,COERCIBLE) for operation 'like' - Invalid query: SELECT `a`.*, `b`.`title` as `sub_category`, `c`.`title` as `category`
FROM `products` `a`
JOIN `products_sub_category` `b` ON `a`.`products_sub_category_id`=`b`.`id`
JOIN `products_category` `c` ON `b`.`product_category_id`=`c`.`id`
WHERE `a`.`flag` =0
AND (`a`.`title` like '%เครื่องแคปซูน%' or `a`.`excerpt` like '%เครื่องแคปซูน%')
ERROR - 2018-10-20 10:53:24 --> Severity: error --> Exception: Call to a member function result_array() on boolean /var/www/html/nestleprofessional_co_id/application/controllers/Page.php 220
