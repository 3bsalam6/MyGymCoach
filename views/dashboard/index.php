<?php include 'views/layouts/header.php'; ?>

<!-- ========== Dashboard Content ========== -->
<div class="page-container">

  <!-- Greeting -->
  <div class="mb-24">
    <h2 style="font-size:1.5rem;font-weight:800">
      <span id="greeting-text">Good evening</span>, Ahmed 👋
    </h2>
    <p class="text-secondary" style="margin-top:4px">Here's your training overview for this week</p>
  </div>

  <!-- Stats Grid -->
  <div class="stats-grid">
    <div class="stat-card stagger-item">
      <div class="stat-icon blue">🏋️</div>
      <div class="stat-value">12</div>
      <div class="stat-label">Workouts This Month</div>
      <div class="stat-change up">↑ 20% vs last month</div>
    </div>
    <div class="stat-card stagger-item">
      <div class="stat-icon amber">⚡</div>
      <div class="stat-value" id="total-weekly-sets">118</div>
      <div class="stat-label">Total Weekly Sets</div>
      <div class="stat-change up">↑ 8 more sets</div>
    </div>
    <div class="stat-card stagger-item">
      <div class="stat-icon green">🏆</div>
      <div class="stat-value">5</div>
      <div class="stat-label">Personal Records</div>
      <div class="stat-change up">↑ 2 new PRs!</div>
    </div>
    <div class="stat-card stagger-item">
      <div class="stat-icon red">🔥</div>
      <div class="stat-value">6</div>
      <div class="stat-label">Day Streak</div>
      <div class="stat-change up">Keep it up!</div>
    </div>
  </div>

  <!-- Main Dashboard Grid -->
  <div class="dashboard-grid">

    <!-- Left Column: Body Map -->
    <div>
      <div class="card" style="position:relative">
        <div class="card-header">
          <div>
            <h3 class="card-title">Muscle Intensity Map</h3>
            <p class="card-subtitle">Based on your last 7 days of training</p>
          </div>
          <span id="balance-assessment" class="badge badge-warning">Good — Minor improvements possible</span>
        </div>

        <!-- Body Chart (powered by body-muscles library) -->
        <div class="body-chart-container" style="flex-direction:column;align-items:center">
          <div style="display:flex;gap:24px;justify-content:center;width:100%">
            <!-- FRONT VIEW -->
            <div class="body-view" style="flex:1;max-width:320px">
              <div class="body-view-label">Front</div>
              <div id="body-chart-front" style="width:100%;min-height:400px"></div>
            </div>
            <!-- BACK VIEW -->
            <div class="body-view" style="flex:1;max-width:320px">
              <div class="body-view-label">Back</div>
              <div id="body-chart-back" style="width:100%;min-height:400px"></div>
            </div>
          </div>

          <!-- Intensity Legend (Blue Gradient: High → Low) -->
          <div class="intensity-legend" style="margin-top:20px">
            <span class="text-sm font-semibold" style="color:var(--text-secondary)">High</span>
            <div style="display:flex;gap:2px;margin:0 8px">
              <div style="background:#c0392b;width:24px;height:12px;border-radius:2px"></div>
              <div style="background:#e74c3c;width:24px;height:12px;border-radius:2px"></div>
              <div style="background:#f39c12;width:24px;height:12px;border-radius:2px"></div>
              <div style="background:#f1c40f;width:24px;height:12px;border-radius:2px"></div>
              <div style="background:#D6D9E0;width:24px;height:12px;border-radius:2px"></div>
            </div>
            <span class="text-sm font-semibold" style="color:var(--text-secondary)">Low</span>
          </div>
        </div>

        <!-- Muscle Info Panel (shown on click) -->
        <div id="muscle-info-panel" style="margin-top:16px;display:none">
          <div class="card animate-scale-in" style="border-left:3px solid var(--accent)">
            <div class="flex items-center justify-between">
              <div>
                <h4 class="font-bold" id="muscle-info-name">—</h4>
                <p class="text-xs text-muted" id="muscle-info-id">—</p>
              </div>
              <span class="badge badge-primary" id="muscle-info-intensity">—</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Muscle Detail Panel (populated on click) -->
      <div id="muscle-detail-panel" class="mt-16"></div>
    </div>

    <!-- Right Column -->
    <div>
      <!-- Quick Actions -->
      <div class="card mb-16">
        <div class="card-header">
          <h3 class="card-title">Quick Actions</h3>
        </div>
        <div class="flex flex-col gap-8">
          <a href="index.php?page=workouts&action=create" class="btn btn-primary btn-block">
            ➕  Log New Workout
          </a>
          <a href="index.php?page=analysis" class="btn btn-outline btn-block">
            🤖  Analyze My Plan
          </a>
        </div>
      </div>

      <!-- Recent Workouts -->
      <div class="card mb-16">
        <div class="card-header">
          <h3 class="card-title">Recent Workouts</h3>
          <a href="index.php?page=workouts" class="text-sm">View all →</a>
        </div>
        <div class="activity-list">
          <div class="activity-item stagger-item">
            <div class="activity-dot" style="background:var(--danger)"></div>
            <div class="activity-content">
              <div class="activity-text"><strong>Push Day</strong> — Chest, Shoulders, Triceps</div>
              <div class="activity-time">Today • 6 exercises • 22 sets</div>
            </div>
          </div>
          <div class="activity-item stagger-item">
            <div class="activity-dot" style="background:var(--success)"></div>
            <div class="activity-content">
              <div class="activity-text"><strong>Leg Day</strong> — Quads, Hamstrings, Calves</div>
              <div class="activity-time">Yesterday • 5 exercises • 20 sets</div>
            </div>
          </div>
          <div class="activity-item stagger-item">
            <div class="activity-dot" style="background:var(--accent)"></div>
            <div class="activity-content">
              <div class="activity-text"><strong>Pull Day</strong> — Back, Biceps</div>
              <div class="activity-time">2 days ago • 6 exercises • 24 sets</div>
            </div>
          </div>
          <div class="activity-item stagger-item">
            <div class="activity-dot"></div>
            <div class="activity-content">
              <div class="activity-text"><strong>Upper Body</strong> — Chest, Shoulders, Arms</div>
              <div class="activity-time">4 days ago • 7 exercises • 26 sets</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Personal Records -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Recent PRs 🏆</h3>
        </div>
        <div class="activity-list">
          <div class="activity-item stagger-item">
            <div class="activity-dot" style="background:var(--accent-warm)"></div>
            <div class="activity-content">
              <div class="activity-text"><strong>Bench Press</strong> — 100 kg × 1</div>
              <div class="activity-time">New 1RM! • Today</div>
            </div>
          </div>
          <div class="activity-item stagger-item">
            <div class="activity-dot" style="background:var(--accent-warm)"></div>
            <div class="activity-content">
              <div class="activity-text"><strong>Squat</strong> — 140 kg × 1</div>
              <div class="activity-time">New 1RM! • Yesterday</div>
            </div>
          </div>
          <div class="activity-item stagger-item">
            <div class="activity-dot" style="background:var(--accent-warm)"></div>
            <div class="activity-content">
              <div class="activity-text"><strong>Deadlift</strong> — 160 kg × 3</div>
              <div class="activity-time">Volume PR • 3 days ago</div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<?php include 'views/layouts/footer.php'; ?>
