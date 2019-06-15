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
ALTER TABLE  `hotel` ADD  `city_id` INT( 11 ) NOT NULL AFTER  `hotel_address` ,
ADD  `country_id` INT( 11 ) NOT NULL AFTER  `city_id`;

ALTER TABLE  `hotel` ADD  `no_of_adult` INT( 11 ) NOT NULL AFTER  `room_rate_exclude_breakfast` ,
ADD  `no_of_child` INT( 11 ) NOT NULL AFTER  `no_of_adult`;


?>