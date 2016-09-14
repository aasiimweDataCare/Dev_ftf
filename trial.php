switch(trim($cpma_year)){

			case trim('Project start up'):
			$reportingYearToPeriod="and `p`.`reportingPeriod` in ('Apr - Sep') 
			and `p`.`year` in (2013)";
			break;

			case trim('CPMA Year One'):
			$reportingYearToPeriod="and `p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep')
			and `p`.`reportingMonth` between ('2013-10-01') and ('2014-09-30') 
			and `p`.`year` in (2013,2014)";
			break;
			
			case trim('CPMA Year Two'):
			$reportingYearToPeriod="and `p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `p`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
			and `p`.`year` in (2014,2015)";
			break;
			
			case trim('CPMA Year Three'):
			$reportingYearToPeriod="and `p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `p`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
			and `p`.`DateSubmission` between ('2015-10-01') and ('2016-09-30')
			and `p`.`year` in (2015,2016)";
			break;
			
			case trim('CPMA Year Four'):
			$reportingYearToPeriod="and `p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `p`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
			and `p`.`DateSubmission` between ('2016-10-01') and ('2017-09-30')
			and `p`.`year` in (2016,2017)";
			break;
			
			case trim('CPMA Year Five(Activity close out)'):
			$reportingYearToPeriod="and `p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `p`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
			and `p`.`year` in (2017,2018)";
			break;
			
			default:
			break;
		}
		
		switch(trim($reporting_period)){
			case trim('Project start up'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Apr - Sep' 
			and `p`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
			and `p`.`year` in (2013)
			";
			break;
			
			case trim('Oct 2013 - Mar 2014'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Oct - Mar' 
			and `p`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
			and `p`.`year` in (2013,2014)
			";
			break;
			
			case trim('Apr 2014 - Sep 2014'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Apr - Sep' 
			and `p`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
			and `p`.`year` in (2014)
			";
			break;
			
			case trim('Oct 2014 - Mar 2015'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Oct - Mar' 
			and `p`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
			and `p`.`year` in (2014,2015)
			";
			break;
			
			case trim('Apr 2015 - Sep 2015'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Apr - Sep' 
			and `p`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
			and `p`.`year` in (2015)
			";
			break;
			
			case trim('Oct 2015 - Mar 2016'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Oct - Mar' 
			and `p`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
			and `p`.`year` in (2015,2016)
			";
			break;
			
			case trim('Apr 2016 - Sep 2016'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Apr - Sep' 
			and `p`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
			and `p`.`year` in (2016)
			";
			break;
			
			case trim('Oct 2016 - Mar 2017'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Oct - Mar' 
			and `p`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
			and `p`.`year` in (2016,2017)
			";
			break;
			
			case trim('Apr 2017 - Sep 2017'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Apr - Sep' 
			and `p`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
			and `p`.`year` in (2017)
			";
			break;
			
			case trim('Oct 2017 – Mar 2018'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Oct - Mar' 
			and `p`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
			and `p`.`year` in (2017,2018)
			";
			break;
			
			case trim('Apr 2018 – May 2018'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Apr - Sep' 
			and `p`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
			and `p`.`year` in (2018)
			";
			break;
			
			default:
			break;
		}
		
		$query_string="select  `p`.*,
		case
		when `p`.`reportingPeriod` = 'Apr - Sep' 
		and `p`.`reportingMonth` 
		between ('2013-04-01') and ('2013-09-30') 
		and `p`.`year` in (2013) 
		then 'Apr 2012 - Sep 2013'
		
		when `p`.`reportingPeriod` = 'Oct - Mar' 
		and `p`.`reportingMonth` 
		between ('2013-10-01') and ('2014-03-31') 
		and `p`.`year` in (2013,2014) 
		then 'Oct 2013 - Mar 2014'

		when `p`.`reportingPeriod` = 'Apr - Sep' 
		and `p`.`reportingMonth` 
		between ('2014-04-01') and ('2014-09-30') 
		and `p`.`year` in (2014) 
		then 'Apr 2014 - Sep 2014'

		when `p`.`reportingPeriod` = 'Oct - Mar' 
		and `p`.`reportingMonth` 
		between ('2014-10-01') and ('2015-03-31') 
		and `p`.`year` in (2014,2015) 
		then 'Oct 2014 - Mar 2015'

		when `p`.`reportingPeriod` = 'Apr - Sep' 
		and `p`.`reportingMonth` 
		between ('2015-04-01') and ('2015-09-30') 
		and `p`.`year` in (2015) 
		then 'Apr 2015 - Sep 2015'

		when `p`.`reportingPeriod` = 'Oct - Mar' 
		and `p`.`reportingMonth` 
		between ('2015-10-01') and ('2016-03-31') 
		and `p`.`year` in (2015,2016) 
		then 'Oct 2015 - Mar 2016'

		when `p`.`reportingPeriod` = 'Apr - Sep' 
		and `p`.`reportingMonth` 
		between ('2016-04-01') and ('2016-09-30') 
		and `p`.`year` in (2016) 
		then 'Apr 2016 - Sep 2016'

		when `p`.`reportingPeriod` = 'Oct - Mar' 
		and `p`.`reportingMonth` 
		between ('2016-10-01') and ('2017-03-31') 
		and `p`.`year` in (2016,2017) 
		then 'Oct 2016 - Mar 2017'

		when `p`.`reportingPeriod` = 'Apr - Sep' 
		and `p`.`reportingMonth` 
		between ('2017-04-01') and ('2017-09-30') 
		and `p`.`year` in (2017) 
		then 'Apr 2017 - Sep 2017'

		when `p`.`reportingPeriod` = 'Oct - Mar' 
		and `p`.`reportingMonth` 
		between ('2017-10-01') and ('2018-03-31') 
		and `p`.`year` in (2017,2018) 
		then 'Oct 2017 - Mar 2018'

		when `p`.`reportingPeriod` = 'Apr - Sep' 
		and `p`.`reportingMonth` 
		between ('2018-04-01') and ('2018-09-30') 
		and `p`.`year` in (2018) 
		then 'Apr 2018 - May 2018'
		
	else `p`.`reportingPeriod`
	end 
	as  `reportingPeriod_cleaned`