<!doctype html>
<html>
<body>
    <video id="webcam" width="400" height="300" autoplay></video>
    <canvas id="overlay" width="400" height="300"></canvas>
    <style>
        #webcam, #overlay {
            position: absolute;
            top: 0;
            left: 0;
            margin-left: 400px !important;
        }
    </style>

    <button id="close">close</button>
    <button id="open">open</button>

</body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@0.12.0"></script>
   <script type="text/javascript" src="<?php echo base_url('assets/js/clmtrackr.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/main.js');?>"></script>