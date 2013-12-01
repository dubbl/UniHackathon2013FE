<?php include('header.php'); ?>
	
<?php if (empty($user_id)) {include('menu_notlogged.php');} else {include('menu.php');} ?>

    <div id="main">
        <div class="header"><img src="https://graph.facebook.com/<?php echo $profile_id; ?>/picture" style="border-radius:3px;"/>
            <h1><?php echo $profile_name; ?></h1>
            <h2>Awesome. Just awesome.</h2>
        </div>

		<div class="content">
		<h2 class="content-subhead">Badges</h2>
			<div class="pure-g-r">
				<?php foreach ($badges as $badge) { ?>
					
					<div class="pure-u-1-3">
						<img src="<?php echo BASE_URL; ?>static/img/badges/<?php echo $badge->BadgeId; ?>.png" title="<?php echo $badge->BadgeName?>" style="width:150px;height:150px;"/>
						<h3><?php echo $badge->BadgeName?></h3>
						<p><?php echo $badge->BadgeDescription?><p>
					</div>
					
				<?php } ?>
			</div>
			<div class="pure-g-r grid-example">
				<div class="pure-u-2-5">
					<div class="l-box">
						<h3>Last check-ins</h3>
						<p>
							<ul>
								<li>one</li>
								<li>two</li>
								<li>three</li>
							</ul>
						</p>
					</div>
				</div>

				<div class="pure-u-3-5">
					<div class="l-box">
						<h3>Description</h3>
						<p>
							Quisque ac magna eget est porta varius ut eget quam. Curabitur tincidunt gravida nisl.
						</p>

						<p>
							Fusce accumsan, sem vitae tempus tempor, nulla lectus interdum felis, eget molestie urna mauris vel elit. Curabitur vel ipsum nulla.
						</p>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>

<?php include('footer.php'); ?>