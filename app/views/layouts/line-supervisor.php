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
                <div class="modal-ava">
                    <img src="app/assets/images/avatar1.jpg" />
                </div>
                <div class="modal-name">
                    Thinh Tran
                </div>
                <div class="worker-id">
                    16525578
                </div>
                <div class="worker-type">
                    Standard
                </div>
                <div class="worker-position">
                    L3 - A1
                </div>
                <div class="worker-skill">
                    attaching
                </div>
                <div class="worker-status">
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

<div class="white-worker">
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
</div>
