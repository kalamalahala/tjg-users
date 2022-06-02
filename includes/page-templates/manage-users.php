<?php
/*
* Plugin Name:       TJG Users
* Template page:     manage-users.php
* Intended slug:    manage-users
*/

get_header();
?>

<header class="plugin-header">
	<h1>TJG Users</h1>
	<p>Manage and update TJG Agents</p>
</header>
<div class="users-container">
	<pre>
	<?php

	$agent_number_search = $_GET['agent_id'] ?? null;
	
	$agent_list = Tjg_Users::get_tjg_agents( $agent_number_search );

	// recursively count the $agent_list array
	$agent_count = count( $agent_list, COUNT_RECURSIVE );
	$ticker = 0;
	foreach ($agent_list as $agent) {
		$ticker++;
		print "<p>#$ticker) Agent Name: {$agent->agent_name}</p>";
		print "<p>Agent Number: {$agent->agent_number}</p>";
		if (!empty($agent->team) && is_array($agent->team)) {
			foreach ($agent->team as $child) {
				$ticker++;
				print "<p>#$ticker) {$agent->agent_name}'s Team</p>";
				print "<p>Agent Name: {$child->agent_name}</p>";
				print "<p>Agent Number: {$child->agent_number}</p>";
			}
		} else {
			continue;
		}
		// print "<p>Team: {$agent->team}</p>";
		print '<hr>';
	}

	print "$ticker agents found";

	?>
	</pre>
</div>


<?php
// WP Footer
get_footer();
// End of Template
?>