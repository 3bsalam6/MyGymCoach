<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="MyGymCoach — Create your account and start tracking your gym progress today.">
  <title>MyGymCoach — Register</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>💪</text></svg>">
</head>
<body>

<!-- Theme Toggle -->
<div class="auth-theme-toggle">
  <button class="btn btn-ghost btn-icon" onclick="toggleTheme()" title="Toggle theme">
    <span class="theme-icon">🌙</span>
  </button>
</div>

<div class="auth-page">
  <!-- Left: Form -->
  <div class="auth-left">
    <div class="auth-form-wrapper animate-fade-in">
      <div class="auth-brand">
        <div class="brand-icon">💪</div>
        <div class="brand-name">My<span>Gym</span>Coach</div>
      </div>

      <h1 class="auth-heading">Create your account</h1>
      <p class="auth-subheading">Start tracking your fitness journey for free</p>

      <form action="index.php?page=dashboard" method="POST" id="register-form">
        <div class="form-row">
          <div class="form-group">
            <label class="form-label" for="first-name">First name</label>
            <input type="text" class="form-input" id="first-name" name="first_name" placeholder="Ahmed" required>
          </div>
          <div class="form-group">
            <label class="form-label" for="last-name">Last name</label>
            <input type="text" class="form-input" id="last-name" name="last_name" placeholder="Mohamed" required>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="reg-email">Email address</label>
          <input type="email" class="form-input" id="reg-email" name="email" placeholder="you@example.com" required>
        </div>

        <div class="form-group">
          <label class="form-label" for="reg-password">Password</label>
          <input type="password" class="form-input" id="reg-password" name="password" placeholder="At least 8 characters" required minlength="8">
        </div>

        <div class="form-row">
          <div class="form-group">
            <label class="form-label" for="age">Age</label>
            <input type="number" class="form-input" id="age" name="age" placeholder="22" min="13" max="100">
          </div>
          <div class="form-group">
            <label class="form-label" for="weight">Weight (kg)</label>
            <input type="number" class="form-input" id="weight" name="weight" placeholder="75" min="30" max="300" step="0.1">
          </div>
          <div class="form-group">
            <label class="form-label" for="height">Height (cm)</label>
            <input type="number" class="form-input" id="height" name="height" placeholder="175" min="100" max="250">
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="goal">Fitness Goal</label>
          <select class="form-select" id="goal" name="goal">
            <option value="">Select your primary goal...</option>
            <option value="build_muscle">Build Muscle</option>
            <option value="lose_weight">Lose Weight</option>
            <option value="gain_strength">Gain Strength</option>
            <option value="improve_endurance">Improve Endurance</option>
            <option value="stay_fit">Stay Fit & Healthy</option>
          </select>
        </div>

        <div class="form-group">
          <label class="form-label" for="experience">Training Experience</label>
          <select class="form-select" id="experience" name="experience">
            <option value="">How long have you been training?</option>
            <option value="beginner">Beginner (0–6 months)</option>
            <option value="intermediate">Intermediate (6 months – 2 years)</option>
            <option value="advanced">Advanced (2–5 years)</option>
            <option value="expert">Expert (5+ years)</option>
          </select>
        </div>

        <div class="form-group">
          <label class="form-check">
            <input type="checkbox" name="terms" required>
            <span class="text-sm text-secondary">I agree to the Terms of Service and Privacy Policy</span>
          </label>
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block" id="register-btn">
          Create Account
        </button>
      </form>

      <p class="auth-footer">
        Already have an account? <a href="index.php?page=login">Sign in</a>
      </p>
    </div>
  </div>

  <!-- Right: Hero Visual -->
  <div class="auth-right">
    <div class="auth-hero animate-fade-in">
      <div class="auth-hero-icon">🎯</div>
      <h2>Your Goals, Our Guidance</h2>
      <p>Tell us about yourself and let our AI coach create a personalized assessment of your training plan.</p>

      <div style="margin-top:32px;text-align:left;max-width:300px;margin-left:auto;margin-right:auto">
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px">
          <div style="width:32px;height:32px;border-radius:50%;background:rgba(255,255,255,0.2);display:flex;align-items:center;justify-content:center;font-size:0.85rem;flex-shrink:0">✓</div>
          <span style="font-size:0.9rem">Track workouts, sets, reps & weights</span>
        </div>
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px">
          <div style="width:32px;height:32px;border-radius:50%;background:rgba(255,255,255,0.2);display:flex;align-items:center;justify-content:center;font-size:0.85rem;flex-shrink:0">✓</div>
          <span style="font-size:0.9rem">Interactive body map for muscle coverage</span>
        </div>
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px">
          <div style="width:32px;height:32px;border-radius:50%;background:rgba(255,255,255,0.2);display:flex;align-items:center;justify-content:center;font-size:0.85rem;flex-shrink:0">✓</div>
          <span style="font-size:0.9rem">AI-powered balance & plan analysis</span>
        </div>
        <div style="display:flex;align-items:center;gap:12px">
          <div style="width:32px;height:32px;border-radius:50%;background:rgba(255,255,255,0.2);display:flex;align-items:center;justify-content:center;font-size:0.85rem;flex-shrink:0">✓</div>
          <span style="font-size:0.9rem">Personal records & progress charts</span>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="assets/js/app.js"></script>
<script>
  document.getElementById('register-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const btn = document.getElementById('register-btn');
    btn.textContent = 'Creating account...';
    btn.disabled = true;
    setTimeout(() => {
      window.location.href = 'index.php?page=dashboard';
    }, 1000);
  });
</script>
</body>
</html>
