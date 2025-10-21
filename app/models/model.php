<?php

require_once 'config.php';

class Model {
    protected $db;

    public function __construct() {
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_MULTI_STATEMENTS => true,
        ];

        // Conexion inicial sin base seleccionada para crearla si falta
        $this->db = new PDO('mysql:host=' . MYSQL_HOST . ';charset=utf8mb4', MYSQL_USER, MYSQL_PASS, $options);
        $this->db->exec('CREATE DATABASE IF NOT EXISTS `' . MYSQL_DB . '` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci');

        // Reconectar apuntando a la base recien creada
        $this->db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB . ';charset=utf8mb4', MYSQL_USER, MYSQL_PASS, $options);
        $this->deploy();
    }

    protected function deploy() {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();

        if (count($tables) === 0) {

            $sql = <<<END
                                    -- Base de datos: `web2tp-2025`
                --

                -- --------------------------------------------------------

                --
                -- Estructura de tabla para la tabla `marcas`
                --

                CREATE TABLE `marcas` (
                `marca_id` int(11) NOT NULL,
                `marca` varchar(50) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                --
                -- Volcado de datos para la tabla `marcas`
                --

                INSERT INTO `marcas` (`marca_id`, `marca`) VALUES
                (1, 'Ena'),
                (2, 'Star Nutrition'),
                (3, 'Gold Nutrition'),
                (4, 'Flint'),
                (9, 'American Force');

                -- --------------------------------------------------------

                --
                -- Estructura de tabla para la tabla `productos`
                --

                CREATE TABLE `productos` (
                `producto_id` int(11) NOT NULL,
                `nombre` varchar(50) NOT NULL,
                `stock` tinyint(1) NOT NULL DEFAULT 0,
                `descripcion` text DEFAULT NULL,
                `marca_id` int(11) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                --
                -- Volcado de datos para la tabla `productos`
                --

                INSERT INTO `productos` (`producto_id`, `nombre`, `stock`, `descripcion`, `marca_id`) VALUES
                (22, 'Creatina 300g', 10, NULL, 1),
                (23, 'Creatina 300g', 10, NULL, 1),
                (24, 'Whey Protein 1kg', 8, NULL, 1),
                (25, 'Aminoácidos BCAA 200g', 12, NULL, 1),
                (26, 'Glutamina 300g', 9, NULL, 1),
                (27, 'Mass Gainer 3kg', 6, NULL, 1),
                (28, 'Pre Workout Beta Shot 300g', 7, NULL, 1),
                (29, 'Omega 3 90 cápsulas', 15, NULL, 1),
                (30, 'Multivitamínico 60 tabletas', 14, NULL, 1),
                (31, 'Barrita Proteica Chocolate 50g', 30, NULL, 1),
                (32, 'Colágeno con Magnesio 300g', 2, NULL, 4),
                (33, 'Whey Protein 500g', 3, NULL, 2),
                (37, 'Whey Protein 1kg', 3, NULL, 3);

                -- --------------------------------------------------------

                --
                -- Estructura de tabla para la tabla `usuarios`
                --

                CREATE TABLE `usuarios` (
                `id` int(11) NOT NULL,
                `usuario` varchar(50) NOT NULL,
                `contraseña` varchar(256) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                --
                -- Volcado de datos para la tabla `usuarios`
                --

                INSERT INTO `usuarios` (`id`, `usuario`, `contraseña`) VALUES
                (2, 'webadmin', '$2y$10$.AtunnhDtzsFULbt8SrZxOzXkCY7rvbSpGpSYVjo5Qfz90XOky72K');

                --
                -- Índices para tablas volcadas
                --

                --
                -- Indices de la tabla `marcas`
                --
                ALTER TABLE `marcas`
                ADD PRIMARY KEY (`marca_id`);

                --
                -- Indices de la tabla `productos`
                --
                ALTER TABLE `productos`
                ADD PRIMARY KEY (`producto_id`),
                ADD KEY `id_marca` (`marca_id`);

                --
                -- Indices de la tabla `usuarios`
                --
                ALTER TABLE `usuarios`
                ADD PRIMARY KEY (`id`);

                --
                -- AUTO_INCREMENT de las tablas volcadas
                --

                --
                -- AUTO_INCREMENT de la tabla `marcas`
                --
                ALTER TABLE `marcas`
                MODIFY `marca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

                --
                -- AUTO_INCREMENT de la tabla `productos`
                --
                ALTER TABLE `productos`
                MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

                --
                -- AUTO_INCREMENT de la tabla `usuarios`
                --
                ALTER TABLE `usuarios`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

                --
                -- Restricciones para tablas volcadas
                --

                --
                -- Filtros para la tabla `productos`
                --
                ALTER TABLE `productos`
                ADD CONSTRAINT `fk_suplemento` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`marca_id`) ON DELETE CASCADE ON UPDATE CASCADE;
                COMMIT;

                /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
                /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
                /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

                END;
                $this->db->exec($sql);
        }
    }
}
