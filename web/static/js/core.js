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

        $("#add-row").click(TestAlpari.addRow);

        TestAlpari.addRow();
    },
    render: function (response) {
        if (response.success) {
            var $graphicalArea = $("#graphical-area");
            $graphicalArea.empty();

            $.each(response.data, function (i, item) {
                var $img = $('<img />');
                $img.attr('src', 'data:image/png;base64,' + item);

                $graphicalArea.append($img);
            });
        } else {
            alert(response.message);
        }
    },
    addRow: function () {
        var rowId = "row-" + (new Date()).getTime();
        var graphicalElement = document.importNode(document.querySelector("#graphical-element").content, true);

        var labels = graphicalElement.querySelectorAll("label");

        for (var i = 0; i < labels.length; i++) {
            var label = labels[i];
            var forElement = label.nextElementSibling;

            label.setAttribute('for', label.getAttribute('for') + '-' + rowId);

            forElement.setAttribute('id', forElement.getAttribute('id') + '-' + rowId);
            forElement.setAttribute('name', forElement.getAttribute('name').replace('{item}', rowId));
        }

        document.querySelector("#graphical-elements").appendChild(graphicalElement);
    }
};


$(document).ready(function () {
    TestAlpari.init();
});
