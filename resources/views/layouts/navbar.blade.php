<nav style="background: #0d6efd; padding: 10px; color: white; display: flex; justify-content: space-between; align-items: center;">
    <div>
        <a href="{{ url('/') }}" style="color: white; text-decoration: none; font-weight: bold;">Sistem Aspirasi</a>
    </div>
    <div>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" style="background: transparent; border: none; color: white; cursor: pointer;">
                🔒 Logout
            </button>
        </form>
    </div>
</nav>
