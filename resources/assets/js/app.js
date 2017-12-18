/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('./bulma-extensions');

//Convert degrees to radians
const toRadians = (degrees) => {
    return degrees * (Math.PI / 180);
}

const makeCircleDiagram = (rating, canvasId, radius, color) => {
    const ratingToPercent = rating / 10;
    const degrees = ratingToPercent * 360.0;
    const radians = toRadians(degrees);

    const canvas = document.querySelector(canvasId);
    canvas.width = 500;
    canvas.height = 500;
    canvas.style.width = '250px';
    canvas.style.height = '250px';

    //Determine screen dpi and scale accordingly
    const context = canvas.getContext('2d');
    const ratio = window.devicePixelRatio;
    context.scale(ratio, ratio);
    const x = canvas.width / (ratio * 2);
    const y = canvas.height / (ratio * 2);

    //Start arc from top
    const startAngle = toRadians(270);

    //End arc at angle based on rating
    const endAngle = radians + startAngle;

    //Draw Arc
    context.beginPath();
    context.arc(x, y, radius, startAngle, endAngle, false);

    //Styling
    context.lineWidth = 9;
    context.strokeStyle = color;
    context.lineCap = 'round';
    context.stroke();

    //Text
    context.font = "bold 20px Arial";
    context.textBaseline = 'middle';
    context.textAlign = "center";
    context.fillStyle = 'white';
    context.fillText(rating.toFixed(1), x, y);
}

makeCircleDiagram(5.7, '#chart-1', 40, '#7AF9BA');
makeCircleDiagram(8.2, '#chart-2', 40, '#E5446D');
makeCircleDiagram(3.5, '#chart-3', 40, '#7359E5');
makeCircleDiagram(1.91, '#chart-4', 40, '#E5C461');
