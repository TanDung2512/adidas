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
        <tr>
            <td>A1</td>
            <td>30</td>
            <td>29</td>
        </tr>
        <tr>
            <td>A2</td>
            <td>20</td>
            <td>20</td>
        </tr>
        <tr>
            <td>A3</td>
            <td>35</td>
            <td>30</td>
        </tr>
        <tr>
            <td>A4</td>
            <td>30</td>
            <td>30</td>
        </tr>
        <tr>
            <td>A5</td>
            <td>16</td>
            <td>15</td>
        </tr>
        <tr>
            <td>A6</td>
            <td>30</td>
            <td>29</td>
        </tr>
        <tr>
            <td>A7</td>
            <td>30</td>
            <td>29</td>
        </tr>
        
    </table>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    if (window.location.href.indexOf("manager") > -1) {
      document.getElementById("manager-title").classList.add("manager-page") 
    }
  });
</script>