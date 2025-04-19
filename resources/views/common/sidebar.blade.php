<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block backg sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="/">
                    <i class="bi bi-speedometer"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->routeIs('catg') ? 'active' : ''}}" href="{{route('catg')}}">
                    <i class="bi bi-bookmark-star-fill"></i>
                    Categories & Tags
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->routeIs('jokes') ? 'active' : ''}}" href="{{route('jokes')}}">
                    <i class="bi bi-emoji-laughing-fill"></i>
                    Add Jokes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->routeIs('jokesimage') ? 'active' : ''}}" href="{{route('jokesimage')}}">
                    <i class="bi bi-images"></i>
                    jokes images
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                    Reports
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="layers" class="align-text-bottom"></span>
                    Integrations
                </a>
            </li>
        </ul>

        <h6
            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>Saved reports</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle" class="align-text-bottom"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Current month
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Last quarter
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Social engagement
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Year-end sale
                </a>
            </li>
        </ul>
    </div>
</nav>