<div class="wrap">
	<h1>PodImporter</h1>

	<a href="<?php echo get_bloginfo('url').'/wp-admin/options-general.php?page=PodImporter&refresh=true'; ?>"><button class="btn btn-primary">Refresh all</button></a>

	<br/><br/>

	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css">
	<script type="text/javascript" src="http://codeorigin.jquery.com/jquery-2.0.3.min.js"></script>

	<table class="table">
		<?php foreach($podcasts AS $podcast): ?>
			<tr>
				<td><strong><?php echo $podcast['slug']; ?></strong></td>
				<td><a href="<?php echo $podcast['feed']; ?>" target="_blank"><?php echo $podcast['feed']; ?></a></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>