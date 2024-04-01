AOS.init({
    duration: 1200,
}); // popup

function toggle() {
    var blur = document.getElementById("blur");
    blur.classList.toggle("active");
    var popup = document.getElementById("popup");
    popup.classList.toggle("active");
}

// calculator

("use strict");
var amountSlider = document.getElementById("myAmount");
var amountOutput = document.getElementById("inputAmount");
var roiSlider = document.getElementById("myRoi");
var roiOutput = document.getElementById("inputRoi");
var yearSlider = document.getElementById("myYears");
var yearOutput = document.getElementById("inputYears");

amountOutput.innerHTML = amountSlider.value;
roiOutput.innerHTML = roiSlider.value;
yearOutput.innerHTML = yearSlider.value;

amountSlider.oninput = function () {
    amountOutput.innerHTML = this.value;
};
roiSlider.oninput = function () {
    roiOutput.innerHTML = this.value;
};
yearSlider.oninput = function () {
    yearOutput.innerHTML = this.value;
};

function showValAmount(newVal) {
    amountSlider.value = newVal;
    calculateIt();
}
function showValRoi(newVal) {
    roiSlider.value = newVal;
    calculateIt();
}
function showValYears(newVal) {
    yearSlider.value = newVal;
    calculateIt();
}

amountSlider.addEventListener("input", updateValueAmount);
roiSlider.addEventListener("input", updateValueRoi);
yearSlider.addEventListener("input", updateValueYears);

function updateValueAmount(e) {
    amountOutput.value = e.srcElement.value;
    calculateIt();
}
function updateValueRoi(e) {
    roiOutput.value = e.srcElement.value;
    calculateIt();
}
function updateValueYears(e) {
    yearOutput.value = e.srcElement.value;
    calculateIt();
}

var calculatorMode = "sip";
var heading = document.getElementById("heading");
var amountLabel = document.getElementById("amountLabel");

function changeMode(mode) {
    calculatorMode = mode;
    heading.innerHTML =
        mode === "sip" ? "SIP Calculator" : "Lumpsum Calculator";
    amountLabel.innerHTML =
        mode === "sip" ? "Monthly Investment :" : "Total Investment :";
    calculateIt();
}

function calculateIt() {
    var wealthOutput = document.getElementById("yourWealth");
    var A = document.sipForm.realAmount.value;
    var R = document.sipForm.realRoi.value;
    var N = document.sipForm.realYears.value;
    var sip = Math.round(
        ((Math.pow(1 + (Math.pow(1 + R / 100, 1 / 12) - 1), N * 12) - 1) /
            (Math.pow(1 + R / 100, 1 / 12) - 1)) *
            A
    );
    var lumpsum = Math.round(Math.pow(1 + R / 100, N) * A);
    var finalOutput = calculatorMode === "sip" ? sip : lumpsum;
    wealthOutput.innerHTML = "Rs. " + finalOutput; // Print BMI
}
calculateIt();
