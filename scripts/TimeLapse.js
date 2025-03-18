// Elements
const toggleDurationButton = document.getElementById('toggleDurationMenu');
const durationMenu = document.getElementById('durationMenu');
const durationOptions = durationMenu.querySelectorAll('.duration-option');
const timeSlotsContainer = document.getElementById('timeSlots');

// Toggle Duration Dropdown
toggleDurationButton.addEventListener('click', () => {
    durationMenu.classList.toggle('hidden');
});

// Close Dropdown on Outside Click
document.addEventListener('click', (event) => {
    if (!toggleDurationButton.contains(event.target) && !durationMenu.contains(event.target)) {
        durationMenu.classList.add('hidden');
    }
});

// Generate Time Slots Based on Duration
const generateTimeSlots = (duration) => {
    timeSlotsContainer.innerHTML = ''; // Clear previous slots

    const startTime = 9; // Start time: 9 AM
    const endTime = 17; // End time: 5 PM
    const interval = parseInt(duration); // Selected duration

    if (isNaN(interval)) {
        timeSlotsContainer.innerHTML = '<p class="text-red-500">Invalid Duration Selected.</p>';
        return;
    }

    for (let i = startTime; i < endTime; i += interval) {
        let slotStart = i;
        let slotEnd = i + interval;

        if (slotEnd > endTime) break;

        const slotLabel = `${slotStart < 10 ? '0' + slotStart : slotStart}:00 - ${slotEnd < 10 ? '0' + slotEnd : slotEnd}:00`;

        const slotItem = `
            <label class="time-slot flex items-center gap-2 cursor-pointer">
                <input type="radio" name="time-slot" class="hidden" value="${slotLabel}">
                <span class="flex items-center justify-center w-5 h-5 rounded-full border border-gray-400"></span>
                <span>${slotLabel}</span>
            </label>
        `;

        timeSlotsContainer.insertAdjacentHTML('beforeend', slotItem);
    }
};

// Duration Selection Event
durationOptions.forEach(option => {
    option.addEventListener('click', function() {
        const selectedDuration = this.textContent.trim();
        toggleDurationButton.textContent = selectedDuration;
        durationMenu.classList.add('hidden');

        if (selectedDuration.toLowerCase() === 'full day') {
            timeSlotsContainer.innerHTML = `
                <label class="time-slot flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="time-slot" class="hidden" value="Full Day">
                    <span class="flex items-center justify-center w-5 h-5 rounded-full border border-gray-400"></span>
                    <span>09:00 - 17:00</span>
                </label>
            `;
        } else {
            const durationValue = selectedDuration.split(' ')[0];
            generateTimeSlots(durationValue);
        }
    });
});
