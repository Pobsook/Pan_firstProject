
// Contact list
let openIcon = document.getElementById("chatIcon");
let openlineIcon = document.getElementById("lineIcon");
let openigIcon = document.getElementById("igIcon");
let openfacebookIcon = document.getElementById("facebookIcon");
let openmessengerIcon = document.getElementById("messengerIcon");

openIcon.onclick = function() {
    // เช็คว่า openlineIcon อยู่ในสถานะเปิดหรือปิด
    if (openlineIcon.classList.contains("openlineIcon")) {
        // ปิดไอคอนและเปลี่ยนแปลง class
        openlineIcon.classList.remove("openlineIcon");
        openlineIcon.classList.add("closedlineIcon");
        openigIcon.classList.remove("openigIcon");
        openigIcon.classList.add("closedigIcon");
        openfacebookIcon.classList.remove("openfacebookIcon");
        openfacebookIcon.classList.add("closedfacebookIcon");
        openmessengerIcon.classList.remove("openmessengerIcon");
        openmessengerIcon.classList.add("closedmessengerIcon");
    } else {
        // เปิดไอคอนและเปลี่ยนแปลง class
        openlineIcon.classList.remove("closedlineIcon");
        openlineIcon.classList.add("openlineIcon");
        openigIcon.classList.remove("closedigIcon");
        openigIcon.classList.add("openigIcon");
        openfacebookIcon.classList.remove("closedfacebookIcon");
        openfacebookIcon.classList.add("openfacebookIcon");
        openmessengerIcon.classList.remove("closedmessengerIcon");
        openmessengerIcon.classList.add("openmessengerIcon");
    }
}