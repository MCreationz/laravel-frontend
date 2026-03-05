<div class="navbar-container">
    <div class="brand">FUNDINK</div>
    <div class="nav-links">
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Signup</a>
    </div>
</div>

<style>
.navbar-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background-color: #333;
    color: white;
}

.navbar-container .brand {
    font-size: 24px;
    font-weight: bold;
}

.navbar-container .nav-links a {
    color: white;
    text-decoration: none;
    margin-left: 15px;
    font-weight: bold;
}

.navbar-container .nav-links a:hover {
    text-decoration: underline;
}
</style>
