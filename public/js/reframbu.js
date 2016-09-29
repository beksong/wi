jQuery(document).ready(function($){
  	$('#make').change(function(){
			$.get("{{ url('/jalan/3/prov/52')}}", 
				{ option: $(this).val() }, 
				function(data) {
					var model = $('#model');
					model.empty();
 
					$.each(data, function(index, element) {
			            model.append("<option value='"+ element.id +"'>" + element.name + "</option>");
		        });
			});
	});
});