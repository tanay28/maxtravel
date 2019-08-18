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

/*ALTER TABLE `agents` CHANGE `time_zone` `time_zone` INT NOT NULL;*/
//--------------------------------------- END ----------------------------------//


//---------------------- 14.06.2019 -----------------------//

/*CREATE TABLE `maxtravel`.`contact_info` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(200) NOT NULL , `email` VARCHAR(100) NOT NULL , `phone` TEXT NOT NULL , `msg` TEXT NOT NULL , `mail_status` ENUM('SENT','FAILED','','') NOT NULL , `created_at` DATETIME NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;*/


//------------------------- 15.06.2019 ---------------------//
/*CREATE TABLE `maxtravel`.`website_settings` ( `id` INT NOT NULL AUTO_INCREMENT , `contact_email` VARCHAR(200) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;*/

/*INSERT INTO `website_settings` (`id`, `contact_email`) VALUES (1, 'tmtanay56@gmail.com');*/


//-------------------- 19.06.2019 -------------------//
// CREATE TABLE `maxtravel`.`api_log` ( `id` INT NOT NULL AUTO_INCREMENT , `api_name` VARCHAR(100) NOT NULL , `user_id` VARCHAR(100) NOT NULL , `called_at` DATETIME NOT NULL , `api_res` TEXT NOT NULL , `status` ENUM('success','error','','') NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

//---------------------- 27.06.19 -------------------------//
// CREATE TABLE `maxtravel`.`query` ( `id` INT NOT NULL AUTO_INCREMENT , `agent_id` INT NOT NULL , `title` TEXT NOT NULL , `date_created` DATETIME NOT NULL , `status` ENUM('OPEN','RESOLVED','CLOSED','') NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

// CREATE TABLE `maxtravel`.`notification` ( `id` INT NOT NULL AUTO_INCREMENT , `key_id` INT NOT NULL , `key_type` VARCHAR(200) NOT NULL , `title` TEXT NOT NULL , `sender_id` INT NOT NULL , `receiver_id` INT NOT NULL , `status` ENUM('UNREAD','READ','DELETED','') NOT NULL , `date_created` DATETIME NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;


//----------------------- 03-08-2019 ----------------------//
/*CREATE TABLE `maxtravel`.`contents` ( `id` INT NOT NULL AUTO_INCREMENT , `slider_name` VARCHAR(200) NOT NULL , `tag_name` VARCHAR(200) NOT NULL , `slider_details` VARCHAR(200) NOT NULL , `image_name` VARCHAR(200) NOT NULL , `date_created` DATETIME NOT NULL , `last_modified` DATETIME NOT NULL , `status` VARCHAR(200) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;*/

/*ALTER TABLE `contents` ADD `slider_for` VARCHAR(200) NOT NULL AFTER `image_name`;*/


//--------------------------------- 11.08.2019 ---------------------------//

/*CREATE TABLE `dynamic_content` (
    `id` int(11) NOT NULL,
    `content_id` int(11) NOT NULL,
    `content` longblob NOT NULL,
    `image_gallery` varchar(200) NOT NULL,
    `map_location` varchar(200) NOT NULL,
    `date_created` datetime NOT NULL,
    `date_modified` datetime NOT NULL
  );
  ALTER TABLE `dynamic_content`
  ADD PRIMARY KEY (`id`);
  ALTER TABLE `dynamic_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;*/
?>