toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "slideDown",
    "hideMethod": "slideUp"
};

$('[data-btn-function="export"]').remove();
$('form').attr("autocomplete", "off");
$('input, textarea, select').attr("autocomplete", "off");
$("body").fadeIn(500);
$(".table-responsive table tr td").each(function () {
    if ($(this).html().trim() == '') {$(this).html('-')}
});

if ($('[type="file"]' + ", [type='file']").length) {
    $('[type="file"]' + ", [type='file']").each(function () {
        if ($(this).attr("accept") == undefined) {$(this).attr('accept', '.xlsx, .xls, image/*, .doc, .docx, .ppt, .pptx, .pdf')}
    });
}

$('.select-search').select2();
$('textarea').attr("spellcheck", "false");
$('.form-control-numeric').autoNumeric('init', {aPad: false, aDec: ',', aSep: ''});

function modalAlertDom (dom, title, description) {
    window.domAlert = dom;
    $("#modal-alert-title").html(title);
    $("#modal-alert-description").html(description);
    $("#modal-alert-trigger").click(function () {
        window.domAlert.click();
    });
    $("#modal-alert").modal("show");
}

function showPassword (e) {
    let parent = $(e).parent().parent().parent();
    let input = $($(parent).find("input"));
    $($(parent).find(($(input).attr("type") == 'text' ? '.icon-eye' : '.icon-close-eye'))).show();
    console.log($($(parent).find(($(input).attr("type") == 'text' ? '.icon-eye' : '.icon-close-eye'))))
    $($(parent).find(($(input).attr("type") == 'text' ? '.icon-close-eye' : '.icon-eye'))).hide();
    $(input).attr("type", ($(input).attr("type") == 'text' ? 'password' : 'text'));
}