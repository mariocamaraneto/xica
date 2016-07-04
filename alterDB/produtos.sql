ALTER TABLE `brechoxica_sys`.`produtos` 
DROP COLUMN `quantidade`,
ADD COLUMN `em_estoque` TINYTEXT NULL AFTER `fornecedor_id`;
