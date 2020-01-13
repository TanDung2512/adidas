<?php
    require_once("header.php");
?>

<div class="tv2">
    <table class="noti-board2">
        <tr>
            <!-- <td class="table-head"></td> -->
            <td class="table-head2">Line</td>
            <td class="table-head2">Required</td>
            <td class="table-head2">Current MP</td>
        </tr>
        <?php
        if(isset($_REQUEST["manager"])){
            foreach($_REQUEST["manager"] as $line){
                echo '
                <tr>
                    <td>'.$line["line_id"].'</td>
                    <td>'.$line["workers_num"].'</td>
                    <td>'.$line["curr"].'</td>
                </tr>
                ';
            }
        }
        else {
            echo '
            <tr>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            ';
        }
        ?>
    </table>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    if (window.location.href.indexOf("manager") > -1) {
      document.getElementById("manager-title").classList.add("manager-page") 
    }
    setInterval(() => {
        $.ajax({
            method: "GET",
            url: "/adidas/manager/raw-data",
        }).done(function (data) {
            let html = ``;
            data = JSON.parse(data);
            for (let i of data) {
                html += `<tr><td> ${i["line_id"]} </td>
                             <td>${i["workers_num"]}</td>
                             <td>${i["curr"]}</td>   
                            </tr>`
            }
            $(".noti-board2 tr").not(":first").remove();
            $(".noti-board2").append(html);
        })
    }, 3000);
  });
</script>