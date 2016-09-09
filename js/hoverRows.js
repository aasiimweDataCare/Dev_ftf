function shadeBgOnCheck() {
	//console.log('Here with the code');
    //Add the style: 'even_row' for even rows
    $('.hoverTable tr.alternating_rows:even').addClass('white1');
	$('.hoverTable tr.alternating_rows:odd').addClass('evenrow');
	

    $("#check_all").change(function () {
       $('.hoverTable input:checkbox').prop('checked', this.checked);
       $('.hoverTable tr.alternating_rows').toggleClass("selected_row", this.checked)
    });

    $('.hoverTable :checkbox').change(function (event) {
        $(this).closest('tr').toggleClass("selected_row", this.checked);
    });
    $('.hoverTable tr.alternating_rows').click(function(event) {
					if (event.target.type !== 'checkbox') {
						$(':checkbox', this).trigger('click');
					}
					$("input[type='checkbox']").not('#check_all').change(function(e) {
						if($(this).is(":checked")){
							$(this).closest('tr').addClass("selected_row");
						}else{
							$(this).closest('tr').removeClass("selected_row");
						}
					});
				});
    
}

