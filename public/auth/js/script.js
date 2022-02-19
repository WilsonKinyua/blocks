$(".form-control").each(function () {
    floatedLabel($(this));
});

$(".form-control").on("input", function () {
    floatedLabel($(this));
});

$(".togle-forms").on("click", function () {
    $("#signup").toggleClass("hide", 300);
    $("#login").toggleClass("hide", 300);
});

$(".reset").on("click", function () {
    $("#login").toggleClass("hide", 300);
    $("#reset").toggleClass("hide", 300);
});

$(".password").on("click", function () {
    $("#login").toggleClass("hide", 300);
    $("#password").toggleClass("hide", 300);
});

// $("#login").on("submit", function (e) {
//     e.preventDefault();

//     let data = new FormData(this);

//     data.append("login", true);

//     $.ajax({
//         type: "POST",
//         url: "/api/",
//         data: data,
//         processData: false,
//         contentType: false,
//         error: function (jqXHR, textStatus, errorMessage) {
//             console.log(errorMessage);
//         },
//         success: function (response) {
//             console.log(response);
//             if (response.success) {
//                 window.location = "/admin/";
//             } else alert(response.msg);
//         },
//     });
// });

$("#signup").on("submit", function (e) {
    e.preventDefault();

    let data = new FormData(this);
    data.append("signup", true);

    $.ajax({
        type: "POST",
        url: "/api/",
        data: data,
        processData: false,
        contentType: false,
        error: function (jqXHR, textStatus, errorMessage) {
            console.log(errorMessage);
        },
        success: function (response) {
            console.log(response);

            console.log($(".e1").val());
            if (response.success) {
                $(".e2").val($(".e1").val());
                $("#signup").toggleClass("hide", 300);
                $("#password").toggleClass("hide", 300);
            } else alert(response.msg);
        },
    });
});
$("#password").on("submit", function (e) {
    e.preventDefault();
    if ($(".p1").val() !== $(".p2").val()) {
        $(".p1").val("");
        $(".p2").val("");
        return alert("Passwords do not match, try again!");
    }
    let data = new FormData(this);
    data.append("save_pass", true);

    $.ajax({
        type: "POST",
        url: "/api/",
        data: data,
        processData: false,
        contentType: false,
        error: function (jqXHR, textStatus, errorMessage) {
            console.log(errorMessage);
        },
        success: function (response) {
            console.log(response);

            if (response.success) {
                window.location = "/admin/";
            } else alert(response.msg);
        },
    });
});
$(".tnc").on("click", () => {
    window.open(
        "https://blocks.co.ke/get-started/Blocks%20Terms%20and%20Conditions.pdf",
        "_blank",
        "location=yes,scrollbars=yes,status=yes"
    );
});
function floatedLabel(input) {
    var $field = input.closest(".form-group");
    if (input.val()) {
        $field.addClass("input-not-empty");
    } else {
        $field.removeClass("input-not-empty");
    }
}
