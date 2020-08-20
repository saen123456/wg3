
$(function () {
    var provinceObject = $('#province');
    var amphureObject = $('#amphure');
    var districtObject = $('#district');

    // on change province
    provinceObject.on('change', function () {
        var provinceId = $(this).val();

        console.log(provinceId);
        amphureObject.html('<option value="">เลือกอำเภอ</option>');
        districtObject.html('<option value="">เลือกตำบล</option>');

        $.get('https://workgress.online/get_amphure.php?province_id=' + provinceId, function (data) {
            console.log("test");
            var result = JSON.parse(data);
            //console.log(result);
            $.each(result, function (index, item) {
                amphureObject.append(
                    $('<option></option>').val(item.id).html(item.name_th)
                );
            });
        });
    });

    // on change amphure
    amphureObject.on('change', function () {
        var amphureId = $(this).val();
        districtObject.html('<option value="">เลือกตำบล</option>');
        console.log(amphureId);
        $.get('https://workgress.online/get_district.php?amphure_id=' + amphureId, function (data) {
            var result = JSON.parse(data);
            $.each(result, function (index, item) {
                districtObject.append(
                    $('<option></option>').val(item.id).html(item.name_th)
                );
            });
        });
    });
});
