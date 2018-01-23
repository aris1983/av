<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JW Player</title>
    <script src="jwplayer/jwplayer.js"></script>
    <script>jwplayer.key = "xO77iBQPcVW5v2CUiXVF2XxdLtJwQAQMLyoGlw==";</script>
</head>
<body>
<div id="player"></div>
<script>
    jwplayer("player").setup({
  "playlist": [
    {
      "sources": [
        {
          "default": false,
          "file": "http://ec2-34-252-181-162.eu-west-1.compute.amazonaws.com:1935/aris1/vod.stream/playlist.m3u8",
          "label": "0",
          "type": "hls",
          "preload": "none"
        }
      ]
    }
  ],
  "primary": "html5",
  "hlshtml": true,
        height: 360,
        width: 640
    });
</script>



</body>
</html>
