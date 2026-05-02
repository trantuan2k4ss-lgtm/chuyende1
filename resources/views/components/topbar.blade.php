<div class="topbar shadow-sm">
    <div>
        <h5 class="fw-bold mb-0">@yield('title')</h5>
        <small class="text-muted">Trang quản trị cửa hàng thời trang</small>
    </div>

    <div class="user-box">
        <i class="bi bi-person-circle fs-5"></i>
        <span>{{ auth()->user()->name ?? 'Admin' }}</span>
    </div>
</div>
