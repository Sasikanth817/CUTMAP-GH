const selectTime = document.querySelectorAll('.select-time-Label');

// Get Elements
const toggleButton = document.getElementById('toggleTimeMenu');
const customizeTimeMenu = document.querySelector('.customize-time');
const durationOptions = document.querySelectorAll('.duration-option');

// Toggle the Dropdown Menu
toggleButton.addEventListener('click', () => {
    customizeTimeMenu.classList.toggle('hidden');
});

// Handle Duration Selection
durationOptions.forEach(option => {
    option.addEventListener('click', function() {
        const selectedDuration = this.textContent.trim();
        toggleButton.textContent = selectedDuration;
        customizeTimeMenu.classList.add('hidden');
    });
});

// Close the Dropdown if clicked outside
document.addEventListener('click', (event) => {
    if (!toggleButton.contains(event.target) && !customizeTimeMenu.contains(event.target)) {
        customizeTimeMenu.classList.add('hidden');
    }
});
