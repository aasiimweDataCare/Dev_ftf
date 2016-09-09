SELECT 
`t`.`traderName` as Trader,
`v`.`vAgentName` as VillageAgent,
`g`.`groupName`,
`g`.`groupCode`, 
`g`.`numMembersTotal` as `Grouped Farmers`,
count(`f`.`tbl_farmersId`) as `Actual Grouped Farmers`
FROM 
`tbl_farmers` as `f`,
`tbl_villageagent_groups` as `g`,
`tbl_villageagents` as `v`,
`tbl_traders` as `t`
where `t`.`tbl_tradersId`=`v`.`tbl_tradersId`
and `v`.`tbl_tradersId`=`g`.`tbl_tradersId`
and `g`.`tbl_tradersId`=`f`.`tbl_tradersId`
and `v`.`tbl_villageAgentId`=`g`.`tbl_villageAgentId`
and `g`.`tbl_villageAgentId`=`f`.`tbl_villageAgentId`
and `g`.`tbl_villageagent_groupsId`= `f`.`tbl_villageagent_groupsId`
group by `f`.`tbl_villageagent_groupsId`
order by `g`.`groupName`


SELECT 
`t`.`traderName` as Trader,
`v`.`vAgentName` as VillageAgent,
`g`.`groupName`,
`f`.`groupName`,
`g`.`groupCode`, 
`f`.`farmersName`,
`t`.`tbl_tradersId` as `Trader Code in Traders Table`,
`v`.`tbl_tradersId` as `Trader Code in VA Table`
FROM 
`tbl_farmers` as `f`,
`tbl_villageagent_groups` as `g`,
`tbl_villageagents` as `v`,
`tbl_traders` as `t`
where `t`.`tbl_tradersId`<>`v`.`tbl_tradersId`
and `v`.`tbl_tradersId`=`g`.`tbl_tradersId`
and `g`.`tbl_tradersId`=`f`.`tbl_tradersId`
and `v`.`tbl_villageAgentId`=`g`.`tbl_villageAgentId`
and `g`.`tbl_villageAgentId`=`f`.`tbl_villageAgentId`
and `g`.`tbl_villageagent_groupsId`= `f`.`tbl_villageagent_groupsId`
group by `f`.`tbl_villageagent_groupsId`
order by `g`.`groupName`




 SELECT `f`.`tbl_villageagent_groupsId`,`tbl_tradersId`, `tbl_villageAgentId`, `reportingPeriod`,`farmersDistrict`, `farmersSubcounty`, `farmersSex`, `f`.`groupName`,`f`.`farmersName` 
FROM `tbl_farmers` as `f` 
WHERE `f`.`tbl_tradersId` NOT IN (SELECT `tbl_tradersId` FROM `tbl_traders`)
order by `f`.`tbl_villageagent_groupsId`,`f`.`groupName`,`farmersSex`;

---query for groups with no farmers-----
SELECT `t`.`traderName` as Trader,
`v`.`vAgentName` as VillageAgent,
`g`.`groupName`,
`g`.`groupCode`, 
`g`.`numMembersTotal` as `Grouped Farmers`
FROM `tbl_villageagent_groups` as `g`,
`tbl_villageagents` as `v`,
`tbl_traders` as `t`
WHERE `g`.`tbl_villageagent_groupsId` NOT IN (SELECT `f`.`tbl_villageagent_groupsId` FROM `tbl_farmers` as `f`)
and `t`.`tbl_tradersId`=`v`.`tbl_tradersId`
and `v`.`tbl_tradersId`=`g`.`tbl_tradersId`
and `v`.`tbl_villageAgentId`=`g`.`tbl_villageAgentId`
order by `g`.`groupName` ASC  ;
----farmers with no Groups----




INSERT INTO `tbl_villageagent_groups`(`tbl_villageagent_groupsId`, `tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('666','77','205',
 'Apr - Sep 2014','TURIBASYAKA KAYONZA',
 '7','7','14',
 '436','415667');
 
 INSERT INTO `tbl_villageagent_groups`(`tbl_villageagent_groupsId`, `tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('668','65','97',
 'Apr - Sep 2014','KALALABA COFFEE MODERN FARM',
 '5','5','10',
 '206','206305');
 
  INSERT INTO `tbl_villageagent_groups`(`tbl_villageagent_groupsId`, `tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('708','104','387',
 'Apr - Sep 2014','UJJAMA FARMERS',
 '2','0','10',
 '409','409306');
 
  INSERT INTO `tbl_villageagent_groups`(`tbl_villageagent_groupsId`, `tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('843','12','71',
 'Apr - Sep 2014','AGALIAWAMU WOMENS GROUP',
 '20','0','20',
 '224','224007');
 
 
---------start of new groups--------- 
 INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('63','118',
 'Apr - Sep 2014','MWINO AKUWA IGOMBE GROUP','2-11-13-1',
 '11','9','20',
 '229','229004');
 
INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('63','118',
 'Apr - Sep 2014','JOYFORD','2-11-13-2',
 '5','6','11',
 '229','229004');
 
   INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('54','349',
 'Apr - Sep 2014','BUSOOMA TWEGAITE FARMERS GROUP','2-13-06-1',
 '1','4','5',
 '205','205205');
 
 INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('54','349',
 'Apr - Sep 2014','FITINA MBAYA','2-13-06-2',
 '1','7','8',
 '474','521002');
 
  INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('54','349',
 'Apr - Sep 2014','BUTENDE TUGEMERE WALALA','2-13-06-3',
 '3','3','6',
 '205','205205');
 
 INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('54','349',
 'Apr - Sep 2014','TWISANIA FARMERS GROUP','2-13-06-4',
 '4','3','7',
 '205','205205');
 
  INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('113','380',
 'Apr - Sep 2014','CAN.OROMA','3-03-02-1',
 '4','4','8',
 '467','415297');
 
   INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('71','410',
 'Apr - Sep 2014','BUMATUFU COFFEE FARMERS GROUP','2-28-10-1',
 '18','32','50',
 '215','215101');
 
    INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('115','417',
 'Apr - Sep 2014','BWEYALE RURAL PRODUCERS','3-15-03-1',
 '22','28','50',
 '474','521002');
 
     INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('115','421',
 'Apr - Sep 2014','LUBANGA LUKICA GROUP','3-15-07-1',
 '4','6','10',
 '474','521002');
 
      INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('115','421',
 'Apr - Sep 2014','YENYO KWO','3-15-07-2',
 '5','5','10',
 '474','521002');
 
       INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('115','421',
 'Apr - Sep 2014','RIPE-ATE LONYO','3-15-07-3',
 '5','25','30',
 '474','521002');
 
        INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('115','421',
 'Apr - Sep 2014','LUBANGA LAKICA GROUP','3-15-07-4',
 '15','5','20',
 '474','521002');
 
         INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('115','421',
 'Apr - Sep 2014','FENE GROUP','3-15-07-5',
 '7','3','10',
 '215','415600');
 
          INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('115','421',
 'Apr - Sep 2014','RYEMO-CAN','3-15-07-6',
 '5','5','10',
 '474','521002');
 
           INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('115','422',
 'Apr - Sep 2014','BWEYALE RPO','3-15-08-1',
 '4','1','5',
 '474','521002');
 
            INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('49','451',
 'Apr - Sep 2014','MATOVU RURAL','2-01-08-1',
 '16','9','25',
 '201','201114');
 
             INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('49','451',
 'Apr - Sep 2014','BUKADDEMAGEZI','2-01-08-2',
 '5','20','25',
 '201','201114');
 
              INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('49','451',
 'Apr - Sep 2014','MATOVU R.P.O','2-01-08-3',
 '32','54','86',
 '201','201114');
 
               INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('49','451',
 'Apr - Sep 2014','NAMPERE YOUTH PROJECT','2-01-08-4',
 '3','15','18',
 '201','201114');
 
                INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('49','451',
 'Apr - Sep 2014','KYEBAJJA KOBONA FARMERS GROUP','2-01-08-5',
 '12','9','21',
 '201','201114');
 
                 INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('49','453',
 'Apr - Sep 2014','TUKOLERE WALALA','2-01-10-1',
 '11','19','30',
 '201','201114');
 
                  INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('49','453',
 'Apr - Sep 2014','BWAISE WANSI DEVT C ORG','2-01-10-2',
 '18','12','30',
 '201','201114');
 
                   INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('49','453',
 'Apr - Sep 2014','BAKUSEKA MAAJA','2-01-10-3',
 '13','17','30',
 '201','201114');
 
                    INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('49','453',
 'Apr - Sep 2014','KOBERAKU MWINO','2-01-10-4',
 '16','14','30',
 '201','201114');
 
                     INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('49','453',
 'Apr - Sep 2014','TRUST F ASS','2-01-10-5',
 '15','15','30',
 '201','201114');
 
                      INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('49','453',
 'Apr - Sep 2014','KUGUMIKIRIZA FG','2-01-10-6',
 '7','13','20',
 '201','201114');
 
                       INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('49','453',
 'Apr - Sep 2014','KASADHA GROUP','2-01-10-7',
 '12','15','27',
 '201','201114');
 
                        INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('49','453',
 'Apr - Sep 2014','KITSI FARMERS GROUP','2-01-10-8',
 '22','8','30',
 '216','216002');
 
                        INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('49','453',
 'Apr - Sep 2014','BWALULA SACCO','2-01-10-9',
 '9','11','20',
 '201','201114');
 
                         INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('49','453',
 'Apr - Sep 2014','ISEGERO YOUTH SAVINGS AND CREDIT ASS','2-01-10-10',
 '3','22','25',
 '201','201114');
 
                          INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('115','567',
 'Apr - Sep 2014','No Group','0-00-00-01',
 '2','8','10',
 '474','474105');
 
 
INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('115','573',
 'Apr - Sep 2014','YAJASHO','3-15-07-1',
 '17','31','48',
 '474','521002'); 
 
 INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('115','578',
 'Apr - Sep 2014','No Group','0-00-00-01',
 '2','4','6',
 '474','521002'); 

 INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('115','580',
 'Apr - Sep 2014','YELEKENI R.P.O','3-15-14-1',
 '12','17','29',
 '474','521002'); 

  INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('115','581',
 'Apr - Sep 2014','YEREKENI BUREHOLE GROUP','3-15-15-1',
 '17','3','20',
 '474','521002'); 
 
   INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('115','581',
 'Apr - Sep 2014','YELEKENI SCHOOL BOREHOLE','3-15-15-2',
 '7','13','20',
 '474','521002'); 
 
   INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('115','581',
 'Apr - Sep 2014','APOWEGI GROUP','3-15-15-3',
 '0','6','6',
 '474','521002');  
 
    INSERT INTO `tbl_villageagent_groups`(`tbl_tradersId`, `tbl_villageAgentId`,
 `reportingPeriod`, `groupName`,`groupCode`,
 `numMembersFemale`, `numMembersMale`, `numMembersTotal`,
 `groupDistrict`, `groupSubcounty`) 
 VALUES ('115','586',
 'Apr - Sep 2014','MASABA  RPO','3-15-20-3',
 '3','6','9',
 '474','521002');  
 
 
 UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2138'
WHERE `tbl_tradersId`='118'
and `tbl_villageAgentId`='63'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='MWINO AKUWA IGOMBE GROUP'
and  `farmersDistrict`='229'
and  `farmersSubcounty`='229004';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2139'
WHERE `tbl_tradersId`='118'
and `tbl_villageAgentId`='63'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='JOYFORD'
and `farmersDistrict`='229'
and `farmersSubcounty`='229004';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2140'
WHERE `tbl_tradersId`='54'
and `tbl_villageAgentId`='349'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='BUSOOMA TWEGAITE FARMERS GROUP'
and `farmersDistrict`='205'
and `farmersSubcounty`='205205';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2141'
WHERE `tbl_tradersId`='54'
and `tbl_villageAgentId`='349'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='FITINA MBAYA'
and `farmersDistrict`='474'
and `farmersSubcounty`='521002';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2142'
WHERE `tbl_tradersId`='54'
and `tbl_villageAgentId`='349'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='BUTENDE TUGEMERE WALALA'
and `farmersDistrict`='205'
and `farmersSubcounty`='205205';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2143'
WHERE `tbl_tradersId`='54'
and `tbl_villageAgentId`='349'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='TWISANIA FARMERS GROUP'
and `farmersDistrict`='205'
and `farmersSubcounty`='205205';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2144'
WHERE `tbl_tradersId`='113'
and `tbl_villageAgentId`='380'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='CAN.OROMA'
and `farmersDistrict`='467'
and `farmersSubcounty`='415297';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2145'
WHERE `tbl_tradersId`='71'
and `tbl_villageAgentId`='410'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='BUMATUFU COFFEE FARMERS GROUP'
and `farmersDistrict`='215'
and `farmersSubcounty`='215101';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2146'
WHERE `tbl_tradersId`='115'
and `tbl_villageAgentId`='417'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='BWEYALE RURAL PRODUCERS'
and  `farmersDistrict`='474'
and  `farmersSubcounty`='521002';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2147'
WHERE `tbl_tradersId`='115'
and `tbl_villageAgentId`='421'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='LUBANGA LUKICA GROUP'
and  `farmersDistrict`='474'
and  `farmersSubcounty`='521002';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2148'
WHERE `tbl_tradersId`='115'
and `tbl_villageAgentId`='421'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='YENYO KWO'
and  `farmersDistrict`='474'
and  `farmersSubcounty`='521002';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2149'
WHERE `tbl_tradersId`='115'
and `tbl_villageAgentId`='421'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='RIPE-ATE LONYO'
and  `farmersDistrict`='474'
and  `farmersSubcounty`='521002';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2150'
WHERE `tbl_tradersId`='115'
and `tbl_villageAgentId`='421'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='LUBANGA LAKICA GROUP'
and  `farmersDistrict`='474'
and  `farmersSubcounty`='521002';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2151'
WHERE `tbl_tradersId`='115'
and `tbl_villageAgentId`='421'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='FENE GROUP'
and `farmersDistrict`='215'
and `farmersSubcounty`='415600';


UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2152'
WHERE `tbl_tradersId`='115'
and `tbl_villageAgentId`='421'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='RYEMO-CAN'
and  `farmersDistrict`='474'
and  `farmersSubcounty`='521002';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2153'
WHERE `tbl_tradersId`='115'
and `tbl_villageAgentId`='421'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='BWEYALE RPO'
and  `farmersDistrict`='474'
and  `farmersSubcounty`='521002';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2154'
WHERE `tbl_tradersId`='49'
and `tbl_villageAgentId`='451'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='MATOVU RURAL'
and `farmersDistrict`='201'
and `farmersSubcounty`='201114';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2155'
WHERE `tbl_tradersId`='49'
and `tbl_villageAgentId`='451'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='BUKADDEMAGEZI'
and `farmersDistrict`='201'
and `farmersSubcounty`='201114';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2156'
WHERE `tbl_tradersId`='49'
and `tbl_villageAgentId`='451'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='MATOVU R.P.O'
and `farmersDistrict`='201'
and `farmersSubcounty`='201114';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2157'
WHERE `tbl_tradersId`='49'
and `tbl_villageAgentId`='451'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='NAMPERE YOUTH PROJECT'
and `farmersDistrict`='201'
and `farmersSubcounty`='201114';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2158'
WHERE `tbl_tradersId`='49'
and `tbl_villageAgentId`='451'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='KYEBAJJA KOBONA FARMERS GROUP'
and `farmersDistrict`='201'
and `farmersSubcounty`='201114';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2159'
WHERE `tbl_tradersId`='49'
and `tbl_villageAgentId`='453'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='TUKOLERE WALALA'
and `farmersDistrict`='201'
and `farmersSubcounty`='201114';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2160'
WHERE `tbl_tradersId`='49'
and `tbl_villageAgentId`='453'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='BWAISE WANSI DEVT C ORG'
and `farmersDistrict`='201'
and `farmersSubcounty`='201114';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2161'
WHERE `tbl_tradersId`='49'
and `tbl_villageAgentId`='453'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='BAKUSEKA MAAJA'
and `farmersDistrict`='201'
and `farmersSubcounty`='201114';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2162'
WHERE `tbl_tradersId`='49'
and `tbl_villageAgentId`='453'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='KOBERAKU MWINO'
and `farmersDistrict`='201'
and `farmersSubcounty`='201114';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2163'
WHERE `tbl_tradersId`='49'
and `tbl_villageAgentId`='453'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='TRUST F ASS'
and `farmersDistrict`='201'
and `farmersSubcounty`='201114';


UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2164'
WHERE `tbl_tradersId`='49'
and `tbl_villageAgentId`='453'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='KUGUMIKIRIZA FG'
and `farmersDistrict`='201'
and `farmersSubcounty`='201114';


UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2165'
WHERE `tbl_tradersId`='49'
and `tbl_villageAgentId`='453'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='KASADHA GROUP'
and `farmersDistrict`='201'
and `farmersSubcounty`='201114';

UPDATE `tbl_farmers` SET
`tbl_villageagent_groupsId`='2166' 
WHERE `tbl_tradersId`='49'
and `tbl_villageAgentId`='453'
and `tbl_villageAgentId`='63'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='KITSI FARMERS GROUP'
and `farmersDistrict`='216'
and `farmersSubcounty`='216002';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2167'
WHERE `tbl_tradersId`='49'
and `tbl_villageAgentId`='453'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='BWALULA SACCO'
and `farmersDistrict`='201'
and `farmersSubcounty`='201114';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2168'
WHERE `tbl_tradersId`='49'
and `tbl_villageAgentId`='453'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='ISEGERO YOUTH SAVINGS AND CREDIT ASS'
and `farmersDistrict`='201'
and `farmersSubcounty`='201114';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2169'
WHERE `tbl_tradersId`='115'
and `tbl_villageAgentId`='567'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='No Group'
and `farmersDistrict`='474'
and `farmersSubcounty`='474105';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2170'
WHERE `tbl_tradersId`='115'
and `tbl_villageAgentId`='573'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='YAJASHO'
and `farmersDistrict`='474'
and `farmersSubcounty`='521002';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2171'
WHERE `tbl_tradersId`='115'
and `tbl_villageAgentId`='578'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='No Group'
and `farmersDistrict`='474'
and `farmersSubcounty`='521002';


UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2172'
WHERE `tbl_tradersId`='115'
and `tbl_villageAgentId`='580'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='YELEKENI R.P.O'
and `farmersDistrict`='474'
and `farmersSubcounty`='521002';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2173'
WHERE `tbl_tradersId`='115'
and `tbl_villageAgentId`='581'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='YEREKENI BUREHOLE GROUP'
and `farmersDistrict`='474'
and `farmersSubcounty`='521002';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2174'
WHERE `tbl_tradersId`='115'
and `tbl_villageAgentId`='581'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='YELEKENI SCHOOL BOREHOLE'
and `farmersDistrict`='474'
and `farmersSubcounty`='521002';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2175'
WHERE `tbl_tradersId`='115'
and `tbl_villageAgentId`='581'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='APOWEGI GROUP'
and `farmersDistrict`='474'
and `farmersSubcounty`='521002';

UPDATE `tbl_farmers` SET 
`tbl_villageagent_groupsId`='2176'
WHERE `tbl_tradersId`='115'
and `tbl_villageAgentId`='586'
and `reportingPeriod`='Apr - Sep 2014'
and `groupName`='MASABA  RPO'
and `farmersDistrict`='474'
and `farmersSubcounty`='521002';

 --------------------end of new groups--------------
 
 
 
 
 
ALTER TABLE `tbl_farmers` CHANGE `tbl_farmersId` `tbl_farmersId` INT(200) NOT NULL AUTO_INCREMENT, CHANGE `memberDstart` `memberDstart` DATE NULL, CHANGE `memberStatus` `memberStatus` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `farmersDob` `farmersDob` DATE NULL DEFAULT '2013-03-01', CHANGE `farmersVillage` `farmersVillage` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `farmersTel` `farmersTel` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `hhDob` `hhDob` DATE NULL DEFAULT NULL, CHANGE `hhHeadDStart` `hhHeadDStart` DATE NULL DEFAULT NULL, CHANGE `hhArea` `hhArea` FLOAT NULL, CHANGE `hhStatus` `hhStatus` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `hsComposition` `hsComposition` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;










