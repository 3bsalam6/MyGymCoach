<?php
/**
 * MyGymCoach — Header Layout Partial
 * Included at the top of every authenticated page
 */
$currentPage = $_GET['page'] ?? 'dashboard';
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="MyGymCoach — Track your workouts, monitor your progress, and get AI-powered training insights.">
  <title>MyGymCoach — <?php echo ucfirst($currentPage); ?></title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>💪</text></svg>">
</head>
<body>

<!-- Sidebar Overlay (mobile) -->
<div class="sidebar-overlay" id="sidebar-overlay"></div>

<div class="app-layout">
  <!-- ========== Sidebar ========== -->
  <aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
      <a href="index.php?page=dashboard" class="sidebar-brand">
        <div class="brand-icon">💪</div>
        <div class="brand-text">My<span>Gym</span>Coach</div>
      </a>
    </div>

    <nav class="sidebar-nav">
      <!-- Main -->
      <div class="nav-section">
        <div class="nav-section-title">Main</div>
        <a href="index.php?page=dashboard" class="nav-item <?php echo $currentPage === 'dashboard' ? 'active' : ''; ?>">
          <span class="nav-icon">📊</span>
          <span>Dashboard</span>
        </a>
        <a href="index.php?page=workouts" class="nav-item <?php echo $currentPage === 'workouts' ? 'active' : ''; ?>">
          <span class="nav-icon">🏋️</span>
          <span>Workouts</span>
          <span class="nav-badge">3</span>
        </a>
        <a href="index.php?page=workouts&action=create" class="nav-item <?php echo ($currentPage === 'workouts' && ($_GET['action'] ?? '') === 'create') ? 'active' : ''; ?>">
          <span class="nav-icon">➕</span>
          <span>Log Workout</span>
        </a>
      </div>

      <!-- Tracking -->
      <div class="nav-section">
        <div class="nav-section-title">Tracking</div>
        <a href="index.php?page=bodymap" class="nav-item <?php echo $currentPage === 'bodymap' ? 'active' : ''; ?>">
          <span class="nav-icon">🧍</span>
          <span>Body Map</span>
        </a>
        <a href="index.php?page=progress" class="nav-item <?php echo $currentPage === 'progress' ? 'active' : ''; ?>">
          <span class="nav-icon">📈</span>
          <span>Progress</span>
        </a>
        <a href="index.php?page=analysis" class="nav-item <?php echo $currentPage === 'analysis' ? 'active' : ''; ?>">
          <span class="nav-icon">🤖</span>
          <span>AI Coach</span>
          <span class="nav-badge" style="background:var(--accent-warm)">New</span>
        </a>
      </div>

      <!-- Account -->
      <div class="nav-section">
        <div class="nav-section-title">Account</div>
        <a href="index.php?page=profile" class="nav-item <?php echo $currentPage === 'profile' ? 'active' : ''; ?>">
          <span class="nav-icon">👤</span>
          <span>Profile</span>
        </a>
        <a href="index.php?page=settings" class="nav-item <?php echo $currentPage === 'settings' ? 'active' : ''; ?>">
          <span class="nav-icon">⚙️</span>
          <span>Settings</span>
        </a>
      </div>
    </nav>

    <div class="sidebar-footer">
      <button class="theme-toggle-btn" onclick="toggleTheme()">
        <span class="theme-icon">🌙</span>
        <span class="theme-label">Dark Mode</span>
      </button>
    </div>
  </aside>

  <!-- ========== Main Content ========== -->
  <main class="main-content">
    <!-- Top Bar -->
    <header class="topbar">
      <div class="topbar-left">
        <button class="mobile-menu-btn" onclick="document.getElementById('sidebar').classList.toggle('open'); document.getElementById('sidebar-overlay').classList.toggle('active')">
          ☰
        </button>
        <h1 class="page-title"><?php
          $titles = [
            'dashboard' => 'Dashboard',
            'workouts'  => 'Workouts',
            'bodymap'   => 'Body Map',
            'progress'  => 'Progress',
            'analysis'  => 'AI Coach',
            'profile'   => 'Profile',
            'settings'  => 'Settings',
          ];
          echo $titles[$currentPage] ?? 'MyGymCoach';
        ?></h1>
      </div>
      <div class="topbar-right">
        <button class="topbar-btn" title="Notifications">
          🔔
          <span class="notification-dot"></span>
        </button>
        <button class="topbar-btn theme-toggle-btn" onclick="toggleTheme()" title="Toggle theme" style="width:38px;padding:0;gap:0">
          <span class="theme-icon">🌙</span>
        </button>
        <div class="user-avatar" title="Ahmed">AM</div>
      </div>
    </header>
