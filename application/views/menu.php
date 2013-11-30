<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="pure-menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">
        <div class="pure-menu pure-menu-open">
            <a class="pure-menu-heading" href="<?php echo BASE_URL; ?>">Campify</a>

            <ul>
                <li><a href="<?php echo BASE_URL; ?>profile/<?php echo $user_id; ?>">Profile</a></li>
				<li><a href="<?php echo BASE_URL; ?>logout">Logout</a></li>

                <li class="pure-menu-selected menu-item-divided">
                    <a href="http://purecss.io/layouts/">Success stories</a>
                </li>
                <li><a href="https://github.com/yui/pure/releases/">Releases</a></li>

                <li class="pure-menu-selected menu-item-divided">
                    <a href="<?php echo BASE_URL; ?>contact">Contact</a>
                </li>
                <li><a href="<?php echo BASE_URL; ?>imprint">Imprint</a></li>
            </ul>
        </div>
    </div>