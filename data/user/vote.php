<?php
include('Posts.php');
$posts = new Posts();
// get logged in userid to vote
$user_id = 99; //from session we have to pass the user id
if ($_POST['post_id'] && $user_id) {
	$postVote = $posts->getPostVotes($_POST['post_id']);
	$userVote = $posts->getUserVotes($user_id, $_POST['post_id']);
	if ($_POST['vote_type'] == 1) {
		if ($posts->isUserAlreadyVoted($user_id, $_POST['post_id']) && !$userVote['vote']) {
			$postVote['vote_up'] += 1;
			$postVote['vote_down'] -= 1;
			$userVote['vote'] = 1;
		} else if (!$posts->isUserAlreadyVoted($user_id, $_POST['post_id'])) {
			$postVote['vote_up'] += 1;
			$userVote['vote'] = 1;
		}
	} else if ($_POST['vote_type'] == 0) {
		if ($posts->isUserAlreadyVoted($user_id, $_POST['post_id']) && $userVote['vote']) {
			$postVote['vote_up'] -= 1;
			$postVote['vote_down'] += 1;
			$userVote['vote'] = 0;
		} else if (!$posts->isUserAlreadyVoted($user_id, $_POST['post_id'])) {
			$postVote['vote_down'] += 1;
			$userVote['vote'] = 0;
		}
	}
	$postVoteData = array(
		'post_id' => $_POST['post_id'],
		'user_id' => $user_id,
		'vote_up' => $postVote['vote_up'],
		'vote_down' => $postVote['vote_down'],
		'user_vote' => $userVote['vote']
	);
	// update post votes	
	$postVoted = $posts->updatePostVote($postVoteData);
	if ($postVoted) {
		$response = array(
			'vote_up' => $postVote['vote_up'],
			'vote_down' => $postVote['vote_down'],
			'post_id' => $_POST['post_id']
		);
		echo json_encode($response);
	}
}
