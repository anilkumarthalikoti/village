CREATE TABLE app_login (id bigint(10) NOT NULL auto_increment,login_id varchar(25) not null,login_password varchar(225) not null,
	isactive varchar(1),isadmin varchar(1),
	PRIMARY KEY (id),
	unique key(login_id)
) ;

CREATE TABLE component (
	id bigint(19) NOT NULL AUTO_INCREMENT,
	schemeid int(10),
	subschemeid int(10),
	component int(10),
	PRIMARY KEY (id),
	UNIQUE KEY(schemeid,subschemeid,component)
);
CREATE TABLE farmerdetails (
  id bigint  NOT NULL   AUTO_INCREMENT,
  firstname varchar(150) NOT NULL DEFAULT 'A' ,
  firstname_k blob ,
  fathername varchar(150) NOT NULL DEFAULT 'A',
  fathername_k blob  ,
  lastname varchar(150) NOT NULL DEFAULT 'A',
  lastname_k blob ,
  gender varchar(1) NOT NULL DEFAULT 'A',
  usercast varchar(25) NOT NULL DEFAULT 'A',
  usercast_k blob ,
  dob date DEFAULT NULL,
  qualification varchar(255) DEFAULT NULL,
   qualification_k blob ,
  physicallychallanged varchar(1) DEFAULT NULL,
  aadhar varchar(25) NOT NULL DEFAULT 'A',
  voter varchar(25) NOT NULL DEFAULT 'A',
  pancard varchar(25) NOT NULL DEFAULT 'A',
  rationcard varchar(25) DEFAULT NULL,
  rationcardtype varchar(25) DEFAULT NULL,
  kishancard varchar(25) DEFAULT NULL,
  income varchar(15) DEFAULT NULL,
  mailid varchar(150) DEFAULT NULL,
  userstate int(10) DEFAULT NULL,
  district int(10) DEFAULT -1,
  taluk int(10) DEFAULT -1,
  hobli int(10) DEFAULT -1,
  village int(10) DEFAULT -1,
    panchayat int(10) DEFAULT -1,
  constituency int(10) DEFAULT -1,
  landstate int(10) DEFAULT -1,
  landdistrict int(10) DEFAULT -1,
  landtaluk int(10) DEFAULT -1,
  landhobli int(10) DEFAULT -1,
  landvillage int(10) DEFAULT -1,
  landpanchayat int(10) DEFAULT -1,
  landconstituency int(10) DEFAULT -1,
  houseno varchar(25) DEFAULT '',
  street varchar(150) DEFAULT '',
  location varchar(150) DEFAULT '',
  landmark varchar(150) DEFAULT '',
  pincode varchar(25) NOT NULL DEFAULT 'A',
  landlineno varchar(15) DEFAULT '',
  mobileno varchar(15) DEFAULT '',
   bank varchar(25) DEFAULT '',
  ifsc varchar(25) DEFAULT '',
  branch varchar(25) DEFAULT '',
  accountno varchar(25) DEFAULT '',
  PRIMARY KEY (id)
);


CREATE TABLE states (
	id bigint(19) NOT NULL auto_increment,
	state_name varchar(150) NOT NULL,
	state_name_k blob,
	item_type int(10) NOT NULL,
	PRIMARY KEY (id),
	unique key (state_name,item_type)
);

CREATE TABLE district (
	id bigint(19) NOT NULL auto_increment,
	stateid int(10) NOT NULL,
	districtid int(10) NOT NULL,
	PRIMARY KEY (id),
	unique key(stateid,districtid)
) ;
CREATE TABLE taluka (
	id bigint(19) NOT NULL auto_increment,
	stateid int(10) NOT NULL,
	districtid int(10) NOT NULL,
	talukaid int(10) NOT NULL,
	PRIMARY KEY (id),
	unique key(stateid,districtid,talukaid)
) ;
CREATE TABLE hobli (
	id bigint(19) NOT NULL auto_increment,
	stateid int(10) NOT NULL,
	districtid int(10) NOT NULL,
	talukaid int(10) NOT NULL,
	hobliid int(10) NOT NULL,
	PRIMARY KEY (id),
	unique key(stateid,districtid,talukaid,hobliid)
) ;
CREATE TABLE village (
	id bigint(19) NOT NULL auto_increment,
	stateid int(10) NOT NULL,
	districtid int(10) NOT NULL,
	talukaid int(10) NOT NULL,
	hobliid int(10) NOT NULL,
	villageid int(10) NOT NULL,
	PRIMARY KEY (id),
	unique key(stateid,districtid,talukaid,hobliid,villageid)
) ;

CREATE TABLE panchayati (
	id bigint(19) NOT NULL auto_increment,
	stateid int(10) NOT NULL,
	districtid int(10) NOT NULL,
	talukaid int(10) NOT NULL,
	hobliid int(10) NOT NULL,
	villageid int(10) NOT NULL,
	panchayatiid int(10) NOT NULL,
	PRIMARY KEY (id),
	unique key(stateid,districtid,talukaid,hobliid,villageid,panchayatiid)
) ;

CREATE TABLE items (
	item_id bigint(19) NOT NULL auto_increment,
	item_name varchar(150) NOT NULL,
	item_type int(10) NOT NULL,
	PRIMARY KEY (item_id),
	unique key (item_name,item_type)
) ;

CREATE TABLE page_links (
	linkid int(10) NOT NULL,
	linkname varchar(100) NOT NULL,
	PRIMARY KEY (linkid)
) ;

CREATE TABLE role_dtl (
	ROLE_ID int(10) NOT NULL,
	PAGE_LINK_ID int(10) NOT NULL,
	PRIMARY KEY (ROLE_ID,PAGE_LINK_ID)
) ;

CREATE TABLE role_mstr (
	ROLE_ID int(10) NOT NULL,
	ROLE_NAME varchar(100) NOT NULL,
	PRIMARY KEY (ROLE_ID)
) ;

CREATE TABLE schemefilling (
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
	
) ;

CREATE TABLE signup (
	fname varchar(255) NOT NULL,
	lname varchar(255) NOT NULL,
	desigination varchar(255) NOT NULL,
	department varchar(255) NOT NULL,
	email varchar(255) NOT NULL,
	mobileno varchar(255) NOT NULL
) ;

CREATE TABLE subcomponent (
	id bigint(19) NOT NULL auto_increment,
	schemeid int(10) NOT NULL,
	subschemeid int(10) NOT NULL,
	component int(10) NOT NULL,
	subcomponent int(10) NOT NULL,
	PRIMARY KEY (id),
	unique(schemeid,subschemeid,component,subcomponent)
	
) ;

CREATE TABLE subschemes (
	id bigint(19) NOT NULL auto_increment,
	schemeid int(10) NOT NULL,
	subschemeid int(10) NOT NULL,
	PRIMARY KEY (id),
	unique key(schemeid,subschemeid)
) ;

CREATE TABLE user_roles (
	LOGIN_ID varchar(50),
	ROLE_ID int(10) NOT NULL,
	IS_ACTIVE varchar(1)
) ;

INSERT INTO app_login(id, login_id, login_password, isactive, isadmin) VALUES (1, 'ADMIN', 'ADMIN', 'Y', 'Y');

INSERT INTO page_links(linkid, linkname) VALUES (1, 'ADD VILLAGE');

INSERT INTO page_links(linkid, linkname) VALUES (2, 'ADD SCHEMA');

INSERT INTO page_links(linkid, linkname) VALUES (3, 'RESET PASSWORD');

INSERT INTO page_links(linkid, linkname) VALUES (4, 'FARMER REGISTRATION');

INSERT INTO page_links(linkid, linkname) VALUES (5, 'SCHEMA FILLING');

INSERT INTO page_links(linkid, linkname) VALUES (6, 'EXISTING');

INSERT INTO page_links(linkid, linkname) VALUES (7, 'FARMER SEARCH');

INSERT INTO page_links(linkid, linkname) VALUES (8, 'MIS/PMKSY');

INSERT INTO page_links(linkid, linkname) VALUES (9, 'CHD');

INSERT INTO page_links(linkid, linkname) VALUES (10, 'NHM/MIDH');

INSERT INTO page_links(linkid, linkname) VALUES (11, 'RKVY');

INSERT INTO page_links(linkid, linkname) VALUES (12, 'TRACK RECORDS');

INSERT INTO page_links(linkid, linkname) VALUES (13, 'BENEFICIARY');

INSERT INTO page_links(linkid, linkname) VALUES (14, 'RECORD1');

INSERT INTO page_links(linkid, linkname) VALUES (15, 'RECORD2');

INSERT INTO page_links(linkid, linkname) VALUES (16, 'LINK-1');

INSERT INTO page_links(linkid, linkname) VALUES (17, 'ROLE CREATION');

INSERT INTO page_links(linkid, linkname) VALUES (18, 'ROLE MAPPING');

INSERT INTO role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 1);

INSERT INTO role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 2);

INSERT INTO role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 3);

INSERT INTO role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 4);

INSERT INTO role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 5);

INSERT INTO role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 6);

INSERT INTO role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 7);

INSERT INTO role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 8);

INSERT INTO role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 9);

INSERT INTO role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 10);

INSERT INTO role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 11);

INSERT INTO role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 12);

INSERT INTO role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 13);

INSERT INTO role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 14);

INSERT INTO role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 15);

INSERT INTO role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 16);

INSERT INTO role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 17);

INSERT INTO role_dtl(ROLE_ID, PAGE_LINK_ID) VALUES (1, 18);

INSERT INTO role_mstr(ROLE_ID, ROLE_NAME) VALUES (1, 'ADMIN_ROLE');

INSERT INTO signup(fname, lname, desigination, department, email, mobileno) VALUES ('anil', 'kumar', 'developer', 'dev', 'anil2k12@gmail.com', '8106231231');

INSERT INTO user_roles(LOGIN_ID, ROLE_ID, IS_ACTIVE) VALUES ('1', 1, 'Y');

INSERT INTO user_roles(LOGIN_ID, ROLE_ID, IS_ACTIVE) VALUES ('ADMIN', 1, 'Y');

 

