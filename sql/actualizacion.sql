CREATE TABLE IF NOT EXISTS `verifica_db`.`usuarios` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(64) NULL,
	`apellido` VARCHAR(64) NULL,
	`telefono` VARCHAR(16) NULL,
	`correo` VARCHAR(120) NULL,
	`log_correo` VARCHAR(120) NULL,
	`log_password` VARCHAR(32) NULL,
	`validado` INT NULL,
	`keymaster` VARCHAR(32) NULL,
	`estado` INT NULL,
	`creado` DATETIME NULL,
	`actualizado` DATETIME NULL,
	PRIMARY KEY (`id`)
)ENGINE = InnoDB;

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `telefono`, `correo`, `log_correo`, `log_password`, `provincia_id`, `localidad_id`, `validado`, `keymaster`, `estado`, `creado`, `actualizado`) VALUES
(1, 'Jonathan', 'Llamas', '2604513650', 'llamasjonat@gmail.com', 'demo@verificar.me', 'c514c91e4ed341f263e458d44b3bb0a7', 0, 0, 1, NULL, 1, '2019-07-08 20:07:25', '2019-07-08 20:07:25');


-- 11/07/2019
ALTER TABLE `usuarios` ADD `tipo` INT DEFAULT 2 AFTER `keymaster`;

-- 12/07/2018
ALTER TABLE `local` ADD `codigo` VARCHAR(16) DEFAULT NULL AFTER `id_sus`;

CREATE TABLE IF NOT EXISTS `verifica_db`.`cuenta` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_cliente` INT NOT NULL,
	`nombre` VARCHAR(128) NOT NULL,
	`keymaster` VARCHAR(256) DEFAULT NULL,
	`vencimiento_servicio` DATETIME DEFAULT NULL,
	`id_usuario` INT DEFAULT NULL,
	`estado` INT DEFAULT NULL,
	`creado` DATETIME DEFAULT NULL,
	`actualizado` DATETIME DEFAULT NULL,
	PRIMARY KEY (`id`)
)ENGINE = InnoDB;

ALTER TABLE `local` ADD `id_usuario` INT DEFAULT NULL AFTER `codigo`;

ALTER TABLE `empresa` ADD `id_usuario` INT DEFAULT NULL AFTER `nif`;
ALTER TABLE `empresa` ADD `id_cuenta` INT DEFAULT NULL AFTER `id_usuario`;

ALTER TABLE `local` ADD `id_cuenta` INT DEFAULT NULL AFTER `id`;

ALTER TABLE `cuenta` ADD `id_suscripcion` INT DEFAULT NULL AFTER `keymaster`;

-- 13/07/2019
ALTER TABLE `cuenta` ADD `suscripcion_periodo` INT NOT NULL AFTER `id_suscripcion`;