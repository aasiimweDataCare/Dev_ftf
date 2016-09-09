
			
			//Adding member rows
			function addLevelTwoDisagreggation(caller,rowClass)
			{
				$(caller).closest('tr').before("<tr class='"+rowClass+"'>"+$('#template_mainDisagreggations tr.member').html()+"</tr>");
				recomputemainDisagreggationsRowspan($(caller).closest("tbody"));
			}
			
			//Adding mainDisagreggations rows
			function addMainDisagreggation()
			{
				$('#tbl_mainDisagreggations').append($('#template_mainDisagreggations').html());
				renamemainDisagreggationsControls();
			}
			
			//Removing member rows
			function removeLevelTwoDisagreggation(caller)
			{
			var tbody=$(caller).closest('tbody');
			$(caller).closest('tr').remove();
			recomputemainDisagreggationsRowspan(tbody);
			}
			
			function recomputemainDisagreggationsRowspan(tbody)
			{
				
			var currentRows=tbody.find('tr').length;
			tbody.find('tr:first-of-type td').each(function(i,d){
				$(d).attr("rowspan",currentRows);
			});
			renamemainDisagreggationsControls();
			}
			
			
			
			//Removing mainDisagreggations rows
			function removeMainDisagreggation(caller)
			{
			$(caller).closest('tbody').remove();
			renamemainDisagreggationsControls();
			}
			
			
			
			function renamemainDisagreggationsControls(){
			$('#numberOfMainDisagreggations').val($('#tbl_mainDisagreggations tbody.mainDisagreggations').length);
			 var currentMembercount=1;
			 
			 $('#tbl_mainDisagreggations tbody.mainDisagreggations').each(function(i,d){
				 var mainDisagreggationsNumber=i+1;
				 $(d).find(".disagIndex").text(mainDisagreggationsNumber);
				 var fields=["childStart","childStop","mDisagg","mBaseYear","mBaseValue"];
				 for(var fieldIndex in fields)
				 {
					 var field=fields[fieldIndex];
					$(d).find("input[name^='"+field+"'],select[name^='"+field+"']").attr("id",field+mainDisagreggationsNumber)
					.attr("name",(field=="hsComposition"?field+mainDisagreggationsNumber:field)+"[]");
				 }
				 
				 $("#childStart"+mainDisagreggationsNumber).val(currentMembercount);
				 
				 $(d).find("tr.member").each(function(j,g){
					 $(g).find(".memberIndex").text(j+1);
					 fields=["lTwoDisag","lTwoBaseYear","lTwoBaseValue"];
					 for(var fieldIndex in fields)
					 {
						 var field=fields[fieldIndex];
						$(g).find("input[name^='"+field+"'],select[name^='"+field+"']").attr("id",field+currentMembercount)
						.attr("name",field+currentMembercount);
					 }
					 
					 currentMembercount++;
				 });
				 
				 $("#childStop"+mainDisagreggationsNumber).val(currentMembercount-1);
			 });

			
			}
			
			
			
			