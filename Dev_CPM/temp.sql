----first update scripts---
update `tbl_techadoption` set reportingMonth=DateSubmission where reportingMonth is null; 
update `tbl_mediaprograms` set reportingMonth=DateSubmission where reportingMonth is null; 
update `tbl_laboursavingtech` set reportingMonth=DateSubmission where reportingMonth is null; 
-----second update scripts-----


SELECT `tbl_laboursavingtechId`,
`reportingPeriod`,
`year`,
`DateSubmission`,
`reportingMonth`,
if(right(`reportingPeriod`,3)='Mar', STR_TO_DATE(concat(year(reportingMonth),'-03-31'), '%c/%e/%Y %r'), STR_TO_DATE(concat(year(reportingMonth),'-04-31'), '%c/%e/%Y %r')) as `newDate`,
right(`reportingPeriod`,3) as `rpString`,
DATE_FORMAT(`reportingMonth`,'%b') as `mnString`
FROM `tbl_laboursavingtech` 
WHERE
right(`reportingPeriod`,3)<> DATE_FORMAT(`reportingMonth`,'%b')

---second update--scripts---

update `tbl_laboursavingtech` 
set reportingMonth=if(right(`reportingPeriod`,3)='Mar', concat(year(reportingMonth),'-03-31 00:00:00'),concat(year(reportingMonth),'-04-31 00:00:00'))
WHERE
right(`reportingPeriod`,3)<> DATE_FORMAT(`reportingMonth`,'%b');

update `tbl_mediaprograms` 
set reportingMonth=if(right(`reportingPeriod`,3)='Mar', concat(year(reportingMonth),'-03-31 00:00:00'),concat(year(reportingMonth),'-04-31 00:00:00'))
WHERE
right(`reportingPeriod`,3)<> DATE_FORMAT(`reportingMonth`,'%b');

update `tbl_techadoption` 
set reportingMonth=if(right(`reportingPeriod`,3)='Mar', concat(year(reportingMonth),'-03-31 00:00:00'),concat(year(reportingMonth),'-04-31 00:00:00'))
WHERE
right(`reportingPeriod`,3)<> DATE_FORMAT(`reportingMonth`,'%b');

--first update scripts---