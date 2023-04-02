CREATE TABLE location (
	LocId int PRIMARY KEY AUTO_INCREMENT,
    LocName text NOT NULL,
);

CREATE TABLE manufacturer (
	MfgId int PRIMARY KEY AUTO_INCREMENT,
    MfgName text NOT NULL,
);

CREATE TABLE username (
	UserId int PRIMARY KEY AUTO_INCREMENT,
    Username varchar(255) NOT NULL,
    Password varchar(255) NOT NULL
);

CREATE TABLE assetinfo (
	AssetId int PRIMARY KEY AUTO_INCREMENT,
    ItemName varchar(255) NOT NULL,
    MfgId int NOT NULL,
    PartNumber text DEFAULT NULL,
    SerialNumber varchar(255) NOT NULL,
    HwRev varchar(255) DEFAULT NULL,
    AssetTag varchar(255) DEFAULT NULL,
    SwVersion text DEFAULT NULL,
    IpAddress text DEFAULT NULL,
    LocId int NOT NULL,
    Description text DEFAULT NULL,
    UserId int NOT NULL,
    LastUpdate timestamp NULL DEFAULT NULL,
    FOREIGN KEY (MfgId) REFERENCES manufacturer(MfgId) ON DELETE CASCADE ON UPDATE CASCADE
);

ALTER TABLE assetinfo ADD FOREIGN KEY (LocId) REFERENCES location(LocId) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE assetinfo ADD FOREIGN KEY (UserId) REFERENCES username(UserId) ON DELETE CASCADE ON UPDATE CASCADE;