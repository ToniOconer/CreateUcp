
CREATE TABLE `ucp` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ucp_name` VARCHAR(24) NOT NULL,
  `discordid` VARCHAR(64) NOT NULL,
  `pin_code` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`ucp_name`)
);
