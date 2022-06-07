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
		This box will contain the starting agent defined either with $_get agent_id, or leaving it blank to begin with the Agency Owner.
</pre>
	<div class="agent-container">
		<div class="profile-pic">
			img
		</div>
		<div class="agent-info">
			<h2>Agent Name</h2>
			<p>Agent Description</p>
		</div>
		<div class="action-buttons">
			<a href="#" class="action-edit-button">Edit</a>
			<a href="#" class="action-delete-button">Delete</a>
		</div>
	</div>
	<?php

	
	// $agent_number_search = $_GET['agent_id'] ?? null;
	
	// $agent_list = Tjg_Users::get_tjg_agents( $agent_number_search );

	// $junior_agents = Tjg_Users::get_all_by_position( 'Junior Partner' );
	// foreach ( $junior_agents as $agent ) {
	// 	echo '<p>' . $agent->first_name . ' ' . $agent->last_name . ': ' . $agent->agent_number . '</p>';
	// }


	// foreach ($agent_list as $agent_object) {
	// 	$output = $agent_object->create_agent_element();
	// 	echo $output;
	// }

	// $ticker = 0;
	// foreach ($agent_list as $agent) {
	// 	$ticker++;
	// 	print "<p>#$ticker) Agent Name: {$agent->agent_name}</p>";
	// 	print "<p>Agent Number: {$agent->agent_number}</p>";
	// 	if (!empty($agent->team) && is_array($agent->team)) {
	// 		print "<p>#$ticker) {$agent->agent_name}'s Team</p>";
	// 		foreach ($agent->team as $child) {
	// 			$ticker++;
	// 			print_r ($child);
	// 			// print "<p>Agent Name: {$child->agent_name}</p>";
	// 			// print "<p>Agent Number: {$child->agent_number}</p>";
	// 		}
	// 	} else {
	// 		continue;
	// 	}
	// 	// print "<p>Team: {$agent->team}</p>";
	// 	print '<hr>';
	// }

	// print "$ticker agents found";

	?>
	this html should display in the large container but not in the individual agent boxes
</div>


<?php
// WP Footer
get_footer();
// End of Template
?>