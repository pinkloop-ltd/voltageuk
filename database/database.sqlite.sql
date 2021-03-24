
CREATE TABLE IF NOT EXISTS `users` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`name`	varchar NOT NULL,
	`email`	varchar NOT NULL,
	`email_verified_at`	datetime,
	`password`	varchar NOT NULL,
	`initials`	varchar,
	`remember_token`	varchar,
	`created_at`	datetime,
	`updated_at`	datetime
);
CREATE TABLE IF NOT EXISTS `settings` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`key`	varchar NOT NULL,
	`name`	varchar NOT NULL,
	`description`	varchar,
	`value`	text,
	`field`	text NOT NULL,
	`active`	integer NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
CREATE TABLE IF NOT EXISTS `roles` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`name`	varchar NOT NULL,
	`guard_name`	varchar NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
	`permission_id`	integer NOT NULL,
	`role_id`	integer NOT NULL,
	FOREIGN KEY(`permission_id`) REFERENCES `permissions`(`id`) on delete cascade,
	PRIMARY KEY(`permission_id`,`role_id`),
	FOREIGN KEY(`role_id`) REFERENCES `roles`(`id`) on delete cascade
);
CREATE TABLE IF NOT EXISTS `permissions` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`name`	varchar NOT NULL,
	`guard_name`	varchar NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
CREATE TABLE IF NOT EXISTS `password_resets` (
	`email`	varchar NOT NULL,
	`token`	varchar NOT NULL,
	`created_at`	datetime
);
CREATE TABLE IF NOT EXISTS `pages` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`template`	varchar NOT NULL,
	`name`	varchar NOT NULL,
	`title`	varchar NOT NULL,
	`slug`	varchar NOT NULL,
	`content`	text,
	`extras`	text,
	`created_at`	datetime,
	`updated_at`	datetime,
	`deleted_at`	datetime
);
CREATE TABLE IF NOT EXISTS `model_has_roles` (
	`role_id`	integer NOT NULL,
	`model_type`	varchar NOT NULL,
	`model_id`	integer NOT NULL,
	FOREIGN KEY(`role_id`) REFERENCES `roles`(`id`) on delete cascade,
	PRIMARY KEY(`role_id`,`model_id`,`model_type`)
);
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
	`permission_id`	integer NOT NULL,
	`model_type`	varchar NOT NULL,
	`model_id`	integer NOT NULL,
	FOREIGN KEY(`permission_id`) REFERENCES `permissions`(`id`) on delete cascade,
	PRIMARY KEY(`permission_id`,`model_id`,`model_type`)
);
CREATE TABLE IF NOT EXISTS `migrations` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`migration`	varchar NOT NULL,
	`batch`	integer NOT NULL
);
INSERT INTO `migrations` VALUES (92,'2014_10_12_000000_create_users_table',1);
INSERT INTO `migrations` VALUES (93,'2014_10_12_100000_create_password_resets_table',1);
INSERT INTO `migrations` VALUES (94,'2015_08_04_131614_create_settings_table',1);
INSERT INTO `migrations` VALUES (95,'2016_05_05_115641_create_menu_items_table',1);
INSERT INTO `migrations` VALUES (96,'2016_05_10_130540_create_permission_tables',1);
INSERT INTO `migrations` VALUES (97,'2016_05_25_121918_create_pages_table',1);
INSERT INTO `migrations` VALUES (98,'2017_04_10_195926_change_extras_to_longtext',1);
INSERT INTO `migrations` VALUES (99,'2018_11_05_143723_create_jobs_table',1);
CREATE TABLE IF NOT EXISTS `menu_items` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`name`	varchar NOT NULL,
	`type`	varchar,
	`link`	varchar,
	`page_id`	integer,
	`parent_id`	integer,
	`lft`	integer,
	`rgt`	integer,
	`depth`	integer,
	`created_at`	datetime,
	`updated_at`	datetime,
	`deleted_at`	datetime
);
CREATE TABLE IF NOT EXISTS `jobs` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`job_name`	varchar NOT NULL,
	`job_ref`	varchar NOT NULL,
	`start_date`	date NOT NULL,
	`finish_date`	date NOT NULL,
	`site_address`	text,
	`site_engineers`	varchar,
	`site_contact`	varchar,
	`time_on_site`	date,
	`overtime`	date,
	`contact_phone`	varchar,
	`first_fix_materials`	text,
	`first_fix_extras`	text,
	`remarks`	text,
	`total_invoice_cost`	numeric,
	`labour_split`	numeric,
	`materials_split`	numeric,
	`job_description`	text,
	`second_fix_materials`	text,
	`second_fix_extras`	text,
	`created_at`	datetime,
	`updated_at`	datetime
);
CREATE UNIQUE INDEX IF NOT EXISTS `settings_key_unique` ON `settings` (
	`key`
);
CREATE INDEX IF NOT EXISTS `password_resets_email_index` ON `password_resets` (
	`email`
);
CREATE INDEX IF NOT EXISTS `model_has_roles_model_type_model_id_index` ON `model_has_roles` (
	`model_type`,
	`model_id`
);
CREATE INDEX IF NOT EXISTS `model_has_permissions_model_type_model_id_index` ON `model_has_permissions` (
	`model_type`,
	`model_id`
);
COMMIT;
