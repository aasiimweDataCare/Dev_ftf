
	function sumComputable(){
		// console.log($("#summations").length);
		// console.log($("#summations input.computable").length);
	$("#summations input.computable").on("keyup", function(){
		console.log("Here:");
		computeRowTotal(this);
	});
	}

	function computeRowTotal(caller)
	{
		var row=$(caller).closest("tr");
		
		var total=0;
		
		row.find("input.computable").each(function(i,d){
			total+=getInputNumericValue(d);
		});
		
		row.find(".computable-result").val(total);
	}

	function getInputNumericValue(input)
	{
		var value=$(input).val();
		
		if(isNaN(value))
		{
			value=0;
		}
		
		return value*1;
	}

	