ALTER TABLE `brechoxica_sys`.`vendas` 
DROP FOREIGN KEY `fk_vendas_clientes1`;
ALTER TABLE `brechoxica_sys`.`vendas` 
CHANGE COLUMN `data` `data` VARCHAR(45) NOT NULL ,
CHANGE COLUMN `total` `total` DECIMAL(10,2) NOT NULL ,
CHANGE COLUMN `desconto` `desconto` VARCHAR(45) NOT NULL ,
CHANGE COLUMN `cliente_id` `cliente_id` INT(11) NULL ;
CHANGE COLUMN `desconto` `desconto` DECIMAL(10,2) NOT NULL ;
ALTER TABLE `brechoxica_sys`.`vendas` 
ADD CONSTRAINT `fk_vendas_clientes1`
  FOREIGN KEY (`cliente_id`)
  REFERENCES `brechoxica_sys`.`clientes` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;




ALTER TABLE `brechoxica_sys`.`vendas` 
ADD COLUMN `cancelada` TINYINT NULL DEFAULT 0 AFTER `funcionarios_id`;

