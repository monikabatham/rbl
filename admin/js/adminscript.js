$(document).ready(function(){
   $('#edit-form').click(function(){
	//alert("aaaa");
	description=tinyMCE.activeEditor.getContent();

  //$('[name="descrip"]').val();
	jstatus=$('[name="jstu"]').val();
	jfunction=$('[name="function"]').val();
    title=$('[name="title"]').val();
	salary=$('[name="salary"]').val();
    skills=$('[name="skills"]').val();
	qulification=$('[name="qulification"]').val();
    experience=$('[name="experience"]').val();
	start_date=$('[name="start_date"]').val();
    loc=$('[name="location"]').val();
	
	jobid=$('[name="jobid"]').val();
	jlistid=$('[name="jlistid"]').val();
   adata="jfunction="+jfunction+"&title="+title+"&salary="+salary+"&skills="+skills+"&qulification="+qulification+"&experience="+experience+"&start_date="+start_date+"&loc="+title+"&loc="+title+"&description="+description+"&jobid="+jobid+"&jstatus="+jstatus+"&jlistid="+jlistid;
     alert(adata);
	$.ajax({
	  url: 'http://bt.konicaminolta.in/career/admin/edit_result.php',
	  data:adata,
	  type: "POST",
	  success: function(data) {
		$('#edit').html(data);		
	  }
	});
   });
});




