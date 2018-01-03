Para arreglar el cagadero:
use aplicat8_cevideo;
alter table `hoteles` change `ip-code` `ipcode` int(5);
ALTER TABLE `hoteles` ADD `version` INT(5) NOT NULL AFTER `ipcode`;
UPDATE hoteles SET version = 0;
