<div class="sidebar shadow-lg">
    <div class="logo">
        <i class="bi bi-bag-heart-fill"></i>
        Shop Fashion
    </div>

    <nav class="nav flex-column">
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('/admin') ? 'active' : '' }}">
            <i class="bi bi-house-door me-2"></i>
            Dashboard
        </a>

        <a href="{{ route('categories.index') }}"
            class="nav-link {{ request()->is('categories*') ? 'active' : '' }}">
            <i class="bi bi-grid me-2"></i>
            Danh mục
        </a>

        <a href="{{ route('products.index') }}" class="nav-link {{ request()->is('products*') ? 'active' : '' }}">
            <i class="bi bi-box-seam me-2"></i>
            Sản phẩm
        </a>

        <a href="{{ route('orders.index') }}" class="nav-link {{ request()->is('orders*') ? 'active' : '' }}">
            <i class="bi bi-receipt me-2"></i>
            Đơn hàng
        </a>

        <a href="{{ route('vouchers.index') }}" class="nav-link {{ request()->is('vouchers*') ? 'active' : '' }}">
            <i class="bi bi-ticket-perforated me-2"></i>
            Voucher
        </a>

        <a href="{{ route('users.index') }}" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
            <i class="bi bi-people me-2"></i>
            Người dùng
        </a>
        <form method="POST" action="/logout">
            @csrf
            <button class="w-full text-left px-4 py-2 hover:bg-gray-100">
                Đăng xuất
            </button>
        </form>
    </nav>
</div>