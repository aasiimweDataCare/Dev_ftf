// JavaScript Document

 function selectAll(){
t=document.forms[0].length;
for(i=0; i<t; i++) document.forms[0][i].checked=document.forms[0][0].checked;
}
/* 
function selectAll(obj) {
var checkBoxes = document.getElementsByTagName('input');
for (i = 0; i < checkBoxes.length; i++) {
if (obj.checked == true) {
checkBoxes[i].checked = true; // this checks all the boxes
} else {
checkBoxes[i].checked = false; // this unchecks all the boxes
}
}
}*/



function multiCheckBox(state){
//alert('you have clicked me!');
container = xajax.$('bodyDisplay');


if (container.hasChildNodes())

    {

        checkboxes = container.getElementsByTagName('input');

        for(i=0;i<checkboxes.length;i++)

            {

            checkboxes[i].checked = state;

            }

    }

}
