function showShapeInfo(shape) {
    // Hide all shape info divs
    document.getElementById('circleInfo').style.display = 'none';
    document.getElementById('rectangleInfo').style.display = 'none';
    document.getElementById('triangleInfo').style.display = 'none';

    // Show the selected shape info div
    document.getElementById(shape + 'Info').style.display = 'block';

    // Calculate and display the area based on the selected shape
    switch (shape) {
        case 'circle':
            alert('Area of Circle: ' + calculateCircleArea());
            break;
        case 'rectangle':
            alert('Area of Rectangle: ' + calculateRectangleArea());
            break;
        case 'triangle':
            alert('Area of Right-angle Triangle: ' + calculateTriangleArea());
            break;
        default:
            alert('Invalid shape');
    }
}

function calculateCircleArea() {
    var radius = parseFloat(document.getElementById('radius').value);
    if (isNaN(radius)) {
        alert('Please enter a valid radius for the circle.');
        return;
    }
    return Math.PI * Math.pow(radius, 2);
}

function calculateRectangleArea() {
    var length = parseFloat(document.getElementById('length').value);
    var width = parseFloat(document.getElementById('width').value);
    if (isNaN(length) || isNaN(width)) {
        alert('Please enter valid length and width for the rectangle.');
        return;
    }
    return length * width;
}

function calculateTriangleArea() {
    var base = parseFloat(document.getElementById('base').value);
    var height = parseFloat(document.getElementById('height').value);
    if (isNaN(base) || isNaN(height)) {
        alert('Please enter valid base and height for the triangle.');
        return;
    }
    return 0.5 * base * height;
}
