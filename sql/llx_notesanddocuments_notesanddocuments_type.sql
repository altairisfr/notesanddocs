-- Copyright (C) ---Put here your own copyright and developer email---
--
-- This program is free software; you can redistribute it and/or modify
-- it under the terms of the GNU General Public License as published by
-- the Free Software Foundation; either version 3 of the License, or
-- (at your option) any later version.
--
-- This program is distributed in the hope that it will be useful,
-- but WITHOUT ANY WARRANTY; without even the implied warranty of
-- MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
-- GNU General Public License for more details.
--
-- You should have received a copy of the GNU General Public License
-- along with this program. If not, see https://www.gnu.org/licenses/.
--
-- ========================================================================

create table llx_notesanddocuments_notesanddocuments_type
(
  rowid    integer            AUTO_INCREMENT PRIMARY KEY,
  code     varchar(16)        NOT NULL,
  entity   integer  DEFAULT 1 NOT NULL,	-- multi company id
  label	   varchar(50)        NOT NULL,
  active   integer  DEFAULT 1 NOT NULL

)ENGINE=innodb;