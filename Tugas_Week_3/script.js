// Predefined color palette
const colors = [
    '#FF4444', '#FF6B35', '#FFFF00', '#AAFF00', '#88CCFF', '#DD99FF', '#FFCC99', '#999999', '#FFFFFF',
    '#DD0000', '#FF9944', '#FFFF00', '#00DD00', '#4488FF', '#9944FF', '#FFAA00', '#555555', '#FFFFFF',
    '#880000', '#FF6600', '#CCAA00', '#008800', '#0044DD', '#660099', '#999955', '#333333', '#FFFFFF',
    '#000000', '#444444', '#666666', '#AAAAAA', '#CCCCCC', '#EEEEEE', '#FFFFFF', '#FFFFFF', '#FFFFFF'
];

let currentColorType = null;
let selectedColor = null;
let tempBgColor = '#3d5a80';
let tempTextColor = '#FF0000';

// Initialize color palette
function initializeColorPalette() {
    const palette = document.getElementById('colorPalette');
    palette.innerHTML = '';

    colors.forEach(color => {
        const colorItem = document.createElement('div');
        colorItem.className = 'color-item';
        colorItem.style.backgroundColor = color;
        colorItem.onclick = () => selectColorFromPalette(color);
        palette.appendChild(colorItem);
    });
}

function openColorModal(type) {
    currentColorType = type;
    selectedColor = null;
    document.getElementById('colorModal').classList.add('show');
    document.getElementById('customColor').value = type === 'bg' ? tempBgColor : tempTextColor;
    initializeColorPalette();
}

function closeColorModal() {
    document.getElementById('colorModal').classList.remove('show');
    currentColorType = null;
    selectedColor = null;
}

function selectColorFromPalette(color) {
    selectedColor = color;
    document.querySelectorAll('.color-item').forEach(item => {
        item.classList.remove('selected');
    });
    event.target.closest('.color-item').classList.add('selected');
}

function selectColor() {
    if (!selectedColor) {
        selectedColor = document.getElementById('customColor').value;
    }

    if (currentColorType === 'bg') {
        tempBgColor = selectedColor;
        document.getElementById('bgColorBox').style.backgroundColor = selectedColor;
        document.body.style.backgroundColor = selectedColor;
    } else if (currentColorType === 'text') {
        tempTextColor = selectedColor;
        document.getElementById('textColorBox').style.backgroundColor = selectedColor;
        document.body.style.color = selectedColor;
        document.querySelector('h1').style.color = selectedColor;
        document.querySelectorAll('.color-section-title').forEach(el => {
            el.style.color = selectedColor;
        });
        document.querySelectorAll('.color-option label').forEach(el => {
            el.style.color = selectedColor;
        });
    }

    closeColorModal();
}

function savePreferences() {
    // Save to localStorage
    localStorage.setItem('bgColor', tempBgColor);
    localStorage.setItem('textColor', tempTextColor);

    // Apply colors
    document.body.style.backgroundColor = tempBgColor;
    document.body.style.color = tempTextColor;
    document.querySelector('h1').style.color = tempTextColor;

    document.querySelectorAll('.color-section-title').forEach(el => {
        el.style.color = tempTextColor;
    });
    document.querySelectorAll('.color-option label').forEach(el => {
        el.style.color = tempTextColor;
    });

    alert('Warna telah disimpan!');
}

// Load preferences on page load
window.addEventListener('load', () => {
    const savedBgColor = localStorage.getItem('bgColor');
    const savedTextColor = localStorage.getItem('textColor');

    if (savedBgColor) {
        tempBgColor = savedBgColor;
        document.body.style.backgroundColor = savedBgColor;
        document.getElementById('bgColorBox').style.backgroundColor = savedBgColor;
    }

    if (savedTextColor) {
        tempTextColor = savedTextColor;
        document.body.style.color = savedTextColor;
        document.querySelector('h1').style.color = savedTextColor;
        document.getElementById('textColorBox').style.backgroundColor = savedTextColor;
        document.querySelectorAll('.color-section-title').forEach(el => {
            el.style.color = savedTextColor;
        });
        document.querySelectorAll('.color-option label').forEach(el => {
            el.style.color = savedTextColor;
        });
    }
});

// Close modal when clicking outside
document.getElementById('colorModal').addEventListener('click', function(event) {
    if (event.target === this) {
        closeColorModal();
    }
});
