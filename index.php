<?php
/**
 * MyGymCoach — Front Controller / Router
 * 
 * MVC Architecture: This file acts as the single entry point.
 * All requests are routed through here to the appropriate view.
 * 
 * When the backend is implemented, this will dispatch to Controllers
 * which interact with Models and render Views.
 */

// Start session (needed for auth later)
session_start();

// Get the requested page and action
$page   = $_GET['page']   ?? 'login';
$action = $_GET['action'] ?? 'index';

// Simple routing table
// In the full MVC, this will call Controller methods instead of directly including views
switch ($page) {
    // Auth pages (no layout - standalone)
    case 'login':
        include 'views/auth/login.php';
        break;

    case 'register':
        include 'views/auth/register.php';
        break;

    // Dashboard (uses layout)
    case 'dashboard':
        include 'views/dashboard/index.php';
        break;

    // Workouts
    case 'workouts':
        if ($action === 'create') {
            include 'views/workouts/create.php';
        } else {
            include 'views/workouts/index.php';
        }
        break;

    // Body Map (reuses dashboard body chart for now)
    case 'bodymap':
        include 'views/dashboard/index.php';
        break;

    // AI Analysis
    case 'analysis':
        include 'views/analysis/index.php';
        break;

    // Progress (placeholder — will be built next)
    case 'progress':
        include 'views/dashboard/index.php';
        break;

    // Profile & Settings (placeholder)
    case 'profile':
    case 'settings':
        include 'views/dashboard/index.php';
        break;

    // Default: show login
    default:
        include 'views/auth/login.php';
        break;
}
