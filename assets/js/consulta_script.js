function openPopup(obj){
	var data = $(obj).serialize();
    
    var url = 'consulta.php?'+data;
	window.open(url, "report", "width=700, height=500");

	return false;
}