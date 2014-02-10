$(document).ready(function()
		{
			 $("tr:even").css("background-color","#FFFFFF");
			        // Paginate table rows
				$('table tbody').paginate({
							status: $('#status'),
							controls: $('#paginate'),
							itemsPerPage: 10
						});
		});