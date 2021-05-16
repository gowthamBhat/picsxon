<?php
session_start();
include('Posts.php');
$posts = new Posts();
// get logged in userid to vote
$user_id = $_SESSION['id']; //!from session we have to pass the user id
if ($_POST['post_id'] && $user_id) {
	$postVote = $posts->getPostVotes($_POST['post_id']);
	$userVote = $posts->getUserVotes($user_id, $_POST['post_id']);
	if ($_POST['vote_type'] == 1) { //like
		if ($posts->isUserAlreadyVoted($user_id, $_POST['post_id']) && !$userVote['vote']) {
			$postVote['vote_up'] += 1; //if already voted up count increases
			$postVote['vote_down'] -= 1; //down count decreases
			$userVote['vote'] = 1; //makes the user voted for that post
		} else if (!$posts->isUserAlreadyVoted($user_id, $_POST['post_id'])) {
			$postVote['vote_up'] += 1; //if it is users first vote then only upvote will be increased
			$userVote['vote'] = 1; //makes the user voted for that post
		}
	} else if ($_POST['vote_type'] == 0) { //dislike
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
