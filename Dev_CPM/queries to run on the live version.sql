ALTER TABLE `tbl_villageagent_groups` ADD `dateGroupStarted` DATE NOT NULL AFTER `groupCode`;

ALTER TABLE `tbl_farmers` ADD `memberDstart` DATE NOT NULL AFTER `farmersName`;

ALTER TABLE `tbl_farmers` ADD `memberStatus` varchar(50) NOT NULL AFTER `memberDstart`;


ALTER TABLE `tbl_farmers` ADD `hhName` varchar(255) NOT NULL AFTER `farmersTel`;

ALTER TABLE `tbl_farmers` ADD `hhAge` int(255) NOT NULL AFTER `hhName`;

ALTER TABLE `tbl_farmers` ADD `hhSex` varchar(50) NOT NULL AFTER `hhAge`;

ALTER TABLE `tbl_farmers` ADD `hhStatus` varchar(50) NOT NULL AFTER `hhSex`;

ALTER TABLE `tbl_farmers` ADD `hsComposition` varchar(50) NOT NULL AFTER `hhStatus`;

ALTER TABLE `tbl_farmers` CHANGE `farmers_e_pay` `farmers_e_pay` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'n/a';
