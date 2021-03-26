<?php
class Posts
{
	private $host  = 'localhost';
	private $user  = 'root';
	private $password   = '';
	private $database  = 'picsxon';
	private $postTable = 'pictures';
	private $postVotesTable = 'post_votes';
	private $dbConnect = false;
	public function __construct()
	{
		if (!$this->dbConnect) {

			$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
			if ($conn->connect_error) {
				die("Error failed to connect to MySQL: " . $conn->connect_error);
			} else {
				$this->dbConnect = $conn;
			}
		}
	}
	private function executeQuery($sqlQuery)
	{
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if (!$result) {
			die('Error in query: ');
		}
		$data = array();
		while ($row = mysqli_fetch_array($result)) {
			$data[] = $row;
		}
		return $data;
	}
	public function getPosts()
	{
		$sqlQuery = 'SELECT post_id,timestamp, vote_up, vote_down FROM ' . $this->postTable;
		return  $this->executeQuery($sqlQuery);
	}
	public function isUserAlreadyVoted($user_id, $post_id)
	{
		$sqlQuery = 'SELECT post_id, user_id, vote FROM ' . $this->postVotesTable . " WHERE user_id = '" . $user_id . "' AND post_id = '" . $post_id . "'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		return  mysqli_num_rows($result);
	}
	public function getUserVotes($user_id, $post_id)
	{
		$sqlQuery = 'SELECT post_id, user_id, vote FROM ' . $this->postVotesTable . " WHERE user_id = '" . $user_id . "' AND post_id = '" . $post_id . "'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		return  mysqli_fetch_array($result);
	}
	public function getPostVotes($post_id)
	{
		$sqlQuery = 'SELECT post_id, vote_up, vote_down FROM ' . $this->postTable . " WHERE post_id = '" . $post_id . "'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		return  mysqli_fetch_array($result);
	}
	public function updatePostVote($postVoteData)
	{
		$sqlQuery = "UPDATE " . $this->postTable . " SET vote_up = '" . $postVoteData['vote_up'] . "' , vote_down = '" . $postVoteData['vote_down'] . "' WHERE post_id = '" . $postVoteData['post_id'] . "'";
		mysqli_query($this->dbConnect, $sqlQuery);
		$sqlVoteQuery = '';
		if ($this->isUserAlreadyVoted($postVoteData['user_id'], $postVoteData['post_id'])) {
			$sqlVoteQuery = "UPDATE " . $this->postVotesTable . " SET vote = '" . $postVoteData['user_vote'] . "' WHERE post_id = '" . $postVoteData['post_id'] . "' AND user_id = '" . $postVoteData['user_id'] . "'";
		} else {
			$sqlVoteQuery = "INSERT INTO " . $this->postVotesTable . " (id, post_id, user_id, vote) VALUES ('', '" . $postVoteData['post_id'] . "', '" . $postVoteData['user_id'] . "', '" . $postVoteData['user_vote'] . "')";
		}
		if ($sqlVoteQuery) {
			mysqli_query($this->dbConnect, $sqlVoteQuery);
			return true;
		}
	}
}
