#
# TABLE STRUCTURE FOR TABLE 'cf_vertretungsplan_plancache_tags'
#
CREATE TABLE cf_vertretungsplan_plancache (
  id         INT(11) UNSIGNED             NOT NULL AUTO_INCREMENT,
  identifier VARCHAR(250) DEFAULT ''      NOT NULL,
  crdate     int(11) unsigned default '0',
  content    MEDIUMBLOB,
  lifetime   int(11) unsigned default '0',
  PRIMARY KEY (id),
  KEY cache_id (identifier)
) ENGINE = InnoDB;
#
# TABLE STRUCTURE FOR TABLE 'cf_vertretungsplan_plancache_tags'
#
CREATE TABLE cf_vertretungsplan_plancache_tags (
  id         INT(11) UNSIGNED        NOT NULL AUTO_INCREMENT,
  identifier VARCHAR(250) DEFAULT '' NOT NULL,
  tag        VARCHAR(250) DEFAULT '' NOT NULL,
  PRIMARY KEY (id),
  KEY cache_id (identifier),
  KEY cache_tag (tag)
) ENGINE = InnoDB;