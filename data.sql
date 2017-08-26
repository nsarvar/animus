CREATE TABLE `apartment` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`move_in_date` DATE NOT NULL,
	`street` varchar(250) NOT NULL,
	`postcode` varchar(10) NOT NULL,
	`town` varchar(250) NOT NULL,
	`country` varchar(250) NOT NULL,
	`email` varchar(250) NOT NULL,
	PRIMARY KEY (`id`)
);

