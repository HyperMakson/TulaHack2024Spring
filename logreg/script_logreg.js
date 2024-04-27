var offsetHeightLabelLog = document.querySelectorAll('.upper-text__log-form');

offsetHeightLabelLog.forEach(el => {
    el.style.top = "-" + ((el.offsetHeight + 4) / 2) + "px";
});