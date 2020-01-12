<?php
    require_once("header.php");
?>

<div class="supervisor-content">
    <div class="line-container">
        <p class="line-title">LINE <span id="line-name">
            <?php 
            print_r($_REQUEST["line_name"]);
            ?>
        </span></p>
        <div class="line-map">
            <img src="app/assets/images/map.png" alt="line-map" />
            <div
                class="position position-M1 green-worker "
                onclick="pushModal(this)"
            >
                <img src="app/assets/images/worker.png" alt="worker" />
            </div>
            <div
                class=" position position-M2 green-worker"
                onclick="pushModal(this)"
            >
                <img src="app/assets/images/worker.png" alt="worker" />
            </div>
            <div
                class=" position position-P1 green-worker"
                onclick="pushModal(this)"
            >
                <img src="app/assets/images/worker.png" alt="worker" />
            </div>
            <div
                class=" position position-P2 green-worker"
                onclick="pushModal(this)"
            >
                <img src="app/assets/images/worker.png" alt="worker" />
            </div>
            <div
                class=" position position-P3 green-worker"
                onclick="pushModal(this)"
            >
                <img src="app/assets/images/worker.png" alt="worker" />
            </div>
            <div
                class=" position position-P4 green-worker"
                onclick="pushModal(this)"
            >
                <img src="app/assets/images/worker.png" alt="worker" />
            </div>
        </div>
    </div>
</div>

<div id="id01" class="w3-modal">
    <div class="operator-container w3-modal-content">
        <div class="operator-modal w3-container">
            <span
                onclick="document.getElementById('id01').style.display='none'"
                class="w3-button w3-display-topright"
                >&times;</span
            >
            <div class="modal-content">
                <div id = "data-ava" class="modal-ava">
                    <img src="app/assets/images/avatar1.jpg" />
                </div>
                <div id = "data-name" class="modal-name">
                    Thinh Tran
                </div>
                <div id = "data-id" class="worker-id">
                    16525578
                </div>
                <div id = "data-type" class="worker-type">
                    Standard
                </div>
                <div id = "data-position" class="worker-position">
                    L3 - A1
                </div>
                <div id = "data-skill" class="worker-skill">
                    attaching
                </div>
                <div id = "data-status" class="worker-status">
                    Working
                </div>
                <div class="status-btn">
                    <button>
                        Absent
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
// print_r($_REQUEST["line_workers"]);
foreach($_REQUEST["line_workers"] as $w) { 
    $data = " ";
    foreach($w as $key => $property){
        if(is_numeric($key)){
            $key = (string)$key;
        }

        $str = "data-" . $key . "=" . "\"" .$property . "\" ";
        $data = $data . $str;
    }
    if ($w["position"] == 0) {
        echo '<div
        class="green-worker"
        onclick="pushModal(this)"
        ' . $data .' 
    >
        <img src="app/assets/images/worker.png" alt="worker" />
    </div>';
    } else if ($w["position"] == 1) {
        echo '<div class="red-worker" 
        onclick="pushModal(this)"
        ' . $data . '
        >

        <img src="app/assets/images/worker.png" alt="worker" />
    </div>';
    } else {
        echo '<div class="yellow-worker"
        onclick="pushModal(this)"
        ' . $data . '
        >
        <img src="app/assets/images/worker.png" alt="worker" />
    </div>';
    }}
    ?>
<!-- <div class="white-worker">
    <img src="app/assets/images/worker.png" alt="worker" />
</div>
<div
    class="green-worker"
    onclick="document.getElementById('id01').style.display='block'"
>
    <img src="app/assets/images/worker.png" alt="worker" />
</div>
<div class="red-worker">
    <img src="app/assets/images/worker.png" alt="worker" />
</div>
<div class="yellow-worker">
    <img src="app/assets/images/worker.png" alt="worker" />
</div> -->

<script> 
    function pushModal(worker){

        let children = $("#id01 div[id^='data-']");
        $.each(children, function(child){
            let id = $(this).attr("id").replace('data-','');
            if(id == "ava"){
                $(this).attr("url",$(worker).data("ori_" + id));
            }
            else if($(worker).data("ori_" + id)){
                $(this).text($(worker).data("ori_" + id));
            }
        })
        console.log($(worker).data("position") )
        if($(worker).data("position") == 0) {
            console.log($(this));
            $("#id01").find(".status-btn").css("display", "none"); 
        }
        else if ($(worker).data("position") == 2) {
            $("#id01").find(".status-btn>button").text("Confirm")
            .on("click", function(){
                //call ajax;
                // $.post( "line-supervisor/commit",{
                //     worker_id: $(worker).data("ori_id"),
                //     function(data, status){
                //     alert("Data: " + data + "\nStatus: " + status);
                // });
            })
        }
        
        document.getElementById('id01').style.display='block';
    }

</script>