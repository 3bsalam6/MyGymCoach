/**
 * MyGymCoach — Main Application JavaScript
 * Handles: Theme toggle, sidebar, navigation, global interactions
 */

document.addEventListener('DOMContentLoaded', () => {
  initTheme();
  initSidebar();
  initAnimations();
});

/* =============================================
   Theme Toggle (Light / Dark)
   ============================================= */
function initTheme() {
  const savedTheme = localStorage.getItem('mgc-theme') || 'light';
  document.documentElement.setAttribute('data-theme', savedTheme);
  updateThemeIcon(savedTheme);
}

function toggleTheme() {
  const current = document.documentElement.getAttribute('data-theme');
  const next = current === 'dark' ? 'light' : 'dark';
  document.documentElement.setAttribute('data-theme', next);
  localStorage.setItem('mgc-theme', next);
  updateThemeIcon(next);
}

function updateThemeIcon(theme) {
  const icons = document.querySelectorAll('.theme-icon');
  icons.forEach(icon => {
    icon.textContent = theme === 'dark' ? '☀️' : '🌙';
  });
  const labels = document.querySelectorAll('.theme-label');
  labels.forEach(label => {
    label.textContent = theme === 'dark' ? 'Light Mode' : 'Dark Mode';
  });
}

/* =============================================
   Sidebar (Mobile)
   ============================================= */
function initSidebar() {
  const menuBtn = document.querySelector('.mobile-menu-btn');
  const sidebar = document.querySelector('.sidebar');
  const overlay = document.querySelector('.sidebar-overlay');

  if (menuBtn) {
    menuBtn.addEventListener('click', () => {
      sidebar.classList.toggle('open');
      overlay?.classList.toggle('active');
    });
  }

  if (overlay) {
    overlay.addEventListener('click', () => {
      sidebar.classList.remove('open');
      overlay.classList.remove('active');
    });
  }
}

/* =============================================
   Staggered Animations on Scroll
   ============================================= */
function initAnimations() {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('animate-fade-in');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });

  document.querySelectorAll('.animate-on-scroll').forEach(el => {
    observer.observe(el);
  });
}

/* =============================================
   Workout Form Helpers
   ============================================= */
let exerciseCount = 0;

function addExercise() {
  exerciseCount++;
  const container = document.getElementById('exercises-container');
  if (!container) return;

  const exerciseHTML = `
    <div class="exercise-entry animate-scale-in" id="exercise-${exerciseCount}">
      <div class="exercise-entry-header">
        <div class="flex items-center gap-12">
          <span class="exercise-entry-num">${exerciseCount}</span>
          <div style="flex:1">
            <select class="form-select" style="max-width:300px" id="exercise-name-${exerciseCount}">
              <option value="">Select exercise...</option>
              <optgroup label="Chest">
                <option value="bench-press">Bench Press</option>
                <option value="incline-bench">Incline Bench Press</option>
                <option value="dumbbell-fly">Dumbbell Fly</option>
                <option value="cable-crossover">Cable Crossover</option>
                <option value="push-ups">Push-Ups</option>
              </optgroup>
              <optgroup label="Back">
                <option value="deadlift">Deadlift</option>
                <option value="barbell-row">Barbell Row</option>
                <option value="lat-pulldown">Lat Pulldown</option>
                <option value="pull-ups">Pull-Ups</option>
                <option value="seated-cable-row">Seated Cable Row</option>
              </optgroup>
              <optgroup label="Shoulders">
                <option value="overhead-press">Overhead Press</option>
                <option value="lateral-raise">Lateral Raise</option>
                <option value="front-raise">Front Raise</option>
                <option value="face-pull">Face Pull</option>
              </optgroup>
              <optgroup label="Arms">
                <option value="barbell-curl">Barbell Curl</option>
                <option value="hammer-curl">Hammer Curl</option>
                <option value="tricep-pushdown">Tricep Pushdown</option>
                <option value="skull-crusher">Skull Crusher</option>
              </optgroup>
              <optgroup label="Legs">
                <option value="squat">Squat</option>
                <option value="leg-press">Leg Press</option>
                <option value="leg-curl">Leg Curl</option>
                <option value="leg-extension">Leg Extension</option>
                <option value="calf-raise">Calf Raise</option>
                <option value="romanian-deadlift">Romanian Deadlift</option>
                <option value="lunges">Lunges</option>
              </optgroup>
              <optgroup label="Core">
                <option value="plank">Plank</option>
                <option value="crunches">Crunches</option>
                <option value="russian-twist">Russian Twist</option>
                <option value="leg-raise">Leg Raise</option>
              </optgroup>
            </select>
          </div>
        </div>
        <button class="btn btn-ghost btn-sm" onclick="removeExercise(${exerciseCount})" title="Remove exercise">✕</button>
      </div>

      <div class="sets-grid">
        <span class="set-label">Set</span>
        <span class="set-label">Weight (kg)</span>
        <span class="set-label">Reps</span>
        <span class="set-label">RPE</span>
        <span></span>
      </div>

      <div id="sets-container-${exerciseCount}">
        ${generateSetRow(exerciseCount, 1)}
        ${generateSetRow(exerciseCount, 2)}
        ${generateSetRow(exerciseCount, 3)}
      </div>

      <button class="btn btn-ghost btn-sm mt-8" onclick="addSet(${exerciseCount})">
        ＋ Add Set
      </button>
    </div>
  `;

  container.insertAdjacentHTML('beforeend', exerciseHTML);
}

function generateSetRow(exerciseId, setNum) {
  return `
    <div class="sets-grid set-row" id="set-${exerciseId}-${setNum}">
      <span class="set-label" style="color:var(--text-secondary);font-weight:700">${setNum}</span>
      <input type="number" class="form-input" placeholder="0" min="0" step="0.5">
      <input type="number" class="form-input" placeholder="0" min="0">
      <input type="number" class="form-input" placeholder="—" min="1" max="10" step="0.5">
      <button class="btn btn-ghost btn-icon btn-sm" onclick="removeSet('set-${exerciseId}-${setNum}')" title="Remove set" style="font-size:0.8rem;color:var(--text-muted)">✕</button>
    </div>
  `;
}

let setCounts = {};

function addSet(exerciseId) {
  if (!setCounts[exerciseId]) {
    setCounts[exerciseId] = 3;
  }
  setCounts[exerciseId]++;
  const container = document.getElementById(`sets-container-${exerciseId}`);
  if (container) {
    container.insertAdjacentHTML('beforeend', generateSetRow(exerciseId, setCounts[exerciseId]));
  }
}

function removeSet(setId) {
  const el = document.getElementById(setId);
  if (el) {
    el.style.opacity = '0';
    el.style.transform = 'translateX(-10px)';
    setTimeout(() => el.remove(), 200);
  }
}

function removeExercise(exerciseId) {
  const el = document.getElementById(`exercise-${exerciseId}`);
  if (el) {
    el.style.opacity = '0';
    el.style.transform = 'scale(0.95)';
    setTimeout(() => el.remove(), 250);
  }
}

/* =============================================
   Mock Data / Demo Helpers
   ============================================= */
function getGreeting() {
  const hour = new Date().getHours();
  if (hour < 12) return 'Good morning';
  if (hour < 18) return 'Good afternoon';
  return 'Good evening';
}

// Set greeting on dashboard
const greetingEl = document.getElementById('greeting-text');
if (greetingEl) {
  greetingEl.textContent = getGreeting();
}

/* =============================================
   Simple SPA-like page transitions
   ============================================= */
function navigateTo(page) {
  window.location.href = `index.php?page=${page}`;
}

/* =============================================
   Toast Notifications
   ============================================= */
function showToast(message, type = 'success') {
  const existing = document.querySelector('.toast');
  if (existing) existing.remove();

  const toast = document.createElement('div');
  toast.className = 'toast';
  toast.style.cssText = `
    position: fixed;
    bottom: 24px;
    right: 24px;
    padding: 14px 24px;
    border-radius: var(--radius-sm);
    font-size: 0.875rem;
    font-weight: 500;
    z-index: 9999;
    animation: fadeIn 0.3s ease;
    box-shadow: var(--shadow-lg);
    display: flex;
    align-items: center;
    gap: 8px;
    background: ${type === 'success' ? 'var(--success)' : type === 'error' ? 'var(--danger)' : 'var(--accent)'};
    color: white;
  `;
  toast.innerHTML = `
    <span>${type === 'success' ? '✓' : type === 'error' ? '✕' : 'ℹ'}</span>
    <span>${message}</span>
  `;

  document.body.appendChild(toast);
  setTimeout(() => {
    toast.style.opacity = '0';
    toast.style.transform = 'translateY(10px)';
    toast.style.transition = 'all 0.3s ease';
    setTimeout(() => toast.remove(), 300);
  }, 3000);
}
