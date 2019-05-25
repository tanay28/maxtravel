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
?>