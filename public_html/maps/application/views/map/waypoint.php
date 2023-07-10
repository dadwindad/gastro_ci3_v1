<h4>เส้นทางท่องเที่ยว</h4>
<hr>

<div class="todo-app-list">
    <!-- Todo search starts -->
    <div class="app-fixed-search d-flex align-items-center">
        <div class="sidebar-toggle d-block d-lg-none ms-1">
            <i data-feather="menu" class="font-medium-5"></i>
        </div>
        <div class="d-flex align-content-center justify-content-between w-100">
            <div class="input-group input-group-merge">
                <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
                <input type="text" class="form-control" id="todo-search" placeholder="Search task"
                    aria-label="Search..." aria-describedby="todo-search" />
            </div>
        </div>
        <div class="dropdown">
            <a href="#" class="dropdown-toggle hide-arrow me-1" id="todoActions" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i data-feather="more-vertical" class="font-medium-2 text-body"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="todoActions">
                <a class="dropdown-item sort-asc" href="#">Sort A - Z</a>
                <a class="dropdown-item sort-desc" href="#">Sort Z - A</a>
                <a class="dropdown-item" href="#">Sort Assignee</a>
                <a class="dropdown-item" href="#">Sort Due Date</a>
                <a class="dropdown-item" href="#">Sort Today</a>
                <a class="dropdown-item" href="#">Sort 1 Week</a>
                <a class="dropdown-item" href="#">Sort 1 Month</a>
            </div>
        </div>
    </div>
    <!-- Todo search ends -->

    <div class="todo-task-list-wrapper list-group">
        <ul class="todo-task-list media-list" id="todo-task-list">
            <li class="todo-item">
                <div class="todo-title-wrapper">
                    <div class="todo-title-area">
                        <i data-feather="more-vertical" class="drag-icon"></i>
                        <div class="title-wrapper">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="customCheck1" />
                                <label class="form-check-label" for="customCheck1"></label>
                            </div>
                            <span class="todo-title">Fix Responsiveness for new structure 💻</span>
                        </div>
                    </div>
                    <div class="todo-item-action">
                        <div class="badge-wrapper me-1">
                            <span class="badge rounded-pill badge-light-primary">Team</span>
                        </div>
                        <small class="text-nowrap text-muted me-1">Aug 08</small>
                        <div class="avatar">
                            <img src="/map/app-assets/images/portrait/small/avatar-s-4.jpg" alt="user-avatar"
                                height="32" width="32" />
                        </div>
                    </div>
                </div>
            </li>
            <li class="todo-item">
                <div class="todo-title-wrapper">
                    <div class="todo-title-area">
                        <i data-feather="more-vertical" class="drag-icon"></i>
                        <div class="title-wrapper">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="customCheck2" />
                                <label class="form-check-label" for="customCheck2"></label>
                            </div>
                            <span class="todo-title">Plan a party for development team 🎁</span>
                        </div>
                    </div>
                    <div class="todo-item-action">
                        <div class="badge-wrapper me-1">
                            <span class="badge rounded-pill badge-light-primary">Team</span>
                            <span class="badge rounded-pill badge-light-danger">High</span>
                        </div>
                        <small class="text-nowrap text-muted me-1">Aug 30</small>
                        <div class="avatar bg-light-warning">
                            <div class="avatar-content">MB</div>
                        </div>
                    </div>
                </div>
            </li>

        </ul>
    </div>
</div>