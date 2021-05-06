# Host: localhost  (Version 5.5.5-10.4.17-MariaDB)
# Date: 2021-04-19 07:40:34
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "categorias"
#

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "categorias"
#

INSERT INTO `categorias` VALUES (1,'Higiene','2021-04-13 12:21:27','2021-04-16 09:04:14'),(2,'Alimentos','2021-04-13 12:21:27','2021-04-14 09:00:51'),(3,'Categoria 3','2021-04-13 12:21:27','2021-04-13 12:21:27');

#
# Structure for table "empresas"
#

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE `empresas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome_fantasia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `razao_social` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contato` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_caminho` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `empresas_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "empresas"
#

INSERT INTO `empresas` VALUES (1,'Nome Prefeitura','Nome','CNPJ','contato','email','/img/empresa/empresa.png','Nome da rua','Nome bairro','cep ','SN','cidade ','estado ','2021-04-13 12:21:27','2021-04-13 12:21:27');

#
# Structure for table "fornecedors"
#

DROP TABLE IF EXISTS `fornecedors`;
CREATE TABLE `fornecedors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome_fornecedor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `juridica` tinyint(1) NOT NULL,
  `telefone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "fornecedors"
#

INSERT INTO `fornecedors` VALUES (1,'Fornecedor','12312312312',NULL,1,'44 4444-4444','123','Rua teste','São paulo','54654545','11','São Paulo','São Paulo','2021-04-13 12:21:27','2021-04-13 12:21:27'),(2,'Fornecedor 1',NULL,'12312312312',0,'44 4444-4444','123','Rua teste','São paulo','54654545','12','São Paulo','São Paulo','2021-04-13 12:21:27','2021-04-13 12:21:27');

#
# Structure for table "licitacaos"
#

DROP TABLE IF EXISTS `licitacaos`;
CREATE TABLE `licitacaos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ano` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_licitacao` int(11) NOT NULL,
  `modalidade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pregoeiro` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pregao` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fonte_recurso` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reduzido` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_produtos` double(8,2) DEFAULT NULL,
  `valor_final` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "licitacaos"
#

INSERT INTO `licitacaos` VALUES (1,'2021',21212121,'Modalidade ','Pessoa','222','recursos livres','12312312312',5.00,130.00,'2021-04-13 12:21:27','2021-04-15 16:54:08'),(2,'2020',123123132,'Modalidade 2','asdasda','4555222','recursos vinculado','12312312312',2.00,18.00,'2021-04-13 12:21:27','2021-04-16 09:11:57');

#
# Structure for table "migrations"
#

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "migrations"
#

INSERT INTO `migrations` VALUES (15,'2014_10_12_000000_create_users_table',1),(16,'2014_10_12_100000_create_password_resets_table',1),(17,'2016_09_28_005242_create_roles_table',1),(18,'2016_09_28_005317_create_permissions_table',1),(19,'2020_11_30_233858_create_empresas_table',1),(20,'2020_12_08_225833_create_pessoas_table',1),(21,'2021_03_04_115657_create_categorias_table',1),(22,'2021_03_04_120108_create_fornecedors_table',1),(23,'2021_03_04_123334_create_unidades_table',1),(24,'2021_03_12_192811_create_setors_table',1),(25,'2021_03_15_211612_create_produtos_table',1),(26,'2021_04_02_194317_create_requisicao_produtos_table',1),(27,'2021_04_07_195024_create_licitacaos_table',1),(28,'2021_04_08_150750_create_licitacao_produtos_table',1),(29,'2021_04_13_112041_add_licitacao_produto_id_to_requisicaos',1),(30,'2021_04_13_113311_add_licitacao_produto_id_to_requisicao_produtos',1);

#
# Structure for table "password_resets"
#

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "permissions"
#

INSERT INTO `permissions` VALUES (1,'Edit_post','Editar post','2021-04-13 12:21:27','2021-04-13 12:21:27'),(2,'View_post','Visualizar post','2021-04-13 12:21:27','2021-04-13 12:21:27'),(3,'Delete_post','Deletar post','2021-04-13 12:21:27','2021-04-13 12:21:27'),(4,'Insert_post','Adicionar post','2021-04-13 12:21:27','2021-04-13 12:21:27'),(5,'View_user','Visualizar usuário','2021-04-13 12:21:27','2021-04-13 12:21:27'),(6,'Edit_user','Editar usuário','2021-04-13 12:21:27','2021-04-13 12:21:27'),(7,'Delete_user','Deletar usuário','2021-04-13 12:21:27','2021-04-13 12:21:27'),(8,'Insert_user','Adicionar usuário','2021-04-13 12:21:27','2021-04-13 12:21:27'),(9,'View_role','Visualizar role','2021-04-13 12:21:27','2021-04-13 12:21:27'),(10,'Insert_role','Adicionar role','2021-04-13 12:21:27','2021-04-13 12:21:27'),(11,'Role_permission','Relação role permission','2021-04-13 12:21:27','2021-04-13 12:21:27'),(12,'View_permission','Visualizar permission','2021-04-13 12:21:27','2021-04-13 12:21:27'),(13,'Insert_permission','Adicionar permission','2021-04-13 12:21:27','2021-04-13 12:21:27'),(14,'insert_pessoa','Adicionar Pessoa','2021-04-13 12:21:27','2021-04-13 12:21:27'),(15,'pessoa_edit','Adicionar Pessoa','2021-04-13 12:21:27','2021-04-13 12:21:27'),(16,'pessoa_delete','Excluir Pessoa','2021-04-13 12:21:27','2021-04-13 12:21:27'),(17,'pessoa_view','Visualizar pessoa','2021-04-13 12:21:27','2021-04-13 12:21:27'),(18,'empresa_view','Visualiza os dados da empresa','2021-04-13 12:21:27','2021-04-13 12:21:27'),(19,'dashboard_empresa','Exibe ao usuário logar o dashboard da empresa e não o dashboard do administrador ','2021-04-13 12:21:27','2021-04-13 12:21:27'),(20,'alter_empresa','Permite alterar os dados da empresa inserida no sistema ','2021-04-13 12:21:27','2021-04-13 12:21:27'),(21,'Edit_user_logado','Permite alterar os dados da empresa inserida no sistema ','2021-04-13 12:21:27','2021-04-13 12:21:27'),(22,'pessoa_redefinir_senha','Habilita a redefinição de senha  ','2021-04-13 12:21:27','2021-04-13 12:21:27'),(23,'Edit_categoria','Editar categoria do produto','2021-04-13 12:21:27','2021-04-13 12:21:27'),(24,'View_categoria','Visualizar categoria','2021-04-13 12:21:27','2021-04-13 12:21:27'),(25,'Delete_categoria','Deletar categoria ','2021-04-13 12:21:27','2021-04-13 12:21:27'),(26,'Insert_categoria','Adicionar categoria','2021-04-13 12:21:27','2021-04-13 12:21:27'),(27,'Edit_fornecedor','Editar fornecedor do produto','2021-04-13 12:21:27','2021-04-13 12:21:27'),(28,'View_fornecedor','Visualizar fornecedor','2021-04-13 12:21:27','2021-04-13 12:21:27'),(29,'Delete_fornecedor','Deletar fornecedor ','2021-04-13 12:21:27','2021-04-13 12:21:27'),(30,'Insert_fornecedor','Adicionar fornecedor','2021-04-13 12:21:27','2021-04-13 12:21:27'),(31,'Edit_secretaria','Editar secretaria do produto','2021-04-13 12:21:27','2021-04-13 12:21:27'),(32,'View_secretaria','Visualizar secretaria','2021-04-13 12:21:27','2021-04-13 12:21:27'),(33,'Delete_secretaria','Deletar secretaria ','2021-04-13 12:21:27','2021-04-13 12:21:27'),(34,'Insert_secretaria','Adicionar secretaria','2021-04-13 12:21:27','2021-04-13 12:21:27'),(35,'Edit_unidade','Editar unidade vinculada a secretaria ','2021-04-13 12:21:27','2021-04-13 12:21:27'),(36,'View_unidade','Visualizar unidade','2021-04-13 12:21:27','2021-04-13 12:21:27'),(37,'Delete_unidade','Deletar unidade ','2021-04-13 12:21:27','2021-04-13 12:21:27'),(38,'Insert_unidade','Adicionar unidade','2021-04-13 12:21:27','2021-04-13 12:21:27'),(39,'Edit_produto','Editar  do produto','2021-04-13 12:21:27','2021-04-13 12:21:27'),(40,'View_produto','Visualizar produto','2021-04-13 12:21:27','2021-04-13 12:21:27'),(41,'Delete_produto','Deletar produto ','2021-04-13 12:21:27','2021-04-13 12:21:27'),(42,'Insert_produto','Adicionar produto','2021-04-13 12:21:27','2021-04-13 12:21:27'),(43,'Insert_setor','Adicionar setor','2021-04-13 12:21:27','2021-04-13 12:21:27'),(44,'View_setor','Visualizar setor','2021-04-13 12:21:27','2021-04-13 12:21:27'),(45,'Edit_setor','Editar setor','2021-04-13 12:21:27','2021-04-13 12:21:27'),(46,'Delete_setor','Apagar setor','2021-04-13 12:21:27','2021-04-13 12:21:27'),(47,'Insert_requisicao','Adicionar requisicao','2021-04-13 12:21:27','2021-04-13 12:21:27'),(48,'View_requisicao','Visualizar requisicao','2021-04-13 12:21:27','2021-04-13 12:21:27'),(49,'Edit_requisicao','Editar requisicao','2021-04-13 12:21:27','2021-04-13 12:21:27'),(50,'Delete_requisicao','Apagar requisicao','2021-04-13 12:21:27','2021-04-13 12:21:27'),(51,'pessoa_vincular_unidade','Vincula um usuário a uma unidade ','2021-04-13 12:21:27','2021-04-13 12:21:27'),(52,'insert_unidade_pessoa','Insere na unidad a pessao  ','2021-04-13 12:21:27','2021-04-13 12:21:27'),(53,'Edit_licitacao','Editar licitacao','2021-04-13 12:21:27','2021-04-13 12:21:27'),(54,'View_licitacao','Visualizar licitacao','2021-04-13 12:21:27','2021-04-13 12:21:27'),(55,'Delete_licitacao','Deletar licitacao','2021-04-13 12:21:27','2021-04-13 12:21:27'),(56,'Insert_licitacao','Adicionar licitacao','2021-04-13 12:21:27','2021-04-13 12:21:27'),(57,'Edit_LicitacaoProduto','Editar secretaria do produto','2021-04-13 12:21:27','2021-04-13 12:21:27'),(58,'View_LicitacaoProduto','Visualizar secretaria','2021-04-13 12:21:27','2021-04-13 12:21:27'),(59,'Delete_LicitacaoProduto','Deletar secretaria ','2021-04-13 12:21:27','2021-04-13 12:21:27'),(60,'Insert_LicitacaoProduto','Adicionar secretaria','2021-04-13 12:21:27','2021-04-13 12:21:27'),(61,'minhas_requisicoes','Visualização de requisições realizadas pelo usuário','2021-04-16 11:12:41','2021-04-16 11:12:41');

#
# Structure for table "produtos"
#

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lote` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_unitario` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produtos_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `produtos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "produtos"
#

INSERT INTO `produtos` VALUES (1,'Arroz tipo 1 5kg','20210301 12:00:15','Descrição do produto','50.00',2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(2,'Feijão Carioca 1kg','123123','Descrição do produto','10.00',2,'2021-04-13 12:21:27','2021-04-14 13:26:05'),(3,'Papel Higiênico','54644546','Papel rolo 100mts','8.00',1,'2021-04-16 09:04:05','2021-04-16 09:11:41');

#
# Structure for table "licitacao_produtos"
#

DROP TABLE IF EXISTS `licitacao_produtos`;
CREATE TABLE `licitacao_produtos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantidade_produto` double(8,2) NOT NULL,
  `valor_total_iten` double(8,2) NOT NULL,
  `fornecedor_id` int(10) unsigned DEFAULT NULL,
  `produto_id` int(10) unsigned DEFAULT NULL,
  `licitacao_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `licitacao_produtos_fornecedor_id_foreign` (`fornecedor_id`),
  KEY `licitacao_produtos_licitacao_id_foreign` (`licitacao_id`),
  KEY `licitacao_produtos_produto_id_foreign` (`produto_id`),
  CONSTRAINT `licitacao_produtos_fornecedor_id_foreign` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedors` (`id`),
  CONSTRAINT `licitacao_produtos_licitacao_id_foreign` FOREIGN KEY (`licitacao_id`) REFERENCES `licitacaos` (`id`),
  CONSTRAINT `licitacao_produtos_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "licitacao_produtos"
#

INSERT INTO `licitacao_produtos` VALUES (1,1.00,50.00,1,1,2,'2021-04-13 16:01:46','2021-04-13 16:01:46'),(2,1.00,10.00,1,2,2,'2021-04-13 16:01:46','2021-04-13 16:01:46'),(4,1.00,50.00,2,1,1,'2021-04-15 16:54:08','2021-04-15 16:54:08'),(5,2.00,20.00,2,2,1,'2021-04-15 16:54:08','2021-04-15 16:54:08'),(6,1.00,8.00,1,3,2,'2021-04-16 09:11:57','2021-04-16 09:11:57');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "roles"
#

INSERT INTO `roles` VALUES (1,'Admin','Administrador do sistema','2021-04-13 12:21:27','2021-04-13 12:21:27'),(2,'Prefeitura nivel 1  ','Administrador da prefeitura ','2021-04-13 12:21:27','2021-04-13 12:21:27'),(3,'Prefeitura Nível 2','Tem acesso básico ao sistema e bem simplificado','2021-04-16 11:58:33','2021-04-16 11:58:33');

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
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "permission_role"
#

INSERT INTO `permission_role` VALUES (1,1,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(2,2,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(3,3,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(4,4,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(5,5,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(6,6,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(7,7,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(8,8,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(9,9,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(10,10,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(11,11,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(12,12,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(13,13,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(14,14,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(15,15,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(16,16,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(17,17,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(18,18,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(19,19,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(20,20,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(21,21,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(22,21,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(23,22,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(24,23,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(25,24,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(26,25,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(27,26,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(28,27,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(29,28,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(30,29,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(31,30,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(32,31,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(33,32,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(34,33,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(35,34,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(36,35,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(37,36,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(38,37,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(39,38,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(40,39,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(41,40,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(42,41,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(43,42,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(44,43,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(45,44,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(46,45,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(47,46,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(48,47,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(49,48,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(50,49,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(51,50,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(52,22,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(53,23,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(54,24,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(55,25,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(56,26,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(57,27,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(58,28,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(59,29,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(60,30,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(61,31,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(62,32,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(63,33,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(64,34,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(65,35,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(66,36,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(67,37,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(68,38,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(69,39,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(70,40,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(71,41,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(72,42,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(73,43,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(74,44,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(75,45,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(76,46,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(77,47,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(78,48,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(80,50,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(81,47,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(82,48,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(83,49,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(84,50,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(85,51,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(86,52,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(87,53,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(88,54,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(89,55,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(90,52,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(91,53,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(92,54,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(93,55,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(94,56,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(95,57,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(96,58,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(97,59,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(98,56,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(99,57,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(100,58,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(101,59,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(102,60,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(103,60,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(106,21,3,NULL,NULL),(107,47,3,NULL,NULL),(108,48,3,NULL,NULL),(109,60,3,NULL,NULL),(110,61,3,NULL,NULL),(111,14,2,NULL,NULL),(112,15,2,NULL,NULL),(113,16,2,NULL,NULL),(114,17,2,NULL,NULL),(115,18,2,NULL,NULL),(116,20,2,NULL,NULL),(117,21,2,NULL,NULL),(118,51,2,NULL,NULL),(119,49,2,NULL,NULL);

#
# Structure for table "secretarias"
#

DROP TABLE IF EXISTS `secretarias`;
CREATE TABLE `secretarias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "secretarias"
#

INSERT INTO `secretarias` VALUES (1,'Assistencia Social  ','Rua XXX ','123 ','BAIRRO NOVO ','SAO PAULO  ','SAO PAULO  ','87701020','44 4545-8721 ','email@mail.com ','2021-04-13 12:21:27','2021-04-13 12:21:27'),(2,'Saúde ','Rua XXX ','123 ','BAIRRO NOVO ','SAO PAULO  ','SAO PAULO  ','87701020','44 4545-8721 ','email@mail.com ','2021-04-13 12:21:27','2021-04-13 12:21:27'),(3,'Educação ','Rua XXX ','123 ','BAIRRO NOVO ','SAO PAULO  ','SAO PAULO  ','87701020','44 4545-8721 ','email@mail.com ','2021-04-13 12:21:27','2021-04-13 12:21:27'),(4,'Fazenda  ','Rua XXX ','123 ','BAIRRO NOVO ','SAO PAULO  ','SAO PAULO  ','87701020','44 4545-8721 ','email@mail.com ','2021-04-13 12:21:27','2021-04-13 12:21:27'),(5,'Controladoria  ','Rua XXX ','123 ','BAIRRO NOVO ','SAO PAULO  ','SAO PAULO  ','87701020','44 4545-8721 ','email@mail.com ','2021-04-13 12:21:27','2021-04-13 12:21:27'),(6,'Procuradoria ','Rua XXX ','123 ','BAIRRO NOVO ','SAO PAULO  ','SAO PAULO  ','87701020','44 4545-8721 ','email@mail.com ','2021-04-13 12:21:27','2021-04-13 12:21:27');

#
# Structure for table "setors"
#

DROP TABLE IF EXISTS `setors`;
CREATE TABLE `setors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "setors"
#


#
# Structure for table "unidades"
#

DROP TABLE IF EXISTS `unidades`;
CREATE TABLE `unidades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secretaria_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `unidades_secretaria_id_foreign` (`secretaria_id`),
  CONSTRAINT `unidades_secretaria_id_foreign` FOREIGN KEY (`secretaria_id`) REFERENCES `secretarias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "unidades"
#

INSERT INTO `unidades` VALUES (1,'CAPS 2  ','Rua XXX ','123 ','BAIRRO NOVO ','SAO PAULO  ','SAO PAULO  ','87701020','44 4545-8721 ','email@mail.com ',1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(2,'UBS CENTRO  ','Rua XXX ','123 ','BAIRRO NOVO ','SAO PAULO  ','SAO PAULO  ','87701020','44 4545-8721 ','email@mail.com ',2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(3,'Escola CENTRAL  ','Rua XXX ','123 ','BAIRRO NOVO ','SAO PAULO  ','SAO PAULO  ','87701020','44 4545-8721 ','email@mail.com ',3,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(4,'Receitas e despesas  ','Rua XXX ','123 ','BAIRRO NOVO ','SAO PAULO  ','SAO PAULO  ','87701020','44 4545-8721 ','email@mail.com ',4,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(5,'Departamento Frotas ','Rua XXX ','123 ','BAIRRO NOVO ','SAO PAULO  ','SAO PAULO  ','87701020','44 4545-8721 ','email@mail.com ',5,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(6,'Gerencia de processos  ','Rua XXX ','123 ','BAIRRO NOVO ','SAO PAULO  ','SAO PAULO  ','87701020','44 4545-8721 ','email@mail.com ',6,'2021-04-13 12:21:27','2021-04-13 12:21:27');

#
# Structure for table "requisicaos"
#

DROP TABLE IF EXISTS `requisicaos`;
CREATE TABLE `requisicaos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `justificativa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacao` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requisicao_ano` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_produtos` double(8,2) NOT NULL,
  `valor_final` double(8,2) NOT NULL,
  `unidade_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `requisicaos_unidade_id_foreign` (`unidade_id`),
  CONSTRAINT `requisicaos_unidade_id_foreign` FOREIGN KEY (`unidade_id`) REFERENCES `unidades` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "requisicaos"
#

INSERT INTO `requisicaos` VALUES (1,'Justificativa ','OBS ','1020/2021',8.00,80.00,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(2,'Justificativa ','OBS ','1020/2021',8.00,80.00,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(3,'asdasdasda','sdasdasda','3/2021',3.00,70.00,2,'2021-04-15 16:53:17','2021-04-15 16:53:17'),(4,'asdasdas','asdasd','4/2021',2.00,60.00,2,'2021-04-16 07:45:37','2021-04-16 07:45:37'),(5,'asdasda','sdasd','5/2021',2.00,60.00,2,'2021-04-16 07:47:30','2021-04-16 07:47:30'),(6,'asdsadas','dasda','6/2021',5.00,40.00,2,'2021-04-16 09:12:23','2021-04-16 09:12:23'),(7,'sdfsdf','sdfsdfsdfsd','7/2021',3.00,66.00,1,'2021-04-16 09:31:23','2021-04-16 09:31:23'),(8,'sfsfsd','fsdfsd','8/2021',3.00,108.00,1,'2021-04-16 09:33:29','2021-04-16 09:33:29');

#
# Structure for table "requisicao_produtos"
#

DROP TABLE IF EXISTS `requisicao_produtos`;
CREATE TABLE `requisicao_produtos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantidade_produto` int(11) NOT NULL,
  `valor_total_iten` int(11) NOT NULL,
  `requisicao_id` int(10) unsigned NOT NULL,
  `produto_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `licitacao_produto_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `requisicao_produtos_requisicao_id_foreign` (`requisicao_id`),
  KEY `requisicao_produtos_produto_id_foreign` (`produto_id`),
  KEY `requisicao_produtos_licitacao_produto_id_foreign` (`licitacao_produto_id`),
  CONSTRAINT `requisicao_produtos_licitacao_produto_id_foreign` FOREIGN KEY (`licitacao_produto_id`) REFERENCES `licitacao_produtos` (`id`),
  CONSTRAINT `requisicao_produtos_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`),
  CONSTRAINT `requisicao_produtos_requisicao_id_foreign` FOREIGN KEY (`requisicao_id`) REFERENCES `requisicaos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "requisicao_produtos"
#

INSERT INTO `requisicao_produtos` VALUES (1,4,40,1,1,'2021-04-13 12:21:27','2021-04-13 12:21:27',NULL),(2,4,40,1,2,'2021-04-13 12:21:27','2021-04-13 12:21:27',NULL),(3,1,50,3,1,'2021-04-15 16:53:17','2021-04-15 16:53:17',NULL),(4,2,20,3,2,'2021-04-15 16:53:17','2021-04-15 16:53:17',NULL),(5,1,50,4,1,'2021-04-16 07:45:37','2021-04-16 07:45:37',1),(6,1,10,4,2,'2021-04-16 07:45:37','2021-04-16 07:45:37',1),(7,1,50,5,1,'2021-04-16 07:47:30','2021-04-16 07:47:30',2),(8,1,10,5,2,'2021-04-16 07:47:30','2021-04-16 07:47:30',1),(9,5,40,6,3,'2021-04-16 09:12:23','2021-04-16 09:12:23',2),(10,1,50,7,1,'2021-04-16 09:31:23','2021-04-16 09:31:23',1),(11,2,16,7,3,'2021-04-16 09:31:23','2021-04-16 09:31:23',2),(12,1,8,8,3,'2021-04-16 09:33:29','2021-04-16 09:33:29',NULL),(13,2,100,8,1,'2021-04-16 09:33:29','2021-04-16 09:33:29',NULL);

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'Administrador','admin@laravel.com','$2y$10$5XiCTQeSLfUgEzuj1V7XmOtkZQI7NhU.tkRvxJzFP9OlNylsF8DrS',NULL,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(2,'Gerente prefeitura','gerente@prefeitura.com','$2y$10$pG.ZuoPxVOD6PsTCjIsiDeAu01wPQq/1Go1wYc9j5/m1TIbdnWDMq',NULL,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(3,'Usuário de unidade','caps@caps.com','$2y$10$feSt/FZnUGT54pxbKMcJPeBQJYGsN2y7OIWgDqkI8oGRn4pJMqTWm','2eiBFLeQck7aoEsR4Kh66VyduDlOwakKkNUz3ayMP1w1x0aegSX9rXRrefEk','2021-04-16 12:01:30','2021-04-16 12:01:30');

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
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "role_user"
#

INSERT INTO `role_user` VALUES (1,1,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(2,2,2,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(3,3,3,NULL,NULL);

#
# Structure for table "pessoas"
#

DROP TABLE IF EXISTS `pessoas`;
CREATE TABLE `pessoas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_pessoa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pessoas_user_id_foreign` (`user_id`),
  CONSTRAINT `pessoas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "pessoas"
#

INSERT INTO `pessoas` VALUES (1,'Nome Admin','2021-03-01','Masculino','(44) 9 9999-9999','img/pessoa/user.jpg',1,'2021-04-13 12:21:27','2021-03-01 12:00:15'),(2,'Gestor Prefeitura ','2021-03-01','Masculino','(44) 9 9999-9999','img/pessoa/user.jpg',2,'2021-04-13 12:21:27','2021-03-01 12:00:15'),(3,'Usuário de unidade','2021-04-16','Prefiro não informar','(54) 5 4545-4545','img/pessoa/pessoa-perfil-caps@caps.com.jpg',3,'2021-04-16 12:01:30','2021-04-16 12:01:30');

#
# Structure for table "pessoa_unidades"
#

DROP TABLE IF EXISTS `pessoa_unidades`;
CREATE TABLE `pessoa_unidades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `unidade_id` int(10) unsigned NOT NULL,
  `pessoa_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pessoa_unidades_unidade_id_foreign` (`unidade_id`),
  KEY `pessoa_unidades_pessoa_id_foreign` (`pessoa_id`),
  CONSTRAINT `pessoa_unidades_pessoa_id_foreign` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoas` (`id`),
  CONSTRAINT `pessoa_unidades_unidade_id_foreign` FOREIGN KEY (`unidade_id`) REFERENCES `unidades` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "pessoa_unidades"
#

INSERT INTO `pessoa_unidades` VALUES (1,1,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(2,2,1,'2021-04-13 12:21:27','2021-04-13 12:21:27'),(3,2,2,'2021-04-16 14:24:34','2021-04-16 14:24:34'),(4,2,1,'2021-04-16 14:32:29','2021-04-16 14:32:29'),(5,3,1,'2021-04-16 15:00:57','2021-04-16 15:00:57');
