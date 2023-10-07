-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-10-2023 a las 23:11:30
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
-- Base de datos: `db_tpe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(2, 'Hamburguesas'),
(1, 'Pizzas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `id_categories` int(11) DEFAULT NULL,
  `id_shops` int(11) DEFAULT NULL,
  `product_image` varchar(250) NOT NULL,
  `product_description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `id_categories`, `id_shops`, `product_image`, `product_description`) VALUES
(5, 'Hamburguesa', 2500, 24, 2, NULL, 'https://s3.abcstatics.com/media/gurme/2023/08/31/s/smash-burger.jpg-kbOC--940x529@abc.jpg', 'Esto es una hamburguesa'),
(7, 'Pizza', 3000, 24, 1, NULL, 'https://www.allrecipes.com/thmb/ooZbu_yUBrGQ74uKbuOENWuNxMM=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/48727-Mikes-homemade-pizza-DDMFS-beauty-4x3-BG-2974-a7a9842c14e34ca699f3b7d7143256cf.jpg', 'Esto es una pizza.'),
(9, 'Hamburguesa doble', 2700, 24, 2, NULL, 'https://d31npzejelj8v1.cloudfront.net/media/recipemanager/recipe/1687289598_doble-carne.jpg', 'Esto es una hamburguesa doble'),
(11, 'Otra Pizza', 2300, 24, 1, NULL, 'https://sivarious.com/wp-content/uploads/2023/04/Pizza-prosciutto.jpg', 'Esto es una pizza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shops`
--

CREATE TABLE `shops` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(45) NOT NULL,
  `password` varchar(250) NOT NULL,
  `rol` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `rol`) VALUES
(1, 'webadmin', '$2y$10$Onrd4KZg.JXFYEu37G7jNet3SxLDJM0v5odG81GclE1I3INa8mOei', 1),
(5, 'UsuarioDePrueba', '$2y$10$YbRzpG0QO3CrJ.3GxO3y5eF4WnM8f5O0.Gx4mkEjmy4DB.uabG3wq', 0),
(6, 'UsuarioDePrueba2', '$2y$10$ZirgpYtDE86EA8QDwZzacOBUb2MRJfVwC89t.dE8gHijbNyzqUOtO', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`name`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`name`),
  ADD KEY `categoria_id_idx` (`id_categories`),
  ADD KEY `fk_productos_comercios1_idx` (`id_shops`);

--
-- Indices de la tabla `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `categoria_id` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_comercios1` FOREIGN KEY (`id_shops`) REFERENCES `shops` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
