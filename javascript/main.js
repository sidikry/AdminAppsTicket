var sl_ap = document.getElementById('sl_ap');

// sl_ap.style.opacity = 0;
// sl_ap.style.visibility = "hidden";

// function showAdminProfile() {
//     sl_ap.style.opacity = 1;
//     sl_ap.style.visibility = "visible";
//     sl_ap.style.transition = "all 0.8s";
// };

// function hideAdminProfile() {
//     sl_ap.style.opacity = 0;
//     sl_ap.style.visibility = "hidden";
//     sl_ap.style.transition = "all 0.8s";
// };


const realfileBtn = document.getElementById("image_file");
const customBtn = document.getElementById("open-file");
const customTxt = document.getElementById("custom-text");

customBtn.addEventListener("click", function () {
    realfileBtn.click();
});

realfileBtn.addEventListener("change", function () {
    if (realfileBtn.value) {
        customTxt.innerHTML = realfileBtn.value.match(
            /[\/\\]([\w\d\s\.\-\(\)]+)$/
        )[1];
    } else {
        customTxt.innerHTML = " No file choosen, yet.";
    }
});