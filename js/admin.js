$("#checkAll").click(function () {
    $(".check").prop('checked', $(this).prop('checked'));
});	
function AcceptAll(action){
	let a = document.getElementsByName('num[]');
	let msg = document.getElementById('msg');
	msg.style.display = "block";
	let b = a.length;
	var checkedIds = [];
	for(var j=0;j<b;j++){
		if(a[j].type === "checkbox" && a[j].checked===true){
			checkedIds.push(a[j].value);
		}
	}
	if(checkedIds.length > 0){
		updateStatusAll(checkedIds,action);
	} else {
		alert("Please select ids and then click on action.");
	}
}
function fd(){
        var a =  "" + se.value + ""; 
        var b = new RegExp(a,"i");
        var n = document.getElementsByClassName('search');
        //console.log(n[0].innerHTML)
        for(var i =0;i<n.length;i++){
            var t = n[i].innerHTML.match(b);
            if(t!==null){
                n[i].parentElement.style.display = "";
            }
            else{
                n[i].parentElement.style.display = "none";
				//console.log(n[i].parentElement);
            }
        }
    }
	function getDetails(id){
		console.log(id);
	}