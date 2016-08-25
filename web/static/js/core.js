"use strict";

const TestAlpari = {
    init: function () {
        $("#graphical-form").submit(function () {
            var $this = $(this);

            $.post($this.attr('action'), $this.serialize(), function (response) {
                TestAlpari.render(response);
            }, "json");

            return false;
        });
    },
    render: function (response) {
        if (response.success) {
            var $graphicalArea = $("#graphical-area");
            $graphicalArea.empty();

            var $img = $('<img />');
            $img.attr('src', 'data:image/png;base64,' + response.data);

            $graphicalArea.append($img);
        } else {
            alert(response.message);
        }
    }
};


$(document).ready(function () {
    TestAlpari.init();
});
