ALTER TABLE `users` ADD `activation_code` VARCHAR(200) NOT NULL AFTER `status`;

ALTER TABLE `users` CHANGE `status` `status` ENUM('ACTIVE','INACTIVE','DELETED','') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'INACTIVE';