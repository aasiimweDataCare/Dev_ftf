<?php

class SetupQueryManager{
 var $query;
 var $role;
 
 	

 
							function SetupQueryManager($query)
							{
							$this->query;
							}

				function  view_subcomponent($subcomponentCode,$subcomponent){
				
				
				$select="select * from tbl_subcomponent 
						where lower(subcomponent_code) like '".strtolower($subcomponentCode)."%' 
						&& lower(subcomponent) like '".strtolower($subcomponent)."%' 
						order by subcomponent_code asc";
				
				/* && lower(component) like '".strtolower($_SESSION['scomponent'])."%' 
					&& lower(program_name) like '".strtolower($_SESSION['sprogramme'])."%'  */
				
				return $select;
				}
				
				
				}

?>