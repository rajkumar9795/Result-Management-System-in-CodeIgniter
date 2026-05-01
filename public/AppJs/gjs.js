

$(document).ready(function () {

    $("#searchBtn").click(function () {

        var courseid = $("#course").val();

        if (courseid === "") {
            alert("Please select course");
            return;
        }

        // show loading + clear old data
        $("#subjectBody").html(
            "<tr><td colspan='7'>Loading...</td></tr>"
        );
      
        var btn = $(this);
        var url = btn.attr('data-url');
        var csrfName = btn.attr('data-csrf-name');
        var csrfHash = btn.attr('data-csrf-hash');
        $.ajax({
            url: url,
            type: "POST",
            dataType: "json",
            data: {
                cid: courseid,
                [csrfName]: csrfHash
            },

            success: function (response) {

                $("#csrf_token").val(response.token);
                btn.attr('data-csrf-hash', response.token); //writing back server return csrf
                var res = response.subjects;
                var html = "";

                // check valid array + data exists
                if (Array.isArray(res) && res.length > 0) {

                    $.each(res, function (index, row) {

                        html += "<tr>";
                        html += "<td> <a href='" +   baseUrl + 'index.php/subjectedit/' + row.ID  + "' class='btn btn-sm btn-primary'>Edit</a></td>";

                        
                        html += "<td>" + row.SCode + "</td>";
                        html += "<td>" + row.SName + "</td>";
                        html += "<td>" + row.Sem + "</td>";
                        html += "<td>" + row.SeqNo + "</td>";
                        html += "<td>" + row.MaxMark + "</td>";
                        html += "<td>" + row.PassMark + "</td>";
                        html += "<td>" + row.MaxPracMark + "</td>";
                        html += "<td>" + row.PassPracMark + "</td>";
                        if (row.RStatus == 1) {
                            html += "<td style='color:green;'>Active</td>";
                        } else {
                            html += "<td style='color:red;'>Blocked</td>";
                        }
                        html += "</tr>";

                    });

                } else {
                    html = "<tr><td colspan='7'>No subjects found</td></tr>";
                }

                $("#subjectBody").html(html);
            },

            error: function (xhr) {
                console.log(xhr.responseText);
                $("#subjectBody").html(
                    "<tr><td colspan='7'>Error loading data</td></tr>"
                );
            }
        });

    });

});



$(document).ready(function () {

    $('#searchForm').on('submit', function (e) {
        e.preventDefault(); // stop normal form submit

        var regNo = $('#RegNo').val();

        $('#resultBox').html("🔄 Checking...");
        var btn = $(this);
        $.ajax({
            url: btn.attr('data-url'),
            type: "POST",
            data: {
                RegNo: regNo
            },
            success: function (response) {
                $('#resultBox').html(response);
            },
            error: function (xhr) {
                 alert("Status:", xhr.status);
                alert("Response:", xhr.responseText);
                $('#resultBox').html("❌ Error occurred" );
            }
        });

    });

});
