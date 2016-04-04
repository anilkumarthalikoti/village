CREATE TABLE village.app_login (
	id int(10) NOT NULL,
	login_id varchar(25),
	login_password varchar(225),
	isactive varchar(1),
	isadmin varchar(1),
	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE village.items
(item_id INT NOT NULL AUTO_INCREMENT,
item_name VARCHAR(150) NOT NULL,
item_type INT NOT NULL,
PRIMARY KEY (item_id),
UNIQUE (item_name, item_type))
 ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE village.page_links (
	linkid int(10) NOT NULL,
	linkname varchar(100) NOT NULL,
	PRIMARY KEY (linkid)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE village.role_dtl (
	ROLE_ID int(10) NOT NULL,
	PAGE_LINK_ID int(10) NOT NULL,
	PRIMARY KEY (ROLE_ID,PAGE_LINK_ID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE village.role_mstr (
	ROLE_ID int(10) NOT NULL,
	ROLE_NAME varchar(100) NOT NULL,
	PRIMARY KEY (ROLE_ID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE village.signup (
	fname varchar(255) NOT NULL,
	lname varchar(255) NOT NULL,
	desigination varchar(255) NOT NULL,
	department varchar(255) NOT NULL,
	email varchar(255) NOT NULL,
	mobileno varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE village.subschemes (
	id int(10) NOT NULL,
	schemeid int(10),
	subschemeid int(10),
	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE village.user_roles (
	LOGIN_ID varchar(50),
	ROLE_ID int(10) NOT NULL,
	IS_ACTIVE varchar(1)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO village.app_login(id, login_id, login_password, isactive, isadmin) VALUES (1, 'ADMIN', 'ADMIN', 'Y', 'Y');
INSERT INTO village.items(item_id, item_name, item_type) VALUES (14, 'SUB-TEST', 1);
INSERT INTO village.items(item_id, item_name, item_type) VALUES (1, 'TEST', 0);
INSERT INTO village.items(item_id, item_name, item_type) VALUES (2, 'TEST1', 0);
INSERT INTO village.items(item_id, item_name, item_type) VALUES (18, 'TEST16', 1);
INSERT INTO village.items(item_id, item_name, item_type) VALUES (3, 'TEST2', 1);
INSERT INTO village.page_links(linkid, linkname) VALUES (1, 'ADD VILLAGE');
INSERT INTO village.page_links(linkid, linkname) VALUES (2, 'ADD SCHEMA');
INSERT INTO village.page_links(linkid, linkname) VALUES (3, 'RESET PASSWORD');
INSERT INTO village.page_links(linkid, linkname) VALUES (4, 'FARMER REGISTRATION');
INSERT INTO village.page_links(linkid, linkname) VALUES (5, 'SCHEMA FILLING');
INSERT INTO village.page_links(linkid, linkname) VALUES (6, 'EXISTING');
INSERT INTO village.page_links(linkid, linkname) VALUES (7, 'FARMER SEARCH');
INSERT INTO village.page_links(linkid, linkname) VALUES (8, 'MIS/PMKSY');
INSERT INTO village.page_links(linkid, linkname) VALUES (9, 'CHD');
INSERT INTO village.page_links(linkid, linkname) VALUES (10, 'NHM/MIDH');
INSERT INTO village.page_links(linkid, linkname) VALUES (11, 'RKVY');
INSERT INTO village.page_links(linkid, linkname) VALUES (12, 'TRACK RECORDS');
INSERT INTO village.page_links(linkid, linkname) VALUES (13, 'BENEFICIARY');
INSERT INTO village.page_links(linkid, linkname) VALUES (14, 'RECORD1');
INSERT INTO village.page_links(linkid, linkname) VALUES (15, 'RECORD2');
INSERT INTO village.page_links(linkid, linkname) VALUES (16, 'LINK-1');
INSERT INTO village.page_links(linkid, linkname) VALUES (17, 'ROLE CREATION');
INSERT INTO village.page_links(linkid, linkname) VALUES (18, 'ROLE MAPPING');
INSERT INTO village.role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 1);
INSERT INTO village.role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 2);
INSERT INTO village.role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 3);
INSERT INTO village.role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 4);
INSERT INTO village.role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 5);
INSERT INTO village.role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 6);
INSERT INTO village.role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 7);
INSERT INTO village.role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 8);
INSERT INTO village.role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 9);
INSERT INTO village.role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 10);
INSERT INTO village.role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 11);
INSERT INTO village.role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 12);
INSERT INTO village.role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 13);
INSERT INTO village.role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 14);
INSERT INTO village.role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 15);
INSERT INTO village.role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 16);
INSERT INTO village.role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 17);
INSERT INTO village.role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 18);
INSERT INTO village.role_mstr(ROLE_ID, ROLE_NAME) VALUES (1, 'ADMIN_ROLE');
INSERT INTO village.signup(fname, lname, desigination, department, email, mobileno) VALUES ('anil', 'kumar', 'developer', 'dev', 'anil2k12@gmail.com', '8106231231');
INSERT INTO village.subschemes(id, schemeid, subschemeid) VALUES (1, 1, 14);
INSERT INTO village.subschemes(id, schemeid, subschemeid) VALUES (2, 2, 14);
INSERT INTO village.user_roles(LOGIN_ID, ROLE_ID, IS_ACTIVE) VALUES ('ADMIN', 1, 'Y');
