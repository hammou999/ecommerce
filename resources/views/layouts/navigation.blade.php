<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus icon'></i>
        <div class="logo_name"> MTM </div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
        <li>
            <i class='bx bx-search'></i>
            <input type="text" placeholder="Search...">
            <span class="tooltip">Search</span>
        </li>
        <li>
            <a href="" class="{{ Request::is('dashboard') ? 'active':''}}">
                <i class="bx bx-grid-alt {{ Request::is('dashboard') ? 'active':''}}"></i>
                <span class="links_name">dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>
        <li>
            <a href="#" class="{{ Request::is('products') ? 'active':''}}">
                <i class='bx bx-user {{ Request::is('products') ? 'active':''}}' ></i>
                <span class="links_name">Products</span>
            </a>
            <span class="tooltip">User</span>
        </li>
        <li>
            <a href="#" class="{{ Request::is('users') ? 'active':''}}">
                <i class='bx bx-chat {{ Request::is('users') ? 'active':''}}' ></i>
                <span class="links_name">Users</span>
            </a>
            <span class="tooltip">Messages</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-pie-chart-alt-2' ></i>
                <span class="links_name">Analytics</span>
            </a>
            <span class="tooltip">Analytics</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-cart-alt' ></i>
                <span class="links_name">Order</span>
            </a>
            <span class="tooltip">Order</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-cog' ></i>
                <span class="links_name">Setting</span>
            </a>
            <span class="tooltip">Setting</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-log-out' id="log_out" ></i>
                <span class="links_name">Log Out</span>
            </a>
            <span class="tooltip">Log Out</span>
        </li>

    </ul>
</div>
