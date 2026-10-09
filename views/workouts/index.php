<?php include 'views/layouts/header.php'; ?>

<div class="page-container">

  <!-- Page Header -->
  <div class="flex items-center justify-between mb-24">
    <div>
      <h2 style="font-size:1.5rem;font-weight:800">My Workouts</h2>
      <p class="text-secondary text-sm" style="margin-top:4px">Your training history and logged sessions</p>
    </div>
    <a href="index.php?page=workouts&action=create" class="btn btn-primary">
      ➕  Log Workout
    </a>
  </div>

  <!-- Filters -->
  <div class="card mb-16" style="padding:14px 20px">
    <div class="flex items-center gap-16" style="flex-wrap:wrap">
      <div class="flex items-center gap-8">
        <label class="text-sm font-medium text-secondary">Filter:</label>
        <select class="form-select" style="width:auto;padding:6px 12px;font-size:0.8rem">
          <option value="all">All Workouts</option>
          <option value="push">Push Days</option>
          <option value="pull">Pull Days</option>
          <option value="legs">Leg Days</option>
          <option value="upper">Upper Body</option>
          <option value="full">Full Body</option>
        </select>
      </div>
      <div class="flex items-center gap-8">
        <label class="text-sm font-medium text-secondary">Period:</label>
        <select class="form-select" style="width:auto;padding:6px 12px;font-size:0.8rem">
          <option value="week">This Week</option>
          <option value="month" selected>This Month</option>
          <option value="3months">Last 3 Months</option>
          <option value="all">All Time</option>
        </select>
      </div>
    </div>
  </div>

  <!-- Workout List -->
  <div class="workout-list">

    <!-- Workout 1 -->
    <div class="workout-card stagger-item">
      <div class="workout-icon" style="background:var(--danger-light);color:var(--danger)">🔥</div>
      <div class="workout-info">
        <div class="workout-name">Push Day — Chest & Shoulders</div>
        <div class="workout-meta">
          <span>📅 Today</span>
          <span>⏱️ 68 min</span>
          <span>6 exercises</span>
        </div>
      </div>
      <div class="workout-stats">
        <div class="workout-stat">
          <div class="workout-stat-value">22</div>
          <div class="workout-stat-label">Sets</div>
        </div>
        <div class="workout-stat">
          <div class="workout-stat-value">8,450</div>
          <div class="workout-stat-label">Volume (kg)</div>
        </div>
      </div>
      <span class="badge badge-danger">Intense</span>
    </div>

    <!-- Workout 2 -->
    <div class="workout-card stagger-item">
      <div class="workout-icon" style="background:var(--success-light);color:var(--success)">🦵</div>
      <div class="workout-info">
        <div class="workout-name">Leg Day — Quads & Hamstrings</div>
        <div class="workout-meta">
          <span>📅 Yesterday</span>
          <span>⏱️ 72 min</span>
          <span>5 exercises</span>
        </div>
      </div>
      <div class="workout-stats">
        <div class="workout-stat">
          <div class="workout-stat-value">20</div>
          <div class="workout-stat-label">Sets</div>
        </div>
        <div class="workout-stat">
          <div class="workout-stat-value">12,300</div>
          <div class="workout-stat-label">Volume (kg)</div>
        </div>
      </div>
      <span class="badge badge-success">Good</span>
    </div>

    <!-- Workout 3 -->
    <div class="workout-card stagger-item">
      <div class="workout-icon">💪</div>
      <div class="workout-info">
        <div class="workout-name">Pull Day — Back & Biceps</div>
        <div class="workout-meta">
          <span>📅 2 days ago</span>
          <span>⏱️ 65 min</span>
          <span>6 exercises</span>
        </div>
      </div>
      <div class="workout-stats">
        <div class="workout-stat">
          <div class="workout-stat-value">24</div>
          <div class="workout-stat-label">Sets</div>
        </div>
        <div class="workout-stat">
          <div class="workout-stat-value">9,850</div>
          <div class="workout-stat-label">Volume (kg)</div>
        </div>
      </div>
      <span class="badge badge-warning">Trained</span>
    </div>

    <!-- Workout 4 -->
    <div class="workout-card stagger-item">
      <div class="workout-icon" style="background:var(--accent-warm-light);color:var(--accent-warm)">🏋️</div>
      <div class="workout-info">
        <div class="workout-name">Upper Body — Chest, Shoulders, Arms</div>
        <div class="workout-meta">
          <span>📅 4 days ago</span>
          <span>⏱️ 75 min</span>
          <span>7 exercises</span>
        </div>
      </div>
      <div class="workout-stats">
        <div class="workout-stat">
          <div class="workout-stat-value">26</div>
          <div class="workout-stat-label">Sets</div>
        </div>
        <div class="workout-stat">
          <div class="workout-stat-value">10,200</div>
          <div class="workout-stat-label">Volume (kg)</div>
        </div>
      </div>
      <span class="badge badge-warning">Trained</span>
    </div>

    <!-- Workout 5 -->
    <div class="workout-card stagger-item">
      <div class="workout-icon" style="background:var(--success-light);color:var(--success)">🦵</div>
      <div class="workout-info">
        <div class="workout-name">Leg Day — Full Lower Body</div>
        <div class="workout-meta">
          <span>📅 5 days ago</span>
          <span>⏱️ 60 min</span>
          <span>5 exercises</span>
        </div>
      </div>
      <div class="workout-stats">
        <div class="workout-stat">
          <div class="workout-stat-value">18</div>
          <div class="workout-stat-label">Sets</div>
        </div>
        <div class="workout-stat">
          <div class="workout-stat-value">11,400</div>
          <div class="workout-stat-label">Volume (kg)</div>
        </div>
      </div>
      <span class="badge badge-primary">Moderate</span>
    </div>

    <!-- Workout 6 -->
    <div class="workout-card stagger-item">
      <div class="workout-icon">💪</div>
      <div class="workout-info">
        <div class="workout-name">Pull Day — Back & Rear Delts</div>
        <div class="workout-meta">
          <span>📅 6 days ago</span>
          <span>⏱️ 58 min</span>
          <span>5 exercises</span>
        </div>
      </div>
      <div class="workout-stats">
        <div class="workout-stat">
          <div class="workout-stat-value">20</div>
          <div class="workout-stat-label">Sets</div>
        </div>
        <div class="workout-stat">
          <div class="workout-stat-value">8,700</div>
          <div class="workout-stat-label">Volume (kg)</div>
        </div>
      </div>
      <span class="badge badge-primary">Moderate</span>
    </div>

  </div>

  <!-- Pagination -->
  <div class="flex justify-center mt-24 gap-8">
    <button class="btn btn-secondary btn-sm" disabled>← Previous</button>
    <button class="btn btn-primary btn-sm">1</button>
    <button class="btn btn-secondary btn-sm">2</button>
    <button class="btn btn-secondary btn-sm">3</button>
    <button class="btn btn-secondary btn-sm">Next →</button>
  </div>

</div>

<?php include 'views/layouts/footer.php'; ?>
