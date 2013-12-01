<?php include('header.php'); ?>
	
<?php if (empty($user_id)) {include('menu_notlogged.php');} else {include('menu.php');} ?>

    <div id="main">
        <div class="header"><img src="https://graph.facebook.com/<?php echo $profile_id; ?>/picture" style="border-radius:3px;"/>
            <h1><?php echo $profile_name; ?></h1>
            <h2>Awesome. Just awesome.</h2>
        </div>

		<div class="content">
		<h2 class="content-subhead">Badges</h2>
			<p>
				Here we would like to show your badges. <b>IF YOU HAD ANY! GOTO LECTURES, FOOL!</b>
			</p>
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