function showHideForm(otherinformation)
{
    var showForm = document.getElementById('otherInformationForm');
    showForm.style.display = otherinformation.checked ? "block" : "none";
}