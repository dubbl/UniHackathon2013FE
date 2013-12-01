<?php include('header.php'); ?>
	
<?php if (empty($user_id)) {include('menu_notlogged.php');} else {include('menu.php');} ?>

    <div id="main">
        <div class="header">
            <h1>Settings</h1>
            <h2>We heard you like settings, so we set some settings in your settings</h2>
        </div>

        <div class="content">
            <h2 class="content-subhead">Who are you?</h2>
            <p>
				<form class="pure-form pure-form-aligned" method="post" action="<?php echo BASE_URL; ?>settings">
					<fieldset>
						No settings found. What did you expect?
					</fieldset>
				</form>
			</p>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>