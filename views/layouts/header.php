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
  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect rx='20' width='100' height='100' fill='%232563EB'/><text y='72' x='50' text-anchor='middle' font-size='52' font-weight='bold' fill='white'>MG</text></svg>">
</head>
<body>

<!-- ========== Top Navigation Bar ========== -->
<header class="navbar" id="navbar">
  <div class="navbar-inner">
    <!-- Brand -->
    <a href="index.php?page=dashboard" class="navbar-brand">
      <div class="brand-icon">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <path d="M6 4v16M18 4v16M6 12h12M4 8h4M4 16h4M16 8h4M16 16h4"/>
        </svg>
      </div>
      <span class="brand-text">My<span>Gym</span>Coach</span>
    </a>

    <!-- Desktop Nav Links -->
    <nav class="navbar-nav" id="navbar-nav">
      <a href="index.php?page=dashboard" class="nav-link <?php echo $currentPage === 'dashboard' ? 'active' : ''; ?>">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
        <span>Dashboard</span>
      </a>
      <a href="index.php?page=workouts" class="nav-link <?php echo $currentPage === 'workouts' ? 'active' : ''; ?>">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 4v16M18 4v16M6 12h12M4 8h4M4 16h4M16 8h4M16 16h4"/></svg>
        <span>Workouts</span>
      </a>
      <a href="index.php?page=workouts&action=create" class="nav-link <?php echo ($currentPage === 'workouts' && ($_GET['action'] ?? '') === 'create') ? 'active' : ''; ?>">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        <span>Log Workout</span>
      </a>
      <a href="index.php?page=bodymap" class="nav-link <?php echo $currentPage === 'bodymap' ? 'active' : ''; ?>">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="5" r="3"/><path d="M12 8v8M8 21l4-5 4 5M6 13h12"/></svg>
        <span>Body Map</span>
      </a>
      <a href="index.php?page=progress" class="nav-link <?php echo $currentPage === 'progress' ? 'active' : ''; ?>">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
        <span>Progress</span>
      </a>
      <a href="index.php?page=analysis" class="nav-link <?php echo $currentPage === 'analysis' ? 'active' : ''; ?>">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a4 4 0 0 1 4 4c0 1.5-.8 2.8-2 3.4V11h3a4 4 0 0 1 4 4v1H3v-1a4 4 0 0 1 4-4h3V9.4A4 4 0 0 1 12 2z"/><path d="M8 18v3M16 18v3"/></svg>
        <span>AI Coach</span>
      </a>
    </nav>

    <!-- Right Actions -->
    <div class="navbar-actions">
      <button class="navbar-action-btn theme-toggle-btn" onclick="toggleTheme()" title="Toggle theme">
        <span class="theme-icon">
          <svg class="icon-moon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
          <svg class="icon-sun" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
        </span>
      </button>
      <button class="navbar-action-btn" title="Notifications">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
        <span class="notification-dot"></span>
      </button>
      <div class="user-avatar" title="Ahmed">AM</div>

      <!-- Mobile menu toggle -->
      <button class="mobile-menu-btn" id="mobile-menu-btn" aria-label="Toggle menu">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
      </button>
    </div>
  </div>

  <!-- Mobile nav dropdown -->
  <div class="navbar-mobile-menu" id="navbar-mobile-menu">
    <a href="index.php?page=dashboard" class="mobile-nav-link <?php echo $currentPage === 'dashboard' ? 'active' : ''; ?>">Dashboard</a>
    <a href="index.php?page=workouts" class="mobile-nav-link <?php echo $currentPage === 'workouts' ? 'active' : ''; ?>">Workouts</a>
    <a href="index.php?page=workouts&action=create" class="mobile-nav-link <?php echo ($currentPage === 'workouts' && ($_GET['action'] ?? '') === 'create') ? 'active' : ''; ?>">Log Workout</a>
    <a href="index.php?page=bodymap" class="mobile-nav-link <?php echo $currentPage === 'bodymap' ? 'active' : ''; ?>">Body Map</a>
    <a href="index.php?page=progress" class="mobile-nav-link <?php echo $currentPage === 'progress' ? 'active' : ''; ?>">Progress</a>
    <a href="index.php?page=analysis" class="mobile-nav-link <?php echo $currentPage === 'analysis' ? 'active' : ''; ?>">AI Coach</a>
  </div>
</header>

<!-- ========== Main Content ========== -->
<main class="main-content">
