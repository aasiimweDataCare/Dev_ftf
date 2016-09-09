<script type="text/javascript">
        //when the webpage has loaded do this
        $(document).ready(function() {  
            //if the value within the dropdown box has changed then run this code            
            $('#num_cat').change(function(){
                //get the number of fields required from the dropdown box
                var num = $('#num_cat').val();                  

                var i = 0; //integer variable for 'for' loop
                var html = ''; //string variable for html code for fields 
                //loop through to add the number of fields specified
                for (i=1;i<=num;i++) {
                    //concatinate number of fields to a variable
                    html += 'Category ' + i + ': <input type="text" name="category-' + i + '"/><br/>'; 
                }

                //insert this html code into the div with id catList
                $('#catList').html(html);
            });
        }); 
    </script>