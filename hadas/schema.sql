CREATE TABLE `hada` (
  `idhada` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(200),
  `descripcion` varchar(200),
  `foto` varchar(200),
  `otro` varchar(200),
  `familia` varchar(200)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `hada`
--

INSERT INTO `hada` (`nombre`, `descripcion`, `foto`, `otro`, `familia`) VALUES
('Ruperta', 'Roba las setas', 'Hadas_malas', 'animacion5', 'Hadas_malas'),
('Julia', 'Es enfermera', 'Hadas_buenas', 'animacion2', 'Hadas_buenas'),
('Mariada', 'Es una gandula', 'Hadas_tontas', 'animacion1', 'Hadas_tontas'),
('Lucrecia', 'Se dedica a hacer comida', 'Hadas_inteligentes', 'animacion5', 'Hadas_inteligentes'),
('Gafotas', 'Le gusta el deporte', 'Hadas_madrinas', 'animacion2', 'Hadas_madrinas'),
('Bolinche', 'Le gusta animar', 'Hada_de_deseos', 'animacion4', 'Hada_de_deseos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hadaseleccionada`
--

CREATE TABLE `hadaseleccionada` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(200),
  `descripcion` varchar(200),
  `foto` varchar(200),
  `animacion` varchar(200)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `hadaseleccionada`
--

INSERT INTO `hadaseleccionada` ( `nombre`, `descripcion`, `foto`, `animacion`) VALUES
('lunia', '', 'Hadas_tontas', '6'),
('lili', '', 'Hadas_inteligentes', '5'),
('mimi', '', 'Hadas_madrinas', '4'),
('presumida', '', 'Hada_de_deseos', '2'),
('pili', '', 'Hadas_malas', '1'),
('Kikita', '', 'Hadas_malas', '1');