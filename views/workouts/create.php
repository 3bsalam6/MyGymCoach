<?php include 'views/layouts/header.php'; ?>

<div class="page-container">

  <!-- Page Header -->
  <div class="flex items-center justify-between mb-24">
    <div>
      <h2 style="font-size:1.5rem;font-weight:800">Log Workout</h2>
      <p class="text-secondary text-sm" style="margin-top:4px">Record your exercises, sets, reps, and weights</p>
    </div>
    <a href="index.php?page=workouts" class="btn btn-ghost">
      ← Back to Workouts
    </a>
  </div>

  <!-- Workout Session Info -->
  <div class="card mb-24">
    <div class="card-header">
      <h3 class="card-title">Session Details</h3>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label class="form-label" for="workout-name">Workout Name</label>
        <input type="text" class="form-input" id="workout-name" placeholder="e.g., Push Day, Leg Day, Full Body..." value="">
      </div>
      <div class="form-group">
        <label class="form-label" for="workout-date">Date</label>
        <input type="date" class="form-input" id="workout-date" value="<?php echo date('Y-m-d'); ?>">
      </div>
      <div class="form-group">
        <label class="form-label" for="workout-duration">Duration (minutes)</label>
        <input type="number" class="form-input" id="workout-duration" placeholder="60" min="1">
      </div>
    </div>
    <div class="form-group">
      <label class="form-label" for="workout-type">Workout Type</label>
      <div class="flex gap-8" style="flex-wrap:wrap">
        <label class="form-check" style="padding:8px 16px;border:1px solid var(--border);border-radius:var(--radius-full);cursor:pointer;transition:all 0.2s">
          <input type="radio" name="workout_type" value="push" style="display:none">
          <span class="text-sm">Push</span>
        </label>
        <label class="form-check" style="padding:8px 16px;border:1px solid var(--border);border-radius:var(--radius-full);cursor:pointer;transition:all 0.2s">
          <input type="radio" name="workout_type" value="pull" style="display:none">
          <span class="text-sm">Pull</span>
        </label>
        <label class="form-check" style="padding:8px 16px;border:1px solid var(--border);border-radius:var(--radius-full);cursor:pointer;transition:all 0.2s">
          <input type="radio" name="workout_type" value="legs" style="display:none">
          <span class="text-sm">Legs</span>
        </label>
        <label class="form-check" style="padding:8px 16px;border:1px solid var(--border);border-radius:var(--radius-full);cursor:pointer;transition:all 0.2s">
          <input type="radio" name="workout_type" value="upper" style="display:none">
          <span class="text-sm">Upper Body</span>
        </label>
        <label class="form-check" style="padding:8px 16px;border:1px solid var(--border);border-radius:var(--radius-full);cursor:pointer;transition:all 0.2s">
          <input type="radio" name="workout_type" value="lower" style="display:none">
          <span class="text-sm">Lower Body</span>
        </label>
        <label class="form-check" style="padding:8px 16px;border:1px solid var(--border);border-radius:var(--radius-full);cursor:pointer;transition:all 0.2s">
          <input type="radio" name="workout_type" value="full" style="display:none">
          <span class="text-sm">Full Body</span>
        </label>
      </div>
    </div>
  </div>

  <!-- Exercises -->
  <div class="flex items-center justify-between mb-16">
    <h3 class="font-bold">Exercises</h3>
    <button class="btn btn-primary btn-sm" onclick="addExercise()">
      ➕ Add Exercise
    </button>
  </div>

  <div id="exercises-container">
    <!-- Exercises will be added here dynamically -->
  </div>

  <!-- Empty State (shown when no exercises added) -->
  <div class="card" id="empty-exercises-state">
    <div class="empty-state">
      <div class="empty-icon">🏋️</div>
      <div class="empty-title">No exercises added yet</div>
      <div class="empty-desc">Click "Add Exercise" to start building your workout. Select from our exercise library and log your sets, reps, and weights.</div>
      <button class="btn btn-primary" onclick="addExercise(); document.getElementById('empty-exercises-state').style.display='none';">
        ➕ Add First Exercise
      </button>
    </div>
  </div>

  <!-- Notes -->
  <div class="card mt-24">
    <div class="card-header">
      <h3 class="card-title">Notes (optional)</h3>
    </div>
    <textarea class="form-textarea" id="workout-notes" placeholder="How did the workout feel? Any observations, energy levels, pain, etc..."></textarea>
  </div>

  <!-- Submit -->
  <div class="flex justify-between items-center mt-24" style="padding-bottom:40px">
    <button class="btn btn-secondary" onclick="if(confirm('Discard this workout?')) window.location.href='index.php?page=workouts'">
      Discard
    </button>
    <div class="flex gap-12">
      <button class="btn btn-outline" onclick="showToast('Workout saved as draft', 'info')">
        Save Draft
      </button>
      <button class="btn btn-primary btn-lg" onclick="saveWorkout()">
        ✓  Save Workout
      </button>
    </div>
  </div>

</div>

<?php include 'views/layouts/footer.php'; ?>

<script>
  // Workout type selector - highlight selected
  document.querySelectorAll('input[name="workout_type"]').forEach(radio => {
    radio.addEventListener('change', function() {
      document.querySelectorAll('input[name="workout_type"]').forEach(r => {
        r.closest('label').style.background = 'transparent';
        r.closest('label').style.borderColor = 'var(--border)';
        r.closest('label').style.color = 'var(--text-secondary)';
      });
      this.closest('label').style.background = 'var(--accent-soft)';
      this.closest('label').style.borderColor = 'var(--accent)';
      this.closest('label').style.color = 'var(--accent)';
    });
  });

  // Save workout handler
  function saveWorkout() {
    const name = document.getElementById('workout-name').value;
    if (!name) {
      showToast('Please enter a workout name', 'error');
      document.getElementById('workout-name').focus();
      return;
    }

    const exercises = document.querySelectorAll('.exercise-entry');
    if (exercises.length === 0) {
      showToast('Please add at least one exercise', 'error');
      return;
    }

    // In the future, this will POST to the backend
    showToast('Workout saved successfully! 💪', 'success');
    setTimeout(() => {
      window.location.href = 'index.php?page=workouts';
    }, 1500);
  }
</script>
