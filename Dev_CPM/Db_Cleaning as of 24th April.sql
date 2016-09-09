DELETE FROM `tbl_traders` WHERE `tbl_tradersId`='125';
/* affected by alteration of Trader
125 updated to 28
 */
UPDATE `tbl_demo_records_book` SET `demoNameTrader`=28 WHERE `demoNameTrader`=125;
UPDATE `tbl_farmers` SET `tbl_tradersId`=28 WHERE `tbl_tradersId`=125;
UPDATE `tbl_form4_traders` SET `tbl_traderId`=28 WHERE `tbl_traderId`=125;
UPDATE `tbl_villageagents` SET `tbl_tradersId`=28 WHERE `tbl_tradersId`=125;
UPDATE `tbl_villageagent_groups` SET `tbl_tradersId`=28 WHERE `tbl_tradersId`=125;
 
DELETE FROM `tbl_traders` WHERE `tbl_tradersId`='150';
/* affected by alteration of Trader
150 updated to 41
 */
UPDATE `tbl_demo_records_book` SET `demoNameTrader`=41 WHERE `demoNameTrader`=150;
UPDATE `tbl_farmers` SET `tbl_tradersId`=41 WHERE `tbl_tradersId`=150;
UPDATE `tbl_form4_traders` SET `tbl_traderId`=41 WHERE `tbl_traderId`=150;
UPDATE `tbl_villageagents` SET `tbl_tradersId`=41 WHERE `tbl_tradersId`=150;
UPDATE `tbl_villageagent_groups` SET `tbl_tradersId`=41 WHERE `tbl_tradersId`=150;
 
DELETE FROM `tbl_traders` WHERE `tbl_tradersId`='136';
/* affected by alteration of Trader
136 updated to 174
 */
UPDATE `tbl_demo_records_book` SET `demoNameTrader`=174 WHERE `demoNameTrader`=136;
UPDATE `tbl_farmers` SET `tbl_tradersId`=174 WHERE `tbl_tradersId`=136;
UPDATE `tbl_form4_traders` SET `tbl_traderId`=174 WHERE `tbl_traderId`=136;
UPDATE `tbl_villageagents` SET `tbl_tradersId`=174 WHERE `tbl_tradersId`=136;
UPDATE `tbl_villageagent_groups` SET `tbl_tradersId`=174 WHERE `tbl_tradersId`=136; 
/* end of tables affected by trader Update */



UPDATE `tbl_villageagents` SET `vAgentCode`='1-15-02' WHERE `tbl_villageAgentId`=487;


/* ==========================================End of Trader cleaning========================================= */


/* ============================Start of Duplicate VA Cleaning=========================================== */



/* ============================End of Duplicate VA Cleaning=========================================== */





