<?php if (!defined('THINK_PATH')) exit();?><!doctype html>

<title>代码编辑</title>
<meta charset="utf-8"/>
<link rel=stylesheet href="/Public/code-editor/doc/docs.css">

<link rel="stylesheet" href="/Public/code-editor/lib/codemirror.css">
<link rel="stylesheet" href="/Public/code-editor/theme/3024-day.css">
<link rel="stylesheet" href="/Public/code-editor/theme/3024-night.css">
<link rel="stylesheet" href="/Public/code-editor/theme/abcdef.css">
<link rel="stylesheet" href="/Public/code-editor/theme/ambiance.css">
<link rel="stylesheet" href="/Public/code-editor/theme/base16-dark.css">
<link rel="stylesheet" href="/Public/code-editor/theme/bespin.css">
<link rel="stylesheet" href="/Public/code-editor/theme/base16-light.css">
<link rel="stylesheet" href="/Public/code-editor/theme/blackboard.css">
<link rel="stylesheet" href="/Public/code-editor/theme/cobalt.css">
<link rel="stylesheet" href="/Public/code-editor/theme/colorforth.css">
<link rel="stylesheet" href="/Public/code-editor/theme/dracula.css">
<link rel="stylesheet" href="/Public/code-editor/theme/duotone-dark.css">
<link rel="stylesheet" href="/Public/code-editor/theme/duotone-light.css">
<link rel="stylesheet" href="/Public/code-editor/theme/eclipse.css">
<link rel="stylesheet" href="/Public/code-editor/theme/elegant.css">
<link rel="stylesheet" href="/Public/code-editor/theme/erlang-dark.css">
<link rel="stylesheet" href="/Public/code-editor/theme/hopscotch.css">
<link rel="stylesheet" href="/Public/code-editor/theme/icecoder.css">
<link rel="stylesheet" href="/Public/code-editor/theme/isotope.css">
<link rel="stylesheet" href="/Public/code-editor/theme/lesser-dark.css">
<link rel="stylesheet" href="/Public/code-editor/theme/liquibyte.css">
<link rel="stylesheet" href="/Public/code-editor/theme/material.css">
<link rel="stylesheet" href="/Public/code-editor/theme/mbo.css">
<link rel="stylesheet" href="/Public/code-editor/theme/mdn-like.css">
<link rel="stylesheet" href="/Public/code-editor/theme/midnight.css">
<link rel="stylesheet" href="/Public/code-editor/theme/monokai.css">
<link rel="stylesheet" href="/Public/code-editor/theme/neat.css">
<link rel="stylesheet" href="/Public/code-editor/theme/neo.css">
<link rel="stylesheet" href="/Public/code-editor/theme/night.css">
<link rel="stylesheet" href="/Public/code-editor/theme/panda-syntax.css">
<link rel="stylesheet" href="/Public/code-editor/theme/paraiso-dark.css">
<link rel="stylesheet" href="/Public/code-editor/theme/paraiso-light.css">
<link rel="stylesheet" href="/Public/code-editor/theme/pastel-on-dark.css">
<link rel="stylesheet" href="/Public/code-editor/theme/railscasts.css">
<link rel="stylesheet" href="/Public/code-editor/theme/rubyblue.css">
<link rel="stylesheet" href="/Public/code-editor/theme/seti.css">
<link rel="stylesheet" href="/Public/code-editor/theme/solarized.css">
<link rel="stylesheet" href="/Public/code-editor/theme/the-matrix.css">
<link rel="stylesheet" href="/Public/code-editor/theme/tomorrow-night-bright.css">
<link rel="stylesheet" href="/Public/code-editor/theme/tomorrow-night-eighties.css">
<link rel="stylesheet" href="/Public/code-editor/theme/ttcn.css">
<link rel="stylesheet" href="/Public/code-editor/theme/twilight.css">
<link rel="stylesheet" href="/Public/code-editor/theme/vibrant-ink.css">
<link rel="stylesheet" href="/Public/code-editor/theme/xq-dark.css">
<link rel="stylesheet" href="/Public/code-editor/theme/xq-light.css">
<link rel="stylesheet" href="/Public/code-editor/theme/yeti.css">
<link rel="stylesheet" href="/Public/code-editor/theme/zenburn.css">
<script src="/Public/code-editor/lib/codemirror.js"></script>
<script src="/Public/code-editor/mode/javascript/javascript.js"></script>
<script src="/Public/code-editor/addon/selection/active-line.js"></script>
<script src="/Public/code-editor/addon/edit/matchbrackets.js"></script>
<style type="text/css">
      .CodeMirror {border: 1px solid black; font-size:13px}
    </style>
<div id=nav>
  <a href="/Home/Index/"><h1>文件列表</h1>
  </a>
<br>
  <ul>
    <li><a href="/Public/code-editor/index.html">index.php</a>
    <li><a href="/Public/code-editor/doc/manual.html">fff.php</a>
   
   
   
  </ul>
</div>

<article>
<h2>编辑文件代码</h2>
<form>
<textarea id="code" name="code" row="10"><?php echo ($text); ?></textarea>
</form>

<p>切换主题： <select onchange="selectTheme()" id=select>
    <option selected>default</option>
    <option>3024-day</option>
    <option>3024-night</option>
    <option>abcdef</option>
    <option>ambiance</option>
    <option>base16-dark</option>
    <option>base16-light</option>
    <option>bespin</option>
    <option>blackboard</option>
    <option>cobalt</option>
    <option>colorforth</option>
    <option>dracula</option>
    <option>duotone-dark</option>
    <option>duotone-light</option>
    <option>eclipse</option>
    <option>elegant</option>
    <option>erlang-dark</option>
    <option>hopscotch</option>
    <option>icecoder</option>
    <option>isotope</option>
    <option>lesser-dark</option>
    <option>liquibyte</option>
    <option>material</option>
    <option>mbo</option>
    <option>mdn-like</option>
    <option>midnight</option>
    <option>monokai</option>
    <option>neat</option>
    <option>neo</option>
    <option>night</option>
    <option>panda-syntax</option>
    <option>paraiso-dark</option>
    <option>paraiso-light</option>
    <option>pastel-on-dark</option>
    <option>railscasts</option>
    <option>rubyblue</option>
    <option>seti</option>
    <option>solarized dark</option>
    <option>solarized light</option>
    <option>the-matrix</option>
    <option>tomorrow-night-bright</option>
    <option>tomorrow-night-eighties</option>
    <option>ttcn</option>
    <option>twilight</option>
    <option>vibrant-ink</option>
    <option>xq-dark</option>
    <option>xq-light</option>
    <option>yeti</option>
    <option>zenburn</option>
</select>
</p>

<script>
  var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
    lineNumbers: true,
    styleActiveLine: true,
    matchBrackets: true
  });
  var input = document.getElementById("select");
  function selectTheme() {
    var theme = input.options[input.selectedIndex].textContent;
    editor.setOption("theme", theme);
    location.hash = "#" + theme;
  }
  var choice = (location.hash && location.hash.slice(1)) ||
               (document.location.search &&
                decodeURIComponent(document.location.search.slice(1)));
  if (choice) {
    input.value = choice;
    editor.setOption("theme", choice);
  }
  CodeMirror.on(window, "hashchange", function() {
    var theme = location.hash.slice(1);
    if (theme) { input.value = theme; selectTheme(); }
  });
</script>
  </article>