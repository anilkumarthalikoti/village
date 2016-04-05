CREATE TABLE village.app_login (
	id int(10) NOT NULL,
	login_id varchar(25),
	login_password varchar(225),
	isactive varchar(1),
	isadmin varchar(1),
	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE village.component (
	id bigint(19) NOT NULL AUTO_INCREMENT,
	schemeid int(10),
	subschemeid int(10),
	component int(10),
	PRIMARY KEY (id),
	UNIQUE KEY(schemeid,subschemeid,component)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `farmerdetails` (
  `id` bigint  NOT NULL   AUTO_INCREMENT,
  `firstname` varchar(150) NOT NULL DEFAULT 'A' ,
  `firstname_k` varchar(150) NOT NULL DEFAULT 'A',
  `fathername` varchar(150) NOT NULL DEFAULT 'A',
  `fathername_k` varchar(150) NOT NULL DEFAULT 'A',
  `lastname` varchar(150) NOT NULL DEFAULT 'A',
  `lastname_k` varchar(150) NOT NULL DEFAULT 'A',
  `gender` varchar(1) NOT NULL DEFAULT 'A',
  `usercast` varchar(25) NOT NULL DEFAULT 'A',
  `usercast_k` varchar(150) NOT NULL DEFAULT 'A',
  `dob` date DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
   `qualification_k` varchar(150) DEFAULT NULL,
  `physicallychallanged` varchar(1) DEFAULT NULL,
  `aadhar` varchar(25) NOT NULL DEFAULT 'A',
  `voter` varchar(25) NOT NULL DEFAULT 'A',
  `pancard` varchar(25) NOT NULL DEFAULT 'A',
  `rationcard` varchar(25) DEFAULT NULL,
  `rationcardtype` varchar(25) DEFAULT NULL,
  `kishancard` varchar(25) DEFAULT NULL,
  `income` varchar(15) DEFAULT NULL,
  `mailid` varchar(150) DEFAULT NULL,
  `userstate` int(10) DEFAULT NULL,
  `district` int(10) DEFAULT -1,
  `taluk` int(10) DEFAULT -1,
  `hobli` int(10) DEFAULT -1,
  `village` int(10) DEFAULT -1,
    `panchayat` int(10) DEFAULT -1,
  `constituency` int(10) DEFAULT -1,
  `landstate` int(10) DEFAULT -1,
  `landdistrict` int(10) DEFAULT -1,
  `landtaluk` int(10) DEFAULT -1,
  `landhobli` int(10) DEFAULT -1,
  `landvillage` int(10) DEFAULT -1,
  `landpanchayat` int(10) DEFAULT -1,
  `landconstituency` int(10) DEFAULT -1,
  `houseno` varchar(25) DEFAULT '',
  `street` varchar(150) DEFAULT '',
  `location` varchar(150) DEFAULT '',
  `landmark` varchar(150) DEFAULT '',
  `pincode` varchar(25) NOT NULL DEFAULT 'A',
  `landlineno` varchar(15) DEFAULT '',
  `mobileno` varchar(15) DEFAULT '',
   `bank` varchar(25) DEFAULT '',
  `ifsc` varchar(25) DEFAULT '',
  `branch` varchar(25) DEFAULT '',
  `accountno` varchar(25) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1


CREATE TABLE village.states (
	id bigint(19) NOT NULL auto_increment,
	state_name varchar(150) NOT NULL,
	state_name_k varchar(150) NOT NULL,
	item_type int(10) NOT NULL,
	PRIMARY KEY (id),
	unique key (state_name,item_type)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE village.district (
	id bigint(19) NOT NULL auto_increment,
	stateid int(10) NOT NULL,
	districtid int(10) NOT NULL,
	PRIMARY KEY (id),
	unique key(stateid,districtid)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE village.taluka (
	id bigint(19) NOT NULL auto_increment,
	stateid int(10) NOT NULL,
	districtid int(10) NOT NULL,
	talukaid int(10) NOT NULL,
	PRIMARY KEY (id),
	unique key(stateid,districtid,talukaid)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE village.hobli (
	id bigint(19) NOT NULL auto_increment,
	stateid int(10) NOT NULL,
	districtid int(10) NOT NULL,
	talukaid int(10) NOT NULL,
	hobliid int(10) NOT NULL,
	PRIMARY KEY (id),
	unique key(stateid,districtid,talukaid,hobliid)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE village.village (
	id bigint(19) NOT NULL auto_increment,
	stateid int(10) NOT NULL,
	districtid int(10) NOT NULL,
	talukaid int(10) NOT NULL,
	hobliid int(10) NOT NULL,
	villageid int(10) NOT NULL,
	PRIMARY KEY (id),
	unique key(stateid,districtid,talukaid,hobliid,villageid)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE village.panchayati (
	id bigint(19) NOT NULL auto_increment,
	stateid int(10) NOT NULL,
	districtid int(10) NOT NULL,
	talukaid int(10) NOT NULL,
	hobliid int(10) NOT NULL,
	villageid int(10) NOT NULL,
	panchayatiid int(10) NOT NULL,
	PRIMARY KEY (id),
	unique key(stateid,districtid,talukaid,hobliid,villageid,panchayatiid)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE village.items (
	item_id bigint(19) NOT NULL auto_increment,
	item_name varchar(150) NOT NULL,
	item_type int(10) NOT NULL,
	PRIMARY KEY (item_id),
	unique key (item_name,item_type)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE village.schemefilling (
	id bigint(10) NOT NULL auto_increment,
	regid int(10) NOT NULL,
	schemeid int(10) NOT NULL,
	subschemeid int(10),
	component int(10),
	item1 int(10),
	item2 int(10),
	item3 int(10),
	item4 int(10),
	regdate date,
	regby int(10),
	PRIMARY KEY (id)
	
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE village.signup (
	fname varchar(255) NOT NULL,
	lname varchar(255) NOT NULL,
	desigination varchar(255) NOT NULL,
	department varchar(255) NOT NULL,
	email varchar(255) NOT NULL,
	mobileno varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE village.subcomponent (
	id bigint(19) NOT NULL auto_increment,
	schemeid int(10) NOT NULL,
	subschemid int(10) NOT NULL,
	component int(10) NOT NULL,
	subcomponent int(10) NOT NULL,
	PRIMARY KEY (id)
	
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE village.subschemes (
	id bigint(19) NOT NULL auto_increment,
	schemeid int(10) NOT NULL,
	subschemeid int(10) NOT NULL,
	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE village.user_roles (
	LOGIN_ID varchar(50),
	ROLE_ID int(10) NOT NULL,
	IS_ACTIVE varchar(1)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO village.app_login(id, login_id, login_password, isactive, isadmin) VALUES (1, 'ADMIN', 'ADMIN', 'Y', 'Y');

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

INSERT INTO village.user_roles(LOGIN_ID, ROLE_ID, IS_ACTIVE) VALUES ('1', 1, 'Y');

INSERT INTO village.user_roles(LOGIN_ID, ROLE_ID, IS_ACTIVE) VALUES ('ADMIN', 1, 'Y');

CREATE UNIQUE INDEX item_name ON village.items (item_name,item_type);

CREATE UNIQUE INDEX schemeid ON village.subcomponent (schemeid,subschemid,component,subcomponent,schemeid,subschemeid);

