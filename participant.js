function updateStatusAll(id, action) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
			console.log(id)
			for(var i=0;i<id.length;i++){
				document.getElementById('table_'+id[i]).style.display="none";
		}
      } 
    };
    xmlhttp.open("GET", "../Controller/participant_controller.php?id=" + id + "&action="+action, true);
    xmlhttp.send();
}