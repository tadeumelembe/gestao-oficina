-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Jul-2021 às 10:45
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sg_celen`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `actividades`
--

CREATE TABLE `actividades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dataInicio` datetime DEFAULT NULL,
  `antesPhoto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depoisPhoto` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dataFim` datetime DEFAULT NULL,
  `jobCard_id` bigint(20) UNSIGNED NOT NULL,
  `area` enum('Mecanica Geral','Bate chapa','Pintura') COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` double NOT NULL DEFAULT 0,
  `status` enum('Pendente','Em curso','Completo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pendente',
  `funcionario_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `actividades`
--

INSERT INTO `actividades` (`id`, `nome`, `descricao`, `dataInicio`, `antesPhoto`, `depoisPhoto`, `dataFim`, `jobCard_id`, `area`, `preco`, `status`, `funcionario_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Troca de velas', NULL, NULL, NULL, NULL, NULL, 1, 'Mecanica Geral', 130, 'Pendente', NULL, '2021-07-11 06:13:58', '2021-07-11 06:26:07', NULL),
(2, 'Montagem de porta', 'Montagem de porta esquerda', '2021-07-11 11:27:22', '1626002842.png', '1626002852.png', '2021-07-11 11:27:32', 3, 'Bate chapa', 0, 'Completo', NULL, '2021-07-11 08:05:47', '2021-07-11 11:27:32', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `actividade_funcionario`
--

CREATE TABLE `actividade_funcionario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `actividade_id` bigint(20) UNSIGNED NOT NULL,
  `funcionario_id` bigint(20) UNSIGNED NOT NULL,
  `dataInicio` date DEFAULT NULL,
  `dataFim` date DEFAULT NULL,
  `tarefa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','progress','completed','stopped','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `modelo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anoFabrico` bigint(20) NOT NULL,
  `matricula` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `combustivel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Activo',
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cars`
--

INSERT INTO `cars` (`id`, `modelo`, `marca`, `anoFabrico`, `matricula`, `photo`, `tipo`, `combustivel`, `status`, `customer_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hilux', 'Toyota', 2012, 'ABC 535 MC', NULL, 'Ligeiro', 'Diesel', 'Activo', 1, '2021-06-27 22:22:20', '2021-06-27 22:22:20', NULL),
(5, 'BE', 'ASTON MARTIN', 2021, 'ABC 535 BR', 'F:\\Repository\\Laravel\\sg_celen\\public\\photo_car\\1625988510.jpg', 'Ligeiro', 'Electrico', 'Activo', 1, '2021-07-11 07:28:31', '2021-07-11 07:28:31', NULL),
(6, 'BE', 'AC PROPULSION', 2016, 'ABC 535 BT', '1625989936.png', 'Ligeiro', 'Diesel', 'Activo', 9, '2021-07-11 07:52:16', '2021-07-11 07:52:16', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `consumiveis`
--

CREATE TABLE `consumiveis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantidade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `custo` double(8,2) DEFAULT NULL,
  `notas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actividade_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `consumiveis`
--

INSERT INTO `consumiveis` (`id`, `name`, `quantidade`, `custo`, `notas`, `actividade_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'pisca', '2', 1000.00, NULL, 1, '2021-07-08 05:18:26', '2021-07-08 05:18:26', NULL),
(2, 'Filtro', '2', 5000.00, NULL, 2, '2021-07-08 20:54:44', '2021-07-08 20:54:44', NULL),
(3, 'Filtro', '2', 5000.00, NULL, 2, '2021-07-08 20:54:50', '2021-07-08 20:54:50', NULL),
(4, 'Tadeu', '2', 44.00, NULL, 1, '2021-07-10 14:26:28', '2021-07-10 14:26:28', NULL),
(5, 'Elton', '2', 2.00, NULL, 4, '2021-07-10 22:21:16', '2021-07-10 22:21:16', NULL),
(6, 'Tadeu', '2', 4.00, NULL, 5, '2021-07-11 04:24:18', '2021-07-11 04:24:18', NULL),
(7, 'Edy', '2', 55.00, NULL, 1, '2021-07-11 04:26:18', '2021-07-11 04:26:18', NULL),
(8, 'Kleyton', '2', 4.00, NULL, 1, '2021-07-11 04:28:09', '2021-07-11 04:28:09', NULL),
(9, 'Tadeu', '2', 25.00, NULL, 5, '2021-07-11 04:30:14', '2021-07-11 04:30:14', NULL),
(10, 'Edy', '2', 4.00, NULL, 5, '2021-07-11 04:32:08', '2021-07-11 04:32:08', NULL),
(11, 'Edy', '2', 4.00, NULL, 1, '2021-07-11 04:34:04', '2021-07-11 04:34:04', NULL),
(12, 'Tadeu', '2', 50.00, NULL, 1, '2021-07-11 06:16:01', '2021-07-11 06:16:01', NULL),
(13, 'Tadeu', '2', 50.00, NULL, 1, '2021-07-11 06:17:35', '2021-07-11 06:17:35', NULL),
(14, 'qqwq', '3', 10.00, NULL, 1, '2021-07-11 06:26:06', '2021-07-11 06:26:06', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `customers`
--

INSERT INTO `customers` (`id`, `name`, `surname`, `phoneNumber`, `email`, `status`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Elton', 'Cuambe', '842078450', 'eltonnjulio@gmail.com', 'Active', 'Singular', '2021-06-27 09:05:01', '2021-06-27 09:05:01', NULL),
(2, 'Tadeu', 'Melembe', '825457665', 'tmelembe@gmail.com', 'Active', 'Singular', '2021-06-27 09:07:03', '2021-06-27 09:07:03', NULL),
(7, 'Celen', NULL, '845454454', 'ebarrote@paytech.tech', 'Active', 'Company', '2021-06-27 10:23:15', '2021-06-27 10:23:15', NULL),
(9, 'Elton', 'Cuambe', '522554455', 'admin@admin.com', 'Active', 'hgghghgh', '2021-07-02 01:27:01', '2021-07-02 01:27:01', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `name`, `surname`, `phoneNumber`, `email`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Elton', 'Cuambe', '857855422', 'eltonnjulio@gmail.com', 'Active', '2021-07-02 01:31:31', '2021-07-02 01:31:31', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jobcards`
--

CREATE TABLE `jobcards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cotacao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fatura` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kilometragem` int(11) NOT NULL,
  `status` enum('Pendente','Em curso','Fechado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pendente',
  `notas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor` double NOT NULL,
  `dataInicio` date DEFAULT NULL,
  `dataFim` date DEFAULT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `funcionario_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `jobcards`
--

INSERT INTO `jobcards` (`id`, `cotacao`, `fatura`, `referencia`, `kilometragem`, `status`, `notas`, `valor`, `dataInicio`, `dataFim`, `car_id`, `funcionario_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, NULL, 'job-1625718273/2021', 4000, 'Fechado', NULL, 5222, '2021-07-10', '2021-07-10', 1, 1, '2021-07-08 04:24:33', '2021-07-10 15:51:25', NULL),
(2, NULL, NULL, 'job-1625988667/2021', 5000, 'Pendente', NULL, 45555, NULL, NULL, 5, 1, '2021-07-11 07:31:07', '2021-07-11 07:31:07', NULL),
(3, NULL, NULL, 'job-1625989970/2021', 5000, 'Pendente', NULL, 554, NULL, NULL, 6, 1, '2021-07-11 07:52:50', '2021-07-11 07:52:50', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_21_023437_create_permission_tables', 1),
(9, '2020_12_21_133819_create_customers_table', 3),
(10, '2020_12_21_141318_create_cars_table', 4),
(12, '2021_06_28_101745_create_funcionarios_table', 5),
(17, '2021_06_28_101747_create_jobcards_table', 7),
(20, '2021_06_29_184930_create_consumiveis_table', 8),
(21, '2021_07_05_214615_create_documents_table', 8),
(22, '2021_06_28_101749_create_actividades_table', 9),
(24, '2021_06_28_101750_create_actividade_funcionario_table', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2021-06-21 03:54:47', '2021-06-21 03:54:47'),
(2, 'role-create', 'web', '2021-06-21 03:54:47', '2021-06-21 03:54:47'),
(3, 'role-edit', 'web', '2021-06-21 03:54:47', '2021-06-21 03:54:47'),
(4, 'role-delete', 'web', '2021-06-21 03:54:47', '2021-06-21 03:54:47'),
(5, 'user-list', 'web', '2021-06-21 03:54:47', '2021-06-21 03:54:47'),
(6, 'user-create', 'web', '2021-06-21 03:54:47', '2021-06-21 03:54:47'),
(7, 'user-edit', 'web', '2021-06-21 03:54:47', '2021-06-21 03:54:47'),
(8, 'user-delete', 'web', '2021-06-21 03:54:47', '2021-06-21 03:54:47');

-- --------------------------------------------------------

--
-- Estrutura da tabela `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2021-06-21 03:55:09', '2021-06-21 03:55:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$7kvm.ALf3OJk8p3Q/ChiteV4YFOkbwzliAPnafMcTwzuIaEy6Pv62', 'al3lgrxG3PHi045fsYh1XznyckdAOleXwyDubOs2c7vHxXfgc1ywEHXhAmXq', '2021-06-21 03:55:09', '2021-06-21 03:55:09');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actividades_jobcard_id_foreign` (`jobCard_id`),
  ADD KEY `actividades_funcionario_id_foreign` (`funcionario_id`);

--
-- Índices para tabela `actividade_funcionario`
--
ALTER TABLE `actividade_funcionario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actividade_funcionario_actividade_id_foreign` (`actividade_id`),
  ADD KEY `actividade_funcionario_funcionario_id_foreign` (`funcionario_id`);

--
-- Índices para tabela `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cars_matricula_unique` (`matricula`),
  ADD KEY `cars_customer_id_foreign` (`customer_id`);

--
-- Índices para tabela `consumiveis`
--
ALTER TABLE `consumiveis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consumiveis_actividade_id_foreign` (`actividade_id`);

--
-- Índices para tabela `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_job_id_foreign` (`job_id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `jobcards`
--
ALTER TABLE `jobcards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jobcards_referencia_unique` (`referencia`),
  ADD KEY `jobcards_car_id_foreign` (`car_id`),
  ADD KEY `jobcards_funcionario_id_foreign` (`funcionario_id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Índices para tabela `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Índices para tabela `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Índices para tabela `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `actividade_funcionario`
--
ALTER TABLE `actividade_funcionario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `consumiveis`
--
ALTER TABLE `consumiveis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `jobcards`
--
ALTER TABLE `jobcards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_funcionario_id_foreign` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id`),
  ADD CONSTRAINT `actividades_jobcard_id_foreign` FOREIGN KEY (`jobCard_id`) REFERENCES `jobcards` (`id`);

--
-- Limitadores para a tabela `actividade_funcionario`
--
ALTER TABLE `actividade_funcionario`
  ADD CONSTRAINT `actividade_funcionario_actividade_id_foreign` FOREIGN KEY (`actividade_id`) REFERENCES `actividades` (`id`),
  ADD CONSTRAINT `actividade_funcionario_funcionario_id_foreign` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id`);

--
-- Limitadores para a tabela `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Limitadores para a tabela `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobcards` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
