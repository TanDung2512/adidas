<?php
    require_once("header.php");
?>

<div class="tv">
    <table class="noti-board">
        <tr>
            <!-- <td class="table-head"></td> -->
            <td class="table-head">Operator</td>
            <td class="table-head">ID</td>
            <td class="table-head">Department</td>
            <td class="table-head">Skills</td>
            <td class="table-head">Assigned to</td>
        </tr>
        <?php 
        // print_r($_REQUEST["water_spiders"]);
            foreach($_REQUEST["water_spiders"] as $w) { ?>
                <tr>
                    <td><?php echo $w["name"] ?></td>
                    <td><?php echo $w["worker_id"] ?></td>
                    <td>Assembly</td>
                    <td>Marking, ...</td>
                    <td>Dungggg</td>
                </tr>
            <?php }
        ?>
        <!-- <tr>
            <td>Dung Tan</td>
            <td>08</td>
            <td>Assembly</td>
            <td>Marking,...</td>
            <td>
                <span id="list-line">Line 2</span> - Position
                <span id="list-position">M1</span>
            </td>
        </tr>
        <tr>
            <td>Thinh Tran</td>
            <td>03</td>
            <td>Assembly</td>
            <td>Marking,...</td>
            <td>
                <span id="list-line">Line 2</span> - Position
                <span id="list-position">M1</span>
            </td>
        </tr>
        <tr>
            <td>Thinh Tran</td>
            <td>03</td>
            <td>Assembly</td>
            <td>Marking,...</td>
            <td>
                <span id="list-line">Line 2</span> - Position
                <span id="list-position">M1</span>
            </td>
        </tr>
        <tr>
            <td>Thinh Tran</td>
            <td>03</td>
            <td>Assembly</td>
            <td>Marking,...</td>
            <td>
                <span id="list-line">Line 2</span> - Position
                <span id="list-position">M1</span>
            </td>
        </tr>
        <tr>
            <td>Thinh Tran</td>
            <td>03</td>
            <td>Assembly</td>
            <td>Marking,...</td>
            <td>
                <span id="list-line">Line 2</span> - Position
                <span id="list-position">M1</span>
            </td>
        </tr> -->
    </table>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        if (window.location.href.indexOf("waiter") > -1) {
            document.getElementById("list-title").classList.add("manager-page");
        }
    });
</script>
