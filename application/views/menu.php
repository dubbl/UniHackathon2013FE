<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="pure-menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">
        <div class="pure-menu pure-menu-open">
            <a class="pure-menu-heading" href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>static/img/studyspots.png" style="height:75px;width:150px;margin:-10px 0px -15px -5px;"/></a>

            <ul>
				<li><a href="<?php echo BASE_URL; ?>">Home</a></li>
                <li><a href="<?php echo BASE_URL; ?>profile/show/<?php echo $user_id; ?>">Profile</a></li>
				<li><a href="<?php echo BASE_URL; ?>settings">Settings</a></li>
				<li><a href="<?php echo BASE_URL; ?>logout">Logout</a></li>

                <li class="pure-menu-selected menu-item-divided">
                    <a href="<?php echo BASE_URL; ?>event/checkin">Check in</a>
                </li>
                <li><a href="<?php echo BASE_URL; ?>event/create">New event</a></li>

                <li class="pure-menu-selected menu-item-divided">
                    <a href="<?php echo BASE_URL; ?>contact">Contact</a>
                </li>
                <li><a href="<?php echo BASE_URL; ?>imprint">Imprint</a></li>
            </ul>
        </div>
    </div>