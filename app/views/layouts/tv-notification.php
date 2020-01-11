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
        <tr>
            <td>
                <div class="tv-image">
                    <img src="app/assets/images/avatar1.jpg" />
                </div>
            </td>
            <td>Mr. Tran Duc Thinh</td>
            <td>A1</td>
            <td>P1</td>
        </tr>
        <tr>
            <td>
                <div class="tv-image">
                    <img src="app/assets/images/avatar1.jpg" />
                </div>
            </td>
            <td>Mr. Tan Dung</td>
            <td>A10</td>
            <td>S3</td>
        </tr>
        <tr>
            <td>
                <div class="tv-image">
                    <img src="app/assets/images/avatar1.jpg" />
                </div>
            </td>
            <td>Ms. Minh Thu</td>
            <td>A5</td>
            <td>M2</td>
        </tr>
        <tr>
            <td>
                <div class="tv-image">
                    <img src="app/assets/images/avatar1.jpg" />
                </div>
            </td>
            <td>Ms. Minh Thu</td>
            <td>A5</td>
            <td>M2</td>
        </tr>
    </table>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        if (window.location.href.indexOf("tv-notification") > -1) {
            document.getElementById("tv-title").classList.add("manager-page");
        }
    });
</script>
