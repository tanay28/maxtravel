ALTER TABLE `users` ADD `activation_code` VARCHAR(200) NOT NULL AFTER `status`;

ALTER TABLE `users` CHANGE `status` `status` ENUM('ACTIVE','INACTIVE','DELETED','') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'INACTIVE';

CREATE TABLE `maxtravel`.`forgot_password_log` ( `id` INT NOT NULL AUTO_INCREMENT , `user_id` INT NOT NULL , `user_code` TEXT NOT NULL , `status` ENUM('ACTIVE','INACTIVE','APPROVED','EXPIRED') NOT NULL , `start_date` DATETIME NOT NULL , `end_date` DATETIME NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;