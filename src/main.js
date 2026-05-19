const shapeSelect = document.getElementById("shapeSelect");
const colorButtons = document.querySelectorAll(".color-button");
const sizeRange = document.getElementById("sizeRange");
const sizeValue = document.getElementById("sizeValue");
const rotateRange = document.getElementById("rotateRange");
const rotateValue = document.getElementById("rotateValue");
const resetButton = document.getElementById("resetButton");
const statusText = document.getElementById("statusText");
const svgObject = document.getElementById("svgObject");

const shapes = {
    circle: {
        element: document.getElementById("mainCircle"),
        name: "hình tròn"
    },
    square: {
        element: document.getElementById("mainSquare"),
        name: "hình vuông"
    },
    triangle: {
        element: document.getElementById("mainTriangle"),
        name: "hình tam giác"
    }
};

const colorNames = {
    "#2563eb": "xanh",
    "#16a34a": "xanh lá",
    "#dc2626": "đỏ",
    "#f59e0b": "vàng"
};

let currentShape = "circle";
let currentColor = "#2563eb";
let currentSize = 100;
let currentRotate = 0;

function updateSvg() {
    Object.keys(shapes).forEach((shapeKey) => {
        shapes[shapeKey].element.hidden = shapeKey !== currentShape;
        shapes[shapeKey].element.style.fill = currentColor;
    });

    svgObject.setAttribute("transform", `translate(160 160) rotate(${currentRotate}) scale(${currentSize / 100})`);
    sizeValue.textContent = `${currentSize}%`;
    rotateValue.textContent = `${currentRotate}°`;
    statusText.textContent = `Đang hiển thị ${shapes[currentShape].name} màu ${colorNames[currentColor]}, kích thước ${currentSize}%, xoay ${currentRotate}°.`;
}

shapeSelect.addEventListener("change", () => {
    currentShape = shapeSelect.value;
    updateSvg();
});

colorButtons.forEach((button) => {
    button.addEventListener("click", () => {
        currentColor = button.dataset.color;

        colorButtons.forEach((item) => item.classList.remove("active"));
        button.classList.add("active");

        updateSvg();
    });
});

sizeRange.addEventListener("input", () => {
    currentSize = Number(sizeRange.value);
    updateSvg();
});

rotateRange.addEventListener("input", () => {
    currentRotate = Number(rotateRange.value);
    updateSvg();
});

resetButton.addEventListener("click", () => {
    currentShape = "circle";
    currentColor = "#2563eb";
    currentSize = 100;
    currentRotate = 0;

    shapeSelect.value = currentShape;
    sizeRange.value = currentSize;
    rotateRange.value = currentRotate;
    colorButtons.forEach((button) => {
        button.classList.toggle("active", button.dataset.color === currentColor);
    });

    updateSvg();
});

updateSvg();
