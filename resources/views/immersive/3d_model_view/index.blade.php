<!DOCTYPE html>
<html>
  <head>
    <title>3D Model View</title>
    <meta name="description" content="glTF Model - A-Frame School">
    <script src="https://aframe.io/releases/1.0.4/aframe.min.js"></script>
    <script src="https://unpkg.com/aframe-extras.animation-mixer@3.4.0/dist/aframe-extras.animation-mixer.js"></script>
    <script src="https://unpkg.com/aframe-teleport-controls@0.2.x/dist/aframe-teleport-controls.min.js"></script>
    <script src="https://unpkg.com/aframe-environment-component@1.1.0/dist/aframe-environment-component.min.js"></script>
    <script>
      AFRAME.registerComponent('cursor-listener', {
        init: function () {
          this.el.addEventListener('click', function (evt) {
            var btnEl = evt.target;
            var addValue = parseFloat(btnEl.getAttribute('addValue'));
            var targetModel = document.querySelector('#gltfModel');
            var scale = targetModel.getAttribute('scale');
            targetModel.setAttribute('scale', {
              x: scale.x + addValue,
              y: scale.y + addValue,
              z: scale.z + addValue
            });

            //console.log(scale);
          });
        }
      });
    </script>
  </head>
  <body>
    <a-scene>
      <a-assets>
{{--  --}}
        {{-- @if ($type == 'local') --}}
          <a-asset-item id="cityModel" src="{{URL::to(''.$modelSrc->file_path.'')}}"></a-asset-item>
        {{-- @elseif($type == 'ipfs') --}}
          {{-- <a-asset-item id="cityModel" crossorigin="anonymous" src="https://cors-anywhere.herokuapp.com/http://161.139.23.150:8080/ipfs/{{$modelSrc->link_resources}}"></a-asset-item> --}}
          {{-- crossorigin="anonymous" src="https://cors-anywhere.herokuapp.com/http://i.dailymail.co.uk/i/pix/2011/01/07/article-1345149-0CAE5C22000005DC-607_468x502.jpg"> --}}
        {{-- @endif --}}
          {{-- <a-asset-item id="cityModel" src="{{URL::to('http://161.139.23.150:8080/ipfs/'.$modelSrc->link_resources.'')}}"></a-asset-item> --}}
          {{-- {{URL::to('http://161.139.23.150:8080/ipfs/'.$resourcesfile->link_thumbnail.'')}} --}}
          {{-- <a-asset-item id="cityModel" src="{{URL::to('http://161.139.23.150:8080/ipfs/'.$modelSrc->link_resources.'')}}"></a-asset-item> --}}
          {{-- <a-asset-item id="cityModel" src="https://cdn.glitch.com/c719c986-c0c5-48b8-967c-3cd8b8aa17f3%2Fexo2Black.typeface.json?1490305922150"></a-asset-item> --}}
        

      </a-assets>

      {{-- <a-entity id="gltfModel" gltf-model="#cityModel" position="0 1 0" scale="1 1 1" animation-mixer></a-entity> --}}

      <a-entity id="gltfModel" gltf-model="#cityModel" 
        position="0 1 0" 
        scale="1 1 1"
        animation-mixer></a-entity>

      <a-entity position="-2 4 0" rotation="0 15 0">
        <a-entity id="btn-cityModel" 
          class="link"
          geometry="primitive: box"
          material="color: blue" 
          scale="2 1 0.5"
          addValue="-0.05"
          cursor-listener></a-entity>
        <a-entity text="value: - Reduce size; width: 3; color: white;" 
          position="1 0 0.25"></a-entity>
      </a-entity>
      
      <a-entity position="2 4 0" rotation="0 -15 0">
        <a-entity id="btn-woodenCrate" 
          class="link"
          geometry="primitive: box"
          material="color: red" 
          scale="2 1 0.5"
          addValue="0.05"
          cursor-listener>
        </a-entity>
        <a-entity text="value: + Add size; width: 3; color: white;" 
          position="1 0 0.25"></a-entity>
      </a-entity>

      <a-entity environment="preset: forest; dressingAmount: 500"></a-entity>
      
      <a-entity id="cameraRig" position="0 .6 4">
        <a-camera id="head" camera wasd-controls look-controls>
          <a-cursor id="cursor"
            animation__click="property: scale; startEvents: click; from: 0.1 0.1 0.1; to: 1 1 1; dur: 150"
            animation__fusing="property: fusing; startEvents: fusing; from: 1 1 1; to: 0.1 0.1 0.1; dur: 1500"
            event-set__mouseenter="_event: mouseenter; color: springgreen"
            event-set__mouseleave="_event: mouseleave; color: black"
            raycaster="objects: .link"></a-cursor>
        </a-camera>

        <a-entity
          id="blockHand"
          oculus-touch-controls="hand: right"
          laser-controls></a-entity>
      </a-entity>
    </a-scene>
  </body>
</html>