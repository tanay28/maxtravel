<?php
//------------------------------ 22.05.2019 -------------------------------------------------//
/*ALTER TABLE `users` ADD `activation_code` VARCHAR(200) NOT NULL AFTER `status`;
*/
/*ALTER TABLE `users` CHANGE `status` `status` ENUM('ACTIVE','INACTIVE','DELETED','') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'INACTIVE';*/
//------------------------------------- END --------------------------------------------------//


//----------------------------------- 23.05.2019 -------------------------------------------//
/*CREATE TABLE `maxtravel`.`forgot_password_log` ( `id` INT NOT NULL AUTO_INCREMENT , `user_id` INT NOT NULL , `user_code` TEXT NOT NULL , `status` ENUM('ACTIVE','INACTIVE','APPROVED','EXPIRED') NOT NULL , `start_date` DATETIME NOT NULL , `end_date` DATETIME NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;*/
//-------------------------------------- END ---------------------------------------------//






//------------------------------------ 25.05.2019 ---------------------------------//
// CREATE TABLE `maxtravel`.`currency` ( `id` INT NOT NULL AUTO_INCREMENT , `currency_id` VARCHAR(100) NOT NULL , `currency_name` VARCHAR(200) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
//----------------------------------------- END ----------------------------------//

//------------------------------- 26.05.2019 ------------------------------------//
/*INSERT into currency(currency_id,currency_name)values('USD','United States Dollars');
INSERT into currency(currency_id,currency_name)values('EUR','Euro');
INSERT into currency(currency_id,currency_name)values('THB','Thailand Baht');
INSERT into currency(currency_id,currency_name)values('INR','Indian Rupees');*/

/*ALTER TABLE `agents` CHANGE `country` `country` INT NOT NULL, CHANGE `city` `city` INT NOT NULL;*/

/*CREATE TABLE `maxtravel`.`timezone` ( `id` INT NOT NULL AUTO_INCREMENT , `timezone` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;*/

/*INSERT INTO timezone(timezone)values('KOLKATA');
INSERT INTO timezone(timezone)values('DELHI');
INSERT INTO timezone(timezone)values('SINGAPORE');*/

ALTER TABLE `agents` CHANGE `time_zone` `time_zone` INT NOT NULL;
//--------------------------------------- END ----------------------------------//


//---------------------- 14.06.2019 -----------------------//

CREATE TABLE `maxtravel`.`contact_info` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(200) NOT NULL , `email` VARCHAR(100) NOT NULL , `phone` TEXT NOT NULL , `msg` TEXT NOT NULL , `mail_status` ENUM('SENT','FAILED','','') NOT NULL , `created_at` DATETIME NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;


//------------------------- 15.06.2019 ---------------------//
CREATE TABLE `maxtravel`.`website_settings` ( `id` INT NOT NULL AUTO_INCREMENT , `contact_email` VARCHAR(200) NOT NULL NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

INSERT INTO `website_settings` (`id`, `contact_email`) VALUES (1, 'tmtanay56@gmail.com');
?>