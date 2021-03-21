<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/camera_utils/camera_utils.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/control_utils/control_utils.js"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/drawing_utils/drawing_utils.js"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/hands/hands.js" crossorigin="anonymous"></script>
</head>

<body>
<div class="container">
    <video class="input_video"></video>
    <canvas class="output_canvas" width="1280px" height="720px"></canvas>
</div>
</body>
</html>
<script type="module">
    const videoElement = document.getElementsByClassName('input_video')[0];
    const canvasElement = document.getElementsByClassName('output_canvas')[0];
    const canvasCtx = canvasElement.getContext('2d');

    function onResults(results) {
        canvasCtx.save();
        canvasCtx.clearRect(0, 0, canvasElement.width, canvasElement.height);
        canvasCtx.drawImage(
            results.image, 0, 0, canvasElement.width, canvasElement.height);
        if (results.multiHandLandmarks) {
            for (const landmarks of results.multiHandLandmarks) {
                drawConnectors(canvasCtx, landmarks, HAND_CONNECTIONS,
                    {color: '#00FF00', lineWidth: 5});
                drawLandmarks(canvasCtx, landmarks, {color: '#FF0000', lineWidth: 2});
                console.log(landmarks[8].y);
                console.log(landmarks[6].y);
                if (landmarks[8].y > landmarks[6].y){
                    if (landmarks[12].y > landmarks[10].y){
                        if (landmarks[16].y > landmarks[14].y){
                            if (landmarks[20].y > landmarks[18].y){



                            }

                        }

                    }

                }
                if (landmarks[8].y > landmarks[6].y){
                    if (landmarks[12].y > landmarks[10].y){
                        if (landmarks[16].y > landmarks[14].y){
                            if (landmarks[20].y > landmarks[18].y){
                              

                            }

                        }

                    }

                }
            }
        }
        canvasCtx.restore();
    }

    const hands = new Hands({
        locateFile: (file) => {
            return `https://cdn.jsdelivr.net/npm/@mediapipe/hands/${file}`;
        }
    });
    hands.setOptions({
        maxNumHands: 1,
        minDetectionConfidence: 0.5,
        minTrackingConfidence: 0.5
    });
    hands.onResults(onResults);

    const camera = new Camera(videoElement, {
        onFrame: async () => {
            await hands.send({image: videoElement});
        },
        width: 1280,
        height: 720
    });
    camera.start();
</script>