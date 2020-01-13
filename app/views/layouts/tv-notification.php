<?php
    require_once("header.php");
?>

<div class="tv">
    <table class="noti-board">
        <tr>
            <!-- <td class="table-head"></td> -->
            <td class="table-head" colspan="2">Operator</td>
            <td class="table-head">Line</td>
            <td class="table-head">Position</td>
        </tr>
    </table>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        if (window.location.href.indexOf("tv-notification") > -1) {
            document.getElementById("tv-title").classList.add("manager-page");
        }
        setInterval(() => {
            $.ajax({
                method: "GET",
                url: "/adidas/tv-notification/raw-data",
            }).done(function (data) {
                let html = ``;
                data = JSON.parse(data);
                for (let i of data) {
                    html += `<tr>
                                <td>
                                    <div class="tv-image">
                                        <img src=${i["ava"]} />
                                    </div>
                                </td>
                                <td>${i["name"]}</td>
                                <td>${i["line_name"]}</td>
                                <td>${i["op_name"]}</td>
                            </tr>`
                }
                $(".noti-board tr").not(":first").remove();
                $(".noti-board").append(html);
            })
        }, 1000);
    });
</script>
