
   			
   			var count = 1;
   			var nRows = 2;
			
			function addRow2(tableId,templateId) {
				//var template=$("#template-div").html();
				var template=$((templateId==null?"#template-div":"#"+templateId)).html();
				//alert(template);
				$((tableId==null?"#theBody":"#"+tableId)).append(template);
				renameRowElements(tableId);
			}
			
			function removeRow2(Caller,tableId)
			{
				$(Caller).closest('tr').remove();
				renameRowElements(tableId);
			}
			
			//Adding member rows
			function addMember(caller,rowClass)
			{
				$(caller).closest('tr').before("<tr class='"+rowClass+"'>"+$('#template_household tr.member').html()+"</tr>");
				recomputeHouseholdRowspan($(caller).closest("tbody"));
			}
			
			//Adding Household rows
			function addHousehold()
			{
				$('#tbl_household').append($('#template_household').html());
				renameHouseholdControls();
			}
			
			//Removing member rows
			function removeMember(caller)
			{
			var tbody=$(caller).closest('tbody');
			$(caller).closest('tr').remove();
			recomputeHouseholdRowspan(tbody);
			}
			
			function recomputeHouseholdRowspan(tbody)
			{
				
			var currentRows=tbody.find('tr').length;
			tbody.find('tr:first-of-type td').each(function(i,d){
				$(d).attr("rowspan",currentRows);
			});
			renameHouseholdControls();
			}
			
			
			
			//Removing household rows
			function removeHousehold(caller)
			{
			$(caller).closest('tbody').remove();
			renameHouseholdControls();
			}
			
			
			
			function renamelsTech(){
			$('#numberOfTechs').val($('tbody.lsTech').length);
			 var currentMembercount=1;
			 
			 $('tbody.lsTech').each(function(i,d){
				 var lsTechNumber=i+1;
				 $(d).find(".ls_tech_Index").text(lsTechNumber);
				 var fields=["childStart","childStop","tbl_laboursavingtechId","labourSavingTech","valueChain","CompiledBy",
				 "reportingPeriod","labourSavingConcept",
				 "personResponsible","amountInvestedOnTechInvestment"];
				 for(var fieldIndex in fields)
				 {
					 var field=fields[fieldIndex];
					$(d).find("input[name^='"+field+"'],select[name^='"+field+"']").attr("id",field+lsTechNumber);
				 }
				 
				 $("#childStart"+lsTechNumber).val(currentMembercount);
				 
				 $(d).find("tr.member").each(function(j,g){
					 fields=["nameOfJobHolder","sexOfJobHolder","dateOfEngagement","timeSpentOnJob"];
					 for(var fieldIndex in fields)
					 {
						 var field=fields[fieldIndex];
						$(g).find("input[name^='"+field+"'],select[name^='"+field+"']").attr("id",field+currentMembercount)
						.attr("name",field+currentMembercount);
						
						
						
					 }
					 
					 currentMembercount++;
				 });
				 
				 $("#childStop"+lsTechNumber).val(currentMembercount-1);
			 });

			
			}
			
			
			function renameHouseholdControls(){
			$('#numberOfHouseholds').val($('#tbl_household tbody.household').length);
			 var currentMembercount=1;
			 
			 $('#tbl_household tbody.household').each(function(i,d){
				 var householdNumber=i+1;
				 $(d).find(".hsIndex").text(householdNumber);
				 var fields=["childStart","childStop","hhName","hhDob","hhSex","hhHeadDStart","hhArea","hsComposition"];
				 for(var fieldIndex in fields)
				 {
					 var field=fields[fieldIndex];
					$(d).find("input[name^='"+field+"'],select[name^='"+field+"']").attr("id",field+householdNumber)
					.attr("name",(field=="hsComposition"?field+householdNumber:field)+"[]");
				 }
				 
				 $("#childStart"+householdNumber).val(currentMembercount);
				 
				 $(d).find("tr.member").each(function(j,g){
					 $(g).find(".memberIndex").text(j+1);
					 fields=["tbl_farmersId","nameIndividual","farmerCrop","memberDstart","farmersDob","myGroupDistrict","farmerSubcounty","farmerVillage",
					 "sexIndividual","telIndividual"];
					 for(var fieldIndex in fields)
					 {
						 var field=fields[fieldIndex];
						$(g).find("input[name^='"+field+"'],select[name^='"+field+"']").attr("id",field+currentMembercount)
						.attr("name",field+currentMembercount);
						
						$(g).find("input[type='checkbox'][name^='"+field+"']").attr("id",field+currentMembercount)
						.attr("name",(field=="farmerCrop"?field+currentMembercount:field)+"[]");
						
					 }
					 
					 currentMembercount++;
				 });
				 
				 $("#childStop"+householdNumber).val(currentMembercount-1);
			 });

			
			}
			
			
			
			function renameRowElements(tableId) {
				var rowCount=0;
				//$("#theBody tr.evenrow").each(function()
				$((tableId==null?"#theBody":"#"+tableId)+" tr.evenrow").each(function()			      
							      {
					rowCount++;
					if (rowCount>1) {
						$(this).find("td").eq(0).text(rowCount);
						
						$(this).find("input[name^='typeOfActorServiced']").each(function(){
							$(this).attr("name","typeOfActorServiced[]");
							});
						
						
						$(this).find("input[name^='typeOfMedia']").each(function(){
							$(this).attr("name","typeOfMedia[]");
							});
						
						
						$(this).find("input[name^='coverage']").each(function(){
							$(this).attr("name","coverage[]");
							});
						
						$(this).find("input[name^='hsComposition']").each(function(){
							$(this).attr("name","hsComposition[]");
							});
						
						
						
						$(this).find("select,textarea,input").each(function(){
							var id=$(this).attr("name");
							if(id.indexOf("[")>0)
							{
								id=id.substring(0,id.indexOf("["));
							}
							id+=rowCount;
							$(this).attr("id",id);
							});
						
						$(this).find("input[name^='typeOfActorServiced']").each(function(){
							$(this).attr("name","typeOfActorServiced"+(rowCount)+"[]");
							});
						
						
						$(this).find("input[name^='typeOfMedia']").each(function(){
							$(this).attr("name","typeOfMedia"+(rowCount)+"[]");
							});
						
						$(this).find("input[name^='coverage']").each(function(){
							$(this).attr("name","coverage"+(rowCount)+"[]");
							});
							
						$(this).find("input[name^='hsComposition']").each(function(){
							$(this).attr("name","hsComposition"+(rowCount)+"[]");
							});
							
						
					}
					});
			}
			
			function getElementWithNameLike(Caller,ElementName)
			{
				
				return $(Caller).closest("tr").find("input[name^='"+ElementName+"'],select[name^='"+ElementName+"'],textarea[name^='"+ElementName+"']").eq(0);
			}
   			
 