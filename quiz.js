$(document).ready(function () {
    $("#show-hide").click(function () {
        var btn = $(this);
        $("#content").toggle(function () {
            btn.text($(this).css("display") === 'block' ? "ตกลง" : "ตกลง");
        });
    });
});
var unit_index;
var course_id;
$(document).ready(function () {
    $(".sent_unit_name").click(function () {
        //console.log("test");
        $("#unit_name").attr("value", $(this).attr('unit_name'));
        var unit_name = $(this).attr('unit_name');
        $("#unit_index").attr("value", $(this).attr('unit_index'));
        unit_index = $(this).attr('unit_index');
        $("#course_id").attr("value", $(this).attr('course_id'));
        course_id = $(this).attr('course_id');
        //console.log(course_id);
        document.getElementById('show_unit_name').innerHTML = "ตั้งคำถาม ในส่วนของ " + unit_name;
    });
});

$('#Quiz').on('input', function () {
    var input = $(this);
    var is_name = input.val();
    if (is_name) { input.removeClass("invalid").addClass("valid"); }
    else { input.removeClass("valid").addClass("invalid"); }
});

var Radio_Answer;
$(document).ready(function () {
    $('#Radio_Answer').on("click", "input", function () {
        Radio_Answer = $(this).val();
        //console.log(Radio_Answer);
        //console.log(typeof Radio_Answer);
    });
    $("#Quiz_Btn").click(function () {
        //console.log(i++);
        var Quiz = $("#Quiz").val();
        var Choice_Answer_1 = $("#Choice_Answer_1").val();
        var Choice_Answer_2 = $("#Choice_Answer_2").val();
        var Choice_Answer_3 = $("#Choice_Answer_3").val();
        var Choice_Answer_4 = $("#Choice_Answer_4").val();

        /*alert("คอร์ส id " + window.course_id + "\n" + "คำถาม " + Quiz + "\n" + Choice_Answer_1 + " " + Choice_Answer_2 + " " + Choice_Answer_3 + " " + Choice_Answer_4 + "\n" +
            " คำตอบคือข้อที่ " + window.Radio_Answer + "\n" + " unit_index " + window.unit_index);*/
        $.ajax({
            url: "<?= site_url('/CourseController/Create_Quiz') ?>",
            method: "POST",
            data: {
                Course_id: window.course_id,
                Quiz: Quiz,
                Choice_Answer_1: Choice_Answer_1,
                Choice_Answer_2: Choice_Answer_2,
                Choice_Answer_3: Choice_Answer_3,
                Choice_Answer_4: Choice_Answer_4,
                Radio_Answer: Radio_Answer,
                Unit_Index: window.unit_index
            },
            success: function (data) {

            }
        });
    });
});

