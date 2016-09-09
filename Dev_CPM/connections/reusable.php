<?php 



SELECT 1 AS `counter`,d.`defn_id` , d.`indicator_id` , d.`DefName` ,  d.`prog_id` , d.`project_id` , 
								max(if((w.`Quarter`='Jan - Mar'),w.`Target`,'-')) as Quarter1,
								max(if((w.`Quarter`='Apr - Jun'),w.`Target`,'-')) as Quarter2,
								max(if((w.`Quarter`='Jul - Sep'),w.`Target`,'-')) as Quarter3,
								max(if((w.`Quarter`='Oct - Dec'),w.`Target`,'-')) as Quarter4
								FROM tbl_indicator_definition d
INNER JOIN tbl_dcedworkplan w 
ON ( w.indicator_id = d.DefName )
								GROUP BY d.DefName




















 $div="status".$row['indicator_id'];
  $data.="<tr class=$color>
    <td>".$n++."</td>
    <td>".$row['subactivity_code']." ".$row['subactivity_name']."</td>
    <td><a href='#' onclick=\"xajax_view_annualorganizationsReported('".$row['indicator_id']."','".$_SESSION['PMyear']."','".$div."','".$row['id']."');return false;\" >




















SELECT o.org_code, o.orgName, o.subcomponent, r.year, max( if( (
r.reportingPeriod = 'Jan - Mar'
), r.total, 0 ) ) AS Quarter1,
 max( if( (r.reportingPeriod = 'Apr - Jun'
), r.total, 0 ) ) AS Quarter2, max( if( (
r.reportingPeriod = 'Jul - Sep'
), r.total, 0 ) ) AS Quarter3, max( if( (
r.reportingPeriod = 'Oct - Dec'
), r.total, 0 ) ) AS Quarter4, r.year
FROM tbl_organization o
LEFT JOIN tbl_organizationreporting r ON ( o.org_code = r.org_code )
WHERE subcomponent LIKE '%Value Chain Development%'
AND o.org_code
IN (
'8,11,12,15,18,19'
)
AND r.year='2012' OR R.YEAR='Null'

GROUP BY o.org_code
ORDER BY orgName ASC
LIMIT 0 , 30 




 max( if( (r.reportingPeriod = 'Jan - Mar') , r.total, 0 ) ) AS Quarter1,
 max( if( (r.reportingPeriod = 'Apr - Jun'), r.total, 0 ) ) AS Quarter2,
  max( if( (r.reportingPeriod = 'Jul - Sep'), r.total, 0 ) ) AS Quarter3, 
  max( if( (r.reportingPeriod = 'Oct - Dec'), r.total, 0 ) ) AS Quarter4,


 max( if( (r.reportingPeriod = 'Jan - Mar' and r.year='2012' ) , r.total, 0 ) ) AS Quarter1,
 max( if( (r.reportingPeriod = 'Apr - Jun' and r.year='2012'), r.total, 0 ) ) AS Quarter2,
  max( if( (r.reportingPeriod = 'Jul - Sep' and r.year='2012'), r.total, 0 ) ) AS Quarter3, 
  max( if( (r.reportingPeriod = 'Oct - Dec' and r.year='2012'), r.total, 0 ) ) AS Quarter4,


and o.org_code in(8,11,12,15,19,22,23,25,26)
view_valueChainDevelopment('".$row2['org_code']."','".$row2['orgName']."','".$_SESSION['Ryear']."','','',''Jan - Mar');

view_valueChainDevelopment('".$row2['org_code']."','".$row2['orgName']."','".$_SESSION['Ryear']."','','','Jan - Mar');return false;

view_valueChainDevelopment($org_code,$orgname,$year,$quarter1,$indicator,$ReportingPeriod)

SELECT o.org_code, o.orgName, o.subcomponent, r.year, r.reportingPeriod, max( if( (
r.reportingPeriod = 'Jan - Mar'
AND r.year = '2012'
), r.total, 0 ) ) AS Quarter1, max( if( (
r.reportingPeriod = 'Apr - Jun'
AND r.year = '2012'
), r.total, 0 ) ) AS Quarter2, max( if( (
r.reportingPeriod = 'Jul - Sep'
AND r.year = '2012'
), r.total, 0 ) ) AS Quarter3, max( if( (
r.reportingPeriod = 'Oct - Dec'
AND r.year = '2012'
), r.total, 0 ) ) AS Quarter4, r.year
FROM tbl_organization o
LEFT JOIN tbl_organizationreporting r ON ( o.org_code = r.org_code )
WHERE subcomponent LIKE '%Value chain development%'
AND o.org_code
IN ( 8 )
AND r.year LIKE '2012%'
GROUP BY o.org_code
ORDER BY orgName ASC
LIMIT 0 , 30 


 $div="status".$row['indicator_id'];
  
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>

<td>".$n++."</td>
<td>$row[year]</td>

<td colspan=2>".$row['subactivity_code']." ".$row['subactivity_name']."</td>
<td colspan=3><a href='#' onclick=\"xajax_view_organizationsReported('".$row['indicator_id']."','".$year."','".$div."');return false;\">$row[indicator_name]</a></td>
 <td align=right>".$target."</td>
    <td align=right>".$ACTUAL."</td>".$percentageActualvsTargets."
  </tr><tr><td colspan=3></td><td colspan='6'><div id='$div'></div></td></tr>";





$querysc=mysql_query("select * from tbl_subcomponent where subcomponent like '".$subcomponent."%' and id like '".$_SESSION['usersubcomponent']."%' order by subcomponent_code  asc ")or die(http(1830));
  while($rows=mysql_fetch_array($querysc)){
  
  
  
			$data.="<td width='50' class='black2' align='right'><input type='hidden' name='' value='".$rows['id']."'><b>".$rows['subcomponent_code']."</b></td>
			
              <td colspan='9' class='black2'><b> ".$rows['subcomponent']."</b></td>
			  
            </tr>";
  
  $select=mysql_query("select at.indicator_id,sc.subcomponent_code,sc.id,sc.subcomponent,o.output_code,o.output_name,a.activity_code,a.activity_name,
  i.indicator_name,s.subactivity_name,s.subactivity_code,i.subactivity_id,
  at.year,at.quarterName,at.semi_annual,at.total_target,tr.total,

sum(at.total_target) as totalcummulativetarget, tr.total as totalcummulativeactual,
   round(IFNULL(tr.total,0)/IFNULL(sum(at.total_target),0)*100,0) as ccfPercentageAchieved
 
  from view_Actual_semi_annual tr left join view_cross_annualtarget at on(tr.indicator_id=at.indicator_id) inner join tbl_indicator i on(at.indicator_id=i.indicator_id) 
  inner join tbl_subactivity s on(i.subactivity_id=s.subact_id)
   inner join tbl_subcomponent sc on(sc.id=i.subcomponent_id)
   left join tbl_output o on(o.output_id=i.output_id) 
  left join tbl_activity a on(a.activity_id=i.activity_id)

 where sc.id in('".$rows['id']."') and sc.subcomponent like '".$rows['subcomponent']."%' and  sc.id like '".$_SESSION['usersubcomponent']."%' group by a.activity_code order by sc.subcomponent_code,a.activity_code asc") or die(mysql_error());
		   while($rowaa=mysql_fetch_array($select)){
		   $activity_id=$rowaa['activity_id'];
		   $activity_name=$rowaa['activity_name'];
		   $activity_code=$rowaa['activity_code'];
		     $subcomponent_id=$rowaa['subcomponent_id'];

		      
		 
		  $data.=" <tr class='black2'>
			
	
			<td width='50' class='black2' align='right'><b>".$rowaa['activity_code']."</b></td>
			
              <td colspan='9' class='black2'> <b>".$rowaa['activity_name']."</b></td>
			  
            </tr>"; 

   









 <tr class='evenrow'>
    <td colspan=2>Subsector:</td>
    <td colspan='10'><label>
      <select name='subsector' id='subsector'><option value=''>-ALL-</option>";
	  $queryrc=mysql_query("select * from tbl_subsector order by subsector asc") or die(http(2289));
	  while($rowrc=mysql_fetch_array($queryrc)){
	  $data.="<option value='".$rowrc['subsector']."'>".substr($rowrc['subsector'],0,100)."</option>";
	  
	  }
      $data.="</select>
    </label></td>
  </tr>
#========31102011=============================
DROP VIEW `view_ccf`, `view_ccf2`, `view_ccf3`, `view_ccf4`, `view_ccf4_final`, `view_ccf5`, `view_ccf6`, `view_ccf10`;
##view_ccfannualtarget backup 
create or replace view view_c cfannualtarget as select a.indicator_id, i.indicator_name,sum(a.pquarter1) as totalcummulativetarget from tbl_annualtarget a inner join tbl_indicator i on(i.indicator_id=a.indicator_id) group by indicator_id;


create or replace view view_ccfannualtarget as select a.indicator_id, i.indicator_name,sum(a.pquarter1) as totalcummulativetarget from tbl_annualtarget a inner join tbl_indicator i on(i.indicator_id=a.indicator_id) group by indicator_id;


CREATE TABLE `tbl_DCEDAnnualTarget` (
`target_id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`indicator_id` BIGINT NOT NULL ,`year` YEAR NOT NULL,
`status` VARCHAR( 20 ) NOT NULL ,
`timeline` VARCHAR( 20 ) NOT NULL ,
`responsible` VARCHAR( 100 ) NOT NULL ,
`deliverable` VARCHAR( 100 ) NOT NULL ,
`updatedby` VARCHAR( 30 ) NOT NULL ,
`timeupdated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
`display` VARCHAR( 3 ) NOT NULL DEFAULT 'Yes'

) ENGINE = innodb;



ALTER TABLE `tbl_DCEDAnnualTarget` ADD UNIQUE (
`indicator_id` ,
`year`
);


ALTER TABLE `tbl_organizationreporting` ADD `half_year` VARCHAR( 20 ) NOT NULL AFTER `reportingPeriod` ;

update tbl_organizationreporting   set half_year='Jan - Jun' where reportingPeriod='Jan - Mar'; 
update tbl_organizationreporting   set half_year='Jan - Jun' where reportingPeriod='Apr - Jun'; 
update tbl_organizationreporting   set half_year='Jul - Dec' where reportingPeriod='Jul - Sep'; 		
update tbl_organizationreporting   set half_year='Jul - Dec' where reportingPeriod='Oct - Dec'; 			
		
INSERT INTO `db_abi_v1`.`tbl_lookup` (
`classCode` ,
`classDescription` ,
`code` ,
`codeName` ,
`notes`
)
VALUES (
'8', 'Half year', '28', 'Jan - Jun', 'Half year'
), (
'8', 'Half year', '29', 'Jul - Dec', 'Half year'
);



INSERT INTO `tbl_lookup` (`classCode`, `classDescription`, `code`, `codeName`, `notes`) VALUES 
(2, 'DCED Based Indicator ', 17, 'DCED Based', 'DCED specific Indicator');

DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 116 LIMIT 1
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 3 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 6 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 10 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 14 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 28 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 29 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 30 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 32 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 33 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 34 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 36 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 37 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 38 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 40 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 42 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 376 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 358 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 357 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 356 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 355 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 354 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 353 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 352 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 351 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 350 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 349 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 348 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 347 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 346 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 345 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 359 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 360 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 361 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 375 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 374 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 373 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 372 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 371 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 370 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 369 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 368 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 367 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 366 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 365 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 364 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 363 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 362 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 344 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 343 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 342 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 324 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 323 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 322 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 321 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 320 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 318 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 317 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 316 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 315 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 314 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 313 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 311 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 310 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 309 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 325 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 326 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 327 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 341 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 340 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 339 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 338 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 337 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 336 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 335 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 334 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 333 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 332 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 331 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 330 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 329 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 328 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 312 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 423 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 433 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 421 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 420 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 419 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 418 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 417 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 416 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 415 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 319 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 424 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 425 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 434 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 432 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 431 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 430 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 429 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 428 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 427 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 426 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 414 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 413 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 378 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 377 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 404 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 403 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 386 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 385 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 384 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 383 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 382 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 381 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 380 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 379 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 405 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 407 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 411 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 409 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 422 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 408 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 412 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 406 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 410 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 230 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 229 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 307 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 72 LIMIT 1;


#=============30102011=======================
SELECT tr.indicator_id,tr.year,tr.reportingPeriod,sum(tr.total),max(tr.total),sum(at.total_target) as totalcummulativetarget FROM `tbl_organizationreporting` tr join tbl_indicator i on(i.indicator_id=tr.indicator_id) left join view_cross_annualtarget at on(tr.indicator_id=at.indicator_id) join tbl_subactivity s on(s.subact_id=i.subactivity_id) WHERE s.subactivity_code='1.1.1.2' and tr.reportingPeriod='Apr - Jun' group by tr.indicator_id,tr.reportingPeriod order by s.subactivity_code asc;


select tr.indicator_id,sc.subcomponent_code,sc.subcomponent,o.output_code,o.output_name,a.activity_code,a.activity_name,
  i.indicator_name,s.subactivity_name,s.subactivity_code,i.subactivity_id,
  tr.year,tr.reportingPeriod,tr.half_year,
 sum(tr.total) as totalcummulativeactual,
sum(at.total_target) as totalcummulativetarget,
   round(IFNULL(sum(tr.total),0)/IFNULL(sum(at.total_target),0)*100,0) as ccfPercentageAchieved
 
  from tbl_organizationreporting  tr left join tbl_indicator i on(tr.indicator_id=i.indicator_id) 
  left join tbl_subactivity s on(i.subactivity_id=s.subact_id)
   left join tbl_subcomponent sc on(sc.id=i.subcomponent_id)
   left join tbl_output o on(o.output_id=i.output_id) 
  left join tbl_activity a on(a.activity_id=i.activity_id)
    left join view_cross_annualtarget at on(tr.indicator_id=at.indicator_id)
 where 
i.indicator_name like '%'
 && sc.subcomponent like '%'
 && o.output_name like '%' 
 && a.activity_name like '%'
 && s.subactivity_name like '%' and 
 tr.reportingPeriod like  '%' 
 and tr.year like '%'
  and tr.half_year like '%'
 group by tr.indicator_id order by s.subactivity_code,i.indicator_name asc


 $sql2="select tr.indicator_id,sc.subcomponent_code,sc.subcomponent,o.output_code,o.output_name,a.activity_code,a.activity_name,
  i.indicator_name,s.subactivity_name,s.subactivity_code,i.subactivity_id,
  tr.year,tr.reportingPeriod,tr.half_year,
 sum(tr.total) as totalcummulativeactual,
sum(at.total_target) as totalcummulativetarget,
   round(IFNULL(sum(tr.total),0)/IFNULL(sum(at.total_target),0)*100,0) as ccfPercentageAchieved
 
  from tbl_organizationreporting  tr left join tbl_indicator i on(tr.indicator_id=i.indicator_id) 
  left join tbl_subactivity s on(i.subactivity_id=s.subact_id)
   left join tbl_subcomponent sc on(sc.id=i.subcomponent_id)
   left join tbl_output o on(o.output_id=i.output_id) 
  left join tbl_activity a on(a.activity_id=i.activity_id)
    left join view_cross_annualtarget at on(tr.indicator_id=at.indicator_id)
 where 
i.indicator_name like '%'
 && sc.subcomponent like '%'
 && o.output_name like '%' 
 && a.activity_name like '%'
 && s.subactivity_name like '%' and 
 tr.reportingPeriod like  '%' 
 and tr.year like '%'
  and tr.half_year like '%'
 group by tr.indicator_id order by s.subactivity_code,i.indicator_name asc";






select tr.indicator_id,sc.subcomponent_code,sc.subcomponent,o.output_code,o.output_name,a.activity_code,a.activity_name,
  i.indicator_name,s.subactivity_name,s.subactivity_code,i.subactivity_id,
  tr.year,tr.reportingPeriod,tr.half_year,
 sum(tr.total) as totalcummulativeactual,sum(at.total_target) as totalcummulativetarget,
   round(IFNULL(sum(tr.total),0)/IFNULL(sum(at.total_target),0)*100,0) as ccfPercentageAchieved,plt.period,plt.target as projectlifetarget,round(IFNULL(sum(tr.total),0)/IFNULL(plt.target,0)*100,0) as ccfPercentageProjectLifeAchieved  
  from tbl_organizationreporting  tr left join tbl_indicator i on(tr.indicator_id=i.indicator_id) 
  left join tbl_subactivity s on(i.subactivity_id=s.subact_id)
   left join tbl_subcomponent sc on(sc.id=i.subcomponent_id)
   left join tbl_output o on(o.output_id=i.output_id) 
  left join tbl_activity a on(a.activity_id=i.activity_id)
   left join tbl_projectlifetargets plt on(tr.indicator_id=plt.indicator_id)
   inner join view_cross_annualtarget at on(tr.indicator_id=at.indicator_id) where i.indicator_id!=0 

 and i.indicator_name like '%'
 && sc.subcomponent like '%'
 && o.output_name like '%' 
 && a.activity_name like '%'
 && s.subactivity_name like '%' and 
  tr.reportingPeriod like  '%' 
 and tr.year like '%'
  and tr.half_year like '%'
 group by tr.indicator_id order by s.subactivity_code,i.indicator_name asc





select tr.indicator_id,sc.subcomponent_code,sc.subcomponent,o.output_code,o.output_name,a.activity_code,a.activity_name,
  i.indicator_name,s.subactivity_name,s.subactivity_code,i.subactivity_id,
  tr.year,tr.reportingPeriod,tr.half_year,
 sum(tr.total) as totalcummulativeactual,
   round(IFNULL(sum(tr.total),0)/IFNULL(sum(at.ptotal),0)*100,0) as ccfPercentageAchieved,plt.period,plt.target as projectlifetarget,round(IFNULL(sum(tr.total),0)/IFNULL(plt.target,0)*100,0) as ccfPercentageProjectLifeAchieved  
  from tbl_organizationreporting  tr left join tbl_indicator i on(tr.indicator_id=i.indicator_id) 
  left join tbl_subactivity s on(i.subactivity_id=s.subact_id) left join tbl_subcomponent sc on(sc.id=i.subcomponent_id)
   left join tbl_output o on(o.output_id=i.output_id) 
  left join tbl_activity a on(a.activity_id=i.activity_id)
   left join tbl_projectlifetargets plt on(tr.indicator_id=plt.indicator_id)
   left join tbl_annualtarget at on(tr.indicator_id=at.indicator_id) where i.indicator_id!=0 
   and tr.half_year like '%'
 and i.indicator_name like '%'
 && sc.subcomponent like '%'
 && o.output_name like '%' 
 && a.activity_name like '%'
 && s.subactivity_name like '%' and 
 
 tr.reportingPeriod like  '%' 
 and tr.year like '%'
 group by tr.indicator_id order by s.subactivity_code,i.indicator_name asc
#====31102011========================================================



select at.p_id,at.year,at.indicator_id,at.baseline,q.quarterCode,q.quarterName,tr.reportingPeriod,tr.half_year,
case when q.quarterCode='1' then at.pquarter1
when q.quarterCode='2' then at.pquarter2
when q.quarterCode='3' then at.pquarter3
when q.quarterCode='4' then at.pquarter4 end as total_target,tr.total as total_actual from tbl_quarters q join tbl_annualtarget at inner join tbl_organizationreporting tr on(tr.indicator_id=at.indicator_id)   where at.indicator_id='2'
#=============working========================
CREATE OR REPLACE VIEW view_cross_annualtarget AS
SELECT at.p_id, at.year, at.indicator_id, at.baseline, q.quarterCode, q.quarterName,
CASE WHEN q.quarterCode = '1'
THEN at.pquarter1
WHEN q.quarterCode = '2'
THEN at.pquarter2
WHEN q.quarterCode = '3'
THEN at.pquarter3
WHEN q.quarterCode = '4'
THEN at.pquarter4
END AS total_target
FROM tbl_quarters q
JOIN tbl_annualtarget at
ORDER BY at.year,at.indicator_id ASC 
#=====================================================



create or  replace view view_cross_annualtarget as select at.p_id,at.year,tr.reportingPeriod,tr.half_year,q.quarterName,
at.indicator_id,at.baseline,
case when q.quarterName='Jan - Mar' then at.pquarter1
when q.quarterName='Apr - Jun' then at.pquarter2
when q.quarterName='Jul - Sep' then at.pquarter3
when q.quarterName='Oct - Dec' then at.pquarter4 end as total_target,tr.total
from tbl_annualtarget at left join tbl_organizationreporting tr on(tr.indicator_id=at.indicator_id) right join tbl_quarters q on(q.quarterName=tr.reportingPeriod) order by at.indicator_id asc;





#=================25102011===========================================================================================================

SELECT *
FROM `tbl_organizationreporting`
WHERE (
(
`tbl_organizationreporting`.`id` =467
)
OR (
`tbl_organizationreporting`.`id` =469
)
OR (
`tbl_organizationreporting`.`id` =468
)
)
ORDER BY `tbl_organizationreporting`.`indicator_id` ASC 


INSERT INTO `tbl_organizationreporting` (`id`, `org_code`, `year`, `reportingPeriod`, `indicator_id`, `male`, `female`, `maleyouth`, `femaleyouth`, `total`, `date_reported`) VALUES 
(467, 0, 2011, 'Apr - Jun', 56338, 0, 0, 0, 0, 0, '2011-08-03 09:26:16'),
(469, 0, 2011, 'Apr - Jun', 56939, 0, 0, 0, 0, 768, '2011-08-03 09:26:16'),
(468, 0, 2011, 'Apr - Jun', 56940, 0, 0, 0, 0, 50, '2011-08-03 09:26:16');


INSERT INTO `tbl_annualtarget` (`p_id`, `subcomponent_id`, `output_id`, `activity_id`, `year`, `subactivity_id`, `indicator_id`, `baseline`, `pquarter1`, `pquarter2`, `pquarter3`, `pquarter4`, `ptotal`) VALUES 
(115, 2, 0, 21, 2011, 95, 56338, 0, '1', '1', '1', '1', '4'),
(305, 2, 0, 21, 2011, 95, 56939, 0, '850', '1200', '1300', '1400', '4750'),
(306, 2, 0, 21, 2011, 95, 56940, 0, '840', '1300', '1400', '1500', '5040');



SELECT *
FROM `tbl_subactivity`
WHERE (
(
`tbl_subactivity`.`subact_id` =95
)
)
ORDER BY `tbl_subactivity`.`subactivity_code` ASC ;


SELECT *
FROM `tbl_indicator`
WHERE (
(
`tbl_indicator`.`indicator_id` =56338
)
OR (
`tbl_indicator`.`indicator_id` =56939
)
OR (
`tbl_indicator`.`indicator_id` =56940
)
OR (
`tbl_indicator`.`indicator_id` =56941
)
OR (
`tbl_indicator`.`indicator_id` =56942
)
)
ORDER BY `tbl_indicator`.`subactivity_id` ASC ;



SELECT *
FROM `tbl_annualtarget`
WHERE (
(
`tbl_annualtarget`.`p_id` =116
)
OR (
`tbl_annualtarget`.`p_id` =306
)
OR (
`tbl_annualtarget`.`p_id` =115
)
OR (
`tbl_annualtarget`.`p_id` =305
)
)
ORDER BY `tbl_annualtarget`.`subactivity_id` ASC 


INSERT INTO `tbl_annualtarget` (`p_id`, `subcomponent_id`, `output_id`, `activity_id`, `year`, `subactivity_id`, `indicator_id`, `baseline`, `pquarter1`, `pquarter2`, `pquarter3`, `pquarter4`, `ptotal`) VALUES 
(115, 2, 0, 21, 2011, 95, 56338, 0, '1', '1', '1', '1', '4'),
(305, 2, 0, 21, 2011, 95, 56939, 0, '850', '1200', '1300', '1400', '4750'),
(306, 2, 0, 21, 2011, 95, 56940, 0, '840', '1300', '1400', '1500', '5040');

#====================================================================================================================================

function view_quarterlyResults($quarter,$year,$subactivity){
$obj=new xajaxResponse();
$year=($year!='')?$year:date(Y);
$quarter=($quarter1='')?$quarter:$_SESSION['quarter'];
$_SESSION['Resultsubcomponent3']=$subcomponent;
$_SESSION['Resultoutput3']=$output;
$_SESSION['Resultactivity3']=$activity;
$_SESSION['Resultsubactivity3']=$subactivity;
$data="<table width='660' border='0'>
   <tr class='evenrow'>
    <td scope='col' colspan='2'><div align='right'>QUARTER </div></td>
    <td scope='col' colspan=3><div align='left'>
      <select name='project_quarter' id='project_quarter'>";
	 if($quarter!='') $data.="<option value='".$quarter."' '".$selected."'>".$quarter."</option>";
	 $data.="<option value=''>-All-</option>";
	 $data.="<option value='Jan - Mar'>Jan - Mar</option>";
	 $data.="<option value='Apr - Jun'>Apr - Jun</option>";
	 $data.="<option value='Jul - Sep'>Jul - Sep</option>";
	 $data.="<option value='Oct - Dec'>Oct - Dec</option>";
     $data.=" </select>
    </div></td>
	<td scope='col' colspan=2><div align='right'>YEAR</div></td>
    <td scope='col' colspan=4><div align='left'>
      <select name='project_year'  id='project_year' >";
       $data.="<option value='".$year."' '".$selected."'>".$year."</option>";
	  $yr ='2013'; $end = $yr;
       $selected=$yr==$end?"SELECTED":"";
                                      do{
                                    $data.="<option value='".$end."'>".$end."</option>";
                                 $end--;} while ($end>= 2010);             
     $data.=" </select>
    </div></td><td align='right'><a href='export_to_excel_word.php?linkvar=Export Quarterly Results&&quarter=".$quarter."&&year=".$year."&&subactivity=".$_SESSION['Resultsubactivity3']."&&subcomponent=".$_SESSION['Resultsubcomponent3']."&&output=".$_SESSION['Resultoutput3']."&&activity=".$_SESSION['Resultactivity3']."&&format=excel'><input type='button' name='export' value='Export to Excel' /></a></td>
   
  </tr>";
  
  $data.="
  <tr class='evenrow'>
  <td colspan=2>Sub-Component:</td><td colspan=3><select name='subcomponent' id='subcomponent'>
      <option value=''>-ALL-</option>";
	$sel2=mysql_query("select * from tbl_subcomponent order by subcomponent_code")or die("aBi Error-code 285 because ".mysql_error());
	while($row2=mysql_fetch_array($sel2)){
	$s23=($_SESSION['Resultsubcomponent3']==$row2['subcomponent'])?"SELECTED":"";
	$data.="<option value='".$row2['subcomponent']."' '".$s23."'>".$row2['subcomponent_code']." ".substr($row2['subcomponent'],0,30)."</option>";
	}
	
	
    $data.="</select></td>
    <td colspan='2' scope='col' width=''  align='right'>Output:</td><td colspan='4'>
	<div style='float:left;'><select name='output' id='output'>
      <option value=''>-ALL-</option>";
	$sel=mysql_query("select * from tbl_output group by output_code order by output_code")or die("aBi Error-code 297 because ".mysql_error());
	while($row1=mysql_fetch_array($sel)){
	$s33=($_SESSION['Resultoutput3']==$row1['output_name'])?"SELECTED":"";
	$data.="<option value='".$row1['output_name']."' '".$s33."'>".$row1['output_code']." ".substr($row1['output_name'],0,40)."</option>";
	
	
	}
	
	
    $data.="</select></td> <td scope='col'></td>
  </tr>
 
 <tr class='evenrow'>
  <td colspan=2>Activity:</td><td colspan=3><select name='activity' id='activity'>
      <option value=''>-ALL-</option>";
	$sel2=mysql_query("select * from tbl_activity order by activity_code")or die("aBi Error-code 285 because ".mysql_error());
	while($row2=mysql_fetch_array($sel2)){
	$s24=($_SESSION['Resultactivity3']==$row2['activity_name'])?"SELECTED":"";
	$data.="<option value='".$row2['activity_name']."' '".$s24."'>".$row2['activity_code']." ".substr($row2['activity_name'],0,30)."</option>";
	}
	
	
    $data.="</select></td>
    <td colspan='2' scope='col' width=''  align='right'>Sub-Activity</td><td colspan='4'>
	<div style='float:left;'><select name='subactivity' id='subactivity'>
      <option value=''>-ALL-</option>";
	$sel=mysql_query("select indicator_id,indicator_name,subactivity_name,subactivity_code from view_indicator_target_actual group by subactivity_code order by subactivity_code")or die("aBi Error-code 297 because ".mysql_error());
	while($row1=mysql_fetch_array($sel)){
	$s=($_SESSION['Resultsubactivity3']==$row1['subactivity_name'])?"SELECTED":"";
	$data.="<option value='".$row1['subactivity_name']."' '".$s."'>".$row1['subactivity_code']." ".substr($row1['subactivity_name'],0,40)."</option>";
	
	
	}
	
	
    $data.="</select></td> <td scope='col'><div align='left'>
      <input type='button' name='search' id='button' value='Go' onclick=\"xajax_view_quarterlyResults(getElementById('project_quarter').value,getElementById('project_year').value,getElementById('subcomponent').value,getElementById('output').value,getElementById('activity').value,getElementById('subactivity').value);\" />
    </div></td>
  </tr>
 
 
  
<tr>
    <td colspan='12' scope='col' width='' class=evenrow2 align='center'><B>QUARTERLY TARGETS AGAINST ACTUALS</B>
	</td>
  </tr>

  <tr class='evenrow2'>
    <td align='right'><b>NO</td>
		<td  align='left' width='500'><b>Sub-Activity</td>
	<td  align='left' width='500'><b>Indicator</td>
    <td  align='right' width='50'><b>Target <br/>(M)</td>	
	<td  align='right' width='50'><b>Target <br/>(F)</td>
	 <td  align='right' width='50'><b>Target (Other)</td>
    <td  align='right' width='50'><b>Actuals <br/>(M)</td>
	 <td  align='right' width='50'><b>Actuals <br/>(F)</td> 
	    <td  align='right' width='50'><b>Actuals <br/>(Other)</td>
	<td  align='right' width='50'><b>% Male Achieved</td>

   
	<td  align='right' width='50'><b>% <br/> Female<br/> Achieved</td>
  

	<td  align='right' width='50'><b>% <br/>Other <br/>Achieved</td>
  </tr>";
  $n=1; $inc=1; $percent=100;

  if($quarter=='Jan - Mar')$quarterVal="1";
  elseif($quarter=='Apr - Jun')$quarterVal="2";
  elseif($quarter=='Jul - Sep')$quarterVal="3";
  elseif($quarter=='Oct - Dec')$quarterVal="4";
  else $quarterVal="";

	if ($quarterVal!=''){
	  $select1="select indicator_id,indicator_name,subcomponent,subcomponent_code,output_name,output_code,activity_code,activity_name,subactivity_name,subactivity_code,ReportingYear,
	sum(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ".$quarterVal."`,'')) as targetQtrMale,
	SUM(if((((reportingPeriod='".$quarter."') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,''))  as TotalMaleActual,
	
	round(IFNULL(SUM(if((((reportingPeriod='".$quarter."') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,'')),0)/IFNULL(sum(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ".$quarterVal."`,'')),0),2)*".$percent." AS percentageMaleAchieved,
	sum(if((gender='Adult Female') or (gender='Female Youth'),`targetQ".$quarterVal."`,'')) as targetQtrFemale,
	
	SUM(if((((reportingPeriod='".$quarter."') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,''))  as TotalFemaleActual,
round(IFNULL(SUM(if((((reportingPeriod='".$quarter."') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,'')),0)/IFNULL(sum(if((gender='Adult Female') or (gender='Female Youth'),`targetQ".$quarterVal."`,'')),0),2)*".$percent." AS percentageFemaleAchieved,

	sum(if((gender=''),`targetQ".$quarterVal."`,'')) as targetQtrOther,
	SUM(if(((reportingPeriod='".$quarter."') and(gender='')),totalActual,''))  as TotalOtherActual,
	
	round(IFNULL(SUM(if(((reportingPeriod='".$quarter."') and(gender='')),totalActual,'')),0)/IFNULL(sum(if((gender=''),`targetQ".$quarterVal."`,'')),0),2)*".$percent." AS percentageOtherAchieved
	from view_indicator_target_actual where ReportingYear = '".$year."' and subcomponent like '".$_SESSION['Resultsubcomponent3']."%' and output_name like '".$_SESSION['Resultoutput3']."%' and activity_name like '".$_SESSION['Resultactivity3']."%' and subactivity_name like '".$_SESSION['Resultsubactivity3']."%' group by indicator_id,ReportingYear order by subactivity_code asc"; 


	
  #$obj->addAlert($select1);
  }else {
 $select1="select indicator_id,indicator_name,subcomponent,subcomponent_code,output_name,output_code,activity_code,activity_name,subactivity_name,subactivity_code,ReportingYear,
	sum(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ1`,'')) as targetQtrMale,
	SUM(if((((reportingPeriod='Jan - Mar') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,''))  as TotalMaleActual,
	round(IFNULL(SUM(if((((reportingPeriod='Jan - Mar') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,'')),0)/IFNULL(sum(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ1`,'')),0),2)*100 AS percentageMaleAchieved,
	sum(if((gender='Adult Female') or (gender='Female Youth'),`targetQ1`,'')) as targetQtrFemale,
	SUM(if((((reportingPeriod='Jan - Mar') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,''))  as TotalFemaleActual,
	round(IFNULL(SUM(if((((reportingPeriod='Jan - Mar') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,'')),0)/IFNULL(sum(if((gender='Adult Female') or (gender='Female Youth'),`targetQ1`,'')),0),2)*100 AS percentageFemaleAchieved,
	sum(if((gender=''),`targetQ1`,'')) as targetQtrOther,
	SUM(if(((reportingPeriod='Jan - Mar') and(gender='')),totalActual,''))  as TotalOtherActual,
	round(IFNULL(SUM(if(((reportingPeriod='Jan - Mar') and(gender='')),totalActual,'')),0)/IFNULL(sum(if((gender=''),`targetQ1`,'')),0),2)*100 AS percentageOtherAchieved
	from view_indicator_target_actual where ReportingYear = '".$year."' and subcomponent like '".$_SESSION['Resultsubcomponent3']."%' and output_name like '".$_SESSION['Resultoutput3']."%' and activity_name like '".$_SESSION['Resultactivity3']."%' and subactivity_name like '".$_SESSION['Resultsubactivity3']."%'  group by indicator_id,ReportingYear order by subactivity_code asc";
	
  }
  

  
  $query=mysql_query($select1)or die("aBi Error code:0328 because, ".mysql_error());
  while($row=mysql_fetch_array($query)){
  $targetQtrMale=($row['targetQtrMale']!=0)?"<td align='right'>".$row['targetQtrMale']."</td>":"<td align='right'>-</td>";
  $TotalMaleActual=($row['TotalMaleActual']!=0)?"<td align='right'>".$row['TotalMaleActual']."</td>":"<td align='right'>-</td>";
  $percentageMaleAchieved=($row['percentageMaleAchieved']!=0)?"<td align='right'>".$row['percentageMaleAchieved']."%</td>":"<td align='right'>0%</td>";
  
  $targetQtrFemale=($row['targetQtrFemale']!=0)?"<td align='right'>".$row['targetQtrFemale']."</td>":"<td align='right'>-</td>";
  $TotalFemaleActual=($row['TotalFemaleActual']!=0)?"<td align='right'>".$row['TotalFemaleActual']."</td>":"<td align='right'>-</td>";
  $percentageFemaleAchieved=($row['percentageFemaleAchieved']!=0)?"<td align='right'>".$row['percentageFemaleAchieved']."%</td>":"<td align='right'>0%</td>";
  $targetQtrOther=($row['targetQtrOther']!=0)?"<td align='right'>".$row['targetQtrOther']."</td>":"<td align='right'>-</td>";
  $TotalOtherActual=($row['TotalOtherActual']!=0)?"<td align='right'>".$row['TotalOtherActual']."</td>":"<td align='right'>-</td>";
  $percentageOtherAchieved=($row['percentageOtherAchieved']!=0)?"<td align='right'>".$row['percentageOtherAchieved']."%</td>":"<td align='right'>0%</td>";
  
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
  <td align='right'>".$n++."</td>
	<td  align='left' width='200'>".$row['subactivity_code']." ".$row['subactivity_name']."</td>
	<td  align='left' width='200'>".$row['indicator_name']."</td>
    ".$targetQtrMale."
	 ".$targetQtrFemale."
	".$targetQtrOther."
    ".$TotalMaleActual." 
	".$TotalFemaleActual."
	".$TotalOtherActual."
	".$percentageMaleAchieved."
    ".$percentageFemaleAchieved."
	".$percentageOtherAchieved."
  </tr>";
  $inc++;
  //$obj->addAlert($data2);
  } 
   $data.="<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
";
$obj->addAssign("bodyDisplay","innerHTML",$data);
return $obj;
}




###details for indicator ids for 1.2.4.1
SELECT *
FROM `tbl_indicator`
WHERE (
(
`tbl_indicator`.`indicator_id` =24
)
OR (
`tbl_indicator`.`indicator_id` =56912
)
OR (
`tbl_indicator`.`indicator_id` =56275
)
OR (
`tbl_indicator`.`indicator_id` =56569
)
OR (
`tbl_indicator`.`indicator_id` =56570
)
OR (
`tbl_indicator`.`indicator_id` =56571
)
)
ORDER BY `tbl_indicator`.`subactivity_id` ASC 


##===========dummy data from the tbl_annual target=========


#-------dumping reported details for indicators================================

CREATE TABLE `tbl_organizationreporting` (
  `id` bigint(30) NOT NULL auto_increment,
  `org_code` bigint(30) NOT NULL,
  `year` year(4) NOT NULL,
  `reportingPeriod` varchar(50) NOT NULL,
  `indicator_id` bigint(20) NOT NULL,
  `male` int(11) NOT NULL,
  `female` int(11) NOT NULL,
  `maleyouth` int(11) NOT NULL,
  `femaleyouth` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date_reported` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `org_code` (`org_code`,`year`,`reportingPeriod`,`indicator_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=598 ;

-- 
-- Dumping data for table `tbl_organizationreporting`
-- 

INSERT INTO `tbl_organizationreporting` (`id`, `org_code`, `year`, `reportingPeriod`, `indicator_id`, `male`, `female`, `maleyouth`, `femaleyouth`, `total`, `date_reported`) VALUES 
(477, 0, 2011, 'Apr - Jun', 24, 0, 0, 0, 0, 0, '2011-08-05 13:33:45'),
(414, 25, 2011, 'Apr - Jun', 56275, 0, 0, 0, 0, 2750, '2011-07-07 09:43:29'),
(491, 0, 2011, 'Apr - Jun', 56565, 0, 0, 0, 0, 0, '2011-08-05 18:33:38'),
(596, 0, 2011, 'Jul - Sep', 56569, 0, 0, 0, 0, 335, '2011-10-10 12:28:10'),
(442, 18, 2011, 'Apr - Jun', 56569, 0, 0, 0, 0, 205, '2011-07-19 09:26:37'),
(426, 43, 2011, 'Apr - Jun', 56569, 0, 0, 0, 0, 429, '2011-07-08 09:02:55'),
(429, 41, 2011, 'Apr - Jun', 56569, 0, 0, 0, 0, 273, '2011-07-08 09:13:59'),
(439, 24, 2011, 'Apr - Jun', 56569, 0, 0, 0, 0, 389, '2011-07-19 09:19:03'),
(432, 23, 2011, 'Apr - Jun', 56569, 0, 0, 0, 0, 396, '2011-07-12 11:37:54'),
(423, 42, 2011, 'Apr - Jun', 56569, 0, 0, 0, 0, 148, '2011-07-08 08:49:03'),
(472, 0, 2011, 'Apr - Jun', 56569, 0, 0, 0, 0, 4498, '2011-08-04 16:29:29'),
(420, 15, 2011, 'Apr - Jun', 56569, 0, 0, 0, 0, 820, '2011-07-08 08:41:52'),
(416, 25, 2011, 'Apr - Jun', 56569, 0, 0, 0, 0, 3350, '2011-07-07 09:43:29'),
(413, 19, 2011, 'Apr - Jun', 56569, 0, 0, 0, 0, 780, '2011-07-07 08:11:00'),
(410, 22, 2011, 'Apr - Jun', 56569, 0, 0, 0, 0, 511, '2011-07-07 07:55:57'),
(407, 26, 2011, 'Apr - Jun', 56569, 0, 0, 0, 0, 424, '2011-07-05 16:24:37'),
(435, 32, 2011, 'Apr - Jun', 56569, 0, 0, 0, 0, 1500, '2011-07-12 12:17:15'),
(473, 0, 2011, 'Apr - Jun', 56912, 0, 0, 0, 0, 652, '2011-08-04 16:38:12'),
(441, 18, 2011, 'Apr - Jun', 56912, 0, 0, 0, 0, 40, '2011-07-19 09:26:37'),
(437, 32, 2011, 'Apr - Jun', 56912, 0, 0, 0, 0, 40, '2011-07-12 12:17:15'),
(434, 23, 2011, 'Apr - Jun', 56912, 0, 0, 0, 0, 50, '2011-07-12 11:37:54'),
(431, 41, 2011, 'Apr - Jun', 56912, 0, 0, 0, 0, 11, '2011-07-08 09:13:59'),
(428, 43, 2011, 'Apr - Jun', 56912, 0, 0, 0, 0, 48, '2011-07-08 09:02:55'),
(425, 42, 2011, 'Apr - Jun', 56912, 0, 0, 0, 0, 20, '2011-07-08 08:49:03'),
(422, 15, 2011, 'Apr - Jun', 56912, 0, 0, 0, 0, 13, '2011-07-08 08:41:52'),
(415, 25, 2011, 'Apr - Jun', 56912, 0, 0, 0, 0, 300, '2011-07-07 09:43:29'),
(412, 19, 2011, 'Apr - Jun', 56912, 0, 0, 0, 0, 40, '2011-07-07 08:11:00'),
(409, 22, 2011, 'Apr - Jun', 56912, 0, 0, 0, 0, 60, '2011-07-07 07:55:57'),
(406, 26, 2011, 'Apr - Jun', 56912, 0, 0, 0, 0, 102, '2011-07-05 16:24:37');










#=========================24102011================================


update tbl_organizationreporting  case when reportingPeriod='Jan - Mar'or 'Apr - Jun' then set half_year='Jan - Jun'
										when reportingPeriod='Jul - Sep'or 'Oct - Dec' then set half_year='Jul - Dec' where half_year='';





select tr.indicator_id,sc.subcomponent_code,sc.subcomponent,
  tr.reportingPeriod,tr.year, 
  
  case  when tr.reportingPeriod between 'Jan' and 'Mar' then sum(at.pquarter1)
  						  when tr.reportingPeriod between 'Jan' and 'Apr' then sum(at.pquarter1)
						  when  tr.reportingPeriod between 'Jan' and 'Jun' then sum(at.pquarter1+at.pquarter2)
						  when  tr.reportingPeriod between 'Jan' and 'Jul' then sum(at.pquarter1+at.pquarter2)
						  when  tr.reportingPeriod between 'Jan' and 'Sep' then sum(at.pquarter1+at.pquarter2+pquarter3)
						  when  tr.reportingPeriod between 'Jan' and 'Oct' then sum(at.pquarter1+at.pquarter2+pquarter3)
						  when  tr.reportingPeriod between 'Jan' and 'Dec' then sum(at.ptotal)
						  when tr.reportingPeriod between 'Mar' and 'Apr' then sum(at.pquarter1)
						  when tr.reportingPeriod between 'Mar' and 'Jun' then sum(at.pquarter2)
						  when tr.reportingPeriod between 'Mar' and 'Jul' then sum(at.pquarter2)
						  when tr.reportingPeriod between 'Mar' and 'Sep' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between 'Mar' and 'Oct' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between 'Mar' and 'Dec' then sum(at.pquarter2+at.pquarter3+pquarter4)
						  when tr.reportingPeriod between 'Apr' and 'Jun' then sum(at.pquarter2)
						  when tr.reportingPeriod between 'Apr' and 'Jul' then sum(at.pquarter2)
						  when tr.reportingPeriod between 'Apr' and 'Sep' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between 'Apr' and 'Oct' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between 'Apr' and 'Dec' then sum(at.pquarter2+at.pquarter3+pquarter4)
						  when tr.reportingPeriod between 'Jun' and 'Jul' then sum(at.pquarter2)
						  when tr.reportingPeriod between 'Jun' and 'Sep' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between 'Jun' and 'Oct' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between 'Jun' and 'Dec' then sum(at.pquarter2+at.pquarter3+pquarter4)
						  
						  when tr.reportingPeriod between 'Jul' and 'Sep' then sum(at.pquarter3)
						  when tr.reportingPeriod between 'Jul' and 'Oct' then sum(at.pquarter3)
						  when tr.reportingPeriod between 'Jul' and 'Dec' then sum(at.pquarter3+pquarter4)
  						  when tr.reportingPeriod between 'Sep' and 'Oct' then sum(at.pquarter3)
						  when tr.reportingPeriod between 'Sep' and 'Dec' then sum(at.pquarter3++pquarter4)
						  when tr.reportingPeriod between 'Oct' and 'Dec' then sum(pquarter4)end as
  
  
  totalcummulativetarget,sum(tr.total) as
   totalcummulativeactual,round(IFNULL(sum(tr.total),0)/IFNULL(case  when tr.reportingPeriod between 'Jan' and 'Mar' then sum(at.pquarter1)
  						  when tr.reportingPeriod between 'Jan' and 'Apr' then sum(at.pquarter1)
						  when  tr.reportingPeriod between 'Jan' and 'Jun' then sum(at.pquarter1+at.pquarter2)
						  when  tr.reportingPeriod between 'Jan' and 'Jul' then sum(at.pquarter1+at.pquarter2)
						  when  tr.reportingPeriod between 'Jan' and 'Sep' then sum(at.pquarter1+at.pquarter2+pquarter3)
						  when  tr.reportingPeriod between 'Jan' and 'Oct' then sum(at.pquarter1+at.pquarter2+pquarter3)
						  when  tr.reportingPeriod between 'Jan' and 'Dec' then sum(at.ptotal)
						  when tr.reportingPeriod between 'Mar' and 'Apr' then sum(at.pquarter1)
						  when tr.reportingPeriod between 'Mar' and 'Jun' then sum(at.pquarter2)
						  when tr.reportingPeriod between 'Mar' and 'Jul' then sum(at.pquarter2)
						  when tr.reportingPeriod between 'Mar' and 'Sep' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between 'Mar' and 'Oct' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between 'Mar' and 'Dec' then sum(at.pquarter2+at.pquarter3+pquarter4)
						  when tr.reportingPeriod between 'Apr' and 'Jun' then sum(at.pquarter2)
						  when tr.reportingPeriod between 'Apr' and 'Jul' then sum(at.pquarter2)
						  when tr.reportingPeriod between 'Apr' and 'Sep' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between 'Apr' and 'Oct' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between 'Apr' and 'Dec' then sum(at.pquarter2+at.pquarter3+pquarter4)
						  when tr.reportingPeriod between 'Jun' and 'Jul' then sum(at.pquarter2)
						  when tr.reportingPeriod between 'Jun' and 'Sep' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between 'Jun' and 'Oct' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between 'Jun' and 'Dec' then sum(at.pquarter2+at.pquarter3+pquarter4)
						  
						  when tr.reportingPeriod between 'Jul' and 'Sep' then sum(at.pquarter3)
						  when tr.reportingPeriod between 'Jul' and 'Oct' then sum(at.pquarter3)
						  when tr.reportingPeriod between 'Jul' and 'Dec' then sum(at.pquarter3+pquarter4)
  						  when tr.reportingPeriod between 'Sep' and 'Oct' then sum(at.pquarter3)
						  when tr.reportingPeriod between 'Sep' and 'Dec' then sum(at.pquarter3++pquarter4)
						  when tr.reportingPeriod between 'Oct' and 'Dec' then sum(pquarter4)end,0)*100,0)
    as ccfPercentageAchieved,plt.period,plt.target as projectlifetarget,round(IFNULL(sum(tr.total),0)/IFNULL(plt.target,0)*100,0)
	 as ccfPercentageProjectLifeAchieved 
  from tbl_organizationreporting  tr left join tbl_indicator i on(tr.indicator_id=i.indicator_id) 
  left join tbl_subactivity s on(i.subactivity_id=s.subact_id) left join tbl_subcomponent sc on(sc.id=i.subcomponent_id)
   left join tbl_output o on(o.output_id=i.output_id) 
  left join tbl_activity a on(a.activity_id=i.activity_id)
   left join tbl_projectlifetargets plt on(tr.indicator_id=plt.indicator_id)
   left join tbl_annualtarget at on(tr.indicator_id=at.indicator_id) where i.indicator_id!=0 
 and i.indicator_name like '%'
 && sc.subcomponent like '%'
 && o.output_name like '%' 
 && a.activity_name like '%'
 && s.subactivity_name like '%' and 
 tr.year between '2011' and '2011' and 
 tr.reportingPeriod between 'Jan' and 'Mar'
 group by tr.indicator_id order by s.subactivity_code asc














select tr.indicator_id,sc.subcomponent_code,sc.subcomponent,
  tr.reportingPeriod,tr.year,
  
  case tr.reportingPeriod  when between 'Jan' and 'Mar' then sum(at.pquarter1)
  						  when between 'Jan' and 'Apr' then sum(at.pquarter1)
						  when between 'Jan' and 'Jun' then sum(at.pquarter1+at.pquarter2)
						  when between 'Jan' and 'Jul' then sum(at.pquarter1+at.pquarter2)
						  when between 'Jan' and 'Sep' then sum(at.pquarter1+at.pquarter2+pquarter3)
						  when between 'Jan' and 'Oct' then sum(at.pquarter1+at.pquarter2+pquarter3)
						  when between 'Jan' and 'Dec' then sum(at.ptotal)
						  when between 'Mar' and 'Apr' then sum(at.pquarter1)
						  when between 'Mar' and 'Jun' then sum(at.pquarter2)
						  when between 'Mar' and 'Jul' then sum(at.pquarter2)
						  when between 'Mar' and 'Sep' then sum(at.pquarter2+at.pquarter3)
						  when between 'Mar' and 'Oct' then sum(at.pquarter2+at.pquarter3)
						  when between 'Mar' and 'Dec' then sum(at.pquarter2+at.pquarter3+pquarter4)
						  when between 'Apr' and 'Jun' then sum(at.pquarter2)
						  when between 'Apr' and 'Jul' then sum(at.pquarter2)
						  when between 'Apr' and 'Sep' then sum(at.pquarter2+at.pquarter3)
						  when between 'Apr' and 'Oct' then sum(at.pquarter2+at.pquarter3)
						  when between 'Apr' and 'Dec' then sum(at.pquarter2+at.pquarter3+pquarter4)
						  when between 'Jun' and 'Jul' then sum(at.pquarter2)
						  when between 'Jun' and 'Sep' then sum(at.pquarter2+at.pquarter3)
						  when between 'Jun' and 'Oct' then sum(at.pquarter2+at.pquarter3)
						  when between 'Jun' and 'Dec' then sum(at.pquarter2+at.pquarter3+pquarter4)
						  
						  when between 'Jul' and 'Sep' then sum(at.pquarter3)
						  when between 'Jul' and 'Oct' then sum(at.pquarter3)
						  when between 'Jul' and 'Dec' then sum(at.pquarter3+pquarter4)
  						  when between 'Sep' and 'Oct' then sum(at.pquarter3)
						  when between 'Sep' and 'Dec' then sum(at.pquarter3++pquarter4)
						  when between 'Oct' and 'Dec' then sum(pquarter4) as
  
  
  totalcummulativetarget end, sum(tr.total) as
   totalcummulativeactual,round(IFNULL(sum(tr.total),0)/IFNULL(at.totalcummulativetarget,0)*100,0)
    as ccfPercentageAchieved,plt.period,plt.target as projectlifetarget,round(IFNULL(sum(tr.total),0)/IFNULL(plt.target,0)*100,0)
	 as ccfPercentageProjectLifeAchieved 
  from tbl_organizationreporting  tr left join tbl_indicator i on(tr.indicator_id=i.indicator_id) 
  left join tbl_subactivity s on(i.subactivity_id=s.subact_id) left join tbl_subcomponent sc on(sc.id=i.subcomponent_id)
   left join tbl_output o on(o.output_id=i.output_id) 
  left join tbl_activity a on(a.activity_id=i.activity_id)
   left join tbl_projectlifetargets plt on(tr.indicator_id=plt.indicator_id)
   left join tbl_annualtarget at on(tr.indicator_id=at.indicator_id) where i.indicator_id!=0 
 and i.indicator_name like '%'
 && sc.subcomponent like '%'
 && o.output_name like '%' 
 && a.activity_name like '%'
 && s.subactivity_name like '%' and 
 tr.year between '2011' and '2011' and 
 tr.reportingPeriod between 'Jan' and 'Mar'
 group by tr.indicator_id order by s.subactivity_code asc











 case tr.reportingPeriod when  between 'Jan' and 'Mar' then sum(at.pquarter1)
  						  when between 'Jan' and 'Apr' then sum(at.pquarter1)
						  when between 'Jan' and 'Jun' then sum(at.pquarter1+at.pquarter2)
						  when between 'Jan' and 'Jul' then sum(at.pquarter1+at.pquarter2)
						  when between 'Jan' and 'Sep' then sum(at.pquarter1+at.pquarter2+pquarter3)
						  when between 'Jan' and 'Oct' then sum(at.pquarter1+at.pquarter2+pquarter3)
						  when between 'Jan' and 'Dec' then sum(at.ptotal)
						  when between 'Mar' and 'Apr' then sum(at.pquarter1)
						  when between 'Mar' and 'Jun' then sum(at.pquarter2)
						  when between 'Mar' and 'Jul' then sum(at.pquarter2)
						  when between 'Mar' and 'Sep' then sum(at.pquarter2+at.pquarter3)
						  when between 'Mar' and 'Oct' then sum(at.pquarter2+at.pquarter3)
						  when between 'Mar' and 'Dec' then sum(at.pquarter2+at.pquarter3+pquarter4)
						  when between 'Apr' and 'Jun' then sum(at.pquarter2)
						  when between 'Apr' and 'Jul' then sum(at.pquarter2)
						  when between 'Apr' and 'Sep' then sum(at.pquarter2+at.pquarter3)
						  when between 'Apr' and 'Oct' then sum(at.pquarter2+at.pquarter3)
						  when between 'Apr' and 'Dec' then sum(at.pquarter2+at.pquarter3+pquarter4)
						  when between 'Jun' and 'Jul' then sum(at.pquarter2)
						  when between 'Jun' and 'Sep' then sum(at.pquarter2+at.pquarter3)
						  when between 'Jun' and 'Oct' then sum(at.pquarter2+at.pquarter3)
						  when between 'Jun' and 'Dec' then sum(at.pquarter2+at.pquarter3+pquarter4)
						  
						  when between 'Jul' and 'Sep' then sum(at.pquarter3)
						  when between 'Jul' and 'Oct' then sum(at.pquarter3)
						  when between 'Jul' and 'Dec' then sum(at.pquarter3+pquarter4)
  						  when between 'Sep' and 'Oct' then sum(at.pquarter3)
						  when between 'Sep' and 'Dec' then sum(at.pquarter3++pquarter4)
						  when between 'Oct' and 'Dec' then sum(pquarter4)
  




 baseline, pquarter1, pquarter2, pquarter3, pquarter4, ptotal
#------------------15092011----------------------------
INSERT INTO `db_abi_v1`.`tbl_lookup` (
`classCode` ,
`classDescription` ,
`code` ,
`codeName` ,
`notes`
)
VALUES 

('5', 'months', '17', 'Jan', 'months of the year'), 
('5', 'month', '18', 'Mar', 'months of the year'),
('5', 'months', '19', 'Apr', 'months of the year'), 
('5', 'month', '20', 'Jun', 'months of the year'),
('5', 'months', '21', 'Jul', 'months of the year'),
 ('5', 'months', '23', 'Sep', 'months of the year'),
 ('5', 'months', '24', 'Oct', 'months of the year'),
 ('5', 'months', '25', 'Dec', 'months of the year');



#---------------------------------17082011
delete from tbl_organization where org_code=7
#---------------------------------31072011----------------------------------------



CREATE TABLE `tbl_role` (
`role_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`usergroup` INT NOT NULL ,
`role_name` VARCHAR( 50 ) NOT NULL ,
`description` VARCHAR( 100 ) NOT NULL ,
UNIQUE (
`usergroup`
)
) ENGINE = innodb;




#--------------------------------25072011------------------------------------------
SELECT o.org_code AS org_code1, o.orgName, o.subcomponent, r.year, r.reportingPeriod, sum( if( (
r.reportingPeriod = 'Jan - Mar'
), r.total, '' ) ) AS Quarter1, sum( if( (
r.reportingPeriod = 'Apr - Jun'
), r.total, '' ) ) AS Quarter2, sum( if( (
r.reportingPeriod = 'Jul - Sep'
), r.total, '' ) ) AS Quarter3, sum( if( (
r.reportingPeriod = 'Oct - Dec'
), r.total, '' ) ) AS Quarter4, r.year
FROM tbl_organization o
LEFT JOIN tbl_organizationreporting r ON ( o.org_code = r.org_code )
WHERE subcomponent LIKE '%".$_SESSION['titlesubcomponent']."%'
GROUP BY o.org_code ORDER BY orgName ASC




SELECT o.org_code, o.orgName, o.subcomponent,sum(if((r.reportingPeriod='Jan - Mar'),r.total,'')) as Quarter1,sum(if((r.reportingPeriod='Apr - Jun'),r.total,'')) as Quarter2,sum(if((r.reportingPeriod='Jul - Sep'),r.total,'')) as Quarter3,sum(if((r.reportingPeriod='Oct - Dec'),r.total,'')) as Quarter4,r.year
FROM view_organization o
 JOIN tbl_organizationreporting r ON ( r.org_code = o.org_code )
WHERE subcomponent LIKE '%".$_SESSION['titlesubcomponent']."%' 
GROUP BY o.org_code
ORDER BY orgName ASC";
#--------------------------------201072011-----------------------------------------
 SELECT *
FROM `tbl_organization`
WHERE subcomponent LIKE '%Value%'
ORDER BY `tbl_organization`.`subcomponent` ASC
LIMIT 0 , 30 



DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 387 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 388 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 389 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 390 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 391 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 392 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 393 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 394 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 395 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 396 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 397 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 398 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 399 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 400 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 401 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 402 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 136 LIMIT 1;

ALTER TABLE `tbl_annualtarget` ADD UNIQUE (
`year` ,
`indicator_id`
);







 CREATE OR REPLACE VIEW view_dashboard AS
SELECT `i`.`indicator_id` AS `indicator_id` , `i`.`indicator_name` AS `indicator_name` , `i`.`indicator_type` AS `indicator_type` , `at`.`ptotal` AS `target` , `at`.`year` AS `year`, sum(r.total) as actual,round((sum(r.total)/ptotal)*100,0) as percentageAchieved
FROM `tbl_indicator` `i`
INNER JOIN `tbl_annualtarget` `at` ON ( (
`i`.`indicator_id` = `at`.`indicator_id`
) ) inner join tbl_organizationreporting r on(r.indicator_id=i.indicator_id)
WHERE indicator_type LIKE '%' group by at.year,i.indicator_id
ORDER BY `i`.`indicator_id` ASC

#--------------for graph library

 select at.indicator_id,i.indicator_name,s.subcomponent,i.indicator_type,count(at.ptotal) as counted_rows,
  sum(if((at.year='2010'),at.ptotal,'')) as year2010, sum(if((at.year='2011'),at.ptotal,'')) as year2011,sum(if((at.year='2012'),at.ptotal,'')) as year2012,sum(if((at.year='2013'),at.ptotal,'')) as year2013,
  sum(if((r.year='2010'),r.total,0)) as year2010Actual,sum(if((r.year='2011'),r.total,0)) as year2011Actual,sum(if((r.year='2012'),r.total,0)) as year2012Actual,sum(if((r.year='2013'),r.total,0)) as year2013Actual,round(sum(if((r.year='2010'),r.total,0))+sum(if((r.year='2011'),r.total,0))+sum(if((r.year='2012'),r.total,0))+sum(if((r.year='2013'),r.total,0)),0) as projectlifeactual,
  
  
  round(sum(if((at.year='2010'),at.ptotal,''))+sum(if((at.year='2011'),at.ptotal,''))+sum(if((at.year='2012'),at.ptotal,''))+sum(if((at.year='2013'),at.ptotal,'')),0) as projectlifetarget,
  round(IFNULL(sum(if((r.year='2010'),r.total,0))+sum(if((r.year='2011'),r.total,0))+sum(if((r.year='2012'),r.total,0))+sum(if((r.year='2013'),r.total,0)),0)/IFNULL(sum(if((at.year='2010'),at.ptotal,''))+sum(if((at.year='2011'),at.ptotal,''))+sum(if((at.year='2012'),at.ptotal,''))+sum(if((at.year='2013'),at.ptotal,'')),0)*100,2) as percentageprojectlifeTargetvsActual
  
  
   from tbl_annualtarget at inner join  tbl_organizationreporting r on(r.indicator_id=at.indicator_id) inner join tbl_indicator i on(i.indicator_id=at.indicator_id) inner join tbl_subcomponent s on(i.subcomponent_id=s.id)  where i.indicator_type like '%' and  lower(subcomponent) like '%' AND lower(indicator_name) like '%'  group by indicator_id order by indicator_id asc





SELECT o.org_code, o.orgName, o.subcomponent, sum(if((r.reportingPeriod='Jan - Mar'),r.total,'')) as Quarter1,sum(if((r.reportingPeriod='Apr - Jun'),r.total,'')) as Quarter2,sum(if((r.reportingPeriod='Jul - Sep'),r.total,'')) as Quarter3,sum(if((r.reportingPeriod='Oct - Dec'),r.total,'')) as Quarter4,r.year
FROM tbl_organization o
LEFT JOIN tbl_organizationreporting r ON ( r.org_code = o.org_code )
WHERE subcomponent LIKE '%Value Chain Development%'  and year='2011' and o.org_code='25'
GROUP BY o.org_code
ORDER BY orgName ASC



SELECT o.org_code, o.orgName, o.subcomponent, if((r.reportingPeriod='Jan - Mar'),'Jan - Mar','') as Quarter1,if((r.reportingPeriod='Apr - Jun'),'Apr - Jun','') as Quarter2,if((r.reportingPeriod='Jul - Sep'),'Jul - Sep','') as Quarter3,if((r.reportingPeriod='Oct - Dec'),'Oct - Dec','') as Quarter4, 
FROM tbl_organization o
LEFT JOIN tbl_organizationreporting r ON ( r.org_code = o.org_code )
WHERE subcomponent LIKE '%Value Chain Development%' and year='2011'
GROUP BY o.org_code
ORDER BY orgName ASC








SELECT o.org_code, o.orgName, o.subcomponent, if((r.reportingPeriod='Jan - Mar'),'Jan - Mar','') as Quarter1,if((r.reportingPeriod='Apr - Jun'),'Apr - Jun','') as Quarter2,if((r.reportingPeriod='Jul - Sep'),'Jul - Sep','') as Quarter3,if((r.reportingPeriod='Oct - Dec'),'Oct - Dec','') as Quarter4, r.year
FROM tbl_organization o
LEFT JOIN tbl_organizationreporting r ON (r.org_code = o.org_code )
WHERE subcomponent LIKE '%' and year='2011'
GROUP BY o.org_code
ORDER BY orgName ASC
LIMIT 0 , 30; 






 SELECT count( subact_id ) , a.year, fa.reportingPeriod, s.subact_id, 
FROM tbl_subactivity s
LEFT JOIN tbl_subcomponent sc ON ( sc.id = s.subcomponent_id )
LEFT JOIN tbl_activity aa ON ( aa.activity_id = s.activity_id )
LEFT JOIN tbl_annualbudget a ON ( a.subactivity_id = s.subact_id )
LEFT JOIN tbl_financialactuals fa ON ( s.subact_id = fa.subactivity_id )
WHERE sc.subcomponent LIKE '%'
AND aa.activity_name LIKE '%'
AND s.subactivity_name LIKE '%'
AND a.year LIKE '2011%'
AND fa.reportingPeriod LIKE 'Apr - Jun%'
GROUP BY fa.year, fa.reportingPeriod ASC
LIMIT 0 , 30 

 SELECT a.year, fa.reportingPeriod, s.subact_id,IFNULL( sum( a.fquarter2) , 0 ) AS TotalSumannualtarget, IFNULL( sum( fa.amount ) , 0 ) AS TotalSumFinancialActualAmount
FROM tbl_subactivity s
LEFT JOIN tbl_subcomponent sc ON ( sc.id = s.subcomponent_id )
LEFT JOIN tbl_activity aa ON ( aa.activity_id = s.activity_id )
LEFT JOIN tbl_annualbudget a ON ( a.subactivity_id = s.subact_id )
LEFT JOIN tbl_financialactuals fa ON ( s.subact_id = fa.subactivity_id )
WHERE sc.subcomponent LIKE '%'
AND aa.activity_name LIKE '%'
AND s.subactivity_name LIKE '%'
AND a.year LIKE '2011%'
AND fa.reportingPeriod LIKE 'Apr - Jun%' group by s.subact_id,
ORDER BY s.subact_id ASC
LIMIT 0 , 30 




#---------------------------------05072011------------------------------------------------------------------
create or replace view  view_projectLifeAnnualActuals as select at.indicator_id,i.indicator_name,s.subcomponent,i.indicator_type,count(at.ptotal) as counted_rows,
  sum(if((at.year='2010'),at.ptotal,'')) as year2010, sum(if((at.year='2011'),at.ptotal,'')) as year2011,sum(if((at.year='2012'),at.ptotal,'')) as year2012,sum(if((at.year='2013'),at.ptotal,'')) as year2013,
  sum(if((r.year='2010'),r.total,0)) as year2010Actual,sum(if((r.year='2011'),r.total,0)) as year2011Actual,sum(if((r.year='2012'),r.total,0)) as year2012Actual,sum(if((r.year='2013'),r.total,0)) as year2013Actual,round(sum(if((r.year='2010'),r.total,0))+sum(if((r.year='2011'),r.total,0))+sum(if((r.year='2012'),r.total,0))+sum(if((r.year='2013'),r.total,0)),0) as projectlifeactual,
  
  
  round(sum(if((at.year='2010'),at.ptotal,''))+sum(if((at.year='2011'),at.ptotal,''))+sum(if((at.year='2012'),at.ptotal,''))+sum(if((at.year='2013'),at.ptotal,'')),0) as projectlifetarget,
  round(IFNULL(sum(if((r.year='2010'),r.total,0))+sum(if((r.year='2011'),r.total,0))+sum(if((r.year='2012'),r.total,0))+sum(if((r.year='2013'),r.total,0)),0)/IFNULL(sum(if((at.year='2010'),at.ptotal,''))+sum(if((at.year='2011'),at.ptotal,''))+sum(if((at.year='2012'),at.ptotal,''))+sum(if((at.year='2013'),at.ptotal,'')),0)*100,2) as percentageprojectlifeTargetvsActual
  
  
   from tbl_annualtarget at inner join  tbl_organizationreporting r on(r.indicator_id=at.indicator_id) inner join tbl_indicator i on(i.indicator_id=at.indicator_id) inner join tbl_subcomponent s on(i.subcomponent_id=s.id)   group by indicator_id order by indicator_id asc



#----------------------------------04072011-----------------------------------------------------------------
CREATE OR REPLACE VIEW view_annualtarget as select t.p_id,i.prog_id,t.subactivity_id,i.subcomponent_id,i.subcomponent,i.output_name,i.activity_name,i.subactivity_name,i.subactivity_code,t.indicator_id,i.indicator_name,t.year,t.baseline,t.ptotal,plt.target as projectlifetarget,i.indicator_type,t.pquarter1,t.pquarter2,t.pquarter3,t.pquarter4, from view_indicator i inner join tbl_annualtarget t   on(i.indicator_id=t.indicator_id) left join tbl_projectlifetargets plt on(plt.indicator_id=i.indicator_id) order by indicator_id asc; 

create or replace view view_ResultBasesAnnualtargets as select at.indicator_id,i.indicator_name,i.indicator_type,count(at.ptotal) as counted_rows, sum(if((at.year='2010'),at.ptotal,'')) as year2010, sum(if((at.year='2011'),at.ptotal,'')) as year2011,sum(if((at.year='2012'),at.ptotal,'')) as year2012,sum(if((at.year='2013'),at.ptotal,'')) as year2013 from tbl_annualtarget at inner join tbl_indicator i on(i.indicator_id=at.indicator_id) where i.indicator_type like 'Result Based%'  group by indicator_id order by indicator_id asc;

###

#select at.indicator_id,i.indicator_name,s.subcomponent,i.indicator_type,count(at.ptotal) as counted_rows,
  sum(if((at.year='2010'),at.ptotal,'')) as year2010, sum(if((at.year='2011'),at.ptotal,'')) as year2011,sum(if((at.year='2012'),at.ptotal,'')) as year2012,sum(if((at.year='2013'),at.ptotal,'')) as year2013,
 
  
  
  avg(sum(if((at.year='2010'),at.ptotal,''))+sum(if((at.year='2011'),at.ptotal,''))) as projectlifetarget
 
  
  
   from tbl_annualtarget at inner join  tbl_organizationreporting r on(r.indicator_id=at.indicator_id) inner join tbl_indicator i on(i.indicator_id=at.indicator_id) inner join tbl_subcomponent s on(i.subcomponent_id=s.id)  where i.indicator_type like '%' and  lower(subcomponent) like '%' AND lower(indicator_name) like '%'  group by indicator_id order by indicator_id asc


### sum(if((r.year='2010'),r.total,0)) as year2010Actual,sum(if((r.year='2011'),r.total,0)) as year2011Actual,sum(if((r.year='2012'),r.total,0)) as year2012Actual,sum(if((r.year='2013'),r.total,0)) as year2013Actual,sum(sum(if((r.year='2010'),r.total,0))+sum(if((r.year='2011'),r.total,0))+sum(if((r.year='2012'),r.total,0))+sum(if((r.year='2013'),r.total,0))) as projectlifeactual,

/// round(IFNULL(sum(sum(if((r.year='2010'),r.total,0))+sum(if((r.year='2011'),r.total,0))+sum(if((r.year='2012'),r.total,0))+sum(if((r.year='2013'),r.total,0))),0)/IFNULL(sum(sum(if((at.year='2010'),at.ptotal,''))+sum(if((at.year='2011'),at.ptotal,''))+sum(if((at.year='2012'),at.ptotal,''))+sum(if((at.year='2013'),at.ptotal,''))),0)*100,2) as percentageprojectlifeTargetvsActual
#-------------------------------29062011---------------------------------------------------------------------
create or replace view view_organizationreporting as select r.id,r.org_code,o.orgName,r.year,r.reportingPeriod,r.indicator_id,i.subcomponent_id,i.subcomponent,i.subactivity_code,i.subactivity_name,i.activity_id,i.activity_code,i.activity_name,i.indicator_name,i.indicator_type,i.disaggregation,i.abitrust_category,i.responsible as responsible_for_reporting,r.male,r.female,r.maleyouth,r.femaleyouth,r.total from tbl_organizationreporting r left join tbl_organization o on(o.org_code=r.org_code) left join view_indicator i on(r.indicator_id=i.indicator_id) order by indicator_id;


create or replace view view_organization as select o.org_code,o.orgName,o.acronym,o.registered,o.registration_no,o.district,o.orgtype,o.emailAddress1,o.emailAddress2,o.emailAddress3,l.codeName as organization_type,o.vision,o.mission,o.objective
,o.subcomponent,
s.subcomponent as subcomponent_name,o.subsector,o.username,o.password,o.usergroup,o.website,o.contact_person,o.title,o.telephone,o.mobile,o.contact_person2,o.title2,o.telephone2,o.mobile2,o.contact_person3,o.title3,o.telephone3,o.mobile3 from tbl_organization o left join tbl_lookup l on(o.orgtype=l.code) left join tbl_subcomponent s on(s.id=o.subcomponent)  order by orgName asc;



ALTER TABLE `tbl_organization` ADD `emailAddress1` VARCHAR( 50 ) NOT NULL AFTER `mobile3` ,
ADD `emailAddress2` VARCHAR( 50 ) NOT NULL AFTER `emailAddress1` ,
ADD `emailAddress3` VARCHAR( 50 ) NOT NULL AFTER `emailAddress2` ;



create or replace view view_budgetsummary as select p.prog_id,p.program_name,a.subcomponent_id,s.subcomponent,a.activity_id,ta.activity_code,ta.activity_name,a.year,sum(a.fquarter1) as sfquarter1,sum(a.fquarter2) as sfquarter2,sum(a.fquarter3) as sfquarter3,sum(a.fquarter4) as sfquarter4,sum(a.ftotal) as sftotal from tbl_annualbudget a left join tbl_subcomponent s on(s.id=a.subcomponent_id) left join tbl_activity ta on(a.activity_id=ta.activity_id) inner join tbl_programme p on(p.prog_id=ta.prog_id) group by activity_id,year order by subcomponent_id asc;



CREATE OR REPLACE VIEW view_annualbudget as select b.f_id,b.year,o.output_name,o.output_code,o.output_id,sc.subcomponent,sc.id as subcomponent_id,sc.subcomponent_code,aa.activity_id,aa.activity_code,aa.activity_name,b.subactivity_id,sa.subactivity_code,sa.subactivity_name,b.fquarter1,b.fquarter2,b.fquarter3,b.fquarter4,b.ftotal  from tbl_annualbudget b inner join tbl_subactivity sa on(sa.subact_id=b.subactivity_id) inner join tbl_activity aa on(aa.activity_id=sa.activity_id)inner join tbl_output o on(o.output_id=sa.output_id) inner join  tbl_subcomponent sc on(sc.id=sa.subcomponent_id) order by subactivity_code asc; 



ALTER TABLE `tbl_databasebackuplog` ADD UNIQUE (
`file_name` ,
`date_uploaded`
);





#----------------------------------------08062011-----------------------------------------------------------
ALTER TABLE `tbl_programme_log` DROP `Changed_from` ,
DROP `Changed_to` ;

ALTER TABLE `tbl_programme_log` CHANGE `description` `table_pk_id` BIGINT( 20 ) NOT NULL 



RENAME TABLE `db_abi_v1`.`programme_log`  TO `db_abi_v1`.`tbl_programme_log` ;
ALTER TABLE `tbl_programme_log` ADD PRIMARY KEY(`log_id`);

 UPDATE `db_abi_v1`.`tbl_programme_log` SET `log_id` = '1' WHERE `tbl_programme_log`.`log_id` = 0 AND CONVERT(`tbl_programme_log`.`user_id` USING utf8) = 'root@localhost' AND CONVERT(`tbl_programme_log`.`description` USING utf8) = 'Record updated 2aspx' LIMIT 1; UPDATE `db_abi_v1`.`tbl_programme_log` SET `log_id` = '2' WHERE `tbl_programme_log`.`log_id` = 0 AND CONVERT(`tbl_programme_log`.`user_id` USING utf8) = 'root@localhost' AND CONVERT(`tbl_programme_log`.`description` USING utf8) = 'Record updated 2aspx 556' LIMIT 1; UPDATE `db_abi_v1`.`tbl_programme_log` SET `log_id` = '3' WHERE `tbl_programme_log`.`log_id` = 0 AND CONVERT(`tbl_programme_log`.`user_id` USING utf8) = 'root@localhost' AND CONVERT(`tbl_programme_log`.`description` USING utf8) = 'Record updated 1U-Growth' LIMIT 1; UPDATE `db_abi_v1`.`tbl_programme_log` SET `log_id` = '4' WHERE `tbl_programme_log`.`log_id` = 0 AND CONVERT(`tbl_programme_log`.`user_id` USING utf8) = 'root@localhost' AND CONVERT(`tbl_programme_log`.`des[...]


UPDATE `db_abi_v1`.`tbl_programme_log` SET `log_id` = '5' WHERE `tbl_programme_log`.`log_id` =0 AND CONVERT( `tbl_programme_log`.`user_id` USING utf8 ) = 'root@localhost' AND CONVERT( `tbl_programme_log`.`description` USING utf8 ) = 'Record updated 1U-Growth uganda' LIMIT 1 ;

UPDATE `db_abi_v1`.`tbl_programme_log` SET `log_id` = '6' WHERE `tbl_programme_log`.`log_id` =4 AND CONVERT( `tbl_programme_log`.`user_id` USING utf8 ) = 'root@localhost' AND CONVERT( `tbl_programme_log`.`description` USING utf8 ) = 'Record updated 1U-Growth ' LIMIT 1 ;


ALTER TABLE `tbl_programme_log` ADD PRIMARY KEY ( `log_id` ) ;
 ALTER TABLE `tbl_programme_log` CHANGE `log_id` `log_id` BIGINT( 20 ) NOT NULL AUTO_INCREMENT  ;
 ALTER TABLE `tbl_programme_log` ADD `Query_executed` VARCHAR( 500 ) NOT NULL AFTER `description` ;
 
 ALTER TABLE `tbl_programme_log` ADD `Table_affected` VARCHAR( 100 ) NOT NULL AFTER `Query_executed` ,
ADD `from` VARCHAR( 500 ) NOT NULL AFTER `Table_affected` ,
ADD `to` VARCHAR( 500 ) NOT NULL AFTER `from` ;


ALTER TABLE `tbl_programme_log` ADD `timeanddate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ;


CREATE TABLE `tbl_menu_categories` (
  `tbl_menu_categoriesId` int(11) NOT NULL auto_increment,
  `MenuCategory` varchar(200) default NULL,
  `Rank` int(11) default NULL,
  PRIMARY KEY  (`tbl_menu_categoriesId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- 
-- Dumping data for table `tbl_menu_categories`
-- 

INSERT INTO `tbl_menu_categories` (`tbl_menu_categoriesId`, `MenuCategory`, `Rank`) VALUES 
(1, 'Home', 1),
(3, 'Loans', 1),
(4, 'Clients', 2),
(5, 'Inventory', 3),
(6, 'Bank', 4),
(7, 'Expenses', 5),
(8, 'Reports', 6);

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_menu_items`
-- 

CREATE TABLE `tbl_menu_items` (
  `tbl_menu_itemsId` int(11) NOT NULL auto_increment,
  `MenuCategory` varchar(200) default NULL,
  `MenuItem` varchar(200) default NULL,
  `LinkvalCode` varchar(200) default NULL,
  `Rank` varchar(200) default NULL,
  PRIMARY KEY  (`tbl_menu_itemsId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

-- 
-- Dumping data for table `tbl_menu_items`
-- 

INSERT INTO `tbl_menu_items` (`tbl_menu_itemsId`, `MenuCategory`, `MenuItem`, `LinkvalCode`, `Rank`) VALUES 
(1, 'Home', 'Home', 'Home', '1'),
(2, 'Home', 'EditMenus', 'EditMenus', '2'),
(3, 'Home', 'Work Flow', 'Work Flow', '5'),
(4, 'Home', 'Backup the info', 'Backup the info', '3'),
(5, 'Home', 'Audit Trail', 'Audit Trail', '4'),
(6, 'Home', 'Back to Main', 'Back to Main', '2'),
(7, 'Home', 'SysAdmin', 'SysAdmin', '6'),
(10, 'Loans', 'Intiante Process', 'Intiante Process', '1'),
(11, 'Loans', 'Pending Requests', 'Pending Requests', '2'),
(12, 'Loans', 'Modify Accounts', 'Modify Accounts', '3'),
(13, 'Loans', 'View Accounts', 'View Accounts', '4'),
(14, 'Loans', 'View Requests', 'View Requests', '5'),
(15, 'Clients', 'View Clients', 'View Clients', '1'),
(16, 'Inventory', 'Securities', 'Securities', '1'),
(17, 'Inventory', 'Others', 'Others', '2'),
(18, 'Inventory', 'Add Inventory Location', 'Add Inventory Location', '3'),
(19, 'Bank', 'Add Bank Account', 'Add Bank Account', '1'),
(20, 'Bank', 'Deposite', 'Deposite', '2'),
(21, 'Bank', 'Withdraw', 'Withdraw', '3'),
(22, 'Bank', 'View Bank Accounts', 'View Bank Accounts', '4'),
(23, 'Bank', 'View Cheques', 'View Cheques', '5'),
(24, 'Bank', 'Bank Reports', 'Bank Reports', '6'),
(25, 'Expenses', 'Add an Expense Item', 'Add an Expense Item', '1'),
(26, 'Expenses', 'View Expences', 'View Expences', '2'),
(27, 'Expenses', 'View Categories', 'View Expense Categories', '3'),
(28, 'Reports', 'Realised Interest', 'Realised Interest', '1'),
(29, 'Reports', 'Daily Accountability', 'Daily Accountability', '2'),
(30, 'Reports', 'Monthy Accountability', 'Monthy Accountability', '2');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_permisions`
-- 

CREATE TABLE `tbl_permisions` (
  `tbl_permisionsId` int(11) NOT NULL auto_increment,
  `groupCode` varchar(200) default NULL,
  `MenuItem` varchar(200) default NULL,
  `EntryDate` date default NULL,
  `EnteredBy` varchar(200) default NULL,
  PRIMARY KEY  (`tbl_permisionsId`),
  UNIQUE KEY `groupCode` (`groupCode`,`MenuItem`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=383 ;

-- 
-- Dumping data for table `tbl_permisions`
-- 

INSERT INTO `tbl_permisions` (`tbl_permisionsId`, `groupCode`, `MenuItem`, `EntryDate`, `EnteredBy`) VALUES 
(352, 'SystemAdministrator', '1', '2011-03-05', 'Admin1'),
(353, 'SystemAdministrator', '6', '2011-03-05', 'Admin1'),
(354, 'SystemAdministrator', '2', '2011-03-05', 'Admin1'),
(355, 'SystemAdministrator', '4', '2011-03-05', 'Admin1'),
(356, 'SystemAdministrator', '5', '2011-03-05', 'Admin1'),
(357, 'SystemAdministrator', '3', '2011-03-05', 'Admin1'),
(358, 'SystemAdministrator', '7', '2011-03-05', 'Admin1'),
(359, 'SystemAdministrator', '8', '2011-03-05', 'Admin1'),
(360, 'SystemAdministrator', '9', '2011-03-05', 'Admin1'),
(361, 'Officer', '1', '2011-03-07', 'Admin1'),
(362, 'Officer', '10', '2011-03-07', 'Admin1'),
(363, 'Officer', '11', '2011-03-07', 'Admin1'),
(364, 'Officer', '12', '2011-03-07', 'Admin1'),
(365, 'Officer', '13', '2011-03-07', 'Admin1'),
(366, 'Officer', '14', '2011-03-07', 'Admin1'),
(367, 'Officer', '15', '2011-03-07', 'Admin1'),
(368, 'Officer', '16', '2011-03-07', 'Admin1'),
(369, 'Officer', '17', '2011-03-07', 'Admin1'),
(370, 'Officer', '18', '2011-03-07', 'Admin1'),
(371, 'Officer', '19', '2011-03-07', 'Admin1'),
(372, 'Officer', '20', '2011-03-07', 'Admin1'),
(373, 'Officer', '21', '2011-03-07', 'Admin1'),
(374, 'Officer', '22', '2011-03-07', 'Admin1'),
(375, 'Officer', '23', '2011-03-07', 'Admin1'),
(376, 'Officer', '24', '2011-03-07', 'Admin1'),
(377, 'Officer', '25', '2011-03-07', 'Admin1'),
(378, 'Officer', '26', '2011-03-07', 'Admin1'),
(379, 'Officer', '27', '2011-03-07', 'Admin1'),
(380, 'Officer', '28', '2011-03-07', 'Admin1'),
(381, 'Officer', '29', '2011-03-07', 'Admin1'),
(382, 'Officer', '30', '2011-03-07', 'Admin1');





#--------------------------------------may 30  2011------------------------------------------------------
//delimiter

#--------------------------------------28052011----------------------------------------------------------
ALTER TABLE `tbl_programme_logafter` CHANGE `program_name` `Description_after` VARCHAR( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ;
ALTER TABLE `tbl_programme_logafter` CHANGE `Description_after` `Description_after` VARCHAR( 500 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ;
ALTER TABLE `tbl_programme_log` CHANGE `from` `Changed_from` VARCHAR( 500 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
CHANGE `to` `Changed_to` VARCHAR( 500 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL

ALTER TABLE `tbl_programme_logbefore` CHANGE `program_name` `description_after` VARCHAR( 500 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL 










#---------------------------------------25052011---------------------------------------------------------
ALTER TABLE `tbl_home` CHANGE `home_id` `home_id` INT( 20 ) NOT NULL AUTO_INCREMENT 

 ALTER TABLE `tbl_documents` CHANGE `document_id` `document_id` INT( 11 ) NOT NULL AUTO_INCREMENT

ALTER TABLE `tbl_documents` ADD PRIMARY KEY ( `document_id` ) ;

ALTER TABLE `tbl_documents` ADD UNIQUE (
`document_name`
);


 CREATE TABLE `tbl_documents` (
`document_id` INT( 11 ) NOT NULL ,
`document_name` VARCHAR( 100 ) NOT NULL ,
`file_name` VARCHAR( 100 ) NOT NULL
) ENGINE = INNODB CHARACTER SET latin1 COLLATE latin1_swedish_ci ;

CREATE TABLE `tbl_databaseBackupLog` (
`backup_id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`file_name` VARCHAR( 100 ) NOT NULL ,
`date_uploaded` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
UNIQUE (
`file_name`
)
) ENGINE = innodb;

CREATE OR REPLACE VIEW view_annualbudget as select b.f_id,b.year,o.output_name,o.output_code,o.output_id,sc.subcomponent,sc.id as subcomponent_id,sc.subcomponent_code,aa.activity_id,aa.activity_code,aa.activity_name,b.subactivity_id,sa.subactivity_code,sa.subactivity_name,b.fquarter1,b.fquarter2,b.fquarter3,b.fquarter4,b.ftotal  from tbl_annualbudget b inner join tbl_subactivity sa on(sa.subact_id=b.subactivity_id) inner join tbl_activity aa on(aa.activity_id=sa.activity_id)inner join tbl_output o on(o.output_id=sa.output_id) inner join  tbl_subcomponent sc on(sc.id=sa.subcomponent_id) order by subactivity_code asc; 
#---------------------------------------19052011---------------------------------------------------------
CREATE OR REPLACE VIEW view_annualbudget as select b.f_id,b.year,o.output_name,o.output_code,o.output_id,sc.subcomponent,sc.id as subcomponent_id,sc.subcomponent_code,aa.activity_id,aa.activity_code,aa.activity_name,b.subactivity_id,sa.subactivity_code,sa.subactivity_name,b.fquarter1,b.fquarter2,b.fquarter3,b.fquarter4,b.ftotal  from tbl_annualbudget b inner join tbl_subactivity sa on(sa.subact_id=b.subactivity_id) inner join tbl_activity aa on(aa.activity_id=sa.activity_id)inner join tbl_output o on(o.output_id=sa.output_id) inner join  tbl_subcomponent sc on(sc.id=sa.subcomponent_id) order by subactivity_code asc; 


create or replace view  view_indicator_target_actual as select `i`.`indicator_id` AS `indicator_id`,`i`.`indicator_name` AS `indicator_name`,i.gender,i.subactivity_id,ss.subactivity_name,ss.subactivity_code,a.activity_id,a.activity_code,a.activity_name,o.output_id,o.output_code,o.output_name,sc.id as subcomponent_id,sc.subcomponent_code,sc.subcomponent,`r`.`year` AS `ReportingYear`,`at`.`pquarter1` AS `targetQ1`,`r`.`reportingPeriod` AS `reportingPeriod`,`q`.`quarterCode` AS `quarterCode`,q.quarterName,`at`.`pquarter2` AS `targetQ2`,`at`.`pquarter3` AS `targetQ3`,`at`.`pquarter4` AS `targetQ4`,r.total as totalActual from `tbl_indicator` `i` inner join tbl_subactivity s on(s.subact_id=i.subactivity_id) inner join tbl_activity a on(i.activity_id=a.activity_id) inner join tbl_output o on(o.output_id=i.output_id) inner join tbl_subcomponent sc on(sc.id=i.subcomponent_id) inner join tbl_annualtarget at on (`i`.`indicator_id` = `at`.`indicator_id`) inner join tbl_organizationreporting r on(i.indicator_id=r.indicator_id) left join tbl_subactivity ss on(i.subactivity_id=ss.subact_id) left join  `db_abi_v1`.`tbl_quarters` `q` on(`q`.`quarterName` = `r`.`reportingPeriod`)  group by `i`.`indicator_id`,`r`.`year`,`r`.`reportingPeriod`;
#--------------------------------------17052011----------------------------------------------------------
create or replace view view_indicator as select ti.indicator_id, ti.physical_target,ti.indicator_name,ti.indicator_type,ti.disaggregation,ti.abitrust_category,ti.responsible as responsible_for_reporting,ti.expected_output,ti.intervention_id,intv.intervention,ss.subsector,ti.rc_id,rc.name as resultschain_name, sa.subact_id,sa.activity_id,sa.subactivity_code,sa.subactivity_name,sa.responsible,sa.implementer,sa.description,a.activity_code,a.activity_name,a.details,sa.output_id,o.output_code,o.output_name,sa.subcomponent_id,s.subcomponent_code,s.subcomponent,sa.component_id,c.component,p.prog_id, p.program_name,p.funder 
 from tbl_indicator ti left join tbl_subactivity sa on(ti.subactivity_id=sa.subact_id) left join tbl_activity a on(ti.activity_id=a.activity_id) left join tbl_output o on(ti.output_id=o.output_id) left join tbl_subcomponent s on(ti.subcomponent_id=s.id) left join tbl_component c on(ti.component_id=c.id) left join tbl_programme p on(ti.prog_id=p.prog_id) left join tbl_intervention intv on(intv.intervention_id=ti.intervention_id)left join tbl_subsector ss on(intv.subsector=ss.subsector_id) left join tbl_resultschain rc on(ti.rc_id=rc.rc_id) group by indicator_id  order by indicator_id asc;




#------------------------------------------16052011-------------------------------------------------------------------------------
#activity
select activity_id,activity_code,activity_name,ReportingYear,gender,
	sum(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ1`,'')) as targetQtrMale,
	SUM(if((((reportingPeriod='Jan - Mar') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,''))  as TotalMaleActual,
	round(IFNULL(SUM(if((((reportingPeriod='Jan - Mar') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,'')),0)/IFNULL(sum(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ1`,'')),0),2)*100 AS percentageMaleAchieved,
	sum(if((gender='Adult Female') or (gender='Female Youth'),`targetQ1`,'')) as targetQtrFemale,
	SUM(if((((reportingPeriod='Jan - Mar') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,''))  as TotalFemaleActual,
	round(IFNULL(SUM(if((((reportingPeriod='Jan - Mar') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,'')),0)/IFNULL(sum(if((gender='Adult Female') or (gender='Female Youth'),`targetQ1`,'')),0),2)*100 AS percentageFemaleAchieved,
	sum(if((gender=''),`targetQ1`,'')) as targetQtrOther,
	SUM(if(((reportingPeriod='Jan - Mar') and(gender='')),totalActual,''))  as TotalOtherActual,
	round(IFNULL(SUM(if(((reportingPeriod='Jan - Mar') and(gender='')),totalActual,'')),0)/IFNULL(sum(if((gender=''),`targetQ1`,'')),0),2)*100 AS percentageOtherAchieved
	from view_indicator_target_actual where ReportingYear = '2011'  group by activity_id,ReportingYear order by activity_code asc


#output
select output_id,output_code,output_name,ReportingYear,gender,
	sum(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ1`,'')) as targetQtrMale,
	SUM(if((((reportingPeriod='Jan - Mar') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,''))  as TotalMaleActual,
	round(IFNULL(SUM(if((((reportingPeriod='Jan - Mar') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,'')),0)/IFNULL(sum(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ1`,'')),0),2)*100 AS percentageMaleAchieved,
	sum(if((gender='Adult Female') or (gender='Female Youth'),`targetQ1`,'')) as targetQtrFemale,
	SUM(if((((reportingPeriod='Jan - Mar') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,''))  as TotalFemaleActual,
	round(IFNULL(SUM(if((((reportingPeriod='Jan - Mar') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,'')),0)/IFNULL(sum(if((gender='Adult Female') or (gender='Female Youth'),`targetQ1`,'')),0),2)*100 AS percentageFemaleAchieved,
	sum(if((gender=''),`targetQ1`,'')) as targetQtrOther,
	SUM(if(((reportingPeriod='Jan - Mar') and(gender='')),totalActual,''))  as TotalOtherActual,
	round(IFNULL(SUM(if(((reportingPeriod='Jan - Mar') and(gender='')),totalActual,'')),0)/IFNULL(sum(if((gender=''),`targetQ1`,'')),0),2)*100 AS percentageOtherAchieved
	from view_indicator_target_actual where ReportingYear = '2011'  group by output_id,ReportingYear order by output_code asc

//subcomponent
select subcomponent_id,subcomponent_code,subcomponent, ReportingYear,gender,
	sum(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ1`,'')) as targetQtrMale,
	SUM(if((((reportingPeriod='Jan - Mar') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,''))  as TotalMaleActual,
	round(IFNULL(SUM(if((((reportingPeriod='Jan - Mar') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,'')),0)/IFNULL(sum(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ1`,'')),0),2)*100 AS percentageMaleAchieved,
	sum(if((gender='Adult Female') or (gender='Female Youth'),`targetQ1`,'')) as targetQtrFemale,
	SUM(if((((reportingPeriod='Jan - Mar') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,''))  as TotalFemaleActual,
	round(IFNULL(SUM(if((((reportingPeriod='Jan - Mar') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,'')),0)/IFNULL(sum(if((gender='Adult Female') or (gender='Female Youth'),`targetQ1`,'')),0),2)*100 AS percentageFemaleAchieved,
	sum(if((gender=''),`targetQ1`,'')) as targetQtrOther,
	SUM(if(((reportingPeriod='Jan - Mar') and(gender='')),totalActual,''))  as TotalOtherActual,
	round(IFNULL(SUM(if(((reportingPeriod='Jan - Mar') and(gender='')),totalActual,'')),0)/IFNULL(sum(if((gender=''),`targetQ1`,'')),0),2)*100 AS percentageOtherAchieved
	from view_indicator_target_actual where ReportingYear = '2011'  group by subcomponent_id,ReportingYear order by subcomponent_code asc


#--------------------------------------end---------------------------------------------------------------------------

select i.indicator_id,i.indicator_name,s.subactivity_name,s.subactivity_code,r.ReportingYear,
	sum(if((i.gender='Adult Male') or (i.gender='Male Youth')  ,`targetQ1`,'')) as targetQtrMale,
	SUM(if((((reportingPeriod='Jan - Mar') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,''))  as TotalMaleActual,
	round(IFNULL(SUM(if((((reportingPeriod='Jan - Mar') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,'')),0)/IFNULL(sum(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ1`,'')),0),2)*100 AS percentageMaleAchieved,
	sum(if((gender='Adult Female') or (gender='Female Youth'),`targetQ1`,'')) as targetQtrFemale,
	SUM(if((((reportingPeriod='Jan - Mar') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,''))  as TotalFemaleActual,
	round(IFNULL(SUM(if((((reportingPeriod='Jan - Mar') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,'')),0)/IFNULL(sum(if((gender='Adult Female') or (gender='Female Youth'),`targetQ1`,'')),0),2)*100 AS percentageFemaleAchieved,
	sum(if((gender=''),`targetQ1`,'')) as targetQtrOther,
	SUM(if(((reportingPeriod='Jan - Mar') and(gender='')),totalActual,''))  as TotalOtherActual,
	round(IFNULL(SUM(if(((reportingPeriod='Jan - Mar') and(gender='')),totalActual,'')),0)/IFNULL(sum(if((gender=''),`targetQ1`,'')),0),2)*100 AS percentageOtherAchieved
	from view_indicator_target_actual where ReportingYear = '".$year."'  group by indicator_id,ReportingYear order by subactivity_code asc




#------------------------------------------09052011-------------------------------------------------------------------------------------------------
select s.subact_id,s.subactivity_code,s.subactivity_name,fa.year,fa.reportingPeriod,ab.fquarter1,ab.fquarter2,ab.fquarter3,ab.fquarter4,sum(if(fa.reportingPeriod='Jan - Mar')) as quarterlyActual from tbl_subactivity s inner join  tbl_annualbudget ab on(s.subact_id=ab.subactivity_id) inner join tbl_financialactuals fa on(fa.subactivity_id=s.subact_id) asc







CREATE or replace  ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `db_abi_v1`.`view_dashboard` AS select `i`.`indicator_id` AS `indicator_id`,`i`.`indicator_name` AS `indicator_name`,`i`.`indicator_type` AS `indicator_type`,`plt`.`target` AS `count`,`r`.`year` AS `year`,`r`.`total` AS `total` from ((`db_abi_v1`.`tbl_indicator` `i` inner  join `db_abi_v1`.`tbl_projectlifetargets` `plt` on((`i`.`indicator_id` = `plt`.`indicator_id`))) inner join `db_abi_v1`.`tbl_organizationreporting` `r` on((`i`.`indicator_id` = `r`.`indicator_id`)))  order by `i`.`indicator_id`;


DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 46 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 85 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 124 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 127 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 141 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 144 LIMIT 1;
UPDATE `db_abi_v1`.`tbl_annualtarget` SET `output_id` = '15' WHERE `tbl_annualtarget`.`p_id` =254 LIMIT 1 ;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 145 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 150 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 162 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` =166 LIMIT 1 ;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 167 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 171 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 268 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 173 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 177 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 183 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 186 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 190 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 196 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 197 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` =211 LIMIT 1 ;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` =220 LIMIT 1 ;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 222 LIMIT 1;
DELETE FROM `tbl_annualtarget` WHERE `tbl_annualtarget`.`p_id` = 308 LIMIT 1;
UPDATE `db_abi_v1`.`tbl_annualtarget` SET `output_id` = '27' WHERE `tbl_annualtarget`.`p_id` =302 LIMIT 1 ;
UPDATE `db_abi_v1`.`tbl_annualtarget` SET `output_id` = '27' WHERE `tbl_annualtarget`.`p_id` =301 LIMIT 1 ;


UPDATE `db_abi_v1`.`tbl_annualtarget` SET `output_id` = '27' WHERE `tbl_annualtarget`.`p_id` =299 LIMIT 1 ;


ALTER TABLE `tbl_annualtarget` ADD UNIQUE (
`year` ,
`indicator_id`
);




DELETE FROM `tbl_annualbudget` WHERE `tbl_annualbudget`.`f_id` = 9 LIMIT 1;
DELETE FROM `tbl_annualbudget` WHERE `tbl_annualbudget`.`f_id` = 14 LIMIT 1;
DELETE FROM `tbl_annualbudget` WHERE `tbl_annualbudget`.`f_id` = 51 LIMIT 1;
DELETE FROM `tbl_annualbudget` WHERE `tbl_annualbudget`.`f_id` = 65 LIMIT 1;
DELETE FROM `tbl_annualbudget` WHERE `tbl_annualbudget`.`f_id` = 66 LIMIT 1;
DELETE FROM `tbl_annualbudget` WHERE `tbl_annualbudget`.`f_id` = 71 LIMIT 1;
DELETE FROM `tbl_annualbudget` WHERE `tbl_annualbudget`.`f_id` = 74 LIMIT 1;
DELETE FROM `tbl_annualbudget` WHERE `tbl_annualbudget`.`f_id` = 31 LIMIT 1;
#---------------------------------------06052011----------------------------------------------------------------------------------------------------
create or replace view view_budgetsummary as select a.subcomponent_id,s.subcomponent,a.activity_id,ta.activity_code,ta.activity_name,a.year,sum(a.fquarter1) as sfquarter1,sum(a.fquarter2) as sfquarter2,sum(a.fquarter3) as sfquarter3,sum(a.fquarter4) as sfquarter4,sum(a.ftotal) as sftotal from tbl_annualbudget a left join tbl_subcomponent s on(s.id=a.subcomponent_id) left join tbl_activity ta on(a.activity_id=ta.activity_id) group by activity_id,year order by subcomponent_id asc;


ALTER TABLE `tbl_annualbudget` ADD UNIQUE (
`year` ,
`subactivity_id`
);


#------------------------------------05052011-------------------------------------------------------------------------------------------------------



 select indicator_id,indicator_name,ReportingYear,
	sum(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ1`,'')) as targetQtrMale,
	sum(if((gender='Adult Female') or (gender='Female Youth'),`targetQ1`,'')) as targetQtrFemale,
	sum(if((gender=''),`targetQ1`,'')) as targetQtrOther,
	`targetQ1` as targetQtr,
	SUM(if((((reportingPeriod='Jan - Mar') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,''))  as TotalMaleActual,
	SUM(if((((reportingPeriod='Jan - Mar') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,''))  as TotalFemaleActual,
	SUM(if(((reportingPeriod='Jan - Mar') and(gender='')),totalActual,''))  as TotalOtherActual
	from view_indicator_target_actual 	where ReportingYear='2011' 	and quarterCode<='1' 	group by indicator_id,ReportingYear
 
 
 
 




select i.indicator_id,i.indicator_name,r.year,s.subact_id,s.subactivity_code,s.subactivity_name,i.gender,

at.pquarter1,at.pquarter2,at.pquarter3,at.pquarter4,sum(at.ptotal) as totalAnnualtarget from tbl_indicator i inner join tbl_annualTarget at on(i.indicator_id=at.indicator_id) inner join tbl_subactivity s on(i.subactivity_id=s.subact_id) inner join tbl_organizationreporting r on(i.indicator_id=r.indicator_id)  group by indicator_id,year order by subactivity_code asc


select i.indicator_id,i.indicator_name,r.year,s.subact_id,s.subactivity_code,s.subactivity_name,i.gender,

at.pquarter1,at.pquarter2,at.pquarter3,at.pquarter4


sum(if((i.gender='Adult Male') or (i.gender='Male Youth')  ,at.ptotal,'')) as TotalAnnualMaletargets,
sum(if((i.gender='Adult Male') or (i.gender='Male Youth'),r.total,'')) as TotalMaleAnnualActuals,
round(IFNULL(sum(if((i.gender='Adult Male') or (i.gender='Male Youth'),r.total,'')),0)/IFNULL(sum(if((i.gender='Adult Male') or (i.gender='Male Youth'),at.ptotal,'')),0)) as percentageMaleAnnualActualvsTargets,
sum(if((i.gender='Adult Female') or (i.gender='Female Youth'),at.ptotal,'')) as TotalAnnualFemaleTargets,
sum(if((i.gender='Adult Female') or (i.gender='Female Youth'),r.total,'')) as TotalFemaleAnnualActuals,
round(IFNULL(sum(if((i.gender='Adult Female') or (i.gender='Female Youth'),r.total,'')),0)/IFNULL(sum(if((i.gender='Adult Female') or (i.gender='Female Youth'),at.ptotal,'')),0)) as percentageFemaleAnnualActualvsTargets ,
sum(if((i.gender=''),at.ptotal,'')) as otherTotalAnnualTargets,
sum(if((i.gender=''),r.total,'')) as otherTotalAnnualActuals,round(IFNULL(sum(if((i.gender=''),r.total,'')),0)/IFNULL(sum(if((i.gender=''),at.ptotal,'')),0)) as percentageOtherAnnualActualvsTargets

,sum(at.ptotal) as totalAnnualtarget,
sum(r.total) as TotalAnnualActuals,
round(IFNULL(sum(r.total),0)/IFNULL(sum(at.ptotal),0)) as percentageActualvsTargets
from tbl_indicator i inner join tbl_annualTarget at on(i.indicator_id=at.indicator_id) inner join tbl_subactivity s on(i.subactivity_id=s.subact_id) inner join tbl_organizationreporting r on(i.indicator_id=r.indicator_id)  group by indicator_id order by subactivity_code asc






#----------------------------------------------04052011----------------------------------------------------------------------------------------------
select i.indicator_id,i.indicator_name,r.year,s.subact_id,s.subactivity_code,s.subactivity_name,at.ptotal as totalAnnualtarget,r.total as TotalAnnualActuals,round(IFNULL(sum(r.total),0)/IFNULL(sum(at.ptotal),0)) as percentageActualvsTargets from tbl_indicator i left join tbl_annualTarget at on(i.indicator_id=at.indicator_id) left join tbl_organizationreporting r on(i.indicator_id=r.indicator_id) left join tbl_subactivity s on(i.subactivity_id=s.subact_id) where s.subactivity_name like '".$_SESSION['Resultsubactivity1']."%' and r.year like '".$year."%'  group by indicator_id order by subactivity_code asc 


select i.indicator_id,i.indicator_name,r.year,s.subact_id,s.subactivity_code,s.subactivity_name,at.ptotal as totalAnnualtarget,r.total as TotalAnnualActuals,round(IFNULL(sum(r.total),0)/IFNULL(sum(at.ptotal))*100,2) as percentageActualvsTargets from tbl_indicator i inner join tbl_annualTarget at on(i.indicator_id=at.indicator_id) inner join tbl_organizationreporting r on(i.indicator_id=r.indicator_id) left join tbl_subactivity s on(i.subactivity_id=s.subact_id) 
where subcomponent_id='".$subcomponent."' 
AND  r.year like '".$year."%' 
and s.subactivity_name like '".$_SESSION['Resultsubactivity2']."%'
  group by indicator_id order by subactivity_code asc 
#or(i.gender='Male Youth') or (i.gender='Female Youth'  


#2
round(IFNULL(sum(if((i.gender='Adult Female') or (i.gender='Female Youth'),r.total,'')),0)/IFNULL(sum(if((i.gender='Adult Female') or (i.gender='Female #2Youth'),at.ptotal,'')),0)) as percentageFemaleAnnualActualvsTargets,



#3otherTotalAnnualActuals,
#3round(IFNULL(sum(if((i.gender=''),r.total,'')),0)/IFNULL(sum(if((i.gender=''),at.ptotal,'')),0)) as percentageOtherAnnualActualvsTargets

#--------------------------------aNNUual physical Monotoring Report- query------------------------------
select i.indicator_id,i.indicator_name,r.year,s.subact_id,s.subactivity_code,s.subactivity_name,i.gender,

sum(if((i.gender='Adult Male') or (i.gender='Male Youth')  ,at.ptotal,'')) as TotalAnnualMaletargets,
sum(if((i.gender='Adult Male') or (i.gender='Male Youth'),r.total,'')) as TotalMaleAnnualActuals,
round(IFNULL(sum(if((i.gender='Adult Male') or (i.gender='Male Youth'),r.total,'')),0)/IFNULL(sum(if((i.gender='Adult Male') or (i.gender='Male Youth'),at.ptotal,'')),0)) as percentageMaleAnnualActualvsTargets,

sum(if((i.gender='Adult Female') or (i.gender='Female Youth'),at.ptotal,'')) as TotalAnnualFemaleTargets,
sum(if((i.gender='Adult Female') or (i.gender='Female Youth'),r.total,'')) as TotalFemaleAnnualActuals,
round(IFNULL(sum(if((i.gender='Adult Female') or (i.gender='Female Youth'),r.total,'')),0)/IFNULL(sum(if((i.gender='Adult Female') or (i.gender='Female Youth'),at.ptotal,'')),0)) as percentageFemaleAnnualActualvsTargets ,
sum(if((i.gender=''),at.ptotal,'')) as otherTotalAnnualTargets,
sum(if((i.gender=''),r.total,'')) as otherTotalAnnualActuals,round(IFNULL(sum(if((i.gender=''),r.total,'')),0)/IFNULL(sum(if((i.gender=''),at.ptotal,'')),0)) as percentageOtherAnnualActualvsTargets

,sum(at.ptotal) as totalAnnualtarget,
sum(r.total) as TotalAnnualActuals,
round(IFNULL(sum(r.total),0)/IFNULL(sum(at.ptotal),0)) as percentageActualvsTargets
from tbl_indicator i inner join tbl_annualTarget at on(i.indicator_id=at.indicator_id) inner join tbl_subactivity s on(i.subactivity_id=s.subact_id) inner join tbl_organizationreporting r on(i.indicator_id=r.indicator_id)  group by indicator_id order by subactivity_code asc 
#----------------------------------------------03052011----------------------------------------------------------------------------------------------

UPDATE `tbl_annualbudget` SET `indicator_id` = 17, `subactivity_id` = 12 WHERE  `tbl_annualbudget`.`indicator_id` = 17 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56245, `subactivity_id` = 100 WHERE  `tbl_annualbudget`.`indicator_id` = 56245 AND `tbl_annualbudget`.`subactivity_id` = 0;

UPDATE `tbl_annualbudget` SET `indicator_id` = 56249, `subactivity_id` = 102  WHERE  `tbl_annualbudget`.`indicator_id` = 56249 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56252, `subactivity_id` = 103 WHERE  `tbl_annualbudget`.`indicator_id` = 56252 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56256, `subactivity_id` = 104 WHERE  `tbl_annualbudget`.`indicator_id` = 56256 AND `tbl_annualbudget`.`subactivity_id` = 0;


UPDATE `tbl_annualbudget`  SET `indicator_id` = 56255, `subactivity_id` = 105 WHERE  `tbl_annualbudget`.`indicator_id` = 56255 AND `tbl_annualbudget`.`subactivity_id` = 0;

UPDATE `tbl_annualbudget` SET `indicator_id` = 56257, `subactivity_id` = 0 WHERE  `tbl_annualbudget`.`indicator_id` = 56257 AND `tbl_annualbudget`.`subactivity_id` = 0;

UPDATE `tbl_annualbudget` SET `indicator_id` = 56258, `subactivity_id` = 107 WHERE  `tbl_annualbudget`.`indicator_id` = 56258 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 14, `subactivity_id` = 9 WHERE  `tbl_annualbudget`.`indicator_id` = 14 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56260, `subactivity_id` = 10 WHERE  `tbl_annualbudget`.`indicator_id` = 56260 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56261, `subactivity_id` = 108 WHERE  `tbl_annualbudget`.`indicator_id` = 56261 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 18, `subactivity_id` = 13 WHERE  `tbl_annualbudget`.`indicator_id` = 18 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 19, `subactivity_id` = 14 WHERE  `tbl_annualbudget`.`indicator_id` = 19 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 20, `subactivity_id` = 15 WHERE  `tbl_annualbudget`.`indicator_id` = 20 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 21, `subactivity_id` = 16 WHERE  `tbl_annualbudget`.`indicator_id` = 21 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 22, `subactivity_id` = 17 WHERE  `tbl_annualbudget`.`indicator_id` = 22 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 23, `subactivity_id` = 18 WHERE  `tbl_annualbudget`.`indicator_id` = 23 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 24, `subactivity_id` = 19 WHERE  `tbl_annualbudget`.`indicator_id` = 24 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 27, `subactivity_id` = 20 WHERE  `tbl_annualbudget`.`indicator_id` = 27 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 28, `subactivity_id` = 21 WHERE  `tbl_annualbudget`.`indicator_id` = 28 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 29, `subactivity_id` = 22 WHERE  `tbl_annualbudget`.`indicator_id` = 29 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 31, `subactivity_id` = 23 WHERE  `tbl_annualbudget`.`indicator_id` = 31 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 34, `subactivity_id` = 24 WHERE  `tbl_annualbudget`.`indicator_id` = 34 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56262, `subactivity_id` = 12 WHERE  `tbl_annualbudget`.`indicator_id` = 56262 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 35, `subactivity_id` = 25 WHERE  `tbl_annualbudget`.`indicator_id` = 35 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 37, `subactivity_id` = 26 WHERE  `tbl_annualbudget`.`indicator_id` = 37 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 39, `subactivity_id` = 27 WHERE  `tbl_annualbudget`.`indicator_id` = 39 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56264, `subactivity_id` = 79 WHERE  `tbl_annualbudget`.`indicator_id` = 56264 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56290, `subactivity_id` = 80 WHERE  `tbl_annualbudget`.`indicator_id` = 56290 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56305, `subactivity_id` = 83 WHERE  `tbl_annualbudget`.`indicator_id` = 56305 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56310, `subactivity_id` = 84 WHERE  `tbl_annualbudget`.`indicator_id` = 56310 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56315, `subactivity_id` = 85 WHERE  `tbl_annualbudget`.`indicator_id` = 56315 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56520, `subactivity_id` = 147 WHERE  `tbl_annualbudget`.`indicator_id` = 56520 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 48, `subactivity_id` = 34 WHERE  `tbl_annualbudget`.`indicator_id` = 48 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 49, `subactivity_id` = 35 WHERE  `tbl_annualbudget`.`indicator_id` = 49 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56320, `subactivity_id` = 86 WHERE  `tbl_annualbudget`.`indicator_id` = 56320 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56324, `subactivity_id` = 87 WHERE  `tbl_annualbudget`.`indicator_id` = 56324 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 51, `subactivity_id` = 37 WHERE  `tbl_annualbudget`.`indicator_id` = 51 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56326, `subactivity_id` = 88 WHERE  `tbl_annualbudget`.`indicator_id` = 56326 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56327, `subactivity_id` = 89 WHERE  `tbl_annualbudget`.`indicator_id` = 56327 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56328, `subactivity_id` = 90 WHERE  `tbl_annualbudget`.`indicator_id` = 56328 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56330, `subactivity_id` = 91 WHERE  `tbl_annualbudget`.`indicator_id` = 56330 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56331, `subactivity_id` = 92 WHERE  `tbl_annualbudget`.`indicator_id` = 56331 AND `tbl_annualbudget`.`subactivity_id` = 0;



UPDATE `tbl_annualbudget` SET `indicator_id` = 56334, `subactivity_id` = 0 WHERE  `tbl_annualbudget`.`indicator_id` = 56334 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56336, `subactivity_id` = 94 WHERE  `tbl_annualbudget`.`indicator_id` = 56336 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56156, `subactivity_id` = 42 WHERE  `tbl_annualbudget`.`indicator_id` = 56156 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56157, `subactivity_id` = 43 WHERE  `tbl_annualbudget`.`indicator_id` = 56157 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56337, `subactivity_id` = 43 WHERE  `tbl_annualbudget`.`indicator_id` = 56337 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56338, `subactivity_id` = 95 WHERE  `tbl_annualbudget`.`indicator_id` = 56338 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56162, `subactivity_id` = 46 WHERE  `tbl_annualbudget`.`indicator_id` = 56162 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56163, `subactivity_id` = 47 WHERE  `tbl_annualbudget`.`indicator_id` = 56163 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56164, `subactivity_id` = 48 WHERE  `tbl_annualbudget`.`indicator_id` = 56164 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56340, `subactivity_id` = 96 WHERE  `tbl_annualbudget`.`indicator_id` = 56340 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56341, `subactivity_id` = 97 WHERE  `tbl_annualbudget`.`indicator_id` = 56341 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56342, `subactivity_id` = 98 WHERE  `tbl_annualbudget`.`indicator_id` = 56342 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56343, `subactivity_id` = 99 WHERE  `tbl_annualbudget`.`indicator_id` = 56343 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56166, `subactivity_id` = 50 WHERE  `tbl_annualbudget`.`indicator_id` = 56166 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56169, `subactivity_id` = 0 WHERE  `tbl_annualbudget`.`indicator_id` = 56169 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56171, `subactivity_id` = 0 WHERE  `tbl_annualbudget`.`indicator_id` = 56171 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56346, `subactivity_id` = 109 WHERE  `tbl_annualbudget`.`indicator_id` = 56346 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56347, `subactivity_id` = 110 WHERE  `tbl_annualbudget`.`indicator_id` = 56347 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56173, `subactivity_id` = 53 WHERE  `tbl_annualbudget`.`indicator_id` = 56173 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56350, `subactivity_id` = 113 WHERE  `tbl_annualbudget`.`indicator_id` = 56350 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56352, `subactivity_id` = 0 WHERE  `tbl_annualbudget`.`indicator_id` = 56352 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56176, `subactivity_id` = 55 WHERE  `tbl_annualbudget`.`indicator_id` = 56176 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56355, `subactivity_id` = 115 WHERE  `tbl_annualbudget`.`indicator_id` = 56355 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56356, `subactivity_id` = 0 WHERE  `tbl_annualbudget`.`indicator_id` = 56356 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56358, `subactivity_id` = 117 WHERE  `tbl_annualbudget`.`indicator_id` = 56358 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56359, `subactivity_id` = 118 WHERE  `tbl_annualbudget`.`indicator_id` = 56359 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56360, `subactivity_id` = 119 WHERE  `tbl_annualbudget`.`indicator_id` = 56360 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56177, `subactivity_id` = 56 WHERE  `tbl_annualbudget`.`indicator_id` = 56177 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56179, `subactivity_id` = 57 WHERE  `tbl_annualbudget`.`indicator_id` = 56179 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56362, `subactivity_id` = 120 WHERE  `tbl_annualbudget`.`indicator_id` = 56362 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56363, `subactivity_id` = 121 WHERE  `tbl_annualbudget`.`indicator_id` = 56363 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56365, `subactivity_id` = 122 WHERE  `tbl_annualbudget`.`indicator_id` = 56365 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56366, `subactivity_id` = 123 WHERE  `tbl_annualbudget`.`indicator_id` = 56366 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56367, `subactivity_id` = 124 WHERE  `tbl_annualbudget`.`indicator_id` = 56367 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56181, `subactivity_id` = 58 WHERE  `tbl_annualbudget`.`indicator_id` = 56181 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56368, `subactivity_id` = 125 WHERE  `tbl_annualbudget`.`indicator_id` = 56368 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56183, `subactivity_id` = 59 WHERE  `tbl_annualbudget`.`indicator_id` = 56183 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56369, `subactivity_id` = 126 WHERE  `tbl_annualbudget`.`indicator_id` = 56369 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56370, `subactivity_id` = 127 WHERE  `tbl_annualbudget`.`indicator_id` = 56370 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56185, `subactivity_id` = 60 WHERE  `tbl_annualbudget`.`indicator_id` = 56185 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56186, `subactivity_id` = 61 WHERE  `tbl_annualbudget`.`indicator_id` = 56186 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56188, `subactivity_id` = 63 WHERE  `tbl_annualbudget`.`indicator_id` = 56188 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56371, `subactivity_id` = 128 WHERE  `tbl_annualbudget`.`indicator_id` = 56371 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56187, `subactivity_id` = 62 WHERE  `tbl_annualbudget`.`indicator_id` = 56187 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56191, `subactivity_id` = 64 WHERE  `tbl_annualbudget`.`indicator_id` = 56191 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56192, `subactivity_id` = 65 WHERE  `tbl_annualbudget`.`indicator_id` = 56192 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56194, `subactivity_id` = 67 WHERE  `tbl_annualbudget`.`indicator_id` = 56194 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56374, `subactivity_id` = 129 WHERE  `tbl_annualbudget`.`indicator_id` = 56374 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56193, `subactivity_id` = 66 WHERE  `tbl_annualbudget`.`indicator_id` = 56193 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56196, `subactivity_id` = 68 WHERE  `tbl_annualbudget`.`indicator_id` = 56196 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56375, `subactivity_id` = 69 WHERE  `tbl_annualbudget`.`indicator_id` = 56375 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56378, `subactivity_id` = 130 WHERE  `tbl_annualbudget`.`indicator_id` = 56378 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56379, `subactivity_id` = 131 WHERE  `tbl_annualbudget`.`indicator_id` = 56379 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56380, `subactivity_id` = 132 WHERE  `tbl_annualbudget`.`indicator_id` = 56380 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56198, `subactivity_id` = 70 WHERE  `tbl_annualbudget`.`indicator_id` = 56198 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56381, `subactivity_id` = 71 WHERE  `tbl_annualbudget`.`indicator_id` = 56381 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56384, `subactivity_id` = 133 WHERE  `tbl_annualbudget`.`indicator_id` = 56384 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56199, `subactivity_id` = 134 WHERE  `tbl_annualbudget`.`indicator_id` = 56199 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56200, `subactivity_id` = 72 WHERE  `tbl_annualbudget`.`indicator_id` = 56200 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56201, `subactivity_id` = 73 WHERE  `tbl_annualbudget`.`indicator_id` = 56201 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56387, `subactivity_id` = 135 WHERE  `tbl_annualbudget`.`indicator_id` = 56387 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56388, `subactivity_id` = 136 WHERE  `tbl_annualbudget`.`indicator_id` = 56388 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56391, `subactivity_id` = 137 WHERE  `tbl_annualbudget`.`indicator_id` = 56391 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56393, `subactivity_id` = 138 WHERE  `tbl_annualbudget`.`indicator_id` = 56393 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56395, `subactivity_id` = 139 WHERE  `tbl_annualbudget`.`indicator_id` = 56395 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56202, `subactivity_id` = 74 WHERE  `tbl_annualbudget`.`indicator_id` = 56202 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56398, `subactivity_id` = 140 WHERE  `tbl_annualbudget`.`indicator_id` = 56398 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56204, `subactivity_id` = 76 WHERE  `tbl_annualbudget`.`indicator_id` = 56204 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56406, `subactivity_id` = 141 WHERE  `tbl_annualbudget`.`indicator_id` = 56406 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56410, `subactivity_id` = 142 WHERE  `tbl_annualbudget`.`indicator_id` = 56410 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56411, `subactivity_id` = 143 WHERE  `tbl_annualbudget`.`indicator_id` = 56411 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56412, `subactivity_id` = 144 WHERE  `tbl_annualbudget`.`indicator_id` = 56412 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56415, `subactivity_id` = 145 WHERE  `tbl_annualbudget`.`indicator_id` = 56415 AND `tbl_annualbudget`.`subactivity_id` = 0;
UPDATE `tbl_annualbudget` SET `indicator_id` = 56416, `subactivity_id` = 146 WHERE  `tbl_annualbudget`.`indicator_id` = 56416 AND `tbl_annualbudget`.`subactivity_id` = 0;




#-----------------------------------------------02052011----------------------------------------------------------------------------------------------

CREATE or replace ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `db_abi_v1`.`view_indicator_target_actual` AS select `plt`.`indicator_id` AS `indicator_id`,`i`.`indicator_name` AS `indicator_name`,`r`.`year` AS `ReportingYear`,`at`.`pquarter1` AS `targetQ1`,`r`.`reportingPeriod` AS `reportingPeriod`,`q`.`quarterCode` AS `quarterCode`,`at`.`pquarter2` AS `targetQ2`,`at`.`pquarter3` AS `targetQ3`,`at`.`pquarter4` AS `targetQ4`,`at`.`ptotal` AS `targetTotal`,max(`r`.`total`) AS `actualTotal`,`plt`.`target` AS `projectLifeTarget` from ((((`db_abi_v1`.`tbl_projectlifetargets` `plt` left join `db_abi_v1`.`tbl_indicator` `i` on((`i`.`indicator_id` = `plt`.`indicator_id`))) left join `db_abi_v1`.`tbl_organizationreporting` `r` on((`i`.`indicator_id` = `r`.`indicator_id`))) left join `db_abi_v1`.`tbl_annualtarget` `at` on((`i`.`indicator_id` = `at`.`indicator_id`))) left join `db_abi_v1`.`tbl_quarters` `q` on((`q`.`quarterName` = `r`.`reportingPeriod`))) group by `plt`.`indicator_id`,`r`.`year`,`r`.`reportingPeriod`;


#-----------------------------------------------29042011----------------------------------------------------------------------------------------------
UPDATE `db_abi_v1`.`tbl_user` SET `role` = 'Gender For Growth Manager' WHERE `tbl_user`.`user_id` =45 LIMIT 1 ;





ALTER TABLE `tbl_organizationreporting` ADD `date_reported` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `total` ;
UPDATE `db_abi_v1`.`tbl_user` SET `username` = 'spsmanager',`password` = MD5( 'pass' ) WHERE `tbl_user`.`user_id` =40 LIMIT 1 ;
UPDATE `db_abi_v1`.`tbl_user` SET `role` = 'Trade Related SPS and QM System Manager' WHERE `tbl_user`.`user_id` =40 LIMIT 1 ;
SELECT * FROM tbl_indicator WHERE indicator_name LIKE '%)(Adult Male)%' LIMIT 0 , 30000 ;
DELETE FROM `tbl_financialactuals` WHERE `tbl_financialactuals`.`id` = 25 LIMIT 1;
DELETE FROM `tbl_financialactuals` WHERE `tbl_financialactuals`.`id` = 26 LIMIT 1;
DELETE FROM `tbl_financialactuals` WHERE `tbl_financialactuals`.`id` = 32 LIMIT 1;
DELETE FROM `tbl_financialactuals` WHERE `tbl_financialactuals`.`id` = 37 LIMIT 1;
DELETE FROM `tbl_financialactuals` WHERE `tbl_financialactuals`.`id` = 39 LIMIT 1;
DELETE FROM `tbl_financialactuals` WHERE `tbl_financialactuals`.`id` = 34 LIMIT 1;


DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 124 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 143 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 144 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 145 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 146 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 91 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 266 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 92 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 94 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 121 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 196 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 265 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 122 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 107 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 283 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 284 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 286 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 287 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 289 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 290 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 297 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 298 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 299 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 300 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 301 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 302 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 304 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 306 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 309 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 310 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 311 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 313 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 314 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 315 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 318 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 319 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 320 LIMIT 1;

DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 271 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 274 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 277 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 288 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 291 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 292 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 294 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 295 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 307 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 308 LIMIT 1;

DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 275 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 278 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 369 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 372 LIMIT 1;
DELETE FROM `tbl_organizationreporting` WHERE `tbl_organizationreporting`.`id` = 375 LIMIT 1;




ALTER TABLE `tbl_organizationreporting` ADD UNIQUE (`org_code` ,`year` ,`reportingPeriod` ,`indicator_id`);
ALTER TABLE `tbl_financialactuals` ADD UNIQUE (`org_code` ,`year` ,`reportingPeriod` ,`subactivity_id`);

update tbl_subactivity set responsible ='Managers';
ALTER TABLE `tbl_subactivity` CHANGE `responsible` `responsible` VARCHAR( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Managers' ;
#-----------------------------------------------28042011----------------------------------------------------------------------------------------------

create or replace view view_organizationreporting as select r.id,r.org_code,o.orgName,r.year,r.reportingPeriod,r.indicator_id,i.subcomponent_id,i.subcomponent,i.subactivity_code,i.subactivity_name,i.indicator_name,i.indicator_type,i.disaggregation,i.abitrust_category,i.responsible_for_reporting,r.male,r.female,r.maleyouth,r.femaleyouth,r.total from tbl_organizationreporting r left join tbl_organization o on(o.org_code=r.org_code) left join view_indicator i on(r.indicator_id=i.indicator_id) order by indicator_id;





ALTER TABLE `tbl_indicator` ADD `responsible` VARCHAR( 50 ) NOT NULL AFTER `remarks` ,
ADD `expected_output` VARCHAR( 50 ) NOT NULL AFTER `responsible` ;

UPDATE `db_abi_v1`.`tbl_lookup` SET `codeName` = 'aBi Trust' WHERE `tbl_lookup`.`classCode` =2 AND `tbl_lookup`.`code` =8 LIMIT 1 ;

ALTER TABLE `tbl_indicator` CHANGE `responsible` `responsible` VARCHAR( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Managers',
CHANGE `expected_output` `expected_output` VARCHAR( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Quantitative' ;

UPDATE tbl_indicator SET `responsible` = 'Managers',
`expected_output` = 'Quantitative' WHERE `responsible` = '' AND `expected_output` = '' ;


#--------------------------------------------modified on 27042011-------------------------------------------------------------------------------------
 select i.indicator_id,i.indicator_name,r.year,a.ptotal as totaAnnualtarget,plt.target as projectLifeTarget,round(IFNULL(sum(a.ptotal),0)/IFNULL(plt.target,0)*100,0) as PercentageProjectLifeTargetAchieved,sum(if((r.year='2011'),r.total,0)) as totalAnnualActual,round(sum(if((r.year='2011'),r.total,0))/IFNULL(plt.target,0)*100,0) as PercentageAnnualActualAchieved from tbl_annualtarget a left join  tbl_indicator i on(i.indicator_id=a.indicator_id) left join tbl_projectlifetargets plt on(plt.indicator_id=a.indicator_id) left join tbl_organizationreporting r on(i.indicator_id=r.indicator_id) group by indicator_id order by indicator_id asc;



#DROP VIEW IF EXISTS `view_indicator_target_actual`;
CREATE or REPLACE VIEW `view_indicator_target_actual` AS select `plt`.`indicator_id` AS `indicator_id`,`i`.`indicator_name` AS `indicator_name`,`r`.`year` AS `ReportingYear`,`at`.`pquarter1` AS `targetQ1`,`r`.`reportingPeriod` AS `reportingPeriod`,`q`.`quarterCode` AS `quarterCode`,`at`.`pquarter2` AS `targetQ2`,`at`.`pquarter3` AS `targetQ3`,`at`.`pquarter4` AS `targetQ4`,`at`.`ptotal` AS `targetTotal`,max(`r`.`total`) AS `actualTotal`,`plt`.`target` AS `projectLifeTarget` from ((((`db_abi_v1`.`tbl_projectlifetargets` `plt` left join `db_abi_v1`.`tbl_indicator` `i` on((`i`.`indicator_id` = `plt`.`indicator_id`))) left join `db_abi_v1`.`tbl_organizationreporting` `r` on((`i`.`indicator_id` = `r`.`indicator_id`))) left join `db_abi_v1`.`tbl_annualtarget` `at` on((`i`.`indicator_id` = `at`.`indicator_id`))) left join `db_abi_v1`.`tbl_quarters` `q` on((`q`.`quarterName` = `r`.`reportingPeriod`))) group by `plt`.`indicator_id`,`r`.`year`,`r`.`reportingPeriod`;


create or replace view view_projectlifetargets as select  p.plt_id,pp.prog_id,pp.program_name,p.indicator_id,i.indicator_name,p.target,i.indicator_type,i.abitrust_category,p.Period,p.subcomponent_id,s.subcomponent_code,s.subcomponent from tbl_indicator i inner join tbl_projectlifetargets p on(i.indicator_id=p.indicator_id) left join tbl_subcomponent s on(p.subcomponent_id=s.id) left join tbl_programme pp on(pp.prog_id=i.prog_id) order by subcomponent_code asc;



//view annualtargets


 ///cummulative annual targets view_0836hrs
create or replace view view_ccfannualtarget as select a.indicator_id, i.indicator_name,sum(a.ptotal) as totalcummulativetarget from tbl_annualtarget a inner join tbl_indicator i on(i.indicator_id=a.indicator_id) group by indicator_id;


create or replace view view_ccf4 as select t.indicator_id,i.indicator_name,sum(t.total) as totalannual, plt.period,plt.target as projectlifetarget, round(avg(IFNULL(sum(t.total),0)/IFNULL(plt.target,0))*100,0) as percentageAchieved from tbl_organizationreporting t inner join tbl_indicator i on(i.indicator_id=t.indicator_id) inner join tbl_projectlifetargets plt on(plt.indicator_id=t.indicator_id) group by indicator_id order by indicator_name asc;










#------------------------------modified on 26042011------------------------------------------------------------------------
UPDATE `db_abi_v1`.`tbl_user` SET `role` = 'Systems Administrator' WHERE `tbl_user`.`user_id` =1 LIMIT 1 ;

UPDATE `db_abi_v1`.`tbl_user` SET `password` = MD5( 'sulmafoods' ) WHERE `tbl_user`.`user_id` =68 LIMIT 1 ;
UPDATE `db_abi_v1`.`tbl_user` SET `password` = MD5('pridemicrofinance') WHERE `tbl_user`.`user_id` = 60 LIMIT 1; UPDATE `db_abi_v1`.`tbl_user` SET `password` = MD5('equitybank') WHERE `tbl_user`.`user_id` = 62 LIMIT 1; UPDATE `db_abi_v1`.`tbl_user` SET `password` = MD5('finabank') WHERE `tbl_user`.`user_id` = 63 LIMIT 1; UPDATE `db_abi_v1`.`tbl_user` SET `password` = MD5('housingfinance') WHERE `tbl_user`.`user_id` = 64 LIMIT 1; UPDATE `db_abi_v1`.`tbl_user` SET `password` = MD5('apacdfa') WHERE `tbl_user`.`user_id` = 65 LIMIT 1; UPDATE `db_abi_v1`.`tbl_user` SET `password` = MD5('mbalefa') WHERE `tbl_user`.`user_id` = 66 LIMIT 1; UPDATE `db_abi_v1`.`tbl_user` SET `password` = MD5('nuemann') WHERE `tbl_user`.`user_id` = 67 LIMIT 1; UPDATE `db_abi_v1`.`tbl_user` SET `password` = MD5('akolis') WHERE `tbl_user`.`user_id` = 69 LIMIT 1;

UPDATE `db_abi_v1`.`tbl_user` SET `password` = MD5( 'mbararadfa' ) WHERE `tbl_user`.`user_id` =49 LIMIT 1 ;




ALTER TABLE `tbl_user` CHANGE `subcomponent` `subcomponent` VARCHAR( 100 ) NOT NULL 



UPDATE `tbl_user` SET `user_id` = 27, `org_code` = 5, `name` = 'Centenary Rural Development Bank', `username` = 'cerudeb', `subcomponent` = 'Financial  Services Development' WHERE  `tbl_user`.`user_id` = 27;
UPDATE `tbl_user` SET `user_id` = 28, `org_code` = 3, `name` = 'DFCU Bank', `username` = 'dfcu', `subcomponent` = 'Financial  Services Development' WHERE  `tbl_user`.`user_id` = 28;
UPDATE `tbl_user` SET `user_id` = 29, `org_code` = 9, `name` = 'Federation of Women Lawyers - Uganda [FIDA-U]', `username` = 'fida', `subcomponent` = 'Gender For Growth (G4G) Fund' WHERE  `tbl_user`.`user_id` = 29;
UPDATE `tbl_user` SET `user_id` = 30, `org_code` = 2, `name` = 'Finca', `username` = 'finca', `subcomponent` = 'Financial  Services Development' WHERE  `tbl_user`.`user_id` = 30;
UPDATE `tbl_user` SET `user_id` = 31, `org_code` = 12, `name` = 'National Organic Agricultural Movement Of Uganda', `username` = 'nogamu', `subcomponent` = 'Value Chain Development' WHERE  `tbl_user`.`user_id` = 31;
UPDATE `tbl_user` SET `user_id` = 32, `org_code` = 8, `name` = 'National Union of Coffee Farmers Agribusiness and Farmers Enterprize', `username` = 'nucafe', `subcomponent` = 'Gender For Growth (G4G) Fund' WHERE  `tbl_user`.`user_id` = 32;
UPDATE `tbl_user` SET `user_id` = 34, `org_code` = 4, `name` = 'opportunity international', `username` = 'opportunity', `subcomponent` = 'Financial  Services Development' WHERE  `tbl_user`.`user_id` = 34;
UPDATE `tbl_user` SET `user_id` = 35, `org_code` = 1, `name` = 'Stanbic Bank', `username` = 'stanbic', `subcomponent` = 'Financial  Services Development' WHERE  `tbl_user`.`user_id` = 35;

UPDATE `tbl_user` SET `user_id` = 36, `org_code` = 10, `name` = 'The Uganda Insurers Association', `username` = 'uia', `subcomponent` = 'Trade  Related SPS and  QM System' WHERE  `tbl_user`.`user_id` = 36;
UPDATE `tbl_user` SET `user_id` = 37, `org_code` = 6, `name` = 'Uganda Financial Agency for development', `username` = 'ugafode', `subcomponent` = 'Financial  Services Development' WHERE  `tbl_user`.`user_id` = 37;
UPDATE `tbl_user` SET `user_id` = 38, `org_code` = 11, `name` = 'Uganda Seed Trade Association', `username` = 'usta', `subcomponent` = 'Trade  Related SPS and  QM System' WHERE  `tbl_user`.`user_id` = 38;


UPDATE `tbl_user` SET `user_id` = 39, `org_code` = 0, `name` = 'Paul Mayanja', `username` = 'md', `subcomponent` = 0 WHERE  `tbl_user`.`user_id` = 39;
UPDATE `tbl_user` SET `user_id` = 40, `org_code` = 0, `name` = 'George Awiru', `username` = 'spssqms', `subcomponent` = 'Trade  Related SPS and  QM System' WHERE  `tbl_user`.`user_id` = 40;
UPDATE `tbl_user` SET `user_id` = 41, `org_code` = 0, `name` = 'Edward  Gitta', `username` = 'vcmanager', `subcomponent` = 'Value Chain Development' WHERE  `tbl_user`.`user_id` = 41;

UPDATE `tbl_user` SET `user_id` = 42, `org_code` = 0, `name` = 'Silver Manyindo', `username` = 'fsmanager1', `subcomponent` = 'Financial  Services Development' WHERE  `tbl_user`.`user_id` = 42;
UPDATE `tbl_user` SET `user_id` = 44, `org_code` = 0, `name` = 'Svend Jensen', `username` = 'chiefta', `subcomponent` = 0 WHERE  `tbl_user`.`user_id` = 44;
UPDATE `tbl_user` SET `user_id` = 45, `org_code` = 0, `name` = 'Peninah Kyalimpa', `username` = 'g4gmanager', `subcomponent` = 'Gender For Growth (G4G) Fund' WHERE  `tbl_user`.`user_id` = 45;
UPDATE `tbl_user` SET `user_id` = 46, `org_code` = 0, `name` = 'Silvia', `username` = 'fsmanager', `subcomponent` = 'Financial  Services Development' WHERE  `tbl_user`.`user_id` = 46;
UPDATE `tbl_user` SET `user_id` = 47, `org_code` = 0, `name` = 'kisembo edgar', `username` = 'user1', `subcomponent` = 0 WHERE  `tbl_user`.`user_id` = 47;
UPDATE `tbl_user` SET `user_id` = 49, `org_code` = 15, `name` = '', `username` = 'mbararadfa', `subcomponent` = 'Value Chain Development' WHERE  `tbl_user`.`user_id` = 49;
UPDATE `tbl_user` SET `user_id` = 52, `org_code` = 18, `name` = 'Kasese District Farmers Association', `username` = 'kasesedfa', `subcomponent` = 'Value Chain Development' WHERE  `tbl_user`.`user_id` = 52;

UPDATE `tbl_user` SET `user_id` = 53, `org_code` = 19, `name` = 'Masindi District Farmers Association', `username` = 'masindidfa', `subcomponent` = 'Value Chain Development' WHERE  `tbl_user`.`user_id` = 53;

UPDATE `tbl_user` SET `user_id` = 55, `org_code` = 22, `name` = 'Sembabule District Farmers Association', `username` = 'Sembabuledfa', `subcomponent` = 'Value Chain Development' WHERE  `tbl_user`.`user_id` = 55;

UPDATE `tbl_user` SET `user_id` = 56, `org_code` = 23, `name` = 'Mukono District Farmers Association', `username` = 'mukonodfa', `subcomponent` = 'All Subcomponents' WHERE  `tbl_user`.`user_id` = 56;

UPDATE `tbl_user` SET `user_id` = 57, `org_code` = 24, `name` = 'Iganga District Farmers Organisation', `username` = 'igangadfa', `subcomponent` = 'Value Chain Development' WHERE  `tbl_user`.`user_id` = 57;
UPDATE `tbl_user` SET `user_id` = 58, `org_code` = 25, `name` = 'Gulu Agricultural Development Company Limited', `username` = 'guluadc', `subcomponent` = 'Value Chain Development' WHERE  `tbl_user`.`user_id` = 58;
UPDATE `tbl_user` SET `user_id` = 59, `org_code` = 26, `name` = 'Kiyuni United Farmers Association', `username` = 'Kiyuniufa', `subcomponent` = 'Value Chain Development' WHERE  `tbl_user`.`user_id` = 59;
UPDATE `tbl_user` SET `user_id` = 60, `org_code` = 27, `name` = 'Pride Microfinance Limited', `username` = 'pridemicrofinance', `subcomponent` = 'Financial  Services Development' WHERE  `tbl_user`.`user_id` = 60;
UPDATE `tbl_user` SET `user_id` = 61, `org_code` = 28, `name` = 'Opportunity Uganda', `username` = 'opportunityuganda', `subcomponent` = 'Financial  Services Development' WHERE  `tbl_user`.`user_id` = 61;
UPDATE `tbl_user` SET `user_id` = 62, `org_code` = 29, `name` = 'Equity Bank', `username` = 'equitybank', `subcomponent` = 'Financial  Services Development' WHERE  `tbl_user`.`user_id` = 62;
UPDATE `tbl_user` SET `user_id` = 63, `org_code` = 30, `name` = 'Fina Bank', `username` = 'finabank', `subcomponent` = 'Financial  Services Development' WHERE  `tbl_user`.`user_id` = 63;
UPDATE `tbl_user` SET `user_id` = 64, `org_code` = 31, `name` = 'Housing Finance', `username` = 'housingfinance', `subcomponent` = 'Financial  Services Development' WHERE  `tbl_user`.`user_id` = 64;
UPDATE `tbl_user` SET `user_id` = 65, `org_code` = 32, `name` = 'Apac District Farmers Association', `username` = 'apacdfa', `subcomponent` = 'Value Chain Development' WHERE  `tbl_user`.`user_id` = 65;
UPDATE `tbl_user` SET `user_id` = 66, `org_code` = 33, `name` = 'Mbale Farmers Organisation', `username` = 'mbalefa', `subcomponent` = 'Value Chain Development' WHERE  `tbl_user`.`user_id` = 66;
UPDATE `tbl_user` SET `user_id` = 67, `org_code` = 34, `name` = 'Hanns R. Nuemann Stiftung Africa Ltd.', `username` = 'neumann', `subcomponent` = 'Value Chain Development' WHERE  `tbl_user`.`user_id` = 67;
UPDATE `tbl_user` SET `user_id` = 68, `org_code` = 35, `name` = 'Sulma Foods', `username` = 'sulmafoods', `subcomponent` = 'Value Chain Development' WHERE  `tbl_user`.`user_id` = 68;
UPDATE `tbl_user` SET `user_id` = 69, `org_code` = 36, `name` = 'A.K Oils And Fats (U) Ltd.', `username` = 'akoils', `subcomponent` = 'Value Chain Development' WHERE  `tbl_user`.`user_id` = 69;
UPDATE `tbl_user` SET `user_id` = 70, `org_code` = 37, `name` = 'Uganda Coffee Development Authority', `username` = 'ugandacoffee', `subcomponent` = 'Value Chain Development' WHERE  `tbl_user`.`user_id` = 70;
UPDATE `tbl_user` SET `user_id` = 71, `org_code` = 38, `name` = 'Jali Organic', `username` = 'jaliorganic', `subcomponent` = 'Value Chain Development' WHERE  `tbl_user`.`user_id` = 71;
UPDATE `tbl_user` SET `user_id` = 72, `org_code` = 39, `name` = 'Straight Talk', `username` = 'straighttalk', `subcomponent` = 'Gender For Growth (G4G) Fund' WHERE  `tbl_user`.`user_id` = 72;
UPDATE `tbl_organization` SET `org_code` = 38, `orgName` = 'Jali Organic', `subcomponent` = 'Value Chain Development' WHERE  `tbl_organization`.`org_code` = 38;
UPDATE `tbl_organization` SET `org_code` = 33, `orgName` = 'Mbale Farmers Organisation', `subcomponent` = 'Value Chain Development' WHERE  `tbl_organization`.`org_code` = 33;






UPDATE `db_abi_v1`.`tbl_user` SET `role` = 'Systems Administrator' WHERE `tbl_user`.`user_id` =1 LIMIT 1 ;
RENAME TABLE `db_abi_v1`.`tblfaqs` TO `db_abi_v1`.`tbl_faqs` ;

create or replace view view_organizationreporting as select r.id,r.org_code,o.orgName,r.year,r.reportingPeriod,r.indicator_id,i.subcomponent_id,i.subcomponent,i.subactivity_code,i.subactivity_name,i.indicator_name,i.indicator_type,i.disaggregation,i.abitrust_category,r.male,r.female,r.maleyouth,r.femaleyouth,r.total from tbl_organizationreporting r left join tbl_organization o on(o.org_code=r.org_code) left join view_indicator i on(r.indicator_id=i.indicator_id) order by indicator_id;

#-------------------------------modified on 21042011-----------------------------------------------------------------------


UPDATE tbl_organization SET subcomponent = 'Value Chain Development' WHERE subcomponent = '1' ;
UPDATE tbl_organization SET subcomponent = 'Financial  Services Development' WHERE subcomponent = '2'; 
UPDATE tbl_organization SET subcomponent = 'Trade  Related SPS and  QM System' WHERE subcomponent = '3';
UPDATE tbl_organization SET subcomponent = 'Gender For Growth (G4G) Fund' WHERE subcomponent = '4';
UPDATE tbl_organization SET subcomponent = 'Trust Operations' WHERE subcomponent = '5';


create or replace view view_intervention as select i.intervention_id,i.prog_id,i.component_id,i.org_code,o.orgName,i.intervention,i.subsector as subsector_id,s.subsector,
 i.details from tbl_intervention i left join tbl_subsector s on(i.subsector=s.subsector_id) inner join tbl_organization o on(o.org_code=i.org_code)  order by i.intervention_id asc;





#---------------------------------end-------------------------------------------

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER or replace  VIEW `db_abi_v1`.`view_organizationreporting` AS select `r`.`id` AS `id`,`r`.`org_code` AS `org_code`,`o`.`orgName` AS `orgName`,`r`.`year` AS `year`,`r`.`reportingPeriod` AS `reportingPeriod`,`r`.`indicator_id` AS `indicator_id`,`i`.`subcomponent_id` AS `subcomponent_id`,`i`.`subactivity_code` AS `subactivity_code`,`i`.`subactivity_name` AS `subactivity_name`,`i`.`indicator_name` AS `indicator_name`,`i`.`indicator_type` AS `indicator_type`,`i`.`disaggregation` AS `disaggregation`,`r`.`male` AS `male`,`r`.`female` AS `female`,`r`.`maleyouth` AS `maleyouth`,`r`.`femaleyouth` AS `femaleyouth`,`r`.`total` AS `total` from ((`db_abi_v1`.`tbl_organizationreporting` `r` join `db_abi_v1`.`tbl_organization` `o` on((`o`.`org_code` = `r`.`org_code`))) join `db_abi_v1`.`view_indicator` `i` on((`r`.`indicator_id` = `i`.`indicator_id`))) order by `r`.`indicator_id`;

#where lower(i.intervention) like '".strtolower($_SESSION['intervention'])."%'

create or replace view view_organizationreporting as select r.id,r.org_code,o.orgName,r.year,r.reportingPeriod,r.indicator_id,i.subcomponent_id,i.subcomponent,i.subactivity_code,i.subactivity_name,i.indicator_name,i.indicator_type,i.disaggregation,r.male,r.female,r.maleyouth,r.femaleyouth,r.total from tbl_organizationreporting r inner join tbl_organization o on(o.org_code=r.org_code) inner join view_indicator i on(r.indicator_id=i.indicator_id) order by indicator_id;







INSERT INTO `db_abi_v1`.`tbl_lookup` (
`classCode` ,
`classDescription` ,
`code` ,
`codeName` ,
`notes`
)
VALUES (
'18', 'aBi Trust Expenditure', '18', 'Expenditure', 'aBi Trust Expenditure'
);


ALTER TABLE `tbl_intervention` ADD `org_code` BIGINT( 20 ) NOT NULL AFTER `component_id` ;



create or replace view view_indicator as select ti.indicator_id, ti.physical_target,ti.indicator_name,ti.indicator_type,ti.disaggregation,ti.abitrust_category,ti.intervention_id,intv.intervention,ss.subsector,ti.rc_id,rc.name as resultschain_name, sa.subact_id,sa.activity_id,sa.subactivity_code,sa.subactivity_name,sa.responsible,sa.implementer,sa.description,a.activity_code,a.activity_name,a.details,sa.output_id,o.output_code,o.output_name,sa.subcomponent_id,s.subcomponent_code,s.subcomponent,sa.component_id,c.component,p.prog_id, p.program_name,p.funder 
 from tbl_indicator ti left join tbl_subactivity sa on(ti.subactivity_id=sa.subact_id) left join tbl_activity a on(ti.activity_id=a.activity_id) left join tbl_output o on(ti.output_id=o.output_id) left join tbl_subcomponent s on(ti.subcomponent_id=s.id) left join tbl_component c on(ti.component_id=c.id) left join tbl_programme p on(ti.prog_id=p.prog_id) left join tbl_intervention intv on(intv.intervention_id=ti.intervention_id)left join tbl_subsector ss on(intv.subsector=ss.subsector_id) left join tbl_resultschain rc on(ti.rc_id=rc.rc_id) group by indicator_id  order by indicator_id asc;
 






ALTER TABLE `tbl_intervention` ADD PRIMARY KEY ( `intervention_id` ) 
ALTER TABLE `tbl_intervention` CHANGE `intervention_id` `intervention_id` BIGINT( 20 ) NOT NULL AUTO_INCREMENT 





INSERT INTO `db_abi_v1`.`tbl_lookup` (
`classCode` ,
`classDescription` ,
`code` ,
`codeName` ,
`notes`
)
VALUES (
'2', 'DCED Based Indicator ', '17', 'DCED Based', 'DCED specific Indicator'
);






ALTER TABLE `tbl_indicator` ADD `subsector` VARCHAR( 100 ) NOT NULL AFTER `indicator_code` ;

CREATE TABLE `tbl_intervention` (
  `intervention_id` bigint(20) NOT NULL default '0',
  `prog_id` int(11) NOT NULL,
  `component_id` int(11) NOT NULL,
  `intervention` varchar(300) NOT NULL,
  `subsector` int(11) NOT NULL,
  `details` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `tbl_intervention`
-- 

INSERT INTO `tbl_intervention` (`intervention_id`, `prog_id`, `component_id`, `intervention`, `subsector`, `details`) VALUES 
(1, 7, 14, 'ixxxxxxxxxxxxxxxxxxxxx', 1, 'hxxxxxxxxxxxxxxxxx'),
(3, 7, 14, 'axxxxxxxxxxxxxxxxxx', 1, 'sxxxxxxxxxxxxxxxxxxxx'),
(0, 1, 14, 'xxxxxxxxxxxxxxx', 1, 'Txxxxxxxxxxxxxxxxxxx');






#-------------------------------modified on 19042011-----------------------------------------------------------------------
ALTER TABLE `tbl_organization` CHANGE `subcomponent` `subcomponent` VARCHAR( 500 ) NOT NULL 

ALTER TABLE `tbl_organization` CHANGE `intervention` `subsector` VARCHAR( 500 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL 

create or replace view view_organization as select o.org_code,o.orgName,o.acronym,o.registered,o.registration_no,o.district,o.orgtype,l.codeName as organization_type,o.vision,o.mission,o.objective,o.subcomponent,s.subcomponent as subcomponent_name o.subsector,o.username,o.password,o.usergroup,o.website,o.contact_person,o.title,o.telephone,o.mobile,o.contact_person2,o.title2,o.telephone2,o.mobile2,o.contact_person3,o.title3,o.telephone3,o.mobile3 from tbl_organization o left join tbl_lookup l on(o.orgtype=l.code) left join tbl_subcomponent s on(s.id=o.subc)  order by orgName asc;
#######################################################################
DROP TABLE IF EXISTS `tbl_subsector`;
CREATE TABLE `tbl_subsector` (
  `subsector_id` bigint(20) NOT NULL auto_increment,
  `prog_id` int(11) NOT NULL,
  `component_id` int(11) NOT NULL,
  `subcomponent_id` int(11) NOT NULL,
  `subsector` varchar(100) NOT NULL,
  `details` varchar(300) NOT NULL,
  PRIMARY KEY  (`subsector_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `tbl_subsector`
-- 

INSERT INTO `tbl_subsector` (`subsector_id`, `prog_id`, `component_id`, `subcomponent_id`, `subsector`, `details`) VALUES 
(1, 1, 14, 1, 'Maize', 'This intervention is aimed at increasing maize production in the society.1'),
(2, 1, 14, 1, 'Coffee1', 'This is aimed at increasing coffee production through farmers worganizations 1'),
(3, 1, 14, 2, 'Financial Institutions1', 'This is aimed at supporting Financial organization give out agricultural loans and helping them expa1'),
(4, 0, 0, 0, '', ''),
(6, 1, 14, 1, 'bEANS1', 'MASAKA1');



 create or replace view  view_subsector as select ss.subsector_id,ss.subsector,ss.details,ss.prog_id,p.program_name,ss.component_id,c.component, ss.subcomponent_id,s.subcomponent from tbl_subsector ss left join tbl_subcomponent s on(ss.subcomponent_id=s.id) left join tbl_component c on(ss.component_id=c.id) left join tbl_programme p on(ss.prog_id=p.prog_id) order by s.subcomponent asc;


//--------------------------------modified on 14042011---------------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_organizationreporting`;
CREATE TABLE `tbl_organizationreporting` (
  `id` bigint(30) NOT NULL auto_increment,
  `org_code` bigint(30) NOT NULL,
  `year` year(4) NOT NULL,
  `reportingPeriod` varchar(50) NOT NULL,
  `indicator_id` bigint(20) NOT NULL,
  `male` int(11) NOT NULL,
  `female` int(11) NOT NULL,
  `maleyouth` int(11) NOT NULL,
  `femaleyouth` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=376 ;

-- 
-- Dumping data for table `tbl_organizationreporting`
-- 

INSERT INTO `tbl_organizationreporting` (`id`, `org_code`, `year`, `reportingPeriod`, `indicator_id`, `male`, `female`, `maleyouth`, `femaleyouth`, `total`) VALUES 
(75, 1, 2011, 'Jan - Mar', 8, 56, 767, 89, 0, 912),
(76, 2, 2011, 'Jan - Mar', 12, 5, 7, 9, 0, 21),
(77, 3, 2011, 'Jan - Mar', 17, 1, 3, 1, 0, 5),
(78, 4, 2011, 'Jan - Mar', 27, 45, 66, 88, 0, 199),
(79, 5, 2011, 'Jan - Mar', 28, 3, 5, 7, 0, 15),
(80, 6, 2011, 'Jan - Mar', 38, 3, 5, 7, 0, 15),
(82, 1, 2011, 'Jan - Mar', 25, 5, 5, 5, 0, 15),
(83, 2, 2011, 'Jan - Mar', 18, 1, 1, 1, 0, 3),
(84, 3, 2011, 'Jan - Mar', 25, 3, 3, 3, 0, 9),
(85, 4, 2011, 'Jan - Mar', 18, 1, 1, 1, 0, 3),
(86, 5, 2011, 'Jan - Mar', 19, 2, 3, 3, 0, 8),
(87, 6, 2011, 'Jan - Mar', 24, 3, 3, 3, 0, 9),
(88, 7, 2011, 'Jan - Mar', 26, 2, 4, 4, 0, 10),
(89, 8, 2011, 'Jan - Mar', 18, 2, 4, 1, 0, 7),
(91, 5, 2011, 'Jan - Mar', 24, 1, 1, 1, 0, 3),
(92, 5, 2011, 'Jan - Mar', 32, 1, 1, 3, 0, 5),
(94, 5, 2011, 'Jan - Mar', 24, 4, 2, 0, 0, 6),
(95, 5, 2011, 'Jan - Mar', 32, 2, 11, 0, 0, 13),
(105, 0, 2011, 'Jan - Mar', 56149, 5, 3, 0, 0, 8),
(106, 0, 2011, 'Jan - Mar', 52, 34, 12, 11, 0, 57),
(107, 0, 2011, 'Jan - Mar', 56152, 6, 5, 6, 0, 17),
(108, 0, 2011, 'Jan - Mar', 56159, 76, 66, 6, 0, 148),
(121, 0, 2011, 'Jan - Mar', 52, 34, 12, 11, 0, 57),
(122, 0, 2011, 'Jan - Mar', 56149, 2, 1, 6, 0, 9),
(123, 0, 2011, 'Jan - Mar', 56152, 6, 5, 6, 0, 17),
(124, 0, 2011, 'Jan - Mar', 56159, 76, 66, 6, 0, 148),
(143, 5, 2011, 'Jan - Mar', 52, 34, 12, 11, 0, 57),
(144, 5, 2011, 'Jan - Mar', 56149, 11, 45, 44, 0, 100),
(145, 5, 2011, 'Jan - Mar', 56152, 6, 5, 6, 0, 17),
(146, 5, 2011, 'Jan - Mar', 56159, 76, 66, 6, 0, 148),
(165, 5, 2011, 'Jan - Mar', 56195, 45, 12, 0, 0, 57),
(196, 5, 2011, 'Jan - Mar', 56195, 34, 12, 11, 0, 57),
(265, 5, 2011, 'Jan - Mar', 3, 1, 1, 1, 0, 3),
(266, 5, 2011, 'Jan - Mar', 24, 1, 1, 1, 0, 3),
(271, 5, 2010, 'Jan - Mar', 56212, 0, 0, 0, 0, 18),
(272, 5, 2010, 'Jan - Mar', 56213, 0, 0, 0, 0, 20),
(274, 5, 2010, 'Jan - Mar', 56212, 0, 0, 0, 0, 10),
(275, 5, 2010, 'Jan - Mar', 56213, 0, 0, 0, 0, 10),
(277, 5, 2010, 'Jan - Mar', 56212, 0, 0, 0, 0, 3),
(278, 5, 2010, 'Jan - Mar', 56213, 0, 0, 0, 0, 23),
(283, 5, 2010, 'Jan - Mar', 56212, 0, 0, 0, 0, 3),
(284, 5, 2010, 'Jan - Mar', 56213, 0, 0, 0, 0, 20),
(285, 5, 2011, 'Jan - Mar', 56211, 0, 0, 0, 0, 1),
(286, 5, 2011, 'Jan - Mar', 56212, 0, 0, 0, 0, 4),
(287, 5, 2011, 'Jan - Mar', 56213, 0, 0, 0, 0, 5),
(288, 5, 2011, 'Apr - Jun', 56211, 0, 0, 0, 0, 2),
(289, 5, 2011, 'Jan - Mar', 56212, 0, 0, 0, 0, 5),
(290, 5, 2011, 'Jan - Mar', 56213, 0, 0, 0, 0, 10),
(291, 5, 2011, 'Jul - Sep', 56211, 0, 0, 0, 0, 2),
(292, 5, 2011, 'Jan - Mar', 56212, 0, 0, 0, 0, 1),
(294, 5, 2011, 'Oct - Dec', 56211, 0, 0, 0, 0, 2),
(295, 5, 2011, 'Jan - Mar', 56212, 0, 0, 0, 0, 1),
(297, 5, 2012, 'Jan - Mar', 56211, 0, 0, 0, 0, 2),
(298, 5, 2012, 'Jan - Mar', 56212, 0, 0, 0, 0, 4),
(299, 5, 2012, 'Jan - Mar', 56213, 0, 0, 0, 0, 1),
(300, 5, 2012, 'Apr - Jun', 56211, 0, 0, 0, 0, 3),
(301, 5, 2010, 'Jan - Mar', 56212, 0, 0, 0, 0, 6),
(302, 5, 2010, 'Apr - Jun', 56213, 0, 0, 0, 0, 5),
(304, 5, 2010, 'Oct - Dec', 56212, 0, 0, 0, 0, 1),
(305, 5, 2011, 'Jan - Mar', 56213, 0, 0, 0, 0, 5),
(306, 5, 2012, 'Jul - Sept', 56211, 0, 0, 0, 0, 2),
(307, 5, 2011, 'Jul - Sep', 56212, 0, 0, 0, 0, 1),
(308, 5, 2011, 'Oct - Dec', 56213, 0, 0, 0, 0, 44),
(309, 5, 2012, 'Oct - Dec', 56211, 0, 0, 0, 0, 1),
(310, 5, 2012, 'Apr - Jun', 56212, 0, 0, 0, 0, 7),
(311, 5, 2012, 'Jul - Sep', 56213, 0, 0, 0, 0, 5),
(313, 5, 2013, 'Jan - Mar', 56212, 0, 0, 0, 0, 4),
(314, 5, 2013, 'Jan - Mar', 56213, 0, 0, 0, 0, 2),
(315, 5, 2013, 'Jan - Mar', 56211, 0, 0, 0, 0, 1),
(318, 5, 2013, 'Apr - Jun', 56211, 0, 0, 0, 0, 3),
(319, 5, 2013, 'Jul - Sep', 56211, 0, 0, 0, 0, 4),
(320, 5, 2013, 'Oct - Dec', 56211, 0, 0, 0, 0, 2),

(359, 13, 2011, 'Jan - Mar ', 2, 0, 0, 0, 0, 12),
(360, 13, 2011, 'Jan - Mar ', 3, 0, 0, 0, 0, 134),
(361, 11, 2011, 'Jan - Mar ', 56175, 0, 0, 0, 0, 1),
(362, 11, 2011, 'Jan - Mar ', 56166, 0, 0, 0, 0, 2),
(363, 11, 2011, 'Jan - Mar ', 56178, 0, 0, 0, 0, 2),
(365, 6, 2011, 'Jan - Mar ', 40, 0, 0, 0, 0, 34),
(369, 0, 2011, 'Jan - Mar', 40, 0, 0, 0, 0, 3),
(372, 0, 2011, 'Jan - Mar', 40, 0, 0, 0, 0, 2),
(375, 0, 2011, 'Jan - Mar', 48, 0, 0, 0, 0, 0);



DROP TABLE IF EXISTS `tbl_mou`;
CREATE TABLE `tbl_mou` (
  `mou_id` bigint(20) NOT NULL auto_increment,
  `org_code` bigint(20) NOT NULL,
  `loan_agreement` char(3) NOT NULL,
  `date_signed` date NOT NULL,
  `guarantee_limit` varchar(20) NOT NULL,
  `max_loan_size` varchar(20) NOT NULL,
  `reportingPeriod` varchar(20) NOT NULL,
  `year` int(10) NOT NULL,
  PRIMARY KEY  (`mou_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- 
-- Dumping data for table `tbl_mou`
-- 

INSERT INTO `tbl_mou` (`mou_id`, `org_code`, `loan_agreement`, `date_signed`, `guarantee_limit`, `max_loan_size`, `reportingPeriod`, `year`) VALUES 
(2, 1, 'Yes', '2011-01-17', '50000000', '100000000', 'Jan - Mar', 2011),
(3, 2, 'Yes', '2011-01-23', '500000', '1000000', 'Jan - Mar', 2011),
(4, 3, 'Yes', '2011-01-22', '450000', '900000', 'Jan - Mar', 2011),
(5, 4, 'Yes', '2011-01-21', '670000', '143500000', 'Jan - Mar', 2011),
(6, 5, 'Yes', '2011-01-21', '5000000', '10000000', 'Jan - Mar', 2011),
(7, 5, 'Yes', '2011-01-17', '4500000', '900000000', 'Jan - Mar', 2011),
(8, 4, 'Yes', '2011-01-18', '67000000', '1235000000', 'Jan - Mar', 2011);



DROP TABLE IF EXISTS `tbl_lineofcredit`;
CREATE TABLE `tbl_lineofcredit` (
  `loc_id` bigint(20) NOT NULL auto_increment,
  `org_code` bigint(20) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `dateGranted` date NOT NULL,
  `loanValue` varchar(100) NOT NULL,
  `loanPurpose` varchar(100) NOT NULL,
  `loanmaturity` date NOT NULL,
  `outsloan` varchar(100) NOT NULL,
  `ducoverage` date NOT NULL,
  `days_inarrears` int(11) NOT NULL,
  `guarantee_exposure` varchar(100) NOT NULL,
  `reportingPeriod` varchar(50) NOT NULL,
  `year` int(8) NOT NULL,
  PRIMARY KEY  (`loc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `tbl_lineofcredit`
-- 

INSERT INTO `tbl_lineofcredit` (`loc_id`, `org_code`, `client_name`, `dateGranted`, `loanValue`, `loanPurpose`, `loanmaturity`, `outsloan`, `ducoverage`, `days_inarrears`, `guarantee_exposure`, `reportingPeriod`, `year`) VALUES 
(3, 2, 'Mukasa Herman', '2011-01-19', '25000000', 'Agricultural Mechanization', '2011-01-31', '0', '2011-01-31', 0, '12500000', 'Jan - Mar', 2011),
(4, 0, 'Joseph Balikuddembe', '2011-01-01', '100000000', 'Agricultural processing', '2011-12-31', '1', '2011-01-27', 3, '50000000', 'Jan - Mar', 2011),
(5, 3, 'luswata', '2010-01-01', '500000000', 'Agricultural exports', '2011-12-31', '0', '0000-00-00', 0, '250000000', 'Jan - Mar', 2011),
(6, 0, 'Array', '0000-00-00', 'Array', 'Array', '0000-00-00', 'Array', '0000-00-00', 0, '0', 'Jan - Mar', 2011),
(7, 1, 'Mageni Ronald', '2011-01-19', '5000000', 'Agricultural Mechanization', '2011-01-31', '4', '2011-01-31', 9, '2500000', 'Jan - Mar', 2011);



DROP TABLE IF EXISTS `tbl_grant`;
CREATE TABLE `tbl_grant` (
  `grant_id` bigint(20) NOT NULL auto_increment COMMENT 'primary key',
  `org_code` bigint(20) NOT NULL,
  `subactivity_id` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `damount` varchar(20) NOT NULL,
  `reportingPeriod` varchar(20) NOT NULL,
  `year` int(10) NOT NULL,
  PRIMARY KEY  (`grant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- 
-- Dumping data for table `tbl_grant`
-- 

INSERT INTO `tbl_grant` (`grant_id`, `org_code`, `subactivity_id`, `date`, `damount`, `reportingPeriod`, `year`) VALUES 
(1, 5, 1, '2011-01-18', '3489000', 'Jan - Mar', 2011),
(2, 5, 1, '2011-01-21', '100000000', 'Jan - Mar', 2011),
(4, 2, 9, '2011-04-08', '600000000', 'Jan - Mar', 2011),
(5, 2, 9, '2011-04-22', '9000000', 'Jan - Mar', 2011),
(6, 13, 9, '2011-04-27', '400000', 'Jan - Mar', 2011),
(10, 2, 26, '2011-04-08', '600000000', 'Jan - Mar', 2011),
(12, 2, 10, '2011-04-08', '600000000', 'Jan - Mar', 2011),
(13, 2, 16, '2011-01-24', '1000000000', 'Jan - Mar', 2011);




DROP TABLE IF EXISTS `tbl_branch`;
CREATE TABLE `tbl_branch` (
  `branch_id` bigint(20) NOT NULL auto_increment,
  `org_code` bigint(20) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `subcounty` varchar(100) NOT NULL,
  `parish` varchar(100) NOT NULL,
  `northings` decimal(20,0) NOT NULL,
  `eastings` decimal(20,0) NOT NULL,
  `date_created` date NOT NULL,
  `year` year(4) NOT NULL,
  `reportingPeriod` varchar(100) NOT NULL,
  PRIMARY KEY  (`branch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `tbl_branch`
-- 

INSERT INTO `tbl_branch` (`branch_id`, `org_code`, `branch_name`, `location`, `subcounty`, `parish`, `northings`, `eastings`, `date_created`, `year`, `reportingPeriod`) VALUES 
(1, 5, 'Kasubi', '102', 'Lubaga Division', 'Kasubi II', '3456777', '2345767', '2011-01-26', 2010, 'Oct- Dec'),
(2, 5, 'Kawempe', '102', 'Kawempe Division', 'Kawempe I', '3455555', '1237888', '2011-01-19', 2011, 'Jan - Mar'),
(5, 5, 'asasa', '', 'asa', 'sas', '0', '0', '2011-04-29', 2011, 'Jan - Mar');


CREATE or replace  ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `db_abi_v1`.`view_branch` AS select `b`.`branch_id` AS `branch_id`,`b`.`org_code` AS `org_code`,`o`.`orgName` AS `orgName`,`b`.`branch_name` AS `branch_name`,`b`.`location` AS `location`,`d`.`districtName` AS `districtName`,`b`.`subcounty` AS `subcounty`,`b`.`parish` AS `parish`,`b`.`northings` AS `northings`,`b`.`eastings` AS `eastings`,`b`.`date_created` AS `date_created`,`b`.`year` AS `year`,`b`.`reportingPeriod` AS `reportingPeriod` from ((`db_abi_v1`.`tbl_branch` `b` join `db_abi_v1`.`tbl_organization` `o` on((`b`.`org_code` = `o`.`org_code`))) join `db_abi_v1`.`tbl_district` `d` on((`b`.`location` = `d`.`districtCode`))) order by `b`.`location`;

CREATE or replace ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `db_abi_v1`.`view_mou` AS select `m`.`mou_id` AS `mou_id`,`m`.`org_code` AS `org_code`,`o`.`orgName` AS `orgName`,`m`.`loan_agreement` AS `loan_agreement`,`m`.`date_signed` AS `date_signed`,`m`.`guarantee_limit` AS `guarantee_limit`,`m`.`max_loan_size` AS `max_loan_size`,`m`.`reportingPeriod` AS `reportingPeriod`,`m`.`year` AS `year` from (`db_abi_v1`.`tbl_mou` `m` join `db_abi_v1`.`tbl_organization` `o` on((`m`.`org_code` = `o`.`org_code`))) order by `o`.`orgName`;

CREATE or replace ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `db_abi_v1`.`view_lineofcredit` AS select `l`.`loc_id` AS `loc_id`,`l`.`org_code` AS `org_code`,`o`.`orgName` AS `orgName`,`l`.`client_name` AS `client_name`,`l`.`dateGranted` AS `dateGranted`,`l`.`loanValue` AS `loanValue`,`l`.`loanPurpose` AS `loanPurpose`,`l`.`loanmaturity` AS `loanmaturity`,`l`.`outsloan` AS `outsloan`,`l`.`ducoverage` AS `ducoverage`,`l`.`days_inarrears` AS `days_inarrears`,`l`.`guarantee_exposure` AS `guarantee_exposure`,`l`.`reportingPeriod` AS `reportingPeriod`,`l`.`year` AS `year` from (`db_abi_v1`.`tbl_lineofcredit` `l` join `db_abi_v1`.`tbl_organization` `o` on((`o`.`org_code` = `l`.`org_code`))) order by `l`.`client_name`;


CREATE or replace ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `db_abi_v1`.`view_grant` AS select `g`.`grant_id` AS `grant_id`,`g`.`org_code` AS `org_code`,`o`.`orgName` AS `orgName`,`g`.`subactivity_id` AS `subactivity_id`,`s`.`subactivity_name` AS `subactivity_name`,`s`.`subactivity_code` AS `subactivity_code`,`g`.`date` AS `date`,`g`.`damount` AS `damount`,`g`.`reportingPeriod` AS `reportingPeriod`,`g`.`year` AS `year` from ((`db_abi_v1`.`tbl_grant` `g` join `db_abi_v1`.`tbl_organization` `o` on((`g`.`org_code` = `o`.`org_code`))) join `db_abi_v1`.`tbl_subactivity` `s` on((`g`.`subactivity_id` = `s`.`subact_id`))) order by `s`.`subactivity_code`;

CREATE or replace ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `db_abi_v1`.`view_organizationreporting` AS select `r`.`id` AS `id`,`r`.`org_code` AS `org_code`,`o`.`orgName` AS `orgName`,`r`.`year` AS `year`,`r`.`reportingPeriod` AS `reportingPeriod`,`r`.`indicator_id` AS `indicator_id`,`i`.`subcomponent_id` AS `subcomponent_id`,`i`.`subactivity_code` AS `subactivity_code`,`i`.`subactivity_name` AS `subactivity_name`,`i`.`indicator_name` AS `indicator_name`,`i`.`indicator_type` AS `indicator_type`,`i`.`disaggregation` AS `disaggregation`,`r`.`male` AS `male`,`r`.`female` AS `female`,`r`.`maleyouth` AS `maleyouth`,`r`.`femaleyouth` AS `femaleyouth`,`r`.`total` AS `total` from ((`db_abi_v1`.`tbl_organizationreporting` `r` join `db_abi_v1`.`tbl_organization` `o` on((`o`.`org_code` = `r`.`org_code`))) join `db_abi_v1`.`view_indicator` `i` on((`r`.`indicator_id` = `i`.`indicator_id`))) order by `r`.`indicator_id`;




//-------------------------------------modified on 12042011----------------------------------------------------------------
ALTER TABLE `tbl_indicator` ADD `gender` VARCHAR( 20 ) NOT NULL AFTER `disaggregation` ;
SELECT *
FROM `tbl_indicator`
WHERE disaggregation LIKE 'Yes'
LIMIT 0 , 30 




ALTER TABLE `tbl_indicator` ADD UNIQUE (
`prog_id` ,
`component_id` ,
`subcomponent_id` ,
`output_id` ,
`activity_id` ,
`subactivity_id` ,
`physical_target` ,
`indicator_name` ,
`disaggregation` ,
`indicator_type`
);
///unique key
ALTER TABLE `tbl_indicator` ADD UNIQUE (
`prog_id` ,
`component_id` ,
`subcomponent_id` ,
`output_id` ,
`activity_id` ,
`subactivity_id` ,
`physical_target` ,
`indicator_name`
);


DELETE FROM `tbl_indicator` WHERE `tbl_indicator`.`indicator_id` = 56169 LIMIT 1;
DELETE FROM `tbl_indicator` WHERE `tbl_indicator`.`indicator_id` = 56171 LIMIT 1;
DELETE FROM `tbl_indicator` WHERE `tbl_indicator`.`indicator_id` = 56351 LIMIT 1;
DELETE FROM `tbl_indicator` WHERE `tbl_indicator`.`indicator_id` = 56352 LIMIT 1;

DELETE FROM `tbl_indicator` WHERE `tbl_indicator`.`indicator_id` = 56209 LIMIT 1;
DELETE FROM `tbl_indicator` WHERE `tbl_indicator`.`indicator_id` = 56210 LIMIT 1;
DELETE FROM `tbl_indicator` WHERE `tbl_indicator`.`indicator_id` =56226 LIMIT 1 ;

DELETE FROM `tbl_indicator` WHERE `tbl_indicator`.`indicator_id` =56227 LIMIT 1 ;
DELETE FROM `tbl_indicator` WHERE `tbl_indicator`.`indicator_id` =56233 LIMIT 1 ;
DELETE FROM `tbl_indicator` WHERE `tbl_indicator`.`indicator_id` =56238 LIMIT 1 ;

DELETE FROM `tbl_indicator` WHERE `tbl_indicator`.`indicator_id` =56239 LIMIT 1 ;
DELETE FROM `tbl_indicator` WHERE `tbl_indicator`.`indicator_id` = 56243 LIMIT 1;
DELETE FROM `tbl_indicator` WHERE `tbl_indicator`.`indicator_id` = 56244 LIMIT 1;
DELETE FROM `tbl_indicator` WHERE `tbl_indicator`.`indicator_id` = 56419 LIMIT 1;
DELETE FROM `tbl_indicator` WHERE `tbl_indicator`.`indicator_id` = 56498 LIMIT 1;


//1-14-3-Workshops-No. of workshops held-No-Sub-Activity Based

SELECT * FROM `tbl_indicator` WHERE (( `tbl_indicator`.`indicator_id` = 3) OR ( `tbl_indicator`.`indicator_id` = 24) OR ( `tbl_indicator`.`indicator_id` = 32) OR ( `tbl_indicator`.`indicator_id` = 52) OR ( `tbl_indicator`.`indicator_id` = 56149) OR ( `tbl_indicator`.`indicator_id` = 56152) OR ( `tbl_indicator`.`indicator_id` = 56159) OR ( `tbl_indicator`.`indicator_id` = 56194) OR ( `tbl_indicator`.`indicator_id` = 56200) OR ( `tbl_indicator`.`indicator_id` = 56201) OR ( `tbl_indicator`.`indicator_id` = 56214) OR ( `tbl_indicator`.`indicator_id` = 56217) OR ( `tbl_indicator`.`indicator_id` = 56246) OR ( `tbl_indicator`.`indicator_id` = 56255) OR ( `tbl_indicator`.`indicator_id` = 56260) OR ( `tbl_indicator`.`indicator_id` = 56270) OR ( `tbl_indicator`.`indicator_id` = 56275) OR ( `tbl_indicator`.`indicator_id` = 56295) OR ( `tbl_indicator`.`indicator_id` = 56305) OR ( `tbl_indicator`.`indicator_id` = 56328) OR ( `tbl_indicator`.`indicator_id` = 56331) OR ( `tbl_indicator`.`indicator_[...] 




UPDATE `tbl_indicator` SET `indicator_id` = 3, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 1, `output_id` = 4, `activity_id` = 2, `subactivity_id` = 2, `indicator_code` = '', `intervention_id` = 1, `rc_id` = 3, `physical_target` = 'Demostrations', `indicator_name` = 'No. of demostrations(Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 3;
UPDATE `tbl_indicator` SET `indicator_id` = 24, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 1, `output_id` = 5, `activity_id` = 9, `subactivity_id` = 19, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'Proposals', `indicator_name` = 'No. of proposals (Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 24;
UPDATE `tbl_indicator` SET `indicator_id` = 32, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 1, `output_id` = 6, `activity_id` = 11, `subactivity_id` = 23, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'TA packages', `indicator_name` = 'No. of SMEs owned (Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 32;
UPDATE `tbl_indicator` SET `indicator_id` = 52, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 2, `output_id` = 8, `activity_id` = 19, `subactivity_id` = 38, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'Technical experts costs', `indicator_name` = 'No. of  FIs supported(Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 52;
UPDATE `tbl_indicator` SET `indicator_id` = 56149, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 2, `output_id` = 8, `activity_id` = 19, `subactivity_id` = 38, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'Technical experts costs', `indicator_name` = 'No. of  indirect beneficiaries (Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 56149;
UPDATE `tbl_indicator` SET `indicator_id` = 56152, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 2, `output_id` = 8, `activity_id` = 17, `subactivity_id` = 40, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'Volume of disbursement', `indicator_name` = 'No. of   beneficiaries (Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 56152;
UPDATE `tbl_indicator` SET `indicator_id` = 56159, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 2, `output_id` = 10, `activity_id` = 21, `subactivity_id` = 45, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'ALGC operating costs', `indicator_name` = 'No. of  partnership FIs with signed MOU. (Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 56159;
UPDATE `tbl_indicator` SET `indicator_id` = 56194, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 4, `output_id` = 17, `activity_id` = 42, `subactivity_id` = 67, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'Women compete in agribusinesses', `indicator_name` = 'No. of people reached (Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 56194;
UPDATE `tbl_indicator` SET `indicator_id` = 56200, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 4, `output_id` = 19, `activity_id` = 45, `subactivity_id` = 72, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'BDS & service providers trained', `indicator_name` = 'No. of service BDS/providers trained(Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 56200;
UPDATE `tbl_indicator` SET `indicator_id` = 56201, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 4, `output_id` = 19, `activity_id` = 45, `subactivity_id` = 73, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'Participants attend', `indicator_name` = 'No. of participants trained(Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 56201;
UPDATE `tbl_indicator` SET `indicator_id` = 56214, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 2, `output_id` = 0, `activity_id` = 0, `subactivity_id` = 0, `indicator_code` = '', `intervention_id` = 3, `rc_id` = 2, `physical_target` = 'Loans Provided', `indicator_name` = 'No. of loans Provided (Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Results Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 56214;
UPDATE `tbl_indicator` SET `indicator_id` = 56217, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 4, `output_id` = 0, `activity_id` = 0, `subactivity_id` = 0, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'Farm Families', `indicator_name` = 'No. of Families Reached(Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Results Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 56217;
UPDATE `tbl_indicator` SET `indicator_id` = 56246, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 1, `output_id` = 4, `activity_id` = 55, `subactivity_id` = 101, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'Demonstrations', `indicator_name` = 'No. of Demonstrations(Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 56246;
UPDATE `tbl_indicator` SET `indicator_id` = 56255, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 1, `output_id` = 4, `activity_id` = 56, `subactivity_id` = 105, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'Stockists', `indicator_name` = 'No. of stockists(Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 56255;
UPDATE `tbl_indicator` SET `indicator_id` = 56260, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 1, `output_id` = 4, `activity_id` = 5, `subactivity_id` = 10, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'Dealers trained', `indicator_name` = 'No. of dealers trained(Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 56260;
UPDATE `tbl_indicator` SET `indicator_id` = 56270, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 1, `output_id` = 4, `activity_id` = 55, `subactivity_id` = 101, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'Beneficiaries', `indicator_name` = 'No. of farmers(Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 56270;
UPDATE `tbl_indicator` SET `indicator_id` = 56275, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 1, `output_id` = 5, `activity_id` = 9, `subactivity_id` = 19, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'Beneficiaries', `indicator_name` = 'No. of farmers(Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 56275;
UPDATE `tbl_indicator` SET `indicator_id` = 56295, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 2, `output_id` = 8, `activity_id` = 17, `subactivity_id` = 81, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'Borrowers linked to FIs', `indicator_name` = 'No of borrowers linked(Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 56295;
UPDATE `tbl_indicator` SET `indicator_id` = 56305, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 2, `output_id` = 8, `activity_id` = 17, `subactivity_id` = 83, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'Capacity developed', `indicator_name` = 'No. of BDS providers trained(Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 56305;
UPDATE `tbl_indicator` SET `indicator_id` = 56328, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 2, `output_id` = 9, `activity_id` = 19, `subactivity_id` = 90, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'FIs supported', `indicator_name` = 'No. of FIs supported(Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 56328;
UPDATE `tbl_indicator` SET `indicator_id` = 56331, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 2, `output_id` = 10, `activity_id` = 20, `subactivity_id` = 92, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'Disbursments made', `indicator_name` = 'Vol. of disbursments (Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 56331;
UPDATE `tbl_indicator` SET `indicator_id` = 56334, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 2, `output_id` = 10, `activity_id` = 20, `subactivity_id` = 93, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'Savings volume increased', `indicator_name` = '% increase in savings vol (Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 56334;
UPDATE `tbl_indicator` SET `indicator_id` = 56344, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 3, `output_id` = 12, `activity_id` = 27, `subactivity_id` = 50, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'Participants', `indicator_name` = 'No. of participants(Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 56344;
UPDATE `tbl_indicator` SET `indicator_id` = 56345, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 3, `output_id` = 12, `activity_id` = 27, `subactivity_id` = 51, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'Participants attend', `indicator_name` = 'No. of particpants(Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 56345;
UPDATE `tbl_indicator` SET `indicator_id` = 56350, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 3, `output_id` = 13, `activity_id` = 29, `subactivity_id` = 113, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'Service providers trained', `indicator_name` = 'No. of trainees (Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 56350;
UPDATE `tbl_indicator` SET `indicator_id` = 56355, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 3, `output_id` = 13, `activity_id` = 29, `subactivity_id` = 115, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'Technical staff trained', `indicator_name` = 'No. of technical staff trained(Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 56355;
UPDATE `tbl_indicator` SET `indicator_id` = 56356, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 3, `output_id` = 13, `activity_id` = 29, `subactivity_id` = 116, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'Lab assessment done', `indicator_name` = 'No. of assessments(Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 56356;
UPDATE `tbl_indicator` SET `indicator_id` = 56358, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 3, `output_id` = 13, `activity_id` = 29, `subactivity_id` = 117, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'Labaratory staff trained', `indicator_name` = 'No. of labaratory staff trained(Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 56358;
UPDATE `tbl_indicator` SET `indicator_id` = 56359, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 3, `output_id` = 13, `activity_id` = 29, `subactivity_id` = 118, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'Inspectors trained', `indicator_name` = 'No. of inspectors trained(Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 56359;
UPDATE `tbl_indicator` SET `indicator_id` = 56362, `prog_id` = 1, `component_id` = 14, `subcomponent_id` = 3, `output_id` = 14, `activity_id` = 57, `subactivity_id` = 120, `indicator_code` = '', `intervention_id` = 0, `rc_id` = 0, `physical_target` = 'Participation of SMEs registere', `indicator_name` = 'No. of SMEs representatives supported(Adult Male)', `disaggregation` = 'Yes', `gender` = 'Male', `indicator_type` = 'Sub-Activity Based', `abitrust_category` = '', `remarks` = '' WHERE  `tbl_indicator`.`indicator_id` = 56362;


INSERT INTO `tbl_indicator` (`prog_id`, `component_id`, `subcomponent_id`, `output_id`, `activity_id`, `subactivity_id`, `indicator_code`, `intervention_id`, `rc_id`, `physical_target`, `indicator_name`, `disaggregation`, `gender`, `indicator_type`, `abitrust_category`, `remarks`) VALUES 
(1, 14, 1, 4, 2, 2, '', 1, 3, 'Demostrations', 'No. of demostrations(Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),
(1, 14, 1, 4, 2, 2, '', 1, 3, 'Demostrations', 'No. of demostrations(Male Youth)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),
(1, 14, 1, 4, 2, 2, '', 1, 3, 'Demostrations', 'No. of demostrations(Female Youth)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', ''),

( 1, 14, 1, 5, 9, 19, '', 0, 0, 'Proposals', 'No. of proposals (Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),
( 1, 14, 1, 5, 9, 19, '', 0, 0, 'Proposals', 'No. of proposals (Youth Male)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),
( 1, 14, 1, 5, 9, 19, '', 0, 0, 'Proposals', 'No. of proposals (Youth Female)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', ''),



( 1, 14, 1, 6, 11, 23, '', 0, 0, 'TA packages', 'No. of SMEs owned (Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),
( 1, 14, 1, 6, 11, 23, '', 0, 0, 'TA packages', 'No. of SMEs owned (Male Youth)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),
( 1, 14, 1, 6, 11, 23, '', 0, 0, 'TA packages', 'No. of SMEs owned (Female Youth)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', ''),


( 1, 14, 2, 8, 19, 38, '', 0, 0, 'Technical experts costs', 'No. of  FIs supported(Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),
( 1, 14, 2, 8, 19, 38, '', 0, 0, 'Technical experts costs', 'No. of  FIs supported(Male Youth)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),
( 1, 14, 2, 8, 19, 38, '', 0, 0, 'Technical experts costs', 'No. of  FIs supported(Female Youth)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', ''),

(1, 14, 2, 8, 19, 38, '', 0, 0, 'Technical experts costs', 'No. of  indirect beneficiaries (Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),
(1, 14, 2, 8, 19, 38, '', 0, 0, 'Technical experts costs', 'No. of  indirect beneficiaries (Female Youth)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', ''),
(1, 14, 2, 8, 19, 38, '', 0, 0, 'Technical experts costs', 'No. of  indirect beneficiaries (Male Youth)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),



( 1, 14, 2, 8, 17, 40, '', 0, 0, 'Volume of disbursement', 'No. of   beneficiaries (Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),
( 1, 14, 2, 8, 17, 40, '', 0, 0, 'Volume of disbursement', 'No. of   beneficiaries (Male Youth)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),
( 1, 14, 2, 8, 17, 40, '', 0, 0, 'Volume of disbursement', 'No. of   beneficiaries (Female Youth)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', ''),





( 1, 14, 2, 10, 21, 45, '', 0, 0, 'ALGC operating costs', 'No. of  partnership FIs with signed MOU. (Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),
( 1, 14, 2, 10, 21, 45, '', 0, 0, 'ALGC operating costs', 'No. of  partnership FIs with signed MOU. (Male Youth)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),
( 1, 14, 2, 10, 21, 45, '', 0, 0, 'ALGC operating costs', 'No. of  partnership FIs with signed MOU. (Female Youth)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', ''),



( 1, 14, 4, 17, 42, 67, '', 0, 0, 'Women compete in agribusinesses', 'No. of people reached (Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),
( 1, 14, 4, 17, 42, 67, '', 0, 0, 'Women compete in agribusinesses', 'No. of people reached (Male Youth)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),
( 1, 14, 4, 17, 42, 67, '', 0, 0, 'Women compete in agribusinesses', 'No. of people reached (Female Youth)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', ''),


( 1, 14, 4, 19, 45, 72, '', 0, 0, 'BDS & service providers trained', 'No. of service BDS/providers trained(Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),
( 1, 14, 4, 19, 45, 72, '', 0, 0, 'BDS & service providers trained', 'No. of service BDS/providers trained(Male Youth)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),
( 1, 14, 4, 19, 45, 72, '', 0, 0, 'BDS & service providers trained', 'No. of service BDS/providers trained(Female Youth)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', ''),



( 1, 14, 4, 19, 45, 73, '', 0, 0, 'Participants attend', 'No. of participants trained(Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),
( 1, 14, 4, 19, 45, 73, '', 0, 0, 'Participants attend', 'No. of participants trained(Male Youth)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),
( 1, 14, 4, 19, 45, 73, '', 0, 0, 'Participants attend', 'No. of participants trained(Female Youth)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', ''),


( 1, 14, 2, 0, 0, 0, '', 3, 2, 'Loans Provided', 'No. of loans Provided (Adult Female)', 'Yes', 'Female', 'Results Based', '', ''),
( 1, 14, 2, 0, 0, 0, '', 3, 2, 'Loans Provided', 'No. of loans Provided (Male Youth)', 'Yes', 'Male Youth', 'Results Based', '', ''),
( 1, 14, 2, 0, 0, 0, '', 3, 2, 'Loans Provided', 'No. of loans Provided (Female Youth)', 'Yes', 'Female Youth', 'Results Based', '', ''),



( 1, 14, 4, 0, 0, 0, '', 0, 0, 'Farm Families', 'No. of Families Reached(Adult Female)', 'Yes', 'Female', 'Results Based', '', ''),
( 1, 14, 4, 0, 0, 0, '', 0, 0, 'Farm Families', 'No. of Families Reached(Male Youth)', 'Yes', 'Male Youth', 'Results Based', '', ''),
( 1, 14, 4, 0, 0, 0, '', 0, 0, 'Farm Families', 'No. of Families Reached(Female Youth)', 'Yes', 'Female Youth', 'Results Based', '', ''),

( 1, 14, 1, 4, 55, 101, '', 0, 0, 'Demonstrations', 'No. of Demonstrations(Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),
( 1, 14, 1, 4, 55, 101, '', 0, 0, 'Demonstrations', 'No. of Demonstrations(Male Youth)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),
( 1, 14, 1, 4, 55, 101, '', 0, 0, 'Demonstrations', 'No. of Demonstrations(Female Youth)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', ''),

( 1, 14, 1, 4, 56, 105, '', 0, 0, 'Stockists', 'No. of stockists(Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),
( 1, 14, 1, 4, 56, 105, '', 0, 0, 'Stockists', 'No. of stockists(Male Youth)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),
( 1, 14, 1, 4, 56, 105, '', 0, 0, 'Stockists', 'No. of stockists(Female Youth)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', ''),




( 1, 14, 1, 4, 5, 10, '', 0, 0, 'Dealers trained', 'No. of dealers trained(Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),
( 1, 14, 1, 4, 5, 10, '', 0, 0, 'Dealers trained', 'No. of dealers trained(Male Youth)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),
( 1, 14, 1, 4, 5, 10, '', 0, 0, 'Dealers trained', 'No. of dealers trained(Female Youth)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', ''),



(1, 14, 1, 4, 55, 101, '', 0, 0, 'Beneficiaries', 'No. of farmers(Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),
(1, 14, 1, 4, 55, 101, '', 0, 0, 'Beneficiaries', 'No. of farmers(Male Youth)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),
(1, 14, 1, 4, 55, 101, '', 0, 0, 'Beneficiaries', 'No. of farmers(Female Youth)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', ''),



(1, 14, 1, 5, 9, 19, '', 0, 0, 'Beneficiaries', 'No. of farmers(Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),
(1, 14, 1, 5, 9, 19, '', 0, 0, 'Beneficiaries', 'No. of farmers(Male Youth)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),
(1, 14, 1, 5, 9, 19, '', 0, 0, 'Beneficiaries', 'No. of farmers(Female Youth)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', ''),



( 1, 14, 2, 8, 17, 81, '', 0, 0, 'Borrowers linked to FIs', 'No of borrowers linked(Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),

( 1, 14, 2, 8, 17, 81, '', 0, 0, 'Borrowers linked to FIs', 'No of borrowers linked(Male Youth)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),

( 1, 14, 2, 8, 17, 81, '', 0, 0, 'Borrowers linked to FIs', 'No of borrowers linked(Female Youth)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', ''),



( 1, 14, 2, 8, 17, 83, '', 0, 0, 'Capacity developed', 'No. of BDS providers trained(Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),
( 1, 14, 2, 8, 17, 83, '', 0, 0, 'Capacity developed', 'No. of BDS providers trained(Male Youth)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),
( 1, 14, 2, 8, 17, 83, '', 0, 0, 'Capacity developed', 'No. of BDS providers trained(Female Youth)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', ''),




( 1, 14, 2, 9, 19, 90, '', 0, 0, 'FIs supported', 'No. of FIs supported(Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),
( 1, 14, 2, 9, 19, 90, '', 0, 0, 'FIs supported', 'No. of FIs supported(Male Youth)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),
( 1, 14, 2, 9, 19, 90, '', 0, 0, 'FIs supported', 'No. of FIs supported(Female Youth)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', ''),




( 1, 14, 2, 10, 20, 92, '', 0, 0, 'Disbursments made', 'Vol. of disbursments (Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),
( 1, 14, 2, 10, 20, 92, '', 0, 0, 'Disbursments made', 'Vol. of disbursments (Male Youth)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),
( 1, 14, 2, 10, 20, 92, '', 0, 0, 'Disbursments made', 'Vol. of disbursments (Female Youth)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', ''),




(1, 14, 2, 10, 20, 93, '', 0, 0, 'Savings volume increased', '% increase in savings vol (Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),
(1, 14, 2, 10, 20, 93, '', 0, 0, 'Savings volume increased', '% increase in savings vol (Male Youth)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),
(1, 14, 2, 10, 20, 93, '', 0, 0, 'Savings volume increased', '% increase in savings vol (Female Youth)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', ''),




( 1, 14, 3, 12, 27, 50, '', 0, 0, 'Participants', 'No. of participants(Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),
( 1, 14, 3, 12, 27, 50, '', 0, 0, 'Participants', 'No. of participants(Male Youth)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),
( 1, 14, 3, 12, 27, 50, '', 0, 0, 'Participants', 'No. of participants(Female Youth)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', ''),




(1, 14, 3, 12, 27, 51, '', 0, 0, 'Participants attend', 'No. of particpants(Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),
(1, 14, 3, 12, 27, 51, '', 0, 0, 'Participants attend', 'No. of particpants(Male Youth)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),
(1, 14, 3, 12, 27, 51, '', 0, 0, 'Participants attend', 'No. of particpants(Female Youth)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', ''),




( 1, 14, 3, 13, 29, 113, '', 0, 0, 'Service providers trained', 'No. of trainees (Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),
( 1, 14, 3, 13, 29, 113, '', 0, 0, 'Service providers trained', 'No. of trainees (Male Youth)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),
( 1, 14, 3, 13, 29, 113, '', 0, 0, 'Service providers trained', 'No. of trainees (Female Youth)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', ''),




( 1, 14, 3, 13, 29, 115, '', 0, 0, 'Technical staff trained', 'No. of technical staff trained(Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),
( 1, 14, 3, 13, 29, 115, '', 0, 0, 'Technical staff trained', 'No. of technical staff trained(Male Youth)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),
( 1, 14, 3, 13, 29, 115, '', 0, 0, 'Technical staff trained', 'No. of technical staff trained(Female Youth)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', ''),





( 1, 14, 3, 13, 29, 116, '', 0, 0, 'Lab assessment done', 'No. of assessments(Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),
( 1, 14, 3, 13, 29, 116, '', 0, 0, 'Lab assessment done', 'No. of assessments(Male Youth)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),
( 1, 14, 3, 13, 29, 116, '', 0, 0, 'Lab assessment done', 'No. of assessments(Female Youth)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', ''),





( 1, 14, 3, 13, 29, 117, '', 0, 0, 'Labaratory staff trained', 'No. of labaratory staff trained(Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),
( 1, 14, 3, 13, 29, 117, '', 0, 0, 'Labaratory staff trained', 'No. of labaratory staff trained(Male Youth)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),
( 1, 14, 3, 13, 29, 117, '', 0, 0, 'Labaratory staff trained', 'No. of labaratory staff trained(Female Youth)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', ''),





( 1, 14, 3, 13, 29, 118, '', 0, 0, 'Inspectors trained', 'No. of inspectors trained(Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),

( 1, 14, 3, 13, 29, 118, '', 0, 0, 'Inspectors trained', 'No. of inspectors trained(Male Youth)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),
( 1, 14, 3, 13, 29, 118, '', 0, 0, 'Inspectors trained', 'No. of inspectors trained(Female Youth)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', ''),





(1, 14, 3, 14, 57, 120, '', 0, 0, 'Participation of SMEs registered', 'No. of SMEs representatives supported(Adult Female)', 'Yes', 'Female', 'Sub-Activity Based', '', ''),
(1, 14, 3, 14, 57, 120, '', 0, 0, 'Participation of SMEs registered', 'No. of SMEs representatives supported(Male Youth)', 'Yes', 'Male Youth', 'Sub-Activity Based', '', ''),

(1, 14, 3, 14, 57, 120, '', 0, 0, 'Participation of SMEs registered', 'No. of SMEs representatives supported(Female Youth)', 'Yes', 'Female Youth', 'Sub-Activity Based', '', '');





//-----------------------------------------end-------------------------

//-------------------------------------modified on 09042011----------------------------------------------------------------
UPDATE `db_abi_v1`.`tbl_lookup` SET `codeName` = 'aBi Trust ' WHERE `tbl_lookup`.`classCode` =2 AND `tbl_lookup`.`code` =8 LIMIT 1 ;

SELECT *
FROM tbl_activity
WHERE subcomp_id = '1'
AND activity_id <> ''
GROUP BY activity_code
ORDER BY `tbl_activity`.`activity_code` ASC
LIMIT 0 , 100 


//------------------------------------------------------------------modified on 08042011----------------------------------
//update tbl_indicator
update tbl_indicator set prog_id=1 where prog_id=0
update tbl_indicator set indicator_type='aBi Trust' where indicator_type like '%ABTrust%'
//------------------------test---------------
select abitrust_category from tbl_indicator where abitrust_category <> '';
select indicator_id,indicator_name from tbl_indicator where abitrust_category <> '';



UPDATE tbl_indicator SET indicator_type = 'Sub-Activity Based' WHERE indicator_type = '%' 

ALTER TABLE `tbl_annualtarget` ADD UNIQUE (`year` ,`indicator_id`);

 //-------------------------------view indicator modified and working08042011--------------------------------------------------
 
#----------------------------------------------------END-------------------------------------------------------------------


#------------CHANGES DONE ON 06042011----------------------
ALTER TABLE `tbl_subactivity` CHANGE `subactivity_name` `subactivity_name` VARCHAR( 300 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
CHANGE `responsible` `responsible` VARCHAR( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
CHANGE `implementer` `implementer` VARCHAR( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL 
mysql_query("ALTER TABLE `tbl_output` ADD UNIQUE (`output_code` ,`prog_id`)")or die(mysql_error());


//05042011

ALTER TABLE `tbl_subactivity` CHANGE `description` `description` VARCHAR( 1000 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL 


#----------------------------END------------------------------------------------------------------------------
#------------------------------------------------
CREATE TABLE `tbl_financialactuals` (
  `id` bigint(30) NOT NULL auto_increment,
  `org_code` bigint(30) NOT NULL,
  `year` year(4) NOT NULL,
  `reportingPeriod` varchar(50) NOT NULL,
  `subactivity_id` bigint(20) NOT NULL,
  
  `amount` int(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;
//recreated on 21032011

create or replace view view_programme as select c.id,c.prog_id,c.component_code,c.component,c.description,p.program_name,p.Funder from tbl_component c inner join tbl_programme p on(c.prog_id=p.prog_id)  order by component_code asc;

create or replace view  view_login as select l.login_id,u.user_id,u.username,l.role,l.time,l.ip_address,l.status from TBL_LOGIN  l inner join  tbl_user u on(l.user_id=u.user_id)  order by login_id desc;



 create or replace view view_subcomponent as select s.id,p.prog_id,s.subcomponent_code,s.subcomponent,c.component,p.program_name,p.funder,s.description from tbl_subcomponent s inner join tbl_programme p on(s.prog_id=p.prog_id) inner join tbl_component c on(c.prog_id=p.prog_id) order by s.id asc;
 

 

 
 create or replace view view_activity as select a.activity_id,a.output_id,a.activity_code,a.activity_name,a.details,o.output_code,o.output_name,s.id as subcomponent_id,s.subcomponent_code,s.subcomponent,c.component,p.program_name,p.funder from tbl_activity a inner join tbl_output o on(a.output_id=o.output_id) inner join tbl_subcomponent s on(s.id=a.subcomp_id) inner join tbl_component c on(a.component_id=c.id) inner join tbl_programme p on(p.prog_id=a.prog_id) order by a.activity_id asc ;
 
   
   
 create or replace view view_subactivity as select sa.subact_id as subactivity_id,sa.activity_id,sa.subactivity_code,sa.subactivity_name,sa.responsible,sa.implementer,sa.description,a.output_id,a.activity_code,a.activity_name,a.details,o.output_code,o.output_name,sa.subcomponent_id,s.subcomponent_code,s.subcomponent,c.id as component_id,c.component,p.program_name,p.funder from tbl_subactivity sa inner join tbl_activity a on(sa.activity_id=a.activity_id) inner join  tbl_output o on(sa.output_id=o.output_id) inner join tbl_subcomponent s on(s.id=sa.subcomponent_id) inner join tbl_component c on(c.id= sa.component_id) inner join tbl_programme p on(sa.prog_id=p.prog_id) order by subactivity_id asc;


 
 create or replace view  view_intervention as select i.intervention_id,i.intervention,i.details,i.prog_id,p.program_name,i.component_id,c.component, i.subcomponent_id,s.subcomponent from tbl_intervention i inner join tbl_subcomponent s on(i.subcomponent_id=s.id) inner join tbl_component c on(i.component_id=c.id) inner join    tbl_programme p on(i.prog_id=p.prog_id) order by subcomponent asc;
 

 //view indicator old and not working (modified on 02022011)
 

 

 
 
create or replace view view_workplan as select w.subcomponent_id,w.output_id,w.activity_id,w.year,w.subactivity_id,s.subactivity_code,s.subactivity_name,w.pquarter1,w.pquarter2,w.pquarter3,w.pquarter4,w.ptotal,w.fquarter1,w.fquarter2,w.fquarter3,w.fquarter4,w.ftotal from tbl_workplan w inner join view_subactivity s on(s.subactivity_id=w.subactivity_id) order by subactivity_code asc;


CREATE OR REPLACE view view_branch as select b.branch_id,b.org_code,o.orgName,b.branch_name,b.location,d.districtName,b.subcounty,b.parish,b.northings,b.eastings,b.date_created from tbl_branch b inner join tbl_organization o on(b.org_code=o.org_code) inner join tbl_district d on(b.location=d.districtCode) order by location ASC

create or replace view view_mou as select m.org_code,o.orgName,m.loan_agreement,m.date_signed,m.guarantee_limit,m.max_loan_size from tbl_mou m inner join tbl_organization o on(m.org_code=o.org_code) order by orgName asc



create or replace view view_lineofcredit as select l.loc_id,l.org_code,o.orgName,l.client_name,l.dateGranted,l.loanValue,l.loanPurpose,l.loanmaturity,l.outsloan,l.ducoverage,l.days_inarrears,l.guarantee_exposure from tbl_lineofcredit l inner join tbl_organization o on(o.org_code=l.org_code) order by l.client_name;





////




create or replace view  view_subcomponent_summary as select r.id,r.org_code,o.orgName,r.year,r.reportingPeriod,r.indicator_id,i.subcomponent_id,i.subactivity_code,i.subactivity_name,i.indicator_name,i.disaggregation,r.male,r.female,r.maleyouth, r.femaleyouth,r.total from tbl_organizationreporting r inner join tbl_organization o on(o.org_code=r.org_code) inner join view_indicator i on(r.indicator_id=i.indicator_id) order by indicator_id;



create or replace view view_activity_basedIndicator as select i.indicator_id,i.indicator_type,i.indicator_name,i.physical_target,s.id as subcomponent_id,s.subcomponent_code,s.subcomponent,it.intervention_id,it.intervention from tbl_indicator  i inner join tbl_subcomponent s on(i.subcomponent_id=s.id) inner join tbl_intervention it on(it.intervention_id=i.intervention_id) order by indicator_type asc;
#---------------------------------------------------------------------------------------------------------------------------------
#modified on 31032011


//needs updates
ALTER TABLE `tbl_projectlifeplanning` ADD `output_id` INT( 11 ) NOT NULL AFTER `subcomponent_id` ;

CREATE OR REPLACE VIEW view_annualbudget as select b.f_id,b.subcomponent_id,b.output_id,b.activity_id,b.year,b.subactivity_id,vi.output_name,vi.subcomponent,vi.activity_name,vi.subactivity_code,vi.subactivity_name,b.indicator_id,vi.physical_target,vi.indicator_name,vi.indicator_type,b.fquarter1,b.fquarter2,b.fquarter3,b.fquarter4,b.ftotal  from tbl_annualbudget b inner join view_indicator vi on(vi.indicator_id=b.indicator_id) order by subactivity_code asc; 
//query has issues
create or replace view view_indicator as select ti.indicator_id,ti.physical_target,ti.indicator_name,ti.indicator_type,rc.rc_id,rc.name as resultschain,i.intervention_id,i.intervention,o.output_name,a.activity_name,sa.subact_id,sa.subactivity_code,sa.subactivity_name,s.id as subcomponent_id,s.subcomponent_code,s.subcomponent,cc.component,p.prog_id,p.program_name from tbl_indicator ti inner join tbl_programme p on(p.prog_id=ti.prog_id) inner join tbl_subcomponent s on(ti.subcomponent_id=s.id) inner join tbl_output o on(o.output_id=ti.output_id) inner join tbl_activity a on(a.activity_id=ti.activity_id) inner join tbl_intervention i on(ti.intervention_id=i.intervention_id) inner join tbl_resultschain rc on(ti.rc_id=rc.rc_id) inner join tbl_subactivity sa on(sa.subact_id=ti.subactivity_id) inner join tbl_component cc on(ti.component_id=cc.id) order by program_name asc;  

CREATE OR REPLACE VIEW view_annualtarget as select t.p_id,t.year,t.subactivity_id,t.baseline,t.indicator_id,i.prog_id,i.program_name,i.subcomponent_code,i.subcomponent_id,i.subactivity_name,i.subactivity_code,i.indicator_name,i.indicator_type,t.pquarter1,t.pquarter2,t.pquarter3,t.pquarter4,t.ptotal,plt.target as projectlifetarget from view_indicator i inner join tbl_annualtarget t   on(i.indicator_id=t.indicator_id) inner join tbl_projectlifetargets plt on(plt.indicator_id=i.indicator_id)  order by indicator_id asc; 


 create or replace view view_output as select p.prog_id,s.id as subcomponent_id,s.component_id,o.output_id,o.output_code,o.output_name,s.subcomponent_code,s.subcomponent,c.component,p.program_name,p.funder,o.details from tbl_output o inner join tbl_subcomponent s on(s.id=o.subcomp_id) inner join tbl_component c on(c.prog_id=o.prog_id) inner join tbl_programme p on(p.prog_id=o.prog_id) order by output_code asc;
 



#--------------------------------------------------------------------------------------------------------------------------------



//not yet recreated//-------------


insert into tbl_user(name,username,password,clearpass,role)(select orgName,username,password,clearpass from tbl_organization where username like 'cerudeb%');
insert into tbl_user as select orgName name,username username,password password,clearpass clearpass from tbl_organization;


insert into tbl_user as select orgName,username,password,clearpass from tbl_organization;


INSERT INTO  map_band_group (band_id, group_id)
(SELECT band_id, 103 FROM map_band_group WHERE group_id = 104);

insert into accountstbl(firstCol,secondCol,thirdCol)

values (select customerId
from customerstbl
order by customerId desc
limit 1
, '2nd parameter', '3rd parameter'); 
//insertiuons using a subquery


 insert into tbl_user(name,username,password,clearpass,role)(select orgName,username,password,clearpass,organization_type from view_organization where username like 'cerudeb%');
 
 insert into tbl_user(org_code,name,username,password,clearpass,role)(select org_code,orgName,username,password,clearpass,organization_type from view_organization where username like 'cerudeb%');
 replace into tbl_user(org_code,name,username,password,clearpass,role)(select org_code,orgName,username,password,clearpass,organization_type from view_organization);

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_annualtarget` AS select `t`.`p_id` AS `p_id`,`t`.`subcomponent_id` AS `subcomponent_id`,`t`.`output_id` AS `output_id`,`t`.`activity_id` AS `activity_id`,`t`.`year` AS `year`,`t`.`reporting_period` AS `reporting_period`,`t`.`subactivity_id` AS `subactivity_id`,`t`.`baseline` AS `baseline`,`vi`.`subactivity_code` AS `subactivity_code`,`vi`.`subactivity_name` AS `subactivity_name`,`t`.`indicator_id` AS `indicator_id`,`vi`.`indicator_name` AS `indicator_name`,`vi`.`indicator_type` AS `indicator_type`,`vi`.`subcomponent_code` AS `subcomponent_code`,`vi`.`subcomponent` AS `subcomponent`,`t`.`pquarter1` AS `pquarter1`,`t`.`pquarter2` AS `pquarter2`,`t`.`pquarter3` AS `pquarter3`,`t`.`pquarter4` AS `pquarter4`,`t`.`ptotal` AS `ptotal`,`plt`.`target` AS `projectlifetarget` from ((`tbl_annualtarget` `t` join `view_indicator` `vi` on((`vi`.`indicator_id` = `t`.`indicator_id`))) join `tbl_projectlifetargets` `plt` on((`plt`.`indicator_id` = `vi`.`indicator_id`))) order by `t`.`indicator_id`;


 



select * from tbl_organizationreporting where indicator_id=56211
//ccf


SELECT  t.indicator_id, vi.indicator_name,sum(t.total) as annual,t.year,sum(at.ptotal) as totalannualtarget, plt.target as projectlifetarget FROM `tbl_organizationreporting` t inner join view_indicator vi on(vi.indicator_id=t.indicator_id) inner join tbl_annualtarget at on(at.indicator_id=t.indicator_id) inner join tbl_projectlifetargets plt on(plt.indicator_id=t.indicator_id) group by t.indicator_id,t.year order by indicator_id asc;


//ccf222
SELECT  t.indicator_id, vi.indicator_name,sum(t.total) as annual,t.year, plt.target as projectlifetarget FROM `tbl_organizationreporting` t left join view_indicator vi on(vi.indicator_id=t.indicator_id) left join tbl_projectlifetargets plt on(plt.indicator_id=t.indicator_id) group by t.year order by indicator_id asc;




//////ind
create or replace view view_ccf as select t.indicator_id,i.indicator_name,t.year,t.total  from tbl_organizationreporting t inner join tbl_indicator i on(i.indicator_id=t.indicator_id) where year=2011 and indicator_id=56211;
///sum

create or replace view view_ccf2 as select t.indicator_id,i.indicator_name,t.year,sum(t.total) as totalannual from tbl_organizationreporting t inner join tbl_indicator i on(i.indicator_id=t.indicator_id) group by i.indicator_name,t.year asc;




mysql> create or replace view view_ccf3 as select t.indicator_id,i.indicator_name,t.year,sum(t.total) as totalannual from tbl_orga
nizationreporting t inner join tbl_indicator i on(i.indicator_id=t.indicator_id) group by i.indicator_id asc;
Query OK, 0 rows affected (0.00 sec)
//not yet modified
mysql> create or replace view view_ccf4 as select t.indicator_id,i.indicator_name,sum(t.total) as totalannual, plt.period,plt.target as projectlifetarget, round(avg(IFNULL(sum(t.total),0)/IFNULL(plt.target,0))*100,0) as percentageAchieved from tbl_organizationreporting t inner join tbl_indicator i on(i.indicator_id=t.indicator_id) inner join tbl_projectlifetargets plt on(plt.indicator_id=t.indicator_id) group by indicator_id order by indicator_name asc;


mysql> create or replace view view_ccf5 as select c.indicator_id,c.indicator_name,c.year,c.totalannual, c.projectlifetarget,
 round(avg(IFNULL(c.totalannual,0)/IFNULL(c.projectlifetarget,0))*100,0) as percentageAchieved from view_ccf4 c inner join group by indicator_id order by indicator_name asc;



create or replace view view_ccf6 as select t.indicator_id,i.indicator_name,t.year,sum(t.total) as totalannual,at.ptotal from tbl_organizationreporting t inner join tbl_indicator i on(i.indicator_id=t.indicator_id) inner join tbl_annualtarget at on(i.indicator_id=at.indicator_id) group by i.indicator_name,t.year asc;

select a.p_id,a.year,a.indicator_id,i.indicator_name,a.baseline,a.ptotal from tbl_annualtarget a inner join tbl_indicator i on(i.indicator_id=a.indicator_id) order by indicator_id asc;



create or replace view view_atccf as select a.p_id,a.year,a.indicator_id,i.indicator_name,a.baseline,a.ptotal from tbl_annualtarget a inner join tbl_indicator i
 on(i.indicator_id=a.indicator_id) order by indicator_id asc;

//modified ccf to to work with commulative annual targets

create or replace view view_ccf4_final as select t.indicator_id,i.indicator_name,sum(at.ptotal) as totalannualtarget,sum(t.total) as totalannualactual, plt.period,plt.target as projectlifetarget from tbl_organizationreporting t inner join tbl_indicator i on(i.indicator_id=t.indicator_id) inner join tbl_projectlifetargets plt on(plt.indicator_id=t.indicator_id) inner join tbl_annualtarget at  on(i.indicator_id=at.indicator_id)  group by indicator_name order by indicator_name asc;



//cumulative targets for 4 years

select at.indicator_id,i.indicator_name,sum(at.ptotal) as totalcummulativetarget,sum(tr.total) as totalcummulativeactual, plt.period,plt.target as projectlifetarget from tbl_annualtarget at inner join tbl_indicator i on(i.indicator_id=at.indicator_id)inner join tbl_organizationreporting tr on(tr.indicator_id=at.indicator_id) inner join tbl_projectlifetargets plt on(plt.indicator_id=at.indicator_id) group by indicator_name order by indicator_id asc;
//ccf working annula targets also fine
mysql> select at.indicator_id,i.indicator_name,sum(at.ptotal) as totalannualtarget, plt.period,plt.target as projectlifetarget from tbl_annualtarget at inner join tbl_indicator i on(i.indicator_id=at.indicator_id) inner join tbl_projectlifetargets plt on(plt.indicator_id=at.indicator_id) group by indicator_name order by indicator_id asc;
 //final cummulative actuals 0855hrs 23022011
 mysql> select tr.indicator_id,i.indicator_name,at.totalcummulativetarget,sum(tr.total) as totalcummulativeactual,plt.period,plt.target as projectlifetarget from tbl_organizationreporting  tr inner join tbl_indicator i on(tr.indicator_id=i.indicator_id) inner join tbl_projectlifetargets plt on(tr.indicator_id=plt.indicator_id) inner join view_ccfannualtarget at on(tr.indicator_id=at.indicator_id)  group by indicator_id order by indicator_id asc;

SELECT * FROM `tbl_organizationreporting` WHERE CONCAT_WS( "-", `org_code` , `year` , `reportingPeriod` , `indicator_id` ) = "5-2011-jan - mar 2011-24" ORDER BY `org_code` , `year`,`reportingPeriod` , `indicator_id`;

//new branches

mysql>create or replace view view_ccf10 as select i.indicator_id,i.indicator_name,r.year,sum(r.total) as totalannualactual from tbl_organizationreporting r inner join tbl_indicator i on(i.indicator_id=r.indicator_id) group by indicator_name,year;

select year,indicator_id,baseline,pquarter1,pquarter2,pquarter3,pquarter4,ptotal from 

//quRTERRY REPORTING

select indicator_id,indicator_name,year,reportingperiod,total from view_organizationreporting where reportingperiod in(select reportingperiod from tbl_organizationreporting) order by indicator_id asc;

select indicator_id,indicator_name,year,reportingperiod as q1yr1 ,total from view_organizationreporting where reportingperiod like 'Jan - Mar 2010%';
select indicator_id,indicator_name,year,reportingperiod as q1yr2 ,total from tbl_organizationreporting where reportingperiod like 'Apr - Jun 2010%';
select indicator_id,indicator_name,year,reportingperiod as q1yr3 ,total from tbl_organizationreporting where reportingperiod like 'Jul - Sep 2010%';
select indicator_id,indicator_name,year,reportingperiod as q1yr4 ,total from tbl_organizationreporting where reportingperiod like 'Oct - Dec 2010%';
//crossttab quarter 
select r.indicator_id,i.indicator_name,r.year,count(r.total) reportingperiod as q1yr1 ,total from tbl_organizationreporting r inner join tbl_indicator i on(i.indicator_id=r.indicator_id) group by oorder by;



 create or replace view view_quarterlyactuals as select indicator_id,count(total) counted_rows,sum(if((reportingperiod='Jan - Mar 2010'),total,'')) as q1yr1,sum(if((reportingperiod='Apr - Jun 2010'),total,'')) as q2yr1,sum(if((reportingperiod='Jul - Sep 2010'),total,'')) as q3yr1,sum(if((reportingperiod='Oct - Dec 2010'),total,'')) as q4yr1,sum(if((reportingperiod='Jan - Mar 2011'),total,'')) as q1yr2,sum(if((reportingperiod='Apr - Jun 2011'),total,'')) as q2yr2,sum(if((reportingperiod='Jul - Sep 2011'),total,'')) as q3yr2,sum(if((reportingperiod='Oct - Dec 2011'),total,'')) as q4yr2,sum(if((reportingperiod='Jan - Mar 2012'),total,'')) as q1yr3,sum(if((reportingperiod='Apr - Jun 2012'),total,'')) as q2yr3,sum(if((reportingperiod='Jul - Sep 2012'),total,'')) as q3yr3,sum(if((reportingperiod='Oct - Dec 2012'),total,'')) as q4yr3,sum(if((reportingperiod='Jan - Mar 2013'),total,'')) as q1yr4,sum(if((reportingperiod='Apr - Jun 2013'),total,'')) as q2yr4,sum(if((reportingperiod='Jul - Sep 2013'),total,'')) as q3yr4,sum(if((reportingperiod='Oct - Dec 2013'),total,'')) as q4yr4 from tbl_organizationreporting  group by indicator_id asc;



//annual summary
select indicator_id,year as yr1,sum(total)  from tbl_organizationreporting where year='2010' group  bY year,indicator_id order by indicator_id asc;
select indicator_id,year as yr2,sum(total)  from tbl_organizationreporting where year='2011' group  bY year,indicator_id order by indicator_id asc;
select indicator_id,year as yr3,sum(total)  from tbl_organizationreporting where year='2012' group  bY year,indicator_id order by indicator_id asc;
select indicator_id,year as yr4,sum(total)  from tbl_organizationreporting where year='2013' group  bY year,indicator_id order by indicator_id asc;


//crosstab annual summary actuals

create or replace view view_annualactuals as select r.indicator_id,i.indicator_name,count(r.total) as counted_rows,sum(if((r.year='2010'),r.total,'')) as year1,sum(if((r.year='2011'),r.total,'')) as year2,sum(if((r.year='2012'),r.total,'')) as year3,sum(if((year='2013'),r.total,'')) as year4 from tbl_organizationreporting r inner join tbl_indicator i on(i.indicator_id=r.indicator_id)  group  bY indicator_id order by indicator_id asc;

select indicator_id,count(total) as counted_rows,sum(if((`year`='2010'),`total`,'')) as `year1` from tbl_organizationreporting group  bY year,indicator_id order by indicator_id asc;

//quarterly targets //where indicator_id='56211'
create or replace view view_projectlifequarterlytargets as select indicator_id,sum(if((year='2010'),pquarter1,'')) as yr1q1t,sum(if((year='2010'),pquarter2,'')) as yr1q2t,sum(if((year='2010'),pquarter3,'')) as yr1q3t,sum(if((year='2010'),pquarter4,'')) as yr1q4t,count(ptotal) as counted_rows, sum(if((year='2010'),ptotal,'')) as year1totalquartelytargets,sum(if((year='2011'),pquarter1,'')) as yr2q1t,sum(if((year='2011'),pquarter2,'')) as yr2q2t,sum(if((year='2011'),pquarter3,'')) as yr2q3t,sum(if((year='2011'),pquarter4,'')) as yr2q4t, sum(if((year='2011'),ptotal,'')) as year2totalquartelytargets,
sum(if((year='2012'),pquarter1,'')) as yr3q1t,sum(if((year='2012'),pquarter2,'')) as yr3q2t,sum(if((year='2012'),pquarter3,'')) as yr3q3t,sum(if((year='2012'),pquarter4,'')) as yr3q4t,sum(if((year='2012'),ptotal,'')) as year3totalquartelytargets,
sum(if((year='2013'),pquarter1,'')) as yr4q1t,sum(if((year='2013'),pquarter2,'')) as yr4q2t,sum(if((year='2013'),pquarter3,'')) as yr4q3t,sum(if((year='2013'),pquarter4,'')) as yr4q4t,sum(if((year='2013'),ptotal,'')) as year4totalquartelytargets from tbl_annualtarget  group by indicator_id order by indicator_id asc;
//annual targets yearly

//

create or replace view view_quarterytargets_actuals as select
qa.indicator_id,
i.indicator_name,
qa.counted_rows,
qa.q1yr1,
qa.q2yr1,
qa.q3yr1,
qa.q4yr1,
qa.q1yr2,
qa.q2yr2,
qa.q3yr2,
qa.q4yr2,
qa.q1yr3,
qa.q2yr3,
qa.q3yr3,
qa.q4yr3,
qa.q1yr4,
qa.q2yr4,
qa.q3yr4,
qa.q4yr4,
 t.yr1q1t,
 t.yr1q2t,
 t.yr1q3t,
 t.yr1q4t,

 t.year1totalquartelytargets,
 t.yr2q1t,
 t.yr2q2t,
 t.yr2q3t,
 t.yr2q4t,
 t.year2totalquartelytargets,
 t.yr3q1t,
 t.yr3q2t,
 t.yr3q3t,
 t.yr3q4t,
 t.year3totalquartelytargets,
 t.yr4q1t,
 t.yr4q2t,
 yr4q3t,
 t.yr4q4t,
 t.year4totalquartelytargets from view_quarterlyactuals qa inner join view_projectlifequarterlytargets t  on(t.indicator_id=qa.indicator_id) inner join tbl_indicator i on(qa.indicator_id=i.indicator_id) group by indicator_id order by indicator_name asc;



create or replace view view_dashbordIndicators as select i.indicator_id,i.indicator_name,plt.target as projectlifetarget,sum(tr.total) as projectlifeactual,round(IFNULL(sum(tr.total),0)/IFNULL(plt.target,0)*100,0) as count from tbl_organizationreporting  tr inner join tbl_indicator i on(tr.indicator_id=i.indicator_id) inner join tbl_projectlifetargets plt on(tr.indicator_id=plt.indicator_id) inner join view_ccfannualtarget at on(tr.indicator_id=at.indicator_id) where i.indicator_id='".$indicator_id."' group by i.indicator_id order by i.indicator_id asc;
//////

select i.indicator_id,i.rc_id,i.physical_target,i.indicator_type,i.abitrust_category,i.indicator_name from tbl_indicator i  WHERE lower(indicator_type) like 'abi trust%' && indicator_name <> ''order by  i.indicator_id asc
#;;;;;;;;;;;;;;;;;;;

drop trigger if exists parish_delete;  
CREATE TRIGGER parish_delete
before delete ON tblparish FOR EACH ROW
BEGIN
	INSERT into parish_log(user_id, description)
        VALUES (user(), CONCAT('Record deleted ',old.SubcountyCode
,' 
               ',old.ParishCode
,' ',old.ParishName));
   insert into tbl_parish_backup values(old.SubcountyCode
,old.ParishCode
,old.ParishName);
END$$
delimiter ;

 #update trigger
delimiter $$
 drop trigger if exists programme_update;  
CREATE TRIGGER programme_update
before update ON tbl_programme FOR EACH ROW
BEGIN

	INSERT into programme_log(user_id, description)
        VALUES (user(),CONCAT('Record updated ',old.prog_id,'',old.program_name));
   insert into tbl_programme_logbefore(user_id,prog_id,program_name) values(user(),old.prog_id
,old.program_name);
END$$
delimiter ; 
 

#update trigger after update
 delimiter $$
 drop trigger if exists tri_programme_updateafter;  
CREATE TRIGGER tri_programme_updateafter
after update ON tbl_programme FOR EACH ROW
BEGIN

	INSERT into programme_log(user_id,description)
        VALUES (user(),CONCAT('Record updated ',new.prog_id,'',new.program_name));
			   
			   
			   
   insert into tbl_programme_logafter(user_id,prog_id,program_name) values(user(),new.prog_id
,new.program_name);
END$$
delimiter ; /*/* */
 



 */

//select case when!

select
CASE month when "01" then "January"
when "02" then "February"
when "03" then "March"
when "04" then "April"
when "05" then "May"
when "06" then "June"
when "07" then "July"
when "08" then "August"
when "09" then "September"
when "10" then "October"
when "11" then "November"
when "12" then "December"
END
from calendar where year = "2005" order by month 



$select="create or replace view view_quarterlyactualsoneyr as select indicator_id,year, count(total) as counted_rows,sum(if((reportingperiod='Jan - Mar 2010'),total,'')) as q1,sum(if((reportingperiod='Apr - Jun 2010'),total,'')) as q2,sum(if((reportingperiod='Jul - Sep 2010'),total,'')) as q3,sum(if((reportingperiod='Oct - Dec 2010'),total,'')) as q4 from tbl_organizationreporting  group by indicator_id asc";

//////
$sel="create or replace view view_projectlifequarterlytargets as select indicator_id,sum(if((year='2010'),pquarter1,'')) as yr1q1t,sum(if((year='2010'),pquarter2,'')) as yr1q2t,sum(if((year='2010'),pquarter3,'')) as yr1q3t,sum(if((year='2010'),pquarter4,'')) as yr1q4t,count(ptotal) as counted_rows, sum(if((year='2010'),ptotal,'')) as totalquartelytargets from tbl_annualtarget  group by indicator_id order by indicator_id asc;


///


/**/
//cross tab example
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





/*
mysql> rename table tbldistricts to tbl_district;
mysql> show triggers;
mysql> select TRIGGER_NAME from INFORMATION_SCHEMA.TRIGGERS;
SELECT COUNT(distinct(fundername)) from view_resourcetracking;
select count(distinct(orgname)) from view_ovc;
select count(distinct(orgname)) from view_services;
 select count(distinct(orgname)) from view_org where lower(orglegallyregistered) like'yes%';
mysql> SELECT COUNT(distinct(orgName)) from view_hivaids_interventions;
mysql> SELECT COUNT(distinct(fundername)) from view_resourcetracking;
#25-10-2010 */
//create table tbl_login(login_id bigint(20) not null primary key auto_increment,user_id int(11),username varchar(100),role varchar(50),district varchar(50),`time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP);
//create table tbl_parish_backup(SubcountyCode bigint(20),parishCode bigint(20),parishName varchar(100));
//create table parish_log( user_id INT(11) NOT NULL, description VARCHAR(500),dateandtime timestamp);

/* delimiter $$
drop trigger if exists parish_delete;  
CREATE TRIGGER parish_delete
before delete ON tblparish FOR EACH ROW
BEGIN
	INSERT into parish_log(user_id, description)
        VALUES (user(), CONCAT('Record deleted ',old.SubcountyCode
,' 
               ',old.ParishCode
,' ',old.ParishName));
   insert into tbl_parish_backup values(old.SubcountyCode
,old.ParishCode
,old.ParishName);
END$$
delimiter ;
 */
 #update trigger
 /*delimiter $$
 drop trigger if exists parish_update;  
CREATE TRIGGER parish_update
after update ON tblparish FOR EACH ROW
BEGIN

	INSERT into parish_log(user_id, description)
        VALUES (user(),CONCAT('Record updated ',old.SubcountyCode
,' 
               ',old.ParishCode
,' ',old.ParishName));
   insert into tbl_parish_backup values(old.SubcountyCode
,old.ParishCode
,old.ParishName);
END$$
delimiter ; */
 
 //replace into table_name (x,y) values(x,x);
 
 */
 
 
 
 ?>
select plt.indicator_id,plt.target,at. from tbl_projectlifetarget,