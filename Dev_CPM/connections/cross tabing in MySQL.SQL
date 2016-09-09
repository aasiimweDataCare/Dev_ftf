CREATE VIEW `view_crop_prodcution` AS 
select `c`.`ClusterCode` AS `ClusterCode`,`c`.`Year` AS `Year`,`c`.`Month` AS `Month`,count(`c`.`BeneficiaryCode`) AS `BeneficiaryCode`,
sum(`c`.`AmountEarned`) AS `AmountEarned`,
sum(if((`c`.`Product` = _latin1'Maize'),`c`.`NoOfKgsHarvested`,_utf8'')) AS `Maize`,
sum(if((`c`.`Product` ='Beans'),`c`.`NoOfKgsHarvested`,_utf8'')) AS `Beans`,
sum(if((`c`.`Product` = _latin1'Simsim'),`c`.`NoOfKgsHarvested`,_utf8'')) AS `Simsim`,
sum(if((`c`.`Product` = _latin1'Sun flower'),`c`.`NoOfKgsHarvested`,_utf8'')) AS `Sun flower`,
sum(if((`c`.`Product` = _latin1'Cabbage'),`c`.`NoOfKgsHarvested`,_utf8'')) AS `Cabbage`,
sum(if((`c`.`Product` = _latin1'Cassava'),`c`.`NoOfKgsHarvested`,_utf8'')) AS `Cassava`,
sum(if((`c`.`Product` = _latin1'Soyabeans'),`c`.`NoOfKgsHarvested`,_utf8'')) AS `Soyabeans`,
sum(if((`c`.`Product` = _latin1'G.nuts'),`c`.`NoOfKgsHarvested`,_utf8'')) AS `G.nuts`,
sum(if((`c`.`Product` = _latin1'Egg Plants'),`c`.`NoOfKgsHarvested`,_utf8'')) AS `Egg Plants`,
sum(if((`c`.`Product` = _latin1'Sweet potatoes'),`c`.`NoOfKgsHarvested`,_utf8'')) AS `Sweet potatoes`,
sum(if((`c`.`Product` = _latin1'Millet'),`c`.`NoOfKgsHarvested`,_utf8'')) AS `Millet` 
from `tbl_crop_prodcution` `c` group by `c`.`ClusterCode`,`c`.`Year`,`c`.`Month`;

CREATE VIEW `view_annualtarget` AS 
select `t`.`p_id` AS `p_id`,`t`.`subcomponent_id` AS `subcomponent_id`,`t`.`output_id` AS `output_id`,
`t`.`activity_id` AS `activity_id`,`t`.`year` AS `year`,`t`.`reporting_period` AS `reporting_period`,
`t`.`subactivity_id` AS `subactivity_id`,`t`.`baseline` AS `baseline`,`vi`.`subactivity_code` AS `subactivity_code`,
`vi`.`subactivity_name` AS `subactivity_name`,`t`.`indicator_id` AS `indicator_id`,
`vi`.`indicator_name` AS `indicator_name`,`vi`.`indicator_type` AS `indicator_type`,
`vi`.`subcomponent_code` AS `subcomponent_code`,`vi`.`subcomponent` AS `subcomponent`,
`t`.`pquarter1` AS `pquarter1`,`t`.`pquarter2` AS `pquarter2`,`t`.`pquarter3` AS `pquarter3`,
`t`.`pquarter4` AS `pquarter4`,`t`.`ptotal` AS `ptotal`,`plt`.`target` AS `projectlifetarget` 
from ((`tbl_annualtarget` `t` 
join `view_indicator` `vi` on((`vi`.`indicator_id` = `t`.`indicator_id`))) 
join `tbl_projectlifetargets` `plt` on((`plt`.`indicator_id` = `vi`.`indicator_id`))) 
group by `t`.`indicator_id`, t.year
order by `t`.`indicator_id`;



select a.indicator_id,at.indicator_name,a.year,count(a.total) as counted_rows,
sum(if((a.reportingPeriod='Jan - Mar 2011'),a.total,'')) as q1,
sum(if((a.reportingPeriod='Apr - Jun 2011'),a.total,'')) as q2,
sum(if((a.reportingPeriod='Jul - Sep 2011'),a.total,'')) as q3,
sum(if((a.reportingPeriod='Oct - Dec 2011'),a.total,'')) as q4,
sum(if((at.year='2011'),at.pquarter1,'')) as q1t,
sum(if((at.year='2011'),pquarter2,'')) as q2t,
sum(if((at.year='2011'),pquarter3,'')) as q3t,
sum(if((at.year='2011'),pquarter4,'')) as q4t,at.projectlifetarget,
sum(if((a.year='2011'),a.total,'')) as totalquarterlyactual 
from tbl_organizationreporting a 
left join view_annualtarget at on(a.indicator_id=at.indicator_id) 
where a.year='2011' group by a.indicator_id,a.year,a.reportingPeriod


select a.indicator_id,at.indicator_name,a.year,substr((a.reportingPeriod,0,10)
from tbl_organizationreporting a 

select a.indicator_id,at.indicator_name,a.year,substr((a.reportingPeriod,0,10)
sum(if(substr((a.reportingPeriod,0,10)='Jan - Mar'),a.total,'')) as q1,
sum(if(substr((a.reportingPeriod,0,10)='Apr - Jun'),a.total,'')) as q2,
sum(if(substr((a.reportingPeriod,0,10)='Jul - Sep'),a.total,'')) as q3,
sum(if(substr((a.reportingPeriod,0,10)='Oct - Dec'),a.total,'')) as q4,

sum(if((at.year='2011'),at.pquarter1,'')) as q1t,
sum(if((at.year='2011'),pquarter2,'')) as q2t,
sum(if((at.year='2011'),pquarter3,'')) as q3t,
sum(if((at.year='2011'),pquarter4,'')) as q4t,at.projectlifetarget,
sum(if((a.year='2011'),a.total,'')) as totalquarterlyactual 

from tbl_organizationreporting a 
right join view_annualtarget at on(a.indicator_id=at.indicator_id) 
where a.year='2011' group by a.indicator_id,a.year,a.reportingPeriod

Jan - Mar 2011
---------------
select plt.indicator_id,i.indicator_name,plt.target,at.pquarter1,at.pquarter2,at.pquarter3,
at.pquarter4,at.ptotal,r.reportingPeriod,r.year,r.total as totalactual 
from tbl_indicator i 
inner join 
tbl_organizationreporting r on(i.indicator_id=r.indicator_id) 
inner join tbl_annualtarget at on(at.indicator_id=r.indicator_id)
inner join tbl_projectlifetargets plt on(plt.indicator_id=at.indicator_id) 

where i.indicator_id='56211'
group by plt.indicator_id,r.year,r.reportingPeriod
--------------

select plt.indicator_id,i.indicator_name,r.year,
at.pquarter1 as targetQ1,
sum(if((r.reportingPeriod='Jan - Mar'),r.total,'')) as actualQ1,
at.pquarter2 as targetQ2,
sum(if((r.reportingPeriod='Jan - Mar'),r.total,'') AND if((r.reportingPeriod='Apr - Jun'),r.total,''))  as actualQ2,
at.pquarter3 as targetQ3,
sum(if((r.reportingPeriod='Jan - Mar'),r.total,'') AND if((r.reportingPeriod='Apr - Jun'),r.total,'') AND if((r.reportingPeriod='Jul - Sep'),r.total,''))  as actualQ3,
at.pquarter4 as targetQ4,
sum(if((r.reportingPeriod='Jan - Mar'),r.total,'') AND if((r.reportingPeriod='Apr - Jun'),r.total,'') AND if((r.reportingPeriod='Jul - Sep'),r.total,'') AND if((r.reportingPeriod='Oct - Dec'),r.total,'')) as actualQ4
,at.ptotal as targetActual,

r.total as rAnnual,
sum(if((r.reportingPeriod='Jan - Mar'),r.total,'') AND if((r.reportingPeriod='Apr - Jun'),r.total,'') AND if((r.reportingPeriod='Jul - Sep'),r.total,'') AND if((r.reportingPeriod='Oct - Dec'),r.total,'')) as actualAnnual,

plt.target as projectLifeTarget
from tbl_indicator i 
left join tbl_organizationreporting r on(i.indicator_id=r.indicator_id) 
inner join tbl_annualtarget at on(at.indicator_id=r.indicator_id)
inner join tbl_projectlifetargets plt on(plt.indicator_id=at.indicator_id) 
where i.indicator_id='56211'
group by plt.indicator_id,r.year



select plt.indicator_id,i.indicator_name,r.year,
at.pquarter1 as targetQ1,
sum(if(r.reportingPeriod='Jan - Mar',r.total,'')) as actualQ1,

at.pquarter2 as targetQ2,
sum(if(r.reportingPeriod='Apr - Jun',r.total,''))  as actualQ2,

at.pquarter3 as targetQ3,
sum(if(r.reportingPeriod='Jul - Sep',r.total,''))  as actualQ3,

at.pquarter4 as targetQ4,
sum(if(r.reportingPeriod='Oct - Dec',r.total,'')) as actualQ4
,at.ptotal as targetActual,
sum(r.total) as actualAnnual,

plt.target as projectLifeTarget
from tbl_indicator i 
left join tbl_organizationreporting r on(i.indicator_id=r.indicator_id) 
left join tbl_annualtarget at on(i.indicator_id=at.indicator_id)
left join tbl_projectlifetargets plt on(i.indicator_id=plt.indicator_id) 
where i.indicator_id='56211'
group by i.indicator_id,r.year


select plt.indicator_id,i.indicator_name,at.year as targetYear,r.year as ReportingYear,
at.pquarter1 as targetQ1,r.reportingPeriod,quarterCode,
MAX(if(r.reportingPeriod='Jan - Mar',r.total,'')) as actualQ1,

at.pquarter2 as targetQ2,
MAX(if(r.reportingPeriod='Apr - Jun',r.total,''))  as actualQ2,

at.pquarter3 as targetQ3,
MAX(if(r.reportingPeriod='Jul - Sep',r.total,''))  as actualQ3,

at.pquarter4 as targetQ4,
MAX(if(r.reportingPeriod='Oct - Dec',r.total,'')) as actualQ4
,at.ptotal as targetActual,
MAX(r.total) as actualAnnual,

plt.target as projectLifeTarget
from tbl_projectlifetargets plt
left join  tbl_indicator i on(i.indicator_id=plt.indicator_id) 
left join tbl_organizationreporting r on(i.indicator_id=r.indicator_id) 
left join tbl_annualtarget at on(i.indicator_id=at.indicator_id)
left join tbl_quarters q on(q.quarterName=r.reportingPeriod) 

group by plt.indicator_id,r.year,r.reportingPeriod
--,r.reportingPeriod ,r.year ,r.reportingPeriod,

create view_quarterly_targets view as 
select plt.indicator_id,i.indicator_name,at.year as targetYear,r.year as ReportingYear,
at.pquarter1 as targetQ1,r.reportingPeriod,quarterCode,
MAX(if(r.reportingPeriod='Jan - Mar',r.total,'')) as actualQ1,

at.pquarter2 as targetQ2,
MAX(if(r.reportingPeriod='Apr - Jun',r.total,''))  as actualQ2,

at.pquarter3 as targetQ3,
MAX(if(r.reportingPeriod='Jul - Sep',r.total,''))  as actualQ3,

at.pquarter4 as targetQ4,
MAX(if(r.reportingPeriod='Oct - Dec',r.total,'')) as actualQ4
,at.ptotal as targetAnnual,
SUM(r.total) as actualAnnual,

plt.target as projectLifeTarget
from tbl_projectlifetargets plt
left join  tbl_indicator i on(i.indicator_id=plt.indicator_id) 
left join tbl_organizationreporting r on(i.indicator_id=r.indicator_id) 
left join tbl_annualtarget at on(i.indicator_id=at.indicator_id)
left join tbl_quarters q on(q.quarterName=r.reportingPeriod) 

group by plt.indicator_id,r.year,r.reportingPeriod



create view view_indicator_target_actual  as 
select plt.indicator_id,i.indicator_name,r.year as ReportingYear,r.reportingPeriod,quarterCode,
at.pquarter1 as targetQ1,
at.pquarter2 as targetQ2,
at.pquarter3 as targetQ3,
at.pquarter4 as targetQ4,
at.ptotal as targetTotal,
MAX(r.total) as actualTotal,
plt.target as projectLifeTarget
from tbl_projectlifetargets plt
left join  tbl_indicator i on(i.indicator_id=plt.indicator_id) 
left join tbl_organizationreporting r on(i.indicator_id=r.indicator_id) 
left join tbl_annualtarget at on(i.indicator_id=at.indicator_id)
left join tbl_quarters q on(q.quarterName=r.reportingPeriod) 
group by plt.indicator_id,r.year,r.reportingPeriod




select indicator_id , indicator_name , ReportingYear , `targetQ2` as targetQtr , 
MAX( if( reportingPeriod = 'Apr - Jun' , actualTotal , '' ) ) as actualQtr , targetTotal , 
SUM( actualTotal ) as actualTotal , projectLifeTarget from view_indicator_target_actual 
where ReportingYear = '2012' and quarterCode <= '2' 
group by indicator_id , ReportingYear LIMIT ; 




select plt.indicator_id,i.indicator_name,at.year as targetYear,r.year as ReportingYear,
at.pquarter1 as targetQ1,r.reportingPeriod,quarterCode,
MAX(if(r.reportingPeriod='Jan - Mar',r.total,'')) as actualQ1,

at.pquarter2 as targetQ2,
MAX(if(r.reportingPeriod='Apr - Jun',r.total,''))  as actualQ2,

at.pquarter3 as targetQ3,
MAX(if(r.reportingPeriod='Jul - Sep',r.total,''))  as actualQ3,

at.pquarter4 as targetQ4,
MAX(if(r.reportingPeriod='Oct - Dec',r.total,'')) as actualQ4
,at.ptotal as targetAnnual,
SUM(r.total) as actualAnnual,

plt.target as projectLifeTarget
from tbl_projectlifetargets plt
left join  tbl_indicator i on(i.indicator_id=plt.indicator_id) 
left join tbl_organizationreporting r on(i.indicator_id=r.indicator_id) 
left join tbl_annualtarget at on(i.indicator_id=at.indicator_id)
left join tbl_quarters q on(q.quarterName=r.reportingPeriod) 

group by plt.indicator_id,r.year,r.reportingPeriod