function generatePDF(){
    const element = document.getElementById("bill");

    html2pdf()
    .from(element)
    .save();
}