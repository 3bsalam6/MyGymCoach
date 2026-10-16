<?php include 'views/layouts/header.php'; ?>

<div class="page-container">

  <!-- Page Header -->
  <div class="mb-24">
    <h2 style="font-size:1.5rem;font-weight:800">AI Coach</h2>
    <p class="text-secondary text-sm" style="margin-top:4px">Machine learning analysis of your training plan and balance</p>
  </div>

  <!-- Overall Assessment Card -->
  <div class="card mb-24 animate-fade-in" style="border-left:4px solid var(--accent-warm)">
    <div class="card-header">
      <div>
        <h3 class="card-title">Overall Plan Assessment</h3>
        <p class="card-subtitle">Based on your last 30 days of training data</p>
      </div>
      <span class="badge badge-warning" style="font-size:0.8rem;padding:6px 14px">Score: 7.2 / 10</span>
    </div>
    <p class="text-secondary" style="line-height:1.7">
      Your training plan is <strong>mostly well-structured</strong> with a good Push/Pull/Legs split. However, our analysis detected some areas for improvement. Your upper body receives significantly more volume than your lower body, and some muscle groups are being neglected. See the detailed breakdown below.
    </p>
  </div>

  <!-- Analysis Grid -->
  <div class="stats-grid mb-24">
    <div class="stat-card animate-fade-in">
      <div class="stat-icon green">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
      </div>
      <div class="stat-value text-success">Good</div>
      <div class="stat-label">Push/Pull Balance</div>
      <p class="text-xs text-muted mt-8">Push and pull volumes are within 10% of each other. Great job!</p>
    </div>
    <div class="stat-card animate-fade-in">
      <div class="stat-icon red">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
      </div>
      <div class="stat-value text-warning">Imbalanced</div>
      <div class="stat-label">Upper / Lower Ratio</div>
      <p class="text-xs text-muted mt-8">Upper body volume is 40% higher than lower body. Consider adding more leg work.</p>
    </div>
    <div class="stat-card animate-fade-in">
      <div class="stat-icon amber">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
      </div>
      <div class="stat-value text-warning">Moderate</div>
      <div class="stat-label">Recovery Score</div>
      <p class="text-xs text-muted mt-8">Some muscle groups are being trained before full recovery. Watch chest and quads.</p>
    </div>
    <div class="stat-card animate-fade-in">
      <div class="stat-icon blue">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
      </div>
      <div class="stat-value text-accent">On Track</div>
      <div class="stat-label">Progressive Overload</div>
      <p class="text-xs text-muted mt-8">You're consistently increasing volume or weight. Keep it up!</p>
    </div>
  </div>

  <div class="dashboard-grid">
    <!-- Left: Detailed Analysis -->
    <div>
      <!-- Muscle Group Volume Analysis -->
      <div class="card mb-24">
        <div class="card-header">
          <h3 class="card-title">Weekly Volume by Muscle Group</h3>
          <p class="card-subtitle">Sets per week — Recommended range shown in gray</p>
        </div>

        <!-- Volume bars -->
        <div style="display:flex;flex-direction:column;gap:14px;margin-top:8px">
          <?php
          $muscles = [
            ['name' => 'Chest',       'sets' => 16, 'min' => 10, 'max' => 20, 'color' => '#F87171'],
            ['name' => 'Back',        'sets' => 18, 'min' => 10, 'max' => 20, 'color' => '#FB923C'],
            ['name' => 'Shoulders',   'sets' => 12, 'min' =>  8, 'max' => 16, 'color' => '#FDE047'],
            ['name' => 'Biceps',      'sets' =>  9, 'min' =>  6, 'max' => 14, 'color' => '#86EFAC'],
            ['name' => 'Triceps',     'sets' =>  9, 'min' =>  6, 'max' => 14, 'color' => '#86EFAC'],
            ['name' => 'Quads',       'sets' => 14, 'min' => 10, 'max' => 20, 'color' => '#F87171'],
            ['name' => 'Hamstrings',  'sets' =>  8, 'min' =>  8, 'max' => 16, 'color' => '#FDE047'],
            ['name' => 'Calves',      'sets' =>  6, 'min' =>  8, 'max' => 14, 'color' => '#FB923C'],
            ['name' => 'Core',        'sets' =>  8, 'min' =>  6, 'max' => 12, 'color' => '#86EFAC'],
            ['name' => 'Glutes',      'sets' =>  8, 'min' =>  8, 'max' => 16, 'color' => '#FDE047'],
            ['name' => 'Forearms',    'sets' =>  4, 'min' =>  4, 'max' => 10, 'color' => '#86EFAC'],
            ['name' => 'Traps',       'sets' =>  6, 'min' =>  4, 'max' => 10, 'color' => '#86EFAC'],
          ];

          $maxSets = 22; // for bar width calculation
          foreach ($muscles as $m):
            $pct = ($m['sets'] / $maxSets) * 100;
            $isLow = $m['sets'] < $m['min'];
            $isHigh = $m['sets'] > $m['max'];
            $status = $isLow ? 'Below target' : ($isHigh ? 'Above target' : 'On target');
            $statusColor = $isLow ? 'var(--danger)' : ($isHigh ? 'var(--warning)' : 'var(--success)');
          ?>
          <div>
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:4px">
              <span class="text-sm font-medium"><?php echo $m['name']; ?></span>
              <span style="font-size:0.72rem;font-weight:600;color:<?php echo $statusColor; ?>">
                <?php echo $m['sets']; ?> sets — <?php echo $status; ?>
              </span>
            </div>
            <div style="height:10px;background:var(--bg-tertiary);border-radius:5px;overflow:hidden;position:relative">
              <!-- Recommended range indicator -->
              <div style="position:absolute;left:<?php echo ($m['min']/$maxSets)*100; ?>%;width:<?php echo (($m['max']-$m['min'])/$maxSets)*100; ?>%;height:100%;background:var(--border);opacity:0.5;border-radius:5px"></div>
              <!-- Actual bar -->
              <div style="height:100%;width:<?php echo $pct; ?>%;background:<?php echo $m['color']; ?>;border-radius:5px;transition:width 0.8s ease;position:relative;z-index:1"></div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>

        <div class="flex items-center gap-16 mt-16" style="flex-wrap:wrap">
          <div class="legend-item">
            <div class="legend-dot" style="background:var(--border);width:20px"></div>
            <span>Recommended range</span>
          </div>
          <div class="legend-item">
            <div class="legend-dot" style="background:#86EFAC"></div>
            <span>Good</span>
          </div>
          <div class="legend-item">
            <div class="legend-dot" style="background:#FDE047"></div>
            <span>Borderline</span>
          </div>
          <div class="legend-item">
            <div class="legend-dot" style="background:#F87171"></div>
            <span>Needs attention</span>
          </div>
        </div>
      </div>

      <!-- AI Recommendations -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">AI Recommendations</h3>
        </div>
        <div style="display:flex;flex-direction:column;gap:16px">
          <div style="display:flex;gap:12px;padding:16px;background:var(--danger-light);border-radius:var(--radius-sm)">
            <div style="width:8px;height:8px;border-radius:50%;background:var(--danger);margin-top:6px;flex-shrink:0"></div>
            <div>
              <div class="font-semibold text-sm" style="margin-bottom:2px">Increase Calf Training</div>
              <p class="text-xs text-secondary">Your calves are receiving only 6 sets/week, below the minimum recommended 8 sets. Add 2-4 more sets of calf raises to your leg days.</p>
            </div>
          </div>
          <div style="display:flex;gap:12px;padding:16px;background:var(--warning-light);border-radius:var(--radius-sm)">
            <div style="width:8px;height:8px;border-radius:50%;background:var(--warning);margin-top:6px;flex-shrink:0"></div>
            <div>
              <div class="font-semibold text-sm" style="margin-bottom:2px">Balance Upper/Lower Volume</div>
              <p class="text-xs text-secondary">Your upper body receives 70 sets/week vs 36 sets for lower body. Consider adding an extra leg day or increasing sets on existing leg days.</p>
            </div>
          </div>
          <div style="display:flex;gap:12px;padding:16px;background:var(--warning-light);border-radius:var(--radius-sm)">
            <div style="width:8px;height:8px;border-radius:50%;background:var(--warning);margin-top:6px;flex-shrink:0"></div>
            <div>
              <div class="font-semibold text-sm" style="margin-bottom:2px">Add Hamstring Work</div>
              <p class="text-xs text-secondary">Hamstrings are at the minimum threshold (8 sets). For balanced leg development, aim for 10-12 sets. Try adding Romanian Deadlifts or Leg Curls.</p>
            </div>
          </div>
          <div style="display:flex;gap:12px;padding:16px;background:var(--success-light);border-radius:var(--radius-sm)">
            <div style="width:8px;height:8px;border-radius:50%;background:var(--success);margin-top:6px;flex-shrink:0"></div>
            <div>
              <div class="font-semibold text-sm" style="margin-bottom:2px">Great Progressive Overload</div>
              <p class="text-xs text-secondary">Your weights and/or reps have been increasing consistently over the last 4 weeks on major lifts. This is excellent for muscle growth.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Right Column -->
    <div>
      <!-- Balance Score Ring -->
      <div class="card mb-16">
        <div class="card-header">
          <h3 class="card-title">Balance Score</h3>
        </div>
        <div class="progress-ring-container" style="height:200px">
          <svg width="160" height="160" viewBox="0 0 160 160">
            <!-- Background ring -->
            <circle cx="80" cy="80" r="70" fill="none" stroke="var(--bg-tertiary)" stroke-width="10"/>
            <!-- Progress ring -->
            <circle cx="80" cy="80" r="70" fill="none" stroke="var(--accent-warm)" stroke-width="10"
              stroke-dasharray="440" stroke-dashoffset="123" 
              stroke-linecap="round"
              transform="rotate(-90 80 80)"
              style="transition: stroke-dashoffset 1s ease"/>
          </svg>
          <div class="progress-ring-label">
            <div class="progress-ring-value">72%</div>
            <div class="progress-ring-text">Balanced</div>
          </div>
        </div>
      </div>

      <!-- Training Split Analysis -->
      <div class="card mb-16">
        <div class="card-header">
          <h3 class="card-title">Your Split</h3>
        </div>
        <div class="activity-list">
          <div class="activity-item">
            <div class="activity-dot" style="background:var(--danger)"></div>
            <div class="activity-content">
              <div class="flex justify-between">
                <span class="text-sm font-medium">Push Days</span>
                <span class="text-sm font-bold">2x / week</span>
              </div>
            </div>
          </div>
          <div class="activity-item">
            <div class="activity-dot" style="background:var(--accent)"></div>
            <div class="activity-content">
              <div class="flex justify-between">
                <span class="text-sm font-medium">Pull Days</span>
                <span class="text-sm font-bold">2x / week</span>
              </div>
            </div>
          </div>
          <div class="activity-item">
            <div class="activity-dot" style="background:var(--success)"></div>
            <div class="activity-content">
              <div class="flex justify-between">
                <span class="text-sm font-medium">Leg Days</span>
                <span class="text-sm font-bold">1x / week</span>
              </div>
            </div>
          </div>
          <div class="activity-item">
            <div class="activity-dot" style="background:var(--accent-warm)"></div>
            <div class="activity-content">
              <div class="flex justify-between">
                <span class="text-sm font-medium">Rest Days</span>
                <span class="text-sm font-bold">2x / week</span>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-16">
          <p class="text-xs text-muted">Consider adding a 2nd leg day for better balance.</p>
        </div>
      </div>

      <!-- Re-analyze button -->
      <div class="card">
        <div class="text-center">
          <p class="text-sm text-muted mb-16">Analysis is based on your logged workouts. Log more data for better accuracy.</p>
          <button class="btn btn-primary btn-block" onclick="showToast('Re-analyzing your plan...', 'info')">
            Re-Analyze Plan
          </button>
        </div>
      </div>
    </div>
  </div>

</div>

<?php include 'views/layouts/footer.php'; ?>
