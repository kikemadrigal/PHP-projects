CREATE TABLE `usuarios` (
  `idusuario` int(50) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombreusuario` varchar(500),
  `claveusuario` varchar(500),
  `nivelaccesousuario` int(10),
  `correousuario` varchar(500),
  `nombrerealusuario` varchar(500),
  `apellidosusuario` varchar(500),
  `webusuario` varchar(5000),
  `validadousuario` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` ( `nombreusuario`, `claveusuario`, `nivelaccesousuario`, `correousuario`, `nombrerealusuario`, `apellidosusuario`, `webusuario`, `validadousuario`) VALUES
('kike', '1c558dfd6f4148767d40386fa7b59c18e3b8627e', 3, 'kikemadrigal@gmail.com', '', '', '', 1),
('juan', '7cd430cd224095b773330847d8ff54ab8fccb0e6', 3, '00000', '', '', '', 0),
('pepe', '6934105ad50010b814c933314b1da6841431bc8b', 3, 'kikemadrigal@hotmail.com', '', '', '', 1),
('lucas', '1c558dfd6f4148767d40386fa7b59c18e3b8627e', 0, 'adeline@gestorwebs.tipolisto.es', '', '', '', 1),
('maria', '1c558dfd6f4148767d40386fa7b59c18e3b8627e', 0, '', '', '', '', 1);