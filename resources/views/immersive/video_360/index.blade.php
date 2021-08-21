 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Video 360</title>
    
    <!-- import the webpage's javascript file -->
    <script src="https://aframe.io/releases/1.1.0/aframe.min.js"></script>
    <script src="https://unpkg.com/aframe-environment-component/dist/aframe-environment-component.min.js"></script>
    <script src="{{URL::to('assets/360/arrow-key-rotation.js')}}"></script>
    <script src="{{URL::to('assets/360/play-on-window-click.js')}}"></script>
    <script src="{{URL::to('assets/360/play-on-vrdisplayactivate-or-enter-vr.js')}}"></script>
    <script src="{{URL::to('assets/360/hide-once-playing.js')}}"></script>
    <script>
      AFRAME.registerComponent('scale-on-mouseenter', {
        schema: {
          to: {default: '2.5 2.5 2.5', type: 'vec3'},
          from: {default: '2 2 2', type: 'vec3'}
        },

        init: function () {
          var data = this.data;
          var el = this.el;
          
          this.el.addEventListener('mouseenter', function () {
            el.object3D.scale.copy(data.to);
          });
          
          this.el.addEventListener('mouseleave', function () {
            el.object3D.scale.copy(data.from);
          });
        }
      });
    </script>
  </head>  
  <body>
    <a-scene>
      <a-assets>
        <img id="boxTexture" src="https://i.imgur.com/mYmmbrp.jpg">
        <img id="skyTexture" src="https://cdn.aframe.io/360-image-gallery-boilerplate/img/sechelt.jpg">
        <img id="groundTexture" src="https://cdn.aframe.io/a-painter/images/floor.jpg">
        <audio id="backgroundNoise" src="https://cdn.aframe.io/basic-guide/audio/backgroundnoise.wav" autoplay preload></audio>

          <video id="waterfront" autoplay loop="true" src="{{URL::to(''.$videoSrc->file_path.'')}}" 
            playsinline 
            webkit-playsinline></video>
               
      </a-assets>
      

      <a-entity text="value: Hello, A-Frame!; color: #BBB" position="-0.9 0.2 -3" scale="1.5 1.5 1.5"></a-entity>

      <a-videosphere src="#waterfront" 
                     rotation="0 270 0"
                     play-on-window-click
                     play-on-vrdisplayactivate-or-enter-vr></a-videosphere>
      
      <a-light type="ambient" color="#445451"></a-light>
      <a-light type="point" intensity="2" position="2 4 4"></a-light>
      
      <a-sound src="backgroundNoise" autoplay="true" position="-3 1 -4"></a-sound>
      
      <a-camera>
        <a-cursor></a-cursor>
        <!-- Text element for display messaging.  Hide once video is playing. -->
        <a-entity id="msg" position="0 -0.3 -1.5" text="align: center; 
                    width: 3;
                    wrapCount: 100;
                    color: red;
                    value: Enter the VR view to make the video play, if needed."
                  hide-once-playing="#waterfront">
        </a-entity>
      </a-camera>
    </a-scene>
  </body>
</html>
