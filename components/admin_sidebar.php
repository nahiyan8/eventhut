<div class="p-3 border-top border-secondary bg-dark text-white" style="width: 320px;">
    <h6 class="mb-0">Audit...</h6>
    <hr />
    <ul class="nav nav-pills flex-column gap-3">
        <li class="nav-item flex-sm-fill text-sm-center">
            <a class="nav-link text-white <?= ($_SERVER['REQUEST_URI'] === '/admin/users') ? ' active' : ''; ?>"
                href="/admin/users">Users</a>
        </li>
        <li class="nav-item flex-sm-fill text-sm-center">
            <a class="nav-link text-white <?= ($_SERVER['REQUEST_URI'] === '/admin/events') ? ' active' : ''; ?>"
                href="/admin/events">Events</a>
        </li>
        <li class="nav-item flex-sm-fill text-sm-center">
            <a class="nav-link text-white <?= ($_SERVER['REQUEST_URI'] === '/admin/forms') ? ' active' : ''; ?>"
                href="/admin/forms">Forms</a>
        </li>
        <!-- <li class="nav-item flex-sm-fill text-sm-center">
            <a class="nav-link text-white <?= ($_SERVER['REQUEST_URI'] === '/admin/uploads') ? ' active' : ''; ?>"
                href="/admin/uploads">Uploads</a>
        </li> -->
    </ul>
</div>