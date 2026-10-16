<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="MyGymCoach — Sign in to track your workouts, monitor progress, and get AI-powered training insights.">
  <title>MyGymCoach — Sign In</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect rx='20' width='100' height='100' fill='%232563EB'/><text y='72' x='50' text-anchor='middle' font-size='52' font-weight='bold' fill='white'>MG</text></svg>">
</head>
<body>

<!-- Theme Toggle -->
<div class="auth-theme-toggle">
  <button class="btn btn-ghost btn-icon theme-toggle-btn" onclick="toggleTheme()" title="Toggle theme">
    <span class="theme-icon">
      <svg class="icon-moon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
      <svg class="icon-sun" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
    </span>
  </button>
</div>

<div class="auth-page">
  <!-- Left: Form -->
  <div class="auth-left">
    <div class="auth-form-wrapper animate-fade-in">
      <div class="auth-brand">
        <div class="brand-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 4v16M18 4v16M6 12h12M4 8h4M4 16h4M16 8h4M16 16h4"/></svg>
        </div>
        <div class="brand-name">My<span>Gym</span>Coach</div>
      </div>

      <h1 class="auth-heading">Welcome back</h1>
      <p class="auth-subheading">Sign in to continue tracking your progress</p>

      <form action="index.php?page=dashboard" method="POST" id="login-form">
        <div class="form-group">
          <label class="form-label" for="email">Email address</label>
          <input type="email" class="form-input" id="email" name="email" placeholder="you@example.com" required>
        </div>

        <div class="form-group">
          <label class="form-label" for="password">
            Password
            <a href="#" style="float:right;font-weight:400;font-size:0.8rem">Forgot?</a>
          </label>
          <input type="password" class="form-input" id="password" name="password" placeholder="Enter your password" required>
        </div>

        <div class="form-group">
          <label class="form-check">
            <input type="checkbox" name="remember">
            <span class="text-sm text-secondary">Remember me for 30 days</span>
          </label>
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block" id="login-btn">
          Sign In
        </button>
      </form>

      <div class="auth-divider">or continue with</div>

      <div class="flex gap-12">
        <button class="btn btn-secondary btn-block" style="font-size:1.1rem" title="Sign in with Google">
          G
        </button>
        <button class="btn btn-secondary btn-block" style="font-size:1.1rem" title="Sign in with GitHub">
          GH
        </button>
      </div>

      <p class="auth-footer">
        Don't have an account? <a href="index.php?page=register">Create one</a>
      </p>
    </div>
  </div>

  <!-- Right: Hero Visual -->
  <div class="auth-right">
    <div class="auth-hero animate-fade-in">
      <div class="auth-hero-icon">
        <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 4v16M18 4v16M6 12h12M4 8h4M4 16h4M16 8h4M16 16h4"/></svg>
      </div>
      <h2>Track. Improve. Dominate.</h2>
      <p>Log every workout, track your personal records, and let AI analyze your training plan for balance and effectiveness.</p>
      
      <div style="margin-top:32px;display:flex;gap:24px;justify-content:center">
        <div style="text-align:center">
          <div style="font-size:1.8rem;font-weight:800">10k+</div>
          <div style="opacity:0.7;font-size:0.85rem">Workouts Logged</div>
        </div>
        <div style="text-align:center">
          <div style="font-size:1.8rem;font-weight:800">2.5k</div>
          <div style="opacity:0.7;font-size:0.85rem">Active Users</div>
        </div>
        <div style="text-align:center">
          <div style="font-size:1.8rem;font-weight:800">98%</div>
          <div style="opacity:0.7;font-size:0.85rem">Satisfaction</div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="assets/js/app.js"></script>
<script>
  // Handle login form (frontend demo — redirects to dashboard)
  document.getElementById('login-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const btn = document.getElementById('login-btn');
    btn.textContent = 'Signing in...';
    btn.disabled = true;
    setTimeout(() => {
      window.location.href = 'index.php?page=dashboard';
    }, 800);
  });
</script>
</body>
</html>
