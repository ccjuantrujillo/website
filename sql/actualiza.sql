USE `cancionero`;

CREATE TABLE IF NOT EXISTS `rol` (
  `ROL_Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `ROL_Descripcion` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ROL_FechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ROL_FechaModificacion` datetime DEFAULT NULL,
  `ROL_FlagEstado` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  PRIMARY KEY (`ROL_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `rol` (`ROL_Codigo`, `ROL_Descripcion`, `ROL_FechaRegistro`, `ROL_FechaModificacion`, `ROL_FlagEstado`) VALUES
	(1, 'Administrador', '2020-06-23 23:27:22', NULL, '1'),
	(2, 'Cotizador', '2020-07-09 21:17:29', NULL, '1'),
	(3, 'Asistente', '2020-06-23 23:27:22', NULL, '1');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ROL_Codigo` int(11) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `FK_users_rol` (`ROL_Codigo`),
  CONSTRAINT `FK_users_rol` FOREIGN KEY (`ROL_Codigo`) REFERENCES `rol` (`ROL_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `ROL_Codigo`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(6, 1, 'Martin Trujillo Bustamante', 'martin.trujillo@uni.pe', NULL, '$2y$10$l4MY6hm3RouXwKlVTQwN5.pyyxmfZSqIFccF05zovY26lpxYTLoM6', NULL, '2020-09-14 22:21:18', '2020-09-15 16:19:17'),
	(7, 1, 'Edward Figueroa', 'edward.figueroa@uni.pe', NULL, '$2y$10$p1jtAToBllIz8S7jb0bfW.LHhdH8dubiVF3b0QApy3GZtCm04l9z2', NULL, '2020-09-15 16:21:18', '2020-09-15 16:21:18'),
	(8, 1, 'Diego Ferrer', 'reshinger@gmail.com', NULL, '$2y$10$xWEKuWVJmpDd.UA3SENcz.Qi6dMFabIui9lfVbLDkAx4QSjzvZMF6', NULL, '2020-11-04 15:38:57', '2020-11-04 15:38:57'),
	(9, 2, 'Pier', 'Black@gmail.com', NULL, 'qweasdzxc', NULL, '2020-11-04 17:01:20', '2020-11-04 17:01:20'),
	(10, 1, 'Laravel 8', 'panaca@gmail.com', NULL, 'eyJpdiI6Ik5GVTB4TEx1SGlsdWZ6MklxU25CQnc9PSIsInZhbHVlIjoiZ2J0Ykl3d3hBUENuZmRTc0w0UWNqUT09IiwibWFjIjoiNGM1MmRiM2RhZTQzNjU3Zjk5OGEzYTQxMDYyZDU5MTQ3N2QxZDE2NDlkMzMzNGYzMDhlNTUzMDM4YjZjNDFmNSJ9', NULL, '2020-11-04 17:31:18', '2020-11-04 17:31:18');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `menu` (
  `MENU_Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `MENU_Codigo_Padre` int(11) NOT NULL DEFAULT 0,
  `MENU_Titulo` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MENU_Url` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MENU_Icon` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MENU_AccesoRapido` set('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `MENU_OrderBy` int(3) DEFAULT NULL,
  `MENU_FechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `MENU_FechaModificacion` datetime DEFAULT NULL,
  `MENU_FlagEstado` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  PRIMARY KEY (`MENU_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8;

INSERT INTO `menu` (`MENU_Codigo`, `MENU_Codigo_Padre`, `MENU_Titulo`, `MENU_Url`, `MENU_Icon`, `MENU_AccesoRapido`, `MENU_OrderBy`, `MENU_FechaRegistro`, `MENU_FechaModificacion`, `MENU_FlagEstado`) VALUES
	(1, 0, 'Principal', 'empresa', 'fas fa-cog', '0', 0, '2021-01-17 01:02:25', '2020-11-18 15:39:26', '1'),
	(2, 0, 'Configuracion', 'maestros', 'fas fa-cog', '0', NULL, '2021-01-17 01:02:22', NULL, '1'),
	(3, 2, 'Usuarios', 'usuario', 'fa fa-truck', '0', 3, '2021-03-19 19:30:15', '2020-10-19 19:11:27', '0'),
	(4, 2, 'Categorias', 'categoria', 'fa fa-id-card', '0', 1, '2021-03-19 19:31:02', '2020-10-19 19:11:18', '1'),
	(5, 2, 'Canciones', 'cancion', 'fas fa-cogs', '0', 5, '2021-03-19 19:31:08', '2020-11-13 17:12:22', '1'),
	(6, 2, 'Misas', 'misa', 'fas fa-briefcase', '0', 3, '2021-03-19 19:31:12', '2020-10-19 22:14:43', '1'),
	(131, 1, 'Cursos', 'curso', 'fas fa-briefcase', '0', 1, '2021-03-20 07:47:24', NULL, '1');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;