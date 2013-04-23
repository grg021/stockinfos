CREATE TABLE IF NOT EXISTS `#__stockinfos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT 'Title',
  `alias` varchar(255) NOT NULL DEFAULT '' COMMENT 'Alias',
  `subtitle` varchar(255) NOT NULL DEFAULT '' COMMENT 'Subtitle',
  
  `date` varchar(255) NOT NULL DEFAULT '' COMMENT 'Subtitle',
  `time` varchar(255) NOT NULL DEFAULT '' COMMENT 'Subtitle',
  `opem` varchar(255) NOT NULL DEFAULT '' COMMENT 'Subtitle',
  `high` varchar(255) NOT NULL DEFAULT '' COMMENT 'Subtitle',
  `low` varchar(255) NOT NULL DEFAULT '' COMMENT 'Subtitle',
  `close` varchar(255) NOT NULL DEFAULT '' COMMENT 'Subtitle',
  `volume` varchar(255) NOT NULL DEFAULT '' COMMENT 'Subtitle',
  `abs-cbn` varchar(255) NOT NULL DEFAULT '' COMMENT 'Subtitle',
  `abs-cbn pdr` varchar(255) NOT NULL DEFAULT '' COMMENT 'Subtitle',
  `fphc` varchar(255) NOT NULL DEFAULT '' COMMENT 'Subtitle',
  
  `fphc preferred` varchar(255) NOT NULL DEFAULT '' COMMENT 'Subtitle',
  `fgen` varchar(255) NOT NULL DEFAULT '' COMMENT 'Subtitle',
  `edc` varchar(255) NOT NULL DEFAULT '' COMMENT 'Subtitle',
  `meralco` varchar(255) NOT NULL DEFAULT '' COMMENT 'Subtitle',
  `rock` varchar(255) NOT NULL DEFAULT '' COMMENT 'Subtitle',
 
  `benpres` varchar(255) NOT NULL DEFAULT '' COMMENT 'Subtitle',
  `phisix` varchar(255) NOT NULL DEFAULT '' COMMENT 'Subtitle',
 
 
  `snippet` varchar(2480) NOT NULL COMMENT 'Snippet or small teaser',
  `fulltext` mediumtext NOT NULL COMMENT 'Content Text',
  `catid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Category Primary Key',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Created Date and Time',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Created by User ID',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '' COMMENT 'Created by Alias',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Modified Date and Time',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Modified by User ID',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Checked out Date and Time',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Checked out by User ID',
  `state` tinyint(3) NOT NULL DEFAULT '0' COMMENT 'State: 2-Archived 1-Published, 0-Unpublished, -1-Trashed',
  `featured` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Set if article is featured.',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Publish Begin Date and Time',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'  COMMENT 'Publish Down Date and Time',
  `access` int(10) unsigned NOT NULL DEFAULT '0'  COMMENT 'Access Control View Access Group',
  `asset_id` int(10) unsigned NOT NULL DEFAULT '0'  COMMENT 'Asset ID for Asset Control',
  `version` int(10) unsigned NOT NULL DEFAULT '1'  COMMENT 'Version',
  `language` char(7) NOT NULL COMMENT 'Content Language',
  `ordering` int(11) NOT NULL DEFAULT '0'  COMMENT 'Ordering',
  `metakey` text NOT NULL  COMMENT 'Metakey for Document',
  `metadesc` varchar(2480) NOT NULL COMMENT 'Meta Description for Document',
  `metadata` mediumtext NOT NULL  COMMENT 'Meta Data JSON String/array',
  `parameters` mediumtext NOT NULL  COMMENT 'Parameter JSON String/array',
  `custom_fields` mediumtext NOT NULL COMMENT 'Custom Fields JSON String/array',
  PRIMARY KEY (`id`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`state`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
