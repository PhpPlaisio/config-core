/*================================================================================*/
/* DDL SCRIPT                                                                     */
/*================================================================================*/
/*  Title    : PhpPlaisio: Core Config                                            */
/*  FileName : config-core.ecm                                                    */
/*  Platform : MySQL 5.6                                                          */
/*  Version  : Concept                                                            */
/*  Date     : zondag 10 mei 2020                                                 */
/*================================================================================*/
/*================================================================================*/
/* CREATE TABLES                                                                  */
/*================================================================================*/

CREATE TABLE ABC_CONFIG (
  cfg_id SMALLINT UNSIGNED AUTO_INCREMENT NOT NULL,
  mdl_id SMALLINT UNSIGNED NOT NULL,
  ccl_id SMALLINT UNSIGNED NOT NULL,
  cfg_description VARCHAR(400) NOT NULL,
  cfg_label VARCHAR(40) NOT NULL,
  CONSTRAINT PRIMARY_KEY PRIMARY KEY (cfg_id)
)
engine=innodb;

CREATE TABLE ABC_CONFIG_AUTH (
  cfg_id SMALLINT UNSIGNED NOT NULL,
  rol_id SMALLINT UNSIGNED NOT NULL,
  cmp_id SMALLINT UNSIGNED NOT NULL,
  aca_write TINYINT DEFAULT 0 NOT NULL
);

CREATE TABLE ABC_CONFIG_CLASS (
  acc_id SMALLINT UNSIGNED AUTO_INCREMENT NOT NULL,
  acc_class VARCHAR(40) NOT NULL,
  CONSTRAINT PRIMARY_KEY PRIMARY KEY (acc_id)
)
engine=innodb;

CREATE TABLE ABC_CONFIG_VALUE (
  cmp_id SMALLINT UNSIGNED NOT NULL,
  cfg_id SMALLINT UNSIGNED NOT NULL,
  acv_value VARCHAR(4000),
  CONSTRAINT PRIMARY_KEY PRIMARY KEY (cmp_id, cfg_id)
)
engine=innodb;

/*================================================================================*/
/* CREATE INDEXES                                                                 */
/*================================================================================*/

CREATE INDEX IX_FK_ABC_CONFIG ON ABC_CONFIG (mdl_id);

CREATE INDEX IX_FK_ABC_CONFIG1 ON ABC_CONFIG (ccl_id);

CREATE UNIQUE INDEX IX_ABC_CONFIG_AUTH1 ON ABC_CONFIG_AUTH (cfg_id, rol_id);

CREATE UNIQUE INDEX IX_ABC_CONFIG_AUTH2 ON ABC_CONFIG_AUTH (rol_id, cfg_id);

CREATE INDEX CFG_ID ON ABC_CONFIG_VALUE (cfg_id);

/*================================================================================*/
/* CREATE FOREIGN KEYS                                                            */
/*================================================================================*/

ALTER TABLE ABC_CONFIG
  ADD CONSTRAINT FK_ABC_CONFIG_AUT_MODULE
  FOREIGN KEY (mdl_id) REFERENCES AUT_MODULE (mdl_id);

ALTER TABLE ABC_CONFIG
  ADD CONSTRAINT FK_ABC_CONFIG_ABC_CONFIG_CLASS
  FOREIGN KEY (ccl_id) REFERENCES ABC_CONFIG_CLASS (acc_id);

ALTER TABLE ABC_CONFIG_AUTH
  ADD CONSTRAINT FK_ABC_CONFIG_AUTH_ABC_CONFIG
  FOREIGN KEY (cfg_id) REFERENCES ABC_CONFIG (cfg_id);

ALTER TABLE ABC_CONFIG_AUTH
  ADD CONSTRAINT FK_NEW_TABLE_AUT_ROLE
  FOREIGN KEY (rol_id) REFERENCES AUT_ROLE (rol_id);

ALTER TABLE ABC_CONFIG_AUTH
  ADD CONSTRAINT FK_ABC_CONFIG_AUTH_ABC_AUTH_COMPANY
  FOREIGN KEY (cmp_id) REFERENCES ABC_AUTH_COMPANY (cmp_id);

ALTER TABLE ABC_CONFIG_VALUE
  ADD CONSTRAINT FK_ABC_CONFIG_VALUE_ABC_CONFIG
  FOREIGN KEY (cfg_id) REFERENCES ABC_CONFIG (cfg_id);

ALTER TABLE ABC_CONFIG_VALUE
  ADD CONSTRAINT FK_ABC_CONFIG_VALUE_ABC_AUTH_COMPANY
  FOREIGN KEY (cmp_id) REFERENCES ABC_AUTH_COMPANY (cmp_id);
