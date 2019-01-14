let axios = require("axios");

$("body").on("click", ".delete-bookmark", function(e) {
    let id = $(this).data("id");

    axios
        .delete("/bookmarks/" + id)
        .then(function() {
            window.location.reload();
        })
        .catch(function(error) {
            console.log(error);
        });
});

$(document.body).on("submit", "#addForm", function(e) {
    e.preventDefault();
    let data = new FormData(document.getElementById("addForm"));

    axios
        .post("/store", data)
        .then(function(response) {
            if (response.data.errors) {
                $.each(response.data.errors, function(key, value) {
                    var element = $("input[name=" + key + "]");
                    element.addClass("is-invalid");
                    element.attr("placeholder", value);
                });
                return false;
            } else {
                window.location.reload();
            }
        })
        .catch(function(errors) {
            console.log(errors);
        });
});
