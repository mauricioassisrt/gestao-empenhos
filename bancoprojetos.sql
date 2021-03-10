# Host: localhost  (Version 5.5.5-10.4.17-MariaDB)
# Date: 2021-03-09 16:39:37
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "categorias"
#

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "categorias"
#


#
# Structure for table "empresas"
#

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE `empresas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome_fantasia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `razao_social` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contato` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_caminho` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `empresas_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "empresas"
#

INSERT INTO `empresas` VALUES (1,'Nome fantasia da empresa','Nome fantasia da empresa','CNPJ','contato','email','/img/empresa/empresa.png','Nome da rua','Nome bairro','cep ','SN','cidade ','estado ','2021-03-04 17:40:09','2021-03-04 17:40:09');

#
# Structure for table "fornecedors"
#

DROP TABLE IF EXISTS `fornecedors`;
CREATE TABLE `fornecedors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome_fornecedor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "fornecedors"
#


#
# Structure for table "migrations"
#

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "migrations"
#

INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_09_28_005242_create_roles_table',1),(4,'2016_09_28_005317_create_permissions_table',1),(5,'2020_11_30_233858_create_empresas_table',1),(6,'2020_12_08_225833_create_pessoas_table',1),(7,'2021_03_03_171200_create_requisicaos_table',1),(8,'2021_03_04_115657_create_categorias_table',1),(9,'2021_03_04_120108_create_fornecedors_table',1),(10,'2021_03_04_123334_create_unidades_table',1);

#
# Structure for table "password_resets"
#

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "password_resets"
#


#
# Structure for table "permissions"
#

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "permissions"
#

INSERT INTO `permissions` VALUES (1,'Edit_post','Editar post','2021-03-04 17:41:27','2021-03-04 17:41:27'),(2,'View_post','Visualizar post','2021-03-04 17:41:27','2021-03-04 17:41:27'),(3,'Delete_post','Deletar post','2021-03-04 17:41:27','2021-03-04 17:41:27'),(4,'Insert_post','Adicionar post','2021-03-04 17:41:27','2021-03-04 17:41:27'),(5,'View_user','Visualizar usuário','2021-03-04 17:41:27','2021-03-04 17:41:27'),(6,'Edit_user','Editar usuário','2021-03-04 17:41:27','2021-03-04 17:41:27'),(7,'Delete_user','Deletar usuário','2021-03-04 17:41:27','2021-03-04 17:41:27'),(8,'Insert_user','Adicionar usuário','2021-03-04 17:41:27','2021-03-04 17:41:27'),(9,'View_role','Visualizar role','2021-03-04 17:41:27','2021-03-04 17:41:27'),(10,'Insert_role','Adicionar role','2021-03-04 17:41:27','2021-03-04 17:41:27'),(11,'Role_permission','Relação role permission','2021-03-04 17:41:27','2021-03-04 17:41:27'),(12,'View_permission','Visualizar permission','2021-03-04 17:41:27','2021-03-04 17:41:27'),(13,'Insert_permission','Adicionar permission','2021-03-04 17:41:27','2021-03-04 17:41:27'),(14,'insert_pessoa','Adicionar Pessoa','2021-03-04 17:41:27','2021-03-04 17:41:27'),(15,'pessoa_edit','Adicionar Pessoa','2021-03-04 17:41:27','2021-03-04 17:41:27'),(16,'pessoa_delete','Excluir Pessoa','2021-03-04 17:41:27','2021-03-04 17:41:27'),(17,'pessoa_view','Visualizar pessoa','2021-03-04 17:41:27','2021-03-04 17:41:27'),(18,'empresa_view','Visualiza os dados da empresa','2021-03-04 17:41:27','2021-03-04 17:41:27'),(19,'dashboard_empresa','Exibe ao usuário logar o dashboard da empresa e não o dashboard do administrador ','2021-03-04 17:41:27','2021-03-04 17:41:27'),(20,'alter_empresa','Permite alterar os dados da empresa inserida no sistema ','2021-03-04 17:41:27','2021-03-04 17:41:27'),(21,'Edit_user_logado','Permite alterar os dados da empresa inserida no sistema ','2021-03-04 17:41:27','2021-03-04 17:41:27'),(22,'pessoa_redefinir_senha','Habilita a redefinição de senha  ','2021-03-04 17:41:27','2021-03-04 17:41:27'),(23,'Edit_categoria','Editar categoria do produto','2021-03-04 17:41:27','2021-03-04 17:41:27'),(24,'View_categoria','Visualizar categoria','2021-03-04 17:41:27','2021-03-04 17:41:27'),(25,'Delete_categoria','Deletar categoria ','2021-03-04 17:41:27','2021-03-04 17:41:27'),(26,'Insert_categoria','Adicionar categoria','2021-03-04 17:41:27','2021-03-04 17:41:27'),(27,'Edit_fornecedor','Editar fornecedor do produto','2021-03-04 17:41:27','2021-03-04 17:41:27'),(28,'View_fornecedor','Visualizar fornecedor','2021-03-04 17:41:27','2021-03-04 17:41:27'),(29,'Delete_fornecedor','Deletar fornecedor ','2021-03-04 17:41:27','2021-03-04 17:41:27'),(30,'Insert_fornecedor','Adicionar fornecedor','2021-03-04 17:41:27','2021-03-04 17:41:27'),(31,'Edit_secretaria','Editar secretaria do produto','2021-03-04 17:41:27','2021-03-04 17:41:27'),(32,'View_secretaria','Visualizar secretaria','2021-03-04 17:41:27','2021-03-04 17:41:27'),(33,'Delete_secretaria','Deletar secretaria ','2021-03-04 17:41:27','2021-03-04 17:41:27'),(34,'Insert_secretaria','Adicionar secretaria','2021-03-04 17:41:27','2021-03-04 17:41:27'),(35,'Edit_unidade','Editar unidade vinculada a secretaria ','2021-03-04 17:41:27','2021-03-04 17:41:27'),(36,'View_unidade','Visualizar unidade','2021-03-04 17:41:27','2021-03-04 17:41:27'),(37,'Delete_unidade','Deletar unidade ','2021-03-04 17:41:27','2021-03-04 17:41:27'),(38,'Insert_unidade','Adicionar unidade','2021-03-04 17:41:27','2021-03-04 17:41:27'),(39,'Edit_produto','Editar  do produto','2021-03-04 17:41:27','2021-03-04 17:41:27'),(40,'View_produto','Visualizar produto','2021-03-04 17:41:27','2021-03-04 17:41:27'),(41,'Delete_produto','Deletar produto ','2021-03-04 17:41:27','2021-03-04 17:41:27'),(42,'Insert_produto','Adicionar produto','2021-03-04 17:41:27','2021-03-04 17:41:27');

#
# Structure for table "roles"
#

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "roles"
#

INSERT INTO `roles` VALUES (1,'Admin','Administrador do sistema','2021-03-04 17:41:22','2021-03-04 17:41:22'),(2,'Master','Administrador Master na prefeitura','2021-03-04 17:44:40','2021-03-04 17:44:40');

#
# Structure for table "permission_role"
#

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "permission_role"
#

INSERT INTO `permission_role` VALUES (1,1,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(2,2,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(3,3,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(4,4,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(5,5,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(6,6,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(7,7,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(8,8,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(9,9,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(10,10,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(11,11,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(12,12,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(13,13,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(14,14,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(15,15,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(16,16,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(17,17,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(18,18,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(19,19,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(20,20,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(21,21,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(22,21,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(23,22,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(24,23,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(25,24,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(26,25,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(27,26,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(28,27,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(29,28,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(30,29,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(31,30,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(32,31,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(33,32,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(34,33,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(35,34,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(36,35,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(37,36,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(38,37,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(39,38,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(40,39,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(41,40,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(42,41,1,'2021-03-04 17:41:27','2021-03-04 17:41:27'),(44,20,2,NULL,NULL),(45,21,2,NULL,NULL),(46,22,2,NULL,NULL),(47,23,2,NULL,NULL),(48,24,2,NULL,NULL),(49,25,2,NULL,NULL),(50,26,2,NULL,NULL),(51,27,2,NULL,NULL),(52,28,2,NULL,NULL),(53,29,2,NULL,NULL),(54,30,2,NULL,NULL),(55,31,2,NULL,NULL),(56,32,2,NULL,NULL),(57,33,2,NULL,NULL),(58,34,2,NULL,NULL),(59,35,2,NULL,NULL),(60,36,2,NULL,NULL),(61,37,2,NULL,NULL),(62,38,2,NULL,NULL),(63,39,2,NULL,NULL),(64,40,2,NULL,NULL),(65,41,2,NULL,NULL),(66,42,2,NULL,NULL);

#
# Structure for table "secretarias"
#

DROP TABLE IF EXISTS `secretarias`;
CREATE TABLE `secretarias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "secretarias"
#


#
# Structure for table "unidades"
#

DROP TABLE IF EXISTS `unidades`;
CREATE TABLE `unidades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secretaria_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `unidades_secretaria_id_foreign` (`secretaria_id`),
  CONSTRAINT `unidades_secretaria_id_foreign` FOREIGN KEY (`secretaria_id`) REFERENCES `secretarias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "unidades"
#


#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'Nome Admin','admin@laravel.com','$2y$10$qx2doBaOsGHYZbxk2Go2bOYXK9OL.iTBbp1HtMIO6k9lhwV0MmYoC','YmN85UzitVMybRlv8QeGK8iGYtnlPFyt8wDkvtuPUxb6DAStjZpHMr2FtlXo','2021-03-04 17:40:25','2021-03-04 17:49:09'),(2,'Master Prefeitura','master@laravel.com','$2y$10$zEsSQcmDsjdJTycEJQ0AOOO7TVNvwtRa37vG/xdbCiV1Q.trlqnda','3M1k4CWZb9R78jVFaSIbLrX1TAKMRLa7Zfjw4MfA','2021-03-04 17:47:52','2021-03-04 17:47:52');

#
# Structure for table "role_user"
#

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "role_user"
#

INSERT INTO `role_user` VALUES (1,1,1,'2021-03-04 17:41:22','2021-03-04 17:41:22'),(2,2,2,NULL,NULL);

#
# Structure for table "requisicaos"
#

DROP TABLE IF EXISTS `requisicaos`;
CREATE TABLE `requisicaos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `requisicaos_user_id_foreign` (`user_id`),
  CONSTRAINT `requisicaos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "requisicaos"
#


#
# Structure for table "pessoas"
#

DROP TABLE IF EXISTS `pessoas`;
CREATE TABLE `pessoas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_pessoa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pessoas_user_id_foreign` (`user_id`),
  CONSTRAINT `pessoas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "pessoas"
#

INSERT INTO `pessoas` VALUES (3,'Nome Admin','2021-03-01','M','(44) 9 9999-9999','/caminho',1,'2021-03-04 17:41:15','2021-03-01 12:00:15'),(4,'Master Prefeitura','2021-03-04','Masculino','(54) 5 4654-5465','img/pessoa/pessoa-perfil-master@laravel.com.jpg',2,'2021-03-04 17:47:52','2021-03-04 17:47:52');

#
# Structure for table "pessoaunidade"
#

DROP TABLE IF EXISTS `pessoaunidade`;
CREATE TABLE `pessoaunidade` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `unidade_id` int(10) unsigned NOT NULL,
  `pessoa_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pessoaunidade_unidade_id_foreign` (`unidade_id`),
  KEY `pessoaunidade_pessoa_id_foreign` (`pessoa_id`),
  CONSTRAINT `pessoaunidade_pessoa_id_foreign` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pessoaunidade_unidade_id_foreign` FOREIGN KEY (`unidade_id`) REFERENCES `unidades` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "pessoaunidade"
#

