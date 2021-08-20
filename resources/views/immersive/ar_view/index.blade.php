<!DOCTYPE html>
<html>

    <style>
      .btn-primary {
        background-size: 90% 90%;
        border: 0;
        top: 0;
        color: #fff;
        cursor: pointer;
        min-width: 58px;
        min-height: 34px;
        outline: 0;
        position: fixed;
        left: 0;
        transition: background-color .05s ease;
        user-select: none;
        -webkit-transition: background-color .05s ease;
        z-index: 9999;
        border-radius: 8px;
        touch-action: manipulation;
      }
      
      .btn-primary:active, .btn-primary:hover {
        background-color: #ef2d5e;
      }
    </style>

    <script src="https://aframe.io/releases/1.0.0/aframe.min.js"></script>
    <!-- we import arjs version without NFT but with marker + location based support -->
    <script src="https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar.js"></script>

    <body style="margin : 0px; overflow: hidden;">
        <a-scene embedded arjs>

          <div>
            <button class="change-size btn-primary" style="left: 0; top: 0" addvalue="-0.05" cursor-listener>- Reduce size</button>
            <button class="change-size btn-primary" style="left: 100px; top: 0" addvalue="0.05" cursor-listener>+ Add size</button>
          </div>

        <a-marker type="pattern" url="{{ asset('assets/ar-markers/pattern-AR-marker.patt') }}">
            <a-entity id="gltfModel"
            position="0 -1 0"
            scale="0.05 0.05 0.05"
            gltf-model="{{ URL::to(''.$modelSrc->file_path.'') }}"
            >
          </a-entity>
        </a-marker>
        <a-entity camera></a-entity>
        </a-scene>

         <script>
      var buttons = document.querySelectorAll('.change-size');
      
      for(var i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener('click', function(evt) {
          var btnEl = evt.target;
          var addValue = parseFloat(btnEl.getAttribute('addvalue'));
          
          var targetModel = document.querySelector('#gltfModel');
          var scale = targetModel.getAttribute('scale');
          targetModel.setAttribute('scale', {
            x: scale.x + addValue,
            y: scale.y + addValue,
            z: scale.z + addValue
          });
        });
      }
    </script>
    </body>
</html> 

