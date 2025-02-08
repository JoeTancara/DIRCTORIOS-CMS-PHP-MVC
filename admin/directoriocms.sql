-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-02-2022 a las 00:30:44
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `directoriocms`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE `anuncios` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `enlace` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`id`, `nombre`, `enlace`, `foto`) VALUES
(1, 'ads1', 'ggggggggggggggggggggggg', 'vistas/imagenes/anuncios/503.jpg'),
(2, 'ads2', 'ggggggggggggggggggggggg', 'vistas/imagenes/anuncios/532.jpg'),
(3, 'ads2', 'ggggggggggggggggggggggg', 'vistas/imagenes/anuncios/990.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `cat_nombre` text NOT NULL,
  `cat_foto` text NOT NULL,
  `cat_decript` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `cat_nombre`, `cat_foto`, `cat_decript`) VALUES
(1, 'stickers', 'vistas/imagenes/categorias//387.jpg', 'categoria de los stickers'),
(2, 'onlyfans', 'vistas/imagenes/categorias//793.jpg', 'categoria de los onlyfans'),
(3, 'hentai', 'vistas/imagenes/categorias//750.jpg', 'categoria de los hentai'),
(4, '18', 'vistas/imagenes/categorias//476.jpg', 'categoria de los +18'),
(5, 'hot', 'vistas/imagenes/categorias//881.jpg', 'categoria de los sticker hot');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos_wsp`
--

CREATE TABLE `grupos_wsp` (
  `id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `wsp_nom` text NOT NULL,
  `wsp_link` text NOT NULL,
  `wsp_descrip` text NOT NULL,
  `wsp_foto` text NOT NULL,
  `wsp_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupos_wsp`
--

INSERT INTO `grupos_wsp` (`id`, `usu_id`, `id_cat`, `wsp_nom`, `wsp_link`, `wsp_descrip`, `wsp_foto`, `wsp_keywords`) VALUES
(2, 1, 2, 'sticker de gatos', 'https://chat.whatsapp.com/BiiCiAnbOrqCHMkwzOzmL4', 'grupo para compartir sticvker graciosos', 'vistas/imagenes/grupos/736.jpg', 'amor  amistad stickers diversion'),
(3, 1, 1, 'sticker de gatos', 'https://chat.whatsapp.com/BiiCiAnbOrqCHMkwzOzmL4', 'grupo para compartir sticvker graciosos', 'vistas/imagenes/grupos/219.jpg', 'don ramoin'),
(4, 1, 2, 'sticker de gatos', 'https://chat.whatsapp.com/BiiCiAnbOrqCHMkwzOzmL4', 'grupo para compartir sticvker graciosos', 'vistas/imagenes/grupos/3.jpg', 'amor  amistad stickers diversion'),
(5, 1, 1, 'sticker de gatos', 'https://chat.whatsapp.com/BiiCiAnbOrqCHMkwzOzmL4', 'grupo para compartir sticvker graciosos', 'vistas/imagenes/grupos/4.jpg', 'amor  amistad stickers diversion'),
(6, 1, 1, 'sticker de pinguinos', 'https://chat.whatsapp.com/BiiCiAnbOrqCHMkwzOzmL4', 'grupo para compartir sticvker graciosos', 'vistas/imagenes/grupos/505.jpg', 'amor  amistad stickers diversion'),
(10, 0, 2, 'sticker de dinero', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'grupos de humor', 'vistas/imagenes/grupos/574.jpg', 'oooo dinero  humor entretenimiento'),
(11, 0, 2, 'kkkkkkkkkkkkk', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'solo gente pendeja xdd no cristalitos , no mayores de 20 años 👺 uwu gracias v', 'vistas/imagenes/grupos/140.jpg', 'amistad  chumor sexo placer'),
(13, 0, 1, 'kkkkkkkkkkkkk', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'grupos de sexoo', 'vistas/imagenes/grupos/941.jpg', 'amistad  chumor sexo placer'),
(17, 0, 4, 'grupo mas 18', 'gggg', 'ggggggg', 'vistas/imagenes/grupos/696.jpg', 'oooo'),
(18, 0, 1, 'ggg', 'gggg', 'ggggggg', 'vistas/imagenes/grupos/106.jpg', 'oooo'),
(19, 0, 3, 'ggg', 'gggg', 'ggggggg', 'vistas/imagenes/grupos/442.jpg', 'oooo'),
(20, 0, 3, 'ggg', 'gggg', 'ggggggg', 'vistas/imagenes/grupos/521.jpg', 'oooo'),
(21, 0, 3, 'ggg', 'gggg', 'ggggggg', 'vistas/imagenes/grupos/696.jpg', 'oooo'),
(22, 0, 2, 'maincraf', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'grupos de sexoo', 'admin/vistas/imagenes/grupos/405.png', 'oooo'),
(23, 0, 3, 'ggg', 'gggg', 'ggggggg', 'vistas/imagenes/grupos/923.jpg', 'oooo'),
(24, 0, 2, 'amor y gatows', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'kkkkkkkkkkkkkkkkk', '/vistas/imagenes/grupos/376.jpg', 'oooo'),
(25, 0, 2, 'oroooooooooooooo', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'hola', 'vistas/imagenes/grupos/289.jpg', 'amistad  xxx sexo placer'),
(26, 0, 2, 'kkkkkkkkkkkkk', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'kkkkkkkkkkkkkkkkk', 'vistas/imagenes/grupos/675.jpg', 'amistad  chumor sexo placer'),
(27, 0, 1, 'kkkkkkkkkkkkk', 'kkkkkkkkkkkkkkk', 'kkkkkkkkkkkkkkkkk', 'vistas/imagenes/grupos/731.png', 'amistad  chumor sexo placer'),
(28, 0, 2, 'kkkkkkkkkkkkk', 'kkkkkkkkkkkkkkk', 'solo gente pendeja xdd no cristalitos , no mayores de 20 años 👺 uwu gracias v', 'vistas/imagenes/grupos/292.jpg', 'amistad  xxx sexo placer'),
(29, 0, 2, 'kkkkkkkkkkkkk', 'kkkkkkkkkkkkkkk', 'solo gente pendeja xdd no cristalitos , no mayores de 20 años 👺 uwu gracias v', 'vistas/imagenes/grupos/838.jpg', 'amistad  xxx sexo placer'),
(30, 0, 2, 'kkkkkkkkkkkkk', 'kkkkkkkkkkkkkkk', 'solo gente pendeja xdd no cristalitos , no mayores de 20 años 👺 uwu gracias v', 'vistas/imagenes/grupos/416.jpg', 'amistad  xxx sexo placer'),
(31, 0, 2, 'kkkkkkkkkkkkk', 'kkkkkkkkkkkkkkk', 'solo gente pendeja xdd no cristalitos , no mayores de 20 años 👺 uwu gracias v', 'vistas/imagenes/grupos/179.jpg', 'amistad  xxx sexo placer'),
(32, 0, 2, 'kkkkkkkkkkkkk', 'kkkkkkkkkkkkkkk', 'solo gente pendeja xdd no cristalitos , no mayores de 20 años 👺 uwu gracias v', 'vistas/imagenes/grupos/783.jpg', 'amistad  xxx sexo placer'),
(33, 0, 2, 'kkkkkkkkkkkkk', 'kkkkkkkkkkkkkkk', 'solo gente pendeja xdd no cristalitos , no mayores de 20 años 👺 uwu gracias v', 'vistas/imagenes/grupos/110.jpg', 'amistad  xxx sexo placer'),
(34, 0, 2, 'kkkkkkkkkkkkk', 'kkkkkkkkkkkkkkk', 'solo gente pendeja xdd no cristalitos , no mayores de 20 años 👺 uwu gracias v', 'vistas/imagenes/grupos/766.jpg', 'amistad  xxx sexo placer'),
(35, 0, 2, 'kkkkkkkkkkkkk', 'kkkkkkkkkkkkkkk', 'solo gente pendeja xdd no cristalitos , no mayores de 20 años 👺 uwu gracias v', 'vistas/imagenes/grupos/315.jpg', 'amistad  xxx sexo placer'),
(36, 0, 2, 'kkkkkkkkkkkkk', 'kkkkkkkkkkkkkkk', 'solo gente pendeja xdd no cristalitos , no mayores de 20 años 👺 uwu gracias v', 'vistas/imagenes/grupos/735.jpg', 'amistad  chumor sexo placer'),
(37, 0, 2, 'kkkkkkkkkkkkk', 'kkkkkkkkkkkkkkk', 'solo gente pendeja xdd no cristalitos , no mayores de 20 años 👺 uwu gracias v', 'vistas/imagenes/grupos/835.jpg', 'amistad  chumor sexo placer'),
(38, 0, 3, 'kkkkkkkkkkkkk', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'solo gente pendeja xdd no cristalitos , no mayores de 20 años 👺 uwu gracias v', 'vistas/imagenes/grupos/105.jpg', 'amistad  chumor sexo placer'),
(39, 0, 2, 'kkkkkkkkkkkkk', 'kkkkkkkkkkkkkkk', 'solo gente pendeja xdd no cristalitos , no mayores de 20 años 👺 uwu gracias v', 'vistas/imagenes/grupos/675.jpg', 'oooo'),
(40, 0, 2, 'kkkkkkkkkkkkk', 'kkkkkkkkkkkkkkk', 'solo gente pendeja xdd no cristalitos , no mayores de 20 años 👺 uwu gracias v', 'vistas/imagenes/grupos/224.jpg', 'oooo'),
(41, 0, 2, 'kkkkkkkkkkkkk', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'kkkkkkkkkkkkkkkkk', 'vistas/imagenes/grupos/733.jpg', 'oooo'),
(42, 0, 2, 'kkkkkkkkkkkkk', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'kkkkkkkkkkkkkkkkk', 'vistas/imagenes/grupos/368.jpg', 'oooo'),
(43, 0, 2, 'kkkkkkkkkkkkk', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'kkkkkkkkkkkkkkkkk', 'vistas/imagenes/grupos/897.jpg', 'oooo'),
(44, 0, 1, 'amor y gatows', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'kkkkkkkkkkkkkkkkk', 'vistas/imagenes/grupos/553.jpg', 'amistad  chumor sexo placer'),
(45, 0, 1, 'amor y gatows', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'kkkkkkkkkkkkkkkkk', 'vistas/imagenes/grupos/157.jpg', 'amistad  chumor sexo placer'),
(46, 0, 1, 'amor y gatows', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'kkkkkkkkkkkkkkkkk', 'vistas/imagenes/grupos/301.jpg', 'amistad  chumor sexo placer'),
(47, 0, 1, 'amor y gatows', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'kkkkkkkkkkkkkkkkk', 'vistas/imagenes/grupos/580.jpg', 'amistad  chumor sexo placer'),
(48, 0, 1, 'amor y gatows', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'kkkkkkkkkkkkkkkkk', 'vistas/imagenes/grupos/165.jpg', 'amistad  chumor sexo placer'),
(49, 0, 1, 'amor y gatows', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'kkkkkkkkkkkkkkkkk', 'vistas/imagenes/grupos/584.jpg', 'amistad  chumor sexo placer'),
(50, 0, 1, 'amor y gatows', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'kkkkkkkkkkkkkkkkk', 'vistas/imagenes/grupos/403.jpg', 'amistad  chumor sexo placer'),
(51, 0, 1, 'amor y gatows', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'kkkkkkkkkkkkkkkkk', 'vistas/imagenes/grupos/655.jpg', 'amistad  chumor sexo placer'),
(52, 0, 1, 'amor y gatows', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'kkkkkkkkkkkkkkkkk', 'vistas/imagenes/grupos/860.jpg', 'amistad  chumor sexo placer'),
(53, 0, 1, 'amor y gatows', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'kkkkkkkkkkkkkkkkk', 'vistas/imagenes/grupos/558.jpg', 'amistad  chumor sexo placer'),
(54, 0, 2, 'kkkkkkkkkkkkk', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'tttt', 'vistas/imagenes/grupos/149.jpg', 'oooo'),
(55, 0, 1, 'amor y gatows', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'kkkkkkkkkkkkkkkkk', 'vistas/imagenes/grupos/297.jpg', 'amistad  chumor sexo placer'),
(56, 0, 1, 'amor y gatows', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'kkkkkkkkkkkkkkkkk', 'vistas/imagenes/grupos/469.jpg', 'amistad  chumor sexo placer'),
(57, 0, 2, 'kkkkkkkkkkkkk', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'tttt', 'vistas/imagenes/grupos/534.jpg', 'oooo'),
(58, 0, 2, 'kkkkkkkkkkkkk', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'hola', 'vistas/imagenes/grupos/443.jpg', 'amistad  chumor sexo placer'),
(59, 0, 2, 'kkkkkkkkkkkkk', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'hola', 'vistas/imagenes/grupos/936.jpg', 'amistad  chumor sexo placer'),
(60, 0, 2, 'kkkkkkkkkkkkk', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'hola', 'vistas/imagenes/grupos/808.jpg', 'amistad  chumor sexo placer'),
(61, 0, 2, 'hol', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'tttt', 'vistas/imagenes/grupos/984.jpg', 'amistad  chumor sexo placer'),
(62, 0, 2, 'hol', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'tttt', 'vistas/imagenes/grupos/991.jpg', 'amistad  chumor sexo placer'),
(63, 0, 1, 'kkkkkkkkkkkkk', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'grupos de sexoo', 'vistas/imagenes/grupos/831.jpg', 'amistad  chumor sexo placer'),
(64, 0, 2, 'kkkkkkkkkkkkk', 'https://chat.whatsapp.com/CV4VBWegXqo0pCmZbCr67f', 'kkkkkkkkkkkkkkkkk', 'vistas/imagenes/grupos/950.jpg', 'oooo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL,
  `id_roles` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `usuario` text NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `id_roles`, `nombre`, `usuario`, `password`, `foto`) VALUES
(6, 1, '', 'admin', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'vistas/imagenes/perfiles/714.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_roles` int(11) NOT NULL,
  `nom_rol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_roles`, `nom_rol`) VALUES
(1, 'admin'),
(2, 'vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seo`
--

CREATE TABLE `seo` (
  `seo_id` int(11) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `seo`
--

INSERT INTO `seo` (`seo_id`, `keywords`, `description`) VALUES
(1, 'wsp , enlaces de whatsapp , grupos de whatsapp ', 'en esta web encontraras muchos grupos de wsp para que puedas unirte');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupos_wsp`
--
ALTER TABLE `grupos_wsp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_roles`);

--
-- Indices de la tabla `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`seo_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `grupos_wsp`
--
ALTER TABLE `grupos_wsp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_roles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `seo`
--
ALTER TABLE `seo`
  MODIFY `seo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
