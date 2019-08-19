<?php
// 19.05.2019
/*CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `hotel_name` text NOT NULL,
  `hotel_address` text NOT NULL,
  `facilities` text NOT NULL,
  `hotel_category` int(11) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `room_rate_include_breakfast` double NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `hotel` ADD `room_rate_exclude_breakfast` DOUBLE NOT NULL AFTER `room_rate_include_breakfast`;

ALTER TABLE `hotel` CHANGE `status` `status` ENUM('ACTIVE','INACTIVE','DELETED') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'ACTIVE';*/

//----------------------------------------- DONE --------------------------------------------------//

// 25.05.2019
/*CREATE TABLE `users_admin` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phoneno` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `designation` enum('ADMIN') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `users_admin`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phoneno` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `designation` enum('ACCOUNTANT','SUPERVISOR') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;*/


/********************* 15.06.2019 ************************/
/*ALTER TABLE  `hotel` ADD  `city_id` INT( 11 ) NOT NULL AFTER  `hotel_address` ,
ADD  `country_id` INT( 11 ) NOT NULL AFTER  `city_id`;*/

/*ALTER TABLE  `hotel` ADD  `no_of_adult` INT( 11 ) NOT NULL AFTER  `room_rate_exclude_breakfast` ,
ADD  `no_of_child` INT( 11 ) NOT NULL AFTER  `no_of_adult`;*/

/*CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `key_id` int(11) NOT NULL,
  `key_type` enum('HOTEL') NOT NULL,
  `counts` int(11) NOT NULL,
  `amount` double NOT NULL,
  `status` enum('ACTIVE','MOVE','INACTIVE','DELETED') NOT NULL DEFAULT 'ACTIVE',
  `posted_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;*/

/*ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);*/

/*ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;*/

/*ALTER TABLE `cart` ADD `key_description` BLOB NOT NULL AFTER `key_type`;*/

/*ALTER TABLE `hotel` CHANGE `room_rate_include_breakfast` `breakfast` ENUM('YES','NO') NOT NULL DEFAULT 'YES';*/

/*ALTER TABLE `hotel` ADD `pernight_room_rate` DOUBLE NOT NULL AFTER `no_of_child`;*/

/*ALTER TABLE `hotel` CHANGE `breakfast` `breakfast` ENUM('include','exclude') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'include';*/

/*ALTER TABLE `cart` ADD `user_id` INT(11) NOT NULL AFTER `id`;*/

ALTER TABLE `users` ADD `wallet` DOUBLE NOT NULL AFTER `userstype`;

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `request_point` double NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `approved_point` double NOT NULL,
  `request_date` datetime NOT NULL,
  `approve_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

  ALTER TABLE `wallet` ADD `status` ENUM('REQUEST','APPROVED','DELETED') NOT NULL DEFAULT 'REQUEST' AFTER `approve_date`;
?>