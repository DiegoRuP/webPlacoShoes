-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2023 a las 20:14:39
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdplacoshoes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID` int(10) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `Stock` int(10) DEFAULT NULL,
  `Precio` int(10) DEFAULT NULL,
  `Descuento` int(10) DEFAULT NULL,
  `Imagen` varchar(100) NOT NULL,
  `Categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID`, `Nombre`, `Descripcion`, `Stock`, `Precio`, `Descuento`, `Imagen`, `Categoria`) VALUES
(1000, 'Nike Air Jordan 1 HIGH x Travis Scott', 'Puntas redondas con ajuste de agujetas sobre empeine. Incluye tres repuestos de agujetas originales.', 2, 30400, 0, 'hombre1.png', 'Hombres'),
(1001, 'Vans Classics Old Skool Negro', 'El Old Skool, el tenis de skate clásico de Vans y el primero en presentar el icónico sidestripe, es un calzado de corte choclo agujetado construido en canvas macizo y piel sintética', 4, 1300, 0, 'hombre2.png', 'Hombres'),
(1002, 'Nike Air Jordan 1 MID Blanco y gris cemento', 'Exclusivos sneakers diseñados especialmente para hombre. Corte de piel vacuno, forro de textil y suela de hule sintético', 6, 1899, 0, 'hombre3.png', 'Hombres'),
(1003, 'Nike Air Jordan 1 MID Multicolor', 'Multicolor, cuero, diseño en paneles color block, detalle del logo Swoosh característico y logo Air Jordan Wings característico.', 2, 2100, 10, 'hombre4.png', 'Hombres'),
(1004, 'Nike Air Jordan 11 Blanco y azul', 'Blanco, azul claro, cuero, acabado de charol, paneles de malla, motivo Jumpman característico, puntera redonda.', 0, 4600, 10, 'test2.png', 'Hombres'),
(1005, 'Adidas Forum LOW Blanco y Azul', 'Más que un calzado, es una declaración de estilo. Los adidas Forum llegaron a la escena en el 84 y ganaron seguidores en la cancha y en el mundo de la música.', 6, 2399, 0, 'hombre6.png', 'Hombres'),
(1006, 'Nike Air Jordan 1 HIGH x Spider-Man', 'Blanco, negro, rojo, piel de becerro, detalle del logo Swoosh característico.', 2, 5240, 0, 'hombre7.png', 'Hombres'),
(1007, 'Nike Air Jordan 1 HIGH x J Balvin', 'Puntera redonda, detalle del logo, motivo tie-dye , logo Air Jordan Wings característico, borde festoneado y motivo Jumpman característico', 0, 9525, 20, 'hombre8.png', 'Hombres'),
(1009, 'Tenis Adidas X Lego Sport', 'Con un diseño vibrante y detalles que rinden homenaje al mundo LEGO®, estos tenis ofrecen más que solo estilo. La calidad de Adidas se combina con la juguetona creatividad de LEGO, creando un calzado que va más allá de las expectativas convencionales', 12, 3000, 30, 'test2.png', 'Hombres'),
(2000, 'Nike Air Jordan 1 HIGH Rosa y blanco', 'Con un diseño elegante y deportivo, el Nike Air Max AP te permite construir un puente entre el pasado y el presente con una comodidad de primer nivel', 10, 2599, 0, 'mujer1.png', 'Mujer'),
(2001, 'Nike Air Max Rosa y blanco', 'El calzado Air Jordan 1 Mid aporta estilo en toda la cancha y comodidad premium a un look icónico. La unidad Air-Sole amortigua el partido en las canchas, y el cuello acolchado ofrece una mayor sujeción.', 8, 3200, 10, 'mujer2.png', 'Mujer'),
(2002, 'Converse Chuck Taylor Frutas', 'Zapatillas con silueta Chuck Taylor', 10, 2799, 0, 'mujer3.png', 'Mujer'),
(2003, 'Converse Chuck x Comme des garcons', 'Beige, algodón con puntera redonda, cierre con agujetas en la parte delantera estos tenis con logo estampado y agujetas Des Garçons Play x Converse', 8, 2999, 0, 'mujer4.png', 'Mujer'),
(2004, 'Converse Chuck Taylor Negro', 'Indiscutible desde 1917, el calzado Chuck Taylor All Star High Top ahora ofrece altura adicional con una suela de plataforma con relieve', 10, 1899, 10, 'mujer5.png', 'Mujer'),
(2005, 'Gucci High Top 1977', 'El sneaker Gucci Tennis 1977 se presenta en una versión High-Top en la colección Pre-Fall 2020. Elaborado a partir de un lienzo de monograma que se combina con el motivo texturizado de la GG en la suela y en la tribanda Web de la Marca', 5, 25990, 0, 'mujer6.png', 'Mujer'),
(2006, 'Louis Vuitton Time Out', 'Los tenis Time Out se reinterpretan en suave piel de becerro y lucen el distintivo Louis Vuitton y el motivo Monograma grabados', 15, 31999, 0, 'mujer7.png', 'Mujer'),
(2007, 'Puma Future Rider Play Pastel', 'Las zapatillas Puma Future Rider Soft para mujer cuenta con un nylon superligero y acolchado, ante, refuerzos de cuero y la suela exterior \'Federbein\' de Puma, que absorbe los impactos', 0, 2499, 0, 'mujer8.png', 'Mujer'),
(2008, 'Tenis Puma RS-X The Smurfs', 'Con detalles inspirados en los entrañables personajes de los Pitufos, estos tenis no solo te ofrecen un calzado deportivo de alto rendimiento, sino que también te invitan a sumergirte en el encanto y la alegría de la infancia.', 2, 2000, 0, 'test3.png', 'Mujer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(5) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Cuenta` varchar(30) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Animal` varchar(30) NOT NULL,
  `Contraseña` varchar(30) NOT NULL,
  `Online` int(1) NOT NULL,
  `Admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nombre`, `Cuenta`, `Correo`, `Animal`, `Contraseña`, `Online`, `Admin`) VALUES
(4, 'kevin calvillo', 'kxpra', 'kevcvll@gmail.com', 'leon', 'eUtRMlkxZjc2dHRrN2E0L0FFUW14QT', 0, 0),
(5, 'Juan Gonzalez', 'juan10', 'juan@gmail.com', 'perro', 'VXlXSEVJUjRYYkpRZ000V0F4Ni9sZz', 0, 0),
(6, 'Ramiro Chavez', 'chavez2', 'chavez@gmail.com', 'avestruz', 'QVE5cm1sSkJEM25laGZsamVTNSs5dz', 0, 0),
(7, 'Edgar Martinez', 'edgar77', 'edgar@hotmail.com', 'tecolote', 'TDdvUXVoekhDaG85ZHVLbUhxY2gyQT', 0, 0),
(8, 'Cristobal Colon', 'crisclashroyal', 'cristobal@icloud.com', 'babuino', 'OFdWeHVGSEZIMmhoM0x6ZERKdmwxQT', 0, 0),
(9, 'Diego Ruan', 'ruan12', 'ruan@gmail.com', 'capibara', 'QkJwVFJpd1RNR2I1ZTc0WGsvV1VpZz', 0, 1),
(12, 'Pepe Hernandez', 'pepe3', 'pepe@gmail.com', 'pato', 'NE1wZFBQSmsydm5EdFJpeG5NMUUzdz', 0, 0),
(27, 'Diego Ruan', 'Diego1', 'diego@gmail.com', 'perro', 'VXlXSEVJUjRYYkpRZ000V0F4Ni9sZz', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
