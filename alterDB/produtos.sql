ALTER TABLE `brechoxica_sys`.`produtos` 
DROP COLUMN `quantidade`,
ADD COLUMN `em_estoque` 
TINYTEXT NULL AFTER `fornecedor_id`;


ALTER TABLE `brechoxica_sys`.`produtos` 
ADD COLUMN `tamanho` VARCHAR(15) NULL AFTER `em_estoque`;
