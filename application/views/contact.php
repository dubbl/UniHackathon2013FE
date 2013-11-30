<?php include('header.php'); ?>
	
<?php if (empty($user_id)) {include('menu_notlogged.php');} else {include('menu.php');} ?>

    <div id="main">
        <div class="header">
            <h1>Talk to us!</h1>
            <h2>We'd love to hear from you</h2>
        </div>

        <div class="content">
            <h2 class="content-subhead">Contact form</h2>
            <p>
				<form class="pure-form pure-form-aligned" method="post" action="<?php echo BASE_URL; ?>contact">
					<fieldset>
						<div class="pure-control-group">
							<label for="name">Name</label>
							<input id="name" name="name" type="text" placeholder="Your name" required>
						</div>

						<div class="pure-control-group">
							<label for="email">Email Address</label>
							<input id="email" name="email" type="email" placeholder="Your Email Address" required>
						</div>

						<div class="pure-control-group">
							<label for="message">Message</label>
							<textarea id="message" name="message" type="text" placeholder="Enter something here..." required></textarea>
						</div>

						<div class="pure-controls">
							<button type="submit" class="pure-button pure-button-primary">Submit</button>
						</div>
					</fieldset>
				</form>
			</p>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>