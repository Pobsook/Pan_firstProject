document.addEventListener("DOMContentLoaded", function () {
    function showIcon() {
        let openlineIcon = document.getElementById("lineIcon");
        let openigIcon = document.getElementById("igIcon");
        let openfacebookIcon = document.getElementById("facebookIcon");
        let openmessengerIcon = document.getElementById("messengerIcon");

        let isOpen = openlineIcon.classList.contains("openlineIcon");

        openlineIcon.classList.toggle("openlineIcon", !isOpen);
        openlineIcon.classList.toggle("closedlineIcon", isOpen);

        openigIcon.classList.toggle("openigIcon", !isOpen);
        openigIcon.classList.toggle("closedigIcon", isOpen);

        openfacebookIcon.classList.toggle("openfacebookIcon", !isOpen);
        openfacebookIcon.classList.toggle("closedfacebookIcon", isOpen);

        openmessengerIcon.classList.toggle("openmessengerIcon", !isOpen);
        openmessengerIcon.classList.toggle("closedmessengerIcon", isOpen);
    }

    // ตรวจสอบว่า chatIcon มีอยู่จริง
    let chatIcon = document.getElementById("chatIcon");
    if (chatIcon) {
        chatIcon.addEventListener("click", showIcon);
    } else {
        console.error("ไม่พบปุ่ม chatIcon ใน HTML");
    }
});
