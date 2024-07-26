$(document).ready(function () {
    $("select[name=is_nbm]").change(function () {
        let isi = $(this).val();

        if (isi == "sudah") {
            $(".nbm").show("slow");
        } else {
            $(".nbm").hide("slow");
        }
    });
});

$(document).ready(function () {
    $("select[name=profesi]").change(function () {
        let isi = $(this).val();

        if (isi == "Lain-lain") {
            $(".dea").show("slow");
        } else {
            $(".dea").hide("slow");
        }
    });
});
