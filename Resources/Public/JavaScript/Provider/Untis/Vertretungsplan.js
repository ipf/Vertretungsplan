$(function(){
	$('#inhalt table.subst td:contains("nicht freigegeben")').parents("table").hide().prev("p").prev("p").remove();
	$('#inhalt table.subst td:contains("nicht freigegeben")').parents("table").hide().prev("p").prev("b").remove();
})