/**
 * MyGymCoach — Body Chart Integration
 * Uses the 'body-muscles' library for professional anatomical SVG rendering
 * https://github.com/vulovix/body-muscles
 */

/* =============================================
 * Mock workout data (will be replaced by DB later)
 * Maps muscle IDs from the body-muscles library
 * to training intensity (0-10 scale)
 * ============================================= */
const muscleTrainingData = {
  // Front muscles
  'chest-left':           { intensity: 8, lastTrained: 'Today',       sets: 12, exercises: ['Bench Press', 'Incline DB Press'] },
  'chest-right':          { intensity: 8, lastTrained: 'Today',       sets: 12, exercises: ['Bench Press', 'Incline DB Press'] },
  'chest-upper-left':     { intensity: 7, lastTrained: 'Today',       sets: 8,  exercises: ['Incline DB Press', 'Cable Fly'] },
  'chest-upper-right':    { intensity: 7, lastTrained: 'Today',       sets: 8,  exercises: ['Incline DB Press', 'Cable Fly'] },
  'shoulder-front-left':  { intensity: 6, lastTrained: 'Today',       sets: 6,  exercises: ['Overhead Press', 'Lateral Raise'] },
  'shoulder-front-right': { intensity: 6, lastTrained: 'Today',       sets: 6,  exercises: ['Overhead Press', 'Lateral Raise'] },
  'shoulder-side-left':   { intensity: 5, lastTrained: '2 days ago',  sets: 6,  exercises: ['Lateral Raise'] },
  'shoulder-side-right':  { intensity: 5, lastTrained: '2 days ago',  sets: 6,  exercises: ['Lateral Raise'] },
  'shoulder-back-left':   { intensity: 4, lastTrained: '2 days ago',  sets: 4,  exercises: ['Face Pull', 'Reverse Fly'] },
  'shoulder-back-right':  { intensity: 4, lastTrained: '2 days ago',  sets: 4,  exercises: ['Face Pull', 'Reverse Fly'] },
  'biceps-left':          { intensity: 6, lastTrained: '2 days ago',  sets: 8,  exercises: ['Barbell Curl', 'Hammer Curl'] },
  'biceps-right':         { intensity: 6, lastTrained: '2 days ago',  sets: 8,  exercises: ['Barbell Curl', 'Hammer Curl'] },
  'forearm-left':         { intensity: 3, lastTrained: '2 days ago',  sets: 4,  exercises: ['Wrist Curl'] },
  'forearm-right':        { intensity: 3, lastTrained: '2 days ago',  sets: 4,  exercises: ['Wrist Curl'] },
  'abs-upper':            { intensity: 4, lastTrained: '1 day ago',   sets: 8,  exercises: ['Plank', 'Crunches', 'Russian Twist'] },
  'abs-lower':            { intensity: 3, lastTrained: '1 day ago',   sets: 6,  exercises: ['Leg Raise', 'Reverse Crunch'] },
  'obliques-left':        { intensity: 3, lastTrained: '1 day ago',   sets: 4,  exercises: ['Russian Twist', 'Side Plank'] },
  'obliques-right':       { intensity: 3, lastTrained: '1 day ago',   sets: 4,  exercises: ['Russian Twist', 'Side Plank'] },
  'quad-left':            { intensity: 7, lastTrained: 'Yesterday',   sets: 10, exercises: ['Squat', 'Leg Press', 'Leg Extension'] },
  'quad-right':           { intensity: 7, lastTrained: 'Yesterday',   sets: 10, exercises: ['Squat', 'Leg Press', 'Leg Extension'] },
  'adductor-left':        { intensity: 4, lastTrained: 'Yesterday',   sets: 4,  exercises: ['Sumo Squat'] },
  'adductor-right':       { intensity: 4, lastTrained: 'Yesterday',   sets: 4,  exercises: ['Sumo Squat'] },
  'calf-left':            { intensity: 2, lastTrained: 'Yesterday',   sets: 6,  exercises: ['Calf Raise'] },
  'calf-right':           { intensity: 2, lastTrained: 'Yesterday',   sets: 6,  exercises: ['Calf Raise'] },
  'shin-left':            { intensity: 1, lastTrained: '4 days ago',  sets: 0,  exercises: [] },
  'shin-right':           { intensity: 1, lastTrained: '4 days ago',  sets: 0,  exercises: [] },

  // Back muscles
  'trapezius-left':       { intensity: 5, lastTrained: '2 days ago',  sets: 6,  exercises: ['Deadlift', 'Shrugs'] },
  'trapezius-right':      { intensity: 5, lastTrained: '2 days ago',  sets: 6,  exercises: ['Deadlift', 'Shrugs'] },
  'upper-back-left':      { intensity: 6, lastTrained: '2 days ago',  sets: 10, exercises: ['Barbell Row', 'Pull-up'] },
  'upper-back-right':     { intensity: 6, lastTrained: '2 days ago',  sets: 10, exercises: ['Barbell Row', 'Pull-up'] },
  'lower-back-left':      { intensity: 4, lastTrained: '2 days ago',  sets: 4,  exercises: ['Deadlift', 'Back Extension'] },
  'lower-back-right':     { intensity: 4, lastTrained: '2 days ago',  sets: 4,  exercises: ['Deadlift', 'Back Extension'] },
  'lats-left':            { intensity: 7, lastTrained: '2 days ago',  sets: 10, exercises: ['Lat Pulldown', 'Barbell Row'] },
  'lats-right':           { intensity: 7, lastTrained: '2 days ago',  sets: 10, exercises: ['Lat Pulldown', 'Barbell Row'] },
  'triceps-left':         { intensity: 5, lastTrained: 'Today',       sets: 6,  exercises: ['Tricep Pushdown', 'Close-grip BP'] },
  'triceps-right':        { intensity: 5, lastTrained: 'Today',       sets: 6,  exercises: ['Tricep Pushdown', 'Close-grip BP'] },
  'glutes-left':          { intensity: 5, lastTrained: 'Yesterday',   sets: 8,  exercises: ['Squat', 'Hip Thrust'] },
  'glutes-right':         { intensity: 5, lastTrained: 'Yesterday',   sets: 8,  exercises: ['Squat', 'Hip Thrust'] },
  'hamstrings-left':      { intensity: 4, lastTrained: '3 days ago',  sets: 8,  exercises: ['Romanian Deadlift', 'Leg Curl'] },
  'hamstrings-right':     { intensity: 4, lastTrained: '3 days ago',  sets: 8,  exercises: ['Romanian Deadlift', 'Leg Curl'] },
};

/* =============================================
 * Initialize body-muscles charts
 * ============================================= */
document.addEventListener('DOMContentLoaded', () => {
  // Check if BodyMuscles library is loaded
  if (typeof BodyMuscles === 'undefined') {
    console.warn('body-muscles library not loaded');
    return;
  }

  const { BodyChart, ViewSide } = BodyMuscles;

  // Build bodyState from our training data
  const bodyState = {};
  for (const [muscleId, data] of Object.entries(muscleTrainingData)) {
    bodyState[muscleId] = {
      intensity: data.intensity,
      selected: false,
    };
  }

  // Info panel elements
  const infoPanel = document.getElementById('muscle-info-panel');
  const infoName  = document.getElementById('muscle-info-name');
  const infoId    = document.getElementById('muscle-info-id');
  const infoIntensity = document.getElementById('muscle-info-intensity');

  // Click handler — show muscle info
  function onMuscleClick(id, name) {
    const data = muscleTrainingData[id];
    if (infoPanel && infoName) {
      infoPanel.style.display = 'block';
      infoName.textContent = name || id;
      infoId.textContent = id;

      if (data) {
        const labels = ['Rested', 'Very Low', 'Low', 'Light', 'Moderate', 'Moderate-High', 'High', 'Very High', 'Intense', 'Very Intense', 'Max'];
        infoIntensity.textContent = `${labels[data.intensity]} (${data.intensity}/10) • ${data.sets} sets • ${data.lastTrained}`;
      } else {
        infoIntensity.textContent = 'No data yet';
      }
    }
  }

  // Create FRONT chart
  const frontContainer = document.getElementById('body-chart-front');
  if (frontContainer) {
    const frontChart = new BodyChart(frontContainer, {
      view: ViewSide.FRONT,
      bodyState: bodyState,
      onMuscleClick: onMuscleClick,
      onMuscleHover: () => {},
      enableTransitions: true,
    });
  }

  // Create BACK chart
  const backContainer = document.getElementById('body-chart-back');
  if (backContainer) {
    const backChart = new BodyChart(backContainer, {
      view: ViewSide.BACK,
      bodyState: bodyState,
      onMuscleClick: onMuscleClick,
      onMuscleHover: () => {},
      enableTransitions: true,
    });
  }
});
