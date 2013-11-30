<?php include('header.php'); ?>
	
<?php if (empty($user_id)) {include('menu_notlogged.php');} else {include('menu.php');} ?>

    <div id="main">
        <div class="header">
            <h1>Imprint</h1>
            <h2>legal fu.</h2>
        </div>

        <div class="content">
            <h2 class="content-subhead">Responsible for this website according to German law</h2>
            <p>
				<address>
				Hauke L&uuml;bbers<br />
				Ernsthaldenstr. 47<br />
				70565 Stuttgart<br />
				</address>
				<a href="<?php echo BASE_URL; ?>contact">Contact</a>
			</p>
			<h2 class="content-subhead">This website is using</h2>
            <p>
				<ul>
					<li><a href="https://github.com/gilbitron/PIP">PIP PHP Framework</a></li>
					<li><a href="https://github.com/yui/pure/">pure CSS Framework</a></li>
					<li><a href="https://github.com/necolas/css3-social-signin-buttons">CSS3 Social Sign-in Buttons</a></li>
				</ul>
			</p>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>