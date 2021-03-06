CREATE TABLE app_login (id bigint(10) NOT NULL auto_increment,login_id varchar(25) not null,login_password varchar(225) not null,
	isactive varchar(1),isadmin varchar(1),designation varchar(50) DEFAULT 'NA' NOT NULL,
	PRIMARY KEY (id),
	unique key(login_id)
) ;
CREATE TABLE  sanctionorder ( `filling_id` INT NOT NULL , 
`approvedby` INT NOT NULL ,
 `approveddate` TIMESTAMP NOT NULL ,
 `billno` VARCHAR(25) NOT NULL ,
 `billamount` FLOAT NOT NULL , 
 `sanctionamt` FLOAT NOT NULL ,
 `installment_1` FLOAT NOT NULL ,
 `installment_2` FLOAT NOT NULL ,
 `ref_1` BLOB ,
 `ref_2` BLOB  ,
 `ref_3` BLOB  , 
 `ref_4` BLOB  );
 CREATE TABLE  financialyear
(finyear varchar(8),
startfrom DATE,
endson DATE,
active VARCHAR(1));
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
  physicallychallanged varchar(1) DEFAULT 'N',
  aadhar varchar(25) NOT NULL DEFAULT 'A',
  voter varchar(25) NOT NULL DEFAULT 'A',
  pancard varchar(25) NOT NULL DEFAULT 'A',
  rationcard varchar(25) DEFAULT NULL,
  rationcardtype varchar(25) DEFAULT NULL,
  kishancard varchar(25) DEFAULT NULL,
  income varchar(15) DEFAULT NULL,
  mailid varchar(150) DEFAULT NULL,
  village int(10) DEFAULT -1,
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
	constituencyid int(10) NOT NULL,
	PRIMARY KEY (id),
	unique key(stateid,districtid,talukaid,constituencyid,hobliid)
) ;
CREATE TABLE constituency (
	id bigint(19) NOT NULL auto_increment,
	stateid int(10) NOT NULL,
	districtid int(10) NOT NULL,
	talukaid int(10) NOT NULL,
	constituencyid int(10) NOT NULL,
	PRIMARY KEY (id),
	unique key(stateid,districtid,talukaid,constituencyid)
) ;
CREATE TABLE village (
	id bigint(19) NOT NULL auto_increment,
	stateid int(10) NOT NULL,
	districtid int(10) NOT NULL,
	talukaid int(10) NOT NULL,
	hobliid int(10) NOT NULL,
	constituencyid int(10) not null,
	panchayatiid int(10) NOT NULL,
	villageid int(10) NOT NULL,
	zpid int(10) not null,
	tpid int(10) not null,
	PRIMARY KEY (id),
	unique key(stateid,districtid,talukaid,hobliid,constituencyid,panchayatiid,villageid)
) ;

CREATE TABLE panchayati (
	id bigint(19) NOT NULL auto_increment,
	stateid int(10) NOT NULL,
	districtid int(10) NOT NULL,
	talukaid int(10) NOT NULL,
	hobliid int(10) NOT NULL,
	constituencyid int(10) NOT NULL,
	panchayatiid int(10) NOT NULL,
	PRIMARY KEY (id),
	unique key(stateid,districtid,talukaid,hobliid,constituencyid,panchayatiid)
) ;

 
CREATE TABLE schemes (
	id bigint(19) NOT NULL auto_increment,
	name varchar(150) NOT NULL,
	parent_id int(10) NOT NULL,
	fillingtype varchar(1),
	PRIMARY KEY (id),
	unique key (name,parent_id)
) ;


CREATE TABLE page_links (
	linkid int(10) NOT NULL,
	linkname varchar(100) NOT NULL,
	PRIMARY KEY (linkid)
) ;

CREATE TABLE role_dtl (
	role_id int(10) NOT NULL,
	page_link_id int(10) NOT NULL,
	PRIMARY KEY (role_id,page_link_id)
) ;

CREATE TABLE role_mstr (
	role_id int(10) NOT NULL auto_increment,
	role_name varchar(100) NOT NULL,
	PRIMARY KEY (role_id)
) ;

CREATE TABLE schemefilling (
	id bigint(10) NOT NULL auto_increment,
	regid int(10) NOT NULL,
	schemeid int(10) NOT NULL,
	subschemeid int(10),
	component int(10),
	component1 int(10),
	component2 int(10),
	component3 int(10),
	component4 int(10),
 	item1 int(10),
	item2 int(10),
	item3 int(10),
	regdate date,
	regby int(10),
	status int default '1',
 	area1 FLOAT,
	area2 FLOAT,
	area3 FLOAT,
	finacyear varchar(30),
	uniquecode varchar(50),
	PRIMARY KEY (id)
	
) ;
create table schemefilling_land(
fillingid int,
landdetailsid int
);
CREATE TABLE signup (
	fname varchar(255) NOT NULL,
	fname_k blob,
	lname varchar(255) NOT NULL,
	lname_k blob,
	desigination varchar(255) NOT NULL,
	desigination_k blob,
	department varchar(255) NOT NULL,
	email varchar(255) NOT NULL,
	mobileno varchar(255) NOT NULL
) ;
 

CREATE TABLE user_roles (
	login_id varchar(50),
	role_id int(10) NOT NULL,
	is_active varchar(1)
) ;
CREATE TABLE  actionmapping
(regid INT NOT NULL,
hobliid INT NOT NULL,
PRIMARY KEY (regid, hobliid));

CREATE TABLE logtracking
(schemefillingid INT,
createdby INT NOT NULL,
createdtime TIMESTAMP DEFAULT current_timestamp,
remarks text,
statusat VARCHAR(2));



CREATE TABLE  schemerejection
(schemefillingid INT NOT NULL,
remarks text,
rejectiondate date,
rejected_by int,
rejected_at int,
PRIMARY KEY (schemefillingid));

CREATE TABLE  landdetails
(id INT NOT NULL auto_increment,
regid int not null,
villageid int not null,
landsono varchar(150),
address text,
pincode varchar(10),
totalland VARCHAR(25),
units VARCHAR(25),
PRIMARY KEY (id));

CREATE TABLE  casts
(id INT NOT NULL auto_increment,
castname varchar(255),
castname_k blob,
castcode varchar(5),
PRIMARY KEY (id),
unique key(castname)
);

create table actionforwards(
subschemeid int not null,
action varchar(1),
primary key(subschemeid)
);

CREATE TABLE  dealers_company
(id INT NOT NULL auto_increment,
name varchar(255),
name_k blob,
parent_id int,
PRIMARY KEY (id),
unique key(name,parent_id)
);

CREATE TABLE cropitems (
	id bigint(19) NOT NULL auto_increment,
	cropname varchar(150) NOT NULL,
	cropname_k blob,
	PRIMARY KEY (id),
	unique key (cropname)
);
CREATE TABLE cropitemsprice (
	id bigint(19) NOT NULL auto_increment,
	itemname varchar(150) NOT NULL,
	itemprice float,
	units varchar(15),
	standard_measure varchar(50) NOT NULL,
	itemorder int,
	isdeduct varchar(1) default 'N',
	isvat varchar(1) default 'Y',
	PRIMARY KEY (id),
	unique key (itemname,standard_measure)
);

CREATE TABLE spacing
(id INT NOT NULL AUTO_INCREMENT,
spacing VARCHAR(50) NOT NULL,
startfrom float  not null,
endsat	float not null,
PRIMARY KEY (id),
UNIQUE (spacing));

CREATE TABLE  spacing_installdetails
(spacingid INT NOT NULL,
spacing_area VARCHAR(25) NOT NULL,
amount float(25),
PRIMARY KEY (spacingid, spacing_area));


CREATE TABLE  spacing_subcd
(spacingid INT NOT NULL,
spacing_area VARCHAR(25) NOT NULL,
amount float(25),
percentage float,
PRIMARY KEY (spacingid, spacing_area,percentage));

CREATE TABLE  preinspection
(filling_id INT NOT NULL,
croparea1 float,
croparea2 float,
croparea3 float,
spacing1 float,
spacing2 float,
spacing3 float,
spacing4 float,
spacing5 float,
spacing6 float,
inspectiondate date,
enter_date TIMESTAMP DEFAULT current_timestamp,
inspectedby int,
dealer int,
quatationamt float,
irrigation int,
PRIMARY KEY (filling_id));
CREATE TABLE  workorder
(filling_id INT NOT NULL,
 forward_by int,
 forwarddate date,
PRIMARY KEY (filling_id));

CREATE TABLE  workorder_approval
(filling_id INT NOT NULL,
 approved_by int,
 approved_date date,
 workorderno varchar(25), 
PRIMARY KEY (filling_id),
unique key(workorderno));

CREATE TABLE  postinspection
(filling_id INT NOT NULL,
 forward_by int,
 forwarddate date,
PRIMARY KEY (filling_id));

CREATE TABLE  postinspection_mstr
(filling_id INT NOT NULL,
 inspected_by int,
 inspected_date date,
 crop1 int,
 crop2 int,
 crop3 int,
 area1 float,
 area2 float,
 area3 float,
 spacing1 float,
 spacing2 float, 
 spacing3 float,
 spacing4 float,
 spacing5 float, 
 spacing6 float,
 pspacing1 float,
 pspacing2 float, 
 pspacing3 float,
 aspacing1 float,
 aspacing2 float, 
 aspacing3 float,
PRIMARY KEY (filling_id));




CREATE TABLE  postinspection_dtl(
filling_id int,item_id int, dealeramt float,dealerqty float, ggrcamt float,ggrcqty float
);
CREATE TABLE talukaapproval_mstr
(filling_id INT NOT NULL,
approvedby int NOT NULL,
approveddate date NOT NULL,
isdeductable VARCHAR(1),
preallocted FLOAT,
reasonfor_deduction TEXT,
approvedamount float,
PRIMARY KEY (filling_id));

CREATE TABLE  talukaapproval_dtl(
filling_id int,item_id int, dealeramt float,dealerqty float, ggrcamt float,ggrcqty float
);

INSERT INTO app_login(id, login_id, login_password, isactive, isadmin,designation) VALUES (1, 'ADMIN', 'ADMIN', 'Y', 'Y','ALL');

INSERT INTO page_links(linkid, linkname) VALUES (1, 'ADD VILLAGE');

INSERT INTO page_links(linkid, linkname) VALUES (2, 'ADD SCHEMA');

INSERT INTO page_links(linkid, linkname) VALUES (3, 'CAST');

INSERT INTO page_links(linkid, linkname) VALUES (4, 'ADD USER');

INSERT INTO page_links(linkid, linkname) VALUES (5, 'ADD SPACING');

INSERT INTO page_links(linkid, linkname) VALUES (6, 'VILLAGE PREVILAGE');

INSERT INTO page_links(linkid, linkname) VALUES (7, 'ROLE CREATION');

INSERT INTO page_links(linkid, linkname) VALUES (8, 'ROLE MAPPING');

INSERT INTO page_links(linkid, linkname) VALUES (9, 'FARMER REGISTRATION');

INSERT INTO page_links(linkid, linkname) VALUES (10, 'LAND DETAILS');

INSERT INTO page_links(linkid, linkname) VALUES (11, 'SCHEME FILLING');

INSERT INTO page_links(linkid, linkname) VALUES (12, 'ADD CROP');

INSERT INTO page_links(linkid, linkname) VALUES (13, 'ADD DEALER');

INSERT INTO page_links(linkid, linkname) VALUES (14, 'PROPOSAL');

INSERT INTO page_links(linkid, linkname) VALUES (15, 'TRACK RECORD');

INSERT INTO page_links(linkid, linkname) VALUES (16, 'BENEFICIARY');

INSERT INTO page_links(linkid, linkname) VALUES (17, 'PROPOSALE REPORT');

INSERT INTO page_links(linkid, linkname) VALUES (18, 'REPORT TRACK RECORD');
 
INSERT INTO role_dtl(role_id, page_link_id) VALUES (1, 1);
INSERT INTO role_dtl(role_id, page_link_id) VALUES (1, 2);
INSERT INTO role_dtl(role_id, page_link_id) VALUES (1, 3);
INSERT INTO role_dtl(role_id, page_link_id) VALUES (1, 4);
INSERT INTO role_dtl(role_id, page_link_id) VALUES (1, 5);
INSERT INTO role_dtl(role_id, page_link_id) VALUES (1, 6);
INSERT INTO role_dtl(role_id, page_link_id) VALUES (1, 7);
INSERT INTO role_dtl(role_id, page_link_id) VALUES (1, 8);
INSERT INTO role_dtl(role_id, page_link_id) VALUES (1, 9);
INSERT INTO role_dtl(role_id, page_link_id) VALUES (1, 10);
INSERT INTO role_dtl(role_id, page_link_id) VALUES (1, 11);
INSERT INTO role_dtl(role_id, page_link_id) VALUES (1, 12);
INSERT INTO role_dtl(role_id, page_link_id) VALUES (1, 13);
INSERT INTO role_dtl(role_id, page_link_id) VALUES (1, 14);
INSERT INTO role_dtl(role_id, page_link_id) VALUES (1, 15);
INSERT INTO role_dtl(role_id, page_link_id) VALUES (1, 16);
INSERT INTO role_dtl(role_id, page_link_id) VALUES (1, 17);
INSERT INTO role_dtl(role_id, page_link_id) VALUES (1, 18);
INSERT INTO role_dtl(role_id, page_link_id) VALUES (1, 19);
INSERT INTO role_dtl(role_id, page_link_id) VALUES (1, 20);
INSERT INTO role_mstr(role_id, role_name) VALUES (1, 'ADMIN_ROLE');

INSERT INTO user_roles(login_id, role_id, is_active) VALUES ('ADMIN', 1, 'Y');
insert into financialyear values('2011-12','2011-04-01','2012-03-31','N');
insert into financialyear values('2012-13','2012-04-01','2013-03-31','N');
insert into financialyear values('2013-14','2013-04-01','2014-03-31','N');
insert into financialyear values('2014-15','2014-04-01','2015-03-31','N');
insert into financialyear values('2015-16','2015-04-01','2016-03-31','N');
insert into financialyear values('2016-17','2016-04-01','2017-03-31','Y');
insert into financialyear values('2017-18','2017-04-01','2018-03-31','N');
insert into financialyear values('2018-19','2018-04-01','2019-03-31','N');

 

