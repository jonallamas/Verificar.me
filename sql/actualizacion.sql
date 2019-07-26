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
CREATE TABLE IF NOT EXISTS `verifica_db`.`cuenta` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_cliente` INT NOT NULL,
	`keymaster` VARCHAR(256) DEFAULT NULL,
	`id_suscripcion` INT DEFAULT NULL,
	`suscripcion_periodo` INT NOT NULL,
	`vencimiento_servicio` DATETIME DEFAULT NULL,
	`estado` INT DEFAULT NULL,
	`creado` DATETIME DEFAULT NULL,
	`actualizado` DATETIME DEFAULT NULL,
	PRIMARY KEY (`id`)
)ENGINE = InnoDB;

-- 16/07/2019
CREATE TABLE IF NOT EXISTS `verifica_db`.`establecimiento` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`nombre` varchar(64) NOT NULL,
	`id_cuenta` INT DEFAULT NULL,
	`direccion` varchar(100) DEFAULT NULL,
	`id_ciudad` decimal(3,0) DEFAULT NULL,
	`id_provincia` decimal(2,0) DEFAULT NULL,
	`id_cp` decimal(5,0) NOT NULL,
	`codigo` VARCHAR(16) DEFAULT NULL,
	`id_usuario` INT DEFAULT NULL,
	`fecha_registro` datetime DEFAULT NULL,
	`estado` int(11) DEFAULT NULL,
	PRIMARY KEY (`id`)
)ENGINE = InnoDB;

ALTER TABLE `empresa` ADD `codigo` VARCHAR(16) DEFAULT NULL AFTER `id_cuenta`;

-- 22/07/2019
ALTER TABLE `establecimiento` ADD `id_empresa` INT NOT NULL AFTER `id_cuenta`;

ALTER TABLE `suscripcion` ADD `cant_empresas` INT NOT NULL AFTER `descripcion`;
ALTER TABLE `suscripcion` ADD `cant_establecimientos` INT NOT NULL AFTER `cant_empresas`;
ALTER TABLE `suscripcion` ADD `cant_empleados` INT NOT NULL AFTER `cant_establecimientos`;

INSERT INTO `suscripcion` (`id`, `nombre`, `descripcion`, `cant_empresas`, `cant_establecimientos`, `cant_empleados`, `precio`, `estado`) VALUES
(1, 'Básico', 'Esta es una pequeña descripción provisional', 1, 1, 3, '9.99', 1),
(2, 'Pro', 'Esta es una pequeña descripción provisional', 2, 3, 5, '24.99', 1),
(3, 'Ultra', 'Esta es una pequeña descripción provisional', 3, 5, 10, '49.99', 1);

CREATE TABLE IF NOT EXISTS `verifica_db`.`establecimiento_usuarios` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_cuenta` INT NOT NULL,
	`id_establecimiento` INT NOT NULL,
	`id_usuario` INT NOT NULL,
	`tipo` INT DEFAULT NULL,
	`estado` INT DEFAULT NULL,
	`creado` DATETIME DEFAULT NULL,
	`actualizado` DATETIME DEFAULT NULL,
	PRIMARY KEY (`id`)
)ENGINE = InnoDB;

-- 24/07/2019
ALTER TABLE `usuarios` ADD `dni` VARCHAR(16) NOT NULL AFTER `telefono`;