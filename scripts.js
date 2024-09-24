document.addEventListener("DOMContentLoaded", function() {
    const pdfLinks = document.querySelectorAll(".pdf-link");

    pdfLinks.forEach(link => {
        link.addEventListener("click", function(e) {
            e.preventDefault();
            const pdfUrl = this.getAttribute("href");
            window.open(pdfUrl, "_blank");
        });
    });
});
