$(document).ready(function () {
	$(".options").on("click", function () {
		var post_id = $(this).attr("id");
		post_id = post_id.replace(/\D/g, '');
		var vote_type = $(this).data("vote-type");
		//console.log('initial vote type', vote_type);


		$.ajax({
			type: 'POST',
			url: 'vote.php',
			dataType: 'json',
			data: { post_id: post_id, vote_type: vote_type },
			success: function (response) {
				$("#vote_up_count_" + response.post_id).html("&nbsp;&nbsp;" + response.vote_up);
				$("#vote_down_count_" + response.post_id).html("&nbsp;&nbsp;" + response.vote_down);
				// vote_type = vote_type == '0' ? '1' : '0';
				// $(this).data("vote-type", 0);
				// console.log($(this).data("vote-type"), "after");

			}
		});
	});
});